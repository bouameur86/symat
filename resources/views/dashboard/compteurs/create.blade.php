@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>@lang('site.compteurs')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li><a href="{{ route('dashboard.postes.index') }}"> @lang('site.postes')</a></li>
                <li><a href="{{ route('dashboard.compteurs.index') }}"> @lang('site.compteurs')</a></li>
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

                    <form action="{{ route('dashboard.compteurs.store') }}" method="POST" enctype="multipart/form-data">
                       
                        
                        {{ csrf_field() }}
                        {{ method_field('post') }}
                          
                       <!-- poste -->
                       <div class="form-group">
                            
                        <label for="inputName" class="control-label">Poste</label>
                        <select id="poste" name="poste" class="form-control" onclick="console.log($(this).val())"
                            onchange="console.log('change is firing')">
                            <!--placeholder-->
                            <option></option>
                            @foreach ($postes as $poste)
                                <option value="{{ $poste->id }}">{{ $poste->name }}</option>
                            @endforeach
                        </select>
                </div>
                  <!-- depart -->
                             
                            <!-- depart -->
                            <div class="col">
                                <label for="inputName" class="control-label">Travée</label>
                                <select id="depart" name="depart" class="form-control">
                                </select>
                               
                                </div>


                        <div class="form-group"> 
                            <label>Numéro du compteur</label>
                            <input type="text" name="comp_num" class="form-control" value="{{ old('comp_num') }}">
                        </div>

                        <div class="form-group"> 
                            <label>@lang('site.constr_comp')</label>
                            <select type="text" name="comp_constr" class="form-control" value="{{old('comp_constr')}}">
                                <option>ACTARIS</option>
                                <option>AMC</option>
                                <option>SAGEM</option> 
                                <option>GE-Dum</option>
                            </select>    
                        </div>

                        <div class="form-group"> 
                            <label>Etat du compteur</label>
                                <select type="text" name="etat" class="form-control" value="{{old('etat')}}">
                                    <option disabled>Choisir l'etat</option>
                                    <option>MARCHE</option>
                                    <option>ARRET</option>
                                </select>
                        </div>

                        {{-- date de mise en serve --}}
                        <div class="form-group"> 
                            <label>Date MES</label>
                            <input type="date" name="datemise" class="form-control" value="{{ old('datemise') }}">
                        </div>
                        
                          {{-- Create button --}}
                        <div class="form-group" class="col-md-4">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>@lang('site.add')</button>
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

            $(document).ready(function() {
            $('select[name="poste"]').on('change', function() {
                var PosteId = $(this).val();
                if (PosteId) {
                    $.ajax({
                        url: "{{ URL::to('dashboard/poste') }}/" + PosteId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="depart"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="depart"]').append('<option value="' +
                                    value + '">' + value + '</option>');   
                            });
                        },
                    });
        
                } else {
                    console.log('AJAX load did not work');
                }
            });
  
  });     //<!-- end js select depart poste-->



    </script>


@endsection

