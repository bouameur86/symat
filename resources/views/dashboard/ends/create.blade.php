@extends('layouts.dashboard.app')

@section('head')
<script  type="text/javascript" src="js/jquery-3.6.0min.js"></script>
@endsection
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Creation d'un incident</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li><a href="{{ route('dashboard.regions.index') }}"> @lang('site.regions')</a></li>
                <li><a href="{{ route('dashboard.postes.index') }}"> @lang('site.postes')</a></li>
                <li class="active">@lang('site.add')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">@lang('site.add')</h3>
                </div><!-- end of box header -->
                <div class="box-body">

                    @include('partials._errors')

                    <form action="{{ route('dashboard.ends.store') }}" method="POST" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        {{ method_field('post') }}
                        
                        <!-- Poste   -->
                     
                        <div class="form-group">
                            <label for="poste">Poste</label>
                                <select id="poste" class="form-control" name="poste" value="{{ old('poste') }}">
                                    <option></option>
                                    @foreach($postes as $poste)
                                        <option value="{{ $poste->id }}">{{ $poste->name }}</option>
                                    @endforeach
                                </select>
                        </div>
                    
                        <!-- Num TR-->

                        <div class="form-group">
                            <label for="numtr">Transformateur</label>
                            <select type="text" id="numtr" class="form-control" name="numtr" value="{{ old('numtr') }}">
                                <option disabled selected>Choisir un TR</option>
                                <option>ATR n°1</option>
                                <option>ATR n°2</option>
                                <option>TR n°1</option>
                                <option>TR n°2</option>
                                <option>TR n°3</option>
                                <option>TR n°4</option>
                                <option>TR n°5</option>
                                <option>TR n°6</option> 
                                <option>CM</option>
                                <option>INJ</option>
                            </select>   
                        </div>

                    <div class="form-group">
                            <label for="nivU" >Niveau de tension</label>
                        <select id="nivU" name="nivU" class="form-control"  value="{{ old('nivU') }}">
                                <option>400/220</option>
                                <option>220/60</option>
                                <option>220/30</option>
                                <option>220/60/30</option>
                                <option>220/60/10</option>
                                <option>60/30</option>
                                <option>60/10</option>
                                <option>220</option>
                                <option>60</option>
                                <option>30</option>
                                <option>10</option>
                        </select>   
                    </div>
                       
                        {{-- cause de l'incident--}}
                        <div class="form-group">
                            <label for="cause" >Cause de l'évènement</label>
                                <select id="cause" class="form-control" name="cause" aria-placeholder="Choisir la cause">
                                <option disabled selected>Cause</option>
                                <option>Amorçage d'une cable MT</option>
                                <option>Bucholz TR</option>  
                                <option>Surcharge</option> 
                                <option>Vent violent</option>
                                <option>Defaut sur le réseau MT</option>
                                <option>Amorçage d'un pigeon</option>
                                <option>Amorçage d'un animal</option>
                                <option>Temps orageux</option>
                                <option>Conditions climatiques</option>
                                <option>Fausse manoeuvre</option>
                                <option>Autre</option>
                            </select>   
                        </div>

                        <div class="form-group">
                            <label for="evenement" >Siège de l'incident</label>
                            <select id="evenement" class="form-control" name="evenement" aria-placeholder="Choisir le siège">
                              
                                <option>MU</option>
                                <option>TFO</option>
                                <option>ARR</option>
                                <option>DEP</option>
                                <option>DELES</option>
                                <option>Autre</option>
                            </select>   
                        </div>

                        <div class="form-group"> 
                            <label>@lang('site.incident')</label>
                            <textarea type="text" name="incident" class="form-control" value="{{ old('incident') }}"></textarea>
                        </div>

                            {{-- Protection--}}
                        <div class="form-group">
                            <label for="protection" >Protection</label>
                                <select id="protection" class="form-control"  name="protection" value="{{ old('protection') }}" aria-placeholder="Choir la protection">
                                    <option></option>
                                    <option>Max I THT</option>
                                    <option>Max I 30kV</option>
                                    <option>Max I 10kV</option>
                                    <option>Neutre MT 1er Seuil</option>
                                    <option>Neutre MT 2eme Seuil</option>
                                    <option>Neutre BPN</option>
                                    <option>Terre résistante</option> 
                                    <option>Manque CC</option>
                                    <option>Bucholz TR</option>
                                    <option>Buckholz régleur</option>
                                    <option>Différentielle</option>
                                    <option>Masse cuve </option>
                                    <option>Surcharge thermique </option>
                                    <option>T° de huile </option>
                                    <option>T° Enroulement</option>
                                    <option>Arrêt entre prise (Reg)</option>
                                    <option>Soupape</option>
                                    <option>Sans signalisation</option>
                                    <option>Baisse pression télécmmande</option>
                                    <option>Defaut régleur</option>
                                </select>
                        </div>

                        <div class="form-group"> 
                            <label>@lang('site.dateheured')</label>
                            <input type="datetime-local" id="d1" name="dateheured" class="form-control" value="{{ old('dateheured') }}">
                        </div>
                        <div class="form-group"> 
                            <label>@lang('site.dateheuref')</label>
                            <input type="datetime-local" id="d2" name="dateheuref" class="form-control" value="{{ old('dateheuref') }}">
                            <button id="submitBtn" onclick="calculateMinits()">Calcule Durée</button>
                        </div>
                       
                        <div class="form-group"> 
                            <label>@lang('site.duree')</label>
                            <input type="text" name="dure" id="output" class="form-control" readonly>
                        </div>

                        <div class="form-group"> 
                            <label>@lang('site.pcoupe')</label>
                            <td><input type="text" name="pcoupe" id="pc" class="form-control"  Min="0.01", Max= "99999.99" step="0,01" placeholder="Entrer la PC"></td><br><br>
                            <button id = "submitBtn1" onclick="calculateEnds()">Calcule END</button> 
                        </div>
                        <div class="form-group"> 
                            <label>@lang('site.energie')</label>
                            <input type="number" id="output1" name="energie" class="form-control"  readonly>
                        </div>
                        
                        <div class="form-group">
                            <label>@lang('site.imputation')</label>
                            <select id="imputation" class="form-control" name="imputation" aria-placeholder="Choisir le resposnsable">
                                <option disabled>imputation</option>
                                <option>GRTE</option>
                                <option>SDx</option>
                                <option>OS</option>
                                <option>SPE</option>
                                <option>SKH</option>
                                <option>SKTM</option>
                                <option>CHT</option>
                                <option>IE</option>
                                <option>Litige</option>
                            </select>   
                        </div>

                        <div class="form-group">
                            <label>@lang('site.ouvrage_mis_en_cause')</label>
                                <select id="ouvcause" class="form-control" name="ouvcause" aria-placeholder="Ouvrage mis en cause">
                                    <option disabled>Ouvrage mis en cause</option>
                                    <option>TRO</option>
                                    <option>Poste</option>
                                    <option>Ligne</option>
                                </select>   
                        </div>

                        <div class="form-group">
                            <label for="saifi">SAIFI</label>
                                    <select id="saifi" name="saifi" class="form-control" aria-placeholder="SAIFI">
                                        <option disabled selected></option>
                                        <option>1</option>
                                        <option>2</option>
                                    </select>
                        </div>

                            <!-- SAIDI-->
                        <div class="form-group"> 
                            <button id="submitBtn2" onclick="timeConvert()">Calcule SAIDI</button> <br/><br/>
                            <input type="text" name="saidi" class="form-control" id="result" readonly> <!-- result-->
                        </div>
                         <!-- dhretour -->
                        <div class="form-group"> 
                            <label>@lang('site.dhretour')</label>
                            <input type="datetime-local" id="d3" name="dhretour" class="form-control" value="{{ old('dhretour') }}">
                            <button id="submitBtn3" onclick="calculatedhr()">Calcule INDISPO</button>
                        </div>
                        <!-- indispo-->
                   
                        <div class="form-group"> 
                            <label>@lang('site.indispo')</label>
                            <input type="text" name="indispo" id="output2" class="form-control" readonly>
                        </div>
                        
                        <!-- MG MP -->
                        <div class="form-group">
                     
                            <select id="mgmp" class="form-control" name="mgmp" aria-placeholder="Type d'incident">
                                <option disabled>MG/MP</option>
                                <option>MG</option>
                                <option>MP</option>
                                <option>DEL</option>
                            </select>   
                        </div>
                        <div class="form-group" class="col-md-4">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</button>
                        </div>
                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->
            <script>
                           
                document
                                .getElementById("submitBtn")
                                .addEventListener("click" , (e) => {
                                        e.preventDefault();
                      });

                    function calculateMinits(){
                    var d1= document.getElementById("d1").value;
                    var d2= document.getElementById("d2").value;
                    const dateOne = new Date(d1);
                    const dateTwo = new Date(d2);
                    const time = Math.abs(dateTwo - dateOne);
                    const minutes = Math.ceil(time/(1000*60)) ;
                    document.getElementById("output").value=minutes;
                }

                </script>

                
<script>
    // Calcule END
     document
                    .getElementById("submitBtn1")
                    .addEventListener("click" , (e) => {
                            e.preventDefault();
          }); 

    function calculateEnds(){
        var output= document.getElementById("output").value;
        var pc = document.getElementById("pc").value;
        const duree = new Number(output);
        const puissance = new Number(pc);
        const END = Math.abs(duree * puissance);
        const  end = Math.abs(END/(60)).toFixed(3);;
        document.getElementById("output1").value=end;
        // converter en dicimal

    }

    // Coverte Minutes to Time format 
                document
                    .getElementById("submitBtn2")
                    .addEventListener("click" , (e) => {
                            e.preventDefault();
          }); 
            function timeConvert() {
                        // body...         output= yourNo
                let num = document.getElementById('output').value;
                var hours = Math.floor(num / 60);
                var minutes = num % 60;
                        //Print EveryThing and LOOK VERY CAREFULLY NOW!!!
                        if  ( minutes < 10)   {
                              document.getElementById("result").value = hours + ":0" + minutes; 
                                  }   
                          else  {
                                 document.getElementById("result").value = hours + ":" + minutes ;  
                                     }     
                         }

                    </script>
            <!-- Scriprt -->
            <script>
                       // Script indispo             
            document
                     .getElementById("submitBtn3")
                     .addEventListener("click" , (e) => {
                                        e.preventDefault();
                                });
                function calculatedhr(){
                    var d1= document.getElementById("d1").value;
                    var d3= document.getElementById("d3").value;
                    const dateOne = new Date(d1);
                    const dateThre = new Date(d3);
                    const time = Math.abs(dateThre - dateOne);
                    const num2 = Math.ceil(time/(1000*60)) ;
                    var hours = Math.floor(num2 / 60);
                    var minutes = num2 % 60;
                        //Print EveryThing and LOOK VERY CAREFULLY NOW!!!
                        if  ( minutes < 10)   {
                              document.getElementById("output2").value = hours + ":0" + minutes; 
                                  }   
                          else  {
                                 document.getElementById("output2").value = hours + ":" + minutes ;  
                                     }     
                         }

            </script>
        </section><!-- end of content -->

    </div><!-- end of content wrapper -->
<script src="{{ asset('dashboard_files/bower_components/js/jquey-3.6.0.min.js') }}"></script>
<script src="{{ URL::asset('dashboard_files/plugins/select2/js/select2.min.js') }}"></script>
<script type="text/javascript">

       // select poste
 $("#poste").select2({
     placeholder: "Select poste",
     allowClear: true
 }); 

       // select poste
       $("#protection").select2({
     placeholder: "Select protection",
     allowClear: true
 }); 

</script>
@endsection
