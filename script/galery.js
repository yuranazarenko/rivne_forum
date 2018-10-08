

window.onload = function(){
	var All_img = document.getElementsByClassName("img_slid");
	var Img_width = 0;
	var Img_height = 0;
	var padd_top;
	document.getElementById("Slaider").style.cssText = "display:none;"
	for(var i = 0; i <All_img.length; i++){
		Img_width = All_img[i].width;
		Img_height = All_img[i].height;
		if(Img_height>Img_width){
			All_img[i].height=196;
		}else{
			All_img[i].width=196;
			Img_height = All_img[i].height;
			padd_top=Math.floor((196-Img_height)/2);
			//console.log(i+"="+padd_top);
			All_img[i].style.paddingTop=padd_top+"px";
		}
	}
}