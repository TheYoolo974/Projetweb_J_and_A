<?php
 global $database = new PDO('mysql:host=localhost;dbname=questionbank', 'root', 'JO0437anhydrous');
function databaseConnection(){
    return new PDO('mysql:host=localhost;dbname=questionbank','root','JO0437anhydrous');



}

function getQuestionsbyQuizId($quizz_id,$databse)
{
    $query = "SELECT `question_id`, `question_title`,`question_input_type` FROM `question`  JOIN `quizz` ON 
    `question`.`question_quizz_id` = `quizz`.`quizz_id`WHERE `quizz`.`quizz_id`= $quizz_id";
    return executeQuery($query, null);
}

function getAnswersByQuestionId( $question_id)
{
    $query ="SELECT `answer_id`,`answer_text`,`is_valid_answer` FROM `answer` WHERE
       `answer`.`answer_question_id`= $question_id";

    
    return executeQuery($query, null);
}

function executeQuery($query, $params)
{
    
   
    try {
        $res = $database->prepare($query);
        $res->execute($params);

        $datas = $res->fetchAll();

        $res->closeCursor();

        return $datas;
    } catch (PDOException $e) {
        var_dump($e);
    }
}

?>
