<?php
// Set the session cookie parameters (before session_start())
session_set_cookie_params([
  'lifetime' => 3600, // 1 hour
  'path' => '/', // Available for the entire domain
  'domain' => '', // Leave empty for current domain
  'secure' => true, // Set to true if using HTTPS
  'httponly' => true, // Prevents accessing the cookie from client-side scripts
  'samesite' => 'Strict' // Strict mode for improved security
]);

// Check if the session has started (after setting parameters)
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_GET["login"])) {
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
    exit;
  } else {
    echo "Opened database successfully\n";
  }

  $id = ""; // Initialize $id variable
  $sql = 'SELECT * FROM USERS WHERE username="' . $_POST["username"] . '";';
  $ret = $db->query($sql);
  if (!$ret) {
    echo $db->lastErrorMsg();
    exit;
  }
  while ($row = $ret->fetchArray(SQLITE3_ASSOC)) {
    $id = $row['id'];
    $username = $row["username"];
    $password = $row['password'];
  }

  if ($id != "") {
    if ($password == $_POST["pwd"]) {
      $_SESSION["username"] = $username; // Set the username in the session
      // Flag for successful login (replace with a more unique name if needed)
      $_SESSION["logged_in"] = true; // Set a login flag
      header('Location: index2.php'); // Redirect to index2.php
      exit(); // Add exit() to prevent further execution
    } else {
      echo "Wrong Password";
    }
  } else {
    echo "User not exist, please register to continue!";
  }

  $db->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Log in</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  <h2>Vertical (basic) form</h2>
  <form role="form" action="login.php?login=true" method="POST">
    <div class="form-group">
      <label for="usr_name">Username:</label>
      <input type="text" class="form-control" id="usr_name" name="username" placeholder="Enter Username">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Enter password">
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="remember"> Remember me</label>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>
</body>
</html>
