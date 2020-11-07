
  
 <?php
 $marks=0;
if(isset($_POST['submit'])){
   
   $userid =$_SESSION['users_id'];
   
   $response_answers = $database->query("SELECT * from `answer` join `question` on
    `answer`.`answer_question_id` = `question`.`question_id` left join `user_answer` on `user_answer`.`answer_id` = `answer`.`answer_id`
     where `question`.`question_quizz_id` = 1 and `user_answer`.`user_id` = $userid;");
   $Useranswers = $response_answers->fetch();
   $response_answers->closeCursor();
   var_dump($Useranswers);
   
   
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

  <?php 
echo($marks); 
   

?>

<?php include('template/footer.php'); ?>
  </body>
  </html>