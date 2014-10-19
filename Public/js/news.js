
function switchTeacher(id){
	
	hiddenAllteacher();
	switchAllBg();

	if(id == 'one'){
		document.getElementById("teacher_1").className="edu_middle_up_1";
		document.getElementById("teacher_layer_1").style.display="block";
	}
	
	if(id == 'two'){
		document.getElementById("teacher_2").className="edu_middle_up_22";
		document.getElementById("teacher_layer_2").style.display="block";
	}
	
	if(id == 'three'){
		document.getElementById("teacher_3").className="edu_middle_up_33";
		document.getElementById("teacher_layer_3").style.display="block";
	}
}

function hiddenAllteacher(){
	document.getElementById("teacher_layer_1").style.display="none";
	document.getElementById("teacher_layer_2").style.display="none";
	document.getElementById("teacher_layer_3").style.display="none";
}

function switchAllBg(){
	document.getElementById("teacher_1").className="edu_middle_up_11";
	document.getElementById("teacher_2").className="edu_middle_up_2";
	document.getElementById("teacher_3").className="edu_middle_up_3";
}