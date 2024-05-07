<?php
$servername = "127.0.0.1";
$username = "Zafhkiel";
$password = "Zafhkiel21";
$dbname = "filepop";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the ID parameter is present in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (isset($_POST['btn btn-danger'])) {
    // SQL to delete a record based on the provided ID
    $sql_delete = "DELETE FROM booking WHERE id = $id";

    // Execute the delete query
    if ($conn->query($sql_delete) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "ID parameter is missing in the URL";
}
}
// Close the database connection
$conn->close();
?>