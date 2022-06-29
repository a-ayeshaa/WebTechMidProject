<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <title>Submission Form</title>

</head>

<body>

	<?php

		$firstName=$_POST['firstName'];
		$lastName=$_POST['lastName'];
		$email=$_POST['email'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		$recoveryEmail=$_POST['recoveryEmail'];
		$color=$_POST['color'];
		$submit=false;


	?>
	

	<?php 
		if ($_SERVER["REQUEST_METHOD"] == 'POST') 
		{
			$isValid = false;

			if (empty($email)||empty($firstName)||empty($lastName)||empty($_POST['dateOfBirth'])||empty($username)||empty($_POST['password'])) 
			{
				$isValid = false;
				echo "Please fill up the form properly";
				$submit=false;
			}
			else 
			{
				$isValid = true;
				echo "<h1>Output :</h1>";
				echo "Form Submission Successfully!";
				$submit=true;
			}
		} 


	?>

	<?php

		function sanitize($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		if ($isValid) 
		{

			$firstName=sanitize($firstName);
			$lastName=sanitize($lastName);
			$email=sanitize($email);
			$username=sanitize($username);
			$password=sanitize($password);
		}
	?>

	<?php
		if ($isValid)
		{ 
			
			$handle1 = fopen("../model/customer.json", "a+");
			$arr1 = array('firstName' => $firstName, 'lastName' => $lastName,'email' => $email,'gender' => ucfirst($_POST['gender']),'religion' => $_POST['religion'],'username' => $username,'password' => $password,'DoB'=>$_POST['dateOfBirth'],'num'=>$_POST['Phone'],'presentAddress'=>$_POST['presentAddress'],'permanentAddress'=>$_POST['permanentAddress'],'recoveryEmail'=>$recoveryEmail,'color'=>$color);
			$encode = json_encode($arr1);

			$res = fwrite($handle1, $encode . "\n");
		}
		else
		{
			$res=false;
		}

		if ($res and $submit) {
			echo "<br>";
			echo "Information saved successully.";
		}
		else {
			echo "<br>";
			echo "Error while saving.";
		}
	?>

	<br><br>

	<a href="../view/CustomerRegistration.php"> Register  </a> | <a href="../view/LoginForm.php" >Login </a>

</body>
</html>