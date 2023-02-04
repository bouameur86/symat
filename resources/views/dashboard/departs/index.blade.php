@extends('layouts.dashboard.app')

@section('dashboard.app')

@section('head')
@endsection

@endsection
@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('site.departs')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li><a href="{{ route('dashboard.departs.index') }}"><i class="fa fa-gear"></i> @lang('site.departs')</a></li>
                <li class="active">@lang('site.departs')</li>
            </ol>
        </section>
        <section class="content">
            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px">@lang('site.departs') <small>{{ $departs->total() }}</small></h3>
                    <form action="{{ route('dashboard.departs.index') }}" method="get">

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
                                @if (auth()->user()->hasPermission('create_departs'))
                                    <a href="{{ route('dashboard.departs.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</a>
                                @else
                                    <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i> @lang('site.add')</a>
                                @endif
                            </div>

               <!-- Export botton -->

                            <div class="col-md-2" >
                                <a  href="{{ url('dashboard/export_depart')}}" class="btn btn-primary"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Export-Excel</a> 
                            </div>

                            <!-- import botton -->
                            @if (auth()->user()->hasPermission('import_departs'))
                            <a href="{{ route('dashboard.departs.import') }}" class="btn btn-sm btn-success">Import</a>
                            @else
                            <a href="#" class="btn btn-primary hidden"><i class="fa fa-plus"></i></a>
                        @endif
                    </div>
                    
                    </form><!-- end of form -->

                </div><!-- end of box header -->

                <div class="box-body">

                    @if ($departs->count() > 0)

                       <table  id="exemple-table" class="table table-hover">

                            <thead>
                            <tr>
                                <th>N°</th>
                                <th>@lang('site.poste')</th>
                                <th>@lang('site.name_depart')</th>
                                <th>@lang('site.nivU')</th>
                                <th>@lang('site.saparent')</th> 
                                <th>@lang('site.etat')</th>
                                <th>@lang('site.action')</th> 
                            </tr>
                            </thead>
                            
                            <tbody>
                            @foreach ($departs as $index=>$depart)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $depart->poste != null ? $depart->poste->name : '' }}</td>
                                    <td>{{ $depart->name }}</td>
                                    <td>{{ $depart->nivU }}</td>
                                    <td>{{ $depart->saparent }}</td>
                                    <td>{{ $depart->etat }}</td>
                                    <td>
                                        @if (auth()->user()->hasPermission('update_departs'))
                                            <a href="{{ route('dashboard.departs.edit', $depart->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a> {{-- @lang('site.edit')--}}
                            
                                            @else
                                            <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i> @lang('site.edit')</a>
                                        @endif
                                        {{-- authorisation de modifier depart--}}
                                        @if (auth()->user()->hasPermission('delete_departs'))
                                            <form action="{{ route('dashboard.departs.destroy', $depart->id) }}" method="POST" style="display: inline-block">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                                <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i></button>  {{--@lang('site.delete')--}} 
                                            </form><!-- end of form -->
                                        @else
                                          {{-- authorisation de supprimer depart--}}
                                            <button class="btn btn-danger btn-sm disabled"><i class="fa fa-trash"></i> @lang('site.delete')</button>
                                        @endif
                                    </td>
                                </tr>
                            
                            @endforeach
                            </tbody>
                      
                        </table><!-- end of table -->

                        {{ $departs->appends(request()->query())->links() }}                   
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
