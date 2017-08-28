<template>
	<div>
		<div class="columns has-text-centered has-bottom-border">
			<div class="column"><b>Coefficient</b></div>
			<div class="column"><b>Molecule</b></div>
			<div class="column"><b>Molar mass</b></div>
			<div class="column"><b>Moles</b></div>
			<div class="column"><b>Grams</b></div>
		</div>
		<!-- <template v-for="(side, sideNumber) in sides"> -->
			<!-- <molecule-table-entry v-for="(molecule, index) in side" @clear="clearEntries" :key="index" :coefficient="molecule.coefficient" :molecule="molecule.formula" :atomic-mass="molecule.atomicMass" :has-bottom-border="index == side.length-1 && sideNumber != sides.length-1"></molecule-table-entry> -->
			<!-- <molecule-table-entry v-for="(molecule, index) in side" @clear="clearEntries" :ref="makeKey(sideNumber, index)" :key="makeKey(sideNumber, index)" :coefficient="molecule.coefficient" :molecule="molecule.formula" :atomic-mass="molecule.atomicMass" :has-bottom-border="index == side.length-1 && sideNumber != sides.length-1"></molecule-table-entry> -->
			<!-- <molecule-table-entry v-for="(molecule, index) in side" @clear="clearEntries" :ref="makeKey(sideNumber, index)" :key="makeKey(sideNumber, index)" :coefficient="molecule.coefficient" :molecule="molecule.formula" :atomic-mass="molecule.atomicMass" :has-bottom-border="index == side.length-1 && sideNumber != sides.length-1"></molecule-table-entry> -->
		<!-- </template> -->
		<molecule-table-entry v-for="(molecule, index) in flattenedSides" @clear="clearEntries" :key="index" :coefficient="molecule.coefficient" :molecule="molecule.formula" :atomic-mass="molecule.atomicMass" :has-bottom-border="molecule.hasBottomBorder"></molecule-table-entry>
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
					/*for(let j = 0; j < sides[i].length; j++){
						molecules.push(sides[i][j]);
					}*/
					/*molecules = molecules.concat(sides[i]);
					if(i != sides.length - 1){
						molecules[molecules.length - 1].hasBottomBorder = true;
					}*/
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
			updateMoles(molesRation){
				for(let entry of this.$children){

				}
			},
			makeKey(side, index){
				return 'side'+side+'index'+index;
			}
		}
	}
</script>