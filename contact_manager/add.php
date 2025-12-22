<?php
include "db.php";

$name  = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];

$query = "INSERT INTO contacts (name, phone, email)
          VALUES ('$name', '$phone', '$email')";

mysqli_query($conn, $query);

header("Location: index.php");
