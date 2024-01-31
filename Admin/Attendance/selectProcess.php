<?php
$date = $_GET['date'];
$year = $_GET['year'];

header("Location:attendance.php?date=$date&year=$year");

?>