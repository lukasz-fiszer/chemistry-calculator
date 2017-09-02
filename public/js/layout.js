(function() {
	/*var burger = document.querySelector('.nav-toggle');
	var menu = document.querySelector('.nav-menu');*/
	var burger = document.querySelector('.navbar-burger');
	var menu = document.querySelector('.navbar-menu');
	burger.addEventListener('click', function() {
		burger.classList.toggle('is-active');
		menu.classList.toggle('is-active');
	});
})();

(function() {
	var scroll = function(){
		return document.body.scrollHeight > document.body.clientHeight;
	}
	var timeout;
	var listenerTimeout;
	var checkScroll = function(listener){
		if(listener){
			listenerTimeout = setTimeout(checkScroll, 100);
		}
		else{
			clearTimeout(listenerTimeout);
		}
		if(scroll()){
			document.body.style.height = 'auto';
		}
		else{
			document.body.style.height = '100%';
		}
	};
	window.addEventListener('resize', function(){
		clearTimeout(timeout);
		timeout = setTimeout(function(){checkScroll(true);}, 100);
	}, true);
	checkScroll();
})();