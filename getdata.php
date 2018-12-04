
<?php
$query = "SELECT * FROM customer ORDER BY lastname";
$result = mysqli_query($connection,$query);
if (!$result) {
     die("databases query failed.");
}
echo "<ol>";
while ($row = mysqli_fetch_assoc($result)) {
    echo '<input type="radio" name="cust_id" value="';
    echo $row["customerid"];
    echo '">' .$row["lastname"].", " .$row["firstname"]. ", Customer ID: ". $row["customerid"]. ", Agent ID: ". $row["agentid"]. ", City: ". $row["city"]. ", Phone Number: ". $row["phonenumber"]. "<br>";
}
mysqli_free_result($result);
echo "</ol>";
?>
