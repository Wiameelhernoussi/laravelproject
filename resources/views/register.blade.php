<form method="POST" action="{{ route('register') }}">
    @csrf
    <!-- Champs du formulaire -->
    <div class="form-group">
        <label for="user_name">User Name</label>
        <input type="text" id="user_name" name="user_name" class="form-control" value="{{ old('user_name') }}" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="password_confirmation">Confirm Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="domain">Domain</label>
        <input type="text" id="domain" name="domain" class="form-control" value="{{ old('domain') }}" required>
    </div>
    <div class="form-group">
        <label for="team">Team</label>
        <input type="text" id="team" name="team" class="form-control" value="{{ old('team') }}" required>
    </div>
    <div class="form-group">
        <label for="specialty">Specialty</label>
        <select id="specialty" name="specialty" class="form-control" required>
            <option value="doctorant" {{ old('specialty') == 'doctorant' ? 'selected' : '' }}>Doctorant</option>
            <option value="doctorante" {{ old('specialty') == 'doctorante' ? 'selected' : '' }}>Doctorante</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Sign Up</button>
</form>