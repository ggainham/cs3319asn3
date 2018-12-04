<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
<?php
   include 'connectdb.php';
?>
<h1>Customer Phone Number Update Screen</h1>
<ol>
<?php
    $upcust = $_POST['custnm'];
    $upcust = (int)$upcust;
    $newpn = $_POST['newcustpn'];
    
    $dquery = 'UPDATE customer SET phonenumber ="' .$newpn. '" WHERE customerid = ' .$upcust;
    $add_ = mysqli_query($connection, $dquery);
    echo "Customer ID: ", $upcust, " has had their phone number updated to ", $newpn;

    mysqli_close($connection);
?>
<?php
    echo '<br><a href="index2.php"> Click Here To Go Back</a>';
?>
</ol>
</body>
</html>
