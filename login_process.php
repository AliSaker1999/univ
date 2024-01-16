<?php
include("db.php");
include("header.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $entered_username = $_POST['username'];
    $entered_password = $_POST['password'];

    // Sanitize user input to prevent SQL injection

    session_start();
    // Query to fetch user details from the database
    $result = mysqli_query($con, "SELECT * FROM user1 USE INDEX (User1_FK)  WHERE username = '$entered_username'");

    if ($result->num_rows > 0) {
        // User found, verify password
        $row = $result->fetch_assoc();
        $stored_password = $row['password'];


        // Verify the password
        if ($stored_password==$entered_password) {
        $data=mysqli_query($con,"SELECT* FROM Student s, User1 u1 USE INDEX (User1_FK) WHERE s.sid = u1.sid");
        if ($data->num_rows > 0) {
            $row = $data->fetch_assoc();
          $_SESSION['authenticated']="student";
          $_SESSION['sid']=$row['sid'];
          $_SESSION['tutor']=$row['tutor'];
          $_SESSION['sname']=$row['sname'];
          $_SESSION['supervisor']=$row['supervisor'];
          header("Location:studentindex.php");
           exit();}

        } else {
            echo "Incorrect password";
        }
    } else {
      $result = mysqli_query($con, "SELECT * FROM admins WHERE username = '$entered_username'");
        if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stored_password = $row['password'];
          if ($stored_password==$entered_password) {
            $_SESSION['authenticated']="admin";
            header("Location:index.php");
             exit();

          } else {
              echo "Incorrect password";
          }
        }
        else {
          // Query to fetch user details from the database
          $result = mysqli_query($con, "SELECT * FROM user2 USE INDEX (User2_FK) WHERE username = '$entered_username'");

          if ($result->num_rows > 0) {
              // User found, verify password
              $row = $result->fetch_assoc();
              $stored_password = $row['password'];


              // Verify the password
              if ($stored_password==$entered_password) {
              $data=mysqli_query($con,"SELECT* FROM teacher t, user2 u2 USE INDEX (User2_FK) WHERE t.tid = u2.tid");
              if ($data->num_rows > 0) {
                  $row = $data->fetch_assoc();
                $_SESSION['authenticated']="teacher";
                $_SESSION['tid']=$row['tid'];
                $_SESSION['tname']=$row['tname'];
                $_SESSION['speciality']=$row['speciality'];
                header("Location:teacherindex.php");
                 exit();}

              } else {
                  echo "Incorrect password";

        }}
        else {
          echo "User not found";
        }
    }
}
}
?>
