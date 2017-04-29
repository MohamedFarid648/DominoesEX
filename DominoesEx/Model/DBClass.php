<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DBClass
 *
 * @author Mohamed
 */
class DBClass {
    //put your code here
 
   private $pdo ;
   public function __construct() {
       try{ 
        $db_host="localhost";
        $db_name="domainoex";
        $db_user="root";
        $db_pass="123";
        //$this->pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $this->pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
       }  catch( PDOException $e ) {
                echo "We can't Connect to our Server ,please try again later ^_^ <br>Exception: {$e->getMessage()}";
}
        
       }

 public function Register_User($USER_OBJECT) {
        try {
          $statement = "INSERT INTO `domainoex`.`user` (`NAME` ,`EMAIL`, `PASSWORD`)
                        VALUES (:NAME, :EMAIL, :PASSWORD)";
          $stmt = $this->pdo->prepare($statement);//prepare the statement
          $stmt->execute(array(':NAME'=>$USER_OBJECT->getName(),
                               ':EMAIL'=>$USER_OBJECT->getEmail(),
                               ':PASSWORD'=>$USER_OBJECT->getPassword(),
              ));
           
    
            $rowCount = $stmt->rowCount();
            if ($rowCount > 0) {
                   return 1;
                   
            } else {
                echo "User email or Password not valid,please try again (Number of Rows Exception";
                return 0;
            
            }
            
            
            
            } catch (Exception $exc) {
          //  echo $exc->getMessage();
                            echo "User email or Password not valid,please try again,Message:".$exc->getMessage() ;

        }
}//end of Register_User
 public function Login_User($email,$pass){
     $statement="SELECT * FROM `user` WHERE `EMAIL`=:EMAIL AND `PASSWORD`=:PASSWORD ";
     $stm=$this->pdo->prepare($statement);
     $stm->bindParam(':EMAIL', $email);
     $stm->bindParam(':PASSWORD',$pass);
     $stm->execute();
     $result=$stm->fetch();//return one row
     $rowCount = $stm->rowCount();
             //var_dump($result);
            if ($rowCount > 0) {
                     //var_dump($result);
                return $result;
            } else {
               // throw new Exception("<script type='text/javascript' > alert(' ');history.back();</script>");
                //return 'Result is empty';
                return FALSE;
            }
     //return $result;

 }
 
