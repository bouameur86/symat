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
                    <h3 class="box-title">@lang('site.edit')</h3>
                </div><!-- end of box header -->
                <div class="box-body">

                    @include('partials._errors')

                    <form action="{{ route('dashboard.lignes.update', $ligne->id) }}" method="post">

                        {{ csrf_field() }}
                        {{ method_field('put') }}

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Region</label>
                            <div class="col-md-6">
                                <select  class="form-control" name="region">
                                    <option disabled selected>Choisir une region</option>
                                    @foreach($regions as $region)
                                        <option value="{{ $region->id }}" {{ $ligne->region_id == $region->id ? 'selected' : '' }}>{{ $region->code }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    
                        <!-- STE edit-->
                        <div class="form-group">
                            <label>STE</label>
                                <select id=ste class="form-control" name="ste_id" >
                                    <option></option>
                                    @foreach($stes as $ste)
                                        <option value="{{ $ste->id }}"  {{ $ligne->ste_id == $ste->id ? 'selected' : '' }}>{{ $ste->code }}</option>
                                    @endforeach
                                </select>
                        </div>    
                        <!--ligne name-->              
                        <div class="form-group"> 
                            <label>@lang('site.name_ligne')</label>
                            <input type="text" name="name" class="form-control" value="{{ $ligne->name }}">
                        </div>

                        <div class="form-group"> 
                            <label>@lang('site.code_ligne')</label>
                            <input type="text" name="code" class="form-control" value="{{ $ligne->code }}">
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 col-form-label text-md-right">@lang('site.nivU_ligne')</label>
                            <div class="col-md-6">
                                <select class="form-control" name="nivU" value="{{ $ligne->nivU }}" >
                                    <option disabled selected>Choisir un Niveau de tension</option>
                                    <option>400</option>
                                    <option>220</option>
                                    <option>150</option>
                                    <option>90</option>
                                    <option>60</option>
                                    <option>30</option>
                                </select>   
                            </div>
                        </div>

                        <div class="form-group"> 
                            <label class="col-md-4 col-form-label text-md-right">@lang('site.nivU_ligne')</label>
                                <div class="col-md-6">
                                <input type="number" name="nbrpylone" class="form-control" value="{{ $ligne->nbrpylone }}">
                                </div>
                        </div>

                        <div class="form-group"> 
                            <label class="col-md-4 col-form-label text-md-right">@lang('site.longeur_ligne')</label>
                                <div class="col-md-6">
                                <input type="number" name="longeur" class="form-control" value="{{ $ligne->longeur }}">
                                </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 col-form-label text-md-right">@lang('site.section')</label>
                            <div class="col-md-6">
                                <select class="form-control" name="section" >
                                    <option disabled selected>Choisir une section</option>
                                    <option>570</option>
                                    <option>411</option>
                                    <option>360</option>
                                    <option>288</option>
                                    <option>120</option>
                                </select>   
                            </div>
                        </div>

                        <div class="form-group row">
                            <label  class="col-md-4 col-form-label text-md-right">Constructeur</label>
                            <div class="col-md-6">
                                <select  class="form-control" name="constructeur">
                                    <option disabled selected>Constructeur</option>
                                    @foreach($constructeurs as $constructeur)
                                        <option value="{{ $constructeur->id }}" {{ $ligne->ste_id == $ste->id ? 'selected' : '' }}>{{ $constructeur->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group"> 
                            <label>@lang('site.datemise_ligne')</label>
                            <input type="date" name="datemise" class="form-control" value="{{ $ligne->datemise }}">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> @lang('site.edit')</button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection
