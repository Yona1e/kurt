<?php
require_once 'db.php';
require_once 'function.php';
$result = display_data();
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
          <div class="admin">User</div>
           <div class="line"></div>
          </div>
          <div>
          <div class="create-appointment"><a href="Index.php" class="btn btn-primary" id="create-appointment">
            <img src="calendar-icon.png"> Create Appointment
          </a></div>
            <div class="my-bookings"><a href="Appointment-user.php" class="btn btn-primary" id="my-bookings">
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

          </tr>

              <?php
            }

            ?>
          </tr>
                 
                  <tr>
                      <td colspan="12"></td>
                  </tr>
                  
              </tbody>
          </table>
      </div>
  
      <!-- Add Student Modal -->
          <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                      <button type="button" class="btn btn-primary" wire:click="submit">Submit</button>
                  </div>
              </div>
          </div>
      
  </div>
  
   
      
     
   
    
    </body>
    
      
</html>
