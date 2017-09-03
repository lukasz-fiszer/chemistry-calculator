@extends('layout')

@section('title')
	Contact - @parent
@endsection

@section('head_elements')
	<link rel="canonical" href="{{ route('contact') }}">
	<meta name="description" content="Chemistry Calculator contact page">
@endsection

@section('content')
	<section class="section">
		<div class="container content">
			<h2>Contact page</h2>
		</div>
	</section>
@endsection