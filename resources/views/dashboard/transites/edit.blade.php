@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>Travée</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li><a href="{{ route('dashboard.transites.index') }}"> @lang('site.transites')</a></li>
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

                    <form action="{{ route('dashboard.transites.update', $transite->id) }}" method="post">

                        {{ csrf_field() }}
                        {{ method_field('put') }}
                       

                        <!-- Date et heure -->
                        <div class="form-group"> 
                            <label>Date et heure</label>
                            <input type="datetime-local" name="datetime" class="form-control" value="{{ $transite->datetime }}">
                        </div>

                        <!-- poste -->

                        <div class="form-group">
                            <label>Poste</label> 
                                <select id="poste" class="form-control" name="poste_id">
                                    <option disabled selected>Choisir une region</option>
                                    @foreach($postes as $poste)
                                        <option value="{{ $poste->id }}" {{ $transite->poste_id == $poste->id ? 'selected' : '' }}>{{ $poste->code }}</option>
                                    @endforeach
                                </select>
        
                        </div>
                                            
                         <!-- depart -->
                         <div class="col">
                            <label for="inputName" class="control-label">Travée</label>
                            <select id="depart" name="depart" class="form-control" value="{{ old('depart') }}">
                                <option>{{ $transite->depart}}</option>
                            </select>
                           
                            </div>
                        

                        <div class="form-group"> 
                            <label>Tension (U en Kv)</label>
                            <input type="text" name="tension" class="form-control" value="{{ $transite->tension }}">
                        </div>

                               <!-- pactif -->

                        <div class="form-group"> 
                            <label>Puissance actif (P en Mw)</label>
                            <input type="text" name="pactif" class="form-control" value="{{ $transite->pactif }}">
                        </div>

                              <!-- qreactif -->

                        <div class="form-group"> 
                            <label>Puissance reactif (Q en Mvar)</label>
                            <input type="text" name="qreactif" class="form-control" value="{{ $transite->qreactif }}">
                        </div>


                  

                          <!-- edit button -->

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> @lang('site.edit')</button>
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
    //<!-- start js select niv U depart-->
          </script>

@endsection
