@extends('layouts.dashboard.app')

@section('dashboard.app')

@section('head')
@endsection

@endsection

@section('content')

        <div class="content-wrapper">

            <section class="content-header">

                <h1>@lang('site.stes')</h1>

                <ol class="breadcrumb">
                    <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                    <li><a href="{{ route('dashboard.stes.index') }}"><i class="fa fa-gear"></i> @lang('site.stes')</a></li>
                    <li class="active">@lang('site.stes')</li>
                </ol>
            </section>
            <section class="content">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header d-flex">
                                        {{ __('Upload Excel File') }}

                                        <a href="{{ route('dashboard.stes.index') }}" class="btn btn-sm btn-primary ml-auto">Return to products</a>
                                    </div>

                                    <div class="card-body">
                                
                                        <form action="{{ route('dashboard.stes.import') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="custom-file">
                                                <input type="file" name="attachment" class="custom-file-input" id="validatedCustomFile">
                                                <label class="custom-file-label" for="validatedCustomFile">Choose Excel file...</label>
                                    
                                            </div>
                                            <div class="pt-4">
                                                <button type="submit" class="btn btn-sm btn-primary">Import</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
              </div>
        @endsection            
        </div>

@section('script')

<script src="{{ asset('dashboard_files/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('dashboard_files/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>


@endsection

 
