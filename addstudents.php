<?php
session_start();
if(!isset($_SESSION['authenticated'])||$_SESSION['authenticated']!=="admin"){
  header('Location: login.php');
  exit();
}
include("header.php");
include ("db.php");
$flag=0;
if(isset($_POST['add']))
{$result=mysqli_query($con,"insert into student(sid,supervisor,sname,bdate,address,phone)values('$_POST[sid]','$_POST[supervisor]','$_POST[sname]','$_POST[bdate]','$_POST[address]','$_POST[phone]')");
if($result)
{$flag=1;}
}
if(isset($_POST['delete']))
{$result=mysqli_query($con,"delete from student where sname='$_POST[sname]' and sid='$_POST[sid]'");

        if($result)
        {$flag=2;}
      }
?>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">
<title>Bootstrap Sidebar Example</title>
<style>
    body {
        padding-top: 56px;
        font-size: 16px; /* Adjust the base font size for the body */
    }

    /* Increase font size for various elements */
    h2, p, .navbar-brand, .nav-link {
        font-size: 20px; /* Adjust the font size as needed */
    }

    .sidebar {
        height: 100vh;
        width: 250px;
        position: fixed;
        top: 56px;
        left: 0;
        background-color: #343a40;
        padding-top: 1rem;
    }

    .sidebar a {
        padding: 8px 16px;
        color: white;
        display: block;
        text-decoration: none;
    }

    .sidebar a:hover {
        background-color: #495057;
    }

    #content {
        margin-left: 250px;
        padding: 15px;
    }
</style>
</head>
<body>
<div class="panel panel-default">
<?php if($flag==1){ ?>
<div class="alert alert-success">
<strong>!success</strong> Students data successfully Added;
</div>
<?php } ?>
<?php if($flag==2){ ?>
<div class="alert alert-success">
<strong>!success</strong> Students data successfully Deleted;
</div>
<?php } ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">Your Logo</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="students.php">Students</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="teachers.php">Teachers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="addcourses.php">Courses</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login.php">Log Out</a>
            </li>
        </ul>
    </div>
</nav>
<div class="panel-heading">
<a class="btn btn-success" href="students.php"> Back</a>
<a class="btn btn-info pull-right"  href="logout_process.php">Log Out</a>

</h2></div>
<div class="panel-body">
  <form action="addstudents.php" method="post">
    <div class="form-group">
    <label for="sname">Studdent Name:</label>
    <input type="text" name="sname"id="sname" class="form-control" required>
  </div>

  <div class="form-group">
  <label for="sid">Student ID:</label>
  <input type="text" name="sid"id="sid" class="form-control" required>
</div>
<div class="form-group">
<label for="supervisor">Supervisor:</label>
<input type="text" name="supervisor"id="supervisor" class="form-control" required>
</div>
<div class="form-group">
<label for="bdate">Birth Date:</label>
<input type="date" name="bdate"id="bdate" class="form-control" required>
</div>
<div class="form-group">
<label for="address">Address:</label>
<input type="text" name="address"id="address" class="form-control" required>
</div>
<div class="form-group">
<label for="phone">Phone Number:</label>
<input type="tel" name="phone"id="phone" class="form-control" required>
</div>
<div class="form-group">
  <button name='add' class="btn btn-primary">Add Student</button>
<button name='delete' class="btn btn-primary">Delete</button><br>


</div>




</div>
</body>
