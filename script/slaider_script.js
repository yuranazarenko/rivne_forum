var TempSlaiderWidth;
var TempSlaiderHeight;
var OpFot;
var flag=true;
var Flag_big_little=true;
var SlideWisibl = true;
var numberOfElement =0; //номер картинки у масиві, яка загруженв у слайдері

var Image = document.getElementsByClassName("img_slid");
 for (var i=0; i<Image.length; i++){
 	var SRC = Image[i].getAttribute("src");
 	//console.log(SRC);
 	//OpFot=Image[i].getAttribute("src");
 	Image[i].addEventListener("click", flagFunction);// для визначення відбувається загрузка фото при Click чи при розтягуванні вікна слайдера. true - при Click на фото
 	Image[i].addEventListener("click", openSlaider);//загрузка фото у слайдер, підгонка розмірів даної фото та виствавлення її по центру
 	Image[i].addEventListener("click", numberElement);//визначення номера елемента по якому відбувся Click(хто відкрився у слай1дері)
 	Image[i].addEventListener("click", positionSlider);//для визначення позиції слайдера
 }
 function positionSlider(){
 	var lf = (window.innerWidth-300)/2;
 	document.getElementById("Slaider").style.left=lf+"px";
 	var tp = (window.innerHeight-300)/2;
 	document.getElementById("Slaider").style.top=tp+"px";
 }
 function flagFunction(){
 	flag=true;
 }
 function numberElement(){
 	for(k=0; k<Image.length; k++){
 		if(Image[k].getAttribute("src")==document.getElementById("FotoSlider").getAttribute("src")){
 			numberOfElement = k;
 			if(k==0){
 				document.getElementById("buttonLeft").setAttribute("src", "../images/slider/left_3.png");
 				document.getElementById("buttonRight").setAttribute("src", "../images/slider/right_1.png");
 			}
 			if(k==Image.length-1){
 				document.getElementById("buttonRight").setAttribute("src", "../images/slider/right_3.png");
 				document.getElementById("buttonLeft").setAttribute("src", "../images/slider/left_1.png");
 			}
 			if((k>0)&&(k<Image.length-1)){
 				document.getElementById("buttonLeft").setAttribute("src", "../images/slider/left_1.png");
 				document.getElementById("buttonRight").setAttribute("src", "../images/slider/right_1.png");
 			}
 			//console.log("numberOfElement: "+numberOfElement);

 		}
 	}
 }
 function openSlaider(){
 	if(SlideWisibl){
 		document.getElementById("Slaider").style.cssText = "display:block;";
 		SlideWisibl=false;
 	}
 	//OpFot= a;
 //стирання атрибутів щоб не відбувалось спотворення фото при повторній зміні розмірів вікна чи фотографії
 	
 		document.getElementById("FotoSlider").removeAttribute('height');
 		document.getElementById("FotoSlider").removeAttribute('width');
 	
 //стирання даних про відступи фото від країв слайдера (margin)
 	document.getElementById("FotoSlider").style.marginTop=0+"px";
 	document.getElementById("FotoSlider").style.marginLeft=0+"px";
 //загрузка фото у слайдер так щоб фото не вилазила за межі слайдера
 	console.log(typeof(this));
 	if(flag){
 		//console.log("inside");
 		OpFot = this.getAttribute("src");
 	}
 	console.log("OpFot: "+OpFot);
 	document.getElementById("FotoSlider").setAttribute("src", OpFot);
 	var SlaiderWidth = document.getElementById("Slaider").offsetWidth -2;
 	var SlaiderHeight = document.getElementById("Slaider").offsetHeight -72; //border 2, TopSpan 30, BottomSpan 40
 	var FotoWidth = document.getElementById("FotoSlider").offsetWidth;
 	var FotoHeight = document.getElementById("FotoSlider").offsetHeight;
 	//console.log("SlaiderWidth: "+SlaiderWidth);
 	//console.log("SlaiderHeight: "+SlaiderHeight);
 	//console.log("FotoWidth: "+FotoWidth);
 	//console.log("FotoHeight: "+FotoHeight);
 	if(FotoHeight>FotoWidth){
		document.getElementById("FotoSlider").height=SlaiderHeight;
		FotoWidth=document.getElementById("FotoSlider").offsetWidth;
		if(FotoWidth>SlaiderWidth){
			var koeficient = SlaiderWidth/FotoWidth;
			//console.log("koeficient(height): "+koeficient);
			document.getElementById("FotoSlider").width=SlaiderWidth;
			document.getElementById("FotoSlider").height=SlaiderHeight*koeficient;
		}
	}else {
		document.getElementById("FotoSlider").width=SlaiderWidth;
		FotoHeight=document.getElementById("FotoSlider").offsetHeight;
		if(FotoHeight>SlaiderHeight){
			var koeficient = SlaiderHeight/FotoHeight;
			//console.log("koeficient(width): "+koeficient);
			document.getElementById("FotoSlider").height=SlaiderHeight;
			document.getElementById("FotoSlider").width=SlaiderWidth*koeficient;
		}
	}
//Виставлення фото по центру(вирівнювання)
	FotoWidth = document.getElementById("FotoSlider").offsetWidth;
 	FotoHeight = document.getElementById("FotoSlider").offsetHeight;
 	SlaiderWidth = document.getElementById("Slaider").offsetWidth -2;
 	SlaiderHeight = document.getElementById("Slaider").offsetHeight -72;
 	console.log("SlaiderHeight: "+SlaiderHeight);
 	if(FotoHeight<SlaiderHeight){
 		document.getElementById("FotoSlider").style.marginTop=(SlaiderHeight-FotoHeight)/2+"px";
 	}
 	if(FotoWidth<SlaiderWidth){
 		document.getElementById("FotoSlider").style.marginLeft=(SlaiderWidth-FotoWidth)/2+"px";
 	}
 	flag_litle_foto=true;
 }
