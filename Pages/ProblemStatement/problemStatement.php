<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="HTML, CSS, JavaScript" />
    <meta name="author" content="Shrithik" />
    <link rel="stylesheet" href="problemStatements.css" />
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
        <a href="../Home/homeA.php">HOME</a>
        <a href="#">ABOUT</a>
        <a href="../Domain/domain.php">PROBLEM-STATEMENTS</a>
        <a href="../Profile/profile.php">PROFILE</a>
        <a href="../Home/homeB.php" class="login">LOG OUT</a>
      </div>
    </div>
    <!-- HEAD END -->
    <div class="body">
      <div class="title">PROBLEM STATEMENTS</div>
      <div class="tabel"> 
      <div class="grid-container">
        <div class="grid-container-body tabelHead">
        <div class="grid-item-head">PROBLEM_CODE</div>
          <div class="grid-item-head">TOPIC</div>
          <!-- <div class="grid-item-head">DESCRIPTION</div> -->
          <div class="grid-item-head"></div>
        </div>
        <div >
          <form class="grid-container-body tabelBody" method="POST" action="../ViewProblem/viewProblem.php">
            <div class="grid-item sNo">1001</div>
              <div class="grid-item topic" >topic1topic1topic1topic1topic1</div>
              <!-- <div class="grid-item description" >description description description description description description description description description description </div> -->
              <div class="grid-item">
                <center>
                  <input  class="button" type="submit" value="VIEW"></input>
                </center>
              </div>
            </form>
          </div>
          
        </div>
      </div>
      </div>
    </div>
  </body>
</html>
