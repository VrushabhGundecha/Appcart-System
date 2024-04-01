@extends('app')

@section('content')
    
    <h1>Edit User</h1>
    
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="gender-role">
            <label>Select Role : </label>
            <input type="radio" name="role" id="admin" value="admin" {{ $user->role === 'admin' ? 'checked' : '' }} required>
            <label for="admin">Admin</label>
            <input type="radio" name="role" id="employee" value="employee" {{ $user->role === 'employee' ? 'checked' : '' }} required>
            <label for="employee">Employee</label>
        </div>

        <label for="name">Name : </label>
        <input type="text" id="name" name="name" value="{{ $user->name }}" required>

        <label for="email">Email : </label>
        <input type="email" id="email" name="email" value="{{ $user->email }}" required>
        @error('email')
            <span class="text-danger">{{ $message }}</span>   
        @enderror

        <label for="password">Password : </label>
        <input type="password" id="password" name="password" required>

        <div class="form-group">    
            <label for="mobile">Mobile : </label>
            <input type="number" id="mobile" name="mobile" value="{{ $user->mobile }}" required>
        </div>

        <div class="gender-role">
            <label>Gender : </label>
            <input type="radio" name="gender" id="male" value="male" {{ $user->gender === 'male' ? 'checked' : '' }} required>
            <label for="male">Male</label>
            <input type="radio" name="gender" id="female" value="female" {{ $user->gender === 'female' ? 'checked' : '' }} required>
            <label for="female">Female</label>
        </div>

        <label for="position">Position : </label>
        <input type="text" id="position" name="position" value="{{ $user->position }}" required>

        <label for="address">Address : </label>
        <textarea name="address" id="address" required>{{ $user->address }}</textarea>

        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" value="{{ $user->dob }}" required>

        <label for="salary">Salary : </label>
        <input type="number" id="salary" name="salary" value="{{ $user->salary }}" required>
        
        <div>
            <button type="submit" class="submit-btn">Submit</button>
            <a href="{{ route('users.index') }}" class="btn btn-back">Back</a>
        </div>


    </form>

@endsection
