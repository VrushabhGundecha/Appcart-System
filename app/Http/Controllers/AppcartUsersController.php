<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AppcartUser;

class AppcartUsersController extends Controller
{
    // public function index()
    // {
    //     // to check user is authenticated or not
    //     $currentUser = auth()->user();

    //     $users = AppcartUser::all();
    //     return view('index', compact('users'));
    // }

    public function index(Request $request)
    {
        // Check if user is authenticated
        $currentUser = auth()->user();

        // Query users based on role
        if ($currentUser->role === 'admin') {
            // Admin can see all users
            $usersQuery = AppcartUser::query();
        } elseif ($currentUser->role === 'employee') {
            // Employee can only see their own details
            $usersQuery = AppcartUser::where('id', $currentUser->id);
        } else {
            // Handle other roles or unauthorized access
            abort(403); // Forbidden
        }

        // Search functionality
        $search = $request->query('search');
        if ($search) {
            $usersQuery->where('name', 'like', "%$search%")
                       ->orWhere('email', 'like', "%$search%");
                       
        }

        $users = $usersQuery->paginate(10); // 10 users per page

        return view('index', compact('users'));
    }


    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' =>'required|confirmed',
            'mobile' => 'required|string',
            'gender' => 'required|in:male,female',
            'position' => 'required|string',
            'address' => 'required|string',
            'dob' => 'required|date',
            'salary' => 'required|numeric',
            'role' => 'required|in:admin,employee',
        ]);

        AppcartUser::create($validatedData);

        return redirect()->route('users.index')->with('success', 'User added successfully');
    }

    public function edit($id)
    {
        $user = AppcartUser::findOrFail($id);
        return view('edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // Validation logic here

        $user = AppcartUser::findOrFail($id);
        $user->update($request->all());

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        $user = AppcartUser::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
}


