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
function registerUser($database,$registration){
    $firstname=$registration['firstname']; $lastName=$registration['lastname']; $address=$registration['address'];$phone=$registration['phone'];
    $password=$registration['password']; $birthdate=$registration['birthdate'];
    $request= "INSERT INTO user(user_last_name,user_first_name,user_adress,user_phone,user_birthdate,user_password)VALUES
    ('$firstname','$lastName','$address','$phone','$birthdate','$password')";
      
    $response = $database->exec($request);
    var_dump($response);
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