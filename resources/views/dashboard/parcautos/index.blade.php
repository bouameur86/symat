@extends('layouts.dashboard.app')

@section('dashboard.app')

@section('head')
@endsection

@endsection
@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('site.parcautos')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li><a href="{{ route('dashboard.parcautos.index') }}"><i class="fa fa-gear"></i> @lang('site.parcautos')</a></li>
                <li class="active">@lang('site.parcautos')</li>
            </ol>
        </section>
        <section class="content">
            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px">@lang('site.parcautos') <small>{{ $parcautos->total() }}</small></h3>
                    <form action="{{ route('dashboard.parcautos.index') }}" method="get">

                        <div class="row">
                            <div class="col-md-2">
                                <select  id="poste"  name="poste_id" class="form-control">
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
                                @if (auth()->user()->hasPermission('create_parcautos'))
                                    <a href="{{ route('dashboard.parcautos.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</a>
                                @else
                                    <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i> @lang('site.add')</a>
                                @endif
                            </div>

               <!-- Export botton -->

                            <div class="col-md-2" >
                                <a  href="{{ url('dashboard/export_parcauto')}}" class="btn btn-primary"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Export-Excel</a> 
                            </div>

                            <!-- import botton -->
                            @if (auth()->user()->hasPermission('import_parcautos'))
                            <a href="{{ route('dashboard.parcautos.import') }}" class="btn btn-sm btn-success">Import</a>
                            @else
                            <a href="#" class="btn btn-primary hidden"><i class="fa fa-plus"></i></a>
                        @endif
                    </div>
                    
                    </form><!-- end of form -->

                </div><!-- end of box header -->

                <div class="box-body">

                    @if ($parcautos->count() > 0)

                       <table  id="exemple-table" class="table table-hover">

                            <thead>
                            <tr>
                                <th>N°</th>
                                <th>@lang('site.poste')</th>
                                <th>@lang('site.fabriq')</th>
                                <th>@lang('site.finis')</th>
                                <th>@lang('site.immatri')</th> 
                                <th>@lang('site.carbu')</th>
                                <th>@lang('site.propri')</th> 
                                <th>@lang('site.datemise')</th> 
                                <th>@lang('site.etat')</th>  
                                <th>@lang('site.action')</th> 
                            </tr>
                            </thead>
                            
                            <tbody>
                            @foreach ($parcautos as $index=>$parcauto)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $parcauto->poste != null ? $parcauto->poste->name : '' }}</td>
                                    <td>{{ $parcauto->fabriq }}</td>
                                    <td>{{ $parcauto->finis }}</td> 
                                    <td>{{ $parcauto->immatri }}</td> 
                                    <td>{{ $parcauto->carbu }}</td>
                                    <td>{{ $parcauto->propri }}</td>
                                    <td>{{ $parcauto->datemise }}</td>
                                    <td>{{ $parcauto->etat }}</td>
                                    <td>
                                        @if (auth()->user()->hasPermission('update_parcautos'))
                                            <a href="{{ route('dashboard.parcautos.edit', $parcauto->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a> {{-- @lang('site.edit')--}}
                            
                                            @else
                                            <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i> @lang('site.edit')</a>
                                        @endif
                                        {{-- authorisation de modifier parcauto--}}
                                        @if (auth()->user()->hasPermission('delete_parcautos'))
                                            <form action="{{ route('dashboard.parcautos.destroy', $parcauto->id) }}" method="POST" style="display: inline-block">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                                <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i></button>  {{--@lang('site.delete')--}} 
                                            </form><!-- end of form -->
                                        @else
                                          {{-- authorisation de supprimer parcauto--}}
                                            <button class="btn btn-danger btn-sm disabled"><i class="fa fa-trash"></i> @lang('site.delete')</button>
                                        @endif
                                    </td>
                                </tr>
                            
                            @endforeach
                            </tbody>
                      
                        </table><!-- end of table -->

                        {{ $parcautos->appends(request()->query())->links() }}                   
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
        $("#poste").select2({
            placeholder: "Select poste",
            allowClear: true
        });  

     </script>



@endsection

@section('script')
 
<script src="{{ asset('dashboard_files/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('dashboard_files/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

<!-- page script -->

@endsection
