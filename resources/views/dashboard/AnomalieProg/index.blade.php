@extends('layouts.dashboard.app')

@section('dashboard.app')

@section('head')
@endsection

@endsection
@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('site.anomalieexps')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li><a href="{{ route('dashboard.anomalieexps.index') }}"><i class="fa fa-gear"></i> @lang('site.anomalieexps')</a></li>
                <li class="active">@lang('site.anomalieexps')</li>
            </ol>
        </section>
        <section class="content">
            <div class="box box-primary">

                <div class="box-header with-border">

    
                    <form action="{{ route('dashboard.anomalieexps.index') }}" method="get">

                        <div class="row">

                            <div class="col-md-2">
                                @if (auth()->user()->hasPermission('create_anomalieexps'))
                                    <a href="{{ route('dashboard.anomalieexps.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</a>
                                @else
                                    <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i> @lang('site.add')</a>
                                @endif
                            </div>
                            <div class="col-md-2" >
                                <a  href="{{ url('dashboard/export_anomalieexp')}}" class="btn btn-primary"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Export-Excel</a> 
                            </div>
                            <div class="col-md-2" >    
                                <a  href="{{ url('dashboard/import_anomalieexp')}}" class="btn btn-primary"><i class="fa fa-file-excel-o" aria-hidden="true"></i> import-Excel</a> 
                            </div>

                        </div>
                    </form><!-- end of form -->

                </div><!-- end of box header -->

                <div class="box-body">
                    @if ($anomalieexps->count() > 0)

                    <table  id="exemple-table" class="table table-hover">

                            <thead>
                            <tr>
                                <th>N°</th>
                                <th>Region</th>
                                <th>Poste</th>
                                <th>STE</th>
                                <th>n° message</th>
                                <th>Date</th> 
                                <th>Equipement</th>
                                <th>Spécifier l'equipement</th>
                                <th>@lang('site.nivU')</th>                                
                                <th>@lang('site.typeanom')</th>
                                <th>Anomalie</th>
                                <th>Descreption</th>
                                <th>Anomalie levieé</th>
                                <th>@lang('site.action')</th> 
                            </tr>
                            </thead>
                            
                            <tbody>
                            @foreach ($anomalieexps as $index=>$anomalieexp)
                                <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $anomalieexp->poste != null ? $anomalieexp->poste->region->code : '' }}</td>
                                        <td>{{ $anomalieexp->poste != null ? $anomalieexp->poste->code : '' }}</td>
                                        <td>{{ $anomalieexp->poste != null ? $anomalieexp->poste->ste->code: '' }}</td>
                                        <td>{{ $anomalieexp->numes }}</td>
                                        <td>{{ $anomalieexp->dateanom }}</td>
                                        <td>{{ $anomalieexp->equipement }}</td>
                                        <td>{{ $anomalieexp->spequip }}</td>
                                        <td>{{ $anomalieexp->nivU }}</td>
                                        <td>{{ $anomalieexp->typeanom }}</td>
                                        <td>{{ $anomalieexp->anomalie }}</td>
                                        <td>{{ \Illuminate\Support\Str::limit($anomalieexp->descranom,15)}}</td>
                                        <td>{{ $anomalieexp->leon }}</td>
                                        <td>
                                        @if (auth()->user()->hasPermission('update_anomalieexps'))
                                            <a href="{{ route('dashboard.anomalieexps.edit', $anomalieexp->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a> {{-- @lang('site.edit')--}}
                            
                                            @else
                                            <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i> @lang('site.edit')</a>
                                        @endif
                                        {{-- authorisation de modifier poste--}}
                                        @if (auth()->user()->hasPermission('delete_anomalieexps'))
                                            <form action="{{ route('dashboard.anomalieexps.destroy', $anomalieexp->id) }}" method="POST" style="display: inline-block">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                                <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i></button>  {{--@lang('site.delete')--}} 
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

@section('script')
 
<script src="{{ asset('dashboard_files/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('dashboard_files/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

<!-- page script -->

@endsection
