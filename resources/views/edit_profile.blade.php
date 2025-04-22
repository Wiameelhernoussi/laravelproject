<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile - ResearchHub</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        /* Styles here */
    </style>
</head>
<body>
    <div class="navbar">
        <span>ResearchHub</span>
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('profile') }}">Profile</a>
        <a href="{{ route('logout') }}">Logout</a>
    </div>

    <div class="container">
        <div class="profile-header">
            <h3>Edit Profile</h3>
            <form action="{{ route('update_profile') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="user_name" class="form-label">User Name</label>
                    <input type="text" class="form-control" id="user_name" name="user_name" value="{{ $user->user_name }}" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                </div>
                <div class="mb-3">
                    <label for="domain" class="form-label">Domain</label>
                    <input type="text" class="form-control" id="domain" name="domain" value="{{ $user->domain }}">
                </div>
                <div class="mb-3">
                    <label for="team" class="form-label">Team</label>
                    <input type="text" class="form-control" id="team" name="team" value="{{ $user->team }}" required>
                </div>
                <div class="mb-3">
                    <label for="specialty" class="form-label">Specialty</label>
                    <input type="text" class="form-control" id="specialty" name="specialty" value="{{ $user->specialty }}">
                </div>
                <button type="submit" class="btn btn-primary">Update Profile</button>
            </form>
        </div>
    </div>
</body>
</html>