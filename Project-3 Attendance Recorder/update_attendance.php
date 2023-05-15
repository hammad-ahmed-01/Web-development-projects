<?php

include("db.php");
include("teacher.php");

$classid = $_POST["ClassID"];
$studentid = $_POST["StudentID"];
$attendance = $_POST["Attendance"];
$comments = $_POST["comments"];

echo "<br>";

try {
  $conn = new PDO("mysql:host=$hostname;dbname=$databasename", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "INSERT INTO attendance (classid, studentid, isPresent, comments)
  VALUES ('$classid', '$studentid', '$attendance', '$comments')";

  // Prepare statement
  $stmt = $conn->prepare($sql);

  // execute the query
  $stmt->execute();
} 

catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

header('Location: teacher.php');

$conn = null;

?>