 private function getUserID($email){
     try{
     $statement="SELECT `ID` FROM `user` WHERE `EMAIL`=:EMAIL";
     $stm=$this->pdo->prepare($statement);
     $stm->bindParam(":EMAIL", $email);
     $stm->execute();
     $result=$stm->fetch();
     //var_dump($result);
     return $result['ID'];
     }catch (Exception $exc) {
            echo "getUserID=>Error:". $exc->getMessage();
        }
 }
 public function getUserFlag($user_id){
     try{
     $statement="SELECT `FLAG` FROM `user` WHERE `ID`=:ID";
     $stm=$this->pdo->prepare($statement);
     $stm->bindParam(":ID", $user_id,  PDO::PARAM_INT);
     $stm->execute();
     $result=$stm->fetch();
     //var_dump($result);
     return $result['FLAG'];
     }catch (Exception $exc) {
            echo "getUserFlag=>Error:". $exc->getMessage();
        }
 }
 public  function getUserEMAIL($user_id){
     try{
     $statement="SELECT `EMAIL` FROM `user` WHERE `ID`=:ID";
     $stm=$this->pdo->prepare($statement);
     $stm->bindParam(":ID", $user_id,  PDO::PARAM_INT);
     $stm->execute();
     $result=$stm->fetch();
     //var_dump($result);
     return $result['EMAIL'];
     }catch (Exception $exc) {
            echo "getUserEmail=>Error:". $exc->getMessage();
        }
 }
 public function getUserPieces($USER_ID){
    try{
        
        $statement="SELECT UP.`ID` User_Pieces_ID ,P.`NUM1`,P.`NUM2` FROM `pieces` P "
                . "inner join `user_pieces` UP on P.`ID`=UP.`PIECES_ID` "
                . "inner join `user` U on U.`ID`=UP.`USER_ID` WHERE U.`ID`=:USER_ID";
        $stm=$this->pdo->prepare($statement);
        $stm->bindParam(":USER_ID", $USER_ID,PDO::PARAM_INT);
        $stm->execute();
        $result = $stm->fetchAll();
        $rowCount = $stm->rowCount();
               // var_dump($result);
               if ($rowCount > 0) {
                        //var_dump($result);
                   return $result;
               } else {
                  echo "<script type='text/javascript' > alert(' You are the winner');history.back();</script>";
                                  
                   /* $statement1="UPDATE `user` set `FLAG`=0 WHERE `ID`=:OLD_PLAYER";
                                   $statement2="UPDATE `user` set `FLAG`=1 WHERE `ID`=:NEW_PLAYER";
                                   $stm1=  $this->pdo->prepare($statement1);
                                   $stm2=  $this->pdo->prepare($statement2);
                                   $x=$USER_ID;
                                   if($USER_ID==1){ $x=2;}
                                   else if($USER_ID==2){$x=3;}
                                   else if($USER_ID==3){$x=4;}
                                   else if($USER_ID==4){$x=1;}
                                   $stm1->bindParam(":OLD_PLAYER",$USER_ID,PDO::PARAM_INT);
                                   $stm2->bindParam(":NEW_PLAYER",$x,PDO::PARAM_INT);
                                   $stm2->execute();
                                   $stm1->execute();
                                   $rowCount1 = $stm1->rowCount();
                                   $rowCount2 = $stm2->rowCount();
                                 */
                                   
               }
           } catch (Exception $exc) {
           echo "getUserPieces=>Error:".$exc->getMessage();} 

 }
 public function addUserPieces($USER_ID){
     /*Generically,
      *  FLOOR(RAND() * (<max> - <min> + 1)) + <min> generates a number between <min> and <max> inclusive4
      Ex: SELECT name, address, FLOOR(RAND() * 401) + 100 AS `random_number`   FROM users   
      * Here max=500,min=100,random number is the column name in user
      *       */
     $statemnt="INSERT INTO `user_pieces`(`USER_ID`, `PIECES_ID`) VALUES 
         (:USER_ID,(select FLOOR(RAND()*28)+1 from `pieces` limit 1));";
      $stm=$this->pdo->prepare($statement);
      $stm->bindParam(":USER_ID", $USER_ID,PDO::PARAM_INT);
      $stm->execute();
      $rowCount = $stm->rowCount();
      if($rowCount>0){echo 'You get   Your Piece Sucesfully';}
      else{echo 'there is another user with this piece please try again ^_^';}
 }
 public function getUserPiecesGames(){
    try{
       /* $statement="SELECT `EMAIL`,`NUM1`,`NUM2` from `pieces`,`user`,`user_pieces`,`play_piece` where "
                . "`pieces`.`ID`=`user_pieces`.`PIECES_ID` and `user`.`ID`=`user_pieces`.`USER_ID` and"
                . "`user_pieces`.`PIECES_ID` =(select `USER_PIECE_ID` from `play_piece` where `play_piece`.`USER_ID`=:USER_ID)";*/
        $statement="SELECT * FROM `play_piece` WHERE 1";
        $stm=$this->pdo->prepare($statement);
       // $stm->bindParam(":USER_ID", $USER_ID,PDO::PARAM_INT);
        $stm->execute();
        $result = $stm->fetchAll();
        $rowCount = $stm->rowCount();
               // var_dump($result);
               if ($rowCount > 0) {
                        //var_dump($result);
                   return $result;
               } else {
                 
                         return false;          
               }
           } catch (Exception $exc) {
           echo "getUserPiecesGames=>Error:".$exc->getMessage();} 

 }
 
