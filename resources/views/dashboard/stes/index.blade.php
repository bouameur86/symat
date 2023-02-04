@extends('layouts.dashboard.app')

@section('dashboard.app')

@endsection

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('site.stes')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li><a href="{{ route('dashboard.regions.index') }}"><i class="fa fa-gear"></i> @lang('site.regions')</a></li>
                
                <li class="active">@lang('site.stes')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px">@lang('site.stes') <small>{{ $stes->total() }}</small></h3>

                    <form action="{{ route('dashboard.stes.index') }}" method="get">

                        <div class="row">
                            <div class="col-md-2">
                                <select name="region_id" class="form-control">
                                    <option value="">par region</option>
                                    @foreach ($regions as $region)
                                        <option value="{{ $region->id }}" {{ request()->region_id == $region->id ? 'selected' : '' }}>{{ $region->code }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="col-md-2">
                                <input type="text" name="search" class="form-control" placeholder="@lang('site.search')" value="{{ request()->search }}">
                            </div>
                            <div class="col-md-2">   
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> @lang('site.search')</button>
                            </div>
                              <!-- Create botton -->
                            <div class="col-md-3">                           
                                @if (auth()->user()->hasPermission('create_stes'))
                                    <a href="{{ route('dashboard.stes.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</a>
                                @else
                                    <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i> @lang('site.add')</a>
                                @endif
                            </div> 
                             <!-- Export botton -->

                            <div class="col-md-2" >
                                <a  href="{{ url('dashboard/export_stes')}}" class="btn btn-primary"><i class="fa fa-file-excel-o" aria-hidden="true"></i>Export</a> 
                            </div>

                    <!-- import botton -->
                    @if (auth()->user()->hasPermission('import_stes'))
                    <a href="{{ route('dashboard.stes.import') }}" class="btn btn-sm btn-success">Import</a>
                    @else
                    <a href="#" class="btn btn-primary hidden"><i class="fa fa-plus"></i></a>
                @endif
            </div>

                    
                    </form><!-- end of form -->

                </div><!-- end of box header -->

                <div class="box-body">

                    @if ($stes->count() > 0)

                    <table  id="exemple-table" class="table table-hover">

                            <thead>
                            <tr>
                                <th>N°</th>
                                <th>Nom de STE</th>
                                <th>Code</th>
                                <th>Commune</th>
                                <th>Region DTE</th>
                                <th>Address</th>
                                <th>Action</th> 
                            </tr>
                            </thead>
                            
                            <tbody>
                            @foreach ($stes as $index=>$ste)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $ste->name }}</td>
                                    <td>{{ $ste->code }}</td>
                                    <td>{{ $ste->commune != null ? $ste->commune->name : '' }}</td>
                                    <td>{{ $ste->region != null ? $ste->region->code : '' }}</td>
                                    <td>{{ $ste->address }}</td>
                                    <td>
                                        @if (auth()->user()->hasPermission('update_stes'))
                                            <a href="{{ route('dashboard.stes.edit', $ste->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                            
                                        @else
                                            <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i></a>
                                        @endif
                                        {{-- authorisation de modifier ste--}}
                                        @if (auth()->user()->hasPermission('delete_stes'))
                                            <form action="{{ route('dashboard.stes.destroy', $ste->id) }}" method="POST" style="display: inline-block">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                                <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i></button>
                                            </form><!-- end of form -->
                                        @else
                                          {{-- authorisation de supprimer ste--}}
                                            <button class="btn btn-danger btn-sm disabled"><i class="fa fa-trash"></i></button>
                                        @endif
                                    </td>
                                </tr>
                            
                            @endforeach
                            </tbody>

                        </table><!-- end of table -->
                      
                        {{ $stes->appends(request()->query())->links() }}
                           
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

@endsection
