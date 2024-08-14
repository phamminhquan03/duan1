<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Display a list of users
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('user'));
    }

    // Show form to create a new user
    public function create()
    {
        return view('user.create');
    }

    // Store a new user in the database
    public function store(Request $request)
    {
        // Validate the data from the form
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'type' => 'required|string|max:50', // Validate 'type' field
            'password' => 'required|string|min:8|confirmed', // Ensure password is confirmed
        ]);

        // Create a new user instance
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->type = $request->type; // Set user type
        $user->password = Hash::make($request->password); // Hash the password

        // Save the user to the database
        $user->save();

        // Redirect to the index page or any other page you prefer
        return redirect()->route('users.index')->with('success', 'User created successfully!');
    }

    // Show form to edit an existing user
    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    // Update an existing user in the database
    public function update(Request $request, User $user)
    {
        // Validate the data from the form
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'type' => 'required|string|max:50', // Validate 'type' field
            'password' => 'nullable|string|min:8|confirmed', // Make password optional for update
        ]);

        // Update user details
        $user->name = $request->name;
        $user->email = $request->email;
        $user->type = $request->type;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password); // Hash the password if provided
        }

        // Save the updated user to the database
        $user->save();

        // Redirect to the index page or any other page you prefer
        return redirect()->route('user.index')->with('success', 'User updated successfully!');
    }

    // Delete a user from the database
    public function destroy(User $user)
    {
        $user->delete();

        // Redirect to the index page or any other page you prefer
        return redirect()->route('user.index')->with('success', 'User deleted successfully.');
    }
}
