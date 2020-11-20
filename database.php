<?php

function databaseConnection(){
    return new PDO('mysql:host=localhost;dbname=questionbank','root','');



}

// function getQuestionsbyQuizId($quizz_id,$databse)
// {
//     $query = "SELECT `question_id`, `question_title`,`question_input_type` FROM `question`  JOIN `quizz` ON 
//     `question`.`question_quizz_id` = `quizz`.`quizz_id`WHERE `quizz`.`quizz_id`= $quizz_id";
//     return executeQuery($query, null);
// }

// function getAnswersByQuestionId( $question_id)
// {
//     $query ="SELECT `answer_id`,`answer_text`,`is_valid_answer` FROM `answer` WHERE
//        `answer`.`answer_question_id`= $question_id";

    
   
// }


?>
