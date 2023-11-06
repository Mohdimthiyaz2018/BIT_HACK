<?php
require './config.php';

if(isset($_SESSION['login_id'])){
    header('Location: ./Pages/Home/home.php');
    exit;
}

require './google-api/vendor/autoload.php';

$client = new Google_Client();

$client->setClientId('1032584927843-m3bomc5t1lrarfccs1efu323jpg7jvhs.apps.googleusercontent.com');
$client->setClientSecret('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');
$client->setRedirectUri('http://localhost/SkillsBIT/index.php');

$client->addScope("email");
$client->addScope("profile");


if(isset($_GET['code'])):

    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

    if(!isset($token["error"])){

        $client->setAccessToken($token['access_token']);

        // getting profile information
        $google_oauth = new Google_Service_Oauth2($client);
        $google_account_info = $google_oauth->userinfo->get();
    
        // Storing data into database
        $id = mysqli_real_escape_string($db_connection, $google_account_info->id);
        $full_name = mysqli_real_escape_string($db_connection, trim($google_account_info->name));
        $email = mysqli_real_escape_string($db_connection, $google_account_info->email);
        $profile_pic = mysqli_real_escape_string($db_connection, $google_account_info->picture);

        // checking user already exists or not
        $get_user = mysqli_query($db_connection, "SELECT `google_id` FROM `users` WHERE `google_id`='$id'");
        if(mysqli_num_rows($get_user) > 0){

            $_SESSION['login_id'] = $id; 
            header('Location: ./Pages/Home/home.php');
            exit;

        }
        else{

            // if user not exists we will insert the user
            $insert = mysqli_query($db_connection, "INSERT INTO `users`(`google_id`,`name`,`email`,`profile_image`) VALUES('$id','$full_name','$email','$profile_pic')");

            if($insert){
                $_SESSION['login_id'] = $id; 
                header('Location: ./Pages/Home/home.php');
                exit;
            }
            else{
                echo "Sign up failed!(Something went wrong).";
            }

        }

    }
    else{
        header('Location: ./index.php');
        exit;
    }
    
else: 
    // Google Login Url = $client->createAuthUrl(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="author" content="Shrithik">
    <link rel="stylesheet" href="index.css">
    <title>SkillsBIT</title>
</head>
<body>
    <div class="header">
        <div>
            <img class="Logo" src="./Asserts/Images/bitFullLogo.webp" alt="BIT Full Logo">
        </div>
        <div class="navBar">
                <a href="#home" class="active">HOME</a>
                <a href="#about" >ABOUT</a>
                <a href="<?php echo $client->createAuthUrl(); ?>" class="login">LOGIN / REGISTER</a>
        </div>
        <div class="navMenu">
            <img src="./Asserts/Images/menuIcon.png" alt="Menu" width="30px" onclick="dispMenu()">
            <div class="navList" id="navList">
                <div>
                    <img src="./Asserts/Images/closeIcon.png" alt="Close" width="30px" onclick="closeMenu()">
                </div>
                <div>
                    <a href="#home" class="active">HOME</a>
                </div>
                <div>
                    <a href="#about" >ABOUT</a>
                </div>
                <div>
                <a href="<?php echo $client->createAuthUrl(); ?>" class="login">LOGIN / REGISTER</a>
                </div>
            </div>
        </div>
    </div>
    <!-- HEAD END -->
    <div class="body">
      <span id="S">S</span>
      <span id="K">K</span>
      <span id="I">I</span>
      <span id="L">L</span>
      <span id="L">L</span>
      &nbsp;&nbsp;
      <span id="B">B</span>
      <span id="I">I</span>
      <span id="T">T</span>
    </div>
    <div class="mbody">
        <div class="title">SKILLS BIT</div>
    </div>
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
</script>
</html>

<?php endif; ?>