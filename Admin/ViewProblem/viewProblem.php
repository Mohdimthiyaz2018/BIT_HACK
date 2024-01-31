<?php
session_start();
require '../../config.php';

if(!isset($_SESSION['admin_login_id'])){
    header('Location: ../../admin_login.php');
    exit;
}

$code = $_GET['code'];
$domain = $_GET['domain'];
$title = $_GET['title'];
$title =  str_replace("_"," ",$title);
$desc = $_GET['desc'];
$desc =  str_replace("_"," ",$desc);
$intern = $_GET['intern'];

$intern =  str_replace("_"," ",$intern);
$intern_id = $_GET['intern_id'];

$sql = " SELECT * FROM $domain WHERE PROBLEM_CODE = '$code' ";
$sqll = mysqli_query($link,$sql);
if($sqll){
    $row = $sqll->fetch_assoc();
    $count = $row['COUNTT'];
}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="HTML, CSS, JavaScript" />
    <meta name="author" content="Shrithik" />
    <link rel="stylesheet" href="viewProblems.css" />
    <link rel="icon" type="image/x-icon" href="../.././Asserts./Images/logo.png" >
    <link rel="stylesheet" href="../../footer.css">
    <title>BIT HACK | ADMIN</title>
  </head>
  <body>
    <div class="header">
        <div>
            <img class="Logo" src="../../Asserts/Images/bitFullLogo.webp" alt="BIT Full Logo">
        </div>
        <div class="navBar">
            <a href="../Home/home.php" class="active">HOME</a>
            <a href="../Category/category.php" >PROBLEM-STATEMENTS</a>
            <?php if(isset($_SESSION['mteam'])) { ?> <a href="../Interns/interns.php" >INTERNS</a> <?php } else {  ?>
            <a href="../Attendance/attendance.php" >ATTENDANCE</a><?php } ?>
            <a href="../Logout/logout.php" style="color: white;" class="login">LOG OUT</a>
        </div>
        <div class="navMenu">
            <img src="../../Asserts/Images/menuIcon.png" alt="Menu" width="30px" onclick="dispMenu()">
            <div class="navList" id="navList">
                <div>
                    <img src="../../Asserts/Images/closeIcon.png" alt="Close" width="30px" onclick="closeMenu()">
                </div>
                <div>
                    <a href="../Home/home.php" >HOME</a>
                </div>
                <div>
                    <a href="../Category/category.php" class="active" >PROBLEM-STATEMENTS</a>
                </div>
                <?php if(isset($_SESSION['mteam'])) { ?>
                <div>
                    <a href="../Interns/interns.php" >INTERNS</a>
                </div>
                <?php } else {  ?>
                <div>
                    <a href="../Attendance/attendance.php" >ATTENDANCE</a>
                </div>
                <?php } ?>
                <div>
                    <a href="../Logout/logout.php" style="color: white;" class="login">LOG OUT</a>
                </div>
            </div>
        </div>
    </div>
    <!-- HEAD END -->
    <div class="body">
        <div class="box">
            <div class="title"><?php echo $title?></div>
            <div class="session">
                <div class = "f20"><strong>Problem Code:</strong> &nbsp&nbsp&nbsp <?php echo $code?> </div>
                <div class = "f20"><strong>Mentor Name:</strong> &nbsp&nbsp&nbsp <?php echo $intern?></div>
                <div class = "f20"><strong>Mentor E-Mail:</strong> &nbsp&nbsp&nbsp <?php echo $intern_id?></div>
            </div>
            <div class="obj">
                <div class="f20 blue"><strong>Objective:</strong></div>
                <br>
                <div class="f20"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <?php echo $desc?></div>
                <div class="count">REGISTERED : <span style="color: black; font-weight: bold;"><?php echo $count ?> / 3</span></div>
            <div class="buttons">
                <div>
                    <button class="back" onclick="history.back()">GO BACK</button>
                </div>
                <form method="GET" id="viewStudent" action="../ViewStudent/viewStudent.php">
                <input type="hidden" name="code" value = <?php echo $code ?> >
                    <div id="fReg">
                        <button <?php if($count == 0) { ?> style="pointer-events: none; background-color: grey; border: 1px solid grey;" <?php } ?> class="register" form="viewStudent">REVIEW STUDENTS</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <footer>
       <div class="footerContainer">
            <div class="footerTitle">
                <h1>BIT HACK</h1>
            </div>
            <div class="footerNav">
                <ul>
                    <li><a href="../Home/home.php">HOME</a></li>
                    <li><a href="../Category/category.php">PROBLEM STATEMENT</a></li>
                </ul>
            </div>
        </div>
        <div class="footerBottom">
            <span class="copyRight">Copyright © 2023 &nbsp - &nbsp </span><a class="copyRight" target="_blank" href="https://www.instagram.com/mohamedimthiyaz_/">MOHAMED IMTHIYAZ A</a><span class="copyRight"> &nbsp & &nbsp </span><a class="copyRight" href="">SHRITHIK A </a> 
        </div>
    </footer>

  </body>
  <script>
    function register() {
      document.getElementById("fReg").style.display = "none";
      document.getElementById("rReg").style.display = "block";
    }
    function dispMenu(){
        document.getElementById("navList").style.display="grid";
        document.getElementById("proBar").style.display="none";
    }
    function closeMenu(){
        document.getElementById("navList").style.display="none";
        document.getElementById("proBar").style.display="flex";
    }

  </script>
</html>
