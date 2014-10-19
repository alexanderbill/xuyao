/*
MySQL Data Transfer
Source Host: localhost
Source Database: teach_data
Target Host: localhost
Target Database: teach_data
Date: 2011-7-26 21:11:08
*/
drop database teach_data;

create database teach_data;

use teach_data;

set names utf8;


SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for ad
-- ----------------------------
CREATE TABLE `ad` (
  `ttedu_id` int(10) NOT NULL auto_increment,
  `ttedu_adtitle` varchar(100) default NULL,
  `ttedu_adaddress` varchar(200) default NULL,
  `ttedu_adpic` varchar(200) default '0',
  `ttedu_adwidth` int(10) default NULL,
  `ttedu_adheight` int(10) default '0',
  `ttedu_weizhi` varchar(60) default NULL,
  `ttedu_adddate` int(11) default NULL,
  `ttedu_shifouxianshi` tinyint(1) default '0',
  PRIMARY KEY  (`ttedu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for btype_down
-- ----------------------------
CREATE TABLE `btype_down` (
  `ttedu_id` int(10) NOT NULL auto_increment,
  `ttedu_btype_name` varchar(200) default NULL,
  `ttedu_bfbdate` int(11) default NULL,
  PRIMARY KEY  (`ttedu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for btype_info
-- ----------------------------
CREATE TABLE `btype_info` (
  `ttedu_id` int(10) NOT NULL auto_increment,
  `ttedu_btype_name` varchar(200) default NULL,
  `ttedu_bfbdate` int(11) default NULL,
  PRIMARY KEY  (`ttedu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for chongzhi_detail
-- ----------------------------
CREATE TABLE `chongzhi_detail` (
  `ttedu_id` int(10) NOT NULL auto_increment,
  `ttedu_username` varchar(100) default NULL,
  `ttedu_chongzhijinge` double default NULL,
  `ttedu_adddates` datetime default NULL,
  `ttedu_beizhu` varchar(255) default NULL,
  `ttedu_user_id` int(10) default '0',
  `ttedu_states` int(1) default '0',
  `ttedu_code` varchar(20) default NULL,
  PRIMARY KEY  (`ttedu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for huiyuan_info
-- ----------------------------
CREATE TABLE `huiyuan_info` (
  `ttedu_id` int(10) NOT NULL auto_increment,
  `ttedu_username` varchar(60) default NULL,
  `ttedu_password` varchar(68) default NULL,
  `ttedu_sex` varchar(2) default NULL,
  `ttedu_old` varchar(4) default NULL,
  `ttedu_birth` varchar(20) default NULL,
  `ttedu_shouji` varchar(12) default NULL,
  `ttedu_zuoji` varchar(12) default NULL,
  `ttedu_qq` varchar(20) default NULL,
  `ttedu_email` varchar(40) default NULL,
  `ttedu_adddate` int(11) default NULL,
  `ttedu_logindate` int(11) default NULL,
  PRIMARY KEY  (`ttedu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for info_detail
-- ----------------------------
CREATE TABLE `info_detail` (
  `ttedu_id` int(10) NOT NULL auto_increment,
  `ttedu_title` varchar(200) default NULL,
  `ttedu_content` text,
  `ttedu_pic` varchar(255) default NULL,
  `ttedu_paixu` int(10) default '0',
  `ttedu_btype_id` int(10) default '0',
  `ttedu_stype_id` int(10) default '0',
  PRIMARY KEY  (`ttedu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for info_down
-- ----------------------------
CREATE TABLE `info_down` (
  `ttedu_id` int(10) NOT NULL auto_increment,
  `ttedu_title` varchar(200) default NULL,
  `ttedu_content` text,
  `ttedu_pic` varchar(255) default NULL,
  `ttedu_fujian` varchar(255) default NULL,
  `ttedu_shifouzhuce` tinyint(1) default '0',
  `ttedu_paixu` tinyint(1) default '0',
  `ttedu_btype_id` tinyint(1) default '0',
  `ttedu_stype_id` tinyint(1) default '0',
  `ttedu_sgdate` int(11) default NULL,
  PRIMARY KEY  (`ttedu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for jiajiao_info
-- ----------------------------
CREATE TABLE `jiajiao_info` (
  `ttedu_id` int(12) NOT NULL auto_increment,
  `ttedu_chengfu` varchar(20) default NULL,
  `ttedu_wspingqing` varchar(24) default NULL,
  `ttedu_sex` varchar(4) default NULL,
  `ttedu_old` varchar(4) default NULL,
  `ttedu_birth` varchar(20) default NULL,
  `ttedu_xueshengrenshu` smallint(5) default NULL,
  `ttedu_nianjikemu` varchar(100) default NULL,
  `ttedu_jiajiaojiage` varchar(20) default NULL,
  `ttedu_jutishijian` varchar(20) default NULL,
  `ttedu_address` varchar(60) default NULL,
  `ttedu_shoukediqu` varchar(60) default NULL,
  `ttedu_nalugongjiao` varchar(100) default NULL,
  `ttedu_laoshiyaoqiu` varchar(255) default NULL,
  `ttedu_qitayaoqiu` varchar(255) default NULL,
  `ttedu_shouji` varchar(12) default NULL,
  `ttedu_zuoji` varchar(12) default NULL,
  `ttedu_qq` varchar(20) default NULL,
  `ttedu_email` varchar(40) default NULL,
  `ttedu_huiyuan_id` int(10) default NULL,
  `ttedu_shifouqiangzhishoufei` tinyint(4) default NULL,
  `ttedu_meizhoucishu` smallint(4) default NULL,
  `ttedu_meicishijian` smallint(4) default NULL,
  `ttedu_meixiaoshibaochou` double default NULL,
  `ttedu_yuebaifenbigongzi` double default NULL,
  `ttedu_jieshaofeiyong` double default NULL,
  `ttedu_lianxifangshimoshi` tinyint(1) default '1',
  `ttedu_shifouyuyue` tinyint(4) default NULL,
  `ttedu_addtime` int(11) default NULL,
  `ttedu_techerid` int(10) default NULL,
  `ttedu_techersex` varchar(4) default NULL,
  PRIMARY KEY  (`ttedu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for lianxi_jilu
-- ----------------------------
CREATE TABLE `lianxi_jilu` (
  `ttedu_id` int(10) NOT NULL auto_increment,
  `ttedu_userid` int(10) default NULL,
  `ttedu_mid` int(2) default NULL,
  `ttedu_content` text,
  `ttedu_adddate` int(11) default NULL,
  `ttedu_type` varchar(40) default NULL,
  PRIMARY KEY  (`ttedu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for manager_users
-- ----------------------------
CREATE TABLE `manager_users` (
  `ttedu_id` int(10) NOT NULL auto_increment,
  `ttedu_musers` varchar(100) default NULL,
  `ttedu_mpassword` varchar(68) default NULL,
  `ttedu_memail` varchar(40) default NULL,
  `ttedu_mtel` varchar(12) default NULL,
  `ttedu_mqq` varchar(15) default NULL,
  `ttedu_mquanxian` int(1) default '1',
  `ttedu_adddate` int(11) default NULL,
  PRIMARY KEY  (`ttedu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for pic_zj
-- ----------------------------
CREATE TABLE `pic_zj` (
  `ttedu_id` int(10) NOT NULL auto_increment,
  `ttedu_typename` varchar(1) default NULL,
  `ttedu_pic` varchar(255) default NULL,
  `ttedu_teachid` int(10) default NULL,
  `ttedu_adddate` int(11) default NULL,
  `ttedu_beizhu` varchar(255) default NULL,
  PRIMARY KEY  (`ttedu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for set_liuyan
-- ----------------------------
CREATE TABLE `set_liuyan` (
  `ttedu_id` int(10) NOT NULL auto_increment,
  `ttedu_username` varchar(100) default NULL,
  `ttedu_tel` varchar(12) default NULL,
  `ttedu_email` varchar(40) default NULL,
  `ttedu_title` varchar(255) default NULL,
  `ttedu_content` text,
  `ttedu_lydate` int(11) default NULL,
  `ttedu_hfmessage` text,
  `ttedu_hfdate` int(11) default NULL,
  PRIMARY KEY  (`ttedu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for set_other_website_info
-- ----------------------------
CREATE TABLE `set_other_website_info` (
  `ttedu_id` int(10) NOT NULL auto_increment,
  `ttedu_webname` varchar(255) default NULL,
  `ttedu_website` varchar(255) default NULL,
  `ttedu_paixu` smallint(5) default '0',
  `ttedu_color` varchar(20) default NULL,
  `ttedu_states` tinyint(1) default '1',
  PRIMARY KEY  (`ttedu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for set_pay_info
-- ----------------------------
CREATE TABLE `set_pay_info` (
  `ttedu_id` int(10) NOT NULL auto_increment,
  `ttedu_payname` varchar(100) default NULL,
  `ttedu_payshuoming` varchar(255) default NULL,
  `ttedu_zhanghao` varchar(120) default NULL,
  `ttedu_anquanyangzhengma` varchar(120) default NULL,
  `ttedu_shouxufei` double default NULL,
  `ttedu_hezuoshengfenid` varchar(30) default NULL,
  `ttedu_hezuofangshi` tinyint(1) default '0',
  `ttedu_paixu` smallint(5) default '0',
  `ttedu_shifouqiyong` tinyint(1) default '0',
  PRIMARY KEY  (`ttedu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for set_web_info
-- ----------------------------
CREATE TABLE `set_web_info` (
  `ttedu_id` int(10) NOT NULL auto_increment,
  `ttedu_webname` varchar(255) default NULL,
  `ttedu_titlename` varchar(255) default NULL,
  `ttedu_keyword` varchar(255) default NULL,
  `ttedu_description` varchar(255) default NULL,
  `ttedu_website` varchar(255) default NULL,
  `ttedu_tel` varchar(50) default NULL,
  `ttedu_qq` varchar(20) default NULL,
  `ttedu_contact` varchar(225) default NULL,
  `ttedu_mianduimianfukuan` varchar(225) default NULL,
  `ttedu_shifouguanbiweb` tinyint(1) default '0',
  `ttedu_guanbiwangzshuom` varchar(100) default NULL,
  PRIMARY KEY  (`ttedu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for set_yinghang_info
-- ----------------------------
CREATE TABLE `set_yinghang_info` (
  `ttedu_id` int(10) NOT NULL auto_increment,
  `ttedu_kaihuhang` varchar(60) default NULL,
  `ttedu_kaihuhangaddress` varchar(255) default NULL,
  `ttedu_huming` varchar(100) default NULL,
  `ttedu_yinhangkatype` varchar(100) default NULL,
  `ttedu_zhanghao` varchar(60) default NULL,
  `ttedu_shifouxianshi` tinyint(1) default '0',
  PRIMARY KEY  (`ttedu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for set_youqing
-- ----------------------------
CREATE TABLE `set_youqing` (
  `ttedu_id` int(10) NOT NULL auto_increment,
  `ttedu_webname` varchar(100) default NULL,
  `ttedu_website` varchar(120) default NULL,
  `ttedu_neiyesite` varchar(120) default NULL,
  `ttedu_weblogo` varchar(120) default NULL,
  `ttedu_showtype` varchar(50) default NULL,
  PRIMARY KEY  (`ttedu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for shequ_info
-- ----------------------------
CREATE TABLE `shequ_info` (
  `ttedu_id` int(10) NOT NULL auto_increment,
  `ttedu_shequ_title` varchar(200) default NULL,
  `ttedu_tiezi_content` text,
  `ttedu_fbdate` int(11) default NULL,
  `ttedu_shifouzhiding` tinyint(1) default '0',
  `ttedu_shifouretie` tinyint(1) default '0',
  `ttedu_shifoushenghe` tinyint(1) default '0',
  `ttedu_userid` int(10) default '0',
  `ttedu_mid` int(10) default '0',
  `ttedu_zhuti_id` int(10) default NULL,
  PRIMARY KEY  (`ttedu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for shequ_reply_info
-- ----------------------------
CREATE TABLE `shequ_reply_info` (
  `ttedu_id` int(10) NOT NULL auto_increment,
  `ttedu_reply_content` text,
  `ttedu_fbdate` int(11) default NULL,
  `ttedu_userid` int(10) default '0',
  `ttedu_mid` int(10) default '0',
  `ttedu_info_id` int(10) default '0',
  PRIMARY KEY  (`ttedu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for shequ_zhuti
-- ----------------------------
CREATE TABLE `shequ_zhuti` (
  `ttedu_id` int(10) NOT NULL auto_increment,
  `ttedu_zhuti_topic` varchar(200) default NULL,
  `ttedu_adddate` int(11) default NULL,
  `ttedu_paixu` int(10) default NULL,
  PRIMARY KEY  (`ttedu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for shiping_jishu
-- ----------------------------
CREATE TABLE `shiping_jishu` (
  `ttedu_id` int(10) NOT NULL auto_increment,
  `ttedu_jishu` varchar(30) default NULL,
  `ttedu_pic` varchar(255) default NULL,
  `ttedu_bofangdizhi` varchar(255) default NULL,
  `ttedu_spinfo_id` int(10) default NULL,
  PRIMARY KEY  (`ttedu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for spbtype_info
-- ----------------------------
CREATE TABLE `spbtype_info` (
  `ttedu_id` int(10) NOT NULL auto_increment,
  `ttedu_spbtype_name` varchar(200) default NULL,
  `ttedu_spbfbdate` int(11) default NULL,
  PRIMARY KEY  (`ttedu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for spinfo_detail
-- ----------------------------
CREATE TABLE `spinfo_detail` (
  `ttedu_id` int(10) NOT NULL auto_increment,
  `ttedu_sptitle` varchar(200) default NULL,
  `ttedu_spcontent` text,
  `ttedu_sppic` varchar(255) default NULL,
  `ttedu_sppaixu` int(10) default '0',
  `ttedu_spjishu` int(10) default '0',
  `ttedu_spbtype_id` int(10) default '0',
  `ttedu_spstype_id` int(10) default '0',
  PRIMARY KEY  (`ttedu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for spstype_info
-- ----------------------------
CREATE TABLE `spstype_info` (
  `ttedu_id` int(10) NOT NULL auto_increment,
  `ttedu_spstype_name` varchar(200) default NULL,
  `ttedu_spsfbdate` datetime default NULL,
  `ttedu_spsbtype_id` int(10) default '0',
  PRIMARY KEY  (`ttedu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for stype_ down
-- ----------------------------
CREATE TABLE `stype_ down` (
  `ttedu_id` int(10) NOT NULL auto_increment,
  `ttedu_stype_name` varchar(200) default NULL,
  `ttedu_sfbdate` datetime default NULL,
  `ttedu_btype_id` int(10) default '0',
  PRIMARY KEY  (`ttedu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for stype_info
-- ----------------------------
CREATE TABLE `stype_info` (
  `ttedu_id` int(10) NOT NULL auto_increment,
  `ttedu_stype_name` varchar(200) default NULL,
  `ttedu_sfbdate` datetime default NULL,
  `ttedu_btype_id` int(10) default NULL,
  PRIMARY KEY  (`ttedu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for teach_info
-- ----------------------------
CREATE TABLE `teach_info` (
  `ttedu_id` int(10) NOT NULL auto_increment,
  `ttedu_username` varchar(40) default NULL,
  `ttedu_password` varchar(68) default NULL,
  `ttedu_chenfu` varchar(60) default NULL,
  `ttedu_sex` varchar(2) default NULL,
  `ttedu_birth` varchar(20) default NULL,
  `ttedu_jiguan` varchar(40) default NULL,
  `ttedu_mqxueli` varchar(20) default NULL,
  `ttedu_mqshengfei` varchar(20) default NULL,
  `ttedu_szquxian` varchar(20) default NULL,
  `ttedu_address` varchar(60) default NULL,
  `ttedu_biyexuexiao` varchar(40) default NULL,
  `ttedu_renjiaoxuexiao` varchar(40) default NULL,
  `ttedu_shenfenzheng` varchar(22) default NULL,
  `ttedu_muqianxueli` varchar(10) default NULL,
  `ttedu_zhuanye` varchar(28) default NULL,
  `ttedu_shengfen` varchar(20) default NULL,
  `ttedu_gongzuozhusuo` varchar(30) default NULL,
  `ttedu_msn` varchar(40) default NULL,
  `ttedu_email` varchar(40) default NULL,
  `ttedu_youbian` varchar(10) default NULL,
  `ttedu_tongxundizhi` varchar(60) default NULL,
  `ttedu_renjiaoxueke` varchar(255) default NULL,
  `ttedu_xuexiaoleibie` varchar(40) default NULL,
  `ttedu_old` varchar(3) default '0',
  `ttedu_renjiaoduixiang` varchar(30) default NULL,
  `ttedu_zuinanshoukemu` varchar(100) default NULL,
  `ttedu_keyijiajiaoshijian` varchar(50) default NULL,
  `ttedu_jiajiaodiqu` varchar(50) default NULL,
  `ttedu_shouxuandianhua` varchar(12) default NULL,
  `ttedu_beiyongdianhua` varchar(12) default NULL,
  `ttedu_shuanghaodianhua` varchar(24) default NULL,
  `ttedu_bokedizhi` varchar(225) default NULL,
  `ttedu_suohuozhengshu` varchar(120) default NULL,
  `ttedu_fudaofangshi` varchar(28) default NULL,
  `ttedu_xingshuiyaoqiu` varchar(12) default NULL,
  `ttedu_xiangxijieshao` text,
  `ttedu_xueyuanpingjia` text,
  `ttedu_shengyujinge` double default '0',
  `ttedu_shifoushengji` int(4) default '0',
  `ttedu_huiyuanzhaopian` varchar(225) default NULL,
  `ttedu_zhucedate` int(11) default NULL,
  `ttedu_logindate` int(11) default NULL,
  `ttedu_huiyuanjieshushijian` int(11) default NULL,
  `ttedu_yxzhaopiancounts` smallint(5) default '6',
  `ttedu_yxzhengjiancounts` smallint(5) default '6',
  `ttedu_yuanlaijieshao` text,
  `ttedu_shifoukejianpic` smallint(5) default '0',
  `ttedu_shengheishifoutongguo` tinyint(1) default '0',
  `ttedu_zhengshu` varchar(255) default NULL,
  `ttedu_shifoushengji_time` int(5) default NULL,
  `ttedu_shengheixiugai` int(1) default '0',
  PRIMARY KEY  (`ttedu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for teach_pingun
-- ----------------------------
CREATE TABLE `teach_pingun` (
  `ttedu_id` int(10) NOT NULL auto_increment,
  `ttedu_jibie` tinyint(1) default '3',
  `ttedu_content` text,
  `ttedu_adddate` int(11) default NULL,
  `ttedu_teachid` int(10) default NULL,
  `ttedu_userid` int(10) default NULL,
  PRIMARY KEY  (`ttedu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for teach_to_stu
-- ----------------------------
CREATE TABLE `teach_to_stu` (
  `ttedu_id` int(10) NOT NULL auto_increment,
  `ttedu_teachid` int(10) default NULL,
  `ttedu_jiajiaoid` int(10) default NULL,
  `ttedu_beizhu` varchar(255) default NULL,
  `ttedu_adddate` int(11) default NULL,
  `ttedu_shifouchuli` int(2) default '0',
  `ttedu_code` int(10) NOT NULL default '0',
  PRIMARY KEY  (`ttedu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for yuyue_teach_info
-- ----------------------------
CREATE TABLE `yuyue_teach_info` (
  `ttedu_id` int(10) NOT NULL auto_increment,
  `ttedu_code` int(10) default NULL,
  `ttedu_lianxiren` varchar(20) default NULL,
  `ttedu_tel` varchar(20) default NULL,
  `ttedu_mob` varchar(20) default NULL,
  `ttedu_weizhi` varchar(200) default NULL,
  `ttedu_diqumiaoshu` varchar(255) default NULL,
  `ttedu_sex` varchar(2) default NULL,
  `ttedu_old` int(2) unsigned default NULL,
  `ttedu_xueke` varchar(200) default NULL,
  `ttedu_shangkeshijian` varchar(100) default NULL,
  `ttedu_xueyuanmiaoshu` varchar(225) default NULL,
  `ttedu_jiaoshiyaoqiu` varchar(200) default NULL,
  `ttedu_shoufeiyaoqiu` varchar(40) default NULL,
  `ttedu_teach_id` int(10) default NULL,
  `ttedu_stuid` int(10) default NULL,
  `ttedu_beizhu` varchar(255) default NULL,
  `ttedu_adddate` int(11) default NULL,
  `ttedu_shifouchuli` int(1) default NULL,
  PRIMARY KEY  (`ttedu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `ad` VALUES ('1', '阿斯顿官方公会', '23455', '4e22def51f84e.jpg', '45', '12', '246', '1310908149', '0');
INSERT INTO `ad` VALUES ('2', '234', '124', '4e22dee17267f.jpg', '12', '12', '24', '1310908129', '0');
INSERT INTO `ad` VALUES ('3', '广告三', '', '4e22df19e15f9.jpg', '0', '0', '', '1310908185', '0');
INSERT INTO `btype_down` VALUES ('1', '幼教资料', '1310212180');
INSERT INTO `btype_down` VALUES ('2', '小学资料', '1310266776');
INSERT INTO `btype_down` VALUES ('3', '初中资料', '1310212359');
INSERT INTO `btype_down` VALUES ('4', '高中资料', '1310212367');
INSERT INTO `btype_down` VALUES ('5', '其他资料', '1310212387');
INSERT INTO `btype_info` VALUES ('15', '新闻动态', '1309340482');
INSERT INTO `btype_info` VALUES ('17', '助教公告', '1309340486');
INSERT INTO `btype_info` VALUES ('18', '小学教育', '1309340487');
INSERT INTO `btype_info` VALUES ('19', '初中教育', '1309413241');
INSERT INTO `btype_info` VALUES ('20', '高中教育', '1309413242');
INSERT INTO `btype_info` VALUES ('21', '中考咨询', '1309413244');
INSERT INTO `btype_info` VALUES ('22', '高考咨询', '1309413246');
INSERT INTO `btype_info` VALUES ('23', '常见问题', '1309413249');
INSERT INTO `btype_info` VALUES ('24', '心灵沟通', '1309413252');
INSERT INTO `btype_info` VALUES ('25', '好书推荐', '1309413253');
INSERT INTO `btype_info` VALUES ('26', '家教之路', '1309413255');
INSERT INTO `btype_info` VALUES ('27', '其他', '1309413257');
INSERT INTO `chongzhi_detail` VALUES ('1', 'agferhy', '12', null, 'mm', '12', '1', null);
INSERT INTO `chongzhi_detail` VALUES ('2', 'agferhy', '30', null, '25', '12', '0', null);
INSERT INTO `chongzhi_detail` VALUES ('3', 'agferhy', '40', null, 'arg', '12', '1', null);
INSERT INTO `chongzhi_detail` VALUES ('4', '密码修改', '20', null, '他vh', '12', '1', null);
INSERT INTO `chongzhi_detail` VALUES ('5', null, null, null, null, '2', '0', null);
INSERT INTO `chongzhi_detail` VALUES ('6', null, null, null, null, '2', '0', null);
INSERT INTO `chongzhi_detail` VALUES ('19', '密码修改', '1', '2011-07-16 22:42:53', '', '12', '0', null);
INSERT INTO `chongzhi_detail` VALUES ('20', '密码修改', '1', '2011-07-16 22:44:15', '1', '12', '0', null);
INSERT INTO `chongzhi_detail` VALUES ('21', '密码修改', '22', '2011-07-16 23:27:13', '哀伤的歌', '12', '0', null);
INSERT INTO `chongzhi_detail` VALUES ('22', '密码修改', '1.96', '2011-07-17 00:07:38', '2', '12', '0', null);
INSERT INTO `chongzhi_detail` VALUES ('23', '密码修改', '20', '2011-07-17 00:33:03', '222', '12', '0', '20110716163303902');
INSERT INTO `chongzhi_detail` VALUES ('24', '密码修改', '30', '2011-07-17 01:16:42', '12345', '12', '0', '20110716171642651');
INSERT INTO `chongzhi_detail` VALUES ('25', '密码修改', '123', '2011-07-17 01:27:48', '123', '12', '0', '20110716172748724');
INSERT INTO `chongzhi_detail` VALUES ('26', '密码修改', '111', '2011-07-17 01:28:23', '2355', '12', '0', '20110716172823937');
INSERT INTO `chongzhi_detail` VALUES ('27', '密码修改', '23', '2011-07-17 01:30:17', '543', '12', '0', '20110716173017398');
INSERT INTO `chongzhi_detail` VALUES ('28', '密码修改', '123', '2011-07-17 01:38:54', '12466', '12', '0', '20110716173854877');
INSERT INTO `chongzhi_detail` VALUES ('29', '密码修改', '234', '2011-07-17 01:39:48', '2344576', '12', '0', '20110716173948851');
INSERT INTO `chongzhi_detail` VALUES ('30', '密码修改', '4', '2011-07-17 01:47:22', '2314', '12', '0', '20110716174722674');
INSERT INTO `chongzhi_detail` VALUES ('31', '密码修改', '2', '2011-07-17 01:53:53', '3', '12', '0', '20110716175353348');
INSERT INTO `chongzhi_detail` VALUES ('32', '密码修改', '23', '2011-07-17 01:57:31', '阿瑟费', '12', '0', '20110716175731258');
INSERT INTO `chongzhi_detail` VALUES ('33', '密码修改', '3124', '2011-07-17 01:58:29', '33', '12', '0', '20110716175829640');
INSERT INTO `chongzhi_detail` VALUES ('34', '密码修改', '12', '2011-07-17 01:59:03', '发生的', '12', '0', '20110716175903320');
INSERT INTO `chongzhi_detail` VALUES ('35', '密码修改', '234', '2011-07-17 02:01:10', '的风格', '12', '0', '20110716180110600');
INSERT INTO `chongzhi_detail` VALUES ('36', '密码修改', '12', '2011-07-17 02:04:55', '222', '12', '0', '20110716180455732');
INSERT INTO `chongzhi_detail` VALUES ('37', '密码修改', '1', '2011-07-17 02:05:57', '2', '12', '0', '20110716180557389');
INSERT INTO `chongzhi_detail` VALUES ('38', '密码修改', '23', '2011-07-17 02:06:52', '2', '12', '0', '20110716180652526');
INSERT INTO `chongzhi_detail` VALUES ('39', '密码修改', '2', '2011-07-17 02:13:54', '3', '12', '0', '20110716181354888');
INSERT INTO `chongzhi_detail` VALUES ('40', '密码修改', '4', '2011-07-17 02:15:17', 'DDD', '12', '0', '20110716181517875');
INSERT INTO `chongzhi_detail` VALUES ('41', '密码修改', '5', '2011-07-17 02:15:40', 'FFF', '12', '0', '20110716181540182');
INSERT INTO `chongzhi_detail` VALUES ('42', '密码修改', '5', '2011-07-17 02:16:15', 'FRF', '12', '0', '20110716181615347');
INSERT INTO `chongzhi_detail` VALUES ('43', '密码修改', '5', '2011-07-17 02:18:33', 'FFF', '12', '0', '20110716181833496');
INSERT INTO `chongzhi_detail` VALUES ('44', '密码修改', '5', '2011-07-17 02:18:50', 'FFF', '12', '0', '20110716181850258');
INSERT INTO `chongzhi_detail` VALUES ('45', '密码修改', '6', '2011-07-17 02:19:07', 'GHHGHJ', '12', '0', '20110716181907912');
INSERT INTO `chongzhi_detail` VALUES ('46', '密码修改', '5', '2011-07-17 02:19:58', 'FGGGF', '12', '0', '20110716181958215');
INSERT INTO `chongzhi_detail` VALUES ('47', '密码修改', '7654', '2011-07-17 02:20:40', 'GF', '12', '0', '20110716182040597');
INSERT INTO `chongzhi_detail` VALUES ('48', '密码修改', '23', '2011-07-17 02:22:21', '恶妇人', '12', '0', '20110716182221634');
INSERT INTO `chongzhi_detail` VALUES ('49', '密码修改', '44', '2011-07-17 02:23:05', '444', '12', '0', '20110716182305224');
INSERT INTO `chongzhi_detail` VALUES ('50', '密码修改', '3', '2011-07-17 02:24:18', '点点滴滴', '12', '0', '20110716182418362');
INSERT INTO `chongzhi_detail` VALUES ('51', '密码修改', '4', '2011-07-17 02:26:26', ' 额', '12', '0', '20110716182626215');
INSERT INTO `chongzhi_detail` VALUES ('52', '密码修改', '65', '2011-07-17 02:28:05', '防腐层v', '12', '0', '20110716182805497');
INSERT INTO `chongzhi_detail` VALUES ('53', '密码修改', '234', '2011-07-17 02:32:49', '受到广泛', '12', '0', '20110716183249542');
INSERT INTO `chongzhi_detail` VALUES ('54', '密码修改', '333', '2011-07-17 03:22:56', '备注2111', '12', '0', '20110716192246780');
INSERT INTO `chongzhi_detail` VALUES ('55', '密码修改', '33', '2011-07-17 03:24:49', '备注2ww', '12', '0', '20110716192442672');
INSERT INTO `chongzhi_detail` VALUES ('56', '密码修改', '123', '2011-07-17 03:32:36', '1234', '12', '0', '20110716193236776');
INSERT INTO `chongzhi_detail` VALUES ('57', '密码修改', '2344', '2011-07-17 03:34:01', 'dfsdg', '12', '0', '20110716193401803');
INSERT INTO `chongzhi_detail` VALUES ('58', '密码修改', '10', '2011-07-17 03:35:26', 'asdgf', '12', '0', '20110716193526500');
INSERT INTO `chongzhi_detail` VALUES ('59', '密码修改', '12', '2011-07-17 03:36:38', 'asdf', '12', '0', '20110716193638511');
INSERT INTO `chongzhi_detail` VALUES ('60', '密码修改', '123', '2011-07-17 03:37:35', '123fsdf', '12', '0', '20110716193735890');
INSERT INTO `chongzhi_detail` VALUES ('61', '密码修改', '123', '2011-07-17 03:39:25', 'sdfg', '12', '0', '20110716193925784');
INSERT INTO `chongzhi_detail` VALUES ('62', '密码修改', '0.01', '2011-07-18 16:57:46', '备注2', '12', '0', '20110718085741397');
INSERT INTO `huiyuan_info` VALUES ('1', '123', '123', '男', '13', '1995-02-03', '110', '120', '1234567', 'ksdfgh@110.com', '123456', '654321');
INSERT INTO `huiyuan_info` VALUES ('2', 'h001', '123', '男', '12', '1988-04-21', '654321', '123456', '111', '123@123.com', '1310636065', null);
INSERT INTO `huiyuan_info` VALUES ('3', 'h002', '123', '男', '23', '1960-07-15', '123455', '123456', '4562', '123@123.com', '1310636343', null);
INSERT INTO `info_detail` VALUES ('1', '常见问题一xx', '常见问题一 内容', '4e1906467ea9b.jpg', '1', '23', '0');
INSERT INTO `info_detail` VALUES ('3', 'cgbstrhy', 'sdfjj', '4e1700b9d08dc.jpg', '1', '19', '0');
INSERT INTO `info_detail` VALUES ('5', 'sk;dtyu', 'fhk', '4e16fc416cc5e.jpg', '2', '21', '0');
INSERT INTO `info_detail` VALUES ('6', 'shj', '', null, '9999', '15', '0');
INSERT INTO `info_detail` VALUES ('7', 'tttt', 'dghh', '4e16e596df40b.jpg', '2', '26', '0');
INSERT INTO `info_detail` VALUES ('8', 'test', 'argfhjklhuwe', null, '1', '19', '0');
INSERT INTO `info_detail` VALUES ('9', '公告一', '公告一&nbsp; 内容', null, '1', '17', '0');
INSERT INTO `info_detail` VALUES ('10', '公告二', '公告二 内容', null, '2', '17', '0');
INSERT INTO `info_detail` VALUES ('11', '公告三', '公告三 内容', null, '3', '17', '0');
INSERT INTO `info_detail` VALUES ('12', '公告四', '公告四&nbsp; 内容', null, '4', '17', '0');
INSERT INTO `info_detail` VALUES ('13', '着dedecms v5.6模板.还有 自身功能Dll的限制,使得免费版差不多成鸡肋.', '小学教育', null, '1', '18', '0');
INSERT INTO `info_detail` VALUES ('14', '高中教育', '高中教育', null, '1', '20', '0');
INSERT INTO `info_detail` VALUES ('15', '高考咨询', '高考咨询', null, '1', '22', '0');
INSERT INTO `info_detail` VALUES ('16', '常见问题', '', null, '1', '23', '0');
INSERT INTO `info_detail` VALUES ('17', '心灵沟通', '心灵沟通', null, '1', '24', '0');
INSERT INTO `info_detail` VALUES ('18', '好书推荐', '好书推荐', null, '1', '25', '0');
INSERT INTO `info_detail` VALUES ('19', '常见问题1', '常见问题1', null, '2', '23', '0');
INSERT INTO `info_detail` VALUES ('20', '常见问题2', '', null, '3', '23', '0');
INSERT INTO `info_detail` VALUES ('21', '常见问题4', '', null, '3', '23', '0');
INSERT INTO `info_detail` VALUES ('22', '常见问题3', '', null, '4', '23', '0');
INSERT INTO `info_detail` VALUES ('23', '常见问题5', '', null, '9999', '23', '0');
INSERT INTO `info_detail` VALUES ('24', '好书推荐1', '', null, '9999', '25', '0');
INSERT INTO `info_detail` VALUES ('25', '好书推荐2', '', null, '9999', '25', '0');
INSERT INTO `info_detail` VALUES ('26', '好书推荐3', '', null, '9999', '25', '0');
INSERT INTO `info_detail` VALUES ('27', '好书推荐4', '', null, '9999', '25', '0');
INSERT INTO `info_down` VALUES ('1', 'test', 'ry', '4e23e9f945090.jpg', '4e23e9f94d392.xls', '1', '1', '1', '0', '1310976505');
INSERT INTO `info_down` VALUES ('3', '444444', 'sdfjx', '4e23ea23201ca.jpg', '4e23ea2322967.xls', '0', '9', '5', '0', '1310976547');
INSERT INTO `info_down` VALUES ('4', 'test2', 'dfghjk', '4e190c564b9f6.jpg', null, '1', '3', '2', '0', '1310974338');
INSERT INTO `info_down` VALUES ('5', '1111a', '<p>1111a</p>', '4e2c779365334.jpg', '4e2c77936c8d3.txt', '0', '1', '1', '0', '1311537043');
INSERT INTO `info_down` VALUES ('6', '5641', '5641', '4e2cf7f33abec.rar', '4e2c783697098.rar', '0', '-10', '1', '0', '1311569907');
INSERT INTO `jiajiao_info` VALUES ('1', '王小姐', null, '男', null, null, null, '小学英语', null, '7:00', null, '观音桥', null, '有耐心，有经验就可以，优', null, null, null, null, null, '1', null, null, null, null, null, null, '1', '0', '0', null, '女');
INSERT INTO `jiajiao_info` VALUES ('2', '张先生', null, '男', '23', null, '1', '高中英语', '面议', '每周六下午2点到4点', '中南海', '怀柔', '110', '无', '无', '654321', '123456', '8888888', '13232', null, null, null, null, null, null, null, '1', '1', '0', null, '男');
INSERT INTO `jiajiao_info` VALUES ('3', '李小姐', null, '男', '2', null, '1', '高三语文', '面议', '每周六下午2点到4点', 'sdajre', '通州', 'hy', 'dfg', 'jsrt', '789456', '456798', '66666', '741852ghdsf', '2', null, null, null, null, null, null, '1', '0', '0', null, '不限');
INSERT INTO `jiajiao_info` VALUES ('4', 'bbbb', null, '男', '12', null, '1', '高三语文', '面议', '', '', '怀柔', '', '', '', '2356', '157', '', '', '2', null, null, null, null, null, null, '1', '0', '1310107469', null, '女');
INSERT INTO `jiajiao_info` VALUES ('6', 'MR.chen', null, '男', '12', null, '1', '高三语文,高三语文,高三语文', null, '每周六下午2点到4点', 'ghsdfh', '平谷', '34', 'asdfasdg对老师的要求', '其他要求', '1235678905', '5678476', '5767', '123@123.com', '2', '0', '1', '2', '56', null, '30', '2', '0', '1310185129', '23', '女');
INSERT INTO `lianxi_jilu` VALUES ('1', '12', '1', '第一次联系', '123456789', '短信联系');
INSERT INTO `lianxi_jilu` VALUES ('2', '2', '2', 'fklasdklfxcjhv安慰了机卡分离', '987654321', '电话');
INSERT INTO `lianxi_jilu` VALUES ('3', '12', '1', '有一次联系', '1310748468', 'QQ');
INSERT INTO `lianxi_jilu` VALUES ('4', '12', '1', '第三次联系', '1310748721', '手机');
INSERT INTO `lianxi_jilu` VALUES ('5', '12', '1', '第四次联系', '1310748762', '手机');
INSERT INTO `lianxi_jilu` VALUES ('6', '3', '2', '你好', '1310748833', '写信');
INSERT INTO `manager_users` VALUES ('1', 'admin', 'admin', '123@123.com', '123456789', '34567', '0', '1310965430');
INSERT INTO `manager_users` VALUES ('2', 'm001', 'm001', '123@123.com', '110', '120', '1', '1310965677');
INSERT INTO `pic_zj` VALUES ('3', '0', '4e1ea4aa1928e.jpg', '12', '1310631082', 'serhyrdjyu');
INSERT INTO `pic_zj` VALUES ('4', '4', '4e1ea6d2b0ca1.jpg', '12', '1310631634', 'sdfgsf');
INSERT INTO `pic_zj` VALUES ('5', '2', '4e1eaa775aa08.jpg', '12', '1310632567', '13ga');
INSERT INTO `pic_zj` VALUES ('6', '4', '4e1eaad3764aa.jpg', '12', '1310632659', 'asdf');
INSERT INTO `pic_zj` VALUES ('7', '3', '4e1eaae7671fe.jpg', '12', '1310632679', 'asdfasd');
INSERT INTO `set_liuyan` VALUES ('1', '1111', '234676324', '46y2345@degf.com', '留言1', '　这里是建议投诉专区，您如果有什么好的建议、或者在预约家教中遇到什么问题、以及对我们工作人员服务是否满意、希望易教在哪些方面有所改进，请在这里输入！易教网感谢您的留言，我们将努力做得更好！', null, 'Ok\r\n阿斯顿飞', '1310759411');
INSERT INTO `set_liuyan` VALUES ('2', '1111', '234676324', '46y2345@degf.com', '留言二', '请求时间 : 2011-07-13 15:46:37\r\n用户代理 : Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 5.1; Trident/4.0)\r\n', '1310543299', '可以', '1310759400');
INSERT INTO `set_liuyan` VALUES ('3', '1111', '234676324', '46y2345@degf.com', '爱对方手机', '阿哥看见', '1310757901', null, null);
INSERT INTO `set_pay_info` VALUES ('1', '支付宝', '支付宝很烂', 'z123456', 'z654321', '2', '', '0', '1', '0');
INSERT INTO `set_pay_info` VALUES ('2', '财付通', '财付通也很烂', '1900000109', '8934e7d15453e97507ef794cf7b0519d', '3', '', '0', '2', '1');
INSERT INTO `set_pay_info` VALUES ('3', '网银', '网银更烂', '1001', 'test', '4', '', '0', '3', '1');
INSERT INTO `set_web_info` VALUES ('1', '助教网', '助教网', '助教网', 'dfg', '', '', '', '', '', '0', '系统维护');
INSERT INTO `set_yinghang_info` VALUES ('1', '中国建设银行', 'asdgf ', '123', '银行信用卡', '', '0');
INSERT INTO `set_yinghang_info` VALUES ('2', '中农业银行', 'bbb', '456', '银行信用卡', '3456', '0');
INSERT INTO `set_yinghang_info` VALUES ('3', '中农业银行', 'aaa', '789', '银行信用卡', '976', '1');
INSERT INTO `set_yinghang_info` VALUES ('4', '中国建设银行', 'sdg', '', '银行信用卡', '', '0');
INSERT INTO `set_yinghang_info` VALUES ('5', '中国银行', 'cc', '', '银行信用卡', '', '1');
INSERT INTO `set_yinghang_info` VALUES ('6', '中国建设银行', 'ddd', '', '银行信用卡', '', '0');
INSERT INTO `set_youqing` VALUES ('1', '国防部', 'http://123.com', '321.com', '123456', '345');
INSERT INTO `set_youqing` VALUES ('2', '教育部', 'http://www.edu.com', 'sdgf', 'sdgh', 'wafgh');
INSERT INTO `set_youqing` VALUES ('3', '财政部', 'http://www.edu.com', 'http://www.England.com', '764', '奇他');
INSERT INTO `set_youqing` VALUES ('4', '美利坚合众国', 'http://www.aaaa.com', 'http://www.England.com', '3567', 'eryhc');
INSERT INTO `set_youqing` VALUES ('5', 'England', 'http://www.England.com', 'http://www.England.com', '525', '7ygsss');
INSERT INTO `shequ_info` VALUES ('1', '社区帖子一', '社区帖子一内容', '35', '1', '0', '1', '1', '0', '1');
INSERT INTO `shequ_info` VALUES ('2', '社区帖子二', '社区帖子二内容', '123456', '0', '0', '1', '9', '1', '1');
INSERT INTO `shequ_info` VALUES ('3', '主题帖子一', '主题帖子一内容', '1245', '1', '1', '0', '3', '0', '2');
INSERT INTO `shequ_info` VALUES ('4', 'test', 'aestj', '0', '1', '1', '0', '2', '1', '2');
INSERT INTO `shequ_info` VALUES ('6', '孩子就不好多说话', '父母对孩子的教育，何尝想过方法和技巧，以为全心全意为他们考虑，就会获得孩子的认同，非也！他们有几个真正能懂父母的心，他们只不过把父母当做危险时的保护神，开心时的伙伴，生气时的出气筒罢了，因为他们只是孩子！\r\n教育是一门艺术，每一个父母，当你们在埋怨教师教育方法不好时，你是否想过，你才是他最早、', '1310388563', '1', '0', '0', '1', '2', '1');
INSERT INTO `shequ_info` VALUES ('7', '父母对孩子的教育', '第三个秘决是注意孩子的反应与态度。现代父母由于工作忙碌，在和孩子说话时，常常会急着表示自己的意见和指示，期望孩子乖乖照自己的话做，最好不要有意见。所以，往往没有很仔细地把孩子的话听完，也忽略了孩子的反应。但是和孩子说话时，如果不了解他们的想法及立场，而让孩子感觉与父母沟通会令他不舒服，他们自然而然会避免接触，凡事不愿意向父母透露，亲子间的代沟必然越来越深。 \r\n\r\n第四个秘决是体会孩子感受。当孩子在外面受了委屈，与好朋友或心爱的宠物分离时，他细腻的小心灵会难过半天。假如这个时候孩子向父母哭诉，父母却只是一味地告诉他“没关系，坚强一点”“这没什么好难过的”“你真没用，还敢哭”，会让孩子觉得父母一点都不能体会他的感受。若父母能以同情和理解的态度对待孩子，适时安抚他、给予些亲情慰藉，相信会有截然不同的效果。 \r\n\r\n第五个秘决是了解孩子的发展有度。明白孩子的发展程度相当重要，因为如果父母尽说些孩子无法理解的话，或提出一些孩子达不到的要求，相信不但孩子觉得辛苦，压力大，亲子间对话也势必难以搭得上线。 \r\n\r\n第六个秘决是回答孩子的问话。孩子提出问题时，应先了解其真正含意，并针对孩子的需要做回答。例如孩子问：“妈妈，你要不要去买菜？”这个问题的真正意义其实是：“妈妈，我想跟你一起去买菜。”假如你知道孩子的真正目的，就可以说；“要啊！你要不要一起去？”孩子听了必定会很高兴。 此外，对于孩子所提的知识性问题，父母也要慎重回答，或带着孩子一起寻找答案。这样，孩子以后不论碰到什么问题，都会主动向父母询问。 \r\n\r\n第七个秘决是避免用“我命令你......”，“我警告你......”，“你最好赶快......”，“你真答”，“你太让我失望了”等带有指挥、命令、警告、威胁、责备、谩骂、拒绝等负面意义的说话语气。 \r\n\r\n第八个秘决是经常变换新鲜的话题，引起孩子的兴趣。例如：“你猜猜看今天我发生的什么事？”“你知不知道为什么小孩子最喜欢恐龙？”“如果有一天，太空人真的来到地球......”等话题，相信会比“今天过得好不好？”“快乐不快乐？”更吸引孩子。 \r\n\r\n第九个秘决是充实孩子的生活经验。亲子对话的题材，往往来自生活之中，因此培养孩子一颗敏锐好奇的心是很重要的。父母可以带领孩子观察身边的各种事物，如一花一草一木，路上车子的颜色、造型、品牌，街上行人的穿着打扮，说话内容（百货橱窗、林林总总）都可以成为谈话的素材。善用你的巧思去开发吧！\r\n\r\n', '1310388640', '0', '0', '0', '2', '1', '1');
INSERT INTO `shequ_info` VALUES ('8', '特哦阿斯顿飞', '如粪土', '1310442964', '1', '0', '1', '0', '0', '4');
INSERT INTO `shequ_info` VALUES ('10', 'BBS', 'ok', '1310793442', '1', '1', '1', '0', '0', '5');
INSERT INTO `shequ_info` VALUES ('11', 'asdf', 'asdghh', '1310793918', '0', '0', '0', '2', '2', '3');
INSERT INTO `shequ_reply_info` VALUES ('4', '很好很强大', null, '2', '1', '2');
INSERT INTO `shequ_reply_info` VALUES ('6', '再发一条', null, '0', '1', '2');
INSERT INTO `shequ_reply_info` VALUES ('7', 'go..........', null, '4', '1', '2');
INSERT INTO `shequ_reply_info` VALUES ('8', '最后一次\r\n', null, '6', '1', '2');
INSERT INTO `shequ_reply_info` VALUES ('9', '还来一次', null, '7', '1', '2');
INSERT INTO `shequ_reply_info` VALUES ('10', '时间测试', '1310387782', '2', '1', '2');
INSERT INTO `shequ_reply_info` VALUES ('11', 'sdfkhal;sdkho;', '1310388661', '2', '1', '7');
INSERT INTO `shequ_reply_info` VALUES ('12', '沙发。。。。', '1310388724', '2', '1', '4');
INSERT INTO `shequ_reply_info` VALUES ('15', 'h001又来回复', '1310794997', '2', '2', '4');
INSERT INTO `shequ_reply_info` VALUES ('16', '3456', '1310962316', '12', '1', '4');
INSERT INTO `shequ_zhuti` VALUES ('1', '社区版块一', '1310356960', '1');
INSERT INTO `shequ_zhuti` VALUES ('2', '社区主题一', '1310791831', '2');
INSERT INTO `shequ_zhuti` VALUES ('3', '教师之家', '1310379822', '3');
INSERT INTO `shequ_zhuti` VALUES ('4', '学生社区', '1310379833', '4');
INSERT INTO `shequ_zhuti` VALUES ('5', '英语沙龙', '1310379884', '5');
INSERT INTO `shequ_zhuti` VALUES ('6', '语文专区', '1310379926', '6');
INSERT INTO `shequ_zhuti` VALUES ('7', '数学专区', '1310379951', '7');
INSERT INTO `shiping_jishu` VALUES ('1', '第一集', null, 'http://player.youku.com/player.php/sid/XNDY0MjA4/v.swf', '1');
INSERT INTO `shiping_jishu` VALUES ('2', '第二集', '4e192f4510126.jpg', 'http://', '1');
INSERT INTO `shiping_jishu` VALUES ('3', '第三集', null, 'www....', '1');
INSERT INTO `shiping_jishu` VALUES ('4', '第四集', '4e1930e725e69.jpg', 'www....', '1');
INSERT INTO `shiping_jishu` VALUES ('5', '第五集', null, 'www....', '1');
INSERT INTO `shiping_jishu` VALUES ('6', '第一集', null, 'www....', '2');
INSERT INTO `shiping_jishu` VALUES ('7', '第二集', '4e19324076847.jpg', 'www....', '2');
INSERT INTO `spbtype_info` VALUES ('1', '幼教视频', '1310908305');
INSERT INTO `spbtype_info` VALUES ('2', '小学视频', '1310266824');
INSERT INTO `spbtype_info` VALUES ('3', '初中视频', '1310266834');
INSERT INTO `spbtype_info` VALUES ('4', '高中视频', '1310266841');
INSERT INTO `spbtype_info` VALUES ('5', '其他视频', '1310275408');
INSERT INTO `spinfo_detail` VALUES ('1', 'test1', 'agreement', '4e22dfaa8d0a4.jpg', '1', '32', '3', '0');
INSERT INTO `spinfo_detail` VALUES ('2', 'test2', 'dfg', '4e22dfb2330bf.jpg', '2', '12', '4', '0');
INSERT INTO `spinfo_detail` VALUES ('3', '初中视频1', '初中视频', '4e22dfb982b6f.jpg', '2', '3', '3', '0');
INSERT INTO `spinfo_detail` VALUES ('4', '初中视频2', '初中视频', '4e22dfc36d2d4.jpg', '3', '12', '3', '0');
INSERT INTO `spinfo_detail` VALUES ('5', '初中视频4', '初中视频', '4e22dfcb48fa3.jpg', '4', '13', '3', '0');
INSERT INTO `spinfo_detail` VALUES ('6', '初中视频5', '初中视频', '4e22dfd193a91.jpg', '5', '12', '3', '0');
INSERT INTO `teach_info` VALUES ('1', null, null, '张老师', '男', null, null, '本科毕业', '大学生', null, null, '北京大学', null, null, null, '土木工程', null, null, null, null, null, null, null, null, '0', null, '数学', null, null, null, null, null, null, null, null, null, null, null, '0', '4', '4e0b1c0d0ee93.gif', '0', null, null, '6', '6', null, '0', '1', null, null, '1');
INSERT INTO `teach_info` VALUES ('2', null, null, '张老师', '男', null, null, '大专在读', '大学生', null, null, '北京大学', null, null, null, '土木工程', null, null, null, null, null, null, '高三英语', null, '0', null, '数学', null, null, null, null, null, null, null, null, null, null, null, '0', '3', '4e0b1c1747464.jpg', '0', null, null, '6', '6', null, '0', '1', null, null, '0');
INSERT INTO `teach_info` VALUES ('3', null, null, '张老师', '男', null, null, '研究生在读', '大学生', null, null, '北京大学', null, null, null, '软件工程', null, null, null, null, null, null, null, null, '0', null, '数学', null, null, null, null, null, null, null, null, null, null, null, '0', '3', '4e0b1e7beffc4.jpg', '0', null, null, '6', '6', null, '0', '1', null, null, '0');
INSERT INTO `teach_info` VALUES ('4', 'zhangjiayu', null, '张老师', '男', null, null, '大专在读', '教师', null, null, '北京大学', null, null, null, '软件工程', null, null, null, null, null, null, null, null, '0', null, '语文', null, '朝阳', null, null, null, null, null, null, null, null, null, '0', '0', '4e0b2105b4206.jpg', '0', null, null, '6', '6', null, '0', '1', null, null, '0');
INSERT INTO `teach_info` VALUES ('5', null, null, '温家宝', '男', null, null, '研究生在读', '星级教员', null, null, null, null, null, null, '软件工程', null, null, null, null, null, null, '高三英语', null, '0', null, '语文', null, null, null, null, null, null, null, null, null, null, null, '0', '5', null, '0', null, null, '6', '6', null, '0', '1', null, null, '1');
INSERT INTO `teach_info` VALUES ('6', null, null, 'sdafgs', '男', null, null, '大专在读', '进修高中教师', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, '语文', null, null, null, null, null, null, null, null, null, null, null, '0', '1', null, '0', null, null, '6', '6', null, '0', '1', null, null, '0');
INSERT INTO `teach_info` VALUES ('7', '123', '123456', 'sdgf', '男', '355', '陕西', '大专在读', '进修高中教师', null, '西城', '', '', '520123196007151234', null, '大学英语', null, '朝阳', '', '234566', '打发', '3突然电话告诉对方', '', '', '', null, null, null, '朝阳', '1251', '', null, null, null, null, null, null, null, '0', '2', null, '0', null, null, '6', '6', null, '0', '1', null, null, '0');
INSERT INTO `teach_info` VALUES ('8', '123', '123456', 'sdgf', '男', '355', '陕西', '大专在读', '进修高中教师', null, '西城', '', '', '520123196007151234', null, '大学英语', null, '朝阳', '', '234566', '打发', '3突然电话告诉对方', '', '', '', null, null, null, null, '1251', '', null, null, null, null, null, null, null, '0', '1', null, '0', null, null, '6', '6', null, '0', '1', null, null, '0');
INSERT INTO `teach_info` VALUES ('9', 'aaaa', '', '张王李赵', '女', '1960-07-15', '重庆', '研究生在读', '进修高中教师', null, '西城', '北京大学', '重庆一中', '520123196007151234', null, '计算机', null, '宣武', '124576', 'fhsdfh@110.com', '456465', '通信地址', '高中数学，高三英语，小学语文', '北京，市重点高中', '45', '不限', '物理', '10:00-15:00', '朝阳', '368098765', '1231455', null, null, '', '网上辅导', '30元/小时', null, null, '0', '0', null, '0', null, null, '6', '6', null, '0', '0', '英语四级，', null, '0');
INSERT INTO `teach_info` VALUES ('10', 'abcd', '123456', 'abcd', '女', '1960-07-15', '四川', '本科毕业', '海外留学归国人员', null, '房山', '外交学院', '', '520123196007151234', null, 'sdrg ', null, '门头沟', '6346', '345@123.com', '345767', '345', '高三英语', '', '', '不限', '', 'asdf', 'cdz', '2346767', '345', null, null, 'sadf', '不限', '233', 'asdf', null, '0', '0', null, '0', null, null, '6', '6', null, '0', '1', '', null, '0');
INSERT INTO `teach_info` VALUES ('11', '啊啊啊啊', '', '啊啊啊啊', '男', '23456', '江西', '博士后', '高级工程师', null, '阿斯顿发生', '', '', 'dfghdhj', null, 'fjrjyser', null, '', '', '120@110.com', '', 'as他人 ', '大学英语', '', '', '不限', '', '', '全国', '120', '110', null, null, '', '不限', '', null, null, '0', '0', null, '0', null, null, '6', '6', null, '0', '0', '', null, '0');
INSERT INTO `teach_info` VALUES ('12', '1111', '1111', '密码修改', '男', '1960-07-15', '重庆', '本科毕业', '高级教师', null, '东城', '哈佛大学', '重庆一中', '123457frg', null, 'sdrghjsdfg', '重庆', '丰台', '', '46y2345@degf.com', '', 'ergjrsr', '高中数学', '国家级重点', '33', '女', '软件工程', '看', 'sdfhhh', '234676324', '11002', null, null, '士大夫', '学生上门', '面议', '修改7', null, '70', '5', '4e0b2105b4206.jpg', '0', '1311683904', '1310617754', '6', '6', '修改7', '0', '1', '', '1', '0');
INSERT INTO `teach_info` VALUES ('13', '1112', '123456', '杨先生', '男', '1986-07-15', '陕西', '大专在读', '自学考试学生', null, '平谷', '中国科学院研究生院', '', null, null, '中文', null, '延庆', '151271@126.com', '151271@126.com', '400000', '重庆', '学龄前课程,小学全科,小学语文,', '', '', '男', '', '上午12点', '海淀,东城,', '13778746161', '13778746161', null, null, null, '本人上门', '面议', '魅力人生从我开始', null, '5', '1', null, '1311685122', '1311685156', '1311685755', '6', '6', null, '0', '0', '英语四级，六级', '1', '0');
INSERT INTO `teach_pingun` VALUES ('1', '3', '很好', '1310642797', '12', '2');
INSERT INTO `teach_pingun` VALUES ('2', '4', '还是不错\r\n', '1310642911', '0', '2');
INSERT INTO `teach_pingun` VALUES ('3', '5', '这次最好', '1310642995', '12', '2');
INSERT INTO `teach_to_stu` VALUES ('1', '12', '3', null, '1310559360', '2', '1310559360');
INSERT INTO `teach_to_stu` VALUES ('2', '12', '1', null, '1310559531', '1', '1310559531');
INSERT INTO `teach_to_stu` VALUES ('3', '12', null, '要得', '1310560873', '2', '1310560873');
INSERT INTO `teach_to_stu` VALUES ('4', '12', '1', '可以', '1310560932', '0', '1310560932');
INSERT INTO `yuyue_teach_info` VALUES ('1', '123445689', '张三丰', '120', '110', '平谷', '武当山', '男', '13', '太极', '每天', '啊啊啊', '哦哦哦', '1 w/h', '12', '2', '', '1310557356', '1');
