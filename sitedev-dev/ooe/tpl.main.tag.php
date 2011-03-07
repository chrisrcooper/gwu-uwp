<?php $_GET = clean_array($_GET); ?>
<p>This is a listing of users and postings that match the tag: <?php echo $_GET['tag']; ?>.</p>
<h2>Latest Users by Tag</h2>
<table>
<tr>
	<th>Photo</th>
	<th>Date</th>
	<th>Name</th>
	<th>Tags</th>
</tr>
<?php echo drawUsers(25, $_GET['tag']); ?>
</table>
<h2>Latest Postings by Tag</h2>
<table>
<tr>
	<th>Date</th>
	<th>Author</th>
	<th>Tags</th>
	<th>Description</th>
</tr>
<?php echo drawFiles(25, $_GET['tag']); ?>
</table>