<?php
?>
<head>
<style type="text/css">
	body{ line-height: 20px; }
	label{ width: 150px; }
	#makepw:hover, #cancel:hover, #hide:hover, #show:hover{ color: pink; }
	#cancel{ margin-left: 20px; }
</style> 
</head>
<div class="container">
	<div class="row">
		<div class="col-md-8">
<form method="post" action="">
	<p>Create a brand new user and add them to this site.</p>
	
	<label>UserName</label> 
	<input id="user_name" type="text" name="user_name" placeholder="required" required><br>

	<label>Email</label>
	<input id="user_email" type="email" name="user_email" placeholder="required" required><br>

	<label>Firstname</label>
	<input type="text" name="user_fname"><br>

	<label>Lastname</label>
	<input type="text" name="user_lname"><br>

	<label>Website</label>
	<input id="user_website" type="text" name="user_website"><br>

	<label>Password</label>
	<a id="makepw" name="makepw" > Click to show password </a>
	<input id="user_pw" type="text" name="user_pw" value = "<?php echo wp_generate_password();?>"><br>
	<a id="hide" name="hide" > hide!</a>
	<a id="show" name="show" > show!</a>
	<a id="cancel" name="cancel" > Cancel!</a><br>
	<br>

	<label>Send User Notification</label>
	<input type="checkbox" name="send_user"><span>Send the new user an email about their account.</span><br><br>

	<label>Role</label>
	<select name="user_role"> 
			<?php
				global $wp_roles;     
				$roles = $wp_roles->get_names();
				foreach ($roles as $role => $value) {
			?>
	<option name="user_role" value="<?php echo $role;?>"><?php echo $value;?></option>
	<?php
	}
	?>
				</select><br><br>   
				<button id="newuser" name="bttn" class="btn btn-md">Add New User </button><br>
				</form>
</div>
</div>
</div>