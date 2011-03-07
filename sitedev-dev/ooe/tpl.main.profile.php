<?php if(!$_SESSION['id']){exit("<p>You must <a href='?createAccount'>register</a> or <a href='?login'>login</a> to view profiles.</p>");} ?>
<?php $ar_User = getUserData(clean_array($_GET['id']));
if(($_SESSION['id'] !== $ar_User['id']) && ($ar_User['status'] == '0'))
	exit("<p>This account has been deactivated.</p>");
?>
<div id="profile">
	<?php /*if($_SESSION['groupId'] !== $ar_User['groupId']) 
		{echo "Sorry, you are not in the same group as this user.";exit();}
		
		#### disabled for OOE */
	?>
	<h2>Profile
	<?php 
		if($_SESSION['id'] == $ar_User['id']) {
			echo '<a class="sub" href="?editProfile">Edit</a>';
		}
	?></h2>
	<img src="<?php echo $ar_User['photo']; ?>" alt="" width="100" />
	<p><strong>Username:</strong> <?php echo $ar_User['username']; ?>
	<br />
	<strong>Status:</strong> <?php echo getUserStatus($ar_User['id']); ?>
	<br />
	<strong>E-mail:</strong> <?php echo "<a href=\"mailto:$ar_User[email]\">$ar_User[email]</a>"; ?>
	<br />
	<strong>Tags:</strong> <?php echo tags('Accounts', $ar_User['id']); ?>
	<p>
	<strong>Who I am looking to connect with:</strong><br /><?php echo $ar_User['description']; ?>
	</p>
	</p>
	<div class="clear"></div>
	<p><?php echo getRecentUserActions($ar_User['id']);?></p>
</div>