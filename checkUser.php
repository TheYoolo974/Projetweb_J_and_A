<?php



function LoginUser($database,$lastName){
    $response_user = $database->query("SELECT `User_id` FROM `user` ");
     
    $user = $response_user->fetch();
    
    $total = count($user);
   
    if($total==2){
        
        $_SESSION['users_id'] = $user['User_id'];
        
        
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