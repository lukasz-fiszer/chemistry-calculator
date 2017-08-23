require('./start');

Vue.component('molecule-table-entry', require('./components/chemical-form/MoleculeTableEntry.vue'));
Vue.component('molecule-table', require('./components/chemical-form/MoleculeTable.vue'));
Vue.component('reaction-box', require('./components/chemical-form/ReactionBox.vue'));

window.moleculeToHtml = function(molecule){
	return molecule.replace(/(\d+)/, '<sub>$1</sub>');
}

window.moleculeCoefficientHtmlClass = function(coefficient){
	return {
		'has-text-danger': coefficient <= 0,
		'has-opacity-half': coefficient == 1,
		'has-text-info': coefficient > 1,
	};
}

window.validateComponentSidesArray = function(sides){
	return Array.isArray(sides) && sides.reduce(function(prev, curr){
		return prev && Array.isArray(curr);
	}, true);
}

window.isEmptyObject = function(object){
	return Object.keys(object).length <= 0;
}

const chemicalFormApp = new Vue({
	el: '.chemical-form-app',
	data: {
		input: '',
		response: {}
	},
	computed: {
		type(){
			if(isEmptyObject(this.response)){
				return 'empty';
			}
			if(this.response.hasOwnProperty('type')){
				return this.response.type;
			}
		},
		isReactionType(){
			//return this.type == 'reaction_equation';
			console.log('check reaction type');
			if(this.response.hasOwnProperty('type')){
				return this.response.type == 'reaction_equation';
			}
			return false;
		}
	},
	mounted(){
		console.log('mounted');
	},
	methods: {
		onSubmit(){
			//let self = this;
			console.log(this.input);
			// axios.get('/api/chemistry-query', {params: {query: this.input}}).then(a => console.log(a), a => console.log(a));
			/*axios.get('/api/chemistry-query', {params: {query: this.input}})
				.then(a => console.log(a))
				.catch(a => console.log(a));*/
			axios.get('/api/chemistry-query', {params: {query: this.input}})
				.then((function(response){
					this.response = response.data;
					//self.response = response.data;
				}).bind(this))
				.catch(a => console.log(a));
		}
	}
});