<?php

namespace App\Http\Controllers;

use App\Models\Resulte;
use App\Models\Visitte;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

use function Laravel\Prompts\alert;

class ResultController extends Controller
{
    
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
            $result->visite_id = $request->input('visite_id');
            //dd($result);
            $result->save();
            return redirect()->route('calendar.index')->with('ajouter', 'résult ajouté avec succès mais etat non');
        }
    }
    
  

    public function update(Request $request, string $id)
        {
                $visite = Visitte::find($id);
                if (!$visite) {
                    return redirect()->route('calendar.index')->with('error', 'La visite n\'existe pas');
                }
                $newVisite = $visite->replicate();
                $visite->date_start = $request->input('date_start');
               // $visite->date_start = $newDateStart;
                $eventColor = 'blue';
                $visite->save();
                $newVisite->save();
                return redirect()->route('calendar.index',$eventColor)->with('success', 'La visite a été modifiée avec succès');
        }


}
