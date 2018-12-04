<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
<?php
   include 'connectdb.php';
?>
<h1>Customer Delete Screen</h1>
<ol>
<?php

    $deletec = $_POST['delcunt'];
    $deletec = (int)$deletec;

    $equery = 'DELETE FROM customer WHERE customerid = ' .$deletec;
    #$del = mysqli_query($connection, $equery);
    if (mysqli_query($connection, $equery)) {
      echo "Record deleted successfully";
      echo "<br>","<br>", "Customer ID: ", $deletec, " has been deleted  )':";
    } else {
      echo "Error deleting record: Customer has bought products and cannot be deleted... please only delete customers who have NOT bought products", "<br>","<br>" . mysqli_error($connection);
    }

    mysqli_close($connection);
?>
<?php
    echo '<br><a href="index2.php"> Click Here To Go Back</a>';
?>
</ol>
</body>
</html>
