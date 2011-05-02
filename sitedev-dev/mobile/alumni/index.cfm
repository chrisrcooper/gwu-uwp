<cfif findNoCase('Android', cgi.http_user_agent,1)>
    <!--- relocate to Android version of the mobile site --->
    <cflocation url="m/">
<cfelseif findNoCase('iPhone', cgi.http_user_agent,1)>
    <!--- relocate to iphone version of the mobile site --->
    <cflocation url="m/">
</cfif>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">







<html xmlns="http://www.w3.org/1999/xhtml">







<head>







<cfif Find("~alumni",cgi.SCRIPT_NAME)><cflocation url="http://alumni.gwu.edu" addtoken="no"></cfif>







<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />







<title>GW Alumni: Continuing the Experience</title>







<link rel="stylesheet" href="styles_newrsstest.css" type="text/css" />







<script src="lib/prototype.js" type="text/javascript"></script>







<script src="src/scriptaculous.js" type="text/javascript"></script>







<script type="text/javascript">







// preload images







var dropDown_bg = new Image();







dropDown_bg.src = "images/drop-down-over_bg.gif";







</script>







<script type="text/javascript">















if (/Firefox[\/\s](\d+\.\d+)/.test(navigator.userAgent)){ //test for Firefox/x.x or Firefox x.x (ignoring remaining digits);







 var ffversion=new Number(RegExp.$1) // capture x.x portion and store as a number







 if (ffversion<4 && ffversion>=2)







  var ff2 = true;







}















</script>















<script src="http://www.google.com/jsapi/?key=ABQIAAAAl9v3ACeDGEnckMvfmZBEqhTClOsTyuNHYJNKQ8F2ULsj5lehghQhghc9Zkt6HBwCzvE-vjN-J6PwhA"







      type="text/javascript"></script>







<script src="http://www.google.com/uds/solutions/dynamicfeed/gfdynamicfeedcontrol.js"







      type="text/javascript"></script>







 















<script type="text/javascript" src="http://my.gwu.edu/webservices/loggedin.cfm?display=js"></script>







<script type="text/javascript">







  // get the status, and add an HTML element to the page accordingly







  function displayStatus(toObj1,toObj2) {







    var loginStatus = returnStatus();







	var myText = "Log In";







	var myLink = "http://my.gwu.edu/login/alumni.cfm";	var mySecondText = "Contact Us";







	var mySecondLink = "http://alumni.gwu.edu/gwtoday/contact.html";







	if(loginStatus == 1) {







	  myText = "Member Home";







	  myLink = "http://www.alumniconnections.com/olc/membersonly/GEW/mypage.jsp";







	  mySecondText = "Log Out";







	  mySecondLink = "http://my.gwu.edu/login/logout_alumni.cfm";







	}







	myTextNode   = document.createTextNode(myText); 







	myStatusNode = document.createElement('a');







	myStatusNode.setAttribute('href',myLink);







	myStatusNode.appendChild(myTextNode);







	toObj1.appendChild(myStatusNode);







	myTextNode2   = document.createTextNode(mySecondText); 







	myStatusNode2 = document.createElement('a');







	myStatusNode2.setAttribute('href',mySecondLink);







	myStatusNode2.appendChild(myTextNode2);







	toObj2.appendChild(myStatusNode2);















  }







</script>     























<!--[if IE 6]>







<style type="text/css">







#connect-sub{ margin: 0px 0px 0px 45px; }







#benefits-sub{ margin: 0px 0px 0px 213px; }







#programs-sub{ margin: 0px 0px 0px 395px; }







#volunteer-sub{ margin: 0px 0px 0px 577px; }







#gw-sub{ margin: 0px 0px 0px 645px; }







#navigation{ width: 852px; padding-left: 45px; }







#navigation a{ padding: 7px 15px 5px 15px; }







#quick-links img{ margin: -4px 0px -4px 2px; }







#gw-news{ margin: 6px 0px 0px 3px; }







#alumni-events{ margin: 6px 0px 0px 3px; }







