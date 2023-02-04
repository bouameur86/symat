@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>@lang('site.lignes')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li><a href="{{ route('dashboard.lignes.index') }}"> @lang('site.lignes')</a></li>
                <li class="active">@lang('site.edit')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">Detail de l'anomalie</h3>
                </div><!-- end of box header -->
                <div class="box-body">

                    @include('partials._errors')

               
                        {{ csrf_field() }}
                    
                    <!-- Region message -->
                       <div class="form-group"> 
                        <label>Region</label><h5 class="form-control">{{ $ligne->region }}</h5>
                    </div>
                      <!-- STE message -->
                      <div class="form-group"> 
                        <label>Service transporgt</label><h5 class="form-control">{{ $ligne->ste->code }}</h5>
                      </div>

                       <!-- 1 numero message -->
                       <div class="form-group"> 
                        <label>Numero de message</label><h5 class="form-control">{{ $ligne->name }}</h5>
                    </div>
                    <!-- 2 Date de l'anomalie -->
                
                    <td>{{ $ligne->longeur }}</td>
                    <td>{{ $ligne->nbrpylone }}</td>
                    <td>{{ $ligne->section }}</td> 
                    <td>{{ $ligne->constructeur != null ? $ligne->constructeur->name : '' }}</td>
                    <td>{{ $ligne->datemise }}

                    <!-- 3 poste -->
                    <div class="form-group"> 
                        <label>Date de l'anomalie</label><h5 class="form-control">{{ $ligne->code}}</h5>
                    </div>
                     <!-- 3 poste -->
                    <div class="form-group"> 
                        <label>Date de l'anomalie</label><h5 class="form-control">{{ $ligne->nivU}}</h5>
                    </div>
                    <!-- 3 poste -->

                    <div class="form-group">
                        <label for="poste">Poste</label>  
                            <select  class="form-control" name="poste" value="{{ old('poste') }} ">
                                @foreach($postes as $poste)
                                    <option value="{{ $poste->id }}">{{ $poste->name }}</option>
                                @endforeach
                            </select>             
                    </div>                       
                
                   
                    <!-- 4 Equipement-->
                    <div class="form-group">
                        <label for="equipement" >Choisir un equipement</label><h5 class="form-control">{{ $ligne->equipement}}</h5>
                               
                    </div>
                    <!--  5 Spécefie l'equipement -->
                            <div class="form-group"> 
                                <label>Specifie l'équipement</label><h5 class="form-control">{{ $ligne->spequip }}</h5>
                            </div>
                     <!--  6 niveau de tension-->
                    <div class="form-group">
                        <label>Niveau de tension</label><h5 class="form-control">{{ $ligne->nivU }}</h5>
                        </div>

            <!-- 7 Type d'anomalie -->
            <div class="form-group">
                <label>Type d'anomalie</label><h5 class="form-control">{{ $ligne->typeanom }}</h5>                     
            </div>
                    <!-- 8 Anomalie -->
                    <div class="form-group">
                        <label>l'anomalie enregistrée</label><h5 class="form-control">{{ $ligne->anomalie }}</h5>                    
                    </div>

                <!--   9 Description   -->
                    <div class="form-group"> 
                        <label>Déscription de l'anomalie</label><h5 class="form-control" value="{{ old('descranom') }}">{{ $ligne->descranom }}</h5>
                    </div>
                 
                        <div class="form-group">
                            <label>Anomalie levie (Oui/Non)</label><h5 class="form-control">{{ $ligne->leon }}</h5> 
                        </div>

                    
                   <!--  Boutton de Edit   -->
                   <div class="form-group">
                   
                    <a class="btn btn-success justify-content-center" href="{{ route('dashboard.lignes.index') }}"><i class="fa fa-list"></i>@lang('site.lignes')</a>
                    </div>


                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection
