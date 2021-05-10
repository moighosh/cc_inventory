<?php
require('../includes/connection.inc.php');
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = ("delete from categories where id='$id'");
    $res = mysqli_query($con, $sql);
    if($res){
        header("Location: categories.php");
    } else {
        echo("Error encountered. Inform admin.");
    }
}
?>