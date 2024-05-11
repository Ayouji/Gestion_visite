<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\Client;
use App\Models\Resulte;
use App\Models\Visitte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use function Laravel\Prompts\alert;

class ResultController extends Controller
{
    
    public function store(Request $request)
    {   
        $request->validate([
            'comment'=> ['required'],
            'type_result'=> ['required']
        ]);
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
            $result->admin_id = session()->get('id_login');
            $result->save();
            return redirect()->route('calendar.index')->with('ajouter', 'résult ajouté avec succès');
        }
    }
    public function store_2(Request $request)
    {
        //$etat = $request->input('etat');
        $visite_id = $request->visite_id;
        $existingResult = Resulte::where('visite_id', $visite_id)->first();
        //dd($visite_id);  
        if($existingResult){
            return redirect()->route('calendar.index')->with('error', 'cette résult exist déja');
        }
        else{
            $result = new Resulte();
            $result->etat = 'non';
            $result->comment = '-';
            $result->type_result = '-';
            $result->admin_id = session()->get('id_login');
            $result->visite_id = $request->input('visite_id');
            //dd($result);
            $result->save();
            return redirect()->route('calendar.index')->with('ajouter', 'résult ajouté avec succès mais etat non');
        }
    }
    
  

    public function update(Request $request, string $id)
{
    $events = array();
    $visite = Visitte::find($id);
    if (!$visite) {
        return redirect()->route('calendar.index')->with('error', 'La visite n\'existe pas');
    }
    $newVisite = $visite->replicate();
    $newVisite->date_start = $request->input('date_start');
    $newVisite->save();
    return redirect()->route('calendar.index')->with('success', 'La visite a été modifiée avec succès');
}


}
