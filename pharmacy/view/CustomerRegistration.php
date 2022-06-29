<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=>, initial-scale=1.0">
    <title>Customer Registration Form</title>

</head>

<body>

    <form action="../controller/FormSubmission.php" method="POST">

    <h3>Customer Registration Form</h3>   
         <fieldset>
         <legend><b>Basic Information:</b></legend>
         <h5>
         First Name : <input type="text" name="firstName" placeholder="">
         <br><br>
         Last Name : <input type="text" name="lastName" placeholder="">
         <br><br>
         Gender : <input type="radio" name="gender" value="Male">Male
                       <input type="radio" name="gender" value="Female">Female
                       <input type="radio" name="gender" value="Others">Others
         <br><br>              
         Date of Birth : <input type="date" name="dateOfBirth" Placeholder="">
         <br><br>
         Religion : 
         <select name="religion">
             <option>Islam</option>
             <option>Hindu</option>
             <option>Buddhism</option>
             <option>Others</option>
         </select> 
         </h5>

         </fieldset>
         <br>
         <fieldset>
             <legend><b>Contact Information : </b></legend>
             <h5>
             <b>Present Address :</b>
             <br>
             <textarea name="presentAddress"></textarea>>
             <br><br>
             <b>Permanent Address : </b>
             <br>
             <textarea name= "permanentAddress"></textarea>>
             <br><br>
             <b>Phone : </b><input type="tel" name="Phone" Placeholder="">
             <br><br>
             <b>Email : </b><input type="email" name="email" Placeholder="">
             </h5>
         
        </fieldset>  

         <br>
         <fieldset>
            <legend><b>Account Information:<b></legend>
            <h5> 
            </textarea>
             <b>Username : </b><input type="text" name="username" Placeholder="">
             <br><br>
             <b>Password : </b><input type="password" name="password" Placeholder="">
             </h5>
        </fieldset>

         <br>
         <fieldset>
            <legend><b>Recovery Information:<b></legend>
            <h5> 
            </textarea>
             <b>Recovery Email : </b><input type="email" name="recoveryEmail" Placeholder="">
             <br><br>
             <b>Favorite Color : </b><input type="text" name="color" Placeholder="">
             </h5>
        </fieldset>

        <br>
        <button type="submit"><b>Submit</b></button> 
        <br><br>      

    </form>   
    Already registered? <a href="LoginForm.php"> Click here </a> for login.
</body>
</html>