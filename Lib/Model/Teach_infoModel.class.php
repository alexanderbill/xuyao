<?php 
class Teach_infoModel extends Model { 
    // 自动验证设置 
   protected $_validate     =     array( 
      array('ttedu_username','require','用户名不能为空！',1,'regex',self::MODEL_INSERT), 
      array('ttedu_username','','该用户名已存在！',1,'unique',self::MODEL_INSERT),
	  array('ttedu_password','require','密码不能为空！',1,'regex',self::MODEL_INSERT), 
	  array('ttedu_password2','ttedu_password','您两次输入的秘密不一致！',1,'confirm',self::MODEL_INSERT),
	  array('ttedu_mqshengfei','require','请选择身份！',0),
	  array('ttedu_chenfu','require','真实姓名不能为空！',0,'regex',self::MODEL_INSERT),
	  array('ttedu_birth','require','出生日期不能为空！',0),
	  array('ttedu_jiguan','require','请选择出生地！',0),
	  array('ttedu_mqxueli','require','请选择学历！',0),
	  array('ttedu_shenfenzheng','require','请正确输入身份证/护照号码！',0),
	  array('ttedu_zhuanye','require','专业不能为空！',0),
	  array('ttedu_address','require','请选择家庭住址！',0),
	  array('ttedu_gongzuozhusuo','require','请选择工作住所！',0),
	  array('ttedu_shouxuandianhua','require','请输入手机号码！',0),
	  array('ttedu_email','email','请正确输入邮箱地址！',0),
	  array('ttedu_tongxundizhi','require','通信地址不能为空！',0),
	  array('ttedu_renjiaoxueke','require','辅导学科不能为空！',0),
	  array('ttedu_jiajiaodiqu','require','请输入家教地区！',0),
	  array('ttedu_yuanlaijieshao','require','请输入修改个人描述！',0,'regex',self::MODEL_UPDATE),
      ); 
	  
   
    // 自动填充设置 
    protected $_auto     =     array( 
       // array('status','1',self::MODEL_INSERT), 
        array('ttedu_zhucedate','time',self::MODEL_INSERT,'function'), 
        ); 

} 
?> 