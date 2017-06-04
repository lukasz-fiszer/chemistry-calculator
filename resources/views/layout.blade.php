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
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.2/css/bulma.min.css">
	<link rel="stylesheet" type="text/css" href="/css/style.css">
@endsection

@section('body')
	@include('layout.nav')

	<div class="body-content">
		@yield('content')
	</div>

	@include('layout.footer')

	@yield('footer_elements')
@endsection