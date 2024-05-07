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
          <div class="admin">admin</div>
          <div class="gmail">admin@gmail.com</div>
        <div class="line"></div>
        </div>
        <div class="nav-button">
          <div class="profile"><a href="Profile.html" class="btn btn-primary" id="profile">
            <img src="person-icon-removebg-preview.png"><p>Profile</p></a></div>
          <div class="create-appointment"><a href="add-schedule.html" class="btn btn-primary" id="create-appointment">
            <img src="calendar-icon.png"><p>Create Appointment</p></a></div>
          <div class="my-bookings"><a href="my-appointments.php" class="btn btn-primary" id="my-bookings">
            <img src="786352-removebg-preview.png"> <p>My Appointment</p></a></div>
        </div>
    </div>
    <form action="Update.php" method="post">
          <div class="add-schedule-box">
           <div class="date-box">
            <p>Select Date</p>
            <input type="date" id="birthdaytime" name="dateclass">
          </div>
           <div class="start-time-box">
            <p>Start Time</p>
            <input type="time" id="start-time" name="Stclass">
          </div>
           <div class="end-time-box">
            <p>End Time</p>
            <input type="time" id="end-time" name="Etclass">
          </div>
           <div class="room-box">
            <p>Room Number</p>
           <input type="text" id="room-number" name="room">
          </div>
          <div class="Name-box">
            <p>Name</p>
          <input type="text" id="Name1" name="Name1">
        </div>
        </form>
        <div class="submit-button"><input type="Submit"  name="submit"></div>
           <div class="update-button"><button>Update</button></div>
          </div>
  </body>
</html>