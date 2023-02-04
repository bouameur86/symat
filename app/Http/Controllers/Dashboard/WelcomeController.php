<?php

namespace App\Http\Controllers\Dashboard;

use App\Client;
use App\Commune;
use App\End;
use App\User;
use App\Ligne;
use App\Poste;
use App\Wilaya;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function index()
    {
    // cards TR - ligne - poste - parc
       $postes_count = Poste::count();
       $wilayas_count = Wilaya::count();
       $lignes_count= Ligne::count();
       $communes_count = Commune::count();
       $clients_count = Client::count();
       $users_count = User::whereRoleIs('admin')->count();

         // chartes JS -

         $chartjs = app()->chartjs
         ->name('lineChartTest')
         ->type('line')
         ->size(['width' => 400, 'height' => 200])
         ->labels(['January', 'February', 'March', 'April', 'May', 'June', 'July'])
         ->datasets([
             [
                 "label" => "My First dataset",
                 'backgroundColor' =>"rgba(38, 185, 154, 0.31)",
                 'borderColor' => "rgba(38, 185, 154, 0.7)",
                 "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                 "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                 "pointHoverBackgroundColor" => "#fff",
                 "pointHoverBorderColor" => "rgba(220,220,220,1)",
                 'data' => [65, 59, 80, 81, 56, 55, 40],
             ],
             [
                 "label" => "My Second dataset",
                 'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                 'borderColor' => "rgba(38, 185, 154, 0.7)",
                 "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                 "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                 "pointHoverBackgroundColor" => "#fff",
                 "pointHoverBorderColor" => "rgba(220,220,220,1)",
                 'data' => [12, 33, 44, 44, 55, 23, 40],
             ]
             ]);

                    // end graphe one
         $chartjs2 = app()->chartjs
         ->name('barChartTest')
         ->type('bar')
         ->size(['width' => 400, 'height' => 200])
         ->labels(['END par DTE'])
         ->datasets([
               // END Alg et objectif
             [
                 "label" => "DTE/ALG",
                 'backgroundColor' => ['#ec524b'],
                 'data' => [69, 59]
             ],
             [
                "label" => "objectif", 
                'backgroundColor' => ['#2596be'],
                 'data' => [65, 12]
             ],
             [ 
                'backgroundColor' => ['#FFFFFD'],
                'data' => [2, 2]
            ],
        
             // END CAP et objectif
             [
                "label" => "DTE/CAP",
                'backgroundColor' => ['#EB1AF7'],
                'data' => [25, 59]
            ],
            [
                "label" => "objectif", 
                'backgroundColor' => ['#2596be'],
                'data' => [20, 12]
            ],
            [ 
               'backgroundColor' => ['#FFFFFD'],
               'data' => [2, 2]
           ],
          
                // END STIF et objectif
                [
                    "label" => "DTE/STIF",
                    'backgroundColor' => ['#e28743'],
                    'data' => [49, 59]
                ],
                [
                    "label" => "objectif",  
                    'backgroundColor' => ['#2596be'],
                    'data' => [57, 12]
                ],
                [
                'backgroundColor' => ['#FFFFFD'],
                'data' => [2, 2]
                ],
                // END STIF et objectif
                [
                    "label" => "DTE/AN",
                    'backgroundColor' => ['#1b2e68'],
                    'data' => [77, 30]
                ],
                [
                    "label" => "objectif", 
                    'backgroundColor' => ['#2596be'],
                    'data' => [70, 12]
                ],
                [
                    'backgroundColor' => ['#FFFFFD'],
                    'data' => [2, 2]
                ],
                 // END HM et objectif
                 [
                    "label" => "DTE/HM",
                    'backgroundColor' => ['#F7E313'],
                    'data' => [30, 59]
                ],
                [
                    "label" => "objectif",  
                    'backgroundColor' => ['#2596be'],
                    'data' => [26, 18]
                ],
                [
                    'backgroundColor' => ['#FFFFFD'],
                    'data' => [2, 2]
                ],
                // END ORAN et objectif
                [
                    "label" => "DTE/ORN",
                    'backgroundColor' => ['#2DE620'],
                    'data' => [60, 59]
                ],
                [
                    "label" => "objectif",  
                    'backgroundColor' => ['#2596be'],
                    'data' => [52, 18]
                ],
                [
                    'backgroundColor' => ['#FFFFFD'],
                    'data' => [2, 2]
                ],
 
            ])
            ->optionsRaw([

            'legend'=> [
                'display'=>false,
            ],
            'labels' => [
                'hover'=>false,
                ]
]);
                    // end par région
                    $chartjs3 = app()->chartjs
                    ->name('pieChartTest')
                    ->type('pie')
                    ->size(['width' => 550, 'height' => 300])
                    ->labels(['Label x', 'Label y' , 'Label z'])
                    ->datasets([
                        [
                            'backgroundColor' => ['#FF6384', '#36A2EB', '#fdd386' ],
                            'hoverBackgroundColor' => ['#FF6384', '#36A2EB'],
                            'data' => [35, 20, 45]
                        ]
                        ]);
                    
                                // end  graphe 2
                $chartjs4 = app()->chartjs
                ->name('pieChartTest2')
                ->type('pie')
                ->size(['width' => 550, 'height' => 300])
                ->labels(['Label x', 'Label y' , 'Label z'])
                ->datasets([
                    [
                        'backgroundColor' => ['#FF6384', '#36A2EB', '#fdd386' ],
                        'hoverBackgroundColor' => ['#FF6384', '#36A2EB'],
                        'data' => [25, 15, 60]
                    ]
                ])
                    ->options([]);

                // Anomalie par métier graphe 3
                $chartjs5 = app()->chartjs
                ->name('pieChartTest3')
                ->type('pie')
                ->size(['width' => 550, 'height' => 300])
                ->labels(['Label x', 'Label y' , 'Label z'])
                ->datasets([
                    [
                        'backgroundColor' => ['#FF6384', '#36A2EB', '#fdd386' ],
                        'hoverBackgroundColor' => ['#FF6384', '#36A2EB'],
                        'data' => [25, 15, 60]
                    ]
                ])
                ->options([]);
        //    $ends_data = End::select(
        //        DB::raw('YEAR(created_at) as year'),
        //        DB::raw('MONTH(created_at) as month'),
        //       DB::raw('SUM(energie) as sum')
        //    )->groupBy('month')->get();

        return view('dashboard.welcome', compact('chartjs' ,'chartjs2', 'chartjs3','chartjs4','chartjs5' , 'postes_count','wilayas_count','lignes_count','clients_count', 'users_count'));
    
    }//end of index
    
}//end of controller
