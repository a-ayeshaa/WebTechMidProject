<?php
	session_start();
	if (count($_SESSION)===0)
	{
		header(location:"../controller/Logout.php");
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>CHANGE PASSWORD</title>

</head>

<body>

	<h2>RESET PASSWORD</h2>
	<a href="Home.php">HOME </a> || <a href="Profile.php">View Profile</a> || <a href="ChangePassword.php"> Change Password </a>
	<form action="../controller/ChangePasswordAction.php" method="POST">
		<br><br>
		<fieldset>
			<legend><h4>CHANGE PASSWORD</h4></legend>
			<fieldset>
				<h5>
				<b>Current Password : </b><input type="password" name="currentpassword" placeholder="">
		        <br><br>
		        <b>New Password : </b><input type="password" name="npassword" placeholder="">
		        <br><br>
		        <b>Confirm Password : </b><input type="password" name="confirmpassword" placeholder="">
		    	</h5>
		    	<button type="Submit">Submit</button>
			</fieldset>
		</fieldset>
	</form>


</body>
</html>