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
    <a href="add-cat.php"><button>Add Category</button></a>
    <br/>
    <br/>
    <table style="width: 100%;">
        <tr>
            <th>Category</th>
            <th>Added</th>
            <th>Updated</th>
            <th>Actions</th>
        </tr>
        <?php
            $sql = ("select * from categories order by id desc");
            $res = mysqli_query($con, $sql);
            while($row = mysqli_fetch_assoc($res)){
                $id = $row['id'];
                $category = $row['category'];
                $added = $row['added'];
                $updated = $row['updated'];
                ?>
                <tr>
                    <td><?= $category?></td>
                    <td><?= $added?></td>
                    <td><?= $updated?></td>
                    <td><a href="edit-cat.php?id=<?= $id?>"><button style="background-color: green; color: white;">Edit</button></a>&nbsp;<a href="del-cat.php?id=<?= $id?>"><button style="background-color: red; color: black;">Delete</button></a></td>
                </tr>
                <?php
            }
        ?>
    </table>
</body>