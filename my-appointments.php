<?php
require_once 'db.php';
require_once 'function.php';
$result = display_data();

?>
<?php
$servername = "127.0.0.1";
$username = "Zafhkiel";
$password = "Zafhkiel21";
$dbname = "filepop";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql_select = "SELECT * FROM booking WHERE id = $id";

  $result_select = $conn->query($sql_select);

    if ($result_select) {
        if ($result_select->num_rows > 0) {
            // Fetch the row data
            $row = $result_select->fetch_assoc();
        }
      }
    }
// Close connection
$conn->close();


?>

<!doctype html>
<html lang="en">
  <head>
    <title>My Appointment</title>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="my-appointments.css">
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
          <div>

            <div class="my-bookings"><a href="my-appointments.php" class="btn btn-primary" id="my-bookings">
              <img src="786352-removebg-preview.png"> My Bookings
            </a></div>
          </div>
      <div class="my-appointment-text">
        <p>My Appointment</p>
      </div>
    </div>
    <div class="containers">
      
      <div class="flex gap-2 mt-2" id="table">

      </div>
      <div class="table-responsive" id="table">
      <table class="table table-striped table-bordered" style="width: 100%">
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
                      <th scope="col" class="text-center"></th>
                      <th scope="col" class="text-center"></th>
                      <th scope="col" class="text-center"></th>
                  </tr>
              </thead>
              <tbody>
                
              <tr>
            <?php

            while($row = mysqli_fetch_assoc($result))
            {
              ?>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['Fname21'] ?></td>
            <td><?php echo $row['teach'] ?></td>
            <td><?php echo $row['dateclass'] ?></td>
            <td><?php echo $row['Stclass'] ?></td>
            <td><?php echo $row['number21'] ?></td>
            <td><?php echo $row['Email'] ?></td>
            <td><?php echo $row['Consultation'] ?></td>
            <td><a href="Admin21.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a></td>
            <td><a href='deleted.php?id=<?php echo $row['id']; ?>' name = "delete" onclick="return confirm('Are you sure you want to delete this appointment?');" class="btn btn-danger">Delete</a></td>
            <td><a href='mail.php?id=<?php echo $row['id']; ?>' name="Email" class="btn btn-primary">Email</a></td>

          </tr>

              <?php
            }

            ?>
          </tr>

  </div>
      
    </body>
    
      
</html>
