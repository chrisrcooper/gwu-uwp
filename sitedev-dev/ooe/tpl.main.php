	<div id="container">
		<div id="header">
			<a href="http://www.gwu.edu" style="text-decoration: none; float: left; margin-top: 20px; display: block; width: 237px; height: 110px"></a>
			<div id="logo">
				<a href="http://www.gwbizplan.com"><img src="images/logo_bizplan.gif" alt="" style="margin-right: 20px;" />
				<a href="http://www.gwu.edu/discover/discoveriesinnovations/entrepreneurship"><img src="images/logo.png" alt="" /></a>
			</div>
			<div id="welcome">
				<?php echo getStatus(); ?>
			</div>
			<div id="nav">
				<ul>
					<?php 
					if(!$_SESSION['id'])
						echo '<li><a href="?login">Login</a></li>';
					else {
						echo "<li><a href=\"?profile&id=$_SESSION[id]\">Profile</a>";
						echo '<li><a href="?logout">Logout</a></li>';
					}
					?>
					<li><a href="?createAccount">New User</a></li>
					<li><a href="?upload">Create a Posting</a></li>
				</ul>
			</div>
		</div>		
		<div id="content">
			<?php if($_GET){getCurrentPageContent($_GET);}?>
			<div id="holder" class="hide"><p id="ajaxResult"></p></div>
		</div>
		<div id="footer">				
			<p><a href="?home">Home</a> | &copy 2010 <a href="<?php echo $site_root; ?>">The George Washington University</a>.  <!--Proudly made possible by <a href="http://www.gwu.edu">The George Washington University</a>.--></p>
		</div>
	</div>	    
