<section class="section noscript-alert">
	<article class="message is-danger">
		<div class="message-header">
			<p>Enable JS</p>
			<button class="delete" aria-label="delete"></button>
		</div>
		<div class="message-body">
			<p class="is-size-5">
				This site requires JavaScript for full functionality. Please enable JS to use all features.
			</p>
		</div>
	</article>
</section>

@section('head_elements')
	@parent
	<noscript>
		<style type="text/css">
			.section.noscript-alert{
				display: block;
			}
		</style>
	</noscript>
@endsection