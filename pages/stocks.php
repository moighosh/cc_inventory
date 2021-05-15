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
    <a href="<?= LINK?>" style="text-decoration: none;"><h2 style="color: red;">Inventory Master</h2></a>
    <hr>
    <a href="categories.php" style="text-decoration: none;">Categories</a>
    <a href="products.php" style="text-decoration: none;">Products</a>
    <a href="stocks.php" style="text-decoration: none;">Stocks</a>
    <a href="tickets.php" style="text-decoration: none;">Tickets</a>
    <br/>
    <br/>
    <a href="add-stk.php"><button>Add Genesis Stock</button></a>
    <button id="export">Export as CSV</button>
    <br/>
    <br/>
    <table style="width: 100%;">
        <tr>
            <th>Category</th>
            <th>Product</th>
            <th>Stock</th>
            <th>Re-order Level</th>
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
                    <td><?php
                    $query = ("select * from stocks where pro_id='$id'");
                    $result = mysqli_query($con, $query);
                    $fetch = mysqli_fetch_assoc($result);
                    echo $fetch['reorder'];
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
    <table hidden id="data" style="width: 100%;">
        <tr>
            <th>Product</th>
            <th>Stock</th>
            <th>Unit</th>
            <th>Added</th>
            <th>Updated</th>
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
                </tr>
                <?php
            }
        ?>
    </table>
    <script>
        const toCsv = function(table) {
            // Query all rows
            const rows = table.querySelectorAll('tr');

            return [].slice.call(rows)
                .map(function(row) {
                    // Query all cells
                    const cells = row.querySelectorAll('th,td');
                    return [].slice.call(cells)
                        .map(function(cell) {
                            return cell.textContent;
                        })
                        .join(',');
                })
                .join('\n');
        };

        const download = function(text, fileName) {
            const link = document.createElement('a');
            link.setAttribute('href', `data:text/csv;charset=utf-8,${encodeURIComponent(text)}`);
            link.setAttribute('download', fileName);

            link.style.display = 'none';
            document.body.appendChild(link);

            link.click();

            document.body.removeChild(link);
        };

        const table = document.getElementById('data');
        const exportBtn = document.getElementById('export');
        var curday = function(sp){
            today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth()+1; //As January is 0.
            var yyyy = today.getFullYear();

            if(dd<10) dd='0'+dd;
            if(mm<10) mm='0'+mm;
            return (dd+sp+mm+sp+yyyy);
        };
        const date = curday('-');

        exportBtn.addEventListener('click', function() {
            // Export to csv
            const csv = toCsv(table);

            // Download it
            download(csv, date+'-'+'download.csv');
        });
    </script>
</body>