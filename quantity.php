<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
<?php
   include 'connectdb.php';
?>
<h1>Item Quantity Screen:</h1>
<?php
    $quant = $_POST["itmquant"];
    $quant = (int)$quant;
    $item = $_POST["proditm"];

    $fquery = 'SELECT firstname, lastname, description, quantity FROM customerpurchasesproduct INNER JOIN product ON product.productid=customerpurchasesproduct.productid INNER JOIN customer ON customer.customerid=customerpurchasesproduct.customerid WHERE quantity>=' . $quant;
    $fresult = mysqli_query($connection, $fquery);
    if (!$fresult) {
          die("databases query failed.");
    }

    else {
          $row = mysqli_fetch_assoc($fresult);
          echo $row["firstname"] . ' ' . $row["lastname"] . ' bought ' . $row["quantity"] . ' ' . $row["description"];
    }
    mysqli_free_result($fresult);
?>
<?php
    echo '<br><a href="index2.php"> Click Here To Go Back</a>';
?>
</body>
</html>
