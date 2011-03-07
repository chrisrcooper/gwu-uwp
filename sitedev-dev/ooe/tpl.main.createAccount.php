<div id="createAccount">
	<form method="post" action="?createAccount=1" class="ajaxForm">
		<fieldset>
			<legend>Register</legend>
			<label for="createUsername">Username<span class="red">*</span>: </label><input type="text" name="createUsername" /> <small>alphanumeric</small><br />
			<label for="createEmail">Email<span class="red">*</span>: </label><input type="text" name="createEmail" /> <small>must be valid</small><br />
			<label for="createPassword">Password<span class="red">*</span>: </label><input type="password" name="createPassword" /> <small>six characters min.</small><br />
			<label for="description">Who are you looking to connect with?<span class="red">*</span> </label>
			<textarea name="description"></textarea><br />
			<label for="relation">Relation to GW<span class="red">*</span>: </label>
			<select name="relation">
				<option value="Non-GW Affiliated">Non-GW Affiliated</option>
				<option value="Undergraduate Student">Undergraduate Student</option>
				<option value="Graduate Student">Graduate Student</option>
				<option value="Faculty">Faculty</option>
				<option value="Staff">Staff</option>
				<option value="Alumni">Alumni</option>				
			</select>
			<br />
			<label for="school">GW School<span class="red">*</span>: </label>
			<select name="school">
				<option value="Non-GW School">Not Applicable</option>
				<option value="Columbian College">Columbian College</option>
				<option value="Medical School">Medical School</option>
				<option value="SEAS">SEAS</option>
				<option value="GSEHD">GSEHD</option>
				<option value="GWSB">GWSB</option>
				<option value="Elliott School">Elliott School</option>
				<option value="Public Policy">Public Policy</option>
				<option value="Public Health">Public Health</option>
				<option value="Professional Studies">Professional Studies</option>
				<option value="Nursing ">Nursing</option>
			</select>
			<br />
			<label for="skills">Functional Skills: </label><input type="text" name="skills" /> <small>e.g.: web development, advertising</small><br />
			<label for="industry">Industry Interest: </label><input type="text" name="industry" /> <small>e.g.: government defense contracting, pharmaceuticals</small><br />
			<label for="tags">Tags: </label><input type="text" name="tags" /> <small>e.g.: social media, business development</small><br />
			<label for="photo">Photo URL: </label><input type="text" name="photo" /> <small>for fun, displayed at 75x75 pixels</small><br />
			<button type="submit">Submit</button>
		</fieldset>
	</form>
</div>