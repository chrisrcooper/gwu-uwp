/* Author: 

*/

$(document).ready(function()
{
	$('.expander').click(function(){
		$(this).next().slideToggle('slow');
		$(this).find('.icon').html('-');
	});
});






















