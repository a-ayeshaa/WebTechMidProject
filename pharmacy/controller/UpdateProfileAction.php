<?php
	session_start();
	if (count($_SESSION)===0)
	{
		header(location:"Logout.php");
	}
?>

<?php

	$handle = fopen("../model/customer.json", "r");
	$data = fread($handle, filesize("../model/customer.json"));
?>


<?php

	$explode = explode("\n", $data);
?>


<?php

	$arrup = array();
	for ($i = 0; $i < count($explode)-1; $i++)
	{
		$json=json_decode(($explode[$i]));
		array_push($arrup, $json);
	}
?>
<?php
	if($_SERVER['REQUEST_METHOD'] === "POST")
	{
		$isValid = false;
		$res=false;

		if (empty($_POST['firstName'])||empty($_POST['lastName'])||empty($_POST['gender'])||empty($_POST['DoB'])||empty($_POST['religion'])||empty($_POST['presentAddress'])||empty($_POST['permanentAddress'])||empty($_POST['num'])||empty($_POST['email'])) 
		{
			$isValid = false;
			$submit=false;
		}
		else 
		{
			$isValid = true;
			$submit=true;
		}

		if($isValid){
			$_SESSION['firstName']=$arrup[$_SESSION['index']]->firstName=$_POST['firstName'];
			$_SESSION['lastName']=$arrup[$_SESSION['index']]->lastName=$_POST['lastName'];
			$_SESSION['gender']=$arrup[$_SESSION['index']]->gender=$_POST['gender'];
			$_SESSION['DoB']=$arrup[$_SESSION['index']]->DoB=$_POST['DoB'];
			$_SESSION['religion']=$arrup[$_SESSION['index']]->religion=$_POST['religion'];
			$_SESSION['presentAddress']=$arrup[$_SESSION['index']]->presentAddress=$_POST['presentAddress'];
			$_SESSION['permanentAddress']=$arrup[$_SESSION['index']]->permanentAddress=$_POST['permanentAddress'];
			$_SESSION['num']=$arrup[$_SESSION['index']]->num=$_POST['num'];
			$_SESSION['email']=$arrup[$_SESSION['index']]->email=$_POST['email'];


			$handle1 = fopen("../model/customer.json", "w");

			for ($i=0; $i<count($explode)-1;$i++)
			{
				$encode = json_encode($arrup[$i]);
				$res = fwrite($handle1, $encode . "\n");
			}
		}
		if($res)
		{
			header("location:../view/Profile.php");
		}

		else
		{
			echo "Please fill up all the information";
		}
		
	}

?>
<br><br>
<a href="../view/UpdateProfile.php"> Try again </a>