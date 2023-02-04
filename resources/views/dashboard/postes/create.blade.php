@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>@lang('site.postes')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li><a href="{{ route('dashboard.regions.index') }}"> @lang('site.regions')</a></li>
                <li><a href="{{ route('dashboard.postes.index') }}"> @lang('site.postes')</a></li>
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

                    <form action="{{ route('dashboard.postes.store') }}" method="POST" enctype="multipart/form-data">
                       
                        
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
                                            
                        <div class="form-group"> 
                            <label>@lang('site.name_poste')</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                        </div>

                        <div class="form-group"> 
                            <label>@lang('site.code_poste')</label>
                            <input type="text" name="code" class="form-control" value="{{ old('code') }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('site.code_nivU')</label>
                            <select id="nivU" class="form-control" name="nivU" value="{{ old('nivU') }}">
                                <option disabled>choisir la tension</option> 
                                <option>400/220</option>
                                <option>220</option>
                                <option>220/60</option>
                                <option>220/30</option>
                                <option>220/60/30</option>
                                <option>220/60/10</option>
                                <option>60/30</option>
                                <option>60/10</option>
                            </select>   
                        </div>

                        <div class="form-group">
                            <label for="ste" >STE</label>
                                <select  class="form-control" name="ste" id="ste">
                                    <option></option>
                                    @foreach($stes as $ste)
                                        <option value="{{ $ste->id }}">{{ $ste->name }}</option>
                                    @endforeach
                                </select>
            
                        </div>
                        
                        <div class="form-group">
                            <label for="clientxd">Client</label>
                            <select id="clientxd" class="form-control" name="clientxd" value="{{ old('clientxd') }}">
                                <option>Choisir un client</option>
                                <option>RDA</option>
                                <option>RDC</option>
                                <option>RDE</option>
                                <option>RDO</option>
                                <option>CHT</option>
                            </select>   
                        </div>
                        <div class="form-group">
                            <label for="constructeur">Constructeur</label>
                                <select class="form-control" name="constructeur">
                                    <option disabled selected>Constructeur</option>
                                    @foreach($constructeurs as $constructeur)
                                        <option value="{{ $constructeur->id }}">{{ $constructeur->name }}</option>
                                    @endforeach
                                </select>
                          
                        </div>
                        <!-- select commune-->
                        <div class="form-group">
                            <label for="commune">Commune</label>
                                <select id="commune" name="commune" class="form-control" >
                                    <option></option>
                                    @foreach($communes as $commune)
                                        <option value="{{$commune->id }}">{{$commune->name}}</option>
                                    @endforeach
                                </select>
                        </div>

                        <div class="form-group"> 
                            <label>@lang('site.datemise_poste')</label>
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
    <script src="{{ URL::asset('dashboard_files/plugins/select2/js/select2.min.js') }}"></script>
    <script type="text/javascript">
    
          $("#commune").select2({
                placeholder: "Select Commune",
                allowClear: true
            });

            $("#ste").select2({
                placeholder: "Select Service transport",
                allowClear: true
            });
    </script>


@endsection