//перетягування слайдера
document.getElementById("TopSpan").addEventListener("mousedown", go);
document.getElementById("TopSpan").addEventListener("mouseup", stop);
var divMove = document.getElementById("Slaider");
var popravkaX;
var popravkaY;
function go(e){
	document.addEventListener("mousemove", move);
	//console.log("start");
	popravkaX = e.pageX - divMove.offsetLeft;
	popravkaY = e.pageY - divMove.offsetTop;
}
function stop(){
	document.removeEventListener("mousemove", move);
	//console.log("stop");
}

function move(e){
	
	//console.log("left: "+popravkaX);
	//console.log("Top: "+popravkaY);
	divMove.style.left = e.pageX - popravkaX +"px";
	divMove.style.top = e.pageY - popravkaY +"px";
}
//jquary розтягування діва(resize)
 $("#Slaider").resizable({minHeight:200,minWidth:200, resize: ResizeSliderDiv});

//динамічна зміна розмірів фотографії при зміні розмірів слайдера
function ResizeSliderDiv(){
	var FotoNowInSlider = document.getElementById("FotoSlider");
	OpFot=FotoNowInSlider.getAttribute("src");
	for(var j=0; j<Image.length; j++){
		if (Image[j].getAttribute("src")==FotoNowInSlider.getAttribute("src")){
			OpFot=Image[j].getAttribute("src");
			flag=false;
			openSlaider();
		}
	}
	
}
//Робота з кнопкакми перемикання фотографій на слайдері(вперед, назад, на весь екран)
document.getElementById("buttonLeft").addEventListener("click", GoLeft);
document.getElementById("buttonRight").addEventListener("click", GoRight);
document.getElementById("buttonBig").addEventListener("click", Go_Big_Little);
function GoLeft(){
	numberOfElement--;
	if(numberOfElement<0){numberOfElement=0;}
	else{
		OpFot=Image[numberOfElement].getAttribute("src");
		flag=false;
		openSlaider();//відкриття потрібної картинки
		numberElement();//визначення номера картинки для підставки потрібного кольору на кнопки керуванням слайдера (в ліво в право)
		ColorButtomLeftStart();//пнрнвірка чи курсор миші наведений на кнопку керування
	}
}
function GoRight(){
	numberOfElement++;
	if(numberOfElement>Image.length-1){numberOfElement=Image.length-1;}
	else{
		OpFot=Image[numberOfElement].getAttribute("src");
		flag=false;
		openSlaider();
		numberElement();
		ColorButtomRightStart();
	}
}
function Go_Big_Little(){
	if(Flag_big_little){
		TempSlaiderWidth = document.getElementById("Slaider").offsetWidth;
 		TempSlaiderHeight = document.getElementById("Slaider").offsetHeight;
 		TempSlaiderTop= document.getElementById("Slaider").offsetTop;
 		TempSlaiderLeft=document.getElementById("Slaider").offsetLeft;
 		//console.log(TempSlaiderTop);
		document.getElementById("Slaider").style.cssText = "left:0; top:0; width:100%; height:100%; border-radius:0px;";
		document.getElementById("buttonBig").setAttribute("src", "../images/slider/little_1.png");
		flag=false;
		openSlaider();
		$("#Slaider").resizable('destroy');
		document.getElementById("TopSpan").removeEventListener("mousedown", go);
		Flag_big_little=false;
		window.addEventListener('resize', resizeBigSlide);//при розгорнутому слайдері на все вікно - прі зміні розмірів вікна міняється і розмір слайдера та картинки в середені
		function resizeBigSlide(){
			flag=false;
			openSlaider();
		}
	}else{
		console.log("zmenshennia");
		//document.getElementById("Slaider").width=TempSlaiderWidth;
 		//document.getElementById("Slaider").height=TempSlaiderHeight;
 		//document.getElementById("Slaider").top = TempSlaiderTop;
 		//document.getElementById("Slaider").left =TempSlaiderLeft;
 		console.log(document.getElementById("Slaider").height);
 		document.getElementById("Slaider").style.cssText ="height:300px;";
 		console.log(document.getElementById("Slaider").height);
		document.getElementById("Slaider").style.cssText = "border-radius:10px;";
		document.getElementById("buttonBig").setAttribute("src", "../images/slider/big_1.png");
		flag=false;
		openSlaider();
	 	$("#Slaider").resizable({minHeight:200,minWidth:200, resize: ResizeSliderDiv});
	 	document.getElementById("TopSpan").addEventListener("mousedown", go);
	 	Flag_big_little=true;
	 	window.removeEventListener('resize', resizeBigSlide);
	}
}	
//ефекти при наведенні вкакзівника миші на кнопки слайдера
document.getElementById("buttonLeft").addEventListener("mouseover", ColorButtomLeftStart);
function ColorButtomLeftStart(){
	if(numberOfElement==0){
		document.getElementById("buttonLeft").setAttribute("src", "../images/slider/left_4.png");
	}else{
		document.getElementById("buttonLeft").setAttribute("src", "../images/slider/left_2.png");
	}
}
document.getElementById("buttonLeft").addEventListener("mouseout", ColorButtomLeftStop);
function ColorButtomLeftStop(){
	if(numberOfElement==0){
		document.getElementById("buttonLeft").setAttribute("src", "../images/slider/left_3.png");
	}else{
		document.getElementById("buttonLeft").setAttribute("src", "../images/slider/left_1.png");
	}
}
document.getElementById("buttonRight").addEventListener("mouseover", ColorButtomRightStart);
function ColorButtomRightStart(){
	if(numberOfElement==Image.length-1){
		document.getElementById("buttonRight").setAttribute("src", "../images/slider/right_4.png");
	}else{
		document.getElementById("buttonRight").setAttribute("src", "../images/slider/right_2.png");
	}
}
document.getElementById("buttonRight").addEventListener("mouseout", ColorButtomRightStop);
function ColorButtomRightStop(){
	if(numberOfElement==Image.length-1){
		document.getElementById("buttonRight").setAttribute("src", "../images/slider/right_3.png");
	}else{
		document.getElementById("buttonRight").setAttribute("src", "../images/slider/right_1.png");
	}
}
document.getElementById("buttonBig").addEventListener("mouseover", ColorButtomBigStart);
function ColorButtomBigStart(){
	if(Flag_big_little){
		document.getElementById("buttonBig").setAttribute("src", "../images/slider/big_2.png");
	}else{
		document.getElementById("buttonBig").setAttribute("src", "../images/slider/little_2.png");
	}
}
document.getElementById("buttonBig").addEventListener("mouseout", ColorButtomBigStop);
function ColorButtomBigStop(){
	if(Flag_big_little){
		document.getElementById("buttonBig").setAttribute("src", "../images/slider/big_1.png");
	}else{
		document.getElementById("buttonBig").setAttribute("src", "../images/slider/little_1.png");
	}
}
//Закриття закріття слайдера
document.getElementById("CloseSlider").addEventListener("click", closeWindSlider);
function closeWindSlider(){
	Flag_big_little=false;
	Go_Big_Little();
	document.getElementById("Slaider").style.cssText = "display:none;";
	document.getElementById("buttonBig").setAttribute("src", "../images/slider/big_1.png");
	SlideWisibl=true;

}

