<?php
require('includes/connection.inc.php');
?>
<title>Inventory Master</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<body style="text-align:center;">
    <a href="http://localhost/" style="text-decoration: none;"><h2 style="color: red;">Inventory Master</h2></a>
    <hr>
    <a href="pages/categories.php" style="text-decoration: none;">Categories</a>
    <a href="pages/products.php" style="text-decoration: none;">Products</a>
    <a href="pages/stocks.php" style="text-decoration: none;">Stocks</a>
    <a href="pages/tickets.php" style="text-decoration: none;">Tickets</a>
    <br/>
    <br/>
    <div style="margin-left: auto; width: 50%, padding: 10px;">
        <div style="background-color: #dfdfdf; margin: 1em; width: auto; padding: 5em; float: left;">
            <h3>Total Categories:</h3>
            <h1><?php
                $sql = ("select * from categories order by id desc");
                $res = mysqli_query($con,$sql);
                $count = mysqli_num_rows($res);
                echo $count;
            ?></h1>
        </div>
        <div style="background-color: #dfdfdf; margin: 1em; width: auto; padding: 5em; float: left;">
            <h3>Total Products:</h3>
            <h1><?php
                $sql = ("select * from products order by id desc");
                $res = mysqli_query($con,$sql);
                $count = mysqli_num_rows($res);
                echo $count;
            ?></h1>
        </div>
        <div style="background-color: #dfdfdf; margin: 1em; width: auto; padding: 5em; float: left;">
            <h3>Total Tickets:</h3>
            <h1><?php
                $sql = ("select * from tickets order by id desc");
                $res = mysqli_query($con,$sql);
                $count = mysqli_num_rows($res);
                echo $count;
            ?></h1>
        </div>
    </div>
</body>