#featured-alumni{ margin: 6px 0px 0px 3px; height: 272px; }







#quick-links-sub a{ margin: 0px 0px 0px 15px; }







#footer{ padding-top: 10px; }







#footer p{ margin: 0px 0px 0px 0px; }







#footer img.footer-icon{ margin: 0px 4px 0px 4px; }







#footer img{ margin: -4px 0px -4px 0px; }







#mini-nav{ margin: 213px 0px 0px -115px; }







img.mini-nav-bg{ margin: 212px 0px 0px -120px; }







#mini-nav a{ margin: 0px 6px 0px 6px; }























</style>







<![endif]-->















<!--[if IE 7]>







<style type="text/css">







#connect-sub{ margin: 0px 0px 0px 45px; }







#benefits-sub{ margin: 0px 0px 0px 213px; }







#programs-sub{ margin: 0px 0px 0px 395px; }







#volunteer-sub{ margin: 0px 0px 0px 577px; }







#gw-sub{ margin: 0px 0px 0px 645px; }







#navigation{ width: 852px; padding-left: 45px; }







#navigation a{ padding: 7px 15px 5px 15px; }







#quick-links img{ margin: 0px 0px -18px 2px; }







#gw-news{ margin: 6px 0px 0px 3px; }







#alumni-events{ margin: 6px 0px 0px 3px; }







#featured-alumni{ margin: 6px 0px 0px 3px; height: 272px; }







#quick-links-sub a{ margin: 0px 0px 0px 15px; }







#footer{ padding-top: 10px; }







#footer p{ margin: 0px 0px 0px 0px; }







#footer img.footer-icon{ margin: 0px 4px 0px 4px; }







#footer img{ margin: -4px 0px -4px 0px; }







#mini-nav{ margin: 212px 0px 0px -115px; }







img.mini-nav-bg{ margin: 212px 0px 0px -120px; }







#mini-nav a{ margin: 1px 7px 0px 7px; }















</style>







<![endif]-->







</head>















<body>







<div id="container">







	<div id="header"><!-- #BeginLibraryItem "/Library/header.lbi" -->   	  <a href="http://www.gwu.edu/"><img src="images/gwu-logo.gif" alt="George Washington University" border="0" class="top-logo" /></a>







      <a href="index.cfm"><img src="images/gwu-alum-logo.gif" alt="GW Alumni: Continuing the GW Experience" border="0" class="bottom-logo" /></a>







<div id="link-holder">







        	<img src="images/lock.gif" alt="Login" />







            <h1><span id="js_mystatus"></span><noscript><a href="http://my.gwu.edu/login/alumni.cfm">Login</a></noscript></h1>















            <h1><span id="js_mystatus2"></span><noscript>







                <a href="gwtoday/contact.html">Contact Us</a>







            </noscript></h1>







</div>















<script>displayStatus(document.getElementById('js_mystatus'),document.getElementById('js_mystatus2'));</script>















<!-- END LINK HOLDER DIV -->







        <div id="search-holder">







        <form action="http://search.gwu.edu/search" method="get" id="cse-search-box">







                <h1>SEARCH</h1>







   	 	<input type="hidden" name="site" value="alumni" />







<input type="hidden" name="client" value="alumni" />







<input type="hidden" name="proxystylesheet" value="alumni" />







<input type="hidden" name="output" value="xml_no_dtd" />







		<input class="search" type="text" name="q" size="14">







    	<INPUT type="image" name="sa" src="images/go_btn.gif" border="0">







		</form>







 		</div><!-- END SEARCH HOLDER DIV --><!-- #EndLibraryItem --></div>







