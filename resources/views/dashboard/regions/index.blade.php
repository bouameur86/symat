@extends('layouts.dashboard.app')

@section('head')

@endsection

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('site.regions')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li class="active">@lang('site.regions')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <form action="{{ route('dashboard.regions.index') }}" method="get">

                        <div class="row">
                            <div class="col-md-2">
                                @if (auth()->user()->hasPermission('create_regions'))
                                    <a href="{{ route('dashboard.regions.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</a>
                                @else
                                    <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i> @lang('site.add')</a>
                                @endif
                            </div>

                        </div>
                    </form><!-- end of form -->

                </div><!-- end of box header -->

                <div class="box-body">

                    @if ($regions->count() > 0)

                    <table  id="exemple-table" class="table table-hover">

                            <thead>
                            <tr>
                                <th>N°</th>
                                <th>@lang('site.name')</th>
                                <th>@lang('site.code')</th>      
                                <th>@lang('site.phone')</th>   
                                <th>@lang('site.address')</th>
                                <th>@lang('site.action')</th>
                            </tr>
                            </thead>
                            
                            <tbody>
                            @foreach ($regions as $index=>$region)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $region->name }}</td>
                                    <td>{{ $region->code }}</td>
                                    <td>{{ $region->phone }}</td>
                                    <td>{{ $region->address}}</td>
                                    <td>
                                        @if (auth()->user()->hasPermission('update_regions'))
                                            <a href="{{ route('dashboard.regions.edit', $region->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> @lang('site.edit')</a>
                                        @else
                                            <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i> @lang('site.edit')</a>
                                        @endif
                                        {{-- authorisation de modifier region--}}
                                        @if (auth()->user()->hasPermission('delete_regions'))
                                            <form action="{{ route('dashboard.regions.destroy', $region->id) }}" method="post" style="display: inline-block">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                                <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i> @lang('site.delete')</button>
                                            </form><!-- end of form -->
                                        @else
                                          {{-- authorisation de supprimer region--}}
                                            <button class="btn btn-danger btn-sm disabled"><i class="fa fa-trash"></i> @lang('site.delete')</button>
                                        @endif
                                    </td>
                                </tr>
                            
                            @endforeach
                            </tbody>
                        </table><!-- end of table -->
               
                    @else
                        
                        <h2>@lang('site.no_data_found')</h2>
                        
                    @endif

                </div><!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection

@section('script')
 
<script src="{{ asset('dashboard_files/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('dashboard_files/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

<!-- page script -->

@endsection