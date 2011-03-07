<?php $ar_Plan = getRequestData(clean_array($_GET['request'])); ?>
<div id="profile">
	<?php /*if($_SESSION['groupId'] !== $ar_User['groupId']) 
		{echo "Sorry, you are not in the same group as this user.";exit();}
		
		#### disabled for OOE */
	?>
	<h2>Posting #<?php echo $ar_Plan['id']; ?>
	<?php 
		if($_SESSION['id'] == $ar_Plan['userId']) {
			echo "<a class=\"sub\" href=\"?editRequest=$ar_Plan[id]\">Edit</a>";
		}
	?></h2>
	<p><strong>Date:</strong> <?php echo date("M d, Y", strtotime($ar_Plan['timestamp'])); ?>
	<p><strong>Author:</strong> <?php echo "<a href=\"?profile&id=$ar_Plan[userId]\">" . getUsernameFromId($ar_Plan['userId']) . '</a>'; ?>
	<br />
	<strong>Tags:</strong> <?php echo tags('Files', $ar_Plan['id']); ?>
	<p>
	<strong>Description:</strong><br /><?php echo $ar_Plan['description']; ?>
	</p>
	<?php
		if($ar_Plan['filename'])
		{ 
			echo "<p>
			<strong><a target=\"_blank\" href=\"uploads/$ar_Plan[filename]\">Download Attachment</a></strong>
			</p>";
		} 
	?>
	</p>
</div>