<!-- END HEADER DIV -->







      <script type="text/javascript">







		var menuStates = [];







		var menuOvers = [];







		







		function setMenuOvers(menu, bool)







		{







			menuOvers[menu] = bool;







		}







		







		function decide(menu)







		{







			if(menuOvers[menu] == false)







			{







				hideMe(menu);







			}







		}







		







		function showMe(menu)







		{







			menuStates[menu] = true;







			Effect.Appear(menu, {duration: .2});







		}







		







		function hideMe(menu)







		{







			menuStates[menu] = false;







			Effect.Fade(menu, {duration: .2});







		}







	  </script>







      <div id="navigation"><!-- #BeginLibraryItem "/Library/topnav.lbi" --> <a href="/connect/index.html" onmouseover="showMe('connect-sub'); setMenuOvers('connect-sub', true)" 







        			onmouseout="setMenuOvers('connect-sub', false); window.setTimeout('decide(\'connect-sub\')', 75)">Connect &amp; Share</a> <img src="images/nav-rule.gif" alt="rule" /> <a href="/benefits/index.html" onmouseover="showMe('benefits-sub'); setMenuOvers('benefits-sub', true)" 







        			onmouseout="setMenuOvers('benefits-sub', false); window.setTimeout('decide(\'benefits-sub\')', 75)">Benefits &amp; Services</a> <img src="images/nav-rule.gif" alt="rule" /> <a href="/programs/index.html" onmouseover="showMe('programs-sub'); setMenuOvers('programs-sub', true)" 







        			onmouseout="setMenuOvers('programs-sub', false); window.setTimeout('decide(\'programs-sub\')', 75)">Programs &amp; Events</a> <img src="images/nav-rule.gif" alt="rule" /> <a href="/support/index.html" onmouseover="showMe('volunteer-sub'); setMenuOvers('volunteer-sub', true)" 







        			onmouseout="setMenuOvers('volunteer-sub', false); window.setTimeout('decide(\'volunteer-sub\')', 75)">Volunteer &amp; Give </a> <img src="images/nav-rule.gif" alt="rule" /> <a href="/gwtoday/index.html" onmouseover="showMe('gw-sub'); setMenuOvers('gw-sub', true)" 







        			onmouseout="setMenuOvers('gw-sub', false); window.setTimeout('decide(\'gw-sub\')', 75)">News &amp; Info</a><!-- #EndLibraryItem --></div>







<!-- END NAVIGATION DIV --><!-- #BeginLibraryItem "/Library/topnav-sub.lbi" --><div id="connect-sub" style="display: none;" onmouseover="setMenuOvers('connect-sub', true)"







    	onmouseout="setMenuOvers('connect-sub', false); window.setTimeout('decide(\'connect-sub\')', 75)"> <a onmouseover="setMenuOvers('connect-sub', true)" class="drop-down" href="/connect/community/index.html">Online Community</a> <a onmouseover="setMenuOvers('connect-sub', true)" class="drop-down" href="/connect/update/index.html">Update Contact Information</a> <a onmouseover="setMenuOvers('connect-sub', true)" class="drop-down" href="/connect/directory/index.html">Alumni Directory</a> <a onmouseover="setMenuOvers('connect-sub', true)" class="drop-down" href="http://www.alumniconnections.com/olc/pub/GEW/classnotes/classnotes.cgi">Class Notes</a> <a onmouseover="setMenuOvers('connect-sub', true)" class="drop-down" href="/connect/photos/index.html">Photo Galleries</a> <a onmouseover="setMenuOvers('connect-sub', true)" class="drop-down" href="/connect/interactive/index.html">Alumni Interactive</a> <a onmouseover="setMenuOvers('connect-sub', true)" class="drop-down" href="/connect/clubs/index.html">Clubs &amp; Groups</a> </div>







