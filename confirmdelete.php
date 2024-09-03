<?php
$userid = $_REQUEST["id"];

include("connection.php");

$query_delete = mysqli_query($connection, "SELECT * FROM mytbl WHERE id = '$userid' ");
 while($row_delete = mysqli_fetch_assoc($query_delete) ) {
      
    $id = $row_delete["id"];

    $dbname = $row_delete["name"];
    $dbaddress = $row_delete["address"];
    $dbemail = $row_delete["email"];
    $dbcontact = $row_delete["contact"];
 }

 echo "<h1> Are you sure you want to delete?</h1>";
?>
<form method="POST" action="Delete_Now.php">

<input type="hidden" name="id" value="<?php echo $userid; ?>">

<Br>
<Br>

<input type="submit" value="Yes"> &nbsp; <a href='index,php'>No</a>


</form>