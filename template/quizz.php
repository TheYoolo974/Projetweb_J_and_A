<?php
if (isset($_GET['quizz_id'])) {
  $quizz_id = $_GET['quizz_id'];
  if(isset($_GET['retake'])){
    unset($_SESSION['quiz'.$quizz_id]);
    $userid = $_SESSION['users_id'];
    $request= "DELETE FROM user_answer WHERE `user_answer`.`User_id`=$userid";
      
    $response = $database->exec($request);
  }
  if(isset($_GET['delete'])){
    $userid = $_SESSION['users_id'];
    $usermarks=$_SESSION['marks'];
    $request= "DELETE FROM results WHERE `results`.`user_id`=$userid AND `results`.`quiz_id`=$quizz_id AND `results`.`result`=$usermarks";
    
    $response = $database->exec($request);
  }
} 


 
?>


  <?php 

  $response_questions = $database->query("SELECT `question_id`, `question_title`,`question_input_type`,`related_image` FROM `question`  JOIN `quizz` ON 
  `question`.`question_quizz_id` = `quizz`.`quizz_id`WHERE `quizz`.`quizz_id`= $quizz_id");
  $question_number = 1;
?>

  <!Doctype html >

  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Quiz</title>
      <link rel="stylesheet" href="../static/css/styles.css">
    
  </head>
  
  <body>
  <?php include("template/header.php"); ?>
    <?php
  if(!isset($_SESSION['quiz'.$quizz_id])){
  foreach ($response_questions as $question) {

    $question_id =$question['question_id'];
   
  ?>

    <form action="index.php?page=quizz_results&quiz=<?php echo($quizz_id); ?>" method="post">

      <section class="questioncontent">

        <h3> - <?php echo ($question_number); ?> : </h3>
        <?php if (isset($question['related_image']) && $question['related_image'] === '1') {?>
          <img src="static/img/question<?php echo($question['question_id'])?>.jpg" width="250" height="250">
        <?php } ?>

        <br>
        <label><?php echo ($question['question_title']); ?> </label>
       
       <?php 
       
       $response_answers = $database->query("SELECT `answer_id`,`answer_text`,`is_valid_answer` FROM `answer` WHERE
       `answer`.`answer_question_id`= $question_id");
       switch($question['question_input_type'] ){
         case "radio":
       foreach($response_answers as $answer){?>
       <br>
        <input type="radio" id="<?php echo($answer['answer_id']);?>" name="<?php echo($question['question_id']);?>" value="<?php echo($answer['answer_id']);?>"> <?php echo($answer['answer_text']); ?>
      <?php
       }
      break;
      case "checkbox":
        foreach($response_answers as $answer){?>
        <br>
         <input type="checkbox" id="<?php echo($answer['answer_id']);?>" name="<?php echo($question['question_id']);?>" value="<?php echo($answer['answer_id']);?>"><?php echo($answer['answer_text']);?>
       <?php
        }
       break;
       case "number":
        foreach($response_answers as $answer){?>
        <br>
         <input type="number" id="<?php echo($answer['answer_id']);?>" name="<?php echo($question['question_id']);?>" value="">
       <?php
        }
       break;
       case "select":?>
        <select  name="<?php echo($question['question_id']);?>" >
        <br>
        <option  value=""> --Please choose an option-- </option>
        <?php foreach($response_answers as $answer){?>
        <option  value="<?php echo($answer['answer_id']);?>" > <?php echo($answer['answer_text']);?></option>

       <?php
        }?>
        </select><?php 
       break;
       
      }
       $response_answers->closeCursor();
    ?>
        <br><br>
      <?php
      $question_number++;
    }
    $response_questions->closeCursor();

      ?>
      <br>
      <input type="submit" name="submit">
    </form>
    <br>
    <?php }
    else {?>
    <div class="score">
    <p>Your score is <?php echo $_SESSION['marks'] ?></p>
      <p>You have already passed this quiz  </p>
      <p>Pass this test <a href="index.php?page=quizz&quizz_id=<?php echo($quizz_id); ?>&retake=true">again</a></p>
      <p><a href="index.php?page=quizz&quizz_id=<?php echo($quizz_id); ?>&delete=<?php echo $_SESSION['marks']?>">delete</a> this score<p>
    </div>
      
        
    <?php }
    ?>

    
   <p class="score">click <a href="index.php?page=all_results&quiz=<?php echo($quizz_id); ?>">here</a> to see scores on this quiz</p>



    </section>
  
  <?php include('template/footer.php'); ?>
  </body>
  </html>
  
   