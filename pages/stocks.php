<?php
require('../includes/connection.inc.php');
?>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
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
    <table style="width: 100%;">
        <tr>
            <th>Category</th>
            <th>Product</th>
            <th>Stock</th>
            <th>Unit</th>
            <th>Added</th>
            <th>Updated</th>
            <th>Actions</th>
        </tr>
        <?php
            $sql = ("select * from products order by id desc");
            $res = mysqli_query($con, $sql);
            while($row = mysqli_fetch_assoc($res)){
                $id = $row['id'];
                $cat_id = $row['cat_id'];
                $product = $row['product'];
                $unit = $row['unit'];
                $added = $row['added'];
                $updated = $row['updated'];
                ?>
                <tr>
                    <td><?php 
                        $query = ("select * from categories where id='$cat_id'");
                        $result = mysqli_query($con, $query);
                        $fetch = mysqli_fetch_assoc($result);
                        echo $fetch['category'];
                    ?></td>
                    <td><?= $product?></td>
                    <td><?php
                    $query = ("select * from stocks where pro_id='$id'");
                    $result = mysqli_query($con, $query);
                    $fetch = mysqli_fetch_assoc($result);
                    $stk_in = (int)$fetch['stk_in'];
                    $stk_out = (int)$fetch['stk_out'];
                    $stock = $stk_in - $stk_out;
                    echo $stock;
                    ?></td>
                    <td><?= $unit?></td>
                    <td><?= $added?></td>
                    <td><?= $updated?></td>
                    <td><a href="stk-in.php?id=<?= $id?>"><button style="background-color: green; color: white;">IN</button></a>&nbsp;<a href="stk-out.php?id=<?= $id?>"><button style="background-color: red; color: black;">OUT</button></a></td>
                </tr>
                <?php
            }
        ?>
    </table>
</body>