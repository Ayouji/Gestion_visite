<?php

namespace App\Http\Controllers;

use App\Models\Visitte;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function chart()
    {
        $chart = Visitte::selectRaw('MONTH(date_start) as month, COUNT(*) as count') 
            ->whereYear('date_start', date('Y'))
            ->groupBy('month')
            ->orderBy('month')
            ->get();
        $labels = [];
        $data = [];
        $color = ['#FFA07A','#E9967A','#FA8072','#F08080','#CD5C5C','#E9967A'];
        for($i=1; $i <= 12; $i++ ){
            $month = date('F', mktime(0,0,0,$i,1));
            $count = 0;
        foreach ($chart as $row) {
            if($row->month == $i){
                $count = $row->count;
                break;
            }
        }
        array_push($labels,$month);
        array_push($data, $count);
    }
    $datasets = [
        [
            'label' => 'Visites orderBy Month',
            'data' => $data,
            'backgroundColor' => $color
        ]
        
        ];
        return view('admin.chart', compact('labels', 'datasets'));

    }
}
