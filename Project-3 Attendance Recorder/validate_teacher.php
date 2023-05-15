<?php
session_start();
include 'db.php';
include 'index.php';
if(isset($_POST['submit']))
{
    $TeacherId = $_POST['teacherId'];
    $sql=mysqli_query($conn,"SELECT * FROM user where id='$TeacherId' and role='teacher'");
    $row  = mysqli_fetch_array($sql);
    if(is_array($row))
    {
        $_SESSION["ID"] = $row['id'];
        header("Location: teacher.php");
        exit();
    }
    else
    {
        echo '<script>alert("Invalid ID")</script>';
    }
}
?>