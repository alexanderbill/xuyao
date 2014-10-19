<?php 
class Chongzhi_detailModel extends Model {  

    // 自动验证设置 
   protected $_validate     =     array( 
   		  array('ttedu_chongzhijinge','require','请填充值金额！',1), 
		  array('ttedu_beizhu','require','请填写备注信息！',1), 
    ); 
	  
    // 自动填充设置 
    protected $_auto     =     array(  
        array('ttedu_adddates','time',self::MODEL_INSERT,'function'), 
        ); 

} 
?> 