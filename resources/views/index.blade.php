@extends('layout')

@section('title')
	@parent - Balance chemical equations, calculate molar masses and more
@endsection

@section('head_elements')
	<link rel="canonical" href="{{ route('index') }}">
	<meta name="description" content="Balance chemical equations online, calculate stoichiometric coefficients and find molar masses">
@endsection

@section('content')
	@include('helper.frontpage-header')
	<div class="chemical-form-app">
		@include('helper.chemical-form')
	</div>
@endsection

@section('footer_elements')
	@parent
	<script type="text/javascript" src="{{ mix('/js/chemical-form.js') }}"></script>
@endsection