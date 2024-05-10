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
<?php

function getBookingData($id) {
    require_once 'db.php'; // Assuming 'db.php' contains connection details
    require_once 'function.php';

    try {
      $conn = new PDO("mysql:host=" . "127.0.0.1" . ";dbname=" . "filepop", "Zafhkiel", "Zafhkiel21");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Set error reporting mode

        $sql_select = "SELECT * FROM booking WHERE id = :id";
        $stmt = $conn->prepare($sql_select);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row; // Return the retrieved booking data as an array
        } else {
            return null; // Return null if no booking found
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage(); // Handle connection or query errors
        return null; // Indicate error (optional)
    } finally {
        // Close connection (if no errors occurred)
        if (isset($conn)) {
            $conn = null;
        }
    }
}

?>
<!doctype html>
<html lang="en">
  <head>
    <title>Add Schedule</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Index.css">
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
  <div class="containers">
      
      <div class="flex gap-2 mt-2" id="table">

      </div>
     
     
      <div class="table-responsive" id="table">
          <table class="table table-striped table-bordered">
              <thead class="text-uppercase bg-gray-50 text-gray-700">
                  <tr>
                      <th scope="col">Id</th>
                      <th scope="col">Appointee</th>
                      <th scope="col">Appointment With</th>
                      <th scope="col">Date</th>
                      <th scope="col">Time</th>
                      <th scope="col">Contact Number</th>
                      <th scope="col">Email</th>
                      <th scope="col">Type of Appointment</th>
                  </tr>
              </thead>
              <tbody>
                
              <tr>
            <?php
$id = (isset($_GET['id'])) ? $_GET['id'] : null;

$bookingData = getBookingData($id);

if ($bookingData) {
              ?>
            <td><?php echo $bookingData['id'] ?></td>
            <td><?php echo $bookingData['Fname21'] ?></td>
            <td><?php echo $bookingData['teach'] ?></td>
            <td><?php echo $bookingData['dateclass'] ?></td>
            <td><?php echo $bookingData['Stclass'] ?></td>
            <td><?php echo $bookingData['number21'] ?></td>
            <td><?php echo $bookingData['Email'] ?></td>
            <td><?php echo $bookingData['Consultation'] ?></td>
          </tr>

              <?php
            }

            ?>
          </tr>

  </div>
     </div>
</html>
