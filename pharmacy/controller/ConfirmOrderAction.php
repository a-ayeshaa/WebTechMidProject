<?php
	session_start();
	if (count($_SESSION)===0)
	{
		header(location:"Logout.php");
	}
?>
<?php
	if($_SERVER['REQUEST_METHOD'] === "POST")
	{
		$arrCodes=$_SESSION['arrCodes'];
		$arrQuantities=$_SESSION['arrQuantities'];
		$handle1 = fopen("../model/OrderHistory.json", "a+");
		$arr1 = array('OrderID'=>++$_SESSION['OrderID'],'Username' => $_SESSION['username'], 'MedicineCodes' =>$arrCodes,'Quantities' =>$arrQuantities,'GrandTotal' =>$_SESSION['GrandTotal']);
		$encode = json_encode($arr1);

		$res = fwrite($handle1, $encode . "\n");
		if($res)
		{
			$handle1 = fopen("../model/cart.json", "w+");
			$_SESSION['GrandTotal']=0;
			header("Location:../view/OrderHistory.php");
		}
		else
		{
			echo "false";
		}
	}
?>