<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Client;
use App\Models\Type_visite;
use App\Models\Visitte;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use function PHPSTORM_META\map;

class AuthController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required']
        ]);
        $user = Admin::where('email', '=', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $request->session()->put('id_login', $user->id);
                $request->session()->put('isadmin', $user->admin);

                return redirect('dashboard');
            } else {
                return back()->with('fail', 'Password not correct !');
            }
        } else {
            return back()->with('fail', 'This email is not registred !');
        }
    }

    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => ['required','string'],
            'prenom'=> ['required'],
            'email' => ['required','string','email'],
            'tel' => ['required', 'max: 10'], 
            'adress' => ['required'],
            'password' => ['required']
        ]);

        $user = new Admin();
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->tel = $request->tel;
        $user->adress = $request->adress;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        //dd($user);
        $result = $user->save();
        if ($result) {
            return back()->with('success', 'registred successfuly');
        } else {
            return back()->with('fail', 'error !!!');
        }
    }

    public function dashboard(Request $request)
    {
        $admin = array();
        if ($request->Session()->has('id_login')) {
            $admin = Admin::where('id', '=', $request->Session()->get('id_login'))->first();
        }
        return view('dashboard', compact('admin'));
    }

    public function admin(Request  $request)
    {   
        $events = array();
        $calclient = Client::with('contactte')->get();

        //dd($calclient);
        $calendar = Visitte::where('admin_id', session()->get('id_login'))->get();
        $v_type = Type_visite::all();
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
       
        return view('calendar.index', compact('events','calendar', 'calclient', 'v_type'));
    }

    public function logout(Request $request)
    {
        if ($request->Session()->has('id_login')) {
            $request->Session()->pull('id_login');
            $request->Session()->pull('isadmin');
            return redirect('/');
        }
    }
}
