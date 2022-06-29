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

	<h2>Profile</h2>
	<a href="Home.php">HOME </a> || <a href="Profile.php">View Profile</a> || <a href="ChangePassword.php"> Change Password </a> || <a href="ViewCart.php">View Cart</a> || <a href="OrderHistory.php"> View Billing History </a>
	<br><br>
	<h3>PROFILE OF <?php echo strtoupper($_SESSION['username'])?></h3>

	<?php
		echo "<h5>";
		echo "First Name : "." ".$_SESSION['firstName'];
		echo "<br><br>";
		echo "Last Name : "." ".$_SESSION['lastName'];
		echo "<br><br>";
		echo "Gender : "." ".$_SESSION['gender'];
		echo "<br><br>";
		echo "Email : "." ".$_SESSION['email'];
		echo "<br><br>";
		echo "Date of Birth : "." ".$_SESSION['DoB'];
		echo "<br><br>";
		echo "Religion : "." ".$_SESSION['religion'];
		echo "<br><br>";
		echo "Contact Number : "." ".$_SESSION['num'];
		echo "<br><br>";
		echo "Present Address : "." ".$_SESSION['presentAddress'];
		echo "<br><br>";
		echo "Permanent Address : "." ".$_SESSION['permanentAddress'];
		echo "<br><br>";
		echo "</h5>";

	?>
	<a href="UpdateProfile.php">Click here </a> to update your profile.
	<br><br>
	<a href="../controller/Logout.php">LOGOUT </a>

</body>
</html>