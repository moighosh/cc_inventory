<?php
require('../includes/connection.inc.php');
$msg = "";
if(isset($_POST['submit'])){
    $subject = $_POST['subject'];
    $body = $_POST['body'];
    $added = date("Y-m-d H:i:s");
    $updated = date("Y-m-d H:i:s");
    $sql = ("insert into tickets(subject, body, status, added, updated) values('$subject', '$body', 'OPEN', '$added', '$updated')");
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
        Subject: <input type="text" name="subject" required/><br/><br/>
        Body: <textarea id="body" name="body" rows="4" cols="50">
        
        </textarea><br/><br/>
        <input type="submit" name="submit"/>
    </form>
    <?= $msg?>
</body>