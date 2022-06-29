<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <title>Login Form</title>

</head>

<body>

	<h1>Login Form</h1>
 	<form action="../controller/LoginFormAction.php" method="POST">
		Username: <input type="text" name="username">
		<br><br>
		Password: <input type="password" name="password">
		<br><br>
		<input type="submit" name="login" value="Login"> 
		<a href="ForgetPassword.php"> Forgot Password? </a>
	</form>


	Not registered yet? <a href="CustomerRegistration.php"> Click here </a> for registration.

</body>
</html>