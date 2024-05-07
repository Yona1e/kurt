<?php
$servername = "127.0.0.1";
$username = "Zafhkiel";
$password = "Zafhkiel21";
$dbname = "filepop";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Retrieve existing values
    $sql_select = "SELECT * FROM booking WHERE id = $id";
    $result_select = $conn->query($sql_select);

    if ($result_select) {
        if ($result_select->num_rows > 0) {
            // Fetch the row data
            $row = $result_select->fetch_assoc();

            // Check if the form is submitted
            if (isset($_POST['submit'])) {
                // Update the value if needed
                $newValue = $_POST['new_value'];
                $sql_update = "UPDATE booking SET dateclass = '$newValue' WHERE id = $id";

                // Execute the update query
                if ($conn->query($sql_update) === TRUE) {
                    echo "Record updated successfully";
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            }

            // Display the form
        
        } else {
            echo "No records found for ID: $id";
        }
    } else {
        echo "Error retrieving record: " . $conn->error;
    }
} else {
    echo "ID parameter is missing in the URL";
}

$conn->close();
?>
