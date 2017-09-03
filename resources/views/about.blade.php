@extends('layout')

@section('title')
	How does it work - @parent
@endsection

@section('head_elements')
	<link rel="canonical" href="{{ route('about') }}">
	<meta name="description" content="How to balance chemical equations, how does Chemistry Calculator work and use algebraic method">
@endsection

@section('content')
	@include('helper.frontpage-header')
	<div class="chemical-form-app">
		@include('helper.chemical-form')
	</div>
@endsection