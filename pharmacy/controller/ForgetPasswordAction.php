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

	if($_SERVER['REQUEST_METHOD'] === "POST" and count($_REQUEST)>0)
	{
		$flag=false;
		$index=" ";
		for($k = 0;$k< count($arr1); $k++)
		{
			if(($_POST['username'] === $arr1[$k]-> username) and ($_POST['email'] === $arr1[$k]-> email) )
			{
				$index=$k;
				$flag=true;
			}

		}

		if ($flag)
		{
			session_start();
			$_SESSION['username']=$_POST['username'];
			$_SESSION['recoveryEmail']=$arr1[$index]->recoveryEmail;
			$_SESSION['DoB']=$arr1[$index]->DoB;
			$_SESSION['color']=$arr1[$index]->color;
			$_SESSION['index']=$index;
			header("Location:../view/RequestPassword.php");
		}
		else 
		{
			echo "<br>";
			echo "Username does not exist or you did not fill all the information.";
		}

	}
?>

<br><br>
<a href="../view/ForgetPassword.php"> Try again? </a>