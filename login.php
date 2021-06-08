<?php  include('php_code.php');



?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<form method="post" action="" >
		<h2 align="center">Pizza Ordering System</h2>
		<h3 align="center">Login</h3>
		<div class="input-group" >
			<button class="btn" type="submit" name="guest" >Login as Guest</button>
		</div>
		<div class="input-group" >
			<h4>Login as Admin</h4>
		</div>
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" value="<?php echo $name; ?>">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password" value="<?php echo $phoneNo; ?>">
		</div>
		<div class="input-group" >
			<button class="btn" type="submit" name="admin" >Login as Admin</button>
		</div>
	</form>
</body>
</html>