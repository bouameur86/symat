@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>@lang('site.stes')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li><a href="{{ route('dashboard.stes.index') }}"> @lang('site.stes')</a></li>
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

                    <form action="{{ route('dashboard.stes.update', $ste->id) }}" method="post">

                        {{ csrf_field() }}
                        {{ method_field('put') }}

                        <div class="form-group">
                            <label>@lang('site.nom_de_la_ste')</label>
                            <input type="text" name="name" class="form-control" value="{{ $ste->name }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('site.code_STE')</label>
                            <input type="text" name="code" class="form-control" value="{{ $ste->code }}">
                        </div>

                        <div class="form-group">
                            <label>Commune</label> 
                                <select  id="commune" class="form-control" name="commune_id">
                                    <option disabled selected>Choisir une region</option>
                                    @foreach($communes as $commune)
                                        <option value="{{ $commune->id }}" {{ $ste->commune_id == $commune->id ? 'selected' : '' }}>{{ $commune->code }}</option>
                                    @endforeach
                                </select>
                            </div>
                    
                        <div class="form-group">
                            <label>@lang('site.commune')</label>
                            <select class="form-control" name="region_id">
                                    <option >Choisir une Region</option>
                                    @foreach ($regions as $region)
                                    <option value="{{ $region->id }}" {{ $ste->region_id == $region->id ? 'selected' : '' }}>{{ $region->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>@lang('site.address_STE')</label>
                            <textarea type="text" name="address" class="form-control"  rows='3' value="{{ $ste->address }}">{{ $ste->address }}</textarea>
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
