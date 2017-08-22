<template>
	<div class="columns has-text-centered" :class="{'has-bottom-border': hasBottomBorder}">
		<!-- <div class="column" :class="{'has-text-danger': coefficient <= 0, 'has-opacity-half': coefficient == 1, 'has-text-info': coefficient > 1}"><b>{{ coefficient }}</b></div> -->
		<div class="column" :class="coefficientClass"><b>{{ coefficient }}</b></div>
		<div class="column" v-html="moleculeHtml">{{ moleculeHtml }}</div>
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
			};
		},
		computed: {
			wrongInput(){
				return isNaN(this.moles) || isNaN(this.grams);
			},
			moleculeHtml(){
				// return this.$props.molecule.replace(/(\d+)/, '<sub>$1</sub>');
				return moleculeToHtml(this.$props.molecule);
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
					return;
				}

				let moles = Number(value);
				if(moles === 0){
					moles = value === '0' ? 0 : NaN;
				}
				this.grams = this.atomicMass * moles;

			},
			updateGrams(event){
				let value = event.target.value;
				this.grams = value;
				if(value === ''){
					this.clearInputs();
					return;
				}

				let grams = Number(value);
				if(grams === 0){
					grams = value === '0' ? 0 : NaN;
				}
				this.moles = grams / this.atomicMass;
			},
			clearInputs(){
				this.moles = '';
				this.grams = '';
			}
		}
	}
</script>