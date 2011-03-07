<?php
	
	@require_once("inc.config.php");
	@require_once("inc.lib.php");
	if($_GET && $_POST) {
		echo $result = handlePostRequest($_GET,$_POST);
		exit();
	}	
	if($_GET) {
		echo $result = handleRequest($_GET);
		
		if($_GET['exit'] == 1)
			exit();
	}
	if(!$_GET)
		$_GET['home'] = 1;
	//dev only:
	//if($_SESSION['id']) {
	//	@require_once("tpl.landing.php");
	//	exit();
	//}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- Last Edit: 07/27/10 -->
<!-- Author: Daymuse Studios, http://www.daymuse.com -->
<html xmlns="http://www.w3.org/1999/xhtml">
	<head profile="http://gmpg.org/xfn/1">
    	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
        <meta name="ICBM" content="37.632831, -77.544701" />
        <meta name="DC.title" content="<?php echo $GLOBALS['site_title']; ?>" />
        <meta name="description" content="<?php echo $GLOBALS['meta_description']; ?>" />
        <meta name="keywords" content="<?php echo $GLOBALS['meta_keywords']; ?>" />
        <title><?php if($GLOBALS['sub_title']){echo "$GLOBALS[sub_title] | ";}echo $GLOBALS['site_title']; ?></title>
        <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php echo $GLOBALS['rss_url']; ?>" />
        <link rel="canonical" href="<?php echo $GLOBALS['site_root']; ?>/" />       
        <link rel="icon" href="images/favicon.ico" type="image/x-icon" />
    	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />        
        <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="css/global.css" media="screen" /> 
        <link rel="stylesheet" type="text/css" href="css/phase1.css" media="screen" />
        <!--[if lte IE 7]>
        	<link rel="stylesheet" type="text/css" href="css/ie-fix.css" media="screen" />
        <![endif]-->
	</head>
	<body>
		<a name="top"></a>
		<?php
			//if($_SESSION['id'])
				@require_once("tpl.main.php");
			//else
				//@require_once("tpl.login.php");
		?>
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