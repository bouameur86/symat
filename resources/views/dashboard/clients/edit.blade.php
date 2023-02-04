@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>@lang('site.clients')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li><a href="{{ route('dashboard.clients.index') }}"> @lang('site.clients')</a></li>
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

                    <form action="{{ route('dashboard.clients.update', $client->id) }}" method="post">

                        {{ csrf_field() }}
                        {{ method_field('put') }}

                        <!-- nom de client-->

                        <div class="form-group">
                            <label>@lang('site.name')</label>
                            <select id="cliname" name="cliname "class="form-control" value="{{ old('cliname') }}">
                                <option>{{$client->cliname}}</option>
                                <option>Sonelgaz-CD</option>
                                <option>Sonatrach</option>
                                <option>SETRAM</option>
                                <option>Client HT</option>
                            </select>
                        </div>
                        <!-- poste -->

                        <div class="form-group">
                            <label>Poste</label> 
                                <select id="poste" class="form-control" name="poste_id">
                                    <option disabled selected>Choisir une region</option>
                                    @foreach($postes as $poste)
                                        <option value="{{ $poste->id }}" {{ $client->poste_id == $poste->id ? 'selected' : '' }}>{{ $poste->code }}</option>
                                    @endforeach
                                </select>
                        </div>
                                            
                         <!-- depart -->
                         <div class="col">
                            <label for="inputName" class="control-label">Travée</label>
                            <select id="depart" name="depart" class="form-control" value="{{ old('depart') }}">
                                <option>{{ $cliente->depart}}</option>
                            </select>
                        </div>
                        <!-- U client -->
                            <div class="form-group">
                                <label>@lang('site.code_nivU')</label>
                                <select id="uclient" class="form-control" name="uclient" value="{{ old('uclient') }}">
                                    <option>{{ $client->uclient}}</option> 
                                    <option>220</option>
                                    <option>60</option>
                                    <option>30</option>
                                    <option>10</option>
                                </select>   
                            </div>


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
