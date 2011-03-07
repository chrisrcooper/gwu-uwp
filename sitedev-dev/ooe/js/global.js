// these are all the main functions of the website

$(document).ready(function()
{
	$('form.ajaxForm').ajaxForm({
		target: 'p#ajaxResult',
		success: showAjaxResult,
	});	
	
	$('form.ajaxForm button').click(function(){
		$(this).parent().append('<p id="tempLoader" style="text-align: center;"><img style="margin-top: 3px" src="images/ajax-loader.gif" /></p>');
	});
});

function showAjaxResult(response) {
	
	$('#tempLoader').slideUp('slow',function(){
		$(this).remove();
	});
	$('#ajaxResult').parent().delay(1000).slideDown();
	
	
	if(response == "1") {
		window.location='?home';
	}
	else {
		$('#ajaxResult').parent().slideDown().delay(15000).slideUp();
	}
	if(response.search(/success/i) !== -1) {		
		//$('form').resetForm(); //reset the form if there's a success response
		//window.location='?home';
	}	
}
