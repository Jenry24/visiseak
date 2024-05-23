<?php
session_start();
$error = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($error != 1) {
        class MyDB extends SQLite3
        {
            function __construct()
            {
                $this->open('database.db');
            }
        }

        $db = new MyDB();
        if (!$db) {
            echo $db->lastErrorMsg();
        } else {
            echo "Opened database successfully\n";
        }

        $username = $_POST["username"];
        $mail = $_POST["mail"];
        $password = $_POST["pwd"];

        // Prepare SQL statement to insert new user
        $stmt = $db->prepare('INSERT INTO USERS (username, mail, password) VALUES (:username, :mail, :password)');
        $stmt->bindValue(':username', $username, SQLITE3_TEXT);
        $stmt->bindValue(':mail', $mail, SQLITE3_TEXT);
        $stmt->bindValue(':password', $password, SQLITE3_TEXT);

        // Execute the statement
        $result = $stmt->execute();

        if ($result) {
            // Redirect to login page after successful registration
            header("Location: login.php");
            exit(); // Ensure that no further code is executed after the redirect
        } else {
            echo "Error registering user!";
        }

        // Close the statement and database connection
        $stmt->close();
        $db->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Sign Up now!</h2>
  <form role="form" method="post" action="register.php">
    <div class="form-group">
      <label for="username">Username:</label>
      <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username">
    </div>
    <div class="form-group">
      <label for="mail">Email:</label>
      <input type="mail" class="form-control" id="mail" name="mail" placeholder="Enter email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Enter password">
    </div>
    <div class="checkbox">
      <label><input type="checkbox"> Remember me</label>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

</body>
</html>
