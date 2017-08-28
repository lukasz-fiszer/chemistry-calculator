<template>
	<div>
		<div class="columns has-text-centered has-bottom-border">
			<div class="column"><b>Coefficient</b></div>
			<div class="column"><b>Molecule</b></div>
			<div class="column"><b>Molar mass</b></div>
			<div class="column"><b>Moles</b></div>
			<div class="column"><b>Grams</b></div>
		</div>
		<molecule-table-entry v-for="(molecule, index) in flattenedSides" @clear="clearEntries" @updateMoles="updateMoles" :key="index" :coefficient="molecule.coefficient" :molecule="molecule.formula" :atomic-mass="molecule.atomicMass" :has-bottom-border="molecule.hasBottomBorder"></molecule-table-entry>
	</div>
</template>

<script>
	export default {
		props: {
			sides: {
				type: Array,
				required: true,
				validator: window.validateComponentSidesArray
			}
		},
		computed: {
			flattenedSides(){
				let sides = this.sides;
				let molecules = [];
				for(let i = 0; i < sides.length; i++){
					for(let j = 0; j < sides[i].length; j++){
						let molecule = sides[i][j];
						molecule.hasBottomBorder = (j == sides[i].length-1 && i != sides.length-1) ? true : false;
						molecules.push(molecule);
					}
				}
				return molecules;
			}
		},
		data(){
			return {};
		},
		methods: {
			clearEntries(){
				for(let entry of this.$children){
					entry.clearInputs();
				}
			},
			updateMoles(target, molesRatio){
				for(let entry of this.$children){
					if(entry != target){
						entry.moles = entry.coefficient * molesRatio;
						entry.grams = entry.moles * entry.atomicMass;
						entry.clearActiveFields();
					}
				}
			}
		}
	}
</script>