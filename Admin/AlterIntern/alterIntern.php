<?php
session_start();

if(!isset($_SESSION['admin_login_id'])){
    header('Location: ../../admin_login.php');
    exit;
}

require '../../config.php';

$email = $_SESSION['email'];
$sql = " SELECT * FROM intern; ";
$sqll = mysqli_query($link,$sql);
$count = 0;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="HTML, CSS, JavaScript" />
    <meta name="author" content="Shrithik" />
    <link rel="stylesheet" href="alterInterns.css" />
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
            <a href="../Domain/domain.php" >PROBLEM-STATEMENTS</a>
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
                    <a href="../Domain/domain.php" class="active" >PROBLEM-STATEMENTS</a>
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
      <div class="title">ALTER INTERNS</div>
        <div class="tabel"> 
            <div class="grid-container-body tabelHead">
                <div class="grid-item-head hide" >S.NO</div>
                <div class="grid-item-head hide">NAME</div>
                <div class="grid-item-head hide">INTERN ID</div>
                <div class="grid-item-head">INTERN MAIL</div>
                <div class="grid-item-head">MOBILE NUMBER</div>
            </div>
          <?php while($row = $sqll->fetch_assoc()) { 
            $count = $count + 1; ?>
            <form <?php if($count % 2 == 0) { ?> style="background-color: #F0F0F0" <?php } ?> class="grid-container-body tabelBody" method="GET" 
                action="alterInternProcess.php" >
                <?php
                $name = $row['NAME'];
                $intern_id = $row['INTERN_ID'];
                $intern_mail = $row['EMAIL_ID'];
                $mobile_number = $row['MOBILE_NUMBER'];
                ?>
                <input type="hidden" name="email" value="<?php echo $intern_mail ?>">
                <div class="grid-item topic sNo hide"><?php echo $count ?></div>
                <div class="grid-item topic hide" > <?php echo $name; ?> </div>
                <div class="grid-item topic hide"><?php echo $intern_id ?></div>
                <div class="grid-item topic item1"><?php echo $intern_mail ?></div>
                <div class="grid-item topic"><?php echo $mobile_number ?></div>
                <?php //checking either already requested 
                $r = " SELECT * FROM alter_request WHERE from_email = '$email' AND to_email = '$intern_mail'; ";
                $rr = mysqli_query($link,$r);
                
                if($rr->num_rows > 0)
                {
                    $row = $rr->fetch_assoc();
                    $status = $row['statuss']; ?>
                    <div class="grid-item">
                    <center>
                        <p class="request"><?php echo $status ?></p>
                    </center>
                    </div>
                <?php
                } else { ?>
                
                <div class="grid-item">
                    <center>

                    <input class="button" type="submit" value="ALTER"></input>
                    </center>
                </div>
                <?php } ?>
            </form>
            <?php } ?>
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
                    <li><a href="../Domain/domain.php">PROBLEM STATEMENT</a></li>
                </ul>
            </div>
        </div>
        <div class="footerBottom">
            <span class="copyRight">Copyright Â© 2023 &nbsp - &nbsp </span><a class="copyRight" target="_blank" href="https://www.linkedin.com/in/mohamed-imthiyaz-1600qaqw?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app">MOHAMED IMTHIYAZ A</a><span class="copyRight"> &nbsp & &nbsp </span><a class="copyRight" href="">SHRITHIK A </a> 
        </div>
    </footer>

  </body>
  <script>
    function dispMenu(){
        document.getElementById("navList").style.display="grid";
        document.getElementById("proBar").style.display="none";
    }
    function closeMenu(){
        document.getElementById("navList").style.display="none";
        document.getElementById("proBar").style.display="flex";
    }

    if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}

</script>
</html>

