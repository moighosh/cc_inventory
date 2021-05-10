<?php
require('../includes/connection.inc.php');
$msg = "";
if(isset($_POST['submit'])){
    $category = $_POST['category'];
    $added = date("Y-m-d H:i:s");
    $updated = date("Y-m-d H:i:s");
    $sql = ("insert into categories(category, added, updated) values('$category', '$added', '$updated')");
    $res = mysqli_query($con, $sql);
    if($res){
        $msg = "Category added.";
    } else {
        $msg = "Error occured. Report to admin.";
    }
}
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<body style="text-align:center;">
    <a href="http://localhost/" style="text-decoration: none;"><h2 style="color: red;">Inventory Master</h2></a>
    <hr>
    <a href="categories.php" style="text-decoration: none;">Categories</a>
    <a href="products.php" style="text-decoration: none;">Products</a>
    <a href="stocks.php" style="text-decoration: none;">Stocks</a>
    <a href="sales.php" style="text-decoration: none;">Sales</a>
    <br/>
    <br/>
    <form method="post">
        Category name: <input type="text" name="category"/>
        <input type="submit" name="submit"/>
    </form>
    <?= $msg?>
</body>