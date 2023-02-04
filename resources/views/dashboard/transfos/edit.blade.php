@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>@lang('site.transfos')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li><a href="{{ route('dashboard.transfos.index') }}"> @lang('site.transfos')</a></li>
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

                    <form action="{{ route('dashboard.transfos.update', $transfo->id) }}" method="post">

                        {{ csrf_field() }}
                        {{ method_field('put') }}

                       
                        <div class="form-group row">
                            <label for="poste" class="col-md-4 col-form-label text-md-right">Poste</label>
                            <div class="col-md-6">
                                <select id="poste" class="form-control" name="poste">
                                    <option disabled selected>Choisir un poste éléctrique</option>
                                    @foreach($postes as $poste)
                                        <option value="{{ $poste->id }}">{{ $poste->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                                            
                        <div class="form-group">
                            <select id="name" class="form-control" name="name">
                                <option>TR n°1</option>
                                <option>TR n°2</option>
                                <option>TR n°3</option>
                                <option>TR n°4</option>
                                <option>TR n°5</option>
                                <option>TR n°6</option>
                            </select>   
                        </div>

                        <div class="form-group">
                            <select id="nivU" class="form-control" name="nivU">
                                <option>400/220kV</option>
                                <option>220kV</option>
                                <option>220/60kV</option>
                                <option>220/30kV</option>
                                <option>220/60/30kV</option>
                                <option>220/60/10kV</option>
                                <option>60/30kV</option>
                                <option>60/10kV</option>
                            </select>   
                        </div>

                        <div class="form-group"> 
                            <label>@lang('site.puissance')</label>
                            <input type="text" name="puissance" class="form-control" value="{{ old('puissance') }}">
                        </div>

                        <div class="form-group"> 
                            <label>@lang('site.numgrte')</label>
                            <input type="text" name="numgrte" class="form-control" value="{{ old('numgrte') }}">
                        </div>

                        <div class="form-group row">
                            <label for="constructeur" class="col-md-4 col-form-label text-md-right">Constructeur</label>
                            <div class="col-md-6">
                                <select id="constructeur" class="form-control" name="constructeur">
                                    <option disabled selected>Constructeur</option>
                                    @foreach($constructeurs as $constructeur)
                                        <option value="{{ $constructeur->id }}">{{ $constructeur->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group"> 
                            <label>@lang('site.datemise_transfo')</label>
                            <input type="date" name="datemise" class="form-control" value="{{ old('datemise') }}">
                        </div>

                        <div class="form-group">
                            <select id="etat" class="form-control" name="etat" aria-placeholder="Etat du TR">
                                <option>En Service</option>
                                <option>Hors Service</option>
                                <option>PDR</option>
                            </select>   
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> @lang('site.edit')</button>
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
