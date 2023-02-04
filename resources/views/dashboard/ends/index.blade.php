@extends('layouts.dashboard.app')

@section('dashboard.app')
<link href="{{  asset('dashboard_files/vendor/datatables/dataTables.bootstarp.min.css') }}" rel="stylesheet">

@endsection

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>Liste des incidents</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li><a href="{{ route('dashboard.ends.index') }}"><i class="fa fa-gear"></i> @lang('site.ends')</a></li>
                <li class="active">@lang('site.incident')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <form action="{{ route('dashboard.ends.index') }}" method="get">

                            <div class="col-md-2">
                                @if (auth()->user()->hasPermission('create_ends'))
                                    <a href="{{ route('dashboard.ends.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</a>
                                
                                @else
                                    <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i> @lang('site.add')</a>
                                @endif
                            </div>
                            <div class="col-md-2" >
                                <a  href="{{ url('dashboard/export_end')}}" class="btn btn-primary"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Export-Excel</a> 
                            </div>
                            <div class="col-md-2" >    
                                <a  href="{{ url('dashboard/import_end')}}" class="btn btn-primary"><i class="fa fa-file-excel-o" aria-hidden="true"></i> import-Excel</a> 
                            </div>

                        
                    </form><!-- end of form -->

                </div><!-- end of box header -->

                <div class="box-body">

                    @if ($ends->count() > 0)

                        <table id="exemple-table" class="table table-stribed table-hover" width="100%" cellspacing="0">

                            <thead class="thead-dark">
                            <tr>
                                <th>N°</th>
                              {{-- <th>@lang('site.region')</th>--}} 
                                <th>@lang('site.poste')</th>
                              {{--  <th>@lang('site.clientxd')</th>--}} 
                                <th>@lang('site.numtr')</th>
                                <th>@lang('site.nivU')</th>
                                <th>@lang('site.cause')</th>
                                <th>@lang('site.evenem')</th>
                           {{-- <th>@lang('site.incident')</th>    --}} 
                                <th>@lang('site.protection')</th>
                                <th>@lang('site.dateheured0')</th> 
                                <th>@lang('site.dateheuref0')</th> 
                                <th>@lang('site.indispo')</th> 
                                <th>@lang('site.pcoupe')</th>
                                <th>@lang('site.energie')</th>
                                <th>@lang('site.imputation')</th>
                        {{--    <th>@lang('site.ouvcause')</th>   --}} 
                        {{--    <th>@lang('site.saifi')</th>--}} 
                        {{--    <th>@lang('site.saidi')</th> --}} 
                        {{--    <th>@lang('site.mgmp')</th> --}}
                                <th>@lang('site.action')</th> 
                            </tr>
                            </thead>
                            
                            <tbody>
                            @foreach ($ends as $index=>$end)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                            {{--    <td>{{ $end->poste != null ? $end->poste->region->code : '' }}</td> --}} 
                                    <td>{{ $end->poste != null ? $end->poste->code : '' }}</td>
                            {{--    <td>{{ $end->poste != null ? $end->poste->clientxd : '' }}</td> --}} 
                                    <td>{{ $end->numtr }}</td>
                                    <td>{{ $end->nivU }}</td>
                                    <td>{{ $end->cause}}</td>
                                    <td>{{ $end->evenement }}</td>
                            {{--    <td>{{ $end->incident }}</td>   --}} 
                                    <td>{{ $end->protection }}</td>
                                    <td>{{ $end->dateheured }}</td>
                                    <td>{{ $end->dateheuref }}</td>
                                    <td>{{ $end->dure }}</td>
                                    <td>{{ $end->pcoupe }}</td>
                                    <td>{{ $end->energie}}</td>
                                    <td>{{ $end->imputation }}</td>
                             {{--   <td>{{ $end->ouvcause}}</td>  --}}
                             {{--   <td>{{ $end->saifi}}</td>  --}}
                             {{--   <td>{{ $end->saidi}}</td> --}}
                             {{--   <td>{{ $end->dhretour}</td> --}}
                             {{--   <td>{{ $end->indispo}}</td> --}}
                             {{--   <td>{{ $end->mgmp}}</td>--}}
                                    <td>
                                           {{-- Show button --}}

                                    <a href="{{ route('dashboard.ends.show', $end->id) }}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a> {{-- @lang('site.edit')--}}
                                    
                                        @if (auth()->user()->hasPermission('update_ends'))
                                            <a href="{{ route('dashboard.ends.edit', $end->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> </a>{{--@lang('site.edit')--}}
                                        @else
                                            <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i> @lang('site.edit')</a>
                                        @endif
                                        {{-- authorisation de modifier poste--}}
                                        @if (auth()->user()->hasPermission('delete_ends'))
                                            <form action="{{ route('dashboard.ends.destroy', $end->id) }}" method="POST" style="display: inline-block">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                                <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i></button> {{--@lang('site.delete')--}}
                                            </form><!-- end of form -->
                                        @else
                                          {{-- authorisation de supprimer poste--}}
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
