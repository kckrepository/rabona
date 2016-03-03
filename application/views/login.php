<html>
	<?php
		if (isset($this->session->userdata['logged_in'])) {
			header("location:" . $this->config->item('base_url') . "index.php/user_authentication/user_login_process");
		}
	?>

	<head>
		<title>Rabona - Login</title>
		<link rel="stylesheet" href="<?php echo(CSS.'style.css'); ?>">
		<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
	</head>
	<body>
		<?php
			if (isset($logout_message)) {
				echo "<div class='message'>";
				echo $logout_message;
				echo "</div>";
			}
		?>
		<?php
			if (isset($message_display)) {
				echo "<div class='message'>";
				echo $message_display;
				echo "</div>";
			}
		?>
		<div id="main">
			<div id="side_login">
				<img src="<?php echo(IMG.'rabona_logo1.png'); ?>" class="centerImage" alt="what image shows" >
			</div>
			<div id="login">
				<h3>Rabona - Login</h3>
			<hr/>
				<?php echo form_open('user_authentication/user_login_process'); ?>
				<?php
					echo "<div class='error_msg'>";
						if (isset($error_message)) {
							echo $error_message;
						}
					echo validation_errors();
					echo "</div>";
				?>
					<label>UserLogin :</label>
					<input type="text" name="userlogin" id="name" placeholder="userlogin"/><br /><br />
					<label>Password :</label>
					<input type="password" name="password" id="password" placeholder="**********"/><br/><br />
					<p><input type="checkbox" name="agent" value="1"><label>As Agent</label></p>
					<input type="submit" value=" Login " name="submit"/><br />
					<!--<a href="<?php //echo($this->config->item('base_url') . 'index.php/user_authentication/user_registration_show'); ?>">To SignUp Click Here</a>-->
				<?php echo form_close(); ?>
			</div>
		</div>
	</body>
</html>