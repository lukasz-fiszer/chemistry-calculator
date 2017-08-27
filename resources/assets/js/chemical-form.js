require('./start');

Vue.component('molecule-table-entry', require('./components/chemical-form/MoleculeTableEntry.vue'));
Vue.component('molecule-table', require('./components/chemical-form/MoleculeTable.vue'));
Vue.component('reaction-box', require('./components/chemical-form/ReactionBox.vue'));
Vue.component('molecule-box', require('./components/chemical-form/MoleculeBox.vue'));

const chemicalFormApp = new Vue({
	el: '.chemical-form-app',
	data: {
		input: '',
		loading: false,
		submittedInput: '',
		response: {},
		error: false
	},
	mounted(){
		document.querySelector('input[name="chemical-input"]').focus();
	},
	computed: {
		status(){
			if(isEmptyObject(this.response)){
				return 'empty';
			}
			if(this.response.hasOwnProperty('status')){
				return this.response.status;
			}
		},
		isReactionType(){
			return this.status == 'reaction_equation';
		},
		isMoleculeType(){
			return this.status == 'molecule';
		},
		sides(){
			return this.response.sides;
		},
		molecule(){
			return this.response.molecule;
		},
		hasMoleculeTable(){
			return this.isMoleculeType || this.isReactionType;
		},
		moleculeTableSides(){
			if(this.sides !== undefined){
				return this.sides;
			}
			if(this.molecule !== undefined){
				return [[this.molecule]];
			}
		}
	},
	methods: {
		onSubmit(){
			if(this.submittedInput === this.input){
				return;
			}
			this.submittedInput = this.input;
			this.response = {};
			this.loading = true;
			axios.get('/api/chemistry-query', {params: {query: this.input}})
				.then((function(response){
					this.error = false;
					this.response = response.data;
					// this.error = false;
				}).bind(this))
				// .catch((function(response){
				.catch((function(error){
					// this.error = true;
					if(error.response && error.response.status == 422){
						// this.response = response.data;
						// this.response = error.response;
						this.response = error.response.data;
					}
					else{
						this.response = {};
					}
					this.error = true;
					/*if(error.response.status){
						alert(error.response.status);
					}*/
					// alert(response);
					/*this.response = response.data;
					this.error = true;*/
				}).bind(this))
				.then((function(){
					this.loading = false;
				}).bind(this));
		}
	}
});