<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>WELCOME</title>

</head>
	
	<form action="../controller/RequestPasswordAction.php" method="POST">
		<fieldset>
			<legend><b>VERIFY INFORMATION</b></legend>
			<h5>
			Date Of Birth : <input type="Date" name="vDoB">
			<br><br>
			Recovery Email : <input type="email" name="vEmail">
			<br><br>
			Color: <input type="text" name="vColor">
			</h5>
		</fieldset>
		<br>
		<fieldset>
			<legend><b>SET NEW PASSWORD</b></legend>
			<h5>
			New Password : <input type="password" name="npassword">
			<br><br>
			Confirm Password : <input type="password" name="cpassword">
			</h5>
		</fieldset>
		<br><br>
		<input type="submit" name="verify" value="VERIFY AND CHANGE PASSWORD">
	</form>


<body>

</body>
</html>