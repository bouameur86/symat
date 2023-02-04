@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>@lang('site.communes')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li><a href="{{ route('dashboard.communes.index') }}"> @lang('site.communes')</a></li>
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

                    <form action="{{ route('dashboard.communes.store') }}" method="POST" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        {{ method_field('post') }}
                        
                        <!-- nom de commune-->
                        <div class="form-group">
                            <label>@lang('site.nom_de_la_commune')</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                        </div>
                        <!-- wilaya-->
                        <div class="form-group">
                            <label for="wilaya" class="col-md-4 col-form-label text-md-right">Wilaya</label>
                                <select id="wilaya" class="form-control" name="wilaya">
                                    <option disabled selected>Choisir une wilaya</option>
                                    @foreach($wilayas as $wilaya)
                                        <option value="{{ $wilaya->id }}">{{ $wilaya->name }}</option>
                                    @endforeach
                                </select>
                        </div>
                        <!-- code commune-->
                        <div class="form-group">
                            <label>Code</label>
                            <input type="number" name="code" class="form-control" value="{{ old('code') }}">
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
