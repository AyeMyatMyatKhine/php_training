<?php include 'app_logic.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
	<form class="login-form" action="login.php" method="post">
		<h2 class="form-title">Login</h2>
		<?php include('message.php'); ?>
		<div class="form-group">
			<label>Username or Email</label>
			<input type="text" value="<?php echo $user_id; ?>" name="user_id">
		</div>
		<div class="form-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="form-group">
			<button type="submit" name="login_user" class="login-btn">Login</button>
		</div>
		<p><a href="enter_email.php">Forgot your password?</a></p>
	</form>
</body>
</html>