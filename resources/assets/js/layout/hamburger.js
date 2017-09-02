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
