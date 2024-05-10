<?php
//what
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'C:\xampp\htdocs\kurt\php email\PHPMailer-master\src\Exception.php';
require 'php email/PHPMailer-master/src/PHPMailer.php';
require 'C:\xampp\htdocs\kurt\php email\PHPMailer-master\src\SMTP.php';

if(isset($_POST["send"])){

  $mail = new PHPMailer(true);

  $mail->SMTPDebug=3; // Enable debug logging (optional)

  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPAuth = true;
  $mail->Username = 'mr.aidenashleysayson@gmail.com';  // Replace with your actual email
  $mail->Password = 'yxdouyodpzzlzdnh'; // Replace with your actual password (use environment variables or config file)
  $mail->SMTPSecure = 'tls';
  $mail->Port = 587;

  $mail->Setfrom('mr.aidenashleysayson@gmail.com');

  $mail->addAddress($_POST["email"]);

  $mail->isHTML(true);

  $mail->Subject = $_POST["subject"];
  $mail->Body = $_POST["message"];

  if (!$mail->send()) {
    echo "Error: " . $mail->ErrorInfo;
  } else {
    echo "<script>alert('Sent Successfully');
    document.location.href = 'my-appointments.php';
    </script>";
  }

}

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
    <form action="mail.php" method="post" class="mailform">
          
          <div class="add-schedule-box">
           <div class="date-box">
            <p>Email</p>
            <input type="email" id="birthdaytime" name="email" value="">
          </div>
          <div class="date-box">
            <p>Subject</p>
            <input type="text" id="birthdaytime" name="subject" value="">
          </div>
           <div class="start-time-box">
            <p>Message</p>
<textarea name="message"id="end-time" rows="10" cols="30" ></textarea>
</div>
          <div class="submit-button"><input type="Submit"  name="send"></div>
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
// Assuming 'id' is retrieved from URL (adjust as needed)
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
</html>
