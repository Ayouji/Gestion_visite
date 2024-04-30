<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Resulte;
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
        $type = Type_visite::all();
        
        $type_vi = $request->type_visite;
        $admin_id = $request->admin_id;
        $search = Visitte::with('admin')
            ->where('type_visite', 'like', '%' . $type_vi . '%')
            ->where('admin_id', 'like', '%' . $admin_id . '%')
            ->get();
        // $searchCount =  count($search->where('admin_id', $admin_id));
        $admin_counts = [];
        foreach ($search as $item){
        if($item->admin->admin !== 1){
            if (!isset($admin_counts[$item->admin->id])){
                $admin_counts[$item->admin->id] = [];
                }
            if (!isset($admin_counts[$item->admin->id][$item->type_visite])){
                $admin_counts[$item->admin->id][$item->type_visite] = 1;
                }else{
                $admin_counts[$item->admin->id][$item->type_visite]++;
            }
        }                    
    }

    return view('admin.commercil', compact('commercial', 'type', 'search','admin_counts'));
    }

    public function show(Request $request, string $id)
    {    
        $result = Resulte::with('visite')->where('admin_id', $id)->get();
        return view('admin.detail', compact('result'));
    }

}
