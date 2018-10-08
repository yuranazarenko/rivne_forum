
var opClim = false;
var opHis = false;
var opStd = false;
var opKult = false;
var opAdm = false;

document.getElementById("ShowHistory").addEventListener('click', openHistory);
function openHistory(){
	if(opHis){
		document.getElementById("history").style.cssText = "display: none;";
		document.getElementById("rivne").style.cssText = "display: block;";
		opHis = false;
	}else{
		document.getElementById("history").style.cssText = "display: block;";
		document.getElementById("klimat").style.cssText = "display: none;";
		document.getElementById("study").style.cssText = "display: none;";
		document.getElementById("kulture").style.cssText = "display: none;";
		document.getElementById("administrat").style.cssText = "display: none;";
		document.getElementById("rivne").style.cssText = "display: none;";
		opHis = true;
		opClim = false;
		opStd = false;
		opKult = false;
		opAdm = false;
	}
}
document.getElementById("ShowClimat").addEventListener('click', openClimat);
function openClimat(){
	if(opClim){
		document.getElementById("klimat").style.cssText = "display: none;";
		document.getElementById("rivne").style.cssText = "display: block;";
		opClim = false;
	}else{
		document.getElementById("klimat").style.cssText = "display: block;";
		document.getElementById("history").style.cssText = "display: none;";
		document.getElementById("study").style.cssText = "display: none;";
		document.getElementById("kulture").style.cssText = "display: none;";
		document.getElementById("administrat").style.cssText = "display: none;";
		document.getElementById("rivne").style.cssText = "display: none;";
		opClim = true;
		opHis = false;
		opStd = false;
		opKult = false;
		opAdm = false;
	}
}
document.getElementById("ShowStudy").addEventListener('click', openSt);
function openSt(){
	if(opStd){
		document.getElementById("study").style.cssText = "display: none;";
		document.getElementById("rivne").style.cssText = "display: block;";
		opStd = false;
	}else{
		document.getElementById("study").style.cssText = "display: block;";
		document.getElementById("history").style.cssText = "display: none;";
		document.getElementById("klimat").style.cssText = "display: none;";
		document.getElementById("kulture").style.cssText = "display: none;";
		document.getElementById("administrat").style.cssText = "display: none;";
		document.getElementById("rivne").style.cssText = "display: none;";
		opStd = true;
		opHis = false;
		opClim = false;
		opKult = false;
		opAdm = false;
	}
}
document.getElementById("ShowKulture").addEventListener('click', openKult);
function openKult(){
	if(opKult){
		document.getElementById("kulture").style.cssText = "display: none;";
		document.getElementById("rivne").style.cssText = "display: block;";
		opKult = false;
	}else{
		document.getElementById("kulture").style.cssText = "display: block;";
		document.getElementById("history").style.cssText = "display: none;";
		document.getElementById("klimat").style.cssText = "display: none;";
		document.getElementById("study").style.cssText = "display: none;";
		document.getElementById("administrat").style.cssText = "display: none;";
		document.getElementById("rivne").style.cssText = "display: none;";
		opKult = true;
		opHis = false;
		opClim = false;
		opStd = false;
		opAdm = false;
	}
}
document.getElementById("ShowAdm").addEventListener('click', openAdm);
function openAdm(){
	if(opAdm){
		document.getElementById("administrat").style.cssText = "display: none;";
		document.getElementById("rivne").style.cssText = "display: block;";
		opAdm = false;
	}else{
		document.getElementById("administrat").style.cssText = "display: block;";
		document.getElementById("history").style.cssText = "display: none;";
		document.getElementById("klimat").style.cssText = "display: none;";
		document.getElementById("study").style.cssText = "display: none;";
		document.getElementById("kulture").style.cssText = "display: none;";
		document.getElementById("rivne").style.cssText = "display: none;";
		opAdm = true;
		opHis = false;
		opClim = false;
		opStd = false;
		opKult = false;
	}
}
