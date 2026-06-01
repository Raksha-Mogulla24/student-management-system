<?php

include("db.php");

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$course = $_POST['course'];
$phone = $_POST['phone'];

mysqli_query($conn,
"UPDATE students SET
name='$name',
email='$email',
course='$course',
phone='$phone'
WHERE id=$id"
);

header("Location:index.php");

?>