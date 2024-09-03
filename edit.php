<?php
$userid = $_REQUEST["id"];

// Include the database connection
include("connection.php");

// Use a prepared statement to prevent SQL injection
$stmt = $connection->prepare ("SELECT * FROM mytbl WHERE id=?");
$stmt->bind_param("s", $userid);
$stmt->execute();
$result = $stmt->get_result();

if ($row_edit = $result->fetch_assoc()) {
    $dbname = $row_edit["name"];
    $dbaddress = $row_edit["address"];
    $dbemail_address = $row_edit["email"];
    $dbcontact = $row_edit["contact"];
}
?>

<form method="POST" action="updaterecord.php">
    <input type="hidden" name="id" value="<?php echo $userid; ?>">
    <input type="text" name="new_name" value="<?php echo $dbname; ?>">
    <br>
    <input type="text" name="new_name" value="<?php echo $dbname; ?>">
    <br>
    <input type="text" name="new_address" value="<?php echo $dbaddress; ?>">
    <br>
    <input type="text" name="new_email" value="<?php echo $dbemail_address; ?>">
    <br>
    <input type="text" name="new_contact" value="<?php echo $dbcontact; ?>">
    <br>
    <input type="submit" value="Update">
</form>
