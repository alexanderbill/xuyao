<?php

//---------------------------------------------------------
//财付通即时到帐支付应答（处理回调）示例，商户按照此文档进行开发即可
//---------------------------------------------------------

require_once ("./classes/PayResponseHandler.class.php");

/* 密钥 */
$key = "8934e7d15453e97507ef794cf7b0519d";

/* 创建支付应答对象 */
$resHandler = new PayResponseHandler();
$resHandler->setKey($key);

//判断签名
if($resHandler->isTenpaySign()) {
	
	//交易单号
	$transaction_id = $resHandler->getParameter("transaction_id");
	
	//金额,以分为单位
	$total_fee = $resHandler->getParameter("total_fee");
	
	//支付结果
	$pay_result = $resHandler->getParameter("pay_result");
	
	if( "0" == $pay_result ) {
	
		//------------------------------
		//处理业务开始
		//------------------------------
		
		require_once '../conjunction.php';
		$sql="update set_pay_info set ttedu_states=1 where ttedu_code=".$transaction_id;
		$result=mysql_query($sql,$conn);
		$sql="select * from set_pay_info where ttedu_code=".$transaction_id;
		$result=mysql_query($sql,$conn);
		$pay=mysql_fetch_array($result);
		$sql="update teach_info set ttedu_shengyujinge=ttedu_shengyujinge+".$pay['ttedu_chongzhijinge']." where ttedu_id=".$pay['ttedu_user_id'];
		$result=mysql_query($sql,$conn);
		
		
		//注意交易单不要重复处理
		//注意判断返回金额
		
		//------------------------------
		//处理业务完毕
		//------------------------------	
		
		//调用doShow, 打印meta值跟js代码,告诉财付通处理成功,并在用户浏览器显示$show页面.
		$show = "http://localhost/tenpay/show.php";
		$resHandler->doShow($show);
	
	} else {
		//当做不成功处理
		echo "<br/>" . "支付失败" . "<br/>";
	}
	
} else {
	echo "<br/>" . "认证签名失败" . "<br/>";
}

//echo $resHandler->getDebugInfo();

?>