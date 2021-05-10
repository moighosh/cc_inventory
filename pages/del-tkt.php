<?php
require('../includes/connection.inc.php');
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = ("delete from tickets where id='$id'");
    $res = mysqli_query($con, $sql);
    if($res){
        header("Location: tickets.php");
    } else {
        echo("Error encountered. Inform admin.");
    }
}
?>