<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Commercial;
use App\Models\Visitte;
use Illuminate\Http\Request;

class VisiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function inde2() {
       /*  $calclient = Visitte::where('visite_id',2)->first();
        dd($calclient->client); */
       // $calclient = Client::with('visites')->get();
        //dd($calclient); 

        //$calclient = Visitte::all();
        //return view('calendar.show', compact('calclient'));

        
    }
    public function index()
    {   
            $events = array();
            $calclient = Client::with('contactte')->get();

            //dd($calclient);
            $calendar = Visitte::all();
            //$calendar = Visitte::with('client')->get();
            foreach ($calendar as $calen){
                 $events [] = [
                    'id' => $calen->id,
                    'client_id' => $calen->client_id,
                    'contact_id' => $calen->contact_id,
                    'title' => $calen->objectif,
                    'start' => $calen->date_start,
                    'type_visite' => $calen->type_visite,
                    'date_h' => $calen->date_h,
    
                 ];
                 
            }
           
            return view('calendar.index', compact('events','calendar', 'calclient'));
    }

    public function store(Request $request)
    {   
        /* $request->validate([
            'objectif' => 'required|string',
            'date_start' => 'required|date',
            'client_id' => 'required',
            'contact_id' => 'required',
            'type_visite' => 'required',
            'date_h' => 'required|time',
        ] );  */
        
         $events = Visitte::create([
            'objectif' => $request->objectif,
            'commercial_id' => Commercial::all()->random()->commercial_id,
            'client_id' =>$request->client_id,
            'contact_id' => $request->contact_id,
            'date_start' => $request->date_start,
            'type_visite' => $request->type_visite,
            'date_h' => $request->date_h,
        ]);
        //dd($events);
        return response()->json($events);
    } 


        public function show($id)
            {
                $visite = Visitte::findOrFail($id);
                
                //dd($visite);
                //return response()->json($visite);
                return view('calendar.show', compact('visite'));
            }


}
