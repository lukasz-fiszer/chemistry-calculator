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