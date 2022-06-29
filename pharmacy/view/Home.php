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

	<?php
		$user=$_SESSION['username'];
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
	$found="";
		for($k = 0;$k< count($arr1); $k++)
			{
				if($user === $arr1[$k]-> username)  
				{
					$found=$k;
				}

			}
	?>

	<?php
		$_SESSION['OrderId']=0;
		$_SESSION['index']=$found;
		$_SESSION['firstName']=$firstName=$arr1[$found]-> firstName;
		$_SESSION['lastName']=$lastName=$arr1[$found]-> lastName;
		$_SESSION['email']=$email=$arr1[$found]-> email;
		$_SESSION['gender']=$gender=$arr1[$found]-> gender;
		$_SESSION['religion']=$religion=$arr1[$found]-> religion;
		$_SESSION['num']=$contact=$arr1[$found]-> num;
		$_SESSION['DoB']=$DoB=$arr1[$found]-> DoB;
		$_SESSION['presentAddress']=$presentAddress=$arr1[$found]-> presentAddress;
		$_SESSION['permanentAddress']=$permanentAddress=$arr1[$found]-> permanentAddress;
		$_SESSION['password']=$arr1[$found]-> password;
	?>

	<h2>HOME</h2>
	<a href="Home.php">HOME </a> || <a href="Profile.php">View Profile</a> || <a href="ChangePassword.php"> Change Password </a> || <a href="ViewCart.php">View Cart</a> || <a href="OrderHistory.php"> View Billing History </a>

	<p>Welcome, <?php echo strtoupper($_SESSION['username'])?></p>



	<?php
		$code="";
	    $handle2=fopen("../model/product.json","r");
	    $product= fread($handle2,filesize("../model/product.json"));
	    $explode1=explode("\n",$product);
	    $arr2=array();
	    for ($i = 0; $i < count($explode1)-1; $i++)
	        {
	            $json1=json_decode(($explode1[$i]));
	            array_push($arr2, $json1);
	        }
    ?>
	<form action="../controller/AddToCartAction.php" method="POST">
	    <h4>AVAILABLE MEDICINE LIST : </h4>

	    <h5>Select Medicine :
	     <select name="medName">
	        <option>Select a value</option>
	         <?php
	            for($i=0;$i<count($arr2);$i++)
	            {
	                $med=$arr2[$i]->MedicineName;

	                echo "<option value=".$i.">$med</option>";
	            }
	         ?>
	    </select>
	    Quantity : <input type="text" name="quantity" value="";?>

	    <input type="submit" name="addtocart" value="ADD TO CART">
	</h5>
</form>
	<br><br>
	<a href="../view/ViewCart.php">View Cart</a>
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
        <th>Medicine Price</th>
        <th>Medicine Stock</th>
        </tr>
        ";
        for($i=0;$i<count($arr2);$i++)
        {
        	$MedicineCode=$arr2[$i]->MedicineCode;
        	$MedicineName=$arr2[$i]->MedicineName;
        	$MedicinePrice=$arr2[$i]->MedicinePrice;
        	$MedicineStock=$arr2[$i]->MedicineStock;
            echo "
            <tr>
            <td>$MedicineCode</td>
            <td>$MedicineName</td>
            <td>$MedicinePrice</td>
            <td>$MedicineStock</td>
            </tr>
            ";
        }
        echo "<br><br>";
        echo "</table>";
        $_SESSION['arr2']=$arr2;
        $_SESSION['arr1']=$arr1;
    ?>
    <br><br>
    <a href="../controller/Logout.php">LOGOUT </a>
	</h5>
    </body>
</html>