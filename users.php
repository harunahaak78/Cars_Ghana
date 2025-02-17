<?php 
   require "dbcon.php";

   $sql = "SELECT * FROM user ";
   $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <title>User</title>
</head>
<body>
<div class="card w-75 ms-auto me-auto mt-4">
                            <div class="card-header bg-secondary text-white">
                                User
                            </div>
                            <div class="card-body">
                                <table class="table table-hover ms-auto me-auto">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Username</th>
                                            <th>Frist Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Created_At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($result-> num_rows > 0 ): ?>
                                            <?php while ($row = $result->fetch_assoc()): ?>
                                                <tr>
                                                    <td><?= $row['id'] ?></td>
                                                    <td><?= $row['username'] ?></td>
                                                    <td><?= $row['first_name'] ?></td>
                                                    <td><?= $row['last_name'] ?></td>
                                                    <td><?= $row['email'] ?></td>
                                                    <td><?= $row['password'] ?></td>
                                                    <td><?= $row['created_at'] ?></td>
                                                    <td>
                                                        <a href="?delete=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Remove</a>
                                                    </td>
                                                </tr>
                                            <?php endwhile; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="5" class="text-center">No users found</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
    
</body>
</html>