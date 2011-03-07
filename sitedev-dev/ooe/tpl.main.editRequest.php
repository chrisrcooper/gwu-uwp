<?php $ar_Plan = getRequestData(clean_array($_GET['editRequest'])); ?>
<div id="editAccount">
	<form method="post" action="?updateRequest=1" class="ajaxForm">
		<fieldset>
			<legend>Edit Request</legend>
			<label for="description">Description? </label>
			<textarea name="description"><?php echo $ar_Plan['description']; ?></textarea><br />
			<label for="tags">Tags<span class="red">*</span>: </label><input type="text" name="tags" value="<?php echo tags('Files', $ar_Plan['id'], '1'); ?>" /> <small>comma deliminated</small><br />
			<input type="hidden" name="requestId" value="<?php echo $ar_Plan['id']; ?>" />
			<button type="submit">Update</button>
		</fieldset>
	</form>
</div>