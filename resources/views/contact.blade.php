<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Farm Management System</title>
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
            background: url('{{ asset('assets/images/contact-background.jpg') }}') no-repeat center center/cover;
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
        .contact-form {
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .contact-form h2 {
            margin: 0 0 15px;
        }
        .contact-form label {
            display: block;
            margin: 10px 0 5px;
        }
        .contact-form input,
        .contact-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .contact-form button {
            padding: 10px 20px;
            color: white;
            background-color: #56c259;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .contact-form button:hover {
            background-color: #2f6f31;
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
                <h1>Contact Us</h1>
            </div>
        </div>
        <div class="content">
            <div class="content-col">
                <h1>Get in Touch with Us</h1>
                <p>We'd love to hear from you! Whether you have a question about features, pricing, need a demo, or anything else, our team is ready to answer all your questions.</p>
            </div>
            <div class="content-col">
                <div class="contact-form">
                    <h2>Contact Form</h2>
                    <form action="/contact" >
                        @csrf
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" required>

                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>

                        <label for="message">Message:</label>
                        <textarea id="message" name="message" rows="4" required></textarea>

                        <button type="submit">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <p>&copy; 2024 Farm Management System. Peter Chisanga MWAMBA. All rights reserved.</p>
    </footer>
</body>
</html>
