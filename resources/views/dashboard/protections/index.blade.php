@extends('layouts.dashboard.app')

@section('head')

@endsection

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('site.protections')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li class="active">@lang('site.protections')</li>
            </ol>
        </section>

        <section class="content">
            <div class="box box-primary">
      

                <form action="{{ route('dashboard.protections.index') }}" method="get">

                    <div class="row">
                        <div class="col-md-2">
                            <select id="poste" name="poste_id" class="form-control">
                                <option></option>
                                @foreach ($postes as $poste)
                                    <option value="{{ $poste->id }}" {{ request()->poste_id == $poste->id ? 'selected' : '' }}>{{ $poste->code }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="col-md-2">
                            <input type="text" name="search" class="form-control" placeholder="@lang('site.search')" value="{{ request()->search }}">
                        
                        </div>


                          <!-- Create botton -->
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> @lang('site.search')</button>
                        </div> 
                            @if (auth()->user()->hasPermission('create_protections'))
                                <a href="{{ route('dashboard.protections.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</a>
                            @else
                                <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i> @lang('site.add')</a>
                            @endif
                       
                         <!-- Export botton -->

                        <div class="col-md-2" >
                            <a  href="{{ url('dashboard/export_protections')}}" class="btn btn-primary"><i class="fa fa-file-excel-o" aria-hidden="true"></i>Export</a> 
                        </div>

                <!-- import botton -->
                @if (auth()->user()->hasPermission('import_protections'))
                <a href="{{ route('dashboard.protections.import') }}" class="btn btn-sm btn-success">Import</a>
                @else
                <a href="#" class="btn btn-primary hidden"><i class="fa fa-plus"></i></a>
            @endif
        </div>
      
        </form><!-- protection of form -->

        </div><!-- protection of box header -->

                <div class="box-body">

                    @if ($protections->count() > 0)

                        <table id="exemple-table" class="table table-hover">

                            <thead>
                                <tr>
                                        <th>#</th>
                                        <th>@lang('site.poste')</th>
                                        <th>@lang('site.code')</th>      
                                        <th>@lang('site.name')</th>
                                        <th>@lang('site.briv')</th>
                                        <th>@lang('site.fonct')</th>                                          
                                        <th>@lang('site.constructeur')</th> 
                                        <th>@lang('site.numprot')</th>    
                                        <th>@lang('site.datemise')</th>
                                        <th>@lang('site.action')</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                            @foreach ($protections as $index=>$protection)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $protection->poste != null ? $protection->poste->code : '' }}</td>
                                    <td>{{ $protection->code }}</td>   
                                    <td>{{ $protection->name }}</td>
                                    <td>{{ $protection->fonct}}</td>
                                    <td>{{ $protection->num_prot}}</td>
                                    <td>{{ $protection->constructeur != null ? $protection->constructeur->name : '' }}</td>         
                                    <td>{{ $protection->numprot}}</td>
                                    <td>{{ $protection->datemise}}</td>
                                     <td>{{ $protection->etat}}</td> 
                                    <td>
                                        @if (auth()->user()->hasPermission('update_protections'))
                                            <a href="{{ route('dashboard.protections.edit', $protection->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>{{-- @lang('site.edit')--}}</a>
                                        @else
                                            <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i>{{--@lang('site.edit')--}} </a>
                                        @endif
                                        {{-- authorisation de modifier protection--}}
                                        @if (auth()->user()->hasPermission('delete_protections'))
                                            <form action="{{ route('dashboard.protections.destroy', $protection->id) }}" method="post" style="display: inline-block">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                                <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i> </button>{{--@lang('site.delete')--}} 
                                            </form><!-- protection of form -->
                                        @else
                                          {{-- authorisation de supprimer protection--}}
                                            <button class="btn btn-danger btn-sm disabled"><i class="fa fa-trash"></i></button>{{--@lang('site.delete')--}}
                                        @endif
                                    </td>
                                </tr>
                            
                            @endforeach
                            </tbody>

                        </table><!-- protection of table -->
                        
                        
                    @else
                        
                        <h2>@lang('site.no_data_found')</h2>
                        
                    @endif

                </div><!-- protection of box body -->

            </div><!-- protection of box -->

        </section><!-- protection of content -->

    </div><!-- protection of content wrapper -->


  <!-- Internal Select2 js-->
  <script src="{{ URL::asset('dashboard_files/plugins/select2/js/select2.min.js') }}"></script>
  <script type="text/javascript">

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