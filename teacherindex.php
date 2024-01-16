<?php
session_start();
$username=$_SESSION['tname'];
if(!isset($_SESSION['authenticated'])||$_SESSION['authenticated']!=="teacher"){
  header('Location: login.php');
  exit();
}
include("db.php");
include("header.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

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
                <a class="nav-link" href="attendance.php">Attendance</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="addcourses.php">Courses</a
            </li>
            <li class="nav-item">
                <a class="nav-link" href="addmarks.php">Marks</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login.php">Log Out</a>
            </li>
        </ul>
    </div>
</nav>

<div class="sidebar">
    <a href="index.php">Home</a>
    <a href="attendance.php">Attendance</a>
    <a href="addmarks.php">Marks</a>
      <a href="login.php">Log Out</a>
</div>

<div id="content">
    <h2>Main Content Area</h2>
    <p>This is the main content area. You can add your content here.</p>
</div>



  </body>
</html>
