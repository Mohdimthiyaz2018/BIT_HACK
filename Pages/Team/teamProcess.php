<?php
session_start();

include '../../config.php';

if(!isset($_SESSION['login_id'])){
  header('Location: ../../index.php');
  exit;
}

$team_name = strtoupper(trim($_POST['team_name']));
$leader = strtoupper(trim($_POST['leader']));
$member1 = strtoupper(trim($_POST['member1']));
$member2 = strtoupper(trim($_POST['member2']));

//checking either the values are not empty spaces
if(empty($team_name)){
    echo "<script> alert('Team name cannot be empty!');
    window.location.href = '.././Profile/profile.php#teamForm';
    </script>";
    exit();
}

if(empty($leader)){
    echo "<script> alert('Leader email cannot be empty!');
    window.location.href = '.././Profile/profile.php#teamForm';
    </script>";
    exit();
}

if(empty($member1)){
    echo "<script> alert('Member1 email cannot be empty!');
    window.location.href = '.././Profile/profile.php#teamForm';
    </script>";
    exit();
}

if(empty($member2)){
    echo "<script> alert('Member2 email cannot be empty!');
    window.location.href = '.././Profile/profile.php#teamForm';
    </script>";
    exit();
}

//checking either registering person included his email in team
$email = $_SESSION['email'];
$checkinPerson = 1;
$arrPerCheck = array($leader,$member1,$member2);

for($i = 0;$i < 3;$i++)
{
    if(strtoupper($email) == $arrPerCheck[$i])
    {
        $checkinPerson = "pass";
    }
}

if($checkinPerson == 1)
{
    echo "<script> alert('Registering person should include his email in team! - $email');
    window.location.href = '.././Profile/profile.php#teamForm';
    </script>";
    exit();
}

//checking either member1 is created his profile
$proMem1 = " SELECT * FROM student_details WHERE email = '$member1' ";
$proMem11 = mysqli_query($link,$proMem1);

if(!($proMem11->num_rows > 0)){
    echo "<script> alert('Member1 should create profile!');
    window.location.href = '.././Profile/profile.php#teamForm';
    </script>";
    exit();
}

//checking either member2 is created his profile
$proMem2 = " SELECT * FROM student_details WHERE email = '$member2' ";
$proMem22 = mysqli_query($link,$proMem2);

if(!($proMem22->num_rows > 0)){
    echo "<script> alert('Member2 should create profile!');
    window.location.href = '.././Profile/profile.php#teamForm';
    </script>";
    exit();
}


//checking either member1 already in a team
$m1 = " SELECT * FROM team WHERE email = '$member1'; ";
$m11 = mysqli_query($link,$m1);

if($m11->num_rows > 0)
{
    echo "<script> alert('Member1 already in a team');
    window.location.href = '.././Profile/profile.php#teamForm';
    </script>";
    exit();
}

//checking either member2 already in a team
$m2 = " SELECT * FROM team WHERE email = '$member2'; ";
$m22 = mysqli_query($link,$m2);

if($m22->num_rows > 0)
{
    echo "<script> alert('Member2 already in a team');
    window.location.href = '.././Profile/profile.php#teamForm';
    </script>";
    exit();
}

//checking either any duplicate emails
$arr = array($leader,$member1,$member2);
$status = array('leader','member','member');

for($i = 0;$i<3;$i++){
    for($j = $i + 1;$j<3;$j++)
    {
        if($arr[$i] == $arr[$j])
        {
            echo "<script> alert('DUPLICATE email found');
            window.location.href = '.././Profile/profile.php#teamForm';
            </script>";
            exit();
        }
    }
}

//checking either team name already exists
$team_checker = " SELECT * FROM team WHERE team_name = '$team_name' ";
$team_checker1 = mysqli_query($link,$team_checker);

if($team_checker1->num_rows > 0)
{
    echo "<script> alert('Team name already exists!');
    window.location.href = '.././Profile/profile.php#teamForm';
    </script>";
    exit();
}

//creating team 
for($i = 0;$i < 3;$i++)
{
    $sql = " INSERT INTO team (email,team_name,designation) VALUES ('$arr[$i]','$team_name','$status[$i]'); ";
    $sqll = mysqli_query($link,$sql);
    if(!$sqll)
    {
        echo "<script> alert('Failed contact admin!');
        window.location.href = '.././Profile/profile.php#teamForm';
        </script>";
        exit();
    }
}

echo "<script> alert('Team created successfully!');
window.location.href = '.././Profile/profile.php#teamForm';
</script>";
exit();

?>