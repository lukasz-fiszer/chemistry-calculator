<template>
	<div class="columns has-text-centered">
		<div class="column" :class="{'has-text-danger': coefficient <= 0, 'has-opacity-half': coefficient == 1}"><b>{{ coefficient }}</b></div>
		<div class="column">{{ molecule }}</div>
		<div class="column">{{ atomicMass }}</div>
		<div class="column"><p class="control"><input type="text" name="moles" class="input" :class="{'is-danger': wrongInput}" :value="moles" @input="updateMoles"></p></div>
		<div class="column"><p class="control"><input type="text" name="grams" class="input" :class="{'is-danger': wrongInput}" :value="grams" @input="updateGrams"></p></div>
	</div>
</template>

<script>
	export default {
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
			return{
				moles: '',
				grams: '',
				//isDanger: false
			};
		},
		computed: {
			/*moles(){
				return this.molesInput;
			},
			grams(){
				return this.gramsInput;
			},*/
			wrongInput(){
				return isNaN(this.moles) || isNaN(this.grams);
			}
		},
		methods: {
			updateMoles(event){
				//let moles = Number(event.target.value);
				let value = event.target.value;
				this.moles = value;
				if(value === ''){
					/*this.moles = '';
					this.grams = '';*/
					this.clearInputs();
					return;
				}

				let moles = Number(value);
				/*if(isNaN(moles)){
					this.isDanger = true;
				}
				else{
					this.isDanger = false;
				}*/
				if(moles === 0){
					moles = value === '0' ? 0 : NaN;
				}
				//this.moles = moles;
				this.grams = this.atomicMass * moles;

			},
			updateGrams(event){
				//let grams = Number(event.target.value);
				let value = event.target.value;
				this.grams = value;
				if(value === ''){
					/*this.grams = '';
					this.moles = '';*/
					this.clearInputs();
					return;
				}

				let grams = Number(value);
				if(grams === 0){
					grams = value === '0' ? 0 : NaN;
				}
				//this.grams = grams;
				this.moles = grams / this.atomicMass;
			},
			clearInputs(){
				this.moles = '';
				this.grams = '';
			}
		}
	}
</script>