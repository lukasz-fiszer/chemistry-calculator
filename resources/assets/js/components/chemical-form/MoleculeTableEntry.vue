<template>
	<div class="columns has-text-centered" :class="{'has-bottom-border': hasBottomBorder}">
		<div class="column" :class="coefficientClass"><b>{{ coefficient }}</b></div>
		<div class="column" v-html="moleculeHtml"></div>
		<div class="column">{{ atomicMass }}</div>
		<div class="column"><p class="control"><input type="text" name="moles" class="input" :class="{'is-danger': wrongInput, 'is-info': isActiveMoles}" :value="moles" @input="updateMoles"></p></div>
		<div class="column"><p class="control"><input type="text" name="grams" class="input" :class="{'is-danger': wrongInput, 'is-info': isActiveGrams}" :value="grams" @input="updateGrams"></p></div>
	</div>
</template>

<script>
	export default {
		props: {
			coefficient: {
				type: Number,
			},
			molecule: {
				type: String,
				required: true
			},
			atomicMass: {
				type: [Number, String],
				required: true
			},
			hasBottomBorder: {
				type: Boolean,
				default: false
			}
		},
		data(){
			return {
				moles: '',
				grams: '',
				isActiveMoles: false,
				isActiveGrams: false
			};
		},
		computed: {
			wrongInput(){
				return isNaN(this.moles) || isNaN(this.grams);
			},
			moleculeHtml(){
				return moleculeToHtml(this.molecule);
			},
			coefficientClass(){
				return moleculeCoefficientHtmlClass(this.coefficient);
			}
		},
		methods: {
			updateMoles(event){
				let value = event.target.value;
				if(!this.valueInput(value, 'moles')){
					return;
				}

				let moles = this.getNumberFromValueInput(value);
				this.grams = this.atomicMass * moles;
				this.setActiveField('moles');
				if(this.coefficient !== 0){
					this.$emit('updateMoles', moles / this.coefficient);
				}
			},
			updateGrams(event){
				let value = event.target.value;
				if(!this.valueInput(value, 'grams')){
					return;
				}

				let grams = this.getNumberFromValueInput(value);
				this.moles = grams / this.atomicMass;
				this.setActiveField('grams');
			},
			clearInputs(){
				this.moles = '';
				this.grams = '';
				this.clearActiveFields();
			},
			clearActiveFields(){
				this.isActiveGrams = false;
				this.isActiveMoles = false;
			},
			setActiveField(field){
				if(field == 'grams'){
					this.isActiveGrams = true;
					this.isActiveMoles = false;
				}
				else if(field == 'moles'){
					this.isActiveMoles = true;
					this.isActiveGrams = false;
				}
				else{
					this.isActiveMoles = false;
					this.isActiveGrams = false;
				}
			},
			valueInput(value, attribute){
				this[attribute] = value;
				if(value === ''){
					this.clearInputs();
					this.$emit('clear');
					return false;
				}
				return true;
			},
			getNumberFromValueInput(value){
				let number = Number(value);
				if(number === 0){
					number = value === '0' ? 0 : NaN;
				}
				return number;
			}
		}
	}
</script>