<?php
require('../includes/connection.inc.php');
$msg = "";
$id= "";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = ("select * from tickets where id='$id'");
    $res = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($res);
    $sub_fetch = $row['subject'];
    $body_fetch = $row['body'];
    $stat_fetch = $row['status'];
}

if(isset($_POST['submit'])){
    $body = $_POST['body'];
    $status = $_POST['status'];
    $updated = date("Y-m-d H:i:s");
    $sql = ("update tickets set body='$body', status='$status', updated = '$updated' where id='$id'");
    $res = mysqli_query($con, $sql);
    if($res){
        header("Location: tickets.php");
    } else {
        $msg = "Error occured. Report to admin.";
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
        Subject: <h4><?= $sub_fetch?></h4>
        Body: <textarea id="body" name="body" rows="4" cols="50">
        <?= $body_fetch?>
        </textarea><br/><br/>
        Choose Ticket Status: <select name="status" id="status" required>
            <option selected>Selected: <?= $stat_fetch?></option>
            <option value="OPEN">OPEN</option>
            <option value="PROCESSING">PROCESSING</option>
            <option value="OVERDUE">OVERDUE</option>
            <option value="CLOSED">CLOSED</option>
        </select>
        <input type="submit" name="submit"/>
    </form>
    <?= $msg?>
</body>