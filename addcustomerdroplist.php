<?php
require 'connect.php';
$sql_select = "select * from country order by CountryCode";
$stmt_s = $conn->prepare($sql_select);
$stmt_s->execute();
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>addcustomer</title>
</head>

<body>
    <h1>Add Customer </h1>
    <form action="addcustomerdroplist.php" method="POST">

        <input type="text" placeholder="Enter Customer ID" name="CustomerID">
        <br><br>
        <input type="text" placeholder="Enter Name" name="Name">
        <br><br>
        <input type="number" placeholder="OutStanding debt" name="outstandingdept">
        <br><br>
        <input type="email" placeholder="Email" name="Email">
        <br><br>
        <input type="date" placeholder="Birthdate" name="Birthdate">
        <br><br>

        <label>select a country code </label>
        <select name="countrycode">
            <?php


            while ($cc = $stmt_s->fetch(PDO::FETCH_ASSOC)) :
            ?>
                <option value="<?php echo $cc["CountryCode"]; ?>">
                    <?php echo $cc["CountryCode"]; ?>
                </option>
            <?php
            endwhile;
            ?>
        </select>

        <input type="submit" value="submit" name="submit" />
    </form>




    <?php
    if (isset($_POST['submit'])) {
        if (
            !empty($_POST['CustomerID']) && !empty($_POST['Name'])
        );

        $sql_insert = "insert into customer values (:CustomerID, :Name, :Birthdate, :Email, :countrycode, :outstandingdept)";
        if ($stmt->execute()):
            $message = 'Suscessfully add new customer';
        //header ("location: /business/selectcountry1.php)
        else: $message = 'Fail to add new customer';
        endif;
        echo $message;
    }
    ?>
</body>

</html>