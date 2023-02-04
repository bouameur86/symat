@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>Travée</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li><a href="{{ route('dashboard.compteurs.index') }}"> @lang('site.compteurs')</a></li>
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

                    <form action="{{ route('dashboard.compteurs.update', $compteur->id) }}" method="post">

                        {{ csrf_field() }}
                        {{ method_field('put') }}
                       
                        <div class="form-group">
                            <label>Poste</label> 
                                <select  class="form-control" name="poste_id">
                                    <option disabled selected>Choisir une region</option>
                                    @foreach($postes as $poste)
                                        <option value="{{ $poste->id }}" {{ $compteur->poste_id == $poste->id ? 'selected' : '' }}>{{ $poste->code }}</option>
                                    @endforeach
                                </select>
        
                        </div>
                                            
                        <div class="form-group"> 
                            <label>Libillée de la travée</label>
                            <input type="text" name="name" class="form-control" value="{{ $depart->name }}">
                        </div>

                        <div class="form-group"> 
                            <label>Libillée de la travée</label>
                            <input type="text" name="compt_num" class="form-control" value="{{ $compteur->comp_num }}">
                        </div>
                       
                            <!-- Etat -->
                        <div class="form-group"> 
                            <label>Libillée de la travée</label>
                            <input type="text" name="compt_constr" class="form-control" value="{{ $compteur->comp_constr }}">
                        </div>
                            <!-- Etat -->


                        <div class="form-group"> 
                            <label>Etat de la travée</label>
                            <select name="etat" class="form-control">
                                <option>{{ $compteur->etat }}</option>
                                <option>MARCHE</option>
                                <option>ARRET</option>
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
