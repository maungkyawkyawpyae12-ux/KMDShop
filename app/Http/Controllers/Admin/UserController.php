<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(5);

        return view('admin.users.index', compact('users'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $user = new User();

        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role = $request->role;

        // Upload Image
        if ($request->hasFile('profile')) {

            $file_name = time() . '.' . $request->profile->extension();

            $request->profile->move(
                public_path('images/users'),
                $file_name
            );

            $user->profile = 'images/users/' . $file_name;
        }

        $user->save();

        return redirect()
            ->route('backend.users.index')
            ->with('success', 'User created successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->role = $request->role;


        // Update Password only if entered
        if ($request->filled('password')) 
            {
              $user->password = $request->password;
            }


        // Update Image
        if ($request->hasFile('profile')) {

            // Delete old image
            if (
                !empty($request->old_profile) &&
                file_exists(public_path($request->old_profile))
            ) {
                unlink(public_path($request->old_profile));
            }


            // Upload new image
            $file_name = time() . '.' . $request->profile->extension();

            $request->profile->move(
                public_path('images/users'),
                $file_name
            );

            $user->profile = 'images/users/' . $file_name;
        }


        $user->save();

        return redirect()
            ->route('backend.users.index')
            ->with('success', 'User updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        // Delete profile image
        if (
            !empty($user->profile) &&
            file_exists(public_path($user->profile))
        ) {
            unlink(public_path($user->profile));
        }

        $user->delete();

        return redirect()
            ->route('backend.users.index')
            ->with('success', 'User deleted successfully');
    }
}
