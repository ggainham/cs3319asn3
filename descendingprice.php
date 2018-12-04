<?php
$dbhost = "localhost";
$dbuser= "root";
$dbpass = "Lollipops1!";
$dbname = "ggainhamassign2db";
global $connection;
$connection = mysqli_connect($dbhost, $dbuser,$dbpass,$dbname);
if (mysqli_connect_errno()) {
     die("database connection failed :" .
     mysqli_connect_error() .
     "(" . mysqli_connect_errno() . ")"
         );
    }
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<h1>George Gainham - 250834832 - ggainham</h1>
<h2>Here are all our products arranged by price in ascending order:</h2>
</head>
<body>
<?php
$result = mysqli_query($GLOBALS['connection'],"SELECT * FROM product ORDER BY itemcost DESC");
if (!$result) {
     die("databases query failed.");
}
echo "<ol>";
while ($row = mysqli_fetch_assoc($result)) {
   echo "<li>". $row['description']. ", $". $row['itemcost']. ", Quantity: ". $row['itemamount']. ", Item ID: ". $row['productid']. "</li>";
   echo	"<br>";
}
echo "</ol>";
?>
<?php
    echo '<br><a href="index2.php"> Click Here To Go Back</a>';
?>
</body>
</html>
