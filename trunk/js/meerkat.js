$(document).ready(function(){
	//Reset body and html margin to zero
	$('html, body').css({"margin":"0"});
	//Find element in DOM with id "meerkat" and wrap the two wrapper and container divs around it
	$('#meerkat').wrap('<div id="meerkat-wrap"><div id="meerkat-container"></div></div>');
	//Add necessary styles to the two divs we just added
	$('#meerkat-wrap').css({'position':'fixed', 'width':'100%', 'bottom':'0'});
	$('#meerkat-container').css({'background': 'url(images/background_menu.png) no repeat', 'height': '100px'});
});