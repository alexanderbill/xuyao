var flag;
function addloc(locs,mylocs)
{
 if (mylocs.length>17) alert('您选择的项目超过18个了！请删除部分项目再选！');
 else
 {
 	for(var x=0;x<locs.length;x++)
	{
 		var opt = locs.options[x];
 		if (opt.selected)
 		{
 			flag = true;
 			for (var y=0;y<mylocs.length;y++)
 			{
 				var myopt = mylocs.options[y];
 				if (myopt.value == opt.value) flag = false;
 			}
 			if(flag)
				mylocs.options[mylocs.options.length] = new Option(opt.text, opt.value, 0, 0);
		 }
	}
 }
}
function delloc(locs,mylocs)
{
 for(var x=mylocs.length-1;x>=0;x--)
 {
	var opt = mylocs.options[x];
	if (opt.selected)
		mylocs.options[x] = null;
 }
}