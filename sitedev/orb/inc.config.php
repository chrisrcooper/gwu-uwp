<?php
	// LOGIN TO MySQL
	mysql_connect("localhost", "root", "culcorp1") or die(mysql_error());
	mysql_select_db("dev_chris") or die(mysql_error());
	//
	
	// set base variables
	$tblName = "ORB_"; // this leads every single table name
	$admin_email = "chrisynd@gmail.com";
	$site_root = "http://www.patchworkit.com";
	$site_title = "Patchwork | Design Management System";
	$meta_keywords = "";
	$meta_description = "";
	$rss_url = "";
	$flickr_rss = "";
	$twitter_nick = "chrisrcooper";
	//
	
	// start a session
	if(!isset($_SESSION)){session_start();}
	
?>
