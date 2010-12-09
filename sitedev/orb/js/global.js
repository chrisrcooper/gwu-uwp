$(document).ready(function()
{
	$('form:not(.filter) :input:visible:first').focus();
	
	$('select#periods').change(function(){
		var link = $('select#periods option:selected').val();
		window.location=link;
	});
});
