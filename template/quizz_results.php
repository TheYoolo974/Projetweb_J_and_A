
  
 <?php
 $marks=0;
if(isset($_POST['submit'])){
  if($_GET['quiz']==1){
    $quizId =1;
   }
   else if($_GET['quiz']==2){
    $quizId = 2;
   }
   
   $userid =$_SESSION['users_id'];
   
   $response_answers = $database->query("SELECT `Is_valid_answer` from `user_answer` join `answer` on
   `user_answer`.`answer_id` = `answer`.`answer_id`  join `question` on `answer`.`answer_question_id` = `question`.`question_id`
   where `question`.`question_quizz_id` = $quizId and `user_answer`.`user_id` = $userid");
    

   $Useranswers = $response_answers->fetchAll();
   
   $response_answers->closeCursor();

   foreach($Useranswers as $ans){
     
     if($ans['Is_valid_answer']){
       $marks++;
     }
   }
  
   
   
   }
   
?>


<!Doctype html >

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results</title>
    <link rel="stylesheet" href="../static/css/styles.css">
  
</head>

<body>
<?php include("template/header.php"); ?>
   <p>
   Your Results!
</p>
<p>
  <?php 
  
echo($marks); 
   

?>
</p>

<?php include('template/footer.php'); ?>
  </body>
  </html>