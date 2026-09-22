<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'BSIT Alliance')</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            color: #333;
        }

        header {
            background-color: #800000;
            color: white;
            padding: 25px;
            text-align: center;
        }

        header h1 {
            color: white;
        }

        nav {
            background-color: #5c0000;
            padding: 15px;
            text-align: center;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            font-weight: bold;
        }

        nav a:hover {
            color: #ffd700;
        }

        main {
            max-width: 1000px;
            margin: 30px auto;
            padding: 20px;
            min-height: 500px;
        }

        .card {
            background-color: white;
            padding: 25px;
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        h1, h2 {
            color: #800000;
            margin-bottom: 15px;
        }

        p {
            line-height: 1.6;
            margin-bottom: 15px;
        }

        ul {
            margin-left: 25px;
        }

        li {
            margin-bottom: 10px;
        }

        footer {
            background-color: #800000;
            color: white;
            text-align: center;
            padding: 20px;
        }

        footer p {
            margin: 0;
        }

        .alert {
            background-color: #fff3cd;
            border: 1px solid #ffe69c;
            color: #664d03;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

<header>
    <h1>PUPC BSIT Alliance</h1>
    <p>Information Technology Student Organization</p>
</header>

<nav>
    <a href="/">Home</a>
    <a href="/about">About</a>
    <a href="/contact">Contact</a>
</nav>

<main>
    @yield('content')
</main>

<footer>
    <p>&copy; 2026 PUPC BSIT Alliance. All Rights Reserved.</p>
</footer>

</body>
</html>