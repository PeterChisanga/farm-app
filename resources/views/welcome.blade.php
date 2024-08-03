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
            /* position: fixed; */
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
            background: rgba(0, 0, 0, 0.5); /* Black color with 50% opacity */
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
            /* height: 60px; */
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
                <h1>Welcome to the Farm Management System</h1>
                <div class="buttons">
                    <a href="/login" class="btn btn-primary">Login</a>
                    <a href="/users/create" class="btn btn-secondary">Register</a>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="content-col">
                <h1>Cultivate Efficiency: Streamline Your Farm Operations</h1>
                <p>Take control of your farm with our Farm Management System! Manage crops, livestock, finances, and more – all in one place. Streamline your activities, boost productivity, and make data-driven decisions for a thriving farm.</p>
                <div class="buttons">
                     <a href="/about" class="">Learn More</a>
                </div>
            </div>
            <div class="content-col col-img">
                <img src="{{ asset('assets/images/maize-3.jpg') }}" alt="Farm Image" width="100%" height="300px">
            </div>
        </div>
        <div class="content">
            <div class="content-col col-img">
                <img src="{{ asset('assets/images/sheep-2.jpg') }}" alt="Farm Image" width="100%" height="300px">
            </div>
            <div class="content-col">
                <h1>Thriving Flocks & Herds: Manage Your Livestock with Ease</h1>
                <p>Empower your animal management with our Farm Management System! From breeding and health records to performance tracking, our system offers comprehensive features for managing your livestock. Track breeding, health, and feeding schedules to ensure the well-being of your animals and maximize their productivity, ultimately increasing your farm's overall efficiency and success.</p>
                <div class="buttons">
                     <a href="/about" class="">Learn More</a>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="content-col">
                <h1>Maximize Your Farm Income</h1>
                <p>Gain financial clarity with our Farm Management System! Track expenses, analyze profitability, and make informed decisions to grow your farm income. Our system empowers you to optimize resource allocation and maximize your return on investment.</p>
                <div class="buttons">
                     <a href="/about" class="">Learn More</a>
                </div>
            </div>
            <div class="content-col col-img">
                <img src="{{ asset('assets/images/income-4.jpg') }}" alt="Farm Image" width="100%" height="300px">
            </div>
        </div>
    </div>
    <footer>
        <p>&copy; 2024 Farm Management System. Peter Chisanga MWAMBA. All rights reserved.</p>
    </footer>
</body>
</html>


