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
@endsection

@section('body')
	@include('layout.nav')
	@include('layout.header')
	@include('helper.chemical-form')
@endsection