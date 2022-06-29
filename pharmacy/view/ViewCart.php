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
	<h2>CART</h2>
	<a href="Home.php">HOME </a> || <a href="Profile.php">View Profile</a> || <a href="ChangePassword.php"> Change Password </a> || <a href="ViewCart.php">View Cart</a> || <a href="OrderHistory.php"> View Billing History </a>
	<form action="../controller/ConfirmOrderAction.php" method="POST">
		<?php
			$arrCodes=array();
			$arrQuantities=array();
		    $handle2=fopen("../model/cart.json","r");
		    if (filesize("../model/cart.json")>0)
		    {
		    	$product= fread($handle2,filesize("../model/cart.json"));
			    $explode1=explode("\n",$product);
			    $arr2=array();
			    for ($i = 0; $i < count($explode1)-1; $i++)
			    {
		            $json1=json_decode(($explode1[$i]));
		            array_push($arr2, $json1);
		        }
		        for ($i = 0; $i < count($arr2); $i++)
			    {
		            array_push($arrQuantities,$arr2[$i]->Quantity);
		            array_push($arrCodes,$arr2[$i]->MedicineCode);
		        }
		    }

		    else
		    {
		    	echo "error";
		    	header("Location:Home.php");
		    }

	    ?>

		<br>

			<style>
		        table, th, td
		    {
		        border: 1px solid black;
		    }
		 </style>
	    <?php
	        echo "<table>
	        <tr>
	        <th>Medicine Code</th>
	        <th>Medicine Name</th>
	        <th>Quantity</th>
	        <th>Price</th>
	        <th>TotalPrice</th>
	        </tr>
	        ";
	        for($i=0;$i<count($arr2);$i++)
	        {
	        	$MedicineCode=$arr2[$i]->MedicineCode;
	        	$MedicineName=$arr2[$i]->MedicineName;
	        	$Quantity=$arr2[$i]->Quantity;
	        	$Price=$arr2[$i]->Price;
	        	$TotalPrice=$arr2[$i]->TotalPrice;
	            echo "
	            <tr>
	            <td>$MedicineCode</td>
	            <td>$MedicineName</td>
	            <td>$Quantity</td>
	            <td>$Price</td>
	            <td>$TotalPrice</td>
	            </tr>
	            ";
	        }
	        echo "<br><br>";
	        echo "</table>";
	    ?>
	    <?php
	    	echo "<br><br>"; 
	    	echo "GrandTotal = ".$_SESSION['GrandTotal']." Taka ";?>
	    <br><br>
	    <a href="Home.php">Continue Shopping>> </a>
	    <br><br><br><br>
	    <input type="submit" name="Confirm" value="Confirm Order">
	    <br><br>
	    <a href="../controller/ClearCart.php"> CLEAR CART </a>
	    <br><br>
	    <a href="../controller/Logout.php">LOGOUT </a>
		</h5>
		<?php

		$_SESSION['arrCodes']=$arrCodes;
		$_SESSION['arrQuantities']=$arrQuantities;
		?>
	</form>

</body>
</html>