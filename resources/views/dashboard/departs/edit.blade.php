@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>Travée</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li><a href="{{ route('dashboard.departs.index') }}"> @lang('site.departs')</a></li>
                <li class="active">@lang('site.edit')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">@lang('site.edit')</h3>
                </div><!-- end of box header -->
                <div class="box-body">

                    @include('partials._errors')

                    <form action="{{ route('dashboard.departs.update', $depart->id) }}" method="post">

                        {{ csrf_field() }}
                        {{ method_field('put') }}
                       
                        <div class="form-group">
                            <label>Poste</label> 
                                <select  class="form-control" name="poste_id">
                                    <option disabled selected>Choisir une poste</option>
                                    @foreach($postes as $poste)
                                        <option value="{{ $poste->id }}" {{ $depart->poste_id == $poste->id ? 'selected' : '' }}>{{ $poste->code }}</option>
                                    @endforeach
                                </select>
        
                        </div>
                                            
                        <div class="form-group"> 
                            <label>Libillée de la travée</label>
                            <input type="text" name="name" class="form-control" value="{{ $depart->name }}">
                        </div>

                       
                        <div class="form-group">
                            <label>Niveau de tension</label>
                                <select class="form-control" name="nivU" value="{{ $depart->nivU }}" >
                                    <option disabled selected>{{ $depart->nivU }}</option>
                                    <option>400/220kV</option>
                                    <option>220kV</option>
                                    <option>60kV</option>
                                    <option>220/60kV</option>
                                    <option>220/30kV</option>
                                    <option>220/60/30kV</option>
                                    <option>220/60/10kV</option>
                                    <option>60/30kV</option>
                                    <option>60/10kV</option>
                                </select>   
                            </div>
                                  <!-- saparent -->
                            <div class="form-group">
                                <label>@lang('site.saparent')</label>
                                <select id="saparent" class="form-control" name="saparent" value="{{ old('saparent') }}">
                                    <option disabled selected>{{ $depart->saparent }}</option> 
                                    <option>300</option>
                                    <option>270</option>
                                    <option>250</option>
                                    <option>175</option>
                                    <option>120</option>
                                    <option>90</option>
                                    <option>80</option>
                                    <option>40</option>
                                    <option>30</option>
                                    <option>20</option>
                                    <option>17</option>
                                    <option>15</option>
                                    <option>10</option>
                                    <option>5</option>
                                </select>   
                            </div>
                            <!-- edit commune -->

                        <div class="form-group"> 
                            <label>Etat de la travée</label>
                            <select name="etat" class="form-control">
                                <option>{{ $depart->etat }}</option>
                                <option>En Service</option>
                                <option>Hors Service</option>
                                <option>Reserve</option>
                            </select>
                        </div>
                    

                          <!-- edit commune -->

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> @lang('site.edit')</button>
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
                placeholder: "Select poste",
                allowClear: true
            });

    </script>

@endsection
