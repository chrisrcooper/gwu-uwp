<?php 
@require_once('inc.config.php');
@require_once('inc.lib.php');

if($_GET) {
	$_GET = clean_array($_GET);
	if($_POST)
		$_POST = clean_array($_POST);
	if($_GET['add'] == 1) {
		$response = addIssue($_POST);
	}
	if($_GET['getListing'] > 0) {
		$listing = getListing($_GET['getListing']);
	}
	if($_GET['editIssue']) {
		$ar_Issue = getIssueData($_GET['editIssue']);
	}
	if($_GET['edit'] == 1) {
		$response = editIssue($_POST);
	}	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- Last Edit: 11/18/10 -->
<html xmlns="http://www.w3.org/1999/xhtml">
	<head profile="http://gmpg.org/xfn/1">
    	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
        <meta name="ICBM" content="37.632831, -77.544701" />
        <meta name="DC.title" content="Patchwork | Design Management System" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <title>ORB Review</title>
        <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="" />     
        <link rel="icon" href="images/favicon.ico" type="image/x-icon" />
    	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />        
        <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="css/global.css" media="screen" /> 
        <link rel="stylesheet" type="text/css" href="css/admin.css" media="screen" />
        <!--[if lte IE 7]>
        	<link rel="stylesheet" type="text/css" href="css/ie-fix.css" media="screen" />
        <![endif]-->
        
	</head>
	<body>
	<a name="top"></a>
		<div id="container">
			<div id="dateListing">
				<p><label for="reviews">ORB Review Periods: </label><?php echo getDates(); ?></p>
			</div>
			<div id="listing">
				<?php echo $listing; ?>				
			</div>
			
			<div id="ajaxResult"><?php if($response){echo $response;}?></div>
			
			<div id="addIssue">
				<form method="post" action="?edit=1" id="edit"<?php if(!$_GET['editIssue']){echo 'style="display: none;"';} ?>>
					<fieldset>
						<legend>Edit an Issue</legend>
						<label for="id">ID: </label>
						<input type="text" size="4" maxlength="4" name="mantisId" value="<?php echo $ar_Issue['mantisId']; ?>" />
						<br />
						<label for="summary">Summary: </label>
						<textarea name="summary"><?php echo $ar_Issue['summary']; ?></textarea>
						<br />
						<label for="status">Status: </label><input type="text" size="25" maxlength="25" name="status" value="<?php echo $ar_Issue['status']; ?>" />
						<br />
						<label for="category">Category</label>
						<select name="category">
							<option value="Feedback Requested"
							<?php if($ar_Issue['category'] == "Feedback Requested"){echo 'selected';} ?>
							>Feedback Requested</option>
							<option value="Request-Initial"
							<?php if($ar_Issue['category'] == "Request-Initial"){echo 'selected';} ?>
							>Request-Initial</option>
							<option value="Request-NonDev"
							<?php if($ar_Issue['category'] == "Request-NonDev"){echo 'selected';} ?>
							>Request-NonDev</option>
							<option value="Request-Dev"
							<?php if($ar_Issue['category'] == "Request-Dev"){echo 'selected';} ?>
							>Request-Dev</option>
						</select>
						<br />
						<label for="priority">Priority</label>
						<select name="priority">
							<option value="None"
							<?php if($ar_Issue['priority'] == "None"){echo 'selected';} ?>
							>None</option>
							<option value="Low"
							<?php if($ar_Issue['priority'] == "Low"){echo 'selected';} ?>
							>Low</option>
							<option value="Normal"
							<?php if($ar_Issue['priority'] == "Normal"){echo 'selected';} ?>
							>Normal</option>
							<option value="High"
							<?php if($ar_Issue['priority'] == "High"){echo 'selected';} ?>
							>High</option>
							<option value="Urgent"
							<?php if($ar_Issue['priority'] == "Urgent"){echo 'selected';} ?>
							>Urgent</option>
							<option value="Emergency"
							<?php if($ar_Issue['priority'] == "Emergency"){echo 'selected';} ?>
							>Emergency</option>
						</select>
						<br />
						<label for="loe">LOE</label>
						<select name="loe">
							<option value="Small"
							<?php if($ar_Issue['loe'] == "Small"){echo 'selected';} ?>
							>Small</option>
							<option value="Medium"
							<?php if($ar_Issue['loe'] == "Medium"){echo 'selected';} ?>
							>Medium</option>
							<option value="Large"
							<?php if($ar_Issue['loe'] == "Large"){echo 'selected';} ?>
							>Large</option>
						</select>
						<br />
						<label for="date">ORB Date: </label>
						<input type="text" size="10" maxlength="10" name="date" value="<?php echo $ar_Issue['date']; ?>" /><br />
						<input type="hidden" name="id" value="<?php echo $ar_Issue['id']; ?>" />
						<button type="submit">Update</button>
					</fieldset>					
				</form>
				<form method="post" action="?add=1" id="add">
					<fieldset>
						<legend>Add an Issue</legend>
						<label for="id">ID: </label>
						<input type="text" size="4" maxlength="4" name="id" />
						<br />
						<label for="summary">Summary: </label>
						<textarea name="summary"></textarea>
						<br />
						<label for="status">Status: </label><input type="text" size="25" maxlength="25" name="status" value="new" />
						<br />
						<label for="category">Category</label>
						<select name="category">
							<option value="Feedback Requested">Feedback Requested</option>
							<option value="Request-Initial">Request-Initial</option>
							<option value="Request-NonDev">Request-NonDev</option>
							<option value="Request-Dev" selected>Request-Dev</option>
						</select>
						<br />
						<label for="priority">Priority</label>
						<select name="priority">
							<option value="None">None</option>
							<option value="Low">Low</option>
							<option value="Normal" selected>Normal</option>
							<option value="High">High</option>
							<option value="Urgent">Urgent</option>
							<option value="Emergency">Emergency</option>
						</select>
						<br />
						<label for="loe">LOE</label>
						<select name="loe">
							<option value="Small">Small</option>
							<option value="Medium" selected>Medium</option>
							<option value="Large">Large</option>
						</select>
						<br />
						<label for="date">ORB Date: </label>
						<input type="text" size="10" maxlength="10" name="date" value="<?php echo date('Y\-m\-d'); ?>" /><br />
						<button type="submit">Add</button>
					</fieldset>					
				</form>									
			</div>
			<div class="clear"></div>
			<div id="footer" style="text-align: center;">				
				<p><a href="?home">Home</a> | <a href="mailto:cooper@gwu.edu">Help</a></p>
			</div>
		</div>		
		<script src="http://www.google.com/jsapi" type="text/javascript"></script>
		<script>
			// Load jQuery
			google.load("jquery", "1");			
		</script>
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/jquery-ui.min.js" type="text/javascript"></script>		
		<script type="text/javascript" src="js/global.js"></script>
		<script type="text/javascript" src="js/form.js"></script>
	</body>
</html>	