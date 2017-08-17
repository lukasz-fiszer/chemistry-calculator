@extends('layout')

@section('title')
	@parent - Balance chemical equations, calculate molar masses and more
@endsection

@section('content')
	@include('helper.frontpage-header')
	<form action="entry">
		<input type="text" name="query">
		<input type="submit">
	</form>
	@include('helper.chemical-form')
	@include('helper.chemical-reaction')
@endsection

@section('footer_elements')
	@parent
	<script type="text/javascript" src="{{ mix('/js/chemical-form.js') }}"></script>
@endsection