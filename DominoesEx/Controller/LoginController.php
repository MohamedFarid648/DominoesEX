<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/*echo $_POST['InputPassword'];
echo $_POST['InputEmail'];
var_dump($_POST);*/
include '../Model/DBClass.php';
include '../Model/User.php';
$DBClassObject = new DBClass();
$USER_OBJECT = new User();
$result=$DBClassObject->Login_User($_POST['InputEmail'],$_POST['InputPassword']);
//print_r($result);
if(sizeof($result)>1){
    print_r($result);
    $USER_OBJECT->setName($result['NAME']);
    $USER_OBJECT->setEmail($result['EMAIL']);
    $USER_OBJECT->setPassword($result['PASSWORD']);
    session_start();
    $_SESSION["USER_OBJECT"]=$USER_OBJECT;
    $_SESSION["USER_EMAIL"]=$result['EMAIL'];
    $_SESSION["USER_ID"]=$result['ID'];
    //$_SESSION["USER_FLAG"]=$result['FLAG'];
    header('Location:../index.php'); //Go to index.php
}
else{
     header('Location:../index.php'); //Go to index.php
    
}
?>