<div id="benefits-sub" style="display: none;" onmouseover="setMenuOvers('benefits-sub', true)"







    	onmouseout="setMenuOvers('benefits-sub', false); window.setTimeout('decide(\'benefits-sub\')', 75)"> <a onmouseover="setMenuOvers('benefits-sub', true)" class="drop-down" href="/benefits/career/index.html">Career Services</a> <a onmouseover="setMenuOvers('benefits-sub', true)" class="drop-down" href="/benefits/benefits.html">Alumni Benefits</a> <a onmouseover="setMenuOvers('benefits-sub', true)" class="drop-down" href="/benefits/education/index.html">Education Programs</a> <a onmouseover="setMenuOvers('benefits-sub', true)" class="drop-down" href="/benefits/email/index.html">Email Services</a> <a onmouseover="setMenuOvers('benefits-sub', true)" class="drop-down" href="/benefits/transcripts.html">Transcripts &amp; Diplomas</a> <a onmouseover="setMenuOvers('benefits-sub', true)" class="drop-down" href="/benefits/marketplace.html">Alumni Marketplace</a> </div>







      <div id="programs-sub" style="display: none;" onmouseover="setMenuOvers('programs-sub', true)"







    	onmouseout="setMenuOvers('programs-sub', false); window.setTimeout('decide(\'programs-sub\')', 75)"> <a onmouseover="setMenuOvers('programs-sub', true)" class="drop-down" href="http://www.alumniconnections.com/olc/pub/GEW/geventcal/showListView.jsp">Calendar of Events</a> <a onmouseover="setMenuOvers('programs-sub', true)" class="drop-down" href="/aw/index.html">Alumni Weekend</a> <a onmouseover="setMenuOvers('programs-sub', true)" class="drop-down" href="/programs/regional/index.html">Regional Programs</a> <a onmouseover="setMenuOvers('programs-sub', true)" class="drop-down" href="/programs/school/index.html">School Alumni Programs</a> <a onmouseover="setMenuOvers('programs-sub', true)" class="drop-down" href="/programs/yan/index.html">Young Alumni Network</a> <a onmouseover="setMenuOvers('programs-sub', true)" class="drop-down" href="/programs/intl/index.html">International Alumni</a> <a onmouseover="setMenuOvers('programs-sub', true)" class="drop-down" href="/programs/student/index.html">For Students</a> <a onmouseover="setMenuOvers('programs-sub', true)" class="drop-down" href="/programs/special/index.html">Special Programs</a> </div>







<div id="volunteer-sub" style="display: none;" onmouseover="setMenuOvers('volunteer-sub', true)"







    	onmouseout="setMenuOvers('volunteer-sub', false); window.setTimeout('decide(\'volunteer-sub\')', 75)"> <a onmouseover="setMenuOvers('volunteer-sub', true)" class="drop-down" href="/support/getinvolved.html">Get Involved</a> <a onmouseover="setMenuOvers('volunteer-sub', true)" class="drop-down" href="/support/giving.html">Giving Opportunities</a> <a onmouseover="setMenuOvers('volunteer-sub', true)" class="drop-down" href="http://www.gwu.edu/give2gw/">Make a Gift</a> </div>







      <div id="gw-sub" style="display: none;" onmouseover="setMenuOvers('gw-sub', true)"







    	onmouseout="setMenuOvers('gw-sub', false); window.setTimeout('decide(\'gw-sub\')', 75)">







      <a onmouseover="setMenuOvers('gw-sub', true)" class="drop-down" href="/gwaa/index.html">GW Alumni Association</a> <a onmouseover="setMenuOvers('gw-sub', true)" class="drop-down" href="/prominent/index.cfm">Prominent Alumni</a> <a onmouseover="setMenuOvers('gw-sub', true)" class="drop-down" href="/news/index.html"><i>Colonial Cable</i></a> <a onmouseover="setMenuOvers('gw-sub', true)" class="drop-down" href="/president/index.cfm">President Knapp</a> <a onmouseover="setMenuOvers('gw-sub', true)" class="drop-down" href="http://www.gwsports.com/">GW Sports</a> <a onmouseover="setMenuOvers('gw-sub', true)" class="drop-down" href="http://www.gwu.edu/explore/mediaroom/newsreleases">GW News</a> <a onmouseover="setMenuOvers('gw-sub', true)" class="drop-down" href="http://www.gwu.edu/~magazine/"><i>GW Magazine</i></a> <a onmouseover="setMenuOvers('gw-sub', true)" class="drop-down" href="/gwtoday/visit/index.html">Plan a Visit</a></div>







