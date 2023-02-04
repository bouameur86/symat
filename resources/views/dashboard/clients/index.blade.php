@extends('layouts.dashboard.app')

@section('dashboard.app')

@section('head')
@endsection

@endsection

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('site.clients')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li><a href="{{ route('dashboard.clients.index') }}"><i class="fa fa-gear"></i> @lang('site.clients')</a></li>
                <li class="active">@lang("site.transite_d'energie")</li>
            </ol>
        </section>
        <section class="content">
            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px">Nombre de client est&nbsp;<strong>{{ $clients->total() }}&nbsp;</strong>Clients</h3>
                    <form action="{{ route('dashboard.clients.index') }}" method="get">

                        <div class="row">
                            <div for='poste' class="col-md-2">
                                <select id="poste" name="poste_id" class="form-control" value="{{ old('depart') }}" >
                                    <option></option>
                                    @foreach ($postes as $poste)
                                        <option value="{{ $poste->id }}" {{ request()->poste_id == $poste->id ? 'selected' : '' }}>{{ $poste->code }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="col-md-2">
                                <input type="text" name="search" class="form-control" placeholder="@lang('site.search')" value="{{ request()->search }}">
                            </div>



                            <!-- create botton -->
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> @lang('site.search')</button>
                                @if (auth()->user()->hasPermission('create_clients'))
                                    <a href="{{ route('dashboard.clients.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</a>
                                @else
                                    <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i> @lang('site.add')</a>
                                @endif
                            </div>

               <!-- Export botton -->

                            <div class="col-md-2" >
                                <a  href="{{ url('dashboard/export_client')}}" class="btn btn-primary"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Export-Excel</a> 
                            </div>

                            <!-- import botton -->
                            @if (auth()->user()->hasPermission('import_clients'))
                            <a href="{{ route('dashboard.clients.import') }}" class="btn btn-sm btn-success">Import</a>
                            @else
                            <a href="#" class="btn btn-primary hidden"><i class="fa fa-plus"></i></a>
                        @endif
                    </div>
                    
                    </form><!-- end of form -->

                </div><!-- end of box header -->

                <div class="box-body">

                    @if ($clients->count() > 0)

                    <table  id="exemple-table" class="table table-hover">

                            <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('site.region')</th>
                                <th>@lang('site.client_name')</th>
                                <th>@lang('site.poste')</th>      
                                <th>@lang('site.depart')</th>   
                                <th>@lang('site.u_client')</th>
                                <th>@lang('site.action')</th>
                            </tr>
                            </thead>
                            
                            <tbody>
                            @foreach ($clients as $index=>$client)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $client->poste != null ? $client->poste->region->code : '' }}</td>
                                    <td>{{ $client->cliname }}</td>
                                    <td>{{ $client->poste != null ? $client->poste->name : '' }}</td>
                                    <td>{{ $client->depart }}</td>
                                    <td>{{ $client->uclient }}</td>
                                    <td>
                                        @if (auth()->user()->hasPermission('update_clients'))
                                            <a href="{{ route('dashboard.clients.edit', $client->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                        @else
                                            <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i></a>
                                        @endif
                                        {{-- authorisation de modifier client--}}
                                        @if (auth()->user()->hasPermission('delete_clients'))
                                            <form action="{{ route('dashboard.clients.destroy', $client->id) }}" method="post" style="display: inline-block">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                                <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i></button>
                                            </form><!-- end of form -->
                                        @else
                                          {{-- authorisation de supprimer client--}}
                                            <button class="btn btn-danger btn-sm disabled"><i class="fa fa-trash"></i></button>
                                        @endif
                                    </td>
                                </tr>
                            
                            @endforeach
                            </tbody>

                        </table><!-- end of table -->
                        
                        {{ $clients->appends(request()->query())->links() }}  
                        
                    @else
                        
                        <h2>@lang('site.no_data_found')</h2>
                        
                    @endif

                </div><!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

    <!-- Internal Select2 js-->
    <script src="{{ asset('dashboard_files/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('dashboard_files/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('dashboard_files/plugins/select2/js/select2.min.js') }}"></script>
    <script type="text/javascript">

    $("#poste").select2({
    placeholder: "Choisir Poste",
    allowClear: true
    });

 
    </script>

@endsection