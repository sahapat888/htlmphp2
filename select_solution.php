<?php
require "connect.php";

$cid = $_GET["CustomerID"];
$sql = "SELECT c.CustomerID ,c.Name,c.OutstandingDebt,co.CountryName,c.Email
FROM customer as c
join country as co on c.CountryCode = co.CountryCode 
where c.CustomerID =:customerID";


$stmt = $conn->prepare($sql);

$stmt->bindParam(':customerID', $cid);
$stmt->execute();

$stmt->setFetchMode(PDO::FETCH_ASSOC);

while ($row = $stmt->fetch()) {
    echo $row['CustomerID'] . ' ' . $row['Name'] . ' ' . $row['OutstandingDebt'] . ' ' . $row['Email'] . ' '  . $row['CountryName'] . "<br/>";
}
$conn = null;
