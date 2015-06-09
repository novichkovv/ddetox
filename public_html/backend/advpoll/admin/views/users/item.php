<?php
/**
 * @copyright	Copyright (c) 2013 Skyline Technology Ltd (http://extstore.com). All rights reserved.
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU/GPL version 2
 */
?>

<?php
require_once(PATH_ROOT . '/admin/models/usersmodel.php');
$userModel = new UsersModel();

if(!$userModel->checkRoleUser()) {
	redirect(getRoute('/'));
}
?>

<script type="text/javascript">
	$(document).ready(function(){
		$('#userForm').submit(function(){
			if($('#inputUsername').val() == '') {
				alert('Username is required!');
				$('#inputUsername').focus();
				return false;
			}

			if($('#inputPassword').val() != $('#inputRepassword').val()) {
				alert('Passwords do not match. Please re-enter password.');
				$('#inputPassword').focus();
				return false;
			}

			return true;
		});
	});
</script>

<div class="row-fluid">
	<form action="" method="post" id="userForm" name="adminForm">
		<div class="span9 form-horizontal">
			<div class="control-group">
				<label class="control-label" for="inputUsername">
					Username<span class="star">&nbsp;*</span>
				</label>

				<div class="controls">
					<input class="input-xxlarge" type="text" name="username" id="inputUsername" required="required" placeholder="Username" value="<?php echo $item->username; ?>" />
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="inputPassword">
					Password
				</label>

				<div class="controls">
					<input class="input-xxlarge" type="password" name="password" id="inputPassword" required="required" placeholder="Password" value="" />
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="inputRepassword">
					Confirm Password
				</label>

				<div class="controls">
					<input class="input-xxlarge" type="password" name="repassword" id="inputRepassword" required="required" placeholder="Confirm Password" value="" />
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="inputPassword">
					Type User<span class="star">&nbsp;*</span>
				</label>

				<div class="controls">
					<select name="type_user" id="inputTypeUser">
						<option <?php echo $item->type_user == 1 ? "selected='selected'" : ''; ?> value="1">
							Administrator
						</option>
						<option <?php echo $item->type_user == 2 ? "selected='selected'" : ''; ?> value="2">
							Manager
						</option>
					</select>
				</div>
			</div>

		</div>

		<input type="hidden" name="id" value="<?php echo $item->id; ?>" />
	</form>
</div>

