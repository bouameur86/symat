@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>@lang('site.stes')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li><a href="{{ route('dashboard.stes.index') }}"> @lang('site.stes')</a></li>
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

                    <form action="{{ route('dashboard.stes.store') }}" method="POST" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        {{ method_field('post') }}
                        
                        <div class="form-group"> 
                            <label>@lang('site.name_STE')</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                        </div>

                        <div class="form-group"> 
                            <label>@lang('site.code_STE')</label>
                            <input type="text" name="code" class="form-control" value="{{ old('code') }}">
                        </div>
                        <!--  commune origine-->
                      
                        <div class="form-group">
                        <label for="commune">commune</label>
                            <select id="commune" class="form-control" name="commune" value="{{ old('commune') }}">
                                <option></option>
                                @foreach($communes as $commune)
                                    <option value="{{ $commune->id }}">{{ $commune->name }}</option>
                                @endforeach
                            </select>
                        </div>

                         <!--  Region-->
                         
                        <div class="form-group">
                            <label for="region">region</label>
                                <select id="region" class="form-control" name="region" value="{{ old('region') }}">
                                    <option disabled selected>Région de transport</option>
                                    @foreach($regions as $region)
                                        <option value="{{ $region->id }}">{{ $region->name }}</option>
                                    @endforeach
                                </select>
                        </div>
                        
                        <div class="form-group"> 
                            <label>Address de STE</label>
                            <input type="text" name="address" class="form-control" value="{{ old('address') }}">
                        </div>

                        <div class="form-group">
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
  
      $("#commune").select2({
          placeholder: "Select Commune",
          allowClear: true
      });
     </script>
@endsection
