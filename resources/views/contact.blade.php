@extends('layout')

@section('title')
	Contact - @parent
@endsection

@section('head_elements')
	<link rel="canonical" href="{{ route('contact') }}">
	<meta name="description" content="Chemistry Calculator contact page">
@endsection

@section('content')
	@include('helper.frontpage-header')
	<div class="chemical-form-app">
		@include('helper.chemical-form')
	</div>
@endsection