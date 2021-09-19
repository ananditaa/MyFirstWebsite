<!DOCTYPE html>
<html>
<head>
  <title>View Comments</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.container {
  border: 2px solid #ccc;
  background-color: #eee;
  border-radius: 5px;
  padding: 16px;
  margin: 16px 0
}

.container::after {
  content: "";
  clear: both;
  display: table;
}

.container img {
  float: left;
  margin-right: 20px;
  border-radius: 50%;
}

.container span {
  font-size: 20px;
  margin-right: 15px;
}

@media (max-width: 500px) {
  .container {
      text-align: center;
  }
  .container img {
      margin: auto;
      float: none;
      display: block;
  }
}
</style>
</head>
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

$sql = "SELECT name, comment FROM comment_table";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
?>
<body>
  <div class="container">
  <img src="comment_profile.png" alt="Avatar" style="width:90px">
  <p style="font-family: Comic sans-serif;font-size: 20px;color: darkblue;"><span><?php echo "Name: " . $row["name"]."<br>";?></span></p>
  <p style="font-family: Comic sans-serif;font-size: 20px;color: darkblue;"><?php echo "Comment: " . $row["comment"]."<br>";?></p>
</div>
<?php
  }
} else {
  echo "0 results";
}
$conn->close();
?>
