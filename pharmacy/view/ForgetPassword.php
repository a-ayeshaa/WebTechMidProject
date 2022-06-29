<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <title>Forgot Password</title>

</head>



<body>
	<form action="../controller/ForgetPasswordAction.php" method="POST">
		<fieldset>
			<h5>
			Username: <input type="text" name="username">
			<br><br>
			Email : <input type="email" name="email">
			</h5> 
		</fieldset>
		<br>
		<input type="submit" name="request" value="REQUEST FOR NEW PASSWORD">
	</form>



</body>
</html>