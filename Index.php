<?php
$servername = "127.0.0.1";
$username = "Zafhkiel";
$password = "Zafhkiel21";
$dbname = "filepop";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
  $Fname21 = $_POST['Fname21'];
  $number21 = $_POST['number21'];
  $Email = $_POST['Email'];
  $teach = $_POST['teach'];
  $Consultation = $_POST['Consultation'];
  $sql = "INSERT INTO booking (id, Fname21, number21, Email, teach, Consultation) VALUES (?, ?, ?, ?, ?, ?)";
  $stmt = $conn->prepare($sql);

  if ($stmt) {
      $stmt->bind_param("ssssss",$id, $Fname21, $number21, $Email, $teach, $Consultation);
        if ($stmt->execute()) {
          header("Location: Index.php");
          exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }
}

// Close connection
$conn->close();


?>
<!doctype html>
<html lang="en">
  <head>
    <title>Add Schedule</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="add-schedule.css">
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
          <div class="admin">User</div>
        <div class="line"></div>
        </div>
        <div>
          <div class="create-appointment"><a href="Index.php" class="btn btn-primary" id="create-appointment">
            <img src="calendar-icon.png"> Create Appointment
          </a></div>
        </div>
    </div>
    <form method="post">
          
          <div class="add-schedule-box">
           <div class="date-box">
            <p>Name</p>
            <input type="text" id="birthdaytime" name="Fname21">
          </div>
          <div class="date-box">
            <p>Teacher</p>
            <input type="text" id="birthdaytime" name="teach">
          </div>
           <div class="start-time-box">
            <p>Contact</p>
            <input type="int" id="start-time" name="number21">
          </div>
           <div class="end-time-box">
            <p>Email</p>
            <input type="text" id="end-time" name="Email">
          </div>
          <div class="end-time-box">
            <p>Reason</p>
            <input type="text" id="end-time" name="Consultation" >
          </div>
          </div>
          <div class="submit-button"><input type="Submit"  name="submit"></div>
        </form>
  </body>
  
</html>