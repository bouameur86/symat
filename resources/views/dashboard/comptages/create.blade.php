@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>@lang('site.comptages')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li><a href="{{ route('dashboard.postes.index') }}"> @lang('site.postes')</a></li>
                <li><a href="{{ route('dashboard.comptages.index') }}"> @lang('site.comptages')</a></li>
                <li class="active">@lang('site.add')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">@lang('site.add')</h3>
                </div><!-- end of box header -->
                <div class="box-body">

                    @include('partials._errors')

                    <form action="{{ route('dashboard.comptages.store') }}" method="POST" enctype="multipart/form-data">
                       
                        
                        {{ csrf_field() }}
                        {{ method_field('post') }}
                        
                        
                        <div class="form-group">
                            <label for="region">poste</label>
                          
                                <select  id= "poste" class="form-control" name="poste" value="{{ old('poste') }}">
                                    <option disabled selected>Choisir une poste</option>
                                    @foreach($postes as $poste)
                                        <option value="{{ $poste->id }}">{{ $poste->name }}</option>
                                    @endforeach
                                </select>
                         
                        </div>
                                            
                        <div class="form-group"> 
                            <label>@lang('site.name_comptage')</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                        </div>

 

                        <div class="form-group">
                            <label>@lang('site.code_nivU')</label>
                            <select id="nivU" class="form-control" name="nivU" value="{{ old('nivU') }}">
                                <option disabled>choisir la tension</option> 
                                <option>400/220</option>
                                <option>220</option>
                                <option>220/60</option>
                                <option>220/30</option>
                                <option>220/60/30</option>
                                <option>220/60/10</option>
                                <option>60/30</option>
                                <option>60/10</option>
                            </select>   
                        </div>

                        <div class="form-group"> 
                            <label>@lang('site.etat_comptage')</label>
                            <input type="text" name="etat" class="form-control" value="{{ old('etat') }}">
                        </div>

                        <div class="form-group" class="col-md-4">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    
    <script type="text/javascript">
    
          $("#poste").select2({
                placeholder: "Select Poste",
                allowClear: true
            });

    </script>


@endsection