 public function addGame($Num1,$Num2,$USER_PIECE_ID,$USER_ID){
     try{
               /* $statement="SELECT P.`NUM1`,P.`NUM2` FROM `pieces` P 
                inner join `user_pieces` UP on P.`ID`=UP.`PIECES_ID` 
                inner join `user` U on U.`ID`=UP.`USER_ID` where UP.`ID`=:$USER_PIECE_ID ";*/
         
                            $statement="INSERT INTO `play_piece`(`Num1`,`Num2`,`USER_ID`) VALUES (:Num1,:Num2,:USER_ID)";
                            $stm=  $this->pdo->prepare($statement);
                            $stm->bindParam(":Num1",$Num1,PDO::PARAM_INT);
                            $stm->bindParam(":Num2",$Num2,PDO::PARAM_INT);
                            $stm->bindParam(":USER_ID",$USER_ID,PDO::PARAM_INT);
                            $stm->execute();
                            $rowCount = $stm->rowCount();
                            if($rowCount>0){
                                  echo "<br/><font color='blue'>Your Game is inserted Successfully</font>";
                              
                                //Update User Flag
                                $statement1="UPDATE `user` set `FLAG`=0 WHERE `ID`=:OLD_PLAYER";
                                $statement2="UPDATE `user` set `FLAG`=1 WHERE `ID`=:NEW_PLAYER";
                                $stm1=  $this->pdo->prepare($statement1);
                                $stm2=  $this->pdo->prepare($statement2);
                                $x=$USER_ID;
                                if($USER_ID==1){ $x=2;}
                                else if($USER_ID==2){$x=3;}
                                else if($USER_ID==3){$x=4;}
                                else if($USER_ID==4){$x=1;}
                                $stm1->bindParam(":OLD_PLAYER",$USER_ID,PDO::PARAM_INT);
                                $stm2->bindParam(":NEW_PLAYER",$x,PDO::PARAM_INT);
                                $stm2->execute();
                                $stm1->execute();
                                $rowCount1 = $stm1->rowCount();
                                $rowCount2 = $stm2->rowCount();
                                $check1=0;
                                $check2=0;

                                if($rowCount1>0){$check1=1;echo "<br/><font color='blue'>Updating Flag Successfully for Old Player ( Email: ".$this->getUserEMAIL($USER_ID)." )" ;}
                                if($rowCount2>0){$check2=1;echo "<br/><font color='blue'>Updating Flag Successfully for New Player ( Email: ".$this->getUserEMAIL($x)." )" ;}
                                if($check1 == 0){echo "<br/><font color='red'>Updating Flag Failed for Old Player  ( Email: ".$this->getUserEMAIL($USER_ID)." )" ;}
                                if($check2 == 0){echo "<br/><font color='red'>Updating Flag Failed for New Player  ( Email: ".$this->getUserEMAIL($x)." )" ;}


                                //Delete from user_piece this piece
                                 $statement3="DELETE FROM `user_pieces` WHERE `ID`=:USER_PIECE_ID";
                                 $stm3=  $this->pdo->prepare($statement3);
                                 $stm3->bindParam(":USER_PIECE_ID",$USER_PIECE_ID,PDO::PARAM_INT);
                                 $stm3->execute();
                                 $rowCount3 = $stm3->rowCount();
                                 if($rowCount3>0){echo "<br/><font color='blue'>Your Piece is Deleted Successfully</font>";}
                                 else{echo "<br/><font color='red'>Your Game Deleting Failed</font>";}

                            }else{
                                  echo "<br/><font color='red'>Your Game  is Failed</font>";
                            }
                            
                    
            } catch (Exception $exc) {
                echo "<br/>addGame()=><br/><font color='red'>Error:".$exc->getMessage()."<font>";} 

    }
 
 function closeDB() {

        unset($this->pdo);
        $this->pdo = NULL;
    }

  
    
}
