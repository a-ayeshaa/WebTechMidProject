<?php
	session_start();
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
		$flag=false;
		if(($_POST['vDoB'] === $_SESSION['DoB']) and ($_POST['vEmail'] === $_SESSION['recoveryEmail']) and ($_POST['vColor']===$_SESSION['color']))
		{
			if($_POST['npassword']===$_POST['cpassword'])
			{
				$flag=true;
			}
		}


		if ($flag)
		{
			$arrup[$_SESSION['index']]->password=$_POST['npassword'];


			$handle1 = fopen("../model/customer.json", "w");

			for ($i=0; $i<count($explode)-1;$i++)
			{
				$encode = json_encode($arrup[$i]);
				$res = fwrite($handle1, $encode . "\n");
			}

			if($res)
			{
				header("location:Logout.php");
			}
		

		}
		else 
		{
			echo "<br>";
			echo "INFORMATION DOES NOT MATCH.";
			echo "<br><br>";
		}

	}
?>
<a href="../view/RequestPassword.php"> Return to previous page </a>
