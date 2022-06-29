<?php

	$handle = fopen("../model/customer.json", "r");
	$data = fread($handle, filesize("../model/customer.json"));
?>


<?php

	$explode = explode("\n", $data);
?>


<?php

	$arr1 = array();
	for ($i = 0; $i < count($explode)-1; $i++)
	{
		$json=json_decode(($explode[$i]));
		array_push($arr1, $json);
	}
?>

<?php
	if($_SERVER['REQUEST_METHOD'] === "POST")
	{
		$flag=false;
		for($k = 0;$k< count($arr1); $k++)
		{
			if(($_POST['username'] === $arr1[$k]-> username) and ($_POST['password'] === $arr1[$k]-> password) )
			{
				$flag=true;
			}

		}

		if ($flag)
		{
			session_start();
			$_SESSION['username']=$_POST['username'];
			$_SESSION['GrandTotal']=0;
			header("Location:../view/Home.php");
		}
		else {
			echo "Login Failed";
		}

	}

?>

<br><br>

<a href="../view/LoginForm.php"> Return back to Login Page </a>