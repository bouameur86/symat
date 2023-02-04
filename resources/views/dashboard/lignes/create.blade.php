@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>@lang('site.lignes')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li><a href="{{ route('dashboard.regions.index') }}"> @lang('site.regions')</a></li>
                <li><a href="{{ route('dashboard.lignes.index') }}"> @lang('site.lignes')</a></li>
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

                    <form action="{{ route('dashboard.lignes.store') }}" method="POST" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        {{ method_field('post') }}
                        
                        <div class="form-group">
                            <label for="region">Region</label>
                                <select  class="form-control" name="region" value="{{ old('region') }}">
                                    <option disabled selected>Choisir une Region</option>
                                    @foreach($regions as $region)
                                        <option value="{{ $region->id }}">{{ $region->name }}</option>
                                    @endforeach
                                </select>
                        </div>

                        <!-- STE -->
                        <div class="form-group">
                            <label for="ste" >STE</label>
                                <select  class="form-control" name="ste" id="ste"  value="{{ old('ste') }}">
                                    <option></option>
                                    @foreach($stes as $ste)
                                        <option value="{{ $ste->id }}">{{ $ste->name }}</option>
                                    @endforeach
                                </select>
            
                        </div>
                            <!-- Nom ligne-->                
                        <div class="form-group"> 
                            <label>Nom de ligne</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                        </div>
                            <!-- code ligne--> 
                        <div class="form-group"> 
                            <label>Code de ligne</label>
                            <input type="text" name="code" class="form-control" value="{{ old('code')  }}">
                        </div>

                           <!-- code ligne--> 
                        <div class="form-group">
                            <label>Niveau de U (kV) </label>
                                    <select class="form-control" name="nivU" >
                                        <option disabled selected>Choisir un Niveau de tension</option>
                                        <option>400</option>
                                        <option>220</option>
                                        <option>150</option>
                                        <option>90</option>
                                        <option>60</option>
                                        <option>30</option>
                                        <option>10</option>
                                    </select>   
                        </div>

                         <!-- longeur --> 
                        <div class="form-group"> 
                            <label>Longeur (Km)</label>
                            <input type="text" name="longeur" class="form-control" value="{{ old('longeur') }}">
                        </div>

                        <div class="form-group"> 
                            <label>Nombre de pylône</label>
                            <input type="text" name="nbrpylone" class="form-control" value="{{ old('nbrpylone') }}">
                        </div>

                        <div class="form-group">
                            <label>Section de conducteur</label>
                                    <select class="form-control" name="section" >
                                        <option disabled selected>Choisir une section</option>
                                        <option>570</option>
                                        <option>411</option>
                                        <option>360</option>
                                        <option>288</option>
                                        <option>120</option>
                                    </select>   
                        </div>

                        <div class="form-group">
                            <label>Constructeur</label>
                                <select id="constructeur" class="form-control" name="constructeur">
                                    <option disabled selected>Constructeur</option>
                                    @foreach($constructeurs as $constructeur)
                                        <option value="{{ $constructeur->id }}">{{ $constructeur->name }}</option>
                                    @endforeach
                                </select>
                        </div>
                        <!-- DMS-->
                        <div class="form-group"> 
                            <label>Date de Mise en service</label>
                            <input type="date" name="datemise" class="form-control" value="{{ old('datemise') }}">
                        </div>
                 
                        <div class="form-group" class="col-md-4">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="{{ URL::asset('dashboard_files/plugins/select2/js/select2.min.js') }}"></script>
    <script type="text/javascript">
    
          $("#constructeur").select2({
                placeholder: "Select Constructeur",
                allowClear: true
            });

            $("#ste").select2({
                placeholder: "Select Service transport",
                allowClear: true
            });
    </script>






@endsection
