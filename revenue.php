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
    $itemid = $_POST["itmrev"];
    $itemid = (int)$itemid;

    $query = 'SELECT SUM(quantity) as totalsold FROM customerpurchasesproduct WHERE productid=' . $itemid . ' GROUP BY productid';
    $result = mysqli_query($connection, $query);
    if (!$result) {
          die("databases query failed.");
    }
    else {

    $otherquery= 'SELECT * FROM product WHERE productid=' . $itemid;
    $otherresult = mysqli_query($connection, $otherquery);
        if (!$otherresult) {
             die("databases query failed.");
        }

    
    #Get total amount of products sold and cost of product...
    $sold = mysqli_fetch_assoc($result);
    $productcost = mysqli_fetch_assoc($otherresult);


    #multiply them!
    $prodcost = (int)$productcost['itemcost'];
    $finalsold = (int)$sold['totalsold'];
    $total = $productcost['itemcost'] * $sold['totalsold'];

    echo "<br>", 'Total Number of Purchases: ' .$finalsold;
    echo "<br>", 'Product Description: ' .$productcost['description'];
    echo "<br>", 'Cost of Item: ' .$prodcost;
    echo "<br>", 'Total	Earned from this Item: ' .$total;

    }    
?>
<?php
    echo '<br><a href="index2.php"> Click Here To Go Back</a>';
?>
</ol>
</body>
</html>
