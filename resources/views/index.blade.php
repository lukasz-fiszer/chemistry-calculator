@extends('layout')

@section('title')
	@parent - Balance chemical equations, calculate molar masses and more
@endsection

@section('content')
	@include('helper.frontpage-header')
	{{-- <form action="entry" class="form1">
		<input type="text" name="query">
		<input type="submit">
	</form>
	<script type="text/javascript">
		let form = document.querySelector('.form1');
		form.addEventListener('submit', function(e){
			e.preventDefault();
			axios.get('/api/chemistry-query', {params: {query: form.querySelector('input').value}}).then(a => console.log(a), a => console.log(a));
			return false;
		});
	</script> --}}
	<div class="chemical-form-app">
		@include('helper.chemical-form')
		{{-- @include('helper.chemical-reaction') --}}
	</div>
@endsection

@section('footer_elements')
	@parent
	<script type="text/javascript" src="{{ mix('/js/chemical-form.js') }}"></script>
@endsection