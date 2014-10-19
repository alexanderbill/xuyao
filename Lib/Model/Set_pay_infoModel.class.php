<?php 
class Set_pay_infoModel extends Model {  

    // 自动验证设置 
   protected $_validate     =     array( 
      array('ttedu_payname','require','请输入支付方式名称！',1), 
	  array('ttedu_payshuoming','require','请输入支付方式说明！',1), 
	  array('ttedu_zhanghao','require','请输入商户账号！',1),
	  array('ttedu_anquanyangzhengma','require','请输入MD5密匙！',1),
	  array('ttedu_shouxufei','require','请输入手续费率！',1),
	  array('ttedu_paixu','require','请输入排序ID！',1),
	  array('ttedu_shifouqiyong','require','请选择是否启用！',1),
      ); 
	  
    // 自动填充设置 
    protected $_auto     =     array( 
       // array('status','1',self::MODEL_INSERT), 
        //array('ttedu_addtime','time',self::MODEL_INSERT,'function'), 
        ); 

} 
?> 