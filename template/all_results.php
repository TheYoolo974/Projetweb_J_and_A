<?php
  if($_GET['quiz']==1){
    $quizId =1;
    
   }
   else if($_GET['quiz']==2){
    $quizId = 2;
   }

?>


<!Doctype html >

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hope</title>
    <link rel="stylesheet" href="../static/css/styles.css">
  
</head>

<body>
<?php include("template/header.php"); ?>
<?php
$response_answers = $database->query("SELECT `User_first_name`,`User_last_name`,`result` from `user` join `results` on
   `user`.`User_id` = `results`.`user_id` where `results`.`quiz_id` = $quizId");
    

   $Useranswers = $response_answers->fetchAll();
   
   $response_answers->closeCursor();
//hearder first name last name results example th
   foreach($Useranswers as $ans){?>
       <p><?php echo $ans['User_first_name'];   echo $ans['User_last_name']; echo $ans['result']?></P>
       <!-- tr echo $ans['User_first_name'] -->
  <?php }
   ?>
<!-- table  footer here-->
<?php include('template/footer.php'); ?>
  </body>
  </html>