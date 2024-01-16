<?php
include("db.php");
include("header.php");

?>
<head>
    <title>Sign Up</title>
</head>
<body>
  <div class="container">
  <div class="panel panel-default">

      <div class="panel panel-heading">
    <h2>Sign Up</h2>
    <form action="signup_process.php" method="post">
      <label for="name">Name:</label><br>
      <input type="text" id="name" name="name" required><br><br>
      <label for="rollnumber">Roll Number:</label><br>
      <input type="text" id="rollnumber" name="rollnumber" required><br><br>
      <label for="email">Email:</label><br>
      <input type="email" id="email" name="email" required><br><br>
      <label for="phonenumber">Phone Number:</label><br>
      <input type="tel" id="phonenumber" name="phonenumber" required><br><br>
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Signup">
    </form>
    <form action="login.php">
      <input type="submit" value="Back">
    </form>
</body>
