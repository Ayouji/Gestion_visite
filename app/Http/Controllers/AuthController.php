<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Commercial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Contracts\Service\Attribute\Required;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login()
    {
        return view('auth.login');
    }

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
    public function register(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'tel' => 'required',
            'adress' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        $register = new Commercial();
        $register->nom = $request->nom;
        $register->prenom = $request->prenom;
        $register->tel = $request->tel;
        $register->adress = $request->adress;
        $register->email = $request->email;
        $register->password = Hash::make($request->password);
        //dd($register);
        $register->save();

        return redirect()->route('auth.login');
    }

    /**
     * Display the specified resource.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'password' => ['required', 'min:6', 'max:12']
        ]);
        $user = Commercial::where('email', $request->email)->firstOrFail();

        if (Hash::check($request->password, $user->password)) {
            
            return redirect()->intended('/');
        }
        Auth::login($user);
        return back()->with('fail', 'Les informations d\'identification ne correspondent pas.');
    }
    


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
