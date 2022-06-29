<?php
	session_start();
	if (count($_SESSION)===0)
	{
		header(location:"../controller/Logout.php");
	}
?>

<?php
	$handle1 = fopen("../model/cart.json", "w+");
	$_SESSION['GrandTotal']=0;
	
?>
<?php
	header("Location:../view/Home.php");
?>