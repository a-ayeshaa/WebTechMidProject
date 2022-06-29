<?php
	session_start();
	if (count($_SESSION)===0)
	{
		header(location:"Logout.php");
	}
?>

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
	    	header("Location:../view/Home.php");
	    }

   ?>


<?php
	if($_SERVER['REQUEST_METHOD'] === "POST")
	{
		$isValid = false;
		$res=false;

		if (empty($_POST['quantity'])||is_int($_POST['quantity'])) 
		{

			$isValid = false;
			$submit=false;
		}

		else if($_POST['medName']==="Select a value")
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
			$arr2=$_SESSION['arr2'];
			$i=$_POST['medName'];
			$Totalprice=$_POST['quantity']*$arr2[$i]->MedicinePrice;
			$_SESSION['GrandTotal']=$Totalprice+$_SESSION['GrandTotal'];
			$handle1 = fopen("../model/cart.json", "a+");
			$arr1 = array('MedicineCode'=>$arr2[$i]->MedicineCode,'MedicineName' => $arr2[$i]->MedicineName, 'Quantity' => $_POST['quantity'],'Price' => $arr2[$i]->MedicinePrice,'TotalPrice'=>$Totalprice);
			$encode = json_encode($arr1);

			$res = fwrite($handle1, $encode . "\n");
		}
		if ($res) {
			echo "<br><br>";
			echo "Item added to cart successully.";
			var_dump($arr1);
			header("location:../view/Home.php");
		}
		else {
			echo "<br>";
			echo "Error while adding.";
			header("location:../view/Home.php");
		}

	}
?>