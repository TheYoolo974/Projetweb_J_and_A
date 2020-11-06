<?php 

session_start();

include("database.php");


$database = databaseConnection();

include("checkUser.php");

if(isset($_POST['page'])){
  print("posted");
  $lastName = $_POST['lastname'];
  $check_user = checkUser($database,$lastName);
  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    
    if(isset($_GET['page'])){
      $page = $_GET['page'];
      $filename = 'template/'.$page.'.php';
    if(file_exists($filename)){
     include($filename);
    }
    }
  }
  
}
else{
  $page = 'account_page';
  $filename ='template/'.$page.'.php';
  
  if(file_exists($filename)){
    include($filename);
  }
}






?>
<!Doctype html >

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mock Up</title>
    <link rel="stylesheet" href="./static/css/base.css">
  
</head>

<body>
    <?php include("template/header.php"); 
    
    
    //TODO (in the next step) control user access

//TODO get page parameter ($_GET['page'] or $_POST['page']) and assign it into $page variable


//if 'action/'.$page'.php' exists then include it (use file_exists($filename) function)
    
    
    ?>

      
    <?php include('template/footer.php'); ?>
</body>

</html>