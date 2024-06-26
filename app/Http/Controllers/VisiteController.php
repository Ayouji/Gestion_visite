<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Auth;
use App\Models\Client;
use App\Models\Admin;
use App\Models\ModellEmail;
use App\Models\Resulte;
use App\Models\Ty_result;
use App\Models\Type_visite;
use App\Models\Visitte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\alert;

class VisiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function inde2() {

        return view('welcome');
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
                $calendar = Visitte::where('admin_id', session()->get('id_login'))->get();
                $v_type = Type_visite::all();

                foreach ($calendar as $calen) {
                    $color = null;
                    foreach ($v_type as $item) {
                        if ($calen->type_visite == $item->type_visite) {
                            $color = $item->color;
                            break; 
                        }
                    }
                    $result = Resulte::where('visite_id', $calen->id)->first();
                    //dd($result->etat == 'oui');
                    if($result){
                    if ($result->etat == 'oui') {
                        $icon = '&#10004;'; 
                    }
                    elseif ($result->etat == 'non') {
                        $icon = '&#10008;';
                    } 
                    elseif ($result->etat == 'raporter') {
                        $icon = '&#x2BAB;';
                        $color = '#D4D9DA';
                    }
                    else {
                        $icon = '&#9201;'; 
                    }
                }
                else{
                    $icon = '&#9201;'; 
                }
                    $events[] = [
                        'id' => $calen->id,
                        'client_id' => $calen->nom,
                        'contact_id' => $calen->contact_id,
                        'title' => $calen->objectif,
                        'start' => $calen->date_start,
                        'type_visite' => $calen->type_visite,
                        'date_h' => $calen->date_h,
                        'color' => $color,
                        'icon' => $icon,
                        'result' => $result
                    ];
                }
            
                return view('calendar.index', compact('events', 'calclient', 'v_type'));
}


    public function store(Request $request)
    {   
         /* $request->validate([
            'objectif' => ['required','string'],
            'date_start' => ['required','date'],
            'client_id' => ['required'],
            'contact_id' => ['required'],
            'type_visite' => ['required'],
            'date_h' => ['required','time'],
        ] );  */ 

        
         $events = Visitte::create([
            'objectif' => $request->objectif,
            'admin_id' => session()->get('id_login'),
            'client_id' =>$request->client_id,
            'contact_id' => $request->contact_id,
            'date_start' => $request->date_start,
            'type_visite' => $request->type_visite,
            'date_h' => $request->date_h,
        ]);
        //dd($events);
        return response()->json($events);
        //return redirect()->back();
    } 

        public function show($id)
            {   
                $result = Ty_result::all();
                $model = ModellEmail::all();
                $visite = Visitte::findOrFail($id);
                if($visite->admin_id !== session()->get('id_login')){
                    return redirect()->back()->with('error', 'Vous n\'êtes pas autorisé à afficher cette visite.');;
                }
                
                return view('calendar.show', compact('visite', 'result','model'));
            }
            public function detail($id) {
                $vresult = Resulte::with('visite')->where('visite_id', $id)->firstOrFail();
                if (session()->get('id_login') !== $vresult->admin_id) {
                    return redirect()->back()->with('error', 'Vous n\'êtes pas autorisé');
                }
                return view('calendar.detail', compact('vresult'));
            }
            

}
