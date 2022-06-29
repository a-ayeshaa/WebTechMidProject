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

	<br><br>
	<a href="Home.php">HOME </a> || <a href="Profile.php">View Profile</a> || <a href="ChangePassword.php"> Change Password </a> || <a href="ViewCart.php">View Cart</a> || <a href="OrderHistory.php"> View Billing History </a>
	<h4>UPDATE INFORMATION : </h4>


	<form action="../controller/UpdateProfileAction.php" method="POST">


		<h5>
		First Name : <input type="text" name="firstName" value=<?php echo $_SESSION['firstName'];?>>

	    <br><br>

	    Last Name : <input type="text" name="lastName" value=<?php echo $_SESSION['lastName'];?>>
	         	

	    <br><br>

	    Gender : 
	    <select name="gender" value=<?php echo $_SESSION['gender'];?>>
	         <option>Male</option>
	         <option>Female</option>
	         <option>Others</option>
	         </select> 

	     <br><br>  

	     Date of Birth : <input type="date" name="DoB" value=<?php echo $_SESSION['DoB']?>>

	     <br><br>

	     Religion : 
	     <select name="religion" value=<?php echo $_SESSION['religion']?>>
	         <option>Islam</option>
	         <option>Hindu</option>
	         <option>Buddhism</option>
	         <option>Others</option>
	     </select> 

	     <br><br>

	     <b>Present Address :</b>
	         <br>
	         <textarea name="presentAddress"><?php echo $_SESSION['presentAddress']?></textarea>>

	     <br><br>

	     <b>Permanent Address : </b>
	     <br>
	     <textarea name= "permanentAddress"><?php echo $_SESSION['permanentAddress']?></textarea>>

	     <br><br>

	     <b>Phone : </b><input type="tel" name="num" value=<?php echo $_SESSION['num']?> >

	     <br><br>

	     <b>Email : </b><input type="email" name="email" value=<?php echo $_SESSION['email']?>>

	     <br><br>

		<input type="submit" name="update" value="UPDATE">
	</form>

</body>
</html>