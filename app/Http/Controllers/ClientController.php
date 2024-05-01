<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Contactte;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client = Client::with('contactte')->get();
        return view('admin.client', compact('client'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('client.create');
    }

    public function contact()
    {   
        $client = Client::all();
        return view('client.contact', compact('client'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nom' => ['required'],
            'tel' => ['required', 'max: 10'],
            'adress' => ['required'],
            'email' => ['required', 'email']
        ]);
        $email = $request->email;
        $findMail = Client::where('email', $email)->first();
        if($findMail){
            return redirect()->back()->with('error', 'client exist déja !!');
        }
        
        $client = new Client();
        $client->nom = $request->nom;
        $client->tel = $request->tel;
        $client->adress = $request->adress;
        $client->email = $email;
        $client->save();
        return redirect()->back()->with('succes', 'client has created !!');
    }
    public function store_2(Request $request)
    {
        $request->validate([
            'nom' => ['required'],
            'tel' => ['required', 'max: 10'],
            'prenom' => ['required'],
        ]);
        $nom = $request->nom;
        $prenom = $request->prenom;
        $findNom = Contactte::where('nom', $nom && 'prenom', $prenom)->first();
        if($findNom){
            return redirect()->back()->with('error', 'contact exist déja !!');
        }
        
        $contact = new Contactte();
        $contact->client_id = $request->client_id;
        $contact->nom = $request->nom;
        $contact->tel = $request->tel;
        $contact->prenom = $request->prenom;
        $contact->save();
        return redirect()->back()->with('succes', 'contact has created !!');
    }
    public function show(string $id)
    {
        //
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
        $Delclient = Client::findOrfail($id);
        $Delclient->delete();
        return redirect()->back()->with('delete', 'suprimer avec susses !!');
    }
}
