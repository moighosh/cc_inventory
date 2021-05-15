<?php
require('../includes/connection.inc.php');
$msg = "";
$id = "";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = ("select * from products where id='$id'");
    $res = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($res);
    $cat_id_fetch = $row['cat_id'];
    $product_fetch = $row['product'];
    $unit_fetch = $row['unit'];
}

if(isset($_POST['submit'])){
    $pro_id = $id;
    $stk_post = (int)$_POST['stock'];
    $added = date("Y-m-d H:i:s");
    $updated = date("Y-m-d H:i:s");
    $sql = ("select * from stocks where pro_id='$pro_id'");
    $res = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($res);
    $stk_fetch = (int)$row['stk_out'];
    $stk = $stk_post + $stk_fetch;
    $sql = ("update stocks set stk_out = '$stk', updated = '$updated' where pro_id='$pro_id'");
    $res = mysqli_query($con, $sql);
    if($res){
        header("Location: stocks.php");
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
        Product name: <h3><?= $product_fetch?></h3><br/>
        Insert units: <input type="number" name="stock"/>&nbsp;<?= $unit_fetch?>
        <br/><br/>
        <input type="submit" name="submit"/>
    </form>
    <?= $msg?>
</body>