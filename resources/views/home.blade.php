<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
        }
        .navbar img {
            height: 50px;
        }
        .navbar a {
            color: #fff;
            margin: 0 10px;
            text-decoration: none;
        }
        .navbar a.active {
            font-weight: bold;
        }
        .banner {
            text-align: center;
            padding: 50px 0;
            background-color: #007bff;
            color: #fff;
        }
        .container {
            padding: 20px;
        }
        .search-bar {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        .search-bar input {
            width: 300px;
            margin-right: 10px;
        }
        .topic-buttons {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }
        .topic-buttons button {
            margin: 5px;
        }
        .footer {
            text-align: center;
            padding: 20px;
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>
<body>
<div class="navbar">
    <img src="https://png.pngtree.com/png-vector/20190830/ourmid/pngtree-magnifying-glass-research-logo-designs-inspiration-isolated-on-png-image_1716504.jpg" alt="Logo">
    <div>
        <a href="{{ route('home') }}" class="active">Home</a>
        <a href="{{ route('profile') }}">Profile</a>
        <a href="{{ route('logout') }}">Logout</a>
    </div>
</div>

<div class="banner">
    <h1>Welcome, {{ htmlspecialchars($user->user_name) }}!</h1>
    <p>Discover scientific knowledge and stay connected to the world of science</p>
</div>

<div class="container">
    <!-- Search Bar -->
    <form action="{{ route('search') }}" method="get" class="search-bar">
        <input type="text" name="query" placeholder="Discover research..." class="form-control mb-3">
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    <h2 class="text-center">Visit Topic Pages</h2>
    <div class="topic-buttons">
        <!-- Vérifiez si $user->domains n'est pas vide avant de faire la boucle -->
        @if($user->domains && $user->domains->count() > 0)
            @foreach ($user->domains as $domain)
                <button class="btn btn-primary">{{ $domain->name }}</button>
            @endforeach
        @else
            <p>No domains found.</p>
        @endif
    </div>
</div>

<div class="footer">
    <p>&copy; 2023 Research Platform. All rights reserved.</p>
</div>
</body>
</html>