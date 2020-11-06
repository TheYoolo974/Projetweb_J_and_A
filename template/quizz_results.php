
  
 <?php

if(isset($_POST['submit'])){
   
   $count=0;
   if($_GET['quiz']==1){
    $count =2;
   }
   else if($_GET['quiz']==2){
    $count = 6;
   }
   $marks=0;
   $answers =$_POST;
   for( $i =0;$i<3;$i++){
      $response_answers = $database->query("SELECT `answer_text` FROM `answer` WHERE
   `answer`.`answer_question_id`= $count and `answer`.`Is_valid_answer`=1");
   
   $correct = $response_answers->fetch();

   if($answers[$count]== $correct['answer_text']){
      $marks++;
   }
   
   $response_answers->closeCursor();
   $count++;
   
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

   
echo($marks); 
   
}


?>

<?php include('template/footer.php'); ?>
  </body>
  </html>

  