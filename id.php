<?php 
include "db.php"; // Assuming this file contains database connection information and establishes $conn

$sql = "SELECT * FROM booking";
$result = $conn->query($sql);

$records = array();

if ($result === false) {
    // Check for errors in the query execution
    echo "Error: " . $conn->error;
} else {
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $records[] = $row;
        }
    } else {
        echo "No records found";
    }
}

// Close the connection if you're done using it
$conn->close();
?>
