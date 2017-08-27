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
			this.loading = true;
			if(this.$children[1]){
				this.$children[1].refresh();
			}
			this.clear();

			axios.get('/api/chemistry-query', {params: {query: this.input}})
				.then((function(response){
					this.clear();
					this.response = response.data;
				}).bind(this))
				.catch((function(error){
					this.clear();
					this.error = true;
					if(error.response && error.response.status == 422){
						this.response = error.response.data;
					}
				}).bind(this))
				.then((function(){
					this.loading = false;
				}).bind(this));
		},
		clear(){
			this.response = {};
			this.error = false;
		}
	}
});