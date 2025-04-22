<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <!-- Autres styles ou scripts nécessaires -->
</head>
<body>
    <div class="container">
        @yield('content') <!-- C'est ici que le contenu spécifique à chaque page sera injecté -->
    </div>
</body>
</html>