<?php
session_start();
header("Content-Type:text/html; charset=UTF-8");
//---------------------------------------------------------
//财付通即时到帐支付请求示例，商户按照此文档进行开发即可
//---------------------------------------------------------

require_once ("classes/PayRequestHandler.class.php");
require_once '../conjunction.php';

$FileID=date("YmdHis") . '' . rand(100,999);
$userid=$_SESSION['userid'];
$username=$_SESSION['username'];
$ttedu_chongzhijinge=$_POST['ttedu_chongzhijinge'];
$ttedu_beizhu=$_POST['ttedu_beizhu'];

//插入订单  状态默认为0
$sql="insert into chongzhi_detail(ttedu_username,ttedu_chongzhijinge,ttedu_adddates,ttedu_beizhu,ttedu_user_id,ttedu_states,ttedu_code) values('".$username
	."',".$ttedu_chongzhijinge.",now(),'".$ttedu_beizhu."',".$userid.",0,'".$FileID."')";

$result=mysql_query($sql,$conn);

//获取支付账号信息
$sql="select * from set_pay_info where ttedu_id=2";
$result=mysql_query($sql,$conn);
$pay=mysql_fetch_array($result);
$pay['ttedu_zhanghao']="1900000109";
$pay['ttedu_anquanyangzhengma']="8934e7d15453e97507ef794cf7b0519d";
echo $pay['ttedu_zhanghao']."--".$pay['ttedu_payname'];

/* 商户号 */
//$bargainor_id = "1900000109";
$bargainor_id = $pay['ttedu_zhanghao'];
//$bargainor_id =urlencode(iconv('UTF-8', 'GB2312', $pay['ttedu_zhanghao']));
/* 密钥 */
//$key = "8934e7d15453e97507ef794cf7b0519d";
$key = $pay['ttedu_anquanyangzhengma'];
//$key =urlencode(iconv('UTF-8', 'GB2312', $pay['ttedu_anquanyangzhengma']));
/* 返回处理地址 */
$return_url = "http://localhost/tenpay/return_url.php";

//date_default_timezone_set(PRC);
$strDate = date("Ymd");
$strTime = date("His");

//4位随机数
$randNum = rand(1000, 9999);

//10位序列号,可以自行调整。
$strReq = $strTime . $randNum;

/* 商家订单号,长度若超过32位，取前32位。财付通只记录商家订单号，不保证唯一。 */
$sp_billno = $FileID;

/* 财付通交易单号，规则为：10位商户号+8位时间（YYYYmmdd)+10位流水号 */
$transaction_id = $bargainor_id . $strDate . $strReq;

/* 商品价格（包含运费），以分为单位 */
$total_fee = $ttedu_chongzhijinge*(1+$pay['ttedu_shouxufei']*0.01)*100;

/* 商品名称 */
$desc = "订单号：" . $transaction_id;

/* 创建支付请求对象 */
$reqHandler = new PayRequestHandler();
$reqHandler->init();
$reqHandler->setKey($key);

//----------------------------------------
//设置支付参数
//----------------------------------------
$reqHandler->setParameter("bargainor_id", $bargainor_id);			//商户号
$reqHandler->setParameter("sp_billno", $sp_billno);					//商户订单号
$reqHandler->setParameter("transaction_id", $transaction_id);		//财付通交易单号
$reqHandler->setParameter("total_fee", $total_fee);					//商品总金额,以分为单位
$reqHandler->setParameter("return_url", $return_url);				//返回处理地址
$reqHandler->setParameter("desc", "订单号：" . $transaction_id);	//商品名称

//用户ip,测试环境时不要加这个ip参数，正式环境再加此参数
//$reqHandler->setParameter("spbill_create_ip", $_SERVER['REMOTE_ADDR']);

//请求的URL
$reqUrl = $reqHandler->getRequestURL();

//debug信息
//$debugInfo = $reqHandler->getDebugInfo();

//echo "<br/>" . $reqUrl . "<br/>";
//echo "<br/>" . $debugInfo . "<br/>";

//重定向到财付通支付
$reqHandler->doSend();


?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>财付通即时到帐程序演示</title>
</head>
<body>
<br/>
</body>
</html>
