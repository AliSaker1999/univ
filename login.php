<?php
include("db.php");
include("header.php");

?>
<head>
    <title>Login</title>
</head>
<body>

  <div class="container ">
  <div class="panel panel-default">

      <div class="panel panel-heading">
    <h2>Login</h2>
    <form action="login_process.php" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
    <form action="signup.php">
      <input type="submit" value="Students Sign Up">
    </form>
</body>
