
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - ResearchHub</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        /* Styles here */
    </style>
</head>
<body>
    <div class="navbar">
        <span>ResearchHub</span>
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('profile') }}" class="active">Profile</a>
        <a href="{{ route('logout') }}">Logout</a>
    </div>

    <div class="container">
        <div class="profile-header">
            <h3>{{ $user->name }}</h3>
            <div class="profile-info">
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Domain:</strong> {{ $user->domain }}</p>
                <p><strong>Team:</strong> {{ $user->team }}</p>
                <p><strong>Specialty:</strong> {{ $user->specialty }}</p>
            </div>
            <a href="{{ route('edit_profile') }}" class="btn btn-primary">Update Profile</a>
        </div>

        <div class="research-actions">
            <h3>Add a New Research</h3>
            <form action="{{ route('add_research') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Research Title</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="file" class="form-label">Upload Document</label>
                    <input type="file" class="form-control" id="file" name="file" required>
                </div>
                <button type="submit" class="btn btn-success">Add Research</button>
            </form>
        </div>

        <div class="research-list">
            <h3>Your Research</h3>
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>File</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($researches as $research)
                        <tr>
                            <td>{{ $research->title }}</td>
                            <td>{{ $research->description }}</td>
                            <td><a href="{{ Storage::url($research->file_path) }}" download>Download</a></td>
                            <td>
                                <a href="{{ route('edit_research', $research->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <a href="{{ route('delete_research', $research->id) }}" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    @if ($researches->isEmpty())
                        <tr>
                            <td colspan="4" class="text-center">No research found.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>