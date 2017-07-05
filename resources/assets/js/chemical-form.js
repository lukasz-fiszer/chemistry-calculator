require('./start');

Vue.component('molecule-table-entry', require('./components/chemical-form/MoleculeTableEntry.vue'));

const chemicalForm = new Vue({
	el: '.chemform',
	//components: ['molecule-entry'],
	mounted(){
		console.log('mounted');
	}
});