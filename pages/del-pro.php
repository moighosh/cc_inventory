<?php
require('../includes/connection.inc.php');
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = ("delete from products where id='$id'");
    $res = mysqli_query($con, $sql);
    if($res){
        header("Location: products.php");
    } else {
        echo("Error encountered. Inform admin.");
    }
}
?>