<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if(isset($_SESSION["USER_EMAIL"])){
        include './Model/DBClass.php';
        //include './Model/User.php';
        $DBClassObject = new DBClass(); 
        $USER_OBJECT = new User();

        $My_Pieces=$DBClassObject->getUserPieces($_SESSION["USER_ID"]);
        $PlayedPieces=$DBClassObject->getUserPiecesGames();
        if($My_Pieces){//if it return a result
            $count_result=  count($My_Pieces);
            ?>
        <table class="table" >
            <th>Piece ID</th>
            <th>Num 1</th>
            <th>Num2</th>
            <?php
                    
                    for($i=0;$i<$count_result;$i++){

                       ?>

                        <tr>
                            <td><?php echo $My_Pieces[$i]['User_Pieces_ID'];?></td>
                            <td><?php echo $My_Pieces[$i]['NUM1'];?></td>
                           <td><?php echo $My_Pieces[$i]['NUM2'];?></td>

                        </tr>
              <?php
                }//end of for?>
                    </table>
                        <br>
                      <!--  <form method="post" action="Controller/AddGame.php"> -->
                      <select name="Pieces" id="Pieces">
                            <?php 
                              for($i=0;$i<$count_result;$i++){
                                echo' <option value="'.$My_Pieces[$i]['User_Pieces_ID'].'">'.$My_Pieces[$i]['NUM1'].",,".$My_Pieces[$i]['NUM2'].'</option>';
                              }
                            ?>
                        </select>
                        <?php 
                        if($DBClassObject->getUserFlag($_SESSION["USER_ID"])==1){
                       echo ' <input type="submit" name="playButton" value="play" onclick="AddPieces();"><br>';
                        }else{
                            echo "You can't play now there is another user ";
                        }
                        ?>
                        <!--</form>-->
                        <div id="status"></div>
               <?php
        }//end of if there are result or not
     else{
         echo "You havn't any pieces tell now";
     }
     
     if($PlayedPieces){//if it return a result
            $count_result2=  count($PlayedPieces);
            ?><br><br>
            <h1>Played Games:</h1>
        <table class="table" >
            <th>USER_PIECE_ID</th>
            <th>User Email</th>
            <?php
                    
                    for($i=0;$i<$count_result2;$i++){

                       ?>

                        <tr>
                            <td><?php echo  $PlayedPieces[$i]['USER_PIECE_ID'];?></td>
                            <td><?php echo $DBClassObject->getUserEMAIL($PlayedPieces[$i]['USER_ID']);?></td>

                        </tr>
              <?php
                }//end of for?>
                    </table>
                        
                        
                     
               <?php
        }//end of if there are result or not
     else{
         echo "There is no game till now";
     }
}
else{
    echo "Register first please ^_^";
}
?>
<script>
function AddPieces(){
    // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();
    // Create some variables we need to send to our PHP file
    var url = "Controller/AddGame.php";
    var checkVariable=true;
    var Pieces=document.getElementById("Pieces").value;
    if(checkVariable){
    var vars = "Pieces="+Pieces;
    hr.open("POST", url, true);
    // Set content type header information for sending url encoded variables in the request
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function() {
	    if(hr.readyState == 4 && hr.status == 200) {
		    var return_data = hr.responseText;
		    document.getElementById("status").innerHTML = return_data;
                    
	    }
    }
    // Send the data to PHP now... and wait for response to update the status div
    hr.send(vars); // Actually execute the request
    document.getElementById("status").innerHTML = "processing...";
     document.getElementsById("playButton").style.visibility="hidden";

    }//end of check if data is correct or not
}</script>