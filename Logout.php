
<?php
//if($_POST){
//if(isset($_POST)){//If you remove it he will destroy unexisting session

session_unset();
session_destroy();
header('Location:index.php'); //Go to index
/*}
}
 else {
    
             header("Location:index.php");
   

    
}*/
?>
