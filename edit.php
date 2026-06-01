<?php
include("db.php");

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM students WHERE id=$id");
$row = mysqli_fetch_assoc($result);
?>

<h2>Edit Student</h2>

<form action="update.php" method="POST">

    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

    <input type="text" name="name" value="<?php echo $row['name']; ?>" required>
    <br><br>

    <input type="email" name="email" value="<?php echo $row['email']; ?>" required>
    <br><br>

    <input type="text" name="course" value="<?php echo $row['course']; ?>" required>
    <br><br>

    <input type="text" name="phone" value="<?php echo $row['phone']; ?>" required>
    <br><br>

    <button type="submit">Update</button>

</form>