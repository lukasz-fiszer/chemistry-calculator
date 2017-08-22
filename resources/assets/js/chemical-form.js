require('./start');

Vue.component('molecule-table-entry', require('./components/chemical-form/MoleculeTableEntry.vue'));
Vue.component('molecule-table', require('./components/chemical-form/MoleculeTable.vue'));

//function moleculeToHtml(molecule){
//const moleculeToHtml = function (molecule){
//moleculeToHtml = function (molecule){
//window.moleculeToHtml = const function (molecule){
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

const chemicalForm = new Vue({
	el: '.chemical-form',
	mounted(){
		console.log('mounted');
	}
});