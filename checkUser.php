<?php



function LoginUser($database,$lastName,$password){
    
    
 $sql = "SELECT user_id FROM user WHERE User_last_name = :name AND User_password=:pwd";
$response_user= $database->prepare($sql);
$response_user->execute(array(':name'=> $lastName,':pwd'=>$password));
$user =  $response_user->fetch();


     
   
   
    if($user){
        
        $_SESSION['users_id'] = $user['user_id'];
        
        
    }

     $response_user->closeCursor();
    
}

function checkUser($database){
if(isset($_SESSION['users_id'])){
    $sessionid=$_SESSION['users_id'];
    $response_user = $database->query("SELECT `User_id`, `User_last_name`,`User_first_name` FROM `user` 
     WHERE `User_id`= $sessionid");
    $checked =$response_user->fetch();
    if(!empty($checked)){
        return $checked;
    }
    $response_user->closeCursor();
}
 return false;

}

?>