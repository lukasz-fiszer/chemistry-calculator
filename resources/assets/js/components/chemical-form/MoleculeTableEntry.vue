<template>
	<div class="columns has-text-centered">
		<div class="column" :class="{'has-text-danger': coefficient <= 0, 'has-opacity-half': coefficient == 1}"><b>0</b></div>
		<div class="column">OAMn</div>
		<div class="column">44</div>
		<div class="column"><p class="control"><input type="text" name="moles" class="input" v-model="moles"></p></div>
		<div class="column"><p class="control"><input type="text" name="grams" class="input" v-model="grams"></p></div>
	</div>
</template>

<script>
	export default {
		//props: ['coefficient', 'molecule', 'atomicMass'],
		props: {
			coefficient: {
				type: Number,
				required: true
			},
			molecule: {
				type: String,
				required: true
			},
			atomicMass: {
				type: Number,
				required: true
			}
		},
		data(){
			/*return {
				coefficient: this.coefficient,
				molecule: this.molecule,
				atomicMass: this.atomicMass
			};*/
			return{
				molesInput: '',
				gramsInput: ''
			};
		},
		computed: {
			moles(){
				return this.molesInput;
			},
			grams(){
				return this.gramsInput;
			}
		}
	}
</script>