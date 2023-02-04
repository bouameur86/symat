@extends('layouts.dashboard.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>@lang('site.users')</h1>
            <ol class="breadcrumb">

                <a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li><a href="{{ route('dashboard.users.index') }}"> @lang('site.users')</a></li>
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

                    <form action="{{ route('dashboard.users.store') }}" method="post" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        {{ method_field('post') }}

                        <div class="form-group">
                            <label>@lang('site.first_name')</label>
                            <input type="text" name="first_name" class="form-control" value="{{ old('first_name') }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('site.last_name')</label>
                            <input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('site.fonction')</label>
                            <select id="fonction" class="form-control" name="fonction" placeholder="choisir une fonction">
                                <option>Choisir une fonction</option>
                                <option>PDG du filialle GRTE.Spa</option>
                                <option>Directeur de Maintenance et travaux</option>
                                <option>Directeur Exploitation</option>
                                <option>Directeur Patrimoine</option>
                                <option>Directeur de Region</option>
                                <option>Chef Département Maintenance</option>
                                <option>Chef Division</option>
                                <option>Chef de Service STE</option>
                                <option>Chef de Service</option>
                                <option>Chef de Subdivision</option>
                                <option>Ingénieur principale</option>
                                <option>Ingénieur d'Etudes</option>
                                <option>Attaché Juridique</option>
                                <option>Assistant SIE</option>
                                <option>Assistant HSE</option>
                                <option>Techicien d'Etudes</option>
                                <option>Tecnicien principale d'exploitation </option>
                                <option>Tecnicien </option>
                                <option>Sucrétaire de direction</option>
                                <option>Sucrétaire de division</option>
                                <option>Sucrétaire de service</option>
                            </select>   
                        </div>


                        <div class="form-group row">
                            <label for="region" class="col-md-12 col-form-label text-md-right">Direction</label>
                            
                            <div class="col-md-6">
                                <select id="region" class="form-control" name="region">
                                    <option disabled selected>Choisir une direction</option>
                                    @foreach($regions as $region)
                                        <option value="{{ $region->id }}">{{ $region->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="structure" class="col-md-12 col-form-label text-md-right">Structure</label>
                            <div class="col-md-6">
                                <select id="structure" class="form-control" name="structure">
                                    <option disabled selected>Choisir une structure</option>
                                    @foreach($structures as $structure)
                                        <option value="{{ $structure->id }}">{{ $structure->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>@lang('site.email')</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('site.image')</label>
                            <input type="file" name="image" class="form-control image">
                        </div>

                        <div class="form-group">
                            <img src="{{ asset('uploads/user_images/default.png') }}"  style="width: 100px" class="img-thumbnail image-preview" alt="">
                        </div>

                        <div class="form-group">
                            <label>@lang('site.password')</label>
                            <input type="password" name="password" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>@lang('site.password_confirmation')</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>@lang('site.permissions')</label>
                            <div class="nav-tabs-custom">

                                @php
                                    $models = [ 'users', 
                                        /*Welcome dashboard */

                                        /*incidents PQS  et   Consignation et Transfert */
                                       'ends', 'indligs', 'indtrs', 'plantrs', 'progconsigs', 'bulhebdos', 'plantras',

                                        /* Organismes et Ouvrages*/
                                        'regions','stes', 'clients', 'constructeurs','structures', 'wilayas','communes', 'injecs','cms','pcgs', 'gpus','postes','lignes',             
                                      /* Anomlaies et soussieges*/
                                      'anomalieexps','anomalieprogs','anomaliestes',
                                        /* sièges et soussieges - NIVU - Typeincidents - Typeanomalies - Anomprogs*/
                                        'departs','transfos','transcs' ,'transps','disjoncs','batconds',
                                        'protections','equipements','transites', 'comptages',
                                         ];

                                    $maps = ['create', 'read', 'update', 'delete'];
                                @endphp

                                <ul class="nav nav-tabs">
                                    @foreach ($models as $index=>$model)
                                        <li class="{{ $index == 0 ? 'active' : '' }}"><a href="#{{ $model }}" data-toggle="tab">@lang('site.' . $model)</a></li>
                                    @endforeach
                                </ul>

                                <div class="tab-content">

                                    @foreach ($models as $index=>$model)

                                        <div class="tab-pane {{ $index == 0 ? 'active' : '' }}" id="{{ $model }}">

                                            @foreach ($maps as $map)
                                                <label><input type="checkbox" name="permissions[]" value="{{ $map . '_' . $model }}"> @lang('site.' . $map)</label>
                                            @endforeach

                                        </div>

                                    @endforeach

                                </div><!-- end of tab content -->
                                
                            </div><!-- end of nav tabs -->
                            
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection
