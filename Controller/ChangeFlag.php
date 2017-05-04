
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
try{
        include '../Model/DBClass.php'; 
       // include './Model/User.php';
        $DBClassObject2 = new DBClass();
        session_start();
        //echo 'USER_ID:'.$_SESSION["USER_ID"].'<br>';
        //echo 'Pieces:'.$_POST["Pieces"];
        $My_Pieces2=$DBClassObject2->getUserPieces($_SESSION["USER_ID"]);
        $result2=$DBClassObject2->getLastGame();

        if($My_Pieces2){//if it return a result
        $count_result2=count($My_Pieces2);
        $check2=0;
        
        for($i=0;$i<$count_result2;$i++){
        if(sizeof($result2)==1){//if this is the first game  
            //We don't ned update flag here ,it will update in AddGame.php when user plays
            $check2=1;
            break;
        }
        else{ 
    
                if($result2["Num1"]==$My_Pieces2[$i]["NUM1"]||$result2["Num1"]==$My_Pieces2[$i]["NUM2"]||
                   $result2["Num2"]==$My_Pieces2[$i]["NUM1"]||$result2["Num2"]==$My_Pieces2[$i]["NUM2"]    
                    ){
                       //ex: last game 1,4 then this game must be 1,any_number or any_number,1 or 4,any_number or any_number,4
                       $check2=1;
                       echo "<font color='blue'>You have at least one piece matchs the last one ^_^</font><br/>";
                       break;
            }
           
                        
    }//end of this is first game or not
}//end of for 
//echo "check2=".$check2;
    if($check2==0){
        echo "<font color='red'>You haven't any piece matchs the last one ^_^</font>";
        $updateFlag=$DBClassObject2->updateUserFlag($_SESSION["USER_ID"]);

    }
   
        
}//end of if $My_Pieces
           

}catch(Exception $ex){
    echo $ex->getMessage();
}
?>
