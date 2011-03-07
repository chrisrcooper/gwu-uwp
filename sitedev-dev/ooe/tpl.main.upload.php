<?php if(!$_SESSION['id']){exit("<p>You must <a href='?createAccount'>register</a> or <a href='?login'>login</a> to create postings.</p>");} ?>
<div id="uploadPlan">
	<form method="post" action="?upload=1" class="ajaxForm">
		<fieldset>
			<legend>Create a Posting</legend>
			<label for="description">Description<span class="red">*</span>: </label>
			<textarea name="description"></textarea><br />
			<label for="tags">Tags<span class="red">*</span>: </label><input type="text" name="tags" /> <small>e.g.: social media, business development</small><br />
			<button type="submit">Submit</button>
		</fieldset>
	</form>
</div>