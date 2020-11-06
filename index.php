<?php 

session_start();

include("database.php");


$database = databaseConnection();

include("checkUser.php");



$filename ='template/account_page.php';
if(isset($_POST['submit'])){
    
   if(!empty($_POST['lastname'])){ 
     LoginUser($database,$_POST["lastname"]);
     
   }
}
  $user = checkUser($database);
  if(!empty($user)){
    
    $filename = 'template/home.php';

    if(isset($_GET['page'])){
      $page = $_GET['page'];
     
    if(file_exists('template/'.$page.'.php')){
      $filename = 'template/'.$page.'.php';
    
    }
  }
}

include($filename);



?>
<!Doctype html >

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mock Up</title>
    <link rel="stylesheet" href="./static/css/styles.css">
  
</head>

<body>
    <?php 
    if(isset($_GET['page'])){
    $page=$_GET['page'];
    }
    else{
    $page='oops';
    }
    if(!file_exists('template/'.$page.'.php'))
    {
    
    include("template/header.php"); 
    
    echo 'oop the file does not exist';
    
    
    ?>

      
    <?php include('template/footer.php');
    } ?>
</body>

</html>