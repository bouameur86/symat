<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']],
    function () {

        Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function () {

            Route::get('/', 'WelcomeController@index')->name('welcome');

            //End routes
            Route::resource('ends', 'EndController');
            Route::get('export_ends', 'EndController@export');
            //import excel files
            Route::get('/ends/import', 'EndController@upload');
            Route::post('/ends/import', 'EndController@import')->name('ends.import');

             //Inclignes routes
            Route::resource('inclignes', 'IncligneController');
             //Inclignes Excel Export files
            Route::get('export_inclignes', 'IncligneController@export');
            //Inclignes import excel files
            Route::get('/inclignes/import', 'IncligneController@upload');
            Route::post('/inclignes/import', 'IncligneController@import')->name('inclignes.import');         
          

            //AnomalieExps routes
            Route::resource('anomalieexps', 'AnomalieexpController');
            //AnomalieStes routes
            Route::resource('anomaliestes', 'AnomaliesteController');
            //AnomalieExps routes
            Route::resource('anomalieprogs', 'AnomalieprogController');

           //departs routes
           Route::resource('departs', 'DepartController')->except(['show']);
           //Excel Export files
            Route::get('export_depart', 'DepartController@export');
              //import excel files
            Route::get('/departs/import', 'DepartController@upload');
            Route::post('/departs/import', 'DepartController@import')->name('departs.import');
           
            //compteurs routes
            Route::resource('compteurs', 'CompteurController')->except(['show']);
            //Excel Export files
            Route::get('export_compteur', 'CompteurController@export');
                //import excel files
            Route::get('/compteurs/import', 'CompteurController@upload');
            Route::post('/compteurs/import', 'CompteurController@import')->name('compteurs.import');
             
           
            //transites routes
           Route::resource('transites', 'TransiteController')->except(['show']);
         //Route::get('/poste/{id}','TransiteController@getsaparent');
           //Excel Export files
            Route::get('export_transite', 'TransiteController@export');
           //import excel files
            Route::get('/transites/import', 'TransiteController@upload');
            Route::post('/transites/import', 'TransiteController@import')->name('transites.import');
            
            //comptages routes
            Route::resource('comptages', 'ComptageController')->except(['show']);
        
            //Excel Export files
            Route::get('export_comptages', 'ComptageController@export');
              //import excel files
            Route::get('/comptages/import', 'ComptageController@upload');
            Route::post('/comptages/import', 'ComptageController@import')->name('comptages.import');

            //transfos routes
            Route::resource('transfos', 'TransfoController')->except(['show']);

            //Excel Export files
            Route::get('export_transfo', 'TransfoController@export');
           //import excel files
            Route::get('/transfos/import', 'TransfoController@upload');
            Route::post('/transfos/import', 'TransfoController@import')->name('transfos.import');



            //Transas routes
            Route::resource('transas', 'TransaController');
            //Transcs routes
            Route::resource('transcs', 'TranscController');               
            //Transps routes
            Route::resource('transps', 'TranspController');
             //Disjoncs routes
             Route::resource('disjoncs', 'DisjoncController');
               //Batcond routes
               Route::resource('batconds', 'BatcondController');
            //wilayas routes
            Route::resource('wilayas', 'WilayaController');

            //plantras routes
            Route::resource('plantras', 'PlantraController')->except(['show']);

            //progconsigs routes
            Route::resource('progconsigs', 'ProgconsigController')->except(['show']);
            
            //bulhebdos routes
            Route::resource('bulhebdos', 'BulhebdoController')->except(['show']);
            
            //structures routes
            Route::resource('structures', 'StructureController')->except(['show']);
            
                 //stes routes
           Route::resource('stes', 'SteController')->except(['show']);;
           //Excel Export files
            Route::get('export_stes', 'SteController@export');
              //import excel files
            Route::get('/stes/import', 'SteController@upload');
            Route::post('/stes/import', 'SteController@import')->name('stes.import');

            //postes routes
            Route::resource('postes', 'PosteController')->except(['show']);

            //protections routes
            Route::resource('protections', 'ProtectionController')->except(['show']);
             //Excel Export files
            Route::get('export_protections', 'ProtectionController@export');
            //import excel files
            Route::get('/protections/import', 'ProtectionController@upload');
            Route::post('/protections/import', 'ProtectionController@import')->name('protections.import');
            //sieges routes

            Route::resource('sieges', 'SiegeController')->except(['show']);

            //sieges routes
            Route::resource('equipements', 'EquipementController')->except(['show']);

        
            //lignes routes
            Route::resource('lignes', 'LigneController');
            //Excel Export files
            Route::get('export_lignes', 'LigneController@export');
            
            //cabines routes
            Route::resource('cms', 'CmController')->except(['show']);

            //communes routes
            Route::resource('communes', 'CommuneController')->except(['show']);
        
            //Excel Export files
            Route::get('export_communes', 'CommuneController@export');
              //import excel files
            Route::get('/communes/import', 'CommuneController@upload');
            Route::post('/communes/import', 'CommuneController@import')->name('communes.import');

            //structures routes
            Route::resource('structures', 'StructureController')->except(['show']);

            //Pcg routes
            Route::resource('pcgs', 'PcgController')->except(['show']);

            //ste routes
            Route::resource('stes', 'SteController')->except(['show']);

            //Gpu routes
            Route::resource('gpus', 'GpuController')->except(['show']);

            //Regions routes
            Route::resource('regions', 'RegionController')->except(['show']);

            //constructeur routes
            Route::resource('constructeurs', 'ConstructeurController')->except(['show']);

            //category routes
            Route::resource('categories', 'CategoryController')->except(['show']);

            //product routes
            Route::resource('products', 'ProductController')->except(['show']);

            //client routes
            Route::resource('clients', 'ClientController')->except(['show']);
            Route::get('/poste/{id}', 'ClientController@getdeparts'); //departname
            //Excel Export files
            Route::get('export_client', 'ClientController@export');
            //import excel files
            Route::get('/clients/import', 'ClientController@upload');
            Route::post('/clients/import', 'ClientController@import')->name('clients.import');

            //user routes
            Route::resource('users', 'UserController')->except(['show']);

            //Excel Export files

            Route::get('export_poste', 'PosteController@export');
          
            //import excel files
            Route::get('/postes/import', 'PosteController@upload');
            Route::post('/postes/import', 'PosteController@import')->name('postes.import');

            //parcautos routes
            Route::resource('parcautos', 'ParcautoController')->except(['show']);      
            //Excel Export parcautos files
            Route::get('export_parcautos', 'ParcautoController@export');
              //import excel parcautos files
            Route::get('/parcautos/import', 'ParcautoController@upload');
            Route::post('/parcautos/import', 'ParcautoController@import')->name('parcautos.import');

            //parcautos routes
            Route::resource('parcautos', 'ParcautoController')->except(['show']);      
            //Excel Export parcautos files
            Route::get('export_parcautos', 'ParcautoController@export');
              //import excel parcautos files
            Route::get('/parcautos/import', 'ParcautoController@upload');
            Route::post('/parcautos/import', 'ParcautoController@import')->name('parcautos.import');

            //prisecharges routes
            Route::resource('prisecharges', 'PrisechargeController')->except(['show']);      
            //Excel Export parcautos files
            Route::get('export_prisecharges', 'PrisechargeController@export');
            //import excel parcautos files
            Route::get('/prisecharges/import', 'PrisechargeController@upload');
            Route::post('/prisecharges/import', 'PrisechargeController@import')->name('prisecharges.import');
        
            //boncarburons routes
            Route::resource('boncarburons', 'BoncarburonController')->except(['show']);      
            //Excel Export boncarburons files
            Route::get('export_boncarburons', 'BoncarburonController@export');
            //import excel boncarburons files
            Route::get('/boncarburons/import', 'BoncarburonController@upload');
            Route::post('/boncarburons/import', 'BoncarburonController@import')->name('boncarburons.import');


        });//end of dashboard routes
    });


