@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>@lang('site.protections')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li><a href="{{ route('dashboard.protections.index') }}"> @lang('site.protections')</a></li>
                <li class="active">@lang('site.edit')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">@lang('site.edit')</h3>
                </div><!-- protection of box header -->
                <div class="box-body">

                    @include('partials._errors')

                    <form action="{{ route('dashboard.protections.update', $protection->id) }}" method="post">

                        {{ csrf_field() }}
                        {{ method_field('put') }}

                        {{-- poste --}}

                        <div class="form-group row">
                            <label for="poste">Poste</label>
                                <select id="poste" class="form-control" name="poste">
                                    <option disabled selected>Choisir un poste éléctrique</option>
                                    @foreach($postes as $poste)
                                        <option value="{{ $poste->id }}">{{ $poste->name }}</option>
                                    @endforeach
                                </select>
                        </div>

                        {{-- code_prot --}}
                        <div class="form-group">
                            <label>@lang('site.code')</label>
                            <input type="text" name="code_prot" class="form-control" value="{{ $protection->code_prot }}">
                        </div>

                         {{-- name prot --}}
                        <div class="form-group">
                            <label for="name_pro">Libillée</label>
                            <select type="text" id="name_pro" class="form-control" name="name_pro" value="{{old('name_pro')}}">
                                <option></option>
                                <option>Unité de travée</option>
                                <option>PP1</option>
                                <option>PP2</option>
                                <option>Secours</option> 
                                <option>complementaire</option>
                                <option>TR</option>
                            </select>   
                        </div>
                         {{-- fonction--}}

                        <div class="form-group">
                            <label for="fonct">Fonction</label>
                            <select type="text" id="fonct" class="form-control" name="fonct" value="{{old('fonct')}}">
                                <option></option>
                                <option>Max I HT</option>
                                <option>Max I MT</option>
                                <option>Terre résistante</option>
                                <option>Diff</option>
                                <option>Masse barre</option>
                                <option>PDD</option>
                                <option>Buch-holz</option>
                                <option>Masse cuve TR</option>
                                <option>Masse cuve TSA</option>
                            </select>   
                        </div>

                         {{-- Num_prot--}}
                         <div class="form-group"> 
                            <label>Numéro Sonelgaz</label>
                            <input type="text" name="num_prot" class="form-control" value={{ $protection->num_prot }}>
                        </div>
                           {{--fabrican protection--}}

                           <div class="form-group row">
                            <label for="constructeur">Constructeur</label>
                                <select id="constructeur" class="form-control" name="constructeur" value="{{old('constructeur')}}">
                                    <option></option>
                                    @foreach($constructeurs as $constructeur)
                                        <option value="{{ $constructeur->id }}">{{ $constructeur->name }}</option>
                                    @endforeach
                                </select>
                        </div>

                            {{-- date mise ES--}}
                        <div class="form-group"> 
                            <label>@lang('site.datemise_transfo')</label>
                            <input type="date" name="datemise" class="form-control" value="{{$protection->datemise}}">
                        </div>

                        {{-- Etat--}}
                        <div class="form-group">
                        <label for="etat" >Etat</label>
                        <select class="form-control" name="etat">
                            <option>{{ $protection->etat}}</option>
                            <option>En Service</option>
                            <option>Hors Service</option>
                            <option>Avarie</option>
                            <option>PDR</option>
                        </select>   
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> @lang('site.edit')</button>
                        </div>

                    </form><!-- protection of form -->

                </div><!-- protection of box body -->

            </div><!-- protection of box -->

        </section><!-- protection of content -->

    </div><!-- protection of content wrapper -->
  <!-- Internal Select2 js-->
  <script src="{{ URL::asset('dashboard_files/plugins/select2/js/select2.min.js') }}"></script>
  <script type="text/javascript">

   $("#poste").select2({
       placeholder: "Select poste",
       allowClear: true
   });

   $("#constructeur").select2({
       placeholder: "Select Constructeur",
       allowClear: true
   });

</script>
@endsection
