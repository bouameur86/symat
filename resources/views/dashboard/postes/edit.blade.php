@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>@lang('site.postes')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li><a href="{{ route('dashboard.postes.index') }}"> @lang('site.postes')</a></li>
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

                    <form action="{{ route('dashboard.postes.update', $poste->id) }}" method="post">

                        {{ csrf_field() }}
                        {{ method_field('put') }}
                       
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Region</label>
                            <div class="col-md-6">
                                <select  class="form-control" name="region_id">
                                    <option disabled selected>Choisir une region</option>
                                    @foreach($regions as $region)
                                        <option value="{{ $region->id }}" {{ $poste->region_id == $region->id ? 'selected' : '' }}>{{ $region->code }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                                            
                        <div class="form-group"> 
                            <label>@lang('site.name_poste')</label>
                            <input type="text" name="name" class="form-control" value="{{ $poste->name }}">
                        </div>

                        <div class="form-group"> 
                            <label>@lang('site.code_poste')</label>
                            <input type="text" name="code" class="form-control" value="{{ $poste->code }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('site.nivU_poste')</label>
                                <select class="form-control" name="nivU" value="{{ $poste->nivU }}" >
                                    <option disabled selected>{{ $poste->nivU }}</option>
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
                            <label>STE</label>
                                <select id=ste class="form-control" name="ste_id" >
                                    <option></option>
                                    @foreach($stes as $ste)
                                        <option value="{{ $ste->id }}"  {{ $poste->ste_id == $ste->id ? 'selected' : '' }}>{{ $ste->code }}</option>
                                    @endforeach
                                </select>
                        </div>

                        <div class="form-group">
                            <select id="clientxd" class="form-control" name="clientxd">
                                <option>{{ $poste->clientxd }}</option>
                                <option>RDA</option>
                                <option>RDC</option>
                                <option>RDE</option>
                                <option>RDO</option>
                                <option>CHT</option>
                            </select>   
                        </div>

                        <!--  constructeur  -->
                        <div class="form-group">
                            <label >Constructeur</label>
                                <select  class="form-control" name="constructeur_id">
                                    <option disabled selected>Constructeur</option>
                                    @foreach($constructeurs as $constructeur)
                                        <option value="{{ $constructeur->id }}" {{ $poste->constructeur_id == $constructeur->id ? 'selected' : '' }}>{{ $constructeur->name }}</option>
                                    @endforeach
                                </select>
                        
                        </div>
                            <!-- edit commune -->
                            <label for="commune">Commune</label>
                            <select id=commune class="form-control" name="commune_id">
                                        <option></option>
                                        @foreach($communes as $commune)
                                            <option value="{{ $commune->id }}"{{ $poste->commune_id == $commune->id ? 'selected' : '' }}>{{ $commune->name }}</option>
                                        @endforeach
                            </select>
                         
                            </div>
                           

                        <div class="form-group"> 
                            <label>@lang('site.datemise_poste')</label>
                            <input type="date" name="datemise" class="form-control" value="{{ $poste->datemise }}">
                        </div>
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
