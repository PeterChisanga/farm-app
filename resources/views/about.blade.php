<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farm Management System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        nav {
            display: flex;
            justify-content: right;
            background-color: #333;
            width: 100%;
        }
        nav a {
            color: white;
            padding: 14px 20px;
            text-decoration: none;
            text-align: center;
        }
        nav a:hover {
            background-color: #ddd;
            color: black;
        }
        .container {
            width: 100%;
            margin: auto;
            overflow: hidden;
        }
        .showcase {
            position: relative;
            background: url('{{ asset('assets/images/cattle-3.jpg') }}') no-repeat center center/cover;
            color: #ffffff;
            height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        .showcase::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }
        .showcase > div {
            position: relative;
            z-index: 2;
        }
        .showcase h1 {
            font-size: 3em;
            margin: 0;
        }
        .buttons {
            margin-top: 20px;
        }
        .buttons a {
            text-decoration: none;
            color: white;
            background-color: #56c259;
            padding: 10px 20px;
            border-radius: 5px;
            margin: 0 10px;
        }
        .buttons a:hover {
            color: white;
            background-color: #2f6f31;
        }
        .content {
            padding: 20px;
            margin-bottom: 5px;
            display: flex;
            justify-content: space-between;
        }
        .content-col {
            text-align: left;
            flex-basis: 48%;
            padding: 30px 2px;
        }
        .col-img {
        }
        .content-col img {
            width: 100%;
            height: 100%;
        }
        .about-col h1 {
         padding-top: 0;
        }
        .about-col p {
         padding: 15px 0 25px;
        }
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
            width: 100%;
            bottom: 0;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <nav>
        <a href="/">Home</a>
        <a href="/about">About Us</a>
        <a href="/contact">Contact</a>
    </nav>
    <div class="container">
        <div class="showcase">
            <div>
                <h1>About Us</h1>
            </div>
        </div>
        <div class="content">
            <div class="content-col">
                <h1>Cultivate Efficiency: Streamline Your Farm Operations</h1>
                <p>This application is the product of my end-of-studies project (PFE). Developed using PHP Laravel for the backend and HTML, CSS, Bootstrap, and JavaScript for the frontend, this Farm Management System (FMS) is designed to enhance farm management practices. It provides a centralized platform to manage crops, livestock, finances, and more, streamlining operations and boosting productivity. The FMS includes features like automated record-keeping, advanced data visualization, and real-time analytics, enabling farmers to make informed decisions and optimize resource allocation.</p>
            </div>
            <div class="content-col col-img">
                <img src="{{ asset('assets/images/maize-4.jpg') }}" alt="Farm Image" width="100%" height="300px">
            </div>
        </div>
    </div>
    <footer>
        <p>&copy; 2024 Farm Management System. Peter Chisanga MWAMBA. All rights reserved.</p>
    </footer>
</body>
</html>
