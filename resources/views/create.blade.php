@extends('app')

@section('content')
    
    <h1>Add Employee</h1>
        
    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        <div class="gender-role">
            <label>Select Role : </label>
            <input type="radio" name="role" id="admin" value="admin" required>
            <label for="admin">Admin</label>
            <input type="radio" name="role" id="employee" value="employee" required>
            <label for="employee">Employee</label>
        </div>

        <label for="name">Name : </label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email : </label>
        <input type="email" id="email" name="email" required>
        @error('email')
            <span class="text-danger">{{ $message }}</span>   
        @enderror

        <label for="password">Password : </label>
        <input type="password" id="password" name="password" required>

        <div class="form-group">    
            <label for="mobile">Mobile : </label>
            <input type="number" id="mobile" name="mobile" required>
        </div>

        <div class="gender-role">
            <label>Gender : </label>
            <input type="radio" name="gender" id="male" value="male" required>
            <label for="male">Male</label>
            <input type="radio" name="gender" id="female" value="female" required>
            <label for="female">Female</label>
        </div>

        <label for="position">Position : </label>
        <input type="text" id="position" name="position" required>

        <label for="address">Address : </label>
        <textarea name="address" id="address" required></textarea>

        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" required>

        <label for="salary">Salary : </label>
        <input type="number" id="salary" name="salary" required>
        
        <div>
            <button type="submit" class="submit-btn">Submit</button>
        </div>
    </form>

@endsection
