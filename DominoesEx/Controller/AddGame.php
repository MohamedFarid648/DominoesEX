<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
try{
include '../Model/DBClass.php';
include '../Model/User.php';
$DBClassObject = new DBClass();
session_start();
//echo 'USER_ID:'.$_SESSION["USER_ID"].'<br>';
//echo 'Pieces:'.$_POST["Pieces"];
  //var_dump($_POST);
$result=$DBClassObject->addGame($_POST["Num1"],$_POST["Num2"],$_POST["USER_PIECE_ID"], $_SESSION['USER_ID']);
/*if($result==1){
    echo'<br>You are Played successfully';
}else{
    echo'<br>Playing Failed';
}*/

}catch(Exception $ex){
    echo $ex->getMessage();
}
?>