<!-- #EndLibraryItem --><div id="content">







    	<div id="featured"><img id="home-featured-img" src="images/features/homepage/wheresgeorge2011.jpg" alt="Featured Story" /><a id="home-featured-link" href="http://alumni.gwu.edu/aw/2011/wheresgeorge/index.html">LEARN MORE</a>


            <img onload="if(ff2) this.style.margin='212px 0px 0px -115px';" class="mini-nav-bg" src="images/featured-mini-nav_bg.gif" alt="nav bg" />







<div id="mini-nav">







				<a href="#" onmouseup=
"document.getElementById('home-featured-img').src='images/features/homepage/wheresgeorge2011.jpg';               
document.getElementById('home-featured-link').href='http://alumni.gwu.edu/aw/2011/wheresgeorge/index.html'">1</a>







                <img src="images/mini-nav-rule.gif" alt="rule" />







                				<a href="#" onmouseup="document.getElementById('home-featured-img').src='images/features/homepage/gwmag_winter2011.jpg';                		document.getElementById('home-featured-link').href='http://www.gwu.edu/~magazine/2011_winter/index.html'">2</a>



				<img src="images/mini-nav-rule.gif" alt="rule" />







                				<a href="#" onmouseup="document.getElementById('home-featured-img').src='images/features/homepage/entrepreneurs_cable_april2011.jpg';                		document.getElementById('home-featured-link').href='http://alumni.gwu.edu/news/2011_04/coverstory.html'">3</a>







                <img src="images/mini-nav-rule.gif" alt="rule" />







				<a href="#" onmouseup="document.getElementById('home-featured-img').src='images/features/homepage/culture_buffs_summer_2011.jpg';
                document.getElementById('home-featured-link').href='http://alumni.gwu.edu/programs/special/culturebuffs/'">4</a>















                            </div>







<!-- END MINI NAV -->







        </div><!-- END FEATURED DIV -->







        <div id="quick-links">







            <a href="programs/regional/index.html"><img src="images/regional-programs.gif" alt="Regional Programs" border="0" /></a>







            <img src="images/quick-links-rule.gif" alt="rule" />







        	<a href="benefits/career/index.html"><img src="images/career-services.gif" alt="Career Services" border="0" /></a>







            <img src="images/quick-links-rule.gif" alt="rule" />







            <a href="support/getinvolved.html"><img src="images/volunteer.gif" alt="Volunteer" border="0" /></a>







            







            <img src="images/quick-links-rule.gif" alt="rule" />







            <a href="http://www.gwu.edu/give2gw"><img src="images/make-a-gift.gif" alt="Make A Gift" border="0" /></a>        </div>







<!-- END QUICK LINKS DIV -->







        <div class="clear-floats"><!-- --></div>







        <div id="login">







        	<div style="background-color: white;">







            <img src="images/alumni-login.gif" alt="Alumni Login" />







          </div>







            <div><iframe src="http://my.gwu.edu/mod/alumni/iframe.cfm<cfif isDefined("url.logout")>?logout=1</cfif>" 







			width="200" height="160" 







			frameborder="0" 







			marginheight="0" marginwidth="0" 







			name="login_frame" 







			scrolling="no">







			</iframe></div>







