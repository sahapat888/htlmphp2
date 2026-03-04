<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>addcustomer</title>
</head>

<body>
    <h1>Add Customer </h1>
    <form action="addcustomer.php" method="POST">

        <input type="text" placeholder="Enter Customer ID" name="CustomerID">
        <br><br>
        <input type="text" placeholder="Enter Name" name="Name">
        <br><br>
        <input type="date" placeholder="Birthdate" name="Birthdate">
        <br><br>
        <input type="email" placeholder="Email" name="Email">
        <br><br>
        <input type="text" placeholder="Country code" name="countrycode">
        <br><br>
        <input type="number" placeholder="OutStanding debt" name="outstandingdept">
        <br><br>

        <input type="submit">
    </form>

</body>

</html>

<?php
if (!empty($_POST['CustomerID']) && !empty($_POST['Name']) && !empty($_POST['Birthdate']) && !empty($_POST['Email']) && !empty($_POST['countrycode']) && !empty($_POST['outstandingdept'])):
    require 'connect.php';

    $sql_insert = "insert into customer values (:CustomerID, :Name, :Birthdate, :Email, :countrycode, :outstandingdept)";

    $stmt = $conn->prepare($sql_insert);
    $stmt->bindParam(':CustomerID', $_POST['CustomerID']);
    $stmt->bindParam(':Name', $_POST['Name']);

    $stmt->bindParam(':Birthdate', $_POST['Birthdate']);
    $stmt->bindParam(':Email', $_POST['Email']);
    $stmt->bindParam(':countrycode', $_POST['countrycode']);
    $stmt->bindParam(':outstandingdept', $_POST['outstandingdept']);

    if ($stmt->execute()):
        $message = 'Suscessfully add new customer';
    //header ("location: /business/selectcountry1.php)
    else: $message = 'Fail to add new customer';
    endif;
    echo $message;

    $conn = null;
endif;
?>