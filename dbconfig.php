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
if (isset($_POST['name'])) {
    $name = $_POST['name'];
}
if (isset($_POST['comment'])) {
    $comment = $_POST['comment'];}
$sql = "INSERT INTO comment_table (name, comment)
VALUES ('$name', '$comment')";

if ($conn->query($sql) === TRUE) {
  echo "<div style='font-size:large;color:darkblue'>Hurray! You comment is published.</div>";
  echo "<br>";
  echo "<br>";
  echo "<a href='https://ananditaa.github.io/MyFirstWebsite/blogpage.html' class='socbuttons'>Click here to continue back to our blog</a>";
  echo "<br>";
  echo "<br>";
  echo "Wanna see all the comments?";
  echo "<br>";
  echo "<a href='https://ananditaa.github.io/MyFirstWebsite/comments_display.php' class='socbuttons'>Click here to read all the comments.</a>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
if (empty($_POST['name'])) {
    die("Name is empty!");
}
if (empty($_POST['comment'])) {
    die("Comment is empty!");
}

$conn->close();
?>
