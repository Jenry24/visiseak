<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Search Engine</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
        }

        .nav {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            background-image: linear-gradient(to right, #9E768F, #9FA4C4);
            color: #3D0E61;
            height: 65px;
            padding: 1em;
            font-weight: bold;
            font-size: 25px;
        }

        .nav .logo {
            text-shadow: 2px 2px 4px #000000;
            color: white;
        }

        .menu li:hover {
            color: white;
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
            margin-top: 0px;
            transform: rotate(45deg);
        }

        #menu-toggle:checked + .menu-button-container .menu-button {
            background: rgba(255, 255, 255, 0);
        }

        #menu-toggle:checked + .menu-button-container .menu-button::after {
            margin-top: 0px;
            transform: rotate(-45deg);
        }

        @media (max-width: 700px) {
            .menu-button-container {
                display: flex;
            }
            .menu {
                position: absolute;
                top: 0;
                margin-top: 50px;
                left: 0;
                flex-direction: column;
                width: 100%;
                justify-content: center;
                align-items: center;
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
    </style>
    <link rel="stylesheet" href="style.css">
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
        <div class="logo"><img src="logo.png" alt="Logo"></div>
        <div class="heading"><h1>Image Search Engine</h1></div>
    </header>
    <div class="hero_section">
        <div class="search_box">
            <form id="search_bar">
                <input type="text" id="search_text" placeholder="Search Image" autocomplete="off">
                <button>Search</button>
            </form>
        </div>
        <div class="auth_buttons">
            <!-- Authentication buttons -->
            <a href="index.php"><button type="button" class="btn btn-primary">Log out</button></a>
            <a href="gallery.php"><button type="button" class="btn btn-primary">Gallery</button></a>
        </div>
        <div id="image_result"></div>
        <button id="load_more">Load More</button>
    </div>
    <!-- Gallery section -->
    <div class="gallery_section" style="display: none;">
        <!-- Your gallery content goes here -->
        <h2>Gallery</h2>
        <!-- You can display downloaded images or any other content related to the gallery -->
    </div>
</div>
<!-- Importing the JavaScript file -->
<script src="script.js"></script>
</body>
</html>
