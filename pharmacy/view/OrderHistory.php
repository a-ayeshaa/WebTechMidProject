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

	<?php

	    $handle2=fopen("../model/OrderHistory.json","r");
	    if (filesize("../model/OrderHistory.json")>0)
	    {
	    	$product= fread($handle2,filesize("../model/OrderHistory.json"));
		    $explode1=explode("\n",$product);
		    $arr2=array();
		    $arr1=array();
		    for ($i = 0; $i < count($explode1)-1; $i++)
		    {
	            $json1=json_decode(($explode1[$i]));
	            array_push($arr1, $json1);
	        }

	        for($k = 0;$k< count($arr1); $k++)
			{
				if($_SESSION['username'] === $arr1[$k]-> Username)
				{
					array_push($arr2, $arr1[$k]);
				}

			}
	    }

	    else
	    {
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
        <th>OrderID</th>
        <th>UserName</th>
        <th>MedicineCodes</th>
        <th>Quantity</th>
        <th>GrandTotal</th>
        </tr>
        ";
        for($i=0;$i<count($arr2);$i++)
        {
        	$OrderID=$arr2[$i]->OrderID;
        	$username=$arr2[$i]->Username;
        	$codes=implode(',',$arr2[$i]->MedicineCodes);
        	$quantities=implode(',',$arr2[$i]->Quantities);
        	$grand=$arr2[$i]->GrandTotal;
            echo "
            <tr>
            <td>$OrderID</td>
            <td>$username</td>
            <td>$codes</td>
            <td>$quantities</td>
            <td>$grand</td>
            </tr>
            ";
        }
        echo "<br><br>";
        echo "</table>";
    ?>
    <br><br>
    <a href="../controller/Logout.php">LOGOUT </a>
	</h5>

</body>
</html>