require('./start');

Vue.component('molecule-table-entry', require('./components/chemical-form/MoleculeTableEntry.vue'));
Vue.component('molecule-table', require('./components/chemical-form/MoleculeTable.vue'));

window.moleculeToHtml = function (molecule){
	return molecule.replace(/(\d+)/, '<sub>$1</sub>');
}

window.moleculeCoefficientHtmlClass = function (coefficient){
	return {
		'has-text-danger': coefficient <= 0,
		'has-opacity-half': coefficient == 1,
		'has-text-info': coefficient > 1,
	};
}

/*Vue.component('chemform', {
	mounted(){
		console.log('mounted chemform');
	},
	data(){
		return {
			input: 'name'
		};
	}
});*/

/*let chemform = Vue.component('chemform');
new chemform().$mount('.chemform');*/

const chemicalFormApp = new Vue({
	el: '.chemical-form-app',
	mounted(){
		console.log('mounted');
	},
	methods: {
		alert(){
			alert('a2');
		}
	}
});

const chemicalForm = new Vue({
	el: '.chemical-form',
	mounted(){
		console.log('chemform mounted');
	},
	/*data(){
		return {
			input: ''
		};
	},*/
	data: {
		input: ''
	},
	methods: {
		alert(){
			alert('a');
		},
		onSubmit(){
			// alert(input);
			alert(this.input);
		}
	}
});

/*const chemicalFormApp = new Vue({
	el: '.chemical-form-app',
	mounted(){
		console.log('mounted');
	},
	methods: {
		alert(){
			alert('a2');
		}
	}
});*/

// chemicalForm.alert();
// chemicalFormApp.alert();