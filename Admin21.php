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
                $newDateValue = $_POST['dateclass'];
                $newValue = $_POST['Stclass'];
                $sql_update = "UPDATE booking SET dateclass = '$newDateValue', Stclass = '$newValue' WHERE id = $id";

                // Execute the update query
                if ($conn->query($sql_update) === TRUE) {
                    header("Location: my-appointments.php");
        exit();
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

<!doctype html>
<html lang="en">
  <head>
    <title>Add Schedule</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="add-schedules .css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
   <body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <div class="main-content">
      <div class="logo">
          <img src="widget icon.png" alt=" ">
          <div class="admin">admin</div>
        <div class="line"></div>
        </div>
    </div>
    <form method="post">
          
          <div class="add-schedule-box">
           <div class="date-box">
            <p>Select Date</p>
            <input type="date" id="birthdaytime" name="dateclass">
          </div>
           <div class="start-time-box">
            <p>Time</p>
            <input type="time" id="start-time" name="Stclass">
          </div>
          <div class="room-box">

          <div  class="submit-button"><input type="Submit"  name="submit"></div>
        </form>
  </body>
  
</html>