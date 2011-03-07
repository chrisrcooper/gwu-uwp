<?php

/*
	Patchwork Version: 0.5.2	
	These tools are created by Daymuse Studios.
*/
$site_version = "0.5.2";

ini_set("memory_limit","64M");
date_default_timezone_set('America/New_York');
//
// SECURITY
//

function clean_array($array) 
{
	//
	// this function cleans for SQL Injection on Arrays
	//
	
	foreach ($array as $key => $value) 
	{
		//this array[array] cleaner doesnt quite work
		if(is_array($array[$key])) {			
			foreach ($array[$key] as $subkey => $subvalue) 
			{
				$array[$key][$subkey] = mysql_real_escape_string($subvalue);
			}
		}
		
		else {		
			if(!is_array($key)){$array[$key] = mysql_real_escape_string($value);}
		}
	}	
	return $array;
}

//
//
//

function handlePostRequest($_GET, $_POST) 
{
	// ## SECURITY HAS BEEN DISABLED! ##
	$_GET = clean_array($_GET);
	$_POST = clean_array($_POST);
	// ####
	
	if($_GET['createAccount'] == 1) {
		return createAccount($_POST);
	}
	
	if($_GET['loginAccount'] == 1) {
		return loginAccount($_POST);
	}
	
	if($_GET['editAccount'] == 1) {
		return editAccount($_POST);
	}
	
	if($_GET['updateRequest'] == 1) {
		return updateRequest($_POST);
	}
	
	if($_GET['createGroup'] == 1) {
		return createGroup($_POST);
	}
	
	if($_GET['sendInvite'] == 1) {
		return sendInvite($_POST);
	}
	
	if($_GET['updateUserSelf'] == 1) {
		return updateAccount($_POST);
	}
	
	if($_GET['upload'] == 1) {
		return handleUpload($_FILES, $_POST);
	}

}

function getStatus()
{
	if($_SESSION['id']) {
		$userAr = getUserData($_SESSION['id']);
		return "<a href=\"?home\">Welcome</a>, " . "<a href=\"?profile&id=$userAr[id]\">$userAr[username]</a>!";
	}
	else
		return "<a href=\"?home\">Welcome</a>";
}

function handleRequest($_GET) 
{
	//
	// This function handles get-based requests.
	//
	
	$_GET = clean_array($_GET);
	
	//
	// Handle Page Requests
	//
	
	if($_GET['logout'] == 1) {
		session_destroy();
		return "logged out.";
	}
	
	if($_GET['patchDescription']) {
		return getPatchDescription($_GET['patchDescription']);
	}
	
	if($_GET['patchworkBuilderFrameworkPositions']) {
		return getPatchworkBuilderFrameworkPositions($_GET['patchworkBuilderFrameworkPositions']);
	}
	
	if($_GET['patchworkBuilderPatchworkPositions']) {
		return getPatchworkBuilderPatchworkPositions($_GET['patchworkBuilderPatchworkPositions']);
	}
	
	if($_GET['patchworkOutput']) {
		return getPatchworkOutput($_GET['patchworkOutput']);
	}
	
	if($_GET['patchData']) {
		return getPatchData($_GET['patchData']);
	}
	
	if($_GET['frameworkData']) {
		return getFrameworkData($_GET['frameworkData']);
	}
	
	if($_GET['deletePatchwork']) {
		return deletePatchwork($_GET['deletePatchwork']);
	}
}

function drawUsers($max = 25, $tag = "") 
{
	//
	// this function draws the user list
	//
	
	$result = mysql_query("SELECT * FROM " . $GLOBALS['tblName'] . "Accounts ORDER BY timestamp DESC LIMIT 0,$max") or die(mysql_error()); 
	if($tag !== "") {
		$result = mysql_query("SELECT * FROM " . $GLOBALS['tblName'] . "Accounts WHERE id = ANY (SELECT parentId FROM " . $GLOBALS['tblName'] . "Tags WHERE value='$tag' AND type='Accounts') ORDER BY timestamp DESC LIMIT 0,$max") or die(mysql_error());
	}
	
	while($row = mysql_fetch_array( $result )) {
		$status = getUserStatus($row['id']);
		
		if($row['status'] == '1')		
		{
			$text .= "
			<tr>
				<td><a href=\"?profile&id=$row[id]\"><img src=\"$row[photo]\" alt=\"$row[username]\" width=\"75\" height=\"75\" /></a></td>
				<td>" . date("M d, Y", strtotime($row['timestamp'])) . "</td>
				<td><a href=\"?profile&id=$row[id]\">$row[username]</a></td>
				<td>" . tags('Accounts', $row['id']) . "</td>
			</tr>";
		}
	}
	if (!$text) {
		$text = "<tr><td>No results.</td></tr>";
	}
	return $text;
}

