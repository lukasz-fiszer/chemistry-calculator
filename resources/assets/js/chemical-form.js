require('./start');

Vue.component('molecule-table-entry', require('./components/chemical-form/MoleculeTableEntry.vue'));
Vue.component('molecule-table', require('./components/chemical-form/MoleculeTable.vue'));
Vue.component('reaction-box', require('./components/chemical-form/ReactionBox.vue'));
Vue.component('molecule-box', require('./components/chemical-form/MoleculeBox.vue'));

const chemicalFormApp = new Vue({
	el: '.chemical-form-app',
	data: {
		input: '',
		response: {}
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
			axios.get('/api/chemistry-query', {params: {query: this.input}})
				.then((function(response){
					this.response = response.data;
				}).bind(this))
				.catch(a => console.log(a));
		}
	}
});