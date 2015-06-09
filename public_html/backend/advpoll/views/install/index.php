<?php
/**
 * @copyright	Copyright (c) 2013 Skyline Technology Ltd (http://extstore.com). All rights reserved.
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU/GPL version 2
 */

?>

<div class="row-fluid">
	<form id="installForm" name="adminForm" method="post" action="">
		<div class="span8 form-horizontal">
			<h3>Database Configuration</h3>
			<div class="control-group">
				<label class="control-label" for="inputDBHost">
					Host Name<span class="star">&nbsp;*</span>
				</label>
				<div class="controls">
					<input type="text" id="inputDBHost" name="db[host]" required="required" value="<?php echo $db['host']; ?>" />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputDBUser">
					Username<span class="star">&nbsp;*</span>
				</label>
				<div class="controls">
					<input type="text" id="inputDBUser" name="db[user]" required="required" value="<?php echo $db['user']; ?>" />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputDBPass">
					Password
				</label>
				<div class="controls">
					<input type="password" id="inputDBPass" name="db[pass]" value="<?php echo $db['pass']; ?>" />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputDBName">
					Database Name<span class="star">&nbsp;*</span>
				</label>
				<div class="controls">
					<input type="text" id="inputDBName" name="db[name]" required="required" value="<?php echo $db['name']; ?>" />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputDBPrefix">
					Prefix
				</label>
				<div class="controls">
					<input type="text" id="inputDBPrefix" name="db[prefix]" required="required" value="<?php echo $db['prefix']; ?>" />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">
					Old Database
				</label>
				<div class="controls">
					<label class="radio inline">
						<input type="radio" name="db[old]" value="0" <?php echo $db['old'] == 0 ? 'checked="checked"' : ''; ?> />
						Backup
					</label>
					<label class="radio inline">
						<input type="radio" name="db[old]" value="1" <?php echo $db['old'] == 1 ? 'checked="checked"' : ''; ?> />
						Remove
					</label>
				</div>
			</div>
		</div>

		<div class="span4">
			<h3>Site Configuration</h3>
			<div class="control-group">
				<label class="control-label" for="inputSiteName">
					Site Name<span class="star">&nbsp;*</span>
				</label>
				<div class="controls">
					<input type="text" id="inputSiteName" name="site[name]" required="required" value="<?php echo $site['name']; ?>" />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputUserName">
					Username<span class="star">&nbsp;*</span>
				</label>
				<div class="controls">
					<input type="text" id="inputUserName" name="site[username]" required="required" value="<?php echo $site['username']; ?>" />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputUserPass">
					Password<span class="star">&nbsp;*</span>
				</label>
				<div class="controls">
					<input type="password" id="inputUserPass" name="site[password]" required="required" value="<?php echo $site['password']; ?>" />
				</div>
			</div>
		</div>
	</form>
</div>