function getUserStatus($userId, $bool = false) 
{
	//
	// this function receives a userId and gets the users verbose Status
	//
	
	$result = mysql_query("SELECT status FROM " . $GLOBALS['tblName'] . "Accounts WHERE id='$userId'") or die(mysql_error()); 
	$row = mysql_fetch_array( $result );
	
	if($row['status'] == '1')
		$status = 'Active';
	else
		$status = 'Deactived';
	
	if($bool)
		$status = $row['status'];	
		
	return $status;
}

function drawFiles($max = 25, $tag = "") 
{
	//
	// this function draws the files list
	//
	
	$result = mysql_query("SELECT * FROM " . $GLOBALS['tblName'] . "Files ORDER BY timestamp DESC LIMIT 0,$max") or die(mysql_error()); 
	if($tag !== "") {
		$result = mysql_query("SELECT * FROM " . $GLOBALS['tblName'] . "Files WHERE id = ANY (SELECT parentId FROM " . $GLOBALS['tblName'] . "Tags WHERE value='$tag' AND type='Files') ORDER BY timestamp DESC LIMIT 0,$max") or die(mysql_error());
	}
	while($row = mysql_fetch_array( $result )) {
		if(!$row['filename'])
			$download = "No file.";
		else
			$download = "<a href=\"uploads/$row[filename]\" target=\"_blank\">Download</a>";
		if(!$row['userId'])
			$userLink = "Anonymous";
		else
			$userLink = "<a href=\"?profile&id=$row[userId]\">" . getUsernameFromId($row['userId']) . "</a>";
		$line = "
		<tr>			
			<td>" . date("M d, Y", strtotime($row['timestamp'])) . "</a></td>
			<td>$userLink</td>
			<td>" . tags('Files', $row['id']) . "</td>
			<td>" . truncate($row['description'],100) . " <small><a href=\"?request=$row[id]\">details</a></small></td>
		</tr>";
		
		if(getUserStatus($row['userId'], true) == "0")
			$line = "";
		
		$text .= $line;
		
	}
	
	//check if the user's status was disabled
	
	
	
	return $text;
}

function tags($type, $parentId, $editFlag = 0)
{

	$result = mysql_query("SELECT * FROM " . $GLOBALS['tblName'] . "Tags WHERE parentId='$parentId' AND type='$type' ORDER BY id") 
	or die(mysql_error());
	if(mysql_num_rows($result)==0)
	{
		return "none.";
	}	
	while($row = mysql_fetch_array( $result ))
	{
		$tags_ar[] = $row['value'];
	}
	if($editFlag == "1") {
		foreach($tags_ar as $value)
		{
			$text .= "$value, ";
		} 
		$text = substr($text, 0, -2);
	}
	else {
		foreach($tags_ar as $value)
		{
			$text .= "<a href=\"?tag=$value\">$value</a>, ";
		} 
		$text = substr($text, 0, -2) . ".";
	}
	
		
	return $text;
}

function findexts($filename)
{
	$filename = strtolower($filename) ;
	$exts = split("[/\\.]", $filename) ;
	$n = count($exts)-1;
	$exts = $exts[$n];
	return $exts;
} 

