<?php
	session_start();
	if (count($_SESSION)===0)
	{
		header(location:"Logout.php");
	}
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <title>Submission Form</title>
	<?php 
		if ($_SERVER["REQUEST_METHOD"] == 'POST')
			
			$handle1 = fopen("../model/complain.json", "a+");
			$arr1 = array('Username' => $_SESSION['username'], 'OrderID' => $_POST['orderID'],'Complain' => $_POST['complain']);
			$encode = json_encode($arr1);

			$res = fwrite($handle1, $encode . "\n");

			if ($res) {
				echo "<br>";
				echo "Information saved successully.";
				header("location:../view/Home.php");
			}
			else {
				echo "<br>";
				echo "Error while saving.";
			}
	?>

	<br><br>

</body>
</html>

</head>

<body>