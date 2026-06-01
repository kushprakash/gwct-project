<?php


include "conf.php";


if(isset($_POST['submit']))
{

  //$channel = mysqli_real_escape_string($conn,$_POST['channel']);
  $channel = 'CP6163';
  $name = mysqli_real_escape_string($conn,$_POST['name']);
  $_SESSION['ap_name']=$_POST['name'];
  $designation = mysqli_real_escape_string($conn,$_POST['designation']);
  $father = mysqli_real_escape_string($conn,$_POST['father']);
  $dob = mysqli_real_escape_string($conn,$_POST['dob']);
  $religion = mysqli_real_escape_string($conn,$_POST['religion']);
  $gender = mysqli_real_escape_string($conn,$_POST['gender']);
  $email = mysqli_real_escape_string($conn,$_POST['email']);
  $mob = mysqli_real_escape_string($conn,$_POST['mob']);
  $address = mysqli_real_escape_string($conn,$_POST['address']);
  $state = mysqli_real_escape_string($conn,$_POST['state']);
  $city = mysqli_real_escape_string($conn,$_POST['city']);
  $block = mysqli_real_escape_string($conn,$_POST['block']);
  $village = mysqli_real_escape_string($conn,$_POST['village']);
  $ward = mysqli_real_escape_string($conn,$_POST['ward']);
  $ad_no = mysqli_real_escape_string($conn,$_POST['ad_no']);
  $pan_no = mysqli_real_escape_string($conn,$_POST['pan_no']);
  $pin = mysqli_real_escape_string($conn,$_POST['pin']);
  $location = mysqli_real_escape_string($conn,$_POST['location']);
  $qwalification = mysqli_real_escape_string($conn,$_POST['qwalification']);
  $obtain = mysqli_real_escape_string($conn,$_POST['obtain']);
  date_default_timezone_set("Asia/Kolkata");
  $addon=date('Y-m-d h:i:s');
  $_SESSION['type']='1';
  $_SESSION['mob']=$mob;
  $_SESSION['email']=$email;
  $_SESSION['name']=$name;
  $_SESSION['arole'] = mysqli_real_escape_string($conn,$_POST['role']);


  $doc = '';
  $aadhar = '';





  $target_dir = "pathshala/Uploads/MemberDocument/";
  $photo = $target_dir . basename($_FILES["photo"]["name"]);
  move_uploaded_file($_FILES["photo"]["tmp_name"], $photo);




  $query = mysqli_query($conn,"select * from `apply` where `mob`= '$mob' || `email`= '$email'");
  if(mysqli_num_rows($query) == 0){
    $regid = 'GWCT'.rand(100000,9999999);
    $sql = "INSERT INTO `apply` (
`channel`, `designation`, `regid`, `name`, `father`, `dob`, `religion`, `gender`,
`email`, `mob`, `address`, `state`, `city`, `block`, `village`, `ward`,
`ad_no`, `pin`, `location`, `qwalification`, `obtain`,
`doc`, `aadhar`, `pan`, `acc`, `ifsc`,
`photo`, `signature`, `payment`, `user_code`, `addon`, `status`, `status1`, `ad_no1`
) VALUES (
'$channel','$designation','$regid','$name','$father','$dob','$religion','$gender',
'$email','$mob','$address','$state','$city','$block','$village','$ward',
'$ad_no','$pin','$location','$qwalification','$obtain',
'$doc','','$pan_no','','',
'$photo','','0','','$addon','0','0',''
)";
    if(mysqli_query($conn,$sql)) {
      echo '<script>window.location="apply-success.php?rid=' . $regid . '";</script>';
    } else {

      echo '<script>window.location="apply-success.php?msg=Something Went Wrong";</script>';
    }
  } else {

    echo '<script>window.location="apply-success.php?msg=You are Already Aplied";</script>';
  }
}
else{
  echo '<script>window.location="apply-success.php?msg=Something Went Wrong";</script>';

}

echo  $conn->error;
?>