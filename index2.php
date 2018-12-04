<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>CS 3120 (Databases) Asn3</title>
</head>
<body>
<?php
include 'connectdb.php';
?>
<h1>George Gainham - 250834832 - ggainham</h1>





<!-- See Customer info... also see getpurchases.php -->





<h2>Customers (arranged alphabetically by last name):</h2>
<form action="getpurchases.php" method="post">
<?php
   include 'getdata.php';
?>
<input type="submit" value="Get Customer Purchases">
</form>





<!-- See Products... also see ascendingprice.php and descendingprice.php -->





<h2>Our Products</h2>
<?php
   echo '<a href="ascendingprice.php">Click Here for All Products Ordered by Ascending Price</a><br>';
   echo '<a href="descendingprice.php">Click Here for All Products Ordered by Descending Price</a>';
?>
<br><br>





<!-- Add new order... also see addpur.php-->





<h2>Add Customer Order:</h2>
<form action="addpur.php" method="post">
<?php
    $query = "SELECT DISTINCT customerid FROM customer";
    echo "Customer ID: ";
    echo '<select name="custid">';
    $result = mysqli_query($connection,$query);
    if (!$result) {
        die("databases query failed.");
    }
    echo "<ol>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<option value='.$row['customerid']. ">" . $row['customerid'].'</option>';
    }
    echo'</select>';
    mysqli_free_result($result);
    echo "</ol>";
        ?>
<?php
    $query_1 = "SELECT DISTINCT productid FROM product";
    echo '<br>'. "Product ID: ";
    echo '<select name="prodid">';
    $result_1 = mysqli_query($connection,$query_1);
    if (!$result_1) {
        die("databases query failed.");
    }
    echo "<ol>";
    while ($row = mysqli_fetch_assoc($result_1)) {
        echo '<option value='.$row['productid']. ">" . $row['productid'].'</option>';
    }
    echo'</select>';
    mysqli_free_result($result_1);
    echo "</ol>";
        ?>
<?php
    echo '<a href="ascendingprice.php"> Click Here to See Product IDs & Descriptions</a>';
?>
<br>Quantity: <input type="number" pattern="^[0-9]" min="1" step = "1" name="quant"><br>
<input type="submit" value="Purchase Item">
</form>







<!-- Add new customer... also see incus.php -->







<br>
<h2>Add New Customer:</h2>
<form action="incus.php" method="post">
<br>Customer First Name: <input type="text" name="newcustfname">
<br>Customer Last Name: <input type="text" name="newcustlname">
<br>Customer City: <input type="text" name="newcustcity">
<br>Customer Phone Number: <input type="text" name="newcustnum">
<?php
    $query2 = "SELECT agentid FROM agent";
    echo '<br>'. "Agent (if applicable): ";
    echo '<select name="agid">';
    $result2 = mysqli_query($connection,$query2);
    if (!$result2) {
        die("databases query failed.");
    }
    $row = mysqli_fetch_assoc($result2);
    echo "<ol>";
    echo '<option value=""></option>';	
    while ($row = mysqli_fetch_assoc($result2)) {
        echo '<option value="'.$row['agentid'].'" >'.$row['agentid'] . '</option>';

    }
    echo'</select>';
    mysqli_free_result($result2);
    echo "</ol>";
        ?>
<br><input type="submit" value="Add Customer" onclick="return confirm('Cannot add more than 99 customers... have you checked the amount of customers present? (Press Ok to continue)');">
</form>






<!-- Update Customer's phone number alse see addnum.php -->





<br>
<h2>Update Customer's Phone Number:</h2>
<form action="addnum.php" method="post">
<?php
    $query_3 = "SELECT customerid FROM customer";
    echo '<br>'. "Customer: ";
    echo '<select name="custnm">';
    $result_3 = mysqli_query($connection,$query_3);
    if (!$result_3) {
        die("databases query failed.");
    }
    echo "<ol>";
    while ($row = mysqli_fetch_assoc($result_3)) {
        echo '<option value="'.$row['customerid'].'" >'.$row['customerid']. '</option>';
    }
    echo'</select>';
    mysqli_free_result($result_3);
    echo "</ol>";
        ?>
<br>New Phone Number: <input type="text" name="newcustpn">
<br><input type="submit" value="Update Phone Number">
</form>






<!-- Delete Customer also see delcu.php-->







<br>
<h2>Delete Customer:</h2>
<form action="delcu.php" method="post">
<?php
    $query_4 = "SELECT customerid FROM customer ORDER BY customerid DESC";
    echo '<br>'. "Customer: ";
    echo '<select name="delcunt">';
    $result_4 = mysqli_query($connection,$query_4);
    if (!$result_4) {
        die("databases query failed.");
    }
    echo "<ol>";
    while ($row = mysqli_fetch_assoc($result_4)) {
        echo '<option value="'.$row['customerid'].'" >'.$row['customerid']. '</option>';
    }
    echo'</select>';
    mysqli_free_result($result_4);
    echo "</ol>";
        ?>
<br><input type="submit" value="Delete Customer" onclick="return confirm('Are you SURE you want to delete customer?');">
</form>






<!-- Given Quantity also see quantity.php-->







<br>
<h2>Check Who Has Bought More than a Given Quantity of Product:</h2>
<form action="quantity.php" method="post">
<?php
    $query_5 = "SELECT DISTINCT productid FROM product";
    echo '<br>'. "Product ID: ";
    echo '<select name="proditm">';
    $result_5 = mysqli_query($connection,$query_5);
    if (!$result_5) {
        die("databases query failed.");
    }
    echo "<ol>";
    while ($row = mysqli_fetch_assoc($result_5)) {
        echo '<option value='.$row['productid']. ">" . $row['productid'].'</option>';
    }
    echo'</select>';
    mysqli_free_result($result_5);
    echo "</ol>";
        ?>
<?php
    echo '<a href="ascendingprice.php"> Click Here to See Product IDs & Descriptions</a>';
?>
<br>Quantity: <input type="text" name="itmquant">
<br><input type="submit" value="Submit">
</form>





<!-- Never Purchased Products-->






<br>
<h2>Never Purchased Products:</h2>
<?php
    $query_6 = 'SELECT * FROM product WHERE productid NOT IN (SELECT productid FROM customerpurchasesproduct)';
    $result_6 = mysqli_query($connection, $query_6);
    if (!$result_6) {
         die("Sorry,query failed");
    }
    else {
         $row = mysqli_fetch_assoc($result_6);
         echo $row['description'] . ' (Product ID: ' . $row['productid'] . ') have never been bought before.';
    }
?>







<!-- Earnings from given product also see revenue.php-->





<br>
<h2>Earnings From Given Product:</h2>
<form action="revenue.php" method="post">
<?php
    $query_7 = "SELECT DISTINCT productid FROM product";
    echo '<br>'. "Product ID: ";
    echo '<select name="itmrev">';
    $result_7 = mysqli_query($connection,$query_7);
    if (!$result_7) {
        die("databases query failed.");
    }
    echo "<ol>";
    while ($row = mysqli_fetch_assoc($result_7)) {
        echo '<option value='.$row['productid']. ">" . $row['productid'].'</option>';
    }
    echo'</select>';
    mysqli_free_result($result_7);
    echo "</ol>";
?>
<?php
    echo '<a href="ascendingprice.php"> Click Here to See Product IDs & Descriptions</a>';
?>
<br><input type="submit" value="Submit">
</form>



<?php
mysqli_close($connection);
?> 
</body>
</html> 
