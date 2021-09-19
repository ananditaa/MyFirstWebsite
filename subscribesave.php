<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog_db";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['Name'])) {
    $Name = $_POST['Name'];
}

if (isset($_POST['Email'])) {
    $Email = $_POST['Email'];}
$sql = "INSERT INTO subscribe_btn (Name, Email)
VALUES ('$Name', '$Email')";

if ($conn->query($sql) === TRUE) {
  echo "<div style='font-size:large;color:darkblue'>Hurray! You will now get all the latest updates about our blog</div>";
  echo "<br>";
  echo "<br>";
  echo "<a href='blogpage.html' class='socbuttons'>Click here to continue back to our blog</a>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
if (empty($_POST['Name'])) {
    die("Name is empty!");
}
if (empty($_POST['Email'])) {
    die("Email is empty!");
}

$conn->close();
?>