@extends('layouts.dashboard.app')

@section('dashboard.app')
<link href="{{  asset('dashboard_files/vendor/datatables/dataTables.bootstarp.min.css') }}" rel="stylesheet">

@endsection

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>Liste des incidents lignes</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li><a href="{{ route('dashboard.inclignes.index') }}"><i class="fa fa-gear"></i> @lang('site.ends')</a></li>
                <li class="active">@lang('site.incident')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <form action="{{ route('dashboard.inclignes.index') }}" method="get">

                            <div class="col-md-2">
                                @if (auth()->user()->hasPermission('create_inclignes'))
                                    <a href="{{ route('dashboard.inclignes.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</a>
                                
                                @else
                                    <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i> @lang('site.add')</a>
                                @endif
                            </div>
                            <div class="col-md-2" >
                                <a  href="{{ url('dashboard/export_incligne')}}" class="btn btn-primary"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Export-Excel</a> 
                            </div>
                            <div class="col-md-2" >    
                                <a  href="{{ url('dashboard/import_incligne')}}" class="btn btn-primary"><i class="fa fa-file-excel-o" aria-hidden="true"></i> import-Excel</a> 
                            </div>

                        
                    </form><!-- end of form -->

                </div><!-- end of box header -->

                <div class="box-body">

                    @if ($inclignes->count() > 0)

                        <table id="exemple-table" class="table table-stribed table-hover" width="100%" cellspacing="0">

                            <thead class="thead-dark">
                            <tr>
                                <th>N°</th>
                              {{-- <th>@lang('site.region')</th>--}} 
                                <th>@lang('site.region')</th>
                            {{--<th>@lang('site.ste')</th>--}}
                                <th>@lang('site.ligne')</th>
                                <th>@lang('site.nivU')</th>
                                <th>@lang('site.dateheured')</th> 
                                <th>@lang('site.dateheuref')</th> 
                                <th>@lang('site.dure')</th>
                                <th>@lang('site.cause')</th> 
                                <th>@lang('site.typeinca')</th> 
                                <th>@lang('site.typeincb')</th>                                                             
                           {{-- <th>@lang('site.incident')</th>    --}} 
                                <th>@lang('site.imputation')</th>
                       
                                <th>@lang('site.action')</th> 
                            </tr>
                            </thead>
                            
                            <tbody>
                            @foreach ($inclignes as $index=>$incligne)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $incligne->ligne != null ? $incligne->ligne->region->code : '' }}</td>
                                    <td>{{ $incligne->ligne != null ? $incligne->ligne->name : '' }}</td>
                                    <td>{{ $incligne->ligne != null ? $incligne->ligne->nivU : '' }}</td>
                            {{--    <td>{{ $end->poste != null ? $end->poste->clientxd : '' }}</td> --}}
                            {{--    <td>{{ $end->incident }}</td>   --}} 
                                    <td>{{ $incligne->dateheured }}</td>
                                    <td>{{ $incligne->dateheuref }}</td>
                                    <td>{{ $incligne->dure }}</td>
                                    <td>{{ $incligne->cause }}</td>
                                    <td>{{ $incligne->typeinca }}</td>
                                    <td>{{ $incligne->typeincb }}</td>
                                    <td>{{ $incligne->imputation }}</td>
                                    <td>
                                           {{-- Show button --}}

                                    <a href="{{ route('dashboard.inclignes.show', $incligne->id) }}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a> {{-- @lang('site.edit')--}}
                                    
                                        @if (auth()->user()->hasPermission('update_inclignes'))
                                            <a href="{{ route('dashboard.inclignes.edit', $incligne->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> </a>{{--@lang('site.edit')--}}
                                        @else
                                            <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i> @lang('site.edit')</a>
                                        @endif
                                        {{-- authorisation de modifier poste--}}
                                        @if (auth()->user()->hasPermission('delete_inclignes'))
                                            <form action="{{ route('dashboard.inclignes.destroy', $incligne->id) }}" method="POST" style="display: inline-block">
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
                        {{ $inclignes->appends(request()->query())->links() }}       
                        @else
                        
                        <h2>@lang('site.no_data_found')</h2>
                        
                    @endif

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->
@endsection
