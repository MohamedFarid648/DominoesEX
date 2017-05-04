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
 
$result=$DBClassObject->getLastGame();
 echo sizeof($result);
 if(sizeof($result)==1){//if this is the first game add it 
         $result2=$DBClassObject->addGame($_POST["Num1"],$_POST["Num2"],$_POST["USER_PIECE_ID"], $_SESSION['USER_ID']);
 }
else{ 
    
                if($result["Num1"]==$_POST["Num1"]||$result["Num1"]==$_POST["Num2"]||
               $result["Num2"]==$_POST["Num1"]||$result["Num2"]==$_POST["Num2"]    
                    ){
                //ex: last game 1,4 then this game must be 1,any_number or any_number,1 or 4,any_number or any_number,4
                $result2=$DBClassObject->addGame($_POST["Num1"],$_POST["Num2"],$_POST["USER_PIECE_ID"], $_SESSION['USER_ID']);

            }

            else{
                echo "<br><font color='red'>You can't play this piece please choose another one</font>";
                echo "<br><font color='blue'>ex: If Last game is 1,4 then Your Piece must be:
                    (1,any_number) or (any_number,1) or (4,any_number) or (any_number,4)</font>";
            }//end of this is first game or not
}
/*if($result==1){
    echo'<br>You are Played successfully';
}else{
    echo'<br>Playing Failed';
}*/

}catch(Exception $ex){
    echo $ex->getMessage();
}
?>
