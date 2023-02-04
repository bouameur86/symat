@extends('layouts.dashboard.app')

@section('dashboard.app')

@endsection

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

                <h1>@lang('site.communes')</h1>

                <ol class="breadcrumb">
                    <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                    <li><a href="{{ route('dashboard.wilayas.index') }}"><i class="fa fa-gear"></i> @lang('site.wilayas')</a></li>
                    <li class="active">@lang('site.communes')</li>
                </ol>
        </section>

        <section class="content">
            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px">@lang('site.communes') <small>{{ $communes->total() }}</small></h3>

                    <form action="{{ route('dashboard.communes.index') }}" method="get">

                        <div class="row">
                            <div class="col-md-2">
                                <select id="wilaya" name="wilaya_id" class="form-control">
                                    <option></option>
                                    @foreach ($wilayas as $wilaya)
                                        <option value="{{ $wilaya->id }}" {{ request()->wilaya_id == $wilaya->id ? 'selected' : '' }}>{{ $wilaya->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <input type="text" name="search" class="form-control" placeholder="@lang('site.search')" value="{{ request()->search }}">
                            </div>
                            
                              <!-- Create botton -->
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> @lang('site.search')</button>
                                @if (auth()->user()->hasPermission('create_communes'))
                                    <a href="{{ route('dashboard.communes.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</a>
                                @else
                                    <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i> @lang('site.add')</a>
                                @endif
                            </div>
               

               <!-- Export botton -->

            <div class="col-md-2" >
                <a  href="{{ url('dashboard/export_communes')}}" class="btn btn-primary"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Export-Excel</a> 
                </div>

                <!-- import botton -->
                @if (auth()->user()->hasPermission('import_communes'))
                <a href="{{ route('dashboard.communes.import') }}" class="btn btn-sm btn-success">Import</a>
                @else
                <a href="#" class="btn btn-primary hidden"><i class="fa fa-plus"></i></a>
                @endif
                </div>

                        
                    </form><!-- end of form -->

                </div><!-- end of box header -->

                <div class="box-body">

                    @if ($communes->count() > 0)

                        <table id="exemple-table" class="table table-stribed table-hover" width="100%" cellspacing="0">

                            <thead>
                            <tr>
                                <th>N°</th>
                                <th>@lang('site.nom_de_la_commune')</th>
                                <th>@lang('site.wilaya')</th>
                                <th>@lang('site.code')</th>
                                <th>@lang('site.action')</th> 
                            </tr>
                            </thead>
                            
                            <tbody>
                            @foreach ($communes as $index=>$commune)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $commune->name }}</td>
                                    <td>{{ $commune->wilaya != null ? $commune->wilaya->name : '' }}</td>
                                    <td>{{ $commune->code }}</td>
                                    <td>
                                        @if (auth()->user()->hasPermission('update_communes'))
                                            <a href="{{ route('dashboard.communes.edit', $commune->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                            
                                        @else
                                            <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i></a>
                                        @endif
                                        {{-- authorisation de modifier commune--}}
                                        @if (auth()->user()->hasPermission('delete_communes'))
                                            <form action="{{ route('dashboard.communes.destroy', $commune->id) }}" method="POST" style="display: inline-block">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                                <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i></button>
                                            </form><!-- end of form -->
                                        @else
                                          {{-- authorisation de supprimer commune--}}
                                            <button class="btn btn-danger btn-sm disabled"><i class="fa fa-trash"></i></button>
                                        @endif
                                    </td>
                                </tr>
                            
                            @endforeach
                            </tbody>

                        </table><!-- end of table -->
                      
                        {{ $communes->appends(request()->query())->links() }}
                           
                    @else
                        
                        <h2>@lang('site.no_data_found')</h2>
                        
                    @endif

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

    <script src="{{ URL::asset('dashboard_files/plugins/select2/js/select2.min.js') }}"></script>
    <script type="text/javascript">
 
            // select poste
        $("#wilaya").select2({
            placeholder: "Select wilaya",
            allowClear: true
        });  

     </script>




@endsection

@section('script')

<script src="{{ asset('dashboard_files/vendor/datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('dashboard_files/vendor/datatable/dataTables.bootstrap.min.js')}}"></script>

@endsection
