<?php 

session_start();

include("database.php");


$database = databaseConnection();

include("checkUser.php");


$page='';
$filename ='template/account_page.php';
if(isset($_GET['page'])){
  $page = $_GET['page'];
  if($page == 'register_page')
  include 'template/register_page.php';
}

if(isset($_POST['submit']) ){
  
    if($_GET['page']=='account_page'){
   if(!empty($_POST['lastname'])){ 
     LoginUser($database,$_POST["lastname"],$_POST["password"]);
     header('Location: index.php');
   }
   }
   if($_GET['page']=='register_page'){
    registerUser($database,$_POST);
    header('Location: index.php');
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
    if($page == 'logout'){
      logout($database);
    }
  }
}





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
    if(isset($_GET['page'])) {
    if($_GET['page']=='quizz_results'){

      $answers =$_POST;
      
      array_pop($answers);
         
         foreach($answers as $answer){
          
           
           $session = $_SESSION['users_id'];
           $request= "INSERT INTO user_answer( User_id, answer_id ) VALUES ('$session', '$answer' )";
      
             $response = $database->exec($request);
             
         }
     
    }
  }


   
    include($filename); ?>
</body>

</html>