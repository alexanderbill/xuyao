var nn;
nn=1;
setTimeout('change_img()',6000);
function change_img()
{
 if(nn>4) nn=1
 setTimeout('setFocus1('+nn+')',6000);
 nn++;
 tt=setTimeout('change_img()',6000);
}
function setFocus1(i)
{
 selectLayer1(i);
}
function selectLayer1(i)
{
 switch(i)
 {
 case 1:
 document.getElementById("focusPic1").style.display="block";
 document.getElementById("focusPic2").style.display="none";
 document.getElementById("focusPic3").style.display="none";
 document.getElementById("focusPic4").style.display="none";
 document.getElementById("focusPic1nav").style.display="block";
 document.getElementById("focusPic2nav").style.display="none";
 document.getElementById("focusPic3nav").style.display="none";
 document.getElementById("focusPic4nav").style.display="none";
 break;
 case 2:
 document.getElementById("focusPic1").style.display="none";
 document.getElementById("focusPic2").style.display="block";
 document.getElementById("focusPic3").style.display="none";
 document.getElementById("focusPic4").style.display="none";
 document.getElementById("focusPic1nav").style.display="none";
 document.getElementById("focusPic2nav").style.display="block";
 document.getElementById("focusPic3nav").style.display="none";
 document.getElementById("focusPic4nav").style.display="none";
 break;
 case 3:
 document.getElementById("focusPic1").style.display="none";
 document.getElementById("focusPic2").style.display="none";
 document.getElementById("focusPic3").style.display="block";
 document.getElementById("focusPic4").style.display="none";
 document.getElementById("focusPic1nav").style.display="none";
 document.getElementById("focusPic2nav").style.display="none";
 document.getElementById("focusPic3nav").style.display="block";
 document.getElementById("focusPic4nav").style.display="none";
 break;
 case 4:
 document.getElementById("focusPic1").style.display="none";
 document.getElementById("focusPic2").style.display="none";
 document.getElementById("focusPic3").style.display="none";
 document.getElementById("focusPic4").style.display="block";
 document.getElementById("focusPic1nav").style.display="none";
 document.getElementById("focusPic2nav").style.display="none";
 document.getElementById("focusPic3nav").style.display="none";
 document.getElementById("focusPic4nav").style.display="block";
 break;
 }
}
//alert("12312");
/*
function g(o){return document.getElementById(o);} 
function HoverLi(n){ 
//如果有N个标签,就将i<=N; 
for(var i=1;i<=6;i++)
{
	g('tb_'+i).className='tit';
	g('seacbg'+i).className='undis';
}
	g('seacbg'+n).className='dis';
	g('tb_'+n).className='tit01TBc'; 
} 
function Hover(n){ 
//如果有N个标签,就将i<=N; 
for(var i=1;i<=3;i++)
{
	g('t_'+i).className='';
	g('tbc'+i).style.display='none';
}
	g('tbc'+n).style.display='block';
	g('t_'+n).className='tit01T2Bc'; 
}
//如果要做成点击后再转到请将<li>中的onclick 改成 onclick; 
//]]>
	function CheckValue(adForm)
	{
		if(document.adForm.username.value=="")
		{
			alert("对不起,用户名不能为空");
			document.adForm.username.focus();
			return (false);
		}
		
		if(document.adForm.pass.value=="")
		{
			alert("对不起,用户密码不能为空");
			document.adForm.pass.focus();
			return (false);
		}
		
		if(document.adForm.yzm.value=="")
		{
			alert("对不起,验证码不能为空");
			document.adForm.yzm.focus();
			return (false);
		}
		
		return (true);
	}
*/