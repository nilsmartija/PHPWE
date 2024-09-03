<?php
$name = $address = $email = $contact = "";
$nameErr = $addressErr = $emailErr = $contactErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Name is required!";
    } else {
        $name = $_POST["name"];
    }

    if (empty($_POST["address"])) {
        $addressErr = "Address is required!";
    } else {
        $address = $_POST["address"];
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required!";
    } else {
        $email = $_POST["email"];
        // Add email format validation here
    }

    if (empty($_POST["contact"])) {
        $contactErr = "Contact is required!";
    } else {
        $contact = $_POST["contact"];
    }
}
?>

<style>
    .error {
        color: red;
    }
</style>

<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

    <input type="text" name="name" value="<?php echo $name; ?>"> <br>
    <span class="error"><?php echo $nameErr; ?></span> <br>

    <input type="text" name="address" value="<?php echo $address; ?>"> <br>
    <span class="error"><?php echo $addressErr; ?></span> <br>

    <input type="text" name="email" value="<?php echo $email; ?>"> <br>
    <span class="error"><?php echo $emailErr; ?></span> <br>


    <input type="text" name="contact" value="<?php echo $contact; ?>"> <br>
    <span class="error"><?php echo $contactErr; ?></span> <br>

    <input type="submit" value="Submit"> <br>

</form>

<hr>

<?php
include("connection.php") ;
if ($name && $address && $email && $contact) {
    $query = mysqli_query($connection, "INSERT INTO mytbl (name, address, email, contact) VALUES ('$name', '$address', '$email', '$contact')");
     echo "<script language='javascript'>alert('New record has been inserted!')</script>";
     echo "<script>window.location.href='index.php';</script>";

}

$view_query = mysqli_query ($connection, "SELECT * FROM mytbl");

echo "<table border='1' width='50%'>";
echo "<tr>
            <td>Name</td>
            <td>Address</td>
            <td>Email</td>
            <td>Contact</td>

            <td>Option</td>

            </tr>";

while($row = mysqli_fetch_assoc($view_query)) {

    $userid = $row["id"];

    $name = $row["name"];
    $address = $row["address"];
    $email = $row["email"];
    $contact = $row["contact"];

    echo "<tr>
            <td>$name</td>
            <td>$address</td>
            <td>$email </td>
            <td>$contact </td>

            <td>
            <a  href='Edit.php? id=$userid'> Update </a>
             &nbsp;
             <a  href='ConfirmDelete.php? id=$userid'> Delete </a>
            </td>

            </tr>";

}
    "</table>";
?>
