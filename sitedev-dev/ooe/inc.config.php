<?php
	// LOGIN TO MySQL
	mysql_connect("localhost", "root", "Mp4siinb") or die(mysql_error());
	mysql_select_db("OOE") or die(mysql_error());
	//
	
	// set base variables
	$tblName = "OOE_"; // this leads every single table name
	$admin_email = "cooper@gwu.edu";
	$site_root = "http://72.167.43.64/ooe/";
	$site_title = "Office of Entrepreneurship | Business Plan Colaboration";
	$meta_keywords = "";
	$meta_description = "";
	$rss_url = "";
	$flickr_rss = "";
	$twitter_nick = "";
	//
	
	// start a session
	if(!isset($_SESSION)){session_start();}
	
?>
