<template>
	<div class="box has-text-centered">
		<h2>Balanced chemical equation:</h2>
		<h2><span class="has-opacity-half">1</span> KmNO<sub>4</sub> + <span class="has-text-info"><b>15</b></span> A = <span class="has-text-danger"><b>-1</b></span> KmA + <span class="has-text-danger"><b>0</b></span> OAMn</h2>
		<h2>
			<template v-for="(molecule, number) in sides[0]">
				<!-- <span :class="moleculeCoefficientHtmlClass(molecule.coefficient)">{{ molecule.coefficent }}</span> {{ molecule.formula }} <template v-if="number != sides[0].length-1">+</template><template v-else>=</template> -->
				<!-- <span :class="coefficientHtmlClass(molecule.coefficient)">{{ molecule.coefficient }}</span> {{ molecule.formula }} <template v-if="number != sides[0].length-1">+</template><template v-else>=</template> -->
				<span :class="coefficientHtmlClass(molecule.coefficient)"><b>{{ molecule.coefficient }}</b></span> {{ molecule.formula }} <template v-if="number != sides[0].length-1">+</template><template v-else>=</template>
			</template>
			<template v-for="(molecule, number) in sides[1]">
				<!-- <span :class="moleculeCoefficientHtmlClass(molecule.coefficient)">{{ molecule.coefficent }}</span> {{ molecule.formula }} <template v-if="number != sides[0].length-1">+</template> -->
				<!-- <span :class="coefficientHtmlClass(molecule.coefficient)">{{ molecule.coefficient }}</span> {{ molecule.formula }} <template v-if="number != sides[0].length-1">+</template> -->
				<span :class="coefficientHtmlClass(molecule.coefficient)"><b>{{ molecule.coefficient }}</b></span> {{ molecule.formula }} <template v-if="number != sides[0].length-1">+</template>
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
					return Array.isArray(sides) && sides.reduce(function(prev, curr){
						return prev && Array.isArray(curr);
					}, true);
				}
			}
		},
		data(){
			return {};
		},
		methods: {
			coefficientHtmlClass(coefficient){
				return moleculeCoefficientHtmlClass(coefficient);
			}
		}
	}
</script>