<h2><br />



        For new users: </h2>







             <h3><a href="https://my.gwu.edu/mod/alumni/register.cfm">Register</a></h3>







       <img src="images/blue-rule.gif" alt="rule" />







          <h4><a href="connect/community/index.html">Why Register?</a></h4>







          <h4><a href="connect/community/forgot.html">Forgot Password?</a></h4> 







          <!--<div style="font-size: 12px;"><p><br />







            <strong>PLEASE NOTE: </strong>We have been experiencing some technical difficulties with the Alumni  Online Community. If you have trouble logging in, please email <a href="mailto:gwaa@gwu.edu">gwaa@gwu.edu</a> to let us know.</p></div>-->







      </div><!-- END LOGIN DIV -->







      <div id="gw-news"> <img src="images/gw-news-header.gif" alt="GW News" border="0" usemap="#Map" />







          <map name="Map" id="Map3">







            <area shape="rect" coords="1,1,121,33" href="http://www.gwu.edu/explore/mediaroom/newsreleases" alt="rss" />







            <area shape="rect" coords="150,6,188,25" href="http://www.gwu.edu/explore/mediaroom/stayconnected/byrss/rssmain/rssnewsreleases" alt="rss" />







          </map>







          <script type="text/javascript">







  function loadFeedControl() {







    var feed  = "http://www.gwu.edu/explore/mediaroom/stayconnected/byrss/rssmain/rssnewsreleases";
















	var options = {







    numResults : 3







  }







  new GFdynamicFeedControl(feed, "feedControl", options);







  }







  /**







   * Use google.load() to load the AJAX Feeds API







   * Use google.setOnLoadCallback() to call loadFeedControl once the page loads







   */







  google.load("feeds", "1");







  google.setOnLoadCallback(loadFeedControl);















  







        </script>







          <div id="feedControl">Loading...</div>







        <noscript>







          <p>The GW News feed requires Javascript to display. If you prefer, you may subscribe to the feed <a href="http://www.gwu.edu/explore/mediaroom/stayconnected/byrss/rssmain/rssnewsreleases">here</a>.</p>







        </noscript>







      </div>







      <!-- END GW NEWS DIV -->







        <div id="alumni-events">







          <img src="images/alumni-events-header.gif" alt="Alumni Events" border="0" usemap="#Map2" />







          <map name="Map2" id="Map2">







            <area shape="rect" coords="1,1,142,33" href="http://www.alumniconnections.com/olc/pub/GEW/geventcal/showListView.jsp" alt="rss" />







            <area shape="rect" coords="147,6,188,25" href="http://www.alumniconnections.com/olc/pub/GEW/rssfeeds/rssevtcal.cgi" alt="rss" />







          </map>







          <script type="text/javascript">







  function loadFeedControl() {







    var feed  = "http://www.alumniconnections.com/olc/pub/GEW/rssfeeds/rssevtcal.cgi";






















	var options = {







    numResults : 3







  }







  new GFdynamicFeedControl(feed, "feedControl2", options);







  }







  /**







   * Use google.load() to load the AJAX Feeds API







   * Use google.setOnLoadCallback() to call loadFeedControl once the page loads







   */







  google.load("feeds", "1");







  google.setOnLoadCallback(loadFeedControl);















  







</script>















			<div id="feedControl2">Loading...</div>















			<noscript><p>The Alumni Events feed requires Javascript to display. If you prefer, you may subscribe to the feed <a href="http://www.alumniconnections.com/olc/pub/GEW/rssfeeds/rssevtcal.cgi">here</a>.</p>







			</noscript>







            







    </div>







<!-- END ALUMNI EVENTS DIV -->







        <div id="featured-alumni">







        	<!--ALUMNI CHALLENGE <a href="https://gwtoday.gwu.edu/aroundcampus/a100000challenge"><img src="http://www.gwu.edu/staticfile/GWToday/Images/General/Professors_Gate_UP_JMC_2009-DSC_1055_220x120.jpg" width="194" height="106" alt="GW Gate" border="0" /></a>







       	  <p><strong>$100,000 Challenge to Alumni - Fewer than 1,000 Donors To Go!</strong></p>







          <p> If we reach 9,000 alumni donors by Dec. 31, a generous alumnus will donate $100,000 toward student aid.  Any gift, any size will count toward the challenge. <a href="http://www.gwu.edu/give2gw">Make your gift now!</a></p>







          <p><a href="https://gwtoday.gwu.edu/aroundcampus/a100000challenge"><strong>Read more &raquo;</strong></a><strong><br />







          <a href="http://www.gwu.edu/give2gw">Make a gift online &raquo;</a></strong><a href="http://www.gwu.edu/give2gw"></a><br /><br />







</p>-->















<img src="images/features/aspasia-miller.jpg" />















<p>&quot;When you assist a student or fellow graduate, you are strengthening the  GW community. A strong alumni community enhances the University and  helps all GW graduates.&quot;</p>







<p>&nbsp;</p>















          <p><img src="images/gray-rule.gif" /></p>







<p>&nbsp;</p>







