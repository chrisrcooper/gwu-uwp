<?php $ar_User = getUserData(clean_array($_SESSION['id'])); ?>
<div id="editAccount">
	<form method="post" action="?editAccount=1" class="ajaxForm">
		<fieldset>
			<legend>Edit Account</legend>
			<label for="editUsername">Username<span class="red">*</span>: </label><input type="text" name="editUsername" value="<?php echo $ar_User['username']; ?>" /> <small>alphanumeric</small><br />
			<label for="editEmail">Email<span class="red">*</span>: </label><input type="text" name="editEmail" value="<?php echo $ar_User['email']; ?>" /> <small>must be valid</small><br />
			<label for="editStatus">Status<span class="red">*</span>: </label>
			<select name="editStatus">
				<option value="1" <?php if($ar_User['status']=='1'){echo 'selected';} ?>>Active</option>
				<option value="0" <?php if($ar_User['status']=='0'){echo 'selected';} ?>>Deactived</option></select>  <small>deactivating your account will hide your profile and postings from public view</small><br />
			<label for="description">Who are you looking to connect with?<span class="red">*</span> </label>
			<textarea name="description"><?php echo $ar_User['description']; ?></textarea><br />
			<label for="tags">Tags: </label><input type="text" name="tags" value="<?php echo tags('Accounts', $ar_User['id'], '1'); ?>" /> <small>comma deliminated</small><br />
			<label for="photo">Photo URL: </label><input type="text" name="photo" value="<?php echo $ar_User['photo']; ?>" /> <small>for fun, displayed at 75x75 pixels</small><br />
			<button type="submit">Update</button>
		</fieldset>
	</form>
</div>