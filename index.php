<?php
require('includes/connection.inc.php');
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<body style="text-align:center;">
    <a href="http://localhost/" style="text-decoration: none;"><h2 style="color: red;">Inventory Master</h2></a>
    <hr>
    <a href="pages/categories.php" style="text-decoration: none;">Categories</a>
    <a href="pages/products.php" style="text-decoration: none;">Products</a>
    <a href="pages/stocks.php" style="text-decoration: none;">Stocks</a>
    <a href="pages/sales.php" style="text-decoration: none;">Sales</a>
    <br/>
    <br/>
    <div style="margin-left: auto; width: 50%, padding: 10px;">
        <div style="background-color: #dfdfdf; margin: 1em; width: 10em; padding: 5em; float: left;">
            <h3>Total Categories:</h3>
        </div>
        <div style="background-color: #dfdfdf; margin: 1em; width: 10em; padding: 5em; float: left;">
            <h3>Total Products:</h3>
        </div>
        <div style="background-color: #dfdfdf; width: 10em; margin: 1em; padding: 5em; float: left;">
            <h3>Total Stocks:</h3>
        </div>
        <div style="background-color: #dfdfdf; width: 10em; margin: 1em; padding: 5em; float: left;">
            <h3>Total Sales:</h3>
        </div>
    </div>
</body>