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
				this.moles = value;
				if(value === ''){
					this.clearInputs();
					this.$emit('clear');
					return;
				}

				let moles = Number(value);
				if(moles === 0){
					moles = value === '0' ? 0 : NaN;
				}
				this.grams = this.atomicMass * moles;
				this.isActiveMoles = true;
				this.isActiveGrams = false;
				if(this.coefficient !== 0){
					this.$emit('updateMoles', moles / this.coefficient);
				}
			},
			updateGrams(event){
				let value = event.target.value;
				this.grams = value;
				if(value === ''){
					this.clearInputs();
					this.$emit('clear');
					return;
				}

				let grams = Number(value);
				if(grams === 0){
					grams = value === '0' ? 0 : NaN;
				}
				this.moles = grams / this.atomicMass;
				this.isActiveGrams = true;
				this.isActiveMoles = false;
			},
			clearInputs(){
				this.moles = '';
				this.grams = '';
				this.clearActiveFields();
			},
			clearActiveFields(){
				this.isActiveGrams = false;
				this.isActiveMoles = false;
			}
		}
	}
</script>