<?php

namespace App\Http\Controllers;

use App\Models\Resulte;
use App\Models\Visitte;
use Illuminate\Http\Request;

use function Laravel\Prompts\alert;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $visite_id = $request->visite_id;
        $existingResult = Resulte::where('visite_id', $visite_id)->first();
        if ($existingResult) {
            return redirect()->route('calendar.index')->with('error', 'cette résult exist déja');
        } else {
            $result = new Resulte();
            $result->etat = $request->input('etat');
            $result->comment = $request->input('comment');
            $result->type_result = $request->input('type_result');
            $result->visite_id = $request->input('visite_id');
            $result->save();
            return redirect()->route('calendar.index')->with('ajouter', 'résult ajouté avec succès');
        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $result = Visitte::find($id);
        $result->date_start = $request->input('date_start');
        $result->date_h = $request->input('date_h');
        $result->update();
        return redirect()->route('calendar.index')->with('update', 'Update visite avec succès');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
