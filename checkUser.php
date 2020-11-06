<?php



function LoginUser($database,$lastName){
    $response_user = $database->query("SELECT `user_id`, `user_last_name`,`user_first_name` FROM `user`  WHERE `user_last_name`= $lastName");
    $user = $response_user->fetch();
    $total = count($user);
    if($total==1){
        
        $_SESSION['users_id'] = $user['user_id'];
        $_SESSION['loggedin']=true;
        
    }
  
    
}

function checkUser($database){
if(isset($_SESSION['users_id'])){
    $response_user = $database->query("SELECT `user_id`, `user_last_name`,`user_first_name` FROM `user`  WHERE `user_id`= $_SESSION['users_id");
    $checked =$response_user->fetch();
    if(!empty($checked)){
        return $checked;
    }
}
 return false;

}

?>