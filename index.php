<?php 

session_start();

include("database.php");


$database = databaseConnection();

include("checkUser.php");
$filename ='template/account_page.php';
if(isset($_POST['page'])){
  print("posted");
   if(!empty($_POST['lastname'])){
     LoginUser($database,$_POST['lastname']);
   }
  $user = checkUser($database);
  if(!empty($user)){
    
    if(isset($_GET['page'])){
      $page = $_GET['page'];
     
    if(file_exists('template/'.$page.'.php')){
      $filename = 'template/'.$page.'.php';
    
    }
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