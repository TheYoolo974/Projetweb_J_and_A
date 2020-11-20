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
    //passing registration['names'] print white space error
    $checking = $database->query("SELECT * FROM `user` WHERE `User_last_name`='$lastName'");
    $mychecking =$checking->fetch();
       if(empty($mychecking)){
    $request= "INSERT INTO user(user_last_name,user_first_name,user_adress,user_phone,user_birthdate,user_password)VALUES
    ('$lastName','$firstname','$address','$phone','$birthdate','$password')";
      
    $response = $database->exec($request);
    if($response)
    LoginUser($database,$lastName,$password);
}
else{
    echo "<script type='text/javascript'>alert('last name already taken');</script>";
}
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

function logout($database){
unset($_SESSION['users_id']);
checkUser($database);

}

?>