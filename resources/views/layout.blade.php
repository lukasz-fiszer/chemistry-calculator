@extends('base')

@section('head')
	<meta charset="utf-8">
	<title>
		@section('title')
			Chemistry Calculator
		@show
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Łukasz Fiszer">
	{{-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.2/css/bulma.min.css"> --}}
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.5.1/css/bulma.min.css">
	<link rel="stylesheet" type="text/css" href="{{ mix('/css/style.css') }}">
@endsection

@section('body')
	@include('layout.nav')

	<div class="body-content">
		@yield('content')
	</div>

	@include('layout.footer')

	<script type="text/javascript" src="{{ mix('/js/layout.js') }}"></script>
	@if(App::environment('production'))
		<script type="text/javascript" src="https://unpkg.com/vue/dist/vue.min.js"></script>
	@else
		<script type="text/javascript" src="https://unpkg.com/vue"></script>
	@endif
	@yield('footer_elements')
@endsection