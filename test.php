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
    $answers = array(""); 
    array_push($answers,$_POST['cognitive1'], $_POST['cognitive2'],$_POST['social1'],$_POST['social2'],$_POST['social3'],$_POST['social4'],$_POST['physical1'],$_POST['physical2'],$_POST['physical3']);
    $counts = array_count_values($answers);
    if(isset($counts['Maybe'])){
     $maybe= $counts['Maybe']*5;
    }
    else {
        $maybe = 0;
    }
    if(isset($counts['Yes'])){
    $yes = $counts['Yes']*10;
    }
    else {
        $yes = 0;
    }
    if(isset($counts['No'])){
    $no = $counts['No']*2;
    }
    else {
        $no = 0;
    }
    $results =  $maybe + $yes +  $no;
    
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Toddler</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<style>
    .circle{
        border-radius: 50%;width: 250px;height: 250px;
    }
    .circle:hover {
  background-color: #0d6efd;
  color: white;
}
</style>  
</head>
  <body>
    <nav class="navbar bg-primary">
        <div class="container-fluid">
          <span class="navbar-brand mb-0 h1 text-light">TODDLER</span>
        </div>
      </nav>
    <div class="container" >
        <br>
        <h1 class="h1 text-center"><b>BABY'S RESULT</b></h1>

    <br>
    <br>
    <br>
    <br>
    <br>
        <div class="circle mx-auto card bg-primary ">
         <h2 class="my-auto h1 text-light text-center"><b><?php echo  $results; ?> <br> Points</b></h2>
        </div>
        <br> <br>
        <br>
        <h3 class="text-center"><span class="text-primary" >Results:</span> <?php 
        if ($results == 0 && $results < 10 ) {
            echo "Take child to hospital";
          } elseif ($results > 11 && $results < 30 ) {
            echo "Child is poorly performing";
          } 
          elseif ($results > 31 && $results < 50 ) {
            echo "Child is moderately performing";
          }
          elseif ($results > 51 && $results < 100 ) {
            echo "Child is moderately performing";
          }
          elseif ($results > 101 ) {
            echo "Child is in great condition";
          }
          else {
            echo "An error occured";
          }
        
        ?></h3>
        <br> <br> <br>
     
          <div class="col-12 mb-5">
            <div class="d-grid gap-2 col-6 mx-auto">
            
                <button class="btn btn-primary btn-lg rounded-5" type="button"> <a href="stage.html" style="text-decoration: none;" class="text-light">Next</a></button>
         
            </div>
          </div>
   </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>
