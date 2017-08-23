@extends('layout')

@section('title')
	@parent - Balance chemical equations, calculate molar masses and more
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