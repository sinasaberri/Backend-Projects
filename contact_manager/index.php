<?php
include "db.php";
$result = mysqli_query($conn, "SELECT * FROM contacts");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Manager</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <div class="container">
        <h2>Add New Contact</h2>

        <form action="add.php" method="post">
            <div class="form-group">
                <label for="name">Name:</label> 
                <input type="text" name="name" id="name" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" name="phone" id="phone" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label> 
                <input type="email" name="email" id="email">
            </div>
            <button type="submit">Add Contact</button>
        </form>

        <hr>

        <h2>Contact List</h2>

        <div class="contact-list">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?= $row['name'] ?></td>
                        <td><?= $row['phone'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td>
                            <a href="delete.php?id=<?= $row['id'] ?>" class="delete-link">Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

