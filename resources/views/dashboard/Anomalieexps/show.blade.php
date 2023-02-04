@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>@lang('site.anomalieexps')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li><a href="{{ route('dashboard.anomalieexps.index') }}"> @lang('site.anomalieexps')</a></li>
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
                     
                       <!-- 1 numero message -->
                       <div class="form-group"> 
                        <label>Numero de message</label><h5 class="form-control">{{ $anomalieexp->numes }}</h5>
                    </div>
                    <!-- 2 Date de l'anomalie -->
                    <div class="form-group"> 
                        <label>Date de l'anomalie</label><h5 class="form-control">{{ $anomalieexp->dateanom}}</h5>
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
                        <label for="equipement" >Choisir un equipement</label><h5 class="form-control">{{ $anomalieexp->equipement}}</h5>
                               
                    </div>
                    <!--  5 Spécefie l'equipement -->
                            <div class="form-group"> 
                                <label>Specifie l'équipement</label><h5 class="form-control">{{ $anomalieexp->spequip }}</h5>
                            </div>
                     <!--  6 niveau de tension-->
                    <div class="form-group">
                        <label>Niveau de tension</label><h5 class="form-control">{{ $anomalieexp->nivU }}</h5>
                        </div>

            <!-- 7 Type d'anomalie -->
            <div class="form-group">
                <label>Type d'anomalie</label><h5 class="form-control">{{ $anomalieexp->typeanom }}</h5>                     
            </div>
                    <!-- 8 Anomalie -->
                    <div class="form-group">
                        <label>l'anomalie enregistrée</label><h5 class="form-control">{{ $anomalieexp->anomalie }}</h5>                    
                    </div>

                <!--   9 Description   -->
                    <div class="form-group"> 
                        <label>Déscription de l'anomalie</label><h5 class="form-control" value="{{ old('descranom') }}">{{ $anomalieexp->descranom }}</h5>
                    </div>
                 
                        <div class="form-group">
                            <label>Anomalie levie (Oui/Non)</label><h5 class="form-control">{{ $anomalieexp->leon }}</h5> 
                        </div>

                    
                   <!--  Boutton de Edit   -->
                   <div class="form-group">
                   
                    <a class="btn btn-success justify-content-center" href="{{ route('dashboard.anomalieexps.index') }}"><i class="fa fa-list"></i>@lang('site.anomalieexps')</a>
                    </div>


                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection
