
/* ------使用说明----- */
/*
	添加城市方法：
	    添加组：找到id 是 "selectSub"中select标签下，添加option标签 value属性递增，找到 id 是 "selectSub",按照原有格式添加div,其id属性递增
	添加二级傅选矿选项
		复制 id 是 "selectSub" 下任意input标签，粘贴在需要添加的位置。
*/
//var grow = aa("selectSub").getElementsByTagName("option").length; //组数
//var showGrow = 0;//已打开组
//var selectCount = 0; //已选数量 
//showSelect(showGrow);
//var items = aa("selectSub").getElementsByTagName("input");
function aa(o){ //获取对象
	if(typeof(o) == "string")
	return document.getElementById(o);
	return o;
}
function openBg(state){ //遮照打开关闭控制
	if(state == 1)
	{
		aa("bg").style.display = "block";
		var h = document.body.offsetHeight > document.documentElement.offsetHeight ? document.body.offsetHeight : document.documentElement.offsetHeight;
		//var w = document.body.offsetWidth > document.documentElement.Width ? document.documentElement.offsetWidth: document.body.offsetWidth ;
	//alert(document.documentElement.Width);
	//alert(document.documentElement.offsetWidth);
		aa("bg").style.height = h + "px";
		aa("bg").style.width = document.documentElement.offsetWidth + "px";
		
	}
	else
	{
		aa("bg").style.display = "none";
	}	
}
function openSelect(state){ //选择城市层关闭打开控制
	if(state == 1)	
	{
		aa("selectItem").style.display = "block";
		aa("selectItem").style.left = (aa("bg").offsetWidth - aa("selectItem").offsetWidth)/2+"px";
		aa("selectItem").style.top = document.body.scrollTop + 30 + "px";			
		//alert(aa("bg").offsetWidth);
		//alert(aa("selectItem").offsetWidth);	
	}
	else
	{
		aa("selectItem").style.display = "none";
	}
}
/*
function showSelect(id){
	for(var i = 0 ; i < grow ;i++)
	{
		aa("c0" + i).style.display = "none";
	}
	aa("c0" + id).style.display = "block";
	showGrow = id;
}

function open(id,state){ //显示隐藏控制
	if(state == 1)
	aa(id).style.display = "block";
	aa(id).style.diaplay = "none";
}

function addPreItem(){	
	aa("previewItem").innerHTML = "";
	var len　= 0 ;
	for(var i = 0 ; i < items.length ; i++)
	{
		if(items[i].checked == true)
		{
			//len++;
			//if(len > lenMax)
			//{
			//	alert("不能超过" + lenMax +"个选项！")
			//	return false;
			//}
			var mes = "<input type='checkbox' checked='true' value='"+ items[i].value +"' onclick='copyItem(\"previewItem\",\"previewItem\");same(this);'>" + items[i].value;
			aa("previewItem").innerHTML += mes;
			//alert(items[i].value);
		}
	}
}


function makeSure(){
	//alert(1);
	//aa("makeSureItem").innerHTML = aa("previewItem").innerHTML;
	openBg(0);
	openSelect(0);
	copyItem("previewItem","makeSureItem")	
}

function copyHTML(id1,id2){
	aa(id2).innerHTML = aa("id1").innerHTML;
}
function copyItem(id1,id2){
	
	var mes = "";
	var items2 = aa(id1).getElementsByTagName("input");
	for(var i = 0 ; i < items2.length ; i++)
	{
		if(items2[i].checked == true)
		{
			mes += "<input type='checkbox' checked='true' value='"+ items2[i].value +"' onclick='copyItem(\"" + id2+ "\",\""+ id1 +"\");same(this);'>" + items2[i].value;			
		}
	}
	aa(id2).innerHTML = "";
	aa(id2).innerHTML += mes;
	//alert(aa(id2).innerHTML);
}
function same(ck){
	for(var i = 0 ; i < items.length ; i++)
	{
		if(ck.value == items[i].value)
		{
			items[i].checked = ck.checked;
		}
	}
}
)
*/	
/* 鼠标拖动 */
var oDrag = "";
var ox,oy,nx,ny,dy,dx;
function drag(e,o){
	var e = e ? e : event;
	var mouseD = document.all ? 1 : 0;
	if(e.button == mouseD)
	{
		oDrag = o.parentNode;
		//alert(oDrag.id);
		ox = e.clientX;
		oy = e.clientY;		
	}
}
function dragPro(e){
	if(oDrag != "")
	{	
		var e = e ? e : event;
		//aa(oDrag).style.left = aa(oDrag).offsetLeft + "px";
		//aa(oDrag).style.top = aa(oDrag).offsetTop + "px";
		dx = parseInt(aa(oDrag).style.left);
		dy = parseInt(aa(oDrag).style.top);
		//dx = aa(oDrag).offsetLeft;
		//dy = aa(oDrag).offsetTop;
		nx = e.clientX;
		ny = e.clientY;
		aa(oDrag).style.left = (dx + ( nx - ox )) + "px";
		aa(oDrag).style.top = (dy + ( ny - oy )) + "px";
		ox = nx;
		oy = ny;
	}
}
document.onmouseup = function(){oDrag = "";}
document.onmousemove = function(event){dragPro(event);}
