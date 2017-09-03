<nav class="navbar has-shadow">
	<div class="navbar-brand">
		<a href="/" title="Chemistry Calculator index page" class="navbar-item">Chemistry Calculator</a>
		<span class="navbar-burger">
			<span></span>
			<span></span>
			<span></span>
		</span>
	</div>
	<div class="navbar-menu">
		<div class="navbar-end">
			<a href="/" title="Chemistry Calculator home page" class="navbar-item is-tab {{ $return_if_equals(Route::currentRouteName(), 'index', 'is-active') }}">Home</a>
			<a href="{{ route('about') }}" title="About and how does it work" class="navbar-item is-tab {{ $return_if_equals(Route::currentRouteName(), 'about', 'is-active') }}">About</a>
			<a href="{{ route('contact') }}" title="Contact page" class="navbar-item is-tab {{ $return_if_equals(Route::currentRouteName(), 'contact', 'is-active') }}">Contact</a>
		</div>
	</div>
</nav>