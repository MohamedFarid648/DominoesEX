<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//if(isset($_POST['RegisterButton'])){
   // var_dump($_POST);
include '../Model/DBClass.php';
include '../Model/User.php';
$DBClassObject = new DBClass();
$USER_OBJECT = new User();
$USER_OBJECT->setName($_POST['user_name']);
$USER_OBJECT->setEmail($_POST['email']);
$USER_OBJECT->setPassword($_POST['pass']);
$result=$DBClassObject->Register_User($USER_OBJECT);
if($result==1){
    echo'You are registered successfully';
}else{
    echo'Registeration Failed';
}

//}
?>
<?php 


?>