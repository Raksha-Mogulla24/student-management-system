<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "Raksha@2006",
    "student_db"
);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>