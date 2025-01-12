<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Search Results for "{{ $query }}"</h1>
        @if($results->isEmpty())
            <p>No results found.</p>
        @else
            <ul class="list-group">
                @foreach($results as $result)
                    <li class="list-group-item">
                        <h5>{{ $result->user_name }}</h5>
                        <p>Email: {{ $result->email }}</p>
                        <p>Domain: {{ $result->domain }}</p>
                        <p>Specialty: {{ $result->specialty }}</p>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</body>
</html>