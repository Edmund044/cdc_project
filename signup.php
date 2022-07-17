<?php
session_start();
?>
<?php
  $_host = 'localhost';
  $_username = 'root';
  $_password = '';
  $_database = 'cdc';
  
  $connection=mysqli_connect($_host,$_username,$_password,$_database);
if (!$connection) {
  die("Connection failed:".mysql_connect_error());
}

if (isset($_POST["submit"])) {
 $email=$_POST['email'];
  $pass=$_POST['password'];
 $cpass=$_POST['cpassword'];
 $today=date('d-m-Y');


 if ($_POST['password']!=$_POST['cpassword']) {?>

   <script> 
    alert("Password don't match");
     </script>;
<?php
 }
else{
 $sqli="SELECT * FROM users WHERE email='".$email."'";
 $query=mysqli_query($connection,$sqli);

 if ((mysqli_num_rows($query))==0){
	$sqll="INSERT INTO users(email,password) VALUES('$email','$pass')";
	$exec = mysqli_query($connection,$sqll);
 if ($exec)
        {
     $sql="SELECT * FROM users WHERE email='$email' AND password='$pass'";
    $query=mysqli_query($connection,$sql); 

    $number = mysqli_num_rows($query);
    $rows = mysqli_fetch_assoc($query);
   
   
    if ($number == 1) {
        $_SESSION["id"] =$rows['id'];
         $_SESSION["email"] =$rows['email'];
        header("location:stage.html");
      
    }
        
    header("location:stage.html");

    
         }
     else  {
          echo "<script >"; 
     echo "alert('Creating your account was unsuccessful')";
     echo "</script>";

	 
       }

 }
    else
    {
          echo "<script >"; 
     echo "alert('Username already exists')";
     echo "</script>";

       
     }
}



}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Toddler</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
    <div class="container-fluid" >
     
      <div class="row">
        <div class="col-lg-6 " >
          <img src="pexels-keira-burton-6624444.jpg" class="img-fluid" style="height: 159%;object-fit: cover;" alt="...">
        </div>
        <div class="col-lg-6 position-relative">
          
          <form action="signup.php"  method="POST" class="row g-3 position-absolute top-50 start-20" >
            <h1 class="display-1 text-center"><b>SIGN UP</b></h1>
            <h3 class="text-center text-muted">Know your child’s progress</h3>
            <div class="col-md-12">
              <label for="inputEmail4" class="form-label">Email</label>
              <input type="email" name="email" class="form-control" id="inputEmail4">
            </div>
            <div class="col-md-12">
              <label for="inputPassword4" class="form-label">Password</label>
              <input type="password" name="password" class="form-control" id="inputPassword4">
            </div>
            <div class="col-md-12">
              <label for="inputPassword4" class="form-label">Confirm Password</label>
              <input type="password" name="cpassword" class="form-control" id="inputPassword4">
            </div>
            
           
            
            
            <div class="col-12">
              <div class="d-grid gap-2 col-6 mx-auto">
                <input type="submit" name="submit"  class="btn btn-primary btn-lg rounded-5" value="Sign Up">
              </div>
            </div>
            <p  class="text-center">Already have an account? <a href="signin.html"> <span class="text-primary">sign in</span></a></p>
          </form>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>
