<template>
	<div class="box has-text-centered">
		<h2>Balanced chemical equation:</h2>
		<h2>
			<template v-for="(molecule, number) in sides[0]">
				<span :class="coefficientHtmlClass(molecule.coefficient)"><b>{{ molecule.coefficient }}</b></span> <span v-html="moleculeHtml(molecule.formula)"></span> <template v-if="number != sides[0].length-1">+</template>
			</template>
			=
			<template v-for="(molecule, number) in sides[1]">
				<span :class="coefficientHtmlClass(molecule.coefficient)"><b>{{ molecule.coefficient }}</b></span> <span v-html="moleculeHtml(molecule.formula)"></span> <template v-if="number != sides[1].length-1">+</template>
			</template>
		</h2>
	</div>
</template>

<script>
	export default {
		props: {
			sides: {
				type: Array,
				required: true,
				validator: function(sides){
					return validateComponentSidesArray(sides)
				}
			}
		},
		data(){
			return {};
		},
		methods: {
			coefficientHtmlClass(coefficient){
				return moleculeCoefficientHtmlClass(coefficient);
			},
			moleculeHtml(molecule){
				return moleculeToHtml(molecule);
			}
		}
	}
</script>