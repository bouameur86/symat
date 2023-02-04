@extends('layouts.dashboard.app')

@section('dashboard.app')

@section('head')
@endsection

@endsection
@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('site.parc_lignes')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li><a href="{{ route('dashboard.lignes.index') }}"><i class="fa fa-gear"></i> @lang('site.lignes')</a></li>
                <li class="active">@lang('site.lignes')</li>
            </ol>
        </section>
        <section class="content">
            <div class="box box-primary">
                <h3 class="box-title" style="margin-bottom: 15px">@lang('site.lignes') <small>{{ $lignes->total() }}</small></h3>
                <div class="box-header with-border">

    
                    <form action="{{ route('dashboard.lignes.index') }}" method="get">

                        <div class="row">

                            <div class="col-md-2">
                                @if (auth()->user()->hasPermission('create_lignes'))
                                    <a href="{{ route('dashboard.lignes.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</a>
                                @else
                                    <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i> @lang('site.add')</a>
                                @endif
                            </div>

                        </div>
                    </form><!-- end of form -->

                </div><!-- end of box header -->

                <div class="box-body">

                @if  ($lignes->count() > 0)               
              
                    <table  id="exemple-table" class="table table-hover">

                            <thead class="thead-dark">
                            <tr>
                                <th>N°</th>
                                <th>@lang('site.region')</th>
                            {{--<th>@lang('site.ste_ligne')</th> --}} 
                            {{--<th>@lang('site.name_ligne')</th> --}} 
                                <th>code</th>
                                <th>@lang('site.nivU_enkv')</th>
                                <th>Longeur</th>
                                <th>N° Pylone</th>
                                <th>Section</th>
                                <th>Constru</th>
                                <th>@lang('site.datemise')</th>
                                <th>@lang('site.action')</th> 
                            </tr>

                            </thead>
                            
                            <tbody>
                            @foreach ($lignes as $index=>$ligne)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $ligne->region != null ? $ligne->region->code : '' }}</td>
                                 {{--<td>{{ $ligne->ste != null ? $ligne->ste->code : '' }}</td> --}} 
                                {{--<td>{{ \Illuminate\Support\Str::limit($ligne->name,7)}}</td>--}} 
                                    <td>{{ $ligne->code }}</td>
                                    <td>{{ $ligne->nivU }}</td>
                                    <td>{{ $ligne->longeur }}</td>
                                    <td>{{ $ligne->nbrpylone }}</td>
                                    <td>{{ $ligne->section }}</td> 
                                    <td>{{ $ligne->constructeur != null ? $ligne->constructeur->name : '' }}</td>
                                    <td>{{ $ligne->datemise }}</td>
                                    <td>
                                         {{-- Show button --}}

                                    <a href="{{ route('dashboard.lignes.show', $ligne->id) }}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a> {{-- @lang('site.edit')--}}
                                        {{-- Update button --}}
                                        
                                        @if (auth()->user()->hasPermission('update_lignes'))
                                            <a href="{{ route('dashboard.lignes.edit', $ligne->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a> {{-- @lang('site.edit')--}}
                            
                                            @else
                                            <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i> @lang('site.edit')</a>
                                        @endif
                                        {{-- authorisation de modifier ligne--}}
                                        @if (auth()->user()->hasPermission('delete_lignes'))
                                            <form action="{{ route('dashboard.lignes.destroy', $ligne->id) }}" method="POST" style="display: inline-block">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                                <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i></button>  {{--@lang('site.delete')--}} 
                                            </form><!-- end of form -->
                                        @else
                                          {{-- authorisation de supprimer ligne--}}
                                            <button class="btn btn-danger btn-sm disabled"><i class="fa fa-trash"></i> @lang('site.delete')</button>
                                        @endif
                                    </td>
                                </tr>
                            
                            @endforeach
                            </tbody>
                      
                        </table><!-- end of table -->

                        {{ $lignes->appends(request()->query())->links() }}
                                                 
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
