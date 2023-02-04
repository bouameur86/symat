@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>@lang('site.anomalieexps')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li><a href="{{ route('dashboard.postes.index') }}"> @lang('site.postes')</a></li>
                <li><a href="{{ route('dashboard.anomalieexps.index') }}"> @lang('site.anomalieexps')</a></li>
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

                    <form action="{{ route('dashboard.anomalieexps.store') }}" method="POST" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        {{ method_field('post') }}
                        
                                        <!-- 1 numero message -->

                                        <div class="form-group row">
                                            <label for="numes" class="col-md-4 col-form-label text-md-right">Numero de message</label>
                
                                            <div class="col-md-6">
                                                <input id="numes" type="text" class="form-control{{ $errors->has('numes') ? ' is-invalid' : '' }}" name="numes"
                                                 required>
                
                                                @if ($errors->has('numes'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('numes') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>



                                        <!--

                                        <div class="form-group"> 
                                            <label for="numes">Numero de message</label>
                                            <input type="text" name="numes" class="form-control"  placeholder="N° BE / N°Poste ......  Exemple : 645/57 ">
                                 
                                        </div>
                                            -->
                                        <!-- 2 Date de l'anomalie -->
                                        <div class="form-group"> 
                                            <label>Date de l'anomalie</label>
                                            <input type="date" name="dateanom" class="form-control"  value="{{ old('dateanom ') }} " >
                                        </div>
                                        <!-- 3 poste -->
                
                                        <div class="form-group">
                                            <label for="poste">Poste</label>  
                                                <select  class="form-control" name="poste" value="{{ old('poste') }} ">
                                                    <option disabled selected>Choisir un Poste</option>
                                                    @foreach($postes as $poste)
                                                        <option value="{{ $poste->id }}">{{ $poste->name }}</option>
                                                    @endforeach
                                                </select>
                                            
                                        </div>
                                       
                                        <!-- 4 Equipement-->
                                        <div class="form-group">
                                            <label for="equipement" >Choisir un equipement</label>
                                                <select id="equipement" class="form-control" name="equipement" value="{{ old(' equipement') }}" >
                                                <option disabled selected>Liste des équipements</option>
                                                <option>TR 1</option>
                                                <option>TR 2</option>
                                                <option>TR 3</option>
                                                <option>TR 4</option>
                                                <option>TR 5</option>
                                                <option>TR 6</option>
                                                <option>JB 1</option>
                                                <option>JB 2</option>
                                                <option>TC Buching</option>        
                                                <option>TC Tore</option>       
                                                <option>Transfo de courant</option>        
                                                <option>TC Barre</option>     
                                                <option>TP bare</option>        
                                                <option>Borne TR</option>
                                                <option>BC n°1 </option>
                                                <option>BC n°2 </option>
                                                <option>BC n°3 </option>
                                                <option>BC n°4 </option>
                                                <option>Disjoncteur</option>
                                                <option>Sectonneur tête ligne</option>
                                                <option>Sectonneur d'isolement</option>
                                                <option>Sectonneur barre</option>
                                                <option>Unité de travée</option>
                                                <option>Redresseur</option>
                                                <option>Vontélos</option>
                                                <option>Protection</option>
                                                <option>Protection Max I</option>
                                                <option>Protection PDD</option>
                                                <option>Circuit de bouchon</option>
                                                <option>Sélicagèle</option>
                                                <option>Groupe-electrogène</option>
                                                <option>Autre</option>
                                            </select>   
                                        </div>
                                        <!--  5 Spécefie l'equipement -->
                                                <div class="form-group"> 
                                                    <label>Specifie l'équipement</label>
                                                    <input type="text" name="spequip" class="form-control"  value="{{ old('spequip') }}">
                                                </div>
                                         <!--  6 niveau de tension-->
                                        <div class="form-group">
                                            <label>Niveau de tension</label>
                                                <select class="form-control" name="nivU" value="{{ old('nivU') }}" >
                                                    <option disabled selected>choisir la tension</option>
                                                    <option>400/220kV</option>
                                                    <option>220kV</option>
                                                    <option>220/60kV</option>
                                                    <option>220/30kV</option>
                                                    <option>220/60/30kV</option>
                                                    <option>220/60/10kV</option>
                                                    <option>60/30kV</option>
                                                    <option>60/10kV</option>
                                                    <option>60kV</option>
                                                    <option>30kV</option>
                                                    <option>10kV</option>
                                                    <option>5,5kV</option>
                                                    <option>220V</option>
                                                    <option>127Vcc</option>
                                                    <option>48Vcc</option>
                                                </select>   
                                            </div>
                
                                <!-- 7 Type d'anomalie -->
                                <div class="form-group">
                                    <label>Type d'anomalie</label>
                                    <select id="typeanom" class="form-control" name="typeanom" value="{{ old('typeanom') }}">
                                            <option disabled selected>BT - HT - Ligne - Téléconduite - Télécoms</option>
                                            <option>Basse tension</option>
                                            <option>Haute tension</option>
                                            <option>Ligne</option>
                                            <option>Télécoms</option>
                                            <option>Téléconduite</option>
                                    </select>   
                            </div>
                                        <!-- 8 Anomalie -->
                                        <div class="form-group">
                                            <label>l'anomalie enregistrée</label>
                                        <select id="anomalie" class="form-control" name="anomalie" value="{{ old('anomalie') }}">
                                            <option disabled selected>Choisir l'anomalie</option>
                                            <!-- SF6 -->
                                            <option>Baisse pression Gas SF6 /1er stade</option>
                                            <option>Baisse pression Gas SF6 /2eme stade</option>
                                            <option>Alarme SF6</option>
                                            <option>Alarme de declenchement TRIP sur unité de travée</option>
                                            <option>Alarme batterier défectueux</option>
                                            <option>Equipement éteint</option>
                                            <!-- l'huile -->
                                            <option>Equipement avarie</option> 
                                            <option>Equipement défectueux</option> 
                                            <option>Niveau d'huile bas</option>
                                            <option>Fuite d'huile importante</option>
                                            <option>Fuite d'huile légère</option>
                                            <option>Fuite d'huile</option>
                                                <!-- Commande -->
                                            <option>Commande ne fonctionne pas à disatnce</option>
                                            <option>Commande ne fonctionne pas localement</option>
                                                <!-- Point chaud -->
                                            <option>Point chaud 1er degré</option>
                                            <option>Point chaud 2eme degré</option>
                                            <option>Point chaud 3eme degré</option>
                                                <!-- commande et mesure -->
                                            <option>Alarme au niveau de CRC</option> 
                                            <option>Défaut de commande</option>
                                            <option>Poste inaccess au CRC</option>
                                            <option>Inaccebilité</option>
                                            <option>Inaccebilité locale</option>
                                            <option>Inaccebilité à distance</option>
                                                <!-- communications -->
                                            <option>Défaut synchronisation</option>
                                            <option>Perte de comunnecation</option>
                                            <option>Manque d'affichage</option>
                                            <option>Affichage incorrecte sur le CCN</option>
                                            <option>Valeurs erronées</option>
                                            <option>inversion du cablage</option>
                                            <option>Arrêt entre plot</option>
                                            <option>Alarme temperature</option>  
                                            <option>Défaut de mésure</option>
                                            <option>Arrêt entre plot</option>
                                                <!-- Ligne  -->
                                            <option>Bruit anormale</option>
                                            <option>Assiètte isolateur cassé</option>
                                            <option>Chaine isolateurs amorsées</option>
                                                <!-- groupe-electrogène  -->
                                            <option>Défaut de démarrage</option>
                                                 <!-- groupe-electrogène  -->
                                                <option> Avarie</option>
                                        </select>   
                                        </div>
                
                                    <!--   9 Description   -->
                                        <div class="form-group"> 
                                            <label for="descranom">Déscription de l'anomalie</label>
                                            <textarea type="text" id="descranom" name="descranom" class="form-control"  rows="4"  value="{{ old('descranom') }}" ></textarea>
                                        </div>
                                    <!--  10  leon   -->
                                        <div class="form-group">
                                            <label>Niveau de tension</label>
                                                <select class="form-control" name="leon" value="{{ old('leon') }}" >
                                                        <option>Non</option>
                                                        <option>Oui</option>
                                                </select>   
                                        </div>

                                <div class="form-group" class="col-md-4">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</button>
                                </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection
