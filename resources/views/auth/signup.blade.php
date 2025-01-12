<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Sign Up</h2>
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form method="post" action="{{ route('handle-sign-up') }}">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">User Name</label>
                <input type="text" name="username" class="form-control" id="username" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" required>
            </div>
            <div class="mb-3">
                <label for="domain" class="form-label">Domain</label>
                <input type="text" name="domain" class="form-control" id="domain" required>
            </div>
            <div class="mb-3">
                <label for="team" class="form-label">Team</label>
                <input type="text" name="team" class="form-control" id="team" required>
            </div>
            <div class="mb-3">
                <label for="specialty" class="form-label">Specialty</label>
                <select name="specialty" class="form-select" id="specialty" required>
                    <option value="">Select Specialty</option>
                    <option value="doctorant">Doctorant</option>
                    <option value="doctorante">Doctorante</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Sign Up</button>
        </form>
    </div>
</body>
</html>