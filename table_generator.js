$(function(){
	$('input.column').focus(
		function() {
		var column = $('input.column').val();
		for (var i = 1; i <= column; i++) {
			$('input.column').append('<input type="text" id="column' + i + '" name="columnNumber' + i + '" placeholder="Nom de la colonne">')
	}};)
});