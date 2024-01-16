<?php
include("db.php");
include("header.php");
$flag=0;
$exist=0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $entered_username = $_POST['username'];
    $entered_password = $_POST['password'];
    $entered_name = $_POST['name'];
    $entered_rollnumber=$_POST['rollnumber'];
    $entered_phone = $_POST['phonenumber'];
    $entered_email = $_POST['email'];

    $user=mysqli_query($con, "SELECT * FROM users WHERE rollnumber = '$entered_rollnumber'");
if ($user->num_rows > 0){
  ?>
  <div class="alert">
  <strong>!Fail</strong> User Already Exist;

  </div>
  <?php
exit;

}
    $res = mysqli_query($con, "SELECT * FROM students WHERE roll_number = '$entered_rollnumber'");

if ($res->num_rows > 0) {
    $result=mysqli_query($con,"insert into users(username,password,name,email,phonenumber,rollnumber)values('$entered_username','$entered_password','$entered_name','$entered_email','$entered_phone','$entered_rollnumber')");
    if($result)
    {$flag=1;}
}

    }
    ?>
    <div class="panel panel-default">
    <?php if($flag){
      header("Location:login.php"); ?>
    <div class="alert alert-success">
    <strong>!success</strong> Signed Up Successfuly;

    </div>
    <?php }
    else { ?>
      <div class="alert">
      <strong>!Fail</strong> Student Not Found;

      </div>
  <?php  }


  ?>
