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
    $number21 = $_POST['number21'];

    $sql = "INSERT INTO booking (id, Fname21, number21, Email, teach) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("sssss",$id, $Fname21, $number21, $Email, $teach);
        if ($stmt->execute()) {
            echo '<script>
            window.location.href = "profile.html";
            alert("Data inserted successfully")
            </script>';
        }
    }

        $stmt->close();
}

// Close connection
$conn->close();


?>