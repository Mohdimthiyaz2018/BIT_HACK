<?php
session_start();
require '../../config.php';

if(!isset($_SESSION['login_id'])){
  header('Location: ../../index.php');
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
    <link rel="stylesheet" href="viewProblem.css" />
    <link rel="icon" type="image/x-icon" href="../.././Asserts/Images/logo.png" >
    <link rel="stylesheet" href="../../footer.css">
    <title>BIT HACK</title>
  </head>
  <body>
    <div class="header">
      <div>
        <img
          class="Logo"
          src="../../Asserts/Images/bitFullLogo.webp"
          alt="BIT Full Logo"
        />
      </div>
      <div class="navBar">
        <a href="../Home/home.php">HOME</a>
        <a href="#">ABOUT</a>
        <a href="../Category/category.php">PROBLEM-STATEMENTS</a>
        <a href="../Profile/profile.php">PROFILE</a>
        <a href="../../logout.php" class="login">LOG OUT</a>
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
                    <a href="#about" >ABOUT</a>
                </div>
                <div>
                    <a href="../Category/category.php" >PROBLEM-STATEMENTS</a>
                </div>
                <div>
                    <a href="../Profile/profile.php" >PROFILE</a>
                </div>
                <div>
                    <a href="../../logout.php" class="login">LOG OUT</a>
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
                <div id="fReg">
                    <button <?php if($count >= 3) {?> disabled="true" style="background-color:grey; border:none;" <?php }?> class="register" onclick="register()">REGISTER</button>
                </div>
            </div>
            <div class="rForm" id="rReg">
              
                <center>
                  
                  <form action="processRegister.php" method="POST" id="register">
                    <input type="hidden" name="code" value="<?php echo $code?>">
                    <input type="hidden" name="intern" value="<?php echo $_GET['intern']?>">
                    <input type="hidden" name="intern_id" value = <?php echo $intern_id ?> >
                    <input type="hidden" name="domain" value = <?php echo $domain ?> >
                  </form>
                  <div class="note">**Are you sure to regsiter and this can't be changed later!**</div>
                  <button class="register" form="register" type="submit">REGISTER</button>
                </center>
              
            </div>
        </div>
    </div>

     <footer>
       <div class="footerContainer" >
            <div class="footerTitle">
                <h1>BIT HACK</h1>
            </div>
            <div id="footerNav" class="footerNav"  >
                <ul>
                    <li><a href=".././Home/home.php">HOME</a></li>
                    <li><a href="../Category/category.php">PROBLEM STATEMENT</a></li>
                    <li><a href=".././Home/home.php#about">ABOUT</a></li>
                    <li><a href=".././Profile/profile.php">PROFILE</a></li>
                </ul>
            </div>
        </div>
        <div class="footerBottom">
            <span class="copyRight">Copyright  © 2023   &nbsp&nbsp&nbsp -  &nbsp&nbsp&nbsp </span><a class="copyRight" target="_blank" href="https://www.linkedin.com/in/mohamed-imthiyaz-1600qaqw?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app">MOHAMED IMTHIYAZ A</a><span class="copyRight"> &nbsp & &nbsp </span><a class="copyRight" href="">SHRITHIK A</a>
        </div>
    </footer>

  </body>
  <script>
    function register() {
      document.getElementById("fReg").style.display = "none";
      document.getElementById("rReg").style.display = "block";
      document.getElementById("focus").focus();
    }
    function dispMenu(){
        document.getElementById("navList").style.display="grid";
        document.getElementById("footerNav").style.display="none";
        
    }
    function closeMenu(){
        document.getElementById("navList").style.display="none";
        document.getElementById("footerNav").style.display="initial";
    }

  </script>
</html>