<p><strong>Follow GW Alumni on the Web!</strong></p>







<div style="background-color: white; padding: 5px 0px 0px 0px; text-align: center;">







  <a href="http://alumni.gwu.edu/connect/interactive/networking.html"><img src="images/logos/facebook_50px.gif" width="35" height="35" /></a> <a href="http://www.linkedin.com/groupInvitation?gid=52996&amp;sharedKey=63379829A5BD"><img src="images/logos/linkedin_50px.gif" width="35" height="35" /></a> <a href="http://twitter.com/gwalumni"><img src="images/logos/twitter_50px.gif" width="35" height="35" /></a> <a href="http://www.flickr.com/photos/gwalumni"><img src="images/logos/flickr_50px.gif" width="35" height="35" /></a> <a href="http://www.youtube.com/gwalumni1"><img src="images/logos/youtube_50px.gif" width="35" height="35" /></a></div>















<!--leave these spacing characters here-->







              &nbsp;&nbsp;&nbsp;







              <!--don't delete the three non-breaking space characters! it's an IE6 fix-->







            







</div><!-- END FEATURED ALUMNI DIV -->







        <div class="clear-floats"><!-- --></div>







    </div><!-- END CONTENT DIV -->







    <div id="footer"><!-- #BeginLibraryItem "/Library/footer.lbi" --><div id="left-links">







            <img class="footer-icon" src="/images/footer-rss-icon.gif" alt="rss" /><p><a href="http://www.gwu.edu/explore/mediaroom/stayconnected/byrss/rssmain/rssnewsreleases">GW News feed</a></p>







<img src="/images/footer-rule-left.gif" alt="rule" />







            <img class="footer-icon" src="/images/footer-rss-icon.gif" alt="rss" />







            <p><a href="http://www.alumniconnections.com/olc/pub/GEW/rssfeeds/rssevtcal.cgi">Alumni Events feed</a></p>







<img src="/images/footer-rule-left.gif" alt="rule" />







            <img class="footer-icon" src="/images/footer-q-icon.gif" alt="rss" /><p><a href="/news/aboutrss.html">About RSS feeds</a></p>







          







        </div><!-- END LEFT LINKS DIV -->







        <p class="middle">&copy; The George Washington University,







		<SCRIPT>







		<!--







		var year=new Date();







		year=year.getYear();







		if (year<1900) year+=1900;







		document.write(year);







		//-->







		</SCRIPT><br />







        This site is maintained by the Office of Alumni Relations. <br />







        Alumni House @ 1918 F Street, NW / Washington, DC 20052 / 1-800-ALUMNI-7<br>







        <a href="http://development.gwu.edu">GW  Division of Development and Alumni Relations</a></p>







<div id="right-links">







        	<p><a href="http://www.gwu.edu">GW Home Page</a></p>







   	    <img class="footer-icon" src="/images/footer-home-icon.gif" alt="rss" />







            <img src="/images/footer-rule-right.gif" alt="rule" />







            <p><a href="/sitemap.html">Site Map</a></p>







      <img class="footer-icon" src="/images/footer-globe-icon.gif" alt="rss" />







            <img src="/images/footer-rule-right.gif" alt="rule" />







            <p><a href="/gwtoday/about.html">About Us</a></p>







          <img class="footer-icon" src="/images/footer-gw-icon.gif" alt="rss" />







        </div><!-- END RIGHT LINKS DIV -->







        <div class="clear-floats"><!-- --></div><!-- #EndLibraryItem --></div>







  <!-- END FOOTER DIV -->







</div><!-- END CONTAINER DIV -->







<script type="text/javascript">







var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");







document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));







</script>







<script type="text/javascript">







var firstTracker = _gat._getTracker("UA-5752719-2");







firstTracker._initData();







firstTracker._trackPageview();







var secondTracker = _gat._getTracker("UA-737548-3"); // ER - CODE







secondTracker._setDomainName("none");







secondTracker._setAllowLinker(true);







secondTracker._initData();







secondTracker._trackPageview();







</script>







</body>







</html>







