<?php
require '../../config.php';

if(!isset($_SESSION['login_id'])){
    header('Location: ../Login/login.php');
    exit;
}

$id = $_SESSION['login_id'];

$get_user = mysqli_query($db_connection, "SELECT * FROM `users` WHERE `google_id`='$id'");

if(mysqli_num_rows($get_user) > 0){
    $user = mysqli_fetch_assoc($get_user);
}
else{
    header('Location: ../../logout.php');
    exit;
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
    <title>SkillsBIT</title>
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
        <a href="../Domain/domain.php">PROBLEM-STATEMENTS</a>
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
                    <a href="../Domain/domain.php" >PROBLEM-STATEMENTS</a>
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
    <div class="proBar" id="proBar">
        <div>
            <img src="<?php echo $user['profile_image']; ?>" alt="<?php echo $user['name']; ?>" class="proPic">
        </div>
        <div class="name">
            <?php echo $user['name']; ?>
        </div>
    </div>
    <!-- HEAD END -->
    <div class="body">
        <div class="box">
            <div class="title">TITLE</div>
            <div class="session">
                <div class = "f20"><strong>Problem Code:</strong> &nbsp&nbsp&nbsp 1 </div>
                <div class = "f20"><strong>Mentor Name:</strong> &nbsp&nbsp&nbsp Shrithik</div>
                <div class = "f20"><strong>Mentor E-Mail:</strong> &nbsp&nbsp&nbsp s@mail.com</div>
            </div>
            <div class="obj">
                <div class="f20 blue"><strong>Objective:</strong></div>
                <br>
                <div class="f20"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp objective objective objective objective objective objective objective objective objective objective objective objective objective objective objective objective objective objective objective objective objective objective objective objective objective objective objective objective objective objective objective objective objective objective objective objective objective objective objective objective objective objective objective objective objective objective objective objective objective objective objective objective objective objective objective objective objective objective objective objective </div>
            </div>
            <div class="buttons">
                <div>
                    <button class="back" onclick="history.back()">GO BACK</button>
                </div>
                <div id="fReg">
                    <button class="register" onclick="register()">REGISTER</button>
                </div>
            </div>
            <div class="rForm" id="rReg">
              <form action="#">
                <center>
                  <span>Abstract drive link : </span>
                  <form action="#" id="register">
                    <input id="focus" type="text" required/>
                  </form>
                  <div class="note">**Note: Abstract must be uploaded in drive and link should be shared here with the permissions.</div>
                  <button class="register" form="register" type="submit">REGISTER</button>
                </center>
              </form>
            </div>
        </div>
    </div>
  </body>
  <script>
    function register() {
      document.getElementById("fReg").style.display = "none";
      document.getElementById("rReg").style.display = "block";
      document.getElementById("focus").focus();
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
