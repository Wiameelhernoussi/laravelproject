<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        body {
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
            margin-top: 60px;
        }
        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-container {
            text-align: center;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .form-container h2 {
            font-size: 1.6rem;
            color: #003c69;
        }
        .form-container input, .form-container button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
        }
        .form-container button {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        .form-container button:hover {
            background-color: #0056b3;
        }
        .alert {
            padding: 10px;
            margin: 10px 0;
        }
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
        }
    </style>
</head>
<body>
    
<img src="https://png.pngtree.com/png-vector/20190830/ourmid/pngtree-magnifying-glass-research-logo-designs-inspiration-isolated-on-png-image_1716504.jpg" class="logo" alt="Research Logo">
<div class="container mt-5">
    <div class="form-container">
        <h2>Sign In</h2>
        <!-- Messages de succès -->
        @if(session('success'))
            <div class='alert alert-success'>{{ session('success') }}</div>
        @endif
        <!-- Messages d'erreur -->
        @if($errors->any())
            <div class='alert alert-danger'>{{ $errors->first() }}</div>
        @endif
        <form method="post" action="{{ route('signin') }}">
            @csrf
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Sign In</button>
        </form>
    </div>
</div>
</body>
</html>