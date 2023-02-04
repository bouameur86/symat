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
                <li><a href="{{ route('dashboard.lignes.index') }}"> Lignes</a></li>
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

                    <form action="{{ route('dashboard.inclignes.store') }}" method="POST" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        {{ method_field('post') }}
                        
                        <!-- Ligne  -->
                     
                        <div class="form-group">
                            <label for="ligne">Ligne</label>
                                <select id="ligne" class="form-control" name="ligne" value="{{ old('ligne') }}">
                                    <option></option>
                                    @foreach($lignes as $ligne)
                                        <option value="{{ $ligne->id }}">{{ $ligne->name }}</option>
                                    @endforeach
                                </select>
                        </div>
                    
                        <!-- Num TR-->

                    <!-- dateheure debut-->
                    <div class="form-group"> 
                        <label>@lang('site.dateheured')</label>
                        <input type="datetime-local" id="d1" name="dateheured" class="form-control" value="{{ old('dateheured') }}">
                    </div>
                    <!-- dateheure Fin -->
                    <div class="form-group"> 
                        <label>@lang('site.dateheuref')</label>
                        <input type="datetime-local" id="d2" name="dateheuref" class="form-control" value="{{ old('dateheuref') }}">
                        <button id="submitBtn" onclick="calculatedhr()">Calcule Durée</button>
                    </div>
                    <!--  durée  -->
                    <div class="form-group"> 
                        <label>@lang('site.duree')</label>
                        <input type="text" name="dure" id="output" class="form-control" readonly>
                    </div>
                    <!--  durée  -->
                        <div class="form-group">
                            <label for="cause">Transformateur</label>
                            <select type="text" id="cause" class="form-control" name="cause" value="{{ old('cause') }}">
                                <option disabled selected>Cause de l'incident</option>
                                <option>Défaut chez producteur</option>
                                <option>Chute pylône</option>
                                <option>Conditions climatiques</option>
                                <option>Amorçage d'un corbeau</option>
                                <option>Amorçage d'une chaines isolateurs</option>
                                <option>Amorçage d'une boite extremité 220kV</option>
                                <option>Amorçage d'une boite extremité 60kV</option>
                                <option>File de fair </option>
                                <option>Relâchement du câble sur pylône</option>
                                <option>Autre</option>
                            </select>   
                        </div>
                <!-- type incident A-->
                    <div class="form-group">
                            <label for="typeinca" >Type d'incident au poste A</label>
                        <select id="typeinca" name="typeinca" class="form-control"  value="{{ old('typeinca') }}">
                                <option>DT</option>
                                <option>DR</option>
                                <option>DRD</option>
                        </select>   
                    </div>
                  <!-- type incident B-->
                  <div class="form-group">
                    <label for="typeincb" >Type d'incident au poste B</label>
                        <select id="typeincb" name="typeincb" class="form-control"  value="{{ old('typeincb') }}">
                                <option>DT</option>
                                <option>DR</option>
                                <option>DRD</option>
                        </select>   
                    </div>     
                        {{-- protposte A --}}
                        <div class="form-group">
                            <label for="protpostea" >Protection poste A</label>
                                <select id="protpostea" class="form-control selectpicker" name="protpostea" value="{{ old('protpostea') }}" multiple data-live-search="true">
                                <option></option>
                                <option>GE Diff L90</option>
                                <option>GE Distance D60</option>  
                                <option>SEL Distance LZ96</option>
                                <option>SEL Distance 321</option>
                                <option>ABB Distance REL670</option> 
                                <option>GE Distance P444</option>
                                <option>SIEMENS Max I 7SJ531</option>
                                <option>SIEMENS Distance 7SA612</option>
                                <option>GE T60 87N </option>
                                <option>SIEMENS Distance 7SA611</option>
                                <option>SIEMENS Distance 7SA511</option>
                                <option>Discordance Pôle</option>  
                                <option>SIEMENS Max I 7SJ62</option>
                            </select>   
                        </div>

                        {{-- protposte B --}}
                        <div class="form-group">
                            <label for="protposteb" >Protection poste A</label>
                                <select id="protposteb" class="form-control" name="protposteb" value="{{ old('protposteb') }}">
                                <option disabled selected>Choisir la protection Ici</option>
                                <option>GE Diff L90</option>
                                <option>GE Distance D60</option>  
                                <option>SEL Distance LZ96</option>
                                <option>SEL Distance 321</option>
                                <option>ABB Distance REL670</option> 
                                <option>GE Distance P444</option>
                                <option>SIEMENS Max I 7SJ531</option>
                                <option>SIEMENS Distance 7SA612</option>
                                <option>GE T60 87N </option>
                                <option>SIEMENS Distance 7SA611</option>
                                <option>SIEMENS Distance 7SA511</option>
                                <option>Discordance Pôle</option>  
                                <option>SIEMENS Max I 7SJ62</option>
                            </select>   
                        </div>
               
                        <!-- phases A-->
                            <div class="form-group">
                                <label for="phasesa" >Siège de l'incident</label>
                                <select id="phasesa" class="form-control" name="phasesa">
                                    <option disabled selected>Phases au poste A</option>
                                    <option>0</option>
                                    <option>4</option>
                                    <option>8</option>
                                </select>   
                            </div>
                        <!-- phases B-->
                            <div class="form-group">
                                <label for="phasesa" >Siège de l'incident</label>
                                <select id="phasesa" class="form-control" name="phasesa">
                                    <option disabled selected>Phases au poste B</option>
                                    <option>0</option>
                                    <option>4</option>
                                    <option>8</option>
                                </select>   
                            </div>

                      <!-- Imputation-->    
                            
                        <div class="form-group">
                            <label>@lang('site.imputation')</label>
                            <select id="imputation" class="form-control" name="imputation" aria-placeholder="Choisir le resposnsable">
                                <option disabled>imputation</option>
                                <option>TE-DTE</option>
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
                    'ldefa','ldefb'
                    <!-- stade poste A-->
                        <div class="form-group">
                            <label> Stade poste A</label>
                                <select id="stadea" class="form-control" name="stadea" >
                                    <option disabled selected>Stade au poste A</option>
                                    <option>1<sup>er</sup></option>
                                    <option>2<sup>eme</sup></option>
                                    <option>3<sup>eme</sup></option>
                                    <option>4<sup>eme</sup></option>
                                </select>   
                        </div>

                        <div class="form-group">
                            <label> Stade poste A</label>
                                <select id="stadeb" class="form-control" name="stadeb" >
                                    <option disabled selected>Stade au poste B</option>
                                    <option>1<sup>er</sup></option>
                                    <option>2<sup>eme</sup></option>
                                    <option>3<sup>eme</sup></option>
                                    <option>4<sup>eme</sup></option>
                                </select>   
                        </div>

                        <!-- Ldefa-->
                   
                        <div class="form-group"> 
                            <label>Localisateur de defaut au Poste A</label>
                            <input type="text" name="ldefa" class="form-control" value="{{ old('ldefa') }}" >
                        </div>

                        <!-- Ldefb-->
                
                        <div class="form-group"> 
                            <label>Localisateur de defaut au Poste B</label>
                            <input type="text" name="ldefb" class="form-control" value="{{ old('ldefb') }}" >
                        </div>
                        
                        <!-- Observation -->
                        <div class="form-group">
                            <label>Observation</label>
                            <textarea type="text" name="observ" class="form-control" value="{{ old('observ') }}"></textarea>
                        </div>
                   
                        <!-- Added button -->       

                        <div class="form-group" class="col-md-4">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</button>
                        </div>
                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->
                
            <script>
                       // Script indispo             
            document
                     .getElementById("submitBtn")
                     .addEventListener("click" , (e) => {
                                        e.preventDefault();
                                });
                function calculatedhr(){
                    var d1= document.getElementById("d1").value;
                    var d2= document.getElementById("d2").value;
                    const dateOne = new Date(d1);
                    const dateTwo = new Date(d2);
                    const time = Math.abs(dateTwo - dateOne);
                    const num2 = Math.ceil(time/(1000*60));
                    var hours = Math.floor(num2 / 60);
                    var minutes = num2 % 60;
                        //Print EveryThing and LOOK VERY CAREFULLY NOW!!!
                        if  ( minutes < 10)   {
                              document.getElementById("output").value = hours + ":0" + minutes; 
                                  }   
                          else  {
                                 document.getElementById("output").value = hours + ":" + minutes ;  
                                     }     
                         }

            </script>
        </section><!-- end of content -->

    </div><!-- end of content wrapper -->
<script src="{{ asset('dashboard_files/bower_components/js/jquey-3.6.0.min.js') }}"></script>
<script src="{{ URL::asset('dashboard_files/plugins/select2/js/select2.min.js') }}"></script>
<script src="{{ URL::asset('dashboard_files/plugins/bootstrap-select-1.13.14/dist/js/bootstrap-select.min.js') }}"></script>

<script type="text/javascript">

       // select poste
 $("#poste").select2({
     placeholder: "Select poste",
     allowClear: true
 }); 

       // select poste
       $("#protpostea").selectpicker();({
     placeholder: "Choisir les protections",
     allowClear: true
 }); 

</script>
@endsection
