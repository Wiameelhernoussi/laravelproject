<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ResearchGate')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
        }
        .navbar {
            background-color: white;
            border-bottom: 1px solid #ddd;
            padding: 20px 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .navbar img {
            height: 6rem;
        }
        .navbar a {
            color: #003c69;
            text-decoration: none;
            margin-left: 20px;
            font-size: 1.1rem;
        }
        .navbar a.active {
            font-weight: bold;
            color: #0056b3;
            text-decoration: underline;
        }
        .banner {
            background-color: #003c69;
            color: white;
            padding: 40px 20px;
            text-align: center;
            margin-bottom: 40px;
            border-radius: 10px;
        }
        .footer {
            text-align: center;
            margin-top: 60px;
            font-size: 0.9rem;
            color: #aaa;
        }
    </style>
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>