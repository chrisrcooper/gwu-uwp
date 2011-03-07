<?php
/* ## SHOW USERS LISTING ON HOME PAGE IS DISABLED ##
<h2>New Users<a href="?createAccount" class="sub">register today</a></h2>
<table>
<tr>
	<th>Photo</th>
	<th>Date</th>
	<th>Name</th>
	<th>Tags</th>
	<th>Status</th>
</tr>
<?php echo drawUsers(10); ?>
</table>
*/
?>
<h3>BizPlanComp MatchMaker</h3>
<p>Please use this tool to find other like-minded entrepreneurs, skilled resources, and community members. Review and create postings and/or profiles to find a team or teammate! Want to <a href="?allUsers">view all users</a>?</p>
<h2>Postings<a href="?upload" class="sub">post your own</a></h2>
<table>
<tr>
	<th>Date</th>
	<th>Author</th>
	<th>Tags</th>
	<th width="40%">Description</th>
</tr>
<?php echo drawFiles(10); ?>
</table>
<p class="right"><a href="?allFiles">Show All</a></p>