function handleUpload($_FILES, $_POST) {
	// check file type is allowed
	/*
	if($_FILES['uploadedfile']['type'] !== "") // ## a file isn't required
	{
		if($_FILES['uploadedfile']['type'] != "application/msword" && $_FILES['uploadedfile']['type'] != "application/pdf" && $_FILES['uploadedfile']['type'] != "application/zip" && $_FILES['uploadedfile']['type'] != "image/jpeg" && $_FILES['uploadedfile']['type'] != "application/vnd.ms-excel") 
			return "DOC, XLS, PDF, ZIP, JPG files only.";
		
		if(strlen($_POST['tags'])<3) {
			return "You must have at least one tag.";
		}
		
		
		$file = time();
		
		$filetype = $_FILES['uploadedfile']['name'];
		$filetype = findexts($filetype);
		
		$target_path = "uploads/";
		$target_path = $target_path . $file . "." . $filetype;
		
		$filename = "$file.$filetype";
		
		if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
		    $text = "Success! The file ".  basename( $_FILES['uploadedfile']['name']). 
		    " has been uploaded. <a href=\"?home\">Home</a>?";
		} else{
		    $text = "There was an error uploading the file, please try again!";
		}		
	}*/
	
	if(strlen($_POST['tags'])<3) {
		$error .= "You must have at least one tag.  ";
	}
	if(strlen($_POST['description'])<3) {
		$error .= "You must have a description.  ";
	}
	
	if($error)
		return $error;
	
	// passed upload process, let's insert this to the DB
	mysql_query("INSERT INTO " . $GLOBALS['tblName'] . "Files
	(userId, filename, description) VALUES('$_SESSION[id]', '$filename', '$_POST[description]') ")
	or die(mysql_error());	
	$parent_id = mysql_insert_id();
	
	//###no need to strip spaces#### $_POST['tags'] = str_replace (" ", "", $_POST['tags']);
	if(substr($_POST['tags'],-1) == ",")
		$_POST['tags'] = substr($_POST['tags'],0,-1);	
	$new_tags_ar = explode(",", $_POST['tags']);	
	// insert the new tags
	foreach ($new_tags_ar as $tag) 
	{
		$tag = trim($tag);
		mysql_query("INSERT INTO " . $GLOBALS['tblName'] . "Tags
		(parentId, type, value) VALUES('$parent_id', 'Files', '$tag') ") 
		or die(mysql_error());
	}
	if(!$text)
		$text = "Success! Plan posted. <a href=\"?home\">Home</a>?";
	
	return $text;
}

function getPost($_POST) {
	//
	// this function simply outputs the post in an understandable way
	//
	
	$text = "<pre><code>" . print_r($_POST) . "</code></pre>";
	return;
}

function getCurrentPageContent($_GET)
{
	//
	// This function provides page content based on a request.
	// Part of the templating system.
	//	
	
	$_GET = clean_array($_GET);
	
	$array = array_keys($_GET);
		
	if($array[0])
		if(!@include_once('tpl.main.'.$array[0].'.php'))
			if(!@include_once('tpl.main.404.php'))
				echo "<p>Sorry, but the page requested nor the error page exists.</p>";	
}

function createAccount($_POST) //this function always recieves clean variables
{
	//
	// This function creates a new user account after being handed the user's form
	// through $_POST
	//
	
	//first check if this account already exists, check email
	$result = mysql_query("SELECT * FROM " . $GLOBALS['tblName'] . "Accounts
	 WHERE email='$_POST[createEmail]'") or die(mysql_error()); 
	$row = mysql_fetch_array( $result );
	if(mysql_num_rows($result) == 1) {
		$error .= "This email is already in use.  ";
	}
	//first check if this account already exists, check username
	$result = mysql_query("SELECT * FROM " . $GLOBALS['tblName'] . "Accounts
	 WHERE username='$_POST[createUsername]'") or die(mysql_error()); 
	$row = mysql_fetch_array( $result );
	if(mysql_num_rows($result) == 1) {
		$error .= "This username is already in use.  ";
	}
	
	//now check the email is valid
	if(!eregi("^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$", $_POST['createEmail']) || empty($_POST['createEmail'])) {
		$error .= "This email appears to be invalid.  ";
	}
	 
	if(!ctype_alnum($_POST['createUsername'])) {
		$error .= "The username must be alphanumeric.  ";
	}
	
	if(strlen($_POST['createPassword'])<6) {
		$error .= "The password must be 6 characters or longer.  ";
	}
	
	if(strlen($_POST['createUsername'])<3) {
		$error .= "The username must be 3 characters or longer.  ";
	}
	
	if(strlen($_POST['description'])<2) {
		$error .= "You must answer who you are looking to connect with.  ";
	}
	
	/* ## tags not required ##
	if(strlen($_POST['tags'])<3) {
		$error = "You must have at least one tag.";
	}
	*/
	
	if(strlen($_POST['skills'])>1) {
		$_POST['tags'] = "$_POST[skills], " . $_POST['tags'];
	}
	
	if(strlen($_POST['interest'])>1) {
		$_POST['tags'] = "$_POST[interest], " . $_POST['tags'];
	}
	
	$_POST['tags'] = "$_POST[relation], " . "$_POST[school], " . $_POST['tags'];
	
	// convert to lowercase
	$_POST['tags'] = strtolower($_POST['tags']);
	
	if($_POST['photo'] == "")
		$_POST['photo'] = "http://dev.christopherrcooper.com/ooe/images/defaultUser.png";
	
	if($error) {
		return $error;
	}
	else {
		$currentTimestamp = date('c');
		$md5password = md5($_POST['createPassword']);
		$groupId = 0;
		$roleLevel = 1;	
		
		// passed create account, set the session, insert the account data, return pass
		mysql_query("INSERT INTO " . $GLOBALS['tblName'] . "Accounts
		(username, email, groupId, password, timestamp, accountType, lastLogin, photo, description) VALUES('$_POST[createUsername]', '$_POST[createEmail]', '$groupId', '$md5password', '$currentTimestamp', '$roleLevel', '$currentTimestamp', '$_POST[photo]', '$_POST[description]') ")
		or die(mysql_error());
		$accountId = mysql_insert_id();	
		$_SESSION['groupId'] = $groupId; //default is always zero when creating from the homepage
		
		//should set session to last insert id (user id #)
		$_SESSION['id'] = $accountId;
		
			$parent_id = mysql_insert_id();
	
	//###no need to strip spaces####  $_POST['tags'] = str_replace (" ", "", $_POST['tags']);
	if(substr($_POST['tags'],-1) == ",")
		$_POST['tags'] = substr($_POST['tags'],0,-1);	
	$new_tags_ar = explode(",", $_POST['tags']);	
	// insert the new tags
	foreach ($new_tags_ar as $tag) 
	{
		$tag = trim($tag);
		mysql_query("INSERT INTO " . $GLOBALS['tblName'] . "Tags
		(parentId, type, value) VALUES('$parent_id', 'Accounts', '$tag') ") 
		or die(mysql_error());
	}
	
		
		return 'Success! Account created! <a href="?home">Home</a>?';
	}
	
}

function editAccount($_POST) //this function always recieves clean variables
{
	//
	// This function trys to update an account
	// through $_POST
	//
	
	$md5password = md5($_POST['password']);


	//first check if this account already exists, check email
	$result = mysql_query("SELECT * FROM " . $GLOBALS['tblName'] . "Accounts
	 WHERE email='$_POST[editEmail]' AND id!='$_SESSION[id]'") or die(mysql_error()); 
	$row = mysql_fetch_array( $result );
	if(mysql_num_rows($result) == 1) {
		$error .= "This email is already in use.";
	}
	//first check if this account already exists, check username
	$result = mysql_query("SELECT * FROM " . $GLOBALS['tblName'] . "Accounts
	 WHERE username='$_POST[editUsername]' AND id!='$_SESSION[id]'") or die(mysql_error()); 
	$row = mysql_fetch_array( $result );
	if(mysql_num_rows($result) == 1) {
		$error .= "This username is already in use.";
	}
	
	//now check the email is valid
	if(!eregi("^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$", $_POST['editEmail']) || empty($_POST['editEmail'])) {
		$error .= "This email appears to be invalid.";
	}
	 
	if(!ctype_alnum($_POST['editUsername'])) {
		$error .= "The username must be alphanumeric.";
	}
	
	if(strlen($_POST['editUsername'])<3) {
		$error .= "The username must be 3 characters or longer.  ";
	}
	
	if(strlen($_POST['description'])<2) {
		$error .= "You must answer who you are looking to connect with.  ";
	}

	
	if($error)
		return $error;

	$parent_id = $_SESSION['id'];
	
	//don't forget to drop the old tags
	mysql_query("DELETE FROM " . $GLOBALS['tblName'] . "Tags WHERE type='Accounts' AND parentId='$parent_id'") 
	or die(mysql_error());
	
	// convert to lowercase
	$_POST['tags'] = strtolower($_POST['tags']);
	
	//###no need to strip spaces####  $_POST['tags'] = str_replace (" ", "", $_POST['tags']);
	if(substr($_POST['tags'],-1) == ",")
		$_POST['tags'] = substr($_POST['tags'],0,-1);	
	$new_tags_ar = explode(",", $_POST['tags']);	
	// insert the new tags
	foreach ($new_tags_ar as $tag) 
	{
		$tag = trim($tag);
		mysql_query("INSERT INTO " . $GLOBALS['tblName'] . "Tags
		(parentId, type, value) VALUES('$parent_id', 'Accounts', '$tag') ") 
		or die(mysql_error());		
	}
	
	
	

	//check if the password and username combo exists
	/*
	$result = mysql_query("SELECT * FROM " . $GLOBALS['tblName'] . "Accounts WHERE id='$_SESSION[id]' AND password='$md5password'") or die(mysql_error()); 
	if(mysql_num_rows($result) == 1) {
		$row = mysql_fetch_array( $result );
	*/
	
		mysql_query("UPDATE " . $GLOBALS['tblName'] . "Accounts	SET username='$_POST[editUsername]', email='$_POST[editEmail]', description='$_POST[description]', status='$_POST[editStatus]' WHERE id='$_SESSION[id]'") or die(mysql_error());
		return 'Success! User information updated.';
	/*}
	else
		return 'That password combination does not exist.';*/
		
}

function updateRequest($_POST)
{
	//don't forget to drop the old tags
	mysql_query("DELETE FROM " . $GLOBALS['tblName'] . "Tags WHERE type='Files' AND parentId='$_POST[requestId]'") 
	or die(mysql_error());
	
	//###no need to strip spaces####  $_POST['tags'] = str_replace (" ", "", $_POST['tags']);
	if(substr($_POST['tags'],-1) == ",")
		$_POST['tags'] = substr($_POST['tags'],0,-1);	
	$new_tags_ar = explode(",", $_POST['tags']);	
	// insert the new tags
	foreach ($new_tags_ar as $tag) 
	{
		$tag = trim($tag);
		mysql_query("INSERT INTO " . $GLOBALS['tblName'] . "Tags
		(parentId, type, value) VALUES('$_POST[requestId]', 'Files', '$tag') ") 
		or die(mysql_error());		
	}
	
	mysql_query("UPDATE " . $GLOBALS['tblName'] . "Files SET description='$_POST[description]' WHERE id='$_POST[requestId]'") or die(mysql_error());
		return 'Success! Posting updated.';
}

function loginAccount($_POST) //this function always recieves clean variables
{
	//
	// This function trys to login an account after being handed the user's form
	// through $_POST
	//
	
	$md5password = md5($_POST['loginPassword']);
	
	//check if the password and username combo exists
	$result = mysql_query("SELECT * FROM " . $GLOBALS['tblName'] . "Accounts WHERE email='$_POST[loginEmail]' AND password='$md5password'") or die(mysql_error()); 
	if(mysql_num_rows($result) == 1) {
		$row = mysql_fetch_array( $result );
		//update the lastLogin
		$currentTimestamp = date('c');
		mysql_query("UPDATE " . $GLOBALS['tblName'] . "Accounts	SET lastLogin='$currentTimestamp' WHERE id='$row[id]'") or die(mysql_error());
		$_SESSION['id'] = $row['id'];
		$_SESSION['groupId'] = $row['groupId'];
		return 'Success! Logged in. <a href="?home">Home</a>?';
	}
	else
		return 'That username and password combination does not exist.';
}

function createGroup($_POST) //this function always recieves clean variables
{
	//
	// This function creates a group from a user request
	//
	
	$currentTimestamp = date('c');
	
	mysql_query("INSERT INTO " . $GLOBALS['tblName'] . "Groups
		(creatorUserId, createDate, lastUpdate, name) VALUES('$_SESSION[id]', '$currentTimestamp', '$currentTimestamp', '$_POST[name]') ") 
		or die(mysql_error());
	$groupId = mysql_insert_id();
	mysql_query("UPDATE " . $GLOBALS['tblName'] . "Accounts	SET groupId='$groupId' WHERE id='$_SESSION[id]'") or die(mysql_error());
		
	$_SESSION['groupId'] = $groupId;
	
	return "Group created: $_POST[name]. User group assignment updated.";
}

function isGroupSet($userId)
{
	//
	// This function checks to see if a userId is assigned to a group
	//
	
	$result = mysql_query("SELECT groupId FROM " . $GLOBALS['tblName'] . "Accounts WHERE id='$userId'") or die(mysql_error()); 
	$row = mysql_fetch_array( $result );
	if($row['groupId'] == 0)
		return false;
	else
		return true;
}

function getUserData($userId) //this function always recieves clean variables
{
	//
	// This function grabs the user data and returns it to an array
	//
	
	$result = mysql_query("SELECT * FROM " . $GLOBALS['tblName'] . "Accounts WHERE id='$userId'") or die(mysql_error()); 
	$row = mysql_fetch_array( $result );
	
	return $row;
}

function getRequestData($requestId) //this function always recieves clean variables
{
	//
	// This function grabs the request data
	//
	
	$result = mysql_query("SELECT * FROM " . $GLOBALS['tblName'] . "Files WHERE id='$requestId'") or die(mysql_error()); 
	$row = mysql_fetch_array( $result );
	
	return $row;
}

function getRecentUserActions($userId) //this function always recieves clean variables
{
	//
	// this function returns a text set of recent user actions
	//
	
	$recentFiles = getRecentFiles("5", $userId);
	
	$recentActions = "Recent Postings:</p>" . $recentFiles;
		
	return $recentActions;
}

function getRecentFiles($max = 5, $userId = "") //this function always recieves clean variables
{
	//
	// This function receives a $max variable which indicates how many recent files to return
	//
	
	$text = "<ul>";
	
	$result = mysql_query("SELECT * FROM " . $GLOBALS['tblName'] . "Files WHERE userId='$userId' ORDER BY timestamp DESC LIMIT 0,$max") or die(mysql_error()); 
	while($row = mysql_fetch_array( $result )) {
		if($row['filename'])
			$file = "<a href=\"?request=$row[id]\">$row[filename]</a>";
		else
			$file = "<a href=\"?request=$row[id]\">posting #$row[id]</a>";
		$text .= "<li><a href=\"?profile&id=$row[userId]\">" . getUsernameFromId($userId) . "</a> added $file <small>" . date("M d, Y", strtotime($row['timestamp'])) . "</small></li>";
	}
	
	if(mysql_num_rows($result) == 0)
		$text .= "<li>There are no recent changes.</li>";
	
	$text .= "</ul>";
	
	
	return $text;
}

function getGroupUsers($max) //this function always recieves clean variables
{
	//
	// This function receives a $max variable which indicates how many recent patchworks to return
	//
	
	$text = "<ul>";
	
	$result = mysql_query("SELECT * FROM " . $GLOBALS['tblName'] . "Accounts WHERE groupId='$_SESSION[groupId]' ORDER BY timestamp DESC LIMIT 0,$max") or die(mysql_error()); 
	while($row = mysql_fetch_array( $result )) {
		$text .= "<li><a href=\"?profile&id=$row[id]\">$row[username]</a> <small>$row[timestamp]</small></li>";
	}
	
	if(mysql_num_rows($result) == 0)
		$text .= "<li>There are no recent changes.</li>";
	
	$text .= "</ul>";
	
	
	return $text;
}

function getGroupOptions($groupId) 
{
	//
	// this function receives a groupId and sets that as the selected group in an option list
	//
	
	$result = mysql_query("SELECT id, name FROM " . $GLOBALS['tblName'] . "Groups") or die(mysql_error()); 

	while($row = mysql_fetch_array( $result )) {
		if($row['id'] == $groupId)
			$selected = "selected";
		else
			$selected = "";
		$groupOptions .= "<option value=\"$row[id]\"$selected>$row[name]</option>";
	}
	
	if(!$groupId){
		$groupOptions = "<option value=\"0\"$selected>NULL</option>";
	}
	
	return $groupOptions;
}

function getRoleOptions($userId = 0) 
{
	//
	// this function receives a userId and pushes back a select list of role options.  
	// If userId is default (0), show this user's role options which are this user's role
	// or less.
	//
	
	if($userId) {
		$userRole = checkRole($userId);
	}
	else
		$userRole = checkRole($_SESSION['id']);
		
	$result = mysql_query("SELECT * FROM " . $GLOBALS['tblName'] . "Roles WHERE roleLevel >= '$userRole'") or die(mysql_error()); 

	while($row = mysql_fetch_array( $result )) {		
		$roleOptions .= "<option value=\"$row[id]\">$row[name]</option>";
	}
	
	return $roleOptions;
}

function groupIdToName($groupId) //this function always recieves clean variables 
{
	//
	// this function receives a groupId and converts it into the group name
	//
	$result = mysql_query("SELECT name FROM " . $GLOBALS['tblName'] . "Groups WHERE id='$groupId'") or die(mysql_error()); 

	$row = mysql_fetch_array( $result );
	
	return $row['name'];
	
}

function getUsernameFromId($userId) //this function always recieves clean variables 
{
	//
	// this function receives a userId and converts it into the username
	//	
	
	$result = mysql_query("SELECT username FROM " . $GLOBALS['tblName'] . "Accounts WHERE id='$userId'") or die(mysql_error()); 

	$row = mysql_fetch_array( $result );
	
	if(!$row['username'])
		$row['username'] = "Anonymous";
	
	return $row['username'];
}

function sendInvite($_POST) //this function always receives clean variables
{
	//
	// this functino receives $_POST, creates an invite entry, and sends an invite
	//	
	
	// send the email with this data
	$key = md5(time());	
	$to = $_POST['email'];
	$email = "do-not-reply@patchworkit.com";
	$name = $_POST['name'];
	
	
	/*mysql_query("INSERT INTO " . $GLOBALS['tblName'] . "Invitations
	(key, inviterId, groupId, roleLevel, email) VALUES('$key', '$_SESSION[id]', '$_SESSION[groupId]', '$_POST[role]', '$to') ") 
	or die(mysql_error());*/
	
	mysql_query("INSERT INTO " . $GLOBALS['tblName'] . "Invitations
	(invitationKey, inviterId, groupId, roleLevel, email) VALUES('$key', '$_SESSION[id]', '$_SESSION[groupId]', '$_POST[role]', '$to') ")
	or die(mysql_error());
		
	$inviteId = mysql_insert_id();	
	
	$message = "Hi $_POST[name],<br />You have been invited to join $GLOBALS[site_title] with the group " . groupIdToName($_SESSION['groupId']) . ".   To accept the invitation, please go here: <a href=\"$GLOBALS[site_root]/?acceptInvite=1&id=$inviteId&key=$key\">$GLOBALS[site_root]/?acceptInvite=1&id=$inviteId&key=$key</a>";
		
	$headers = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= "From: $email";
	
	$subject = "Invitation to join $GLOBALS[site_title] with " . groupIdToName($_SESSION['groupId']) . " from $_POST[name]!";
	
	//email verify
	if(!eregi("^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$", $email)) {
		$return = "Bad email.";
	}
	
	if(empty($name))
		$return = "Please enter your name.";
	if($return)	{
		return $return; // echo for purposes of a HTML request
	}
	if(mail( $to, $subject, $message, $headers )) {
		return "Invitation sent to $to!"; // echo for purposes of a HTML request
	}
}

function truncate($text, $length, $ending = '...', $exact = false, $considerHtml = false) 
{
	/**
	* Truncates text.
	*
	* Cuts a string to the length of $length and replaces the last characters
	* with the ending if the text is longer than length.
	*
	* @param string  $text String to truncate.
	* @param integer $length Length of returned string, including ellipsis.
	* @param mixed $ending If string, will be used as Ending and appended to the trimmed string. Can also be an associative array that can contain the last three params of this method.
	* @param boolean $exact If false, $text will not be cut mid-word
	* @param boolean $considerHtml If true, HTML tags would be handled correctly
	* @return string Trimmed string.
	*/

	if (is_array($ending)) {
		extract($ending);
	}
	if ($considerHtml) {
		if (mb_strlen(preg_replace('/<.*?>/', '', $text)) <= $length) {
			return $text;
		}
		$totalLength = mb_strlen($ending);
		$openTags = array();
		$truncate = '';
		preg_match_all('/(<\/?([\w+]+)[^>]*>)?([^<>]*)/', $text, $tags, PREG_SET_ORDER);
		foreach ($tags as $tag) {
			if (!preg_match('/img|br|input|hr|area|base|basefont|col|frame|isindex|link|meta|param/s', $tag[2])) {
				if (preg_match('/<[\w]+[^>]*>/s', $tag[0])) {
					array_unshift($openTags, $tag[2]);
				} else if (preg_match('/<\/([\w]+)[^>]*>/s', $tag[0], $closeTag)) {
					$pos = array_search($closeTag[1], $openTags);
					if ($pos !== false) {
						array_splice($openTags, $pos, 1);
					}
				}
			}
			$truncate .= $tag[1];

			$contentLength = mb_strlen(preg_replace('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|&#x[0-9a-f]{1,6};/i', ' ', $tag[3]));
			if ($contentLength + $totalLength > $length) {
				$left = $length - $totalLength;
				$entitiesLength = 0;
				if (preg_match_all('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|&#x[0-9a-f]{1,6};/i', $tag[3], $entities, PREG_OFFSET_CAPTURE)) {
					foreach ($entities[0] as $entity) {
						if ($entity[1] + 1 - $entitiesLength <= $left) {
							$left--;
							$entitiesLength += mb_strlen($entity[0]);
						} else {
							break;
						}
					}
				}

				$truncate .= mb_substr($tag[3], 0 , $left + $entitiesLength);
				break;
			} else {
				$truncate .= $tag[3];
				$totalLength += $contentLength;
			}
			if ($totalLength >= $length) {
				break;
			}
		}

	} else {
		if (mb_strlen($text) <= $length) {
			return $text;
		} else {
			$truncate = mb_substr($text, 0, $length - strlen($ending));
		}
	}
	if (!$exact) {
		$spacepos = mb_strrpos($truncate, ' ');
		if (isset($spacepos)) {
			if ($considerHtml) {
				$bits = mb_substr($truncate, $spacepos);
				preg_match_all('/<\/([a-z]+)>/', $bits, $droppedTags, PREG_SET_ORDER);
				if (!empty($droppedTags)) {
					foreach ($droppedTags as $closingTag) {
						if (!in_array($closingTag[1], $openTags)) {
							array_unshift($openTags, $closingTag[1]);
						}
					}
				}
			}
			$truncate = mb_substr($truncate, 0, $spacepos);
		}
	}

	$truncate .= $ending;

	if ($considerHtml) {
		foreach ($openTags as $tag) {
			$truncate .= '</'.$tag.'>';
		}
	}

	return $truncate;
}


// ADMIN TOOLS //

function checkRole($userId) //this function always recieves clean variables
{
	//
	// this function checks for role level
	//
	
	// role levels:
	// 1: owner
	// 2: admin
	// 3: editor
	// 4: user
	
	$result = mysql_query("SELECT accountType FROM " . $GLOBALS['tblName'] . "Accounts WHERE id='$userId'") or die(mysql_error()); 

	$row = mysql_fetch_array( $result );
	
	return $row['accountType'];	
}

function drawAddToolChange() 
{
	$role = checkRole($_SESSION['id']);
	if($role !== "1") { //permission must be 'owner' 
		return;
	}
	
	$text = '
		<form method="post" action="?postChange=1" class="ajaxForm generic">
			<fieldset>
				<label for="data">Description?</label>
				<input type="text" name="data" />
				<button type"submit">Post</button>
			</fieldset>
		</form>
	';
	
	echo $text;
	
}

function requireRole($roleLevel, $message = false) 
{	
	$role = checkRole($_SESSION['id']);
	if($role && $role <= $roleLevel) {
		return true;
	}
	else {
		if($message) { echo "You do not have the correct permission level."; }
		return false;
	}		
} 

function postChange($_POST) {
	$role = checkRole($_SESSION['id']);
	if($role !== "1") { //permission must be 'owner' 
		echo "You do not have the correct permission level.";
		return;
	}
	
	mysql_query("INSERT INTO " . $GLOBALS['tblName'] . "Changes
	(creatorUserId, data) VALUES('$_SESSION[id]', '$_POST[data]') ") 
	or die(mysql_error());

	echo "Success! Change posted.  Refresh.";
}

// END //

?>