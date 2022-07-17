<?php
if (isset($_POST['submit'])) {


       
    $_host = 'localhost';
    $_username = 'root';
    $_password = '';
    $_database = 'cdc';
    
    $connection=mysqli_connect($_host,$_username,$_password,$_database);
if (!$connection) {
    die("Connection failed:".mysql_connect_error());
}
    # Get the values
     $email=$_POST['email'];
     $pass=$_POST['password'];
 


    $sql="SELECT * FROM users WHERE email='$email' AND password='$pass'";
    $query=mysqli_query($connection,$sql); 

    $number = mysqli_num_rows($query);
    $rows = mysqli_fetch_assoc($query);
   
   
    if ($number == 1) {
        $_SESSION["id"] =$rows['USER_ID'];
    $_SESSION["email"] =$rows['EMAIL'];
        header("location:stage.html");
      
    }else{
    
     echo "<script >"; 
     echo "alert('Unsuccessful login!')";
     echo "</script>";
        
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
          <img src="seven-shooter-ZzE9uKOAchc-unsplash.jpg" class="img-fluid" style="height: 159%;object-fit: cover;" alt="...">
        </div>
        <div class="col-lg-6 position-relative">
          
          <form action="signin.php"  method="POST" class="row g-3 position-absolute top-50 start-20" >
            <h1 class="display-1 text-center"><b>SIGN IN</b></h1>
            <h3 class="text-center text-muted">Welcome back</h3>
            <div class="col-md-12">
              <label for="inputEmail4" class="form-label">Email</label>
              <input type="email" name="email" class="form-control" id="inputEmail4">
            </div>
            <div class="col-md-12">
              <label for="inputPassword4" class="form-label">Password</label>
              <input type="password" name="password" class="form-control" id="inputPassword4">
            </div>    
           
            
            
            <div class="col-12">
              <div class="d-grid gap-2 col-6 mx-auto">
                <input type="submit"  name="submit" class="btn btn-primary btn-lg rounded-5" value="Sign In">
              </div>
            </div>
            <p  class="text-center">Don't have an account? <a href="signup.html"> <span class="text-primary">sign up</span></a></p>
        
          </form>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>