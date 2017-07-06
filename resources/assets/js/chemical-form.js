require('./start');

Vue.component('molecule-table-entry', require('./components/chemical-form/MoleculeTableEntry.vue'));
Vue.component('molecule-table', require('./components/chemical-form/MoleculeTable.vue'));

const chemicalForm = new Vue({
	el: '.chemform',
	mounted(){
		console.log('mounted');
	}
});