<?php
session_start();
require '../../config.php';

if(!isset($_SESSION['login_id'])){
  header('Location: ../../index.php');
  exit;
}

$str = null;
if(isset($_POST['category']))
{
  $str = $_POST['category'];
  $_SESSION['category'] = $str;
}
else {
  $str = $_SESSION['category'];
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="author" content="Shrithik">
    <link rel="stylesheet" href="domain.css">
    <link rel="icon" type="image/x-icon" href="../.././Asserts/Images/logo.png" >
    <link rel="stylesheet" href="../../footer.css">
    <title>BIT HACK</title>
</head>
<body>
    <div class="header">
        <div>
            <img class="Logo" src="../../Asserts/Images/bitFullLogo.webp" alt="BIT Full Logo">
        </div>
        <div class="navBar">
                <a href="../Home/home.php" >HOME</a>
                <a href="#about" >ABOUT</a>
                <a href="../Category/category.php" class="active">PROBLEM-STATEMENTS</a>
                <a href="../Profile/profile.php" >PROFILE</a>
                <a href="../../logout.php" class="login">LOG OUT</a>
        </div>
        <div class="navMenu">
            <img src="../../Asserts/Images/menuIcon.png" alt="Menu" width="30px" onclick="dispMenu()">
            <div class="navList" id="navList">
                <div>
                    <img src="../../Asserts/Images/closeIcon.png" alt="Close" width="30px" onclick="closeMenu()">
                </div>
                <div>
                    <a href="../Home/home.php">HOME</a>
                </div>
                <div>
                    <a href="#about" >ABOUT</a>
                </div>
                <div>
                    <a href="../Category/category.php" class="active">PROBLEM-STATEMENTS</a>
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
    <?php if($str === 'SOFTWARE') { ?>
    <div class="body">
      <div class="title">CHOOSE DOMAIN</div>
      <div class="cards" id="cards">
      <div class="card">
          <form class="cardForm" method="POST" action=".././ProblemStatement/problemStatement.php">
            <div class="cardHead"><input name="domain" class="insub" type="submit" value="FULL STACK"></div>
          </form>
          </div>
              
          <div class="card">          
          <form class="cardForm" method="POST" action=".././ProblemStatement/problemStatement.php">
            <div class="cardHead"><input name="domain" class="insub" type="submit" value="CLOUD"></div>
          </form>
          </div>
               
          <div class="card">   
            <form class="cardForm" method="POST" action=".././ProblemStatement/problemStatement.php">
              <div class="cardHead"><input name="domain" class="insub" type="submit" value="WEB DEVELOPMENT"></div>
            </form>
          </div>
               
          <div class="card">           
            <form class="cardForm" method="POST" action=".././ProblemStatement/problemStatement.php">
              <div class="cardHead"><input name="domain" class="insub" type="submit" value="BLOCKCHAIN"></div>
            </form> 
          </div>
        
          <div class="card">          
            <form class="cardForm" method="POST" action=".././ProblemStatement/problemStatement.php">
              <div class="cardHead"><input name="domain" class="insub" type="submit" value="NLP"></div>
            </form> 
          </div>
        
          <div class="card">            
            <form class="cardForm" method="POST" action=".././ProblemStatement/problemStatement.php">
              <div class="cardHead"><input name="domain" class="insub" type="submit" value="QT"></div>
            </form>
          </div>
        
          <div class="card">            
            <form class="cardForm" method="POST" action=".././ProblemStatement/problemStatement.php">
              <div class="cardHead"><input name="domain" class="insub" type="submit" value="ML DL"></div>
            </form>
          </div>
        
          <div class="card">           
            <form class="cardForm" method="POST" action=".././ProblemStatement/problemStatement.php">
              <div class="cardHead"><input name="domain" class="insub" type="submit" value="AR/VR"></div>
            </form>
          </div>
        
          <div class="card">            
            <form class="cardForm" method="POST" action=".././ProblemStatement/problemStatement.php">
              <div class="cardHead"><input name="domain" class="insub" type="submit" value="CYBER SECURITY"></div>
            </form>
          </div>
      </div>

      <?php }else { ?>
        <div class="body">
      <div class="title">CHOOSE DOMAIN</div>
      <div class="cards" id="cards">
      <div class="card">
          <form class="cardForm" method="POST" action=".././ProblemStatement/problemStatement.php">
            <div class="cardHead"><input name="domain" class="insub" type="submit" value="AUTOMATION"></div>
          </form>
          </div>
              
          <div class="card">          
          <form class="cardForm" method="POST" action=".././ProblemStatement/problemStatement.php">
            <div class="cardHead"><input name="domain" class="insub" type="submit" value="IOT"></div>
          </form>
          </div>
               
          <div class="card">   
            <form class="cardForm" method="POST" action=".././ProblemStatement/problemStatement.php">
              <div class="cardHead"><input name="domain" class="insub" type="submit" value="ELECTRONICS"></div>
            </form>
          </div>
               
          <div class="card">           
            <form class="cardForm" method="POST" action=".././ProblemStatement/problemStatement.php">
              <div class="cardHead"><input name="domain" class="insub" type="submit" value="MECHANICAL"></div>
            </form> 
          </div>
        
          <div class="card">          
            <form class="cardForm" method="POST" action=".././ProblemStatement/problemStatement.php">
              <div class="cardHead"><input name="domain" class="insub" type="submit" value="FASHION TECH"></div>
            </form> 
          </div>
        
          <div class="card">            
            <form class="cardForm" method="POST" action=".././ProblemStatement/problemStatement.php">
              <div class="cardHead"><input name="domain" class="insub" type="submit" value="FOOD TECH"></div>
            </form>
          </div>
        
          <div class="card">            
            <form class="cardForm" method="POST" action=".././ProblemStatement/problemStatement.php">
              <div class="cardHead"><input name="domain" class="insub" type="submit" value="BIO TECH"></div>
            </form>
          </div>
      </div>
      <?php } ?>

      <footer>
        <div class="footerContainer">
            <div class="footerTitle">
                <h1>BIT HACK</h1>
            </div>
            <div id="footerNav" class="footerNav" >
                <ul>
                    <li ><a href=".././Home/home.php">HOME</a></li>
                    <li><a href="../Category/category.php">PROBLEM STATEMENT</a></li>
                    <li><a href=".././Home/home.php#about">ABOUT</a></li>
                    <li><a href=".././Profile/profile.php">PROFILE</a></li>
                </ul>
            </div>
        </div>
        <div class="footerBottom">  
          <span class="copyRight">Copyright © 2023 &nbsp - &nbsp </span><a class="copyRight" target="_blank" href="https://www.instagram.com/mohamedimthiyaz_/">MOHAMED IMTHIYAZ A</a><span class="copyRight"> &nbsp & &nbsp </span><a class="copyRight" href="">SHRITHIK A </a> 
        </div>
    </footer>
    
</body>


<script>
    function dispMenu(){
        document.getElementById("navList").style.display="grid";
        document.getElementById("footerNav").style.display="none";
        
    }
    function closeMenu(){
        document.getElementById("navList").style.display="none";
        document.getElementById("footerNav").style.display="initial";
    }

    if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
</html>