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
    <title>WELCOME</title>

</head>

<body>
	<h2>FILE A COMPLAIN</h2>
	<a href="Home.php">HOME </a> || <a href="Profile.php">View Profile</a> || <a href="ChangePassword.php"> Change Password </a> || <a href="ViewCart.php">View Cart</a> || <a href="OrderHistory.php"> View Billing History </a> || <a href="Complain.php"> File a Complain </a>

	<form action="../controller/ComplainSubmission.php" method="POST">


		<h5>
		ORDER ID : <input type="text" name="orderID" value= "" ;?>

		<br><br>

		<b>Description of the issue :</b>
             <br>
             <textarea name="complain"></textarea>>
             <br><br>
		<br><br>
	</h5>
	
	<button type="submit"><b>Submit</b></button> 
</form>
    </body>
</html>