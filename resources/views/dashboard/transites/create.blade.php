@extends('layouts.dashboard.app')
@section('head')
<script  type="text/javascript" src="js/jquery-3.6.0min.js"></script>
@endsection
@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>Ajouter un transite</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li><a href="{{ route('dashboard.postes.index') }}"> @lang('site.postes')</a></li>
                <li><a href="{{ route('dashboard.transites.index') }}"> @lang('site.transites')</a></li>
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

                    <form action="{{ route('dashboard.transites.store') }}" method="POST" enctype="multipart/form-data">
                       
                        
                        {{ csrf_field() }}
                        {{ method_field('post') }}
                        
                        <!-- Date et heure -->
                        <div class="form-group"> 
                            <label>Date et heure</label>
                            <input type="datetime-local" name="datetime" class="form-control" value="{{ old('datetime') }}">
                        </div>
                       
                        <!-- poste -->
                        <div class="form-group">
                                <label for="inputName" class="control-label">Poste</label>
                                <select id="poste" name="poste" class="form-control" onclick="console.log($(this).val())"
                                    onchange="console.log('change is firing')">
                                    <!--placeholder-->
                                    <option></option>
                                    @foreach ($postes as $poste)
                                        <option value="{{ $poste->id }}"> {{ $poste->name }}</option>
                                    @endforeach
                                </select>
                        </div>
                          <!-- depart -->
                          <div class="form-group">
                            <label for="inputName" class="control-label">Travée</label>
                            <select id="depart" name="depart" class="form-control" onclick="console.log($(this).val())"
                                onchange="console.log('change is firing')">
                                <!--placeholder-->
                                <option></option>
                                @foreach ($departs as $depart)
                                    <option value="{{ $depart->id }}"> {{ $depart->saparent }}</option>
                                @endforeach
                            </select>
                    </div>
                        <!-- saparent -->
                        <div class="col">
                            <label for="inputName1" class="control-label">saparent</label>
                            <select id="nivU" name="nivU" class="form-control">
                            </select>     
                        </div>
                        <!-- Niv U -->
                        <div class="form-group"> 
                            <label>Tension (U en Kv)</label>
                            <input type="text" name="tension" class="form-control" value="{{ old('tension') }}">
                        </div>

                               <!-- pactif -->

                        <div class="form-group"> 
                            <label>Puissance actif (P en Mw)</label>
                            <input type="text" name="pactif" class="form-control" value="{{ old('pactif') }}">
                        </div>

                              <!-- qreactif -->

                        <div class="form-group"> 
                            <label>Puissance reactif (Q en Mvar)</label>
                            <input type="text" name="qreactif" class="form-control" value="{{ old('qreactif') }}">
                        </div>
                                     

                        <div class="form-group" class="col-md-4">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->
      
    </div><!-- end of content wrapper -->
    
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('dashboard_files/plugins/select2/js/select2.min.js') }}"></script>
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
    //<!-- start js select saparent depart-->
    $(document).ready(function() {
            $('select[name="depart"]').on('change', function() {
                var DepartId = $(this).val();
                if (DepartId) {
                    $.ajax({
                        url: "{{ URL::to('dashboard/depart') }}/" + DepartId,
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
  
  });  
    


          </script>
   

 @endsection

{{--
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
                                                            --}}