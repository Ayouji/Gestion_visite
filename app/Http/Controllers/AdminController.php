<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Type_visite;
use App\Models\Visitte;
use Illuminate\Http\Request;

use function PHPSTORM_META\type;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $commercial = Admin::where('admin', 0)->get();
        $type_visite = Type_visite::all();
        $type_vi = $request->type_visite;
        $admin_id = $request->admin_id;
        // dd($count);
        $search = Visitte::with('admin')->where('type_visite', 'like', '%' . $type_vi . '%')
        ->where('admin_id', 'like', '%' . $admin_id . '%')
        ->get();
        $count = count($search);

         return view('admin.commercil', compact('commercial', 'type_visite', 'search', 'count'));
    }

     public function search(Request $request)
    {
        /* $search = $request->search;
        $client = Admin::where('nom', 'like','%'. $search. '%')->get();
        dd($client);
        return view('calendar.index',compact('client')); */
    } 

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
