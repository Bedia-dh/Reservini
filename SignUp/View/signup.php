<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<?php
if (isset($_GET['signup']) && $_GET['signup'] == 'success') {
    echo "<p style='color: green;'>Sign up successful! You can now log in.</p>";
}
?>
<body>
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">
			<div class="signup">
				<form action="http://localhost/reservini_pfa/SignUp/Controller/authController.php" method="POST">
					<label for="chk" aria-hidden="true">Sign up</label>
					<input type="text" name="user_name" placeholder="User name" required="">
					<input type="email" name="email" placeholder="Email" required="">
					<input type="password" name="password" placeholder="Password" required="">
					<button type="submit" name="signup">Sign up</button>
				</form>
			</div>

			<div class="login">
				<form action="http://localhost/reservini_pfa/SignUp/Controller/authController.php" method="POST">
					<label for="chk" aria-hidden="true">Login</label>
					<input type="email" name="email" placeholder="Email" required="">
					<input type="password" name="password" placeholder="Password" required="">
					<button type="submit" name="login" >Login</button>
				</form>
			</div>
	</div>
</body>
</html>