function hidcom(){
	var but=document.getElementById("com_but");
	var comment=document.getElementById("comment");
		but.style.visibility="visible";
		comment.style.visibility="hidden";
		e=document.getElementsByTagName("body")[0];
        e.scrollTop=e.scrollHeight;
	}

function showcom(){
	var but=document.getElementById("com_but");
	var comment=document.getElementById("comment");
		but.style.visibility="hidden";
		comment.style.visibility="visible";
		e=document.getElementsByTagName("body")[0];
        e.scrollTop=e.scrollHeight;
	}