var flag;
function addloc(locs,mylocs)
{
 if (mylocs.options.length>5) alert('您选择的项目超过18个了！请删除部分项目再选！');
 else
 {
 	flag = true;
 	for (var y=0;y<mylocs.length;y++)
 	{
 		var myopt = mylocs.options[y];
 		if (myopt.value == locs) flag = false;
 	}
 	if(flag)
 		mylocs.options[mylocs.options.length] = new Option(locs, locs, 0, 0);
 }
}
function delloc(mylocs)
{
 for(var x=mylocs.length-1;x>=0;x--)
 {
	var opt = mylocs.options[x];
	if (opt.selected)
		mylocs.options[x] = null;
 }
}
