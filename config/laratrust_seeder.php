<?php

use App\Trave;

return [
    'role_structure' => [
        'super_admin' => [

            'welcome' => 'c,r,u,d',
            /*  Organismes   */
            'organismes' => 'c,r,u,d,i',
            'equipements' => 'c,r,u,d,i',
            'postes' => 'c,r,u,d,i',
            'regions' => 'c,r,u,d',
            'structures'=> 'c,r,u,d',
            /*  Ouvrages   */
            'clients' => 'c,r,u,d,i',
            'lignes' => 'c,r,u,d,i',
            'cms' => 'c,r,u,d,i',
            'gpus' => 'c,r,u,d,i',
            'pcgs' => 'c,r,u,d,i',
            'ouvrages' => 'c,r,u,d',
            'stes' => 'c,r,u,d,i',
            'constructeurs' => 'c,r,u,d',

             /*  Incidents et PQS   */
            'ends' => 'c,r,u,d,i',
            'inclignes' => 'c,r,u,d,i',

            /*  consignation et transferts*/

            'plantrans'=> 'c,r,u,d,i',
            'bulhebdos'=> 'c,r,u,d,i',
            'progconsigs'=> 'c,r,u,d,i',

            'comptages' => 'c,r,u,d,i',
            'protections' => 'c,r,u,d,i',

            'departs' => 'c,r,u,d,i',
            'transfos' => 'c,r,u,d,i',
            'transas' => 'c,r,u,d,i',
            'transcs' => 'c,r,u,d,i',
            'transps' => 'c,r,u,d,i',
            'disjoncs' => 'c,r,u,d,i',
            'batconds'=> 'c,r,u,d,i',
            'compteurs'=>'c,r,u,d,i',

            'sieges'=> 'c,r,u,d',
            'soussieges'=> 'c,r,u,d',
            'users' => 'c,r,u,d',
            'wilayas' => 'c,r,u,d',
            'communes' => 'c,r,u,d,i',
            
        /*  Anomalies */ 
            'anomalieexps' => 'c,r,u,d,i',
            'anomalieprogs'=> 'c,r,u,d',
            'anomaliestes' =>'c,r,u,d',

        /*  consignations et transferts*/ 
            'bulhebdos'=>'c,r,u,d',
            'progconigs'=>'c,r,u,d',
            'plantras'=>'c,r,u,d',
            'chefconsignias'=>'c,r,u,d',
        /*  sieges et  sous-siges*/ 
            'transites'=>'c,r,u,d,i',
            'comptages'=>'c,r,u,d,i',
            'operations'=>'c,r,u,d,i',

        /*   logistique et moyens*/
            'parcautos'=>'c,r,u,d,i',
            'prisecharges'=>'c,r,u,d,i',
            'boncarburons'=>'c,r,u,d,i',

        ],


        'admin' => [ 
            
            'welcome' => 'c,r,u,d',
            /*  Organismes   */
            'organismes' => 'c,r,u,d,',
            'equipements' => 'c,r,u,d,',
            'postes' => 'c,r,u,d,',
            'regions' => 'c,r,u,d',
            'structures'=> 'c,r,u,d',
            /*  Ouvrages   */
            'clients' => 'c,r,u,d',
            'lignes' => 'c,r,u,d,',
            'cms' => 'c,r,u,d',
            'gpus' => 'c,r,u,d',
            'pcgs' => 'c,r,u,d',
            'ouvrages' => 'c,r,u,d',
            'stes' => 'c,r,u,d',
            'constructeurs' => 'c,r,u,d',

             /*  Incidents et PQS   */
            'ends' => 'c,r,u,d,i',
            'indtrs' => 'c,r,u,d',
            'indligs' => 'c,r,u,d',

            /*  consignation et transferts*/

            'plantrans'=> 'c,r,u,d',
            'bulhebdos'=> 'c,r,u,d',
            'progconsigs'=> 'c,r,u,d',

            'compteurs' => 'c,r,u,d',
            'protections' => 'c,r,u,d',

            'departs' => 'c,r,u,d',
            'transfos' => 'c,r,u,d',
            'transas' => 'c,r,u,d',
            'transcs' => 'c,r,u,d',
            'transps' => 'c,r,u,d',
            'disjoncs' => 'c,r,u,d',
            'batconds'=> 'c,r,u,d',

            'sieges'=> 'c,r,u,d',
            'soussieges'=> 'c,r,u,d',
            'users' => 'c,r,u,d',
            'wilayas' => 'c,r,u,d',
            'communes' => 'c,r,u,d',
            
        /*  Anomalies */ 
            'anomalieexps' => 'c,r,u,d',
            'anomalieprogs'=> 'c,r,u,d',
            'anomaliestes' =>'c,r,u,d',

        /*  consignations et transferts*/ 
            'bulhebdos'=>'c,r,u,d',
            'progconigs'=>'c,r,u,d',
            'plantras'=>'c,r,u,d',
            'chefconsignias'=>'c,r,u,d',
            
            /*  sieges et  sous-siges*/ 

            'comptages' => 'c,r,u,d',
            'transites'=>'c,r,u,d',
            'relevenergies'=>'c,r,u,d',
            'operations'=>'c,r,u,d',
            'compteurs'=>'c,r,u,d',

            /*   logistique et moyens*/
            'parcautos'=>'c,r,u,d',
            'prisecharges'=>'c,r,u,d',
            'boncarburons'=>'c,r,u,d',
        ],

    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
        'i' =>'import',
    ]
];