<template>
	<div>
		<div class="columns has-text-centered has-bottom-border">
			<div class="column"><b>Coefficient</b></div>
			<div class="column"><b>Molecule</b></div>
			<div class="column"><b>Molar mass</b></div>
			<div class="column"><b>Moles</b></div>
			<div class="column"><b>Grams</b></div>
		</div>
		<template v-for="(side, sideNumber) in sides">
			<molecule-table-entry v-for="(molecule, index) in side" :key="index" :coefficient="molecule.coefficient" :molecule="molecule.nameHtml" :atomic-mass="molecule.atomicMass" :has-bottom-border="index == side.length-1 && sideNumber != sides.length-1"></molecule-table-entry>
		</template>
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
		}
	}
</script>