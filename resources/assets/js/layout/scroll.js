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