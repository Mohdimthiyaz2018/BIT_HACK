<?php
session_start();

if(!isset($_SESSION['login_id'])){
    header('Location: ../../index.php');
    exit;
  }
  
include '../../config.php';
include('../../smtp/PHPMailerAutoload.php');

$email = $_SESSION['email'];
$domain = $_POST['domain'];

//checking either count is ok
$problem_code = $_POST['code'];
$countCheck = " SELECT * FROM $domain WHERE PROBLEM_CODE = '$problem_code' ";
$countCheck1 = mysqli_query($link,$countCheck);

$row = $countCheck1->fetch_assoc();
$county = $row['COUNTT'];

if($county >= 3)
{
  echo "<script> alert('No available slots for this problem statement! '); 
  window.location.href = '.././Domain/domain.php';
  </script>";
  exit;
}




$domain = str_replace('_',' ',$domain);
$problem_code = $_POST['code'];

//checking either already registered
$registerCheck = " SELECT * FROM register WHERE email = '$email'; ";
$registerCheck1 = mysqli_query($link,$registerCheck);

if($registerCheck1->num_rows > 0)
{
  $row = $registerCheck1->fetch_assoc();
  $teamName = $row['team_name'];
  echo "<script> alert('You are already registered! | Team name - $teamName '); 
  window.location.href = '.././Domain/domain.php';
  </script>";
  exit;
}

//closing registrations
echo "<script> alert('Registration has been closed! '); 
window.location.href = '.././Domain/domain.php';
</script>";
exit;

$a = " SELECT * FROM student_details WHERE email = '$email'; ";
$aa = mysqli_query($link,$a);

//checking either created a profile
if($aa->num_rows > 0) {
    $team_checker = " SELECT * FROM team WHERE email = '$email'; ";
    $team_checker1 = mysqli_query($link,$team_checker);

    //checking either created a team
    if($team_checker1->num_rows > 0)
    {
      $row = $team_checker1->fetch_assoc();
      $designation = $row['designation'];

      //checking either designation is leader
      if($designation === 'leader')
      {
        //getting team details by team name
        $team_name = $row['team_name'];
        $sql = " SELECT * FROM team WHERE team_name = '$team_name'; ";
        $sqll = mysqli_query($link,$sql);

        //registering team members
        while($row = $sqll->fetch_assoc())
        {
          $email = $row['email'];
          $student = " SELECT * FROM student_details WHERE email = '$email'; ";
          $student1 = mysqli_query($link,$student);

          $row2 = $student1->fetch_assoc();

          $name = $row2['namee'];
          $roll_no = $row2['roll_no'];
          $lab_name = $row2['lab_name'];
          $lab_id = $row2['lab_id'];
          $phone_number = $row2['phone_number'];
          $category = $_SESSION['category'];

          $sql1 = " INSERT INTO register (category,team_name,email,namee,problem,domain,lab_name,lab_id,phone_number) VALUES ('$category','$team_name','$email','$name','$problem_code','$domain','$lab_name','$lab_id','$phone_number'); ";
          $sqll1 = mysqli_query($link,$sql1);

          if(!$sqll1)
          {
            echo "<script> alert('Failed! Contact Admin'); 
            window.location.href = '.././Domain/domain.php';
            </script>";
            exit;
          }

        }

        //updating count value!
        $domain = str_replace(' ','_',$domain);
        $c = " UPDATE $domain SET COUNTT = COUNTT + '1' WHERE PROBLEM_CODE = '$problem_code'; ";
        
        $cc = mysqli_query($link,$c);

        echo "<script> alert('SUCCESSFULLY REGISTERED | problem code - $problem_code'); 
        window.location.href = '.././Profile/profile.php#registeration';
        </script>";
        exit;

      }
      else
      {
        echo "<script> alert('Team leader only can register!'); 
        window.location.href = '.././Domain/domain.php';
        </script>";
        exit;
      }

    }
    else{
      echo "<script> alert('Create team to register a problem statement!'); 
      window.location.href = '.././Domain/domain.php';
      </script>";
      exit;
    }

}
else{
    echo "<script> alert('Create profile to register a problem statement!'); 
    window.location.href = '.././Domain/domain.php';
    </script>";
    exit;
}


?>