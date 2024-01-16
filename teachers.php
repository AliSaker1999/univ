<?php
session_start();
if(!isset($_SESSION['authenticated'])||$_SESSION['authenticated']!=="admin"){
  header('Location: login.php');
  exit();
}
include("db.php");
include("header.php");

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
<div class="container">
<div class="panel panel-default">

    <div class="panel panel-heading">
    <h2>
    <a class="btn btn-success" href="addteachers.php">Manage Teachers</a>
    <a class="btn btn-info pull-center" href="index.php">Back</a>
    <a class="btn btn-info pull-right" href="logout_process.php">Log Out</a>
    </h2>


<div class="panel panel-body">
    <form action="index.php" method="Post">
        <table class="table table-striped">

            <th>
                #Serial Number
            </th>
            <th>
                Teacher ID
            </th>
            <th>
                Teacher Name
            </th>
            <th>
                Address

            </th>
            <th>
                Phone Number
            </th>
            <th>
                Speciality
            </th>

<?php

$result=mysqli_query($con,"select * from teacher");
$count=0;
$counter=0;
while($row=mysqli_fetch_array($result))
{
    $count++;
    ?>
    <tr>
    <td><?php echo $count;?></td>
    <td><?php echo $row['tid'];?>
    <input type="hidden" value="<?php echo $row['tid'];?>" name="tid[]">
</td>
    <td><?php echo $row['tname'];?>
    <input type="hidden" value="<?php echo $row['tname'];?>" name="tname[]">
</td>
<td><?php echo $row['address'];?>
<input type="hidden" value="<?php echo $row['address'];?>" name="address[]">
</td>
<td><?php echo $row['phone'];?>
<input type="hidden" value="<?php echo $row['phone'];?>" name="phone[]">
</td>
<td><?php echo $row['speciality'];?>
<input type="hidden" value="<?php echo $row['speciality'];?>" name="speciality[]">
</td>


</tr>
<?php
$counter++;
}?>

        </table>


    </form>
    </div>

</div>

</div>
