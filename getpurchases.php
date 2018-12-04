
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<h1>George Gainham - 250834832 - ggainham</h1>
<h2>Here is the customer's purchase info:</h2>
</head>
<body>
<?php
include 'connectdb.php';
?>
<ol>
<?php
   $whichcust= $_POST["cust_id"];
   $query = 'SELECT * FROM customerpurchasesproduct, product WHERE customerpurchasesproduct.productid=product.productid AND customerpurchasesproduct.customerid="' .$whichcust .'"';
   $result=mysqli_query($connection,$query);
    if (!$result) {
         die("database query2 failed.");
     }
    while ($row=mysqli_fetch_assoc($result)) {
        echo '<li>';
        echo "Description: ";
	echo $row["description"];
	echo ", Cost: $";
	echo $row["itemcost"];
	echo ", Quantity: ";
	echo $row["quantity"];
     }
     mysqli_free_result($result);
?>
</ol>
<?php
   mysqli_close($connection);
?>
<?php
    echo '<br><a href="index2.php"> Click Here To Go Back</a>';
?>
</body>
</html>
