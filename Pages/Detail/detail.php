<?php
session_start();



require '../../config.php';
$str = null;

if(isset($_POST['category1']))
{
  $str = $_POST['category1'];
  $_SESSION['category1'] = $str;
}
else {
  $str = $_SESSION['category1'];
}

$sql = " SELECT * FROM teamwise_interns_software ";
$sqll = mysqli_query($link,$sql);
$count = 0;
if($sqll->num_rows > 0)
{

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="HTML, CSS, JavaScript" />
    <meta name="author" content="Shrithik" />
    <link rel="stylesheet" href="details.css" />
    <link rel="icon" type="image/x-icon" href="../.././Asserts/Images/logo.png" >
    <link rel="stylesheet" href="../../footer.css">
    <title>BIT HACK</title>
    <style>
      
      .nony {
        display: none !important
      }

    </style>
  </head>
  <body>
    <!-- <div class="header">
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
                  <a href="../Home/home.php">HOME</a>
              </div>
              <div>
                  <a href="#about" >ABOUT</a>
              </div>
              <div>
                  <a href="../Category/category.php">PROBLEM-STATEMENTS</a>
              </div>
              <div>
                  <a href="../Profile/profile.php" >PROFILE</a>
              </div>
              <div>
                  <a href="../../logout.php" class="login">LOG OUT</a>
              </div>
          </div>
      </div>
    </div> -->
    
    <!-- HEAD END -->
    <div class="body">
      <div class="title">TEAMS AND MENTORS</div>
      <div class="tabel"> 
          <div class="grid-container-body tabelHead">
            <div class="grid-item-head hide">S.NO</div>
              <div class="grid-item-head">TEAM NAME</div>
              <div class="grid-item-head ">CODE</div>
              <div class="grid-item-head">MENTOR</div>
              <div class="grid-item-head">MENTOR MAIL</div>
            </div>
          <div >
          <?php while($row = $sqll->fetch_assoc()) { 
            $count = $count + 1; ?>
            <form <?php if($count % 2 == 0) { ?> style="background-color: #F0F0F0" <?php } ?> class="grid-container-body tabelBody" method="GET" action="../ViewProblem/viewProblem.php">
              <?php
                $code = $row['problem'];
                $team_name = $row['team_name'];
                $intern = $row['INTERN'];
                $intern_id = $row['INTERN_MAIL_ID'];
                ?>
              <div class="grid-item sNo hide"><?php echo $count ?></div>
              <div class="grid-item topic " > <?php echo $team_name ?> </div>
              <div class="grid-item topic " > <?php echo $code ?> </div>
              <div class="grid-item topic " > <?php echo $intern ?> </div>
              <div class="grid-item topic" > <?php echo $intern_id ?> </div>
              <!-- <div class="grid-item description" >description description description description description description description description description description </div> -->
              
            </form>
            <?php } ?>
          </div>
      </div>
    </div>
  </div>

  <!-- <footer  >
       <div class="footerContainer">
            <div class="footerTitle">
                <h1>BIT HACK</h1>
            </div>
            <div id="footerNav" class="footerNav">
                <ul>
                    <li><a href=".././Home/home.php">HOME</a></li>
                    <li><a href="../Category/category.php">PROBLEM STATEMENT</a></li>
                    <li><a href=".././Home/home.php#about">ABOUT</a></li>
                    <li><a href=".././Profile/profile.php">PROFILE</a></li>
                </ul>
            </div>
        </div>
        <div class="footerBottom">
            <span class="copyRight">Copyright © 2023   &nbsp&nbsp&nbsp -  &nbsp&nbsp&nbsp </span><a class="copyRight" target="_blank" href="https://www.linkedin.com/in/mohamed-imthiyaz-1600qaqw?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app">MOHAMED IMTHIYAZ A</a><span class="copyRight"> &nbsp & &nbsp </span><a class="copyRight" href="">SHRITHIK A</a>
        </div>
    </footer> -->

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

<?php } ?>
