<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
<?php
   include 'connectdb.php';
?>
<h1>Order Screen</h1>
<ol>
<?php
   $whichcust = $_POST["custid"];
   $whichcust =(int)$whichcust; 
   $productID = $_POST["prodid"];
   $productID = (int)$productID;
   $quant_ = $_POST["quant"];
   $quant_ = (int)$quant_;
	
   $query = 'SELECT COUNT(*) as amount, quantity FROM customerpurchasesproduct WHERE customerid =' .$whichcust. '  AND productid =' . $productID;
   if (!mysqli_query($connection, $query)) {
        die("Error: insert failed" . mysqli_error($connection));
    }



   $otherquery = 'SELECT * FROM product WHERE productid =' . $productID;
   $otherresult=mysqli_query($connection, $otherquery);
   $otherrow = mysqli_fetch_assoc($otherresult);   
   $description = $otherrow['description'];



   #if the customer HAS bought that product before
   $result=mysqli_query($connection, $query);   
   $row = mysqli_fetch_assoc($result);
   if ($row["quantity"] > 0) {
        $total = $row["quantity"] + $quant_;
        $query2 = 'UPDATE customerpurchasesproduct SET quantity=' .$total. ' WHERE customerid=' .$whichcust. ' AND productid=' .$productID;
        $add = mysqli_query($connection, $query2);
            if(!$add) {
              die("Query has failed");
            }
        echo 'Customer ' . $whichcust . ' has bought '. $quant_ . ' ' . $description . '(s)';
   }



   #if customer has NOT bought the product before
   else {
        $query1 = 'INSERT INTO customerpurchasesproduct(customerid, productid, quantity) VALUES(' .$whichcust. ', ' .$productID. ', ' .$quant_. ')';
        $result1 = mysqli_query($connection, $query1);
            if(!$result1) {
              die("Add query has failed");
            }
        echo 'Customer ' . $whichcust . ' has bought '. $quant_ . ' ' . $description . '(s)';
   }
   mysqli_close($connection);
?>
<?php
    echo '<br><a href="index2.php"> Click Here To Go Back</a>';
?>
</ol>
</body>
</html>
