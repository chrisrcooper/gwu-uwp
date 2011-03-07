// these are all the main functions of the website

$(document).ready(function()
{
	//handle an additional question
	$('input#acceptNo').live('click', function(){
		$('div#newQuestion').show();	
	});
	$('input#acceptYes').live('click', function(){
		$('div#newQuestion').hide();	
	});	
	$('input#stakeholderYes').live('click', function(){
		$('div#stakeholderQuestion').show();	
	});
	$('input#stakeholderNo').live('click', function(){
		$('div#stakeholderQuestion').hide();	
	});	
});