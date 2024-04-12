<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            //validate the request
            $re = $request->validate([
                'name' => 'string|min:2|max:21|required|unique:users,name',
                'email' => 'email|required|unique:users,email',
                'password' => 'string|min:6|max:21|required'
            ]);
            
            //Encrypt the password
            $re['password'] = Hash::make($re['password']);

            //create the user
            $user = User::create($re);

            //log the user
            auth()->login($user);
            //redirect the user to a route with session named success
            return redirect('/blog')->with('success', 'Your account has been created.');
            

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
    public function edit()
    {
        return view('auth.edit',[
            'user' => auth()->user()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $user = User::findOrFail($id);

    $attributes = $request->validate([
        'name' => 'string|min:2|max:21|unique:users,name,' . $user->id,
        'email' => 'email|unique:users,email,' . $user->id,
        'image' => 'string',
    ]);

    
    $user->update($attributes);

    return redirect()->back();
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
