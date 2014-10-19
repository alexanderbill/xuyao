<?php
session_start();
class MessageAction extends Action
{
	public function msg(){
		import("@.Action.Public.PublicInfo");
		$public=new PublicInfo();
		$SWI=$public->set_web_info();//网站基本信息
		$this->assign( "msg", $SWI['ttedu_guanbiwangzshuom'] );
		$this->display();
	}  
}
?>