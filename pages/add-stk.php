<?php
require('../includes/connection.inc.php');
$msg = "";
if(isset($_POST['submit'])){
    $pro_id = $_POST['pro_id'];
    $stk_in = $_POST['stock'];
    $stk_out = "0";
    $reorder = $_POST['reorder'];
    $added = date("Y-m-d H:i:s");
    $updated = date("Y-m-d H:i:s");
    $sql = ("select * from stocks where pro_id='$pro_id'");
    $res = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($res);
    if($row != ""){
        $msg = "Genesis stock already added.";
    } else {
        $sql = ("insert into stocks(pro_id, stk_in, stk_out, reorder, added, updated) values('$pro_id', '$stk_in', '$stk_out', '$reorder', '$added', '$updated')");
        $res = mysqli_query($con, $sql);
        if($res){
            $msg = "Genesis stock added. Add Another.";
        } else {
            $msg = "Error occured. Report to admin.";
        }
    }
}
?>
<?php
require('../includes/common.inc.php');
?>
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
        Choose Product: <select name="pro_id" id="pro_id" required>
            <?php
            $sql = ("select * from products order by id desc");
            $res = mysqli_query($con, $sql);
            while($row = mysqli_fetch_assoc($res)){
            ?>
            <option value="<?= $row['id']?>"><?= $row['product']?></option>
            <?php } ?>
        </select>
        Genesis Stock: <input type="number" name="stock" required/>
        Re-order level: <input type="number" name="reorder" required/>
        <input type="submit" name="submit"/>
    </form>
    <?= $msg?>
</body>