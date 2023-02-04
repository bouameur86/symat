@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>@lang('site.ends')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li><a href="{{ route('dashboard.ends.index') }}"> @lang('site.ends')</a></li>
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
                     
                        <div class="form-group">
                            <label for="poste">Poste</label>
                                <select id="poste" class="form-control" name="poste_id" value="{{ old('poste') }}">
                                    <option></option>
                                    @foreach($postes as $poste)
                                    <option value="{{ $poste->id }}" {{ $end->poste_id == $poste->id ? 'selected' : '' }}>{{ $poste->name }}</option>
                                    @endforeach
                                </select>
                        </div>
                    
                        <!-- Num TR-->

                        <div class="form-group">
                            <label for="numtr">Transformateur</label><h5 class="form-control">{{ $end->numtr }}</h5>
                                                         
                        </div>

                    <div class="form-group">
                            <label>Niveau de tension</label ><h5 class="form-control">{{ $end->nivU }}</h5>                              
                    </div>
                       
                        {{-- cause de l'incident--}}
                        <div class="form-group">
                            <label for="cause" >Cause de l'évènement</label><h5 class="form-control">{{ $end->cause}}</h5>
                        </div>

                        <div class="form-group">
                            <label>Siège de l'incident</label><h5 class="form-control">{{ $end->evenement }}</h5>
                        </div>

                        <div class="form-group"> 
                            <label>@lang('site.incident')</label><h5 class="form-control">{{ $end->incident }}</h5>
                        </div>

                            {{-- Protection--}}
                        <div class="form-group">
                            <label >Protection</label><h5 class="form-control">{{ $end->protection }}</h5>
                                
                        </div>

                        <div class="form-group"> 
                            <label>Date et heure de debut </label><h5 class="form-control">{{$end->dateheured }}</h5>
                        </div>
                        <div class="form-group"> 
                            <label>DAte et heure de reprise de la charge</label><h5 class="form-control" >{{ $end->dateheuref }}</h5>
                        </div>
                       <!-- Durée-->
                        <div class="form-group"> 
                            <label>Durée de l'interuption (Min) </label><h5 class="form-control">{{ $end->dure }}</h5>
                    
                        <!-- Durée-->
                 
                            <label>Puissance coupée (MW)</label><h5 class="form-control">{{ $end->pcoupe }}</h5>
                        </div>

                        <!-- energie -->
                        <div class="form-group"> 
                            <label>@lang('site.energie')</label><h5 class="form-control">{{ $end->energie }}</h5>
                        </div>

                        <!-- imputation -->
                        <div class="form-group">
                            <label >@lang('site.imputation')</label><h5 class="form-control">{{ $end->imputation }}</h5>
                  
                        </div>

                        <div class="form-group">
                            <label>Ouvrage mis en cause</label><h5 class="form-control">{{ $end->ouvcause }}</h5> 
                        </div>

                        <div class="form-group">
                            <label for="saifi">SAIFI</label><h5 class="form-control" >{{ $end->saifi }}</h5>
                        </div>

                            <!-- SAIDI-->
                        <div class="form-group"> 
                            <label>SAIDI</label><h5 class="form-control">{{ $end->saidi}}</h5>
                        </div>
                         <!-- dhretour -->
                        <div class="form-group"> 
                            <label>Date et heure de retour de l'ouvrage</label><h5 class="form-control">{{ $end->dhretour }}</h5>
                        </div>
                        <!-- indispo-->
                   
                        <div class="form-group"> 
                            <label  >Indisponubilité</label><h5 class="form-control">{{ $end->indispo }}</h5>
                        </div>
                        
                        <!-- MG MP -->
                        <div class="form-group">
                            <label >Manque de tension</label><h5 class="form-control">{{$end->mgmp}}</h5>
                        </div>
                    
                   <!--  Boutton de Edit   -->
                   <div class="form-group">
                    <a class="btn btn-success justify-content-center" href="{{ route('dashboard.ends.index') }}">Retour INC</a>
                    </div>


                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection
