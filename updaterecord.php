<?php

include("connection.php");

$userid = $_POST["id"];

$dbname = $_POST["new_name"];
$dbaddress = $_POST["new_address"];
$dbemail = $_POST["new_email"];
$dbcontact = $_POST["new_contact"];

mysqli_query($connection, "UPDATE mytbl SET name='$dbname', address='$dbaddress', email='$dbemail', contact='$dbcontact' WHERE id='$id'");


echo "<script language='javascript'>alert('New record has been inserted!')</script>";
     echo "<script>window.location.href='index.php';</script>";
?>