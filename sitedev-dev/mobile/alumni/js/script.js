/* Author: 

*/

$(document).ready(function()
{
	$('.expander').click(function(){
		$(this).next().slideToggle('slow');
		$(this).find('a').toggleClass('open');
	});
	
	//events fetch	
	/*$.get('http://www.alumniconnections.com/olc/pub/GEW/rssfeeds/rssevtcal.xml?callback=?', function(d){
		$(d).find('item').each(function(){			
			alert('test');
	        var $item = $(this);    
	        var title = $item.find('title').text();
	        var imageurl = $item.attr('imageurl');  
	        var html = '<dt> <img class="bookImage" alt="" src="' + imageurl + '" /> </dt>';  
	        html += '<dd> <span class="loadingPic" alt="Loading" />';  
	        html += '<p class="title">' + title + '</p>';  
	        html += '<p> ' + description + '</p>' ;  
	        html += '</dd>';  
	        alert(html);	
	     });  
	 });
	*/
	function fbFetch(){
	  //Set Url of JSON data from the facebook graph api. make sure callback is set with a '?' to overcome the cross domain problems with JSON
      var url = "http://graph.facebook.com/GWAlumni/feed?limit=1&callback=?";
		
		//Use jQuery getJSON method to fetch the data from the url and then create our unordered list with the relevant data.
		$.getJSON(url,function(json){
		    var html = "<p><a href='http://www.facebook.com/GWAlumni'>GWAlumni</a> </strong>";
				//loop through and within data array's retrieve the message variable.
		    	$.each(json.data,function(i,fb){		      		
		      		
		      		fb.message = fb.message.substr(0,140);
		      		fb.message += '...';
		      		html += fb.message; 
		    	});
		    html += "</p>";

			//A little animation once fetched
			/*$('#facebook').animate({opacity:0}, 500, function()
			{*/
					$('#facebook').html(html);
			/*});

		    $('#facebook').animate({opacity:1}, 500);*/
		});
	}
	fbFetch();
	
	$(function(){
		$('#tweets').tweetable({username: 'GWAlumni', time: false, limit: 1, replies: true, position: 'append'});
	});
});