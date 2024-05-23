<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
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
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
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
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
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
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-top: 20px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .container:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        }

        header {
            text-align: center;
            margin-bottom: 40px;
        }

        header h1 {
            font-size: 36px;
            color: #3D0E61;
            position: relative;
        }

        header h1::after {
            content: '';
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            bottom: -10px;
            width: 100px;
            height: 3px;
            background: #9E768F;
        }

        .member {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding: 20px;
            margin: 20px 0;
            border: 1px solid #ddd;
            border-radius: 10px;
            transition: transform 0.3s, box-shadow 0.3s;
            background-color: #fff;
        }

        .member:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .member img {
            border-radius: 50%;
            width: 150px;
            height: 150px;
            object-fit: cover;
            margin-bottom: 10px;
            transition: transform 0.3s;
        }

        .member img:hover {
            transform: scale(1.1);
        }

        .member h2 {
            margin-bottom: 10px;
            font-size: 22px;
            color: #3D0E61;
        }

        .member p {
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
    <header>
        <h1>About Us</h1>
    </header>
    <div class="member">
        <img src="member1.jpg" alt="Member 1">
        <h2>Jenry Castro</h2>
        <p>Role: Project Manager</p>
    </div>
    <div class="member">
        <img src="member2.jpg" alt="Member 2">
        <h2>Tristan Carino</h2>
        <p>Role: Lead Developer</p>
    </div>
    <div class="member">
        <img src="member3.jpg" alt="Member 3">
        <h2>Clarence Macaraeg</h2>
        <p>Role: UX/UI Designer</p>
    </div>
    <div class="member">
        <img src="member4.jpg" alt="Member 4">
        <h2>Danzil Mejia</h2>
        <p>Role: Marketing Specialist</p>
    </div>
    <div class="member">
        <img src="member5.jpg" alt="Member 5">
        <h2>Jefferson Estabillo</h2>
        <p>Role: Data Analyst</p>
    </div>
</div>
</body>
</html>
