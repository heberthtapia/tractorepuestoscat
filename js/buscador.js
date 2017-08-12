function myFunction(){
	var n=document.getElementById('bus').value;
	if(n==''){
	 document.getElementById("myDiv").innerHTML="";
	 document.getElementById("myDiv").style.border="0px";
	 document.getElementById("pers").innerHTML="";
	 return;
	}
	loadDoc("q="+n,"proc.php",function(){
	  if (xmlhttp.readyState==4 && xmlhttp.status==200){
	    document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
	    document.getElementById("myDiv").style.border="1px solid #A5ACB2";
	    }else{ document.getElementById("myDiv").innerHTML='<img src="load.gif" width="20" height="20" />'; }
	  });
}

//-------------------------------

function myFunction2(cod){
	document.getElementById("myDiv").innerHTML="";
	document.getElementById("myDiv").style.border="0px";
	loadDoc("vcod="+cod,"proc2.php",function(){
	  if (xmlhttp.readyState==4 && xmlhttp.status==200){
		document.getElementById("pers").innerHTML=xmlhttp.responseText;
		}else{ document.getElementById("pers").innerHTML='<img src="load.gif" width="50" height="50" />'; }
	  });
}