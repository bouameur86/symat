@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>@lang('site.transfos')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li><a href="{{ route('dashboard.regions.index') }}"> @lang('site.regions')</a></li>
                <li><a href="{{ route('dashboard.transfos.index') }}"> @lang('site.transfos')</a></li>
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

                    <form action="{{ route('dashboard.transfos.store') }}" method="POST" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        {{ method_field('post') }}
                        
                        <div class="form-group">
                            <label >Poste</label>
                                <select  id="poste" class="form-control" name="poste">
                                    <option disabled selected>Choisir un poste éléctrique</option>
                                    @foreach($postes as $poste)
                                        <option value="{{ $poste->id }}">{{ $poste->name }}</option>
                                    @endforeach
                                </select>
                        </div>
                                            
                        <div class="form-group">
                            <label >Trans</label>
                            <select class="form-control" name="name">
                                <option disabled selected>Choisir un Transformateur</option> 
                                <option>TR n°1</option>
                                <option>TR n°2</option>
                                <option>TR n°3</option>
                                <option>TR n°4</option>
                                <option>TR n°5</option>
                                <option>TR n°6</option>
                            </select>   
                        </div>

                        <div class="form-group">
                            <label >Niveau de tension du TR</label>
                            <select id="nivU" class="form-control" name="nivU" value="{{ old('nivU') }}" >
                                <option disabled selected>Choisir un niveau de tension</option>
                                <option>400/220</option>
                                <option>220</option>
                                <option>220/60</option>
                                <option>220/30</option>
                                <option>220/60/30</option>
                                <option>220/60/10</option>
                                <option>60/30</option>
                                <option>60/10</option>
                                <option>30/5,5</option>
                            </select>   
                        </div>

                        <div class="form-group">
                            <label >Puissance du transformateur</label>
                            <select id="puissance" class="form-control" name="puissance" value="{{ old('puissance') }}" >
                                <option disabled selected>EN MVA</option>
                                <option>140</option>
                                <option>120</option>
                                <option>80</option>
                                <option>40</option>
                                <option>20</option>
                                <option>10</option>

                            </select>   
                        </div>

                        <div class="form-group"> 
                            <label>@lang('site.numgrte')</label>
                            <input type="text" name="numgrte" class="form-control" value="{{ old('numgrte') }}">
                        </div>

                        <div class="form-group">
                            <label >Constructeur</label>
                                <select  id="constructeur" class="form-control" name="constructeur">
                                    <option disabled selected>Constructeur</option>
                                    @foreach($constructeurs as $constructeur)
                                        <option value="{{ $constructeur->id }}">{{ $constructeur->name }}</option>
                                    @endforeach
                                </select>
                   
                        </div>

                        <div class="form-group"> 
                            <label>@lang('site.datemise_transfo')</label>
                            <input type="date" name="datemise" class="form-control" value="{{ old('datemise') }}">
                        </div>

                        <div class="form-group">
                            <select class="form-control" name="etat">
                                <option disabled selected>Etat de transforameur</option>
                                <option>En Service</option>
                                <option>Hors Service</option>
                                <option>Avarie</option>
                                <option>PDR</option>
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

  <!-- Internal Select2 js-->
  <script src="{{ URL::asset('dashboard_files/plugins/select2/js/select2.min.js') }}"></script>
  <script type="text/javascript">

   $("#poste").select2({
       placeholder: "Select poste",
       allowClear: true
   });

   $("#constructeur").select2({
       placeholder: "Select Constructeur",
       allowClear: true
   });


  </script>



@endsection
