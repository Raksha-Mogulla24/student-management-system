<?php
include("db.php");

// SEARCH
$search = $_GET['search'] ?? "";

$query = "SELECT * FROM students 
          WHERE name LIKE '%$search%' 
          OR email LIKE '%$search%' 
          OR course LIKE '%$search%'";

$result = mysqli_query($conn, $query);

// TOTAL COUNT
$total = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as t FROM students"));
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Management System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            background: #f4f6f9;
        }

        .sidebar {
            width: 240px;
            height: 100vh;
            background: #111827;
            color: white;
            position: fixed;
            padding: 20px;
        }

        .sidebar a {
            display: block;
            color: white;
            padding: 10px;
            text-decoration: none;
            border-radius: 6px;
        }

        .sidebar a:hover {
            background: #374151;
        }

        .main {
            margin-left: 250px;
            padding: 20px;
        }

        .card {
            border-radius: 12px;
        }
    </style>
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <h3>Student System</h3>
    <hr>

    <a href="index.php">Dashboard</a>
    <a href="#add">Add Student</a>

</div>

<!-- MAIN CONTENT -->
<div class="main">

    <h2>Dashboard</h2>

    <!-- TOTAL CARD -->
    <div class="row">
        <div class="col-md-4">
            <div class="card p-3 shadow-sm">
                <h5>Total Students</h5>
                <h2><?php echo $total['t']; ?></h2>
            </div>
        </div>
    </div>

    <br>

    <!-- ADD STUDENT -->
    <div class="card p-3" id="add">
        <h4>Add Student</h4>

        <form action="add.php" method="POST">
            <input class="form-control mb-2" type="text" name="name" placeholder="Name" required>
            <input class="form-control mb-2" type="email" name="email" placeholder="Email" required>
            <input class="form-control mb-2" type="text" name="course" placeholder="Course" required>
            <input class="form-control mb-2" type="text" name="phone" placeholder="Phone" required>

            <button class="btn btn-success">Add Student</button>
        </form>
    </div>

    <br>

    <!-- SEARCH -->
    <form method="GET">
        <input type="text" name="search" class="form-control"
               placeholder="Search student..."
               value="<?php echo $search; ?>">
    </form>

    <br>

    <!-- TABLE -->
    <div class="card p-3">

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Course</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
            <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['course'] ?></td>
                    <td><?= $row['phone'] ?></td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="edit.php?id=<?= $row['id'] ?>">Edit</a>
                        <a class="btn btn-danger btn-sm" href="delete.php?id=<?= $row['id'] ?>"
                           onclick="return confirm('Delete?')">Delete</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>

    </div>

</div>

</body>
</html>