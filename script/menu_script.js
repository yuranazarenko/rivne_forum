var j = "&#9776;";
function OpenMenu(){
	if(j=="&#9776;"){
		document.getElementsByClassName("menu")[0].style.cssText = "display: block;";
		document.getElementById("simvolMenu").style.cssText = "display: none;";
		document.getElementById("simvolBack").style.cssText = "display: block;";
		document.getElementById("navigation").classList.add('color');
		j = "&uArr;";
	}else{
		document.getElementsByClassName("menu")[0].style.cssText = "display: none;";
		document.getElementById("simvolMenu").style.cssText = "display: block;";
		document.getElementById("simvolBack").style.cssText = "display: none;";
		document.getElementById("navigation").classList.remove('color');
		j = "&#9776;";
	}
	
}
var navig = document.getElementById("navigation");
var positinMenu;//при прокрутці екрану (скрол) до низу меню має прилипнути по центрі екрана
positinMenu = navig.offsetLeft;
window.addEventListener('resize', resize);
function resize(){
	positinMenu = navig.offsetLeft;
		if(navig.classList.contains('fixed')){
			navig.style.left = (window.innerWidth-767)/2 + "px";
		}else{
			navig.removeAttribute("style");//видалення navig.style.left(позиції меню)  
		}
		if(window.innerWidth<767){
			navig.style.left = 0;
			navig.removeAttribute("style");//видалення navig.style.left(позиції меню)  при розширенні <762
		}
		if(window.innerWidth>767){
			document.getElementsByClassName("menu")[0].style.cssText = "display: block;";
			document.getElementById("simvolMenu").style.cssText = "display: none;";
			document.getElementById("simvolBack").style.cssText = "display: block;";
			j = "&#9776;";
		}else{
			document.getElementsByClassName("menu")[0].style.cssText = "display: none;";
			document.getElementById("simvolMenu").style.cssText = "display: block;";
			document.getElementById("simvolBack").style.cssText = "display: none;";
			navig.removeAttribute("style");//видалення navig.style.left(позиції меню)  при розширенні <762
			j = "&#9776;";
		}
	
}

window.onscroll = function(){
	if(window.innerWidth<767){
			navig.style.left = "0px";
			navig.removeAttribute("style");//видалення navig.style.left(позиції меню)  при розширенні <762
		}
	if(navig.classList.contains('fixed') && window.pageYOffset < 100){
		navig.classList.remove('fixed');
		//positinMenu=0;
		navig.removeAttribute("style");//видалення navig.style.left(позиції меню) коли прокрутки не має
		}else if (window.pageYOffset > 100) {
        navig.classList.add('fixed');//приліпили меню до верху екрана при прокрутці
        navig.style.left = positinMenu + "px";//ставимо меню по центрі під час прокрутки
      }
}