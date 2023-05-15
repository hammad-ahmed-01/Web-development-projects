<?php
session_start();
include 'db.php';
include 'index.php';
if(isset($_POST['submit']))
{
    $StudentId = $_POST['studentId'];
    $sql = mysqli_query($conn,"SELECT * FROM user where id='$StudentId' and role='student'");
    $row  = mysqli_fetch_array($sql);
    if(is_array($row))
    {
        $_SESSION["ID"] = $row['id'];
        header("Location: student.php");
        exit();
    }
    else
    {
        echo '<script>alert("Invalid ID")</script>';
    }
}
?>