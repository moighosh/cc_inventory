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
    <a href="add-tkt.php"><button>Add Ticket</button></a>
    <br/>
    <br/>
    <table style="width: 100%;">
        <tr>
            <th>Subject</th>
            <th>Body</th>
            <th>Status</th>
            <th>Added</th>
            <th>Updated</th>
            <th>Actions</th>
        </tr>
        <?php
            $sql = ("select * from tickets order by id desc");
            $res = mysqli_query($con, $sql);
            while($row = mysqli_fetch_assoc($res)){
                $id = $row['id'];
                $body = $row['body'];
                $subject = $row['subject'];
                $status = $row['status'];
                $added = $row['added'];
                $updated = $row['updated'];
                ?>
                <tr>
                    <td><?= $subject?></td>
                    <td><?= $body?></td>
                    <td><?= $status?></td>
                    <td><?= $added?></td>
                    <td><?= $updated?></td>
                    <td><a href="edit-tkt.php?id=<?= $id?>"><button style="background-color: green; color: white;">Edit</button></a>&nbsp;<a href="del-tkt.php?id=<?= $id?>"><button style="background-color: red; color: black;">Delete</button></a></td>
                </tr>
                <?php
            }
        ?>
    </table>
</body>