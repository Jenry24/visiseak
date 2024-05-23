<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Search Engine</title>
    <!-- Importing the CSS file -->
    <link rel="stylesheet" href="style.css"> 
    <style>
        /* Center align the content */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            text-align: center;
        }

        .logo  {
            height: 30%; /* Maintain aspect ratio */
            margin-bottom: 20px; /* Add some space below the image */
            margin-left: auto;
  margin-right: auto;
  width: 30%;
        }

        .header-text h1 {
            font-size: 40px; /* Adjust font size as needed */
        }

        /* Style for the buttons */
        .auth_buttons button {
            margin: px;
            
        }
    </style>
</head>
<body>
  <div class="container">
      <div class="logo"><img src="logo.png" alt="Logo"></div>
      <div class="header-text"><h1>Image Search Engine</h1></div>
      <div class="auth_buttons">
        <!-- Authentication buttons -->
        <a href="register.php"><button type="button" class="btn btn-primary">Sign Up</button></a>
        <a href="login.php"><button type="button" class="btn btn-primary active">Log in</button></a>
      </div>
  </div>
</body>   
</html>
