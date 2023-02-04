@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('site.constructeurs')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li class="active">@lang('site.constructeurs')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <form action="{{ route('dashboard.constructeurs.index') }}" method="get">

                        <div class="row">

                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="@lang('site.search')" value="{{ request()->search }}">
                            </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> @lang('site.search')</button>
                                @if (auth()->user()->hasPermission('create_constructeurs'))
                                    <a href="{{ route('dashboard.constructeurs.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</a>
                                @else
                                    <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i> @lang('site.add')</a>
                                @endif
                            </div>

                        </div>
                    </form><!-- end of form -->

                </div><!-- end of box header -->

                <div class="box-body">

                    @if ($constructeurs->count() > 0)

                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('site.libille')</th>
                                <th>@lang('site.phone')</th>      
                                <th>@lang('site.address')</th>   
                                <th>@lang('site.action')</th>
                            </tr>
                            </thead>
                            
                            <tbody>
                            @foreach ($constructeurs as $index=>$constructeur)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $constructeur->name }}</td>
                                    <td>{{ $constructeur->phone }}</td>
                                    <td>{{ $constructeur->address}}</td>
                                    <td>
               
                                    </td>
                                    <td>
                                        @if (auth()->user()->hasPermission('update_constructeurs'))
                                            <a href="{{ route('dashboard.constructeurs.edit', $constructeur->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> @lang('site.edit')</a>
                                        @else
                                            <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i> @lang('site.edit')</a>
                                        @endif
                                        {{-- authorisation de modifier constructeur--}}
                                        @if (auth()->user()->hasPermission('delete_constructeurs'))
                                            <form action="{{ route('dashboard.constructeurs.destroy', $constructeur->id) }}" method="post" style="display: inline-block">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                                <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i> @lang('site.delete')</button>
                                            </form><!-- end of form -->
                                        @else
                                          {{-- authorisation de supprimer constructeur--}}
                                            <button class="btn btn-danger btn-sm disabled"><i class="fa fa-trash"></i> @lang('site.delete')</button>
                                        @endif
                                    </td>
                                </tr>
                            
                            @endforeach
                            </tbody>

                        </table><!-- end of table -->
                        
                        {{ $constructeurs->appends(request()->query())->links() }}      
                        
                    @else
                        
                        <h2>@lang('site.no_data_found')</h2>
                    @endif
                    
                </div><!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection

@section('script')

<script src="{{ asset('dashboard_files/vendor/datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('dashboard_files/vendor/datatable/dataTables.bootstrap.min.js')}}"></script>
<script>
    $(document).ready(function(){
        $('#books-table').DataTable({
            "language":{
                "url":"//cdn.datatables.net/plug-ins/1.10.19/i18n/French.json"
            }
        });

    });

</script>
@endsection