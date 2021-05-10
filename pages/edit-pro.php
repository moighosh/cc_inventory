<?php
require('../includes/connection.inc.php');
$msg = "";

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
    $cat_id = $_POST['cat_id'];
    $product = $_POST['product'];
    $unit = $_POST['unit'];
    $added = date("Y-m-d H:i:s");
    $updated = date("Y-m-d H:i:s");
    $sql = ("update products set cat_id = '$cat_id', product = '$product', unit='$unit', updated = '$updated' where id='$id'");
    $res = mysqli_query($con, $sql);
    if($res){
        $sql = ("select * from products where id='$id'");
        $res = mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($res);
        $cat_id_fetch = $row['cat_id'];
        $product_fetch = $row['product'];
        $unit_fetch = $row['unit'];
        $msg = "Product updated.";
    } else {
        $msg = "Error occured. Report to admin.";
    }
}
?>
<title>Inventory Master</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<body style="text-align:center;">
    <a href="http://localhost/" style="text-decoration: none;"><h2 style="color: red;">Inventory Master</h2></a>
    <hr>
    <a href="categories.php" style="text-decoration: none;">Categories</a>
    <a href="products.php" style="text-decoration: none;">Products</a>
    <a href="stocks.php" style="text-decoration: none;">Stocks</a>
    <a href="tickets.php" style="text-decoration: none;">Tickets</a>
    <br/>
    <br/>
    <form method="post">
        Choose Category: <select name="cat_id" id="cat_id" required>
            <option value="<?= $cat_id_fetch?>" selected>Selected: <?php
            $query = ("select * from categories where id='$cat_id_fetch'");
            $result = mysqli_query($con, $query);
            $fetch = mysqli_fetch_assoc($result);
            echo $fetch['category'];
            ?></option>
            <?php
            $sql = ("select * from categories order by id desc");
            $res = mysqli_query($con, $sql);
            while($row = mysqli_fetch_assoc($res)){
            ?>
            <option value="<?= $row['id']?>"><?= $row['category']?></option>
            <?php } ?>
        </select>
        Product name: <input type="text" name="product" value="<?= $product_fetch?>" required/>
        Choose Unit: <select name="unit" id="unit" required>
            <option value="<?= $unit_fetch?>" selected>Selected: <?= $unit_fetch?></option>
            <option value="Pcs">Pcs</option>
            <option value="Bndl">Bndl</option>
            <option value="Pack">Pack</option>
            <option value="Kgram">Kgram</option>
            <option value="Gram">Gram</option>
            <option value="Rims">Rims</option>
            <option value="Ltrs">Ltrs</option>
            <option value="Ml">Ml</option>
        </select>
        <input type="submit" name="submit"/>
    </form>
    <?= $msg?>
</body>