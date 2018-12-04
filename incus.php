<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
<?php
   include 'connectdb.php';
?>
<h1>Customer Addition Screen:</h1>
<?php
   $whichfn_ = $_POST["newcustfname"];
   $whichln_ = $_POST["newcustlname"];
   $whichct_ = $_POST["newcustcity"];
   $whichnm_ = $_POST["newcustnum"];
   $whichagnm_ = $_POST["agid"];


   #assign new customer ID


   $aquery = "SELECT max(customerid) as maxid FROM customer";
   $aresult = mysqli_query($connection, $aquery);
   if (!$aresult) {
          die("database max query failed.");
   }
   $row = mysqli_fetch_assoc($aresult);
   $newcustid = intval($row["maxid"]) +1;

   if ($whichagnm_ == "") {
        $bquery = 'INSERT INTO customer(customerid, firstname , lastname , city , phonenumber , agentid) VALUES ("' .$newcustid. '","' .$whichfn_. '","' .$whichln_. '","' .$whichct_. '","' .$whichnm_. '", Null)'; 
        if (!mysqli_query($connection, $bquery)) {
            die("Error: insert failed" . mysqli_error($connection));
        }
        echo "<br>", "The customer has been added.";  
   }
   


   else {
        echo "<br>", "The new customer's agent's ID is: ", $whichagnm_, "<br>";
        $cquery = 'INSERT INTO customer(customerid, firstname , lastname , city , phonenumber , agentid) VALUES ("' .$newcustid. '","' .$whichfn_. '","' .$whichln_. '","' .$whichct_. '","' .$whichnm_. '","' .$whichagnm_.'")';
        if (!mysqli_query($connection, $cquery)) {
            die("Error: insert failed" . mysqli_error($connection));
        }
        echo "<br>", "The customer has been added.", "<br>";
   }
   echo "<br>", "The new customer's ID is: ", $newcustid, "<br>";
?>

<?php
    echo '<br><a href="index2.php"> Click Here To Go Back</a>';
?>
</body>
</html>
