<?php
session_start();
require '../../config.php';

$email = $_SESSION['email'];
$attend = $_GET['attend'];
$marks = $_GET['marks'];
$id = $_GET['id'];
$id= $id - 5;
if($attend == 'absent')
{
    $marks = '-';
}

$date = $_GET['date'];
$year = $_GET['year'];
$stu_email = $_GET['email'];
$roll_no = $_GET['roll_no'];

//inserting attendance
$sql = " INSERT INTO attendance (mentor_email,student_email,attendance,marks,datee,yearr,roll_no) 
values('$email','$stu_email','$attend','$marks','$date','$year','$roll_no');";

$sqll = mysqli_query($link,$sql);

if($sqll)
{
    header("Location:attendance.php?year=$year&date=$date&val=$id");
}
else
{
    echo "error";
}

?>