@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>Travée</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li><a href="{{ route('dashboard.comptages.index') }}"> @lang('site.comptages')</a></li>
                <li class="active">@lang('site.edit')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">@lang('site.edit')</h3>
                </div><!-- end of box header -->
                <div class="box-body">

                    @include('partials._errors')

                    <form action="{{ route('dashboard.comptages.update', $comptage->id) }}" method="post">

                        {{ csrf_field() }}
                        {{ method_field('put') }}
                       
                        <div class="form-group">
                            <label>Poste</label> 
                                <select  class="form-control" name="poste_id">
                                    <option disabled selected>Choisir une region</option>
                                    @foreach($postes as $poste)
                                        <option value="{{ $poste->id }}" {{ $comptage->poste_id == $poste->id ? 'selected' : '' }}>{{ $poste->code }}</option>
                                    @endforeach
                                </select>
        
                        </div>
                                            
                        <div class="form-group"> 
                            <label>Libillée de la travée</label>
                            <input type="text" name="name" class="form-control" value="{{ $comptage->name }}">
                        </div>

                       
                        <div class="form-group">
                            <label>Niveau de tension</label>
                                <select class="form-control" name="nivU" value="{{ $comptage->nivU }}" >
                                    <option disabled selected>{{ $comptage->nivU }}</option>
                                    <option>400/220kV</option>
                                    <option>220kV</option>
                                    <option>60kV</option>
                                    <option>220/60kV</option>
                                    <option>220/30kV</option>
                                    <option>220/60/30kV</option>
                                    <option>220/60/10kV</option>
                                    <option>60/30kV</option>
                                    <option>60/10kV</option>
                                </select>   
                            </div>

                            <!-- edit commune -->

                        <div class="form-group"> 
                            <label>Etat de la travée</label>
                            <select name="etat" class="form-control">
                                <option>{{ $comptage->etat }}</option>
                                <option>En Service</option>
                                <option>Hors Service</option>
                                <option>Reserve</option>
                            </select>
                        </div>
                    

                          <!-- edit commune -->

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> @lang('site.edit')</button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    
    <script type="text/javascript">
    
          $("#poste").select2({
                placeholder: "Select poste",
                allowClear: true
            });

    </script>

@endsection