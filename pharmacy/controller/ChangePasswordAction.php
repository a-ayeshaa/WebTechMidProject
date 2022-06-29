<?php
	session_start();
	if (count($_SESSION)===0)
	{
		header(location:"../controller/Logout.php");
	}
?>

<?php
if($_SERVER['REQUEST_METHOD'])
{
    $isValid = false;
    $res=false;

    if (empty($_POST['currentpassword'])||empty($_POST['npassword'])||empty($_POST['confirmpassword'])) 
    {
        $isValid = false;
        $submit=false;
    }
    else 
    {
        $isValid = true;
        $submit=true;
    }

    if($isValid)
    {

        if($_POST['currentpassword'] === $_SESSION['password'])
        {
            if($_POST['npassword'] === $_POST['confirmpassword'])
            {
                $handle = fopen("../model/customer.json", "r");
                $data = fread($handle, filesize("../model/customer.json"));
                $explode = explode("\n", $data);
                $arr2 = array();
                for ($i = 0; $i < count($explode)-1; $i++)
                {
                    $json=json_decode(($explode[$i]));
                    array_push($arr2, $json);
                }
                
                $arr2[$_SESSION['index']]->password=$_POST['npassword'];
                $_SESSION['password']=$_POST['npassword'];


                $handle1 = fopen("../model/customer.json", "w");

                for ($i=0; $i<count($explode)-1;$i++)
                {
                    $encode = json_encode($arr2[$i]);
                    $res = fwrite($handle1, $encode . "\n");
                }

                if($res)
                {
                    header("location:../view/Home.php");
                }
            }
            else
            {
            	echo "Passwords do not match.";
            }
        }
        else
        {
    	   echo "Current password incorrect.";
        }
    }

    else
    {
        echo "Please fill up all the information";
    }

}
?>
<br><br>

<a href="../view/ChangePassword.php"> Return </a>