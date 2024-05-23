
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
        }

        .nav {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            background-image: linear-gradient(to right, #9E768F, #9FA4C4);
            color: #fff;
            height: 65px;
            padding: 0 1em;
            font-weight: bold;
            font-size: 25px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .nav .logo {
            text-shadow: 2px 2px 4px #000000;
        }

        .menu li:hover {
            color: #E8E8E8;
            cursor: pointer;
        }

        .menu {
            display: flex;
            flex-direction: row;
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        .menu > li {
            margin: 0 1rem;
            overflow: hidden;
            position: relative;
            transition: color 0.3s;
        }

        .menu > li > a {
            color: inherit;
            text-decoration: none;
        }

        .menu-button-container {
            display: none;
            height: 100%;
            width: 30px;
            cursor: pointer;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        #menu-toggle {
            display: none;
        }

        .menu-button,
        .menu-button::before,
        .menu-button::after {
            display: block;
            background-color: #fff;
            position: absolute;
            height: 6px;
            width: 32px;
            border-radius: 3px;
            transition: transform 0.3s, background 0.3s;
        }

        .menu-button::before {
            content: '';
            margin-top: -8px;
        }

        .menu-button::after {
            content: '';
            margin-top: 8px;
        }

        #menu-toggle:checked + .menu-button-container .menu-button::before {
            margin-top: 0;
            transform: rotate(45deg);
        }

        #menu-toggle:checked + .menu-button-container .menu-button {
            background: rgba(255, 255, 255, 0);
        }

        #menu-toggle:checked + .menu-button-container .menu-button::after {
            margin-top: 0;
            transform: rotate(-45deg);
        }

        @media (max-width: 700px) {
            .menu-button-container {
                display: flex;
            }
            .menu {
                position: absolute;
                top: 0;
                margin-top: 65px;
                left: 0;
                flex-direction: column;
                width: 100%;
                justify-content: center;
                align-items: center;
                background: #9FA4C4;
                box-shadow: 0 2px 5px rgba(0,0,0,0.1);
                z-index: 10;
            }
            #menu-toggle ~ .menu li {
                height: 0;
                margin: 0;
                padding: 0;
                border: 0;
            }
            #menu-toggle:checked ~ .menu li {
                border: 1px solid #9f9a9a;
                height: 2.5em;
                padding: 0.5em;
                transition: height 0.3s;
            }
            .menu > li {
                display: flex;
                justify-content: center;
                margin: 0;
                padding: 0.5em 0;
                width: 100%;
                color: black;
                background-color: #E8E8E8;
            }
            .menu > li:not(:last-child) {
                border-bottom: 1px solid #444;
            }
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            border-radius: 8px;
            margin-top: 20px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .container:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 10px rgba(0,0,0,0.15);
        }

        .header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .header .logo img {
            width: 100px;
            height: auto;
        }

        .header h1 {
            margin-left: 20px;
        }

        .contact-details {
            margin-top: 20px;
        }

        .contact-details h2 {
            margin-bottom: 10px;
            font-size: 24px;
            color: #3D0E61;
            position: relative;
        }

        .contact-details h2::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -5px;
            width: 50px;
            height: 2px;
            background: #9E768F;
        }

        .contact-details p {
            margin-bottom: 10px;
            line-height: 1.6;
        }
    </style>
</head>
<body>
<section class="nav">
    <input id="menu-toggle" type="checkbox" />
    <label class="menu-button-container" for="menu-toggle">
        <div class="menu-button"></div>
    </label>
    <ul class="menu">
        <li><a href="index2.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="contact.php">Contact</a></li>
    </ul>
</section>
<div class="container">
    <header class="header">
        <div class="logo"><img src="ada.jpg" alt="Logo"></div>
        <h1>Contact Us</h1>
    </header>
    <div class="contact-details">
        <h2>Adaptix Inc.</h2>
        <p><strong>Address:</strong> Alvear E, Poblacion, Lingayen, 2401 Pangasinan</p>
        <p><strong>Phone:</strong> (123) 456-7890</p>
        <p><strong>Email:</strong> contact@adaptixinc.com</p>
        <p><strong>Business Hours:</strong> Monday - Friday, 9:00 AM - 5:00 PM</p>
    </div>
</div>
</body>
</html>
