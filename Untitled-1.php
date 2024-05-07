<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit and Delete Table Row</title>
</head>
<body>
    <?php
    // Database connection
    $db = mysqli_connect("localhost", "username", "password", "database");

    // Check if a row is being edited or deleted
    if (isset($_GET['edit_id'])) {
        $edit_id = $_GET['edit_id'];
        $query = "SELECT * FROM your_table WHERE id=$edit_id";
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_assoc($result);
    }

    if (isset($_GET['delete_id'])) {
        $delete_id = $_GET['delete_id'];
        $query = "DELETE FROM your_table WHERE id=$delete_id";
        mysqli_query($db, $query);
        header("Location: {$_SERVER['PHP_SELF']}");
        exit();
    }

    // Fetch data from the database
    $query = "SELECT * FROM your_table";
    $result = mysqli_query($db, $query);
    ?>

    <h2>Edit and Delete Table Row</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td>
                    <a href="?edit_id=<?php echo $row['id']; ?>">Edit</a>
                    <a href="?delete_id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this record?')">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <!-- Form for editing or adding a row -->
    <h2><?php echo isset($edit_id) ? 'Edit Row' : 'Add Row'; ?></h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <input type="hidden" name="edit_id" value="<?php echo isset($edit_id) ? $edit_id : ''; ?>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo isset($row['name']) ? $row['name'] : ''; ?>">
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" value="<?php echo isset($row['email']) ? $row['email'] : ''; ?>">
        <button type="submit"><?php echo isset($edit_id) ? 'Save Changes' : 'Add'; ?></button>
    </form>

    <?php
    // Handle form submission for adding or editing a row
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $email = $_POST['email'];

        if (isset($_POST['edit_id'])) {
            $edit_id = $_POST['edit_id'];
            $query = "UPDATE your_table SET name='$name', email='$email' WHERE id=$edit_id";
        } else {
            $query = "INSERT INTO your_table (name, email) VALUES ('$name', '$email')";
        }

        mysqli_query($db, $query);
        header("Location: {$_SERVER['PHP_SELF']}");
        exit();
    }

    // Close database connection
    mysqli_close($db);
    ?>
</body>
</html>
