<!DOCTYPE html> <!-- Document type. -->
<html lang="en"> <!-- Page language. -->

<head>
    <meta charset="UTF-8"> <!-- Character set. -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Viewport settings. -->

    <title>@yield('title', 'BSIT Alliance')</title> <!-- Page title. -->

    <style>
        /* Page styles. */
        * {
            box-sizing: border-box;
            /* Include borders. */
            margin: 0;
            /* Remove margins. */
            padding: 0;
            /* Remove padding. */
        }

        body {
            font-family: Arial, sans-serif;
            /* Set font. */
            background-color: #f5f5f5;
            /* Set background. */
            color: #333;
            /* Set text color. */
        }

        header {
            background-color: #800000;
            /* Header color. */
            color: white;
            /* Header text color. */
            padding: 25px;
            /* Header spacing. */
            text-align: center;
            /* Center header. */
        }

        header h1 {
            color: white;
            /* Heading color. */
        }

        nav {
            background-color: #5c0000;
            /* Navigation color. */
            padding: 15px;
            /* Navigation spacing. */
            text-align: center;
            /* Center navigation. */
        }

        nav a {
            color: white;
            /* Link color. */
            text-decoration: none;
            /* Remove underline. */
            margin: 0 15px;
            /* Link spacing. */
            font-weight: bold;
            /* Bold links. */
        }

        nav a:hover {
            color: #ffd700;
            /* Hover color. */
        }

        main {
            max-width: 1000px;
            /* Content width. */
            margin: 30px auto;
            /* Center content. */
            padding: 20px;
            /* Content spacing. */
            min-height: 500px;
            /* Minimum height. */
        }

        .card {
            background-color: white;
            /* Card background. */
            padding: 25px;
            /* Card spacing. */
            margin-bottom: 20px;
            /* Card separation. */
            border-radius: 10px;
            /* Rounded corners. */
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            /* Card shadow. */
        }

        h1,
        h2 {
            color: #800000;
            /* Heading color. */
            margin-bottom: 15px;
            /* Heading spacing. */
        }

        p {
            line-height: 1.6;
            /* Text spacing. */
            margin-bottom: 15px;
            /* Paragraph spacing. */
        }

        ul {
            margin-left: 25px;
            /* List indentation. */
        }

        li {
            margin-bottom: 10px;
            /* Item spacing. */
        }

        footer {
            background-color: #800000;
            /* Footer color. */
            color: white;
            /* Footer text color. */
            text-align: center;
            /* Center footer. */
            padding: 20px;
            /* Footer spacing. */
        }

        footer p {
            margin: 0;
            /* Remove paragraph margin. */
        }

        .alert {
            background-color: #fff3cd;
            /* Alert background. */
            border: 1px solid #ffe69c;
            /* Alert border. */
            color: #664d03;
            /* Alert text color. */
            padding: 15px;
            /* Alert spacing. */
            border-radius: 8px;
            /* Alert corners. */
            margin-bottom: 20px;
            /* Alert separation. */
        }
    </style>
</head>

<body>

    <header> <!-- Site header. -->
        <h1>PUPC BSIT Alliance</h1>
        <p>Information Technology Student Organization</p>
    </header>

    <nav> <!-- Site navigation. -->
        <a href="/">Home</a>
        <a href="/about">About</a>
        <a href="/contact">Contact</a>
    </nav>

    <main> <!-- Main content. -->
        @yield('content') <!-- Page content. -->
    </main>

    <footer> <!-- Site footer. -->
        <p>&copy; 2026 PUPC BSIT Alliance. All Rights Reserved.</p>
    </footer>

</body>

</html>