<template>
	<div class="box has-text-centered">
		<h2>Molecule:</h2>
		<h2><span v-html="moleculeHtml(molecule.formula)"></span></h2>
	</div>
</template>

<script>
	export default {
		props: {
			molecule: {
				type: Object,
				required: true
			}
		},
		data(){
			return {};
		},
		methods: {
			moleculeHtml(molecule){
				return moleculeToHtml(molecule);
			}
		}
	}
</script>