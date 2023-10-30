<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="HTML, CSS, JavaScript" />
    <meta name="author" content="Shrithik" />
    <link rel="stylesheet" href="profile.css" />
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
        <a href="../Home/homeA.php" class="active">HOME</a>
        <a href="#">ABOUT</a>
        <a href="../Domain/domain.php">PROBLEM-STATEMENTS</a>
        <a href="../Profile/profile.php">PROFILE</a>
        <a href="../Home/homeB.php" class="login">LOG OUT</a>
      </div>
    </div>
    <div class="body">
    <div class="title">PROFILE</div>
        <div class="box">
            <div class="profile">
                <div>
                    <img src="../../Asserts/Images/proPicPlaceHolder.jpg" alt="Profile Picture" width="300px" height="300px">
                </div>
                <div class="proDitl" id="vProfile">
                    <div class="subHead">Name</div>
                    <div class="subHead">:</div>
                    <div class="subBody">ShrithiK</div>
                    <div class="subHead">RollNumber</div>
                    <div class="subHead">:</div>
                    <div class="subBody">191IG133</div>
                    <div class="subHead">Email</div>
                    <div class="subHead">:</div>
                    <div class="subBody">shrithik.ig19@bitsathy.ac.in</div>
                    <div class="subHead">PhoneNO</div>
                    <div class="subHead">:</div>
                    <div class="subBody">8610646600</div>
                    <div class="subHead">Problem Statement</div>
                    <div class="subHead">:</div>
                    <div class="subBody">Not Selected Yet!</div>
                    <div></div>
                    <div>
                      <center>
                        <button class="edit" onclick="edit()">EDIT</button>
                      </center>
                    </div>
                      
                </div>
                  <div class="proDitl" id="eProfile">
                      <div class="subHead">Name</div>
                      <div class="subHead">:</div>
                      <div class="subBody">
                        <input type="text" id="name" />
                      </div>
                      <div class="subHead">RollNumber</div>
                      <div class="subHead">:</div>
                      <div class="subBody">
                        <input type="text" id="rNo"/>
                      </div>
                      <div class="subHead">Email</div>
                      <div class="subHead">:</div>
                      <div class="subBody">
                        <input type="text" id="eMail"/>
                      </div>
                      <div class="subHead">PhoneNO</div>
                      <div class="subHead">:</div>
                      <div class="subBody">
                        <input type="text" id="pNo"/>
                      </div>
                      <div>
                        <center>
                          <button class="cancel" onclick="cancel()">CANCEL</button>
                        </center>
                      </div>
                      <div></div>
                      <div>
                        <center>
                          <button class="edit" onclick="save()">SAVE</button>
                        </center>
                      </div>
                  </div>
            </div>
        </div>
    </div>
  </body>
  <script>
    function edit(){
      document.getElementById("vProfile").style.display="none";
      document.getElementById("eProfile").style.display="grid";
    }
    function cancel(){
      document.getElementById("vProfile").style.display="grid";
      document.getElementById("eProfile").style.display="none";
    }
    function save(){
      var name = document.getElementById("name").value;
      var rNo = document.getElementById("rNo").value;
      var eMail = document.getElementById("eMail").value;
      var pNo = document.getElementById("pNo").value;
      alert(name + rNo + eMail + pNo);
      document.getElementById("vProfile").style.display="grid";
      document.getElementById("eProfile").style.display="none";
    }
  </script>
</html>
