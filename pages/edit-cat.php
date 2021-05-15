<?php
require('../includes/connection.inc.php');
$msg = "";
$id = "";
$category_fetch = "";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = ("select * from categories where id='$id'");
    $res = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($res);
    $category_fetch = $row['category'];
}
if(isset($_POST['submit'])){
    $category = $_POST['category'];
    $updated = date("Y-m-d H:i:s");
    $sql = ("update categories set category='$category', updated = '$updated' where id='$id'");
    $res = mysqli_query($con, $sql);
    if($res){
        $sql = ("select * from categories where id='$id'");
        $res = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($res);
        $category_fetch = $row['category'];
        $msg = "Category updated.";
    } else {
        $msg = "Error occured. Report to admin.";
    }
}
?>
<title>Inventory Master</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<body style="text-align:center;">
    <a href="<?= LINK?>" style="text-decoration: none;"><h2 style="color: red;">Inventory Master</h2></a>
    <hr>
    <a href="categories.php" style="text-decoration: none;">Categories</a>
    <a href="products.php" style="text-decoration: none;">Products</a>
    <a href="stocks.php" style="text-decoration: none;">Stocks</a>
    <a href="tickets.php" style="text-decoration: none;">Tickets</a>
    <br/>
    <br/>
    <form method="post">
        Category name: <input type="text" name="category" value="<?= $category_fetch?>" required/>
        <input type="submit" name="submit"/>
    </form>
    <?= $msg?>
</body>