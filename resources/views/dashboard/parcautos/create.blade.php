@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>@lang('site.parcautos')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li><a href="{{ route('dashboard.postes.index') }}"> @lang('site.postes')</a></li>
                <li><a href="{{ route('dashboard.parcautos.index') }}"> @lang('site.parcautos')</a></li>
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

                    <form action="{{ route('dashboard.parcautos.store') }}" method="POST" enctype="multipart/form-data">
                       
                        
                        {{ csrf_field() }}
                        {{ method_field('post') }}
                          
                        <div class="form-group">
                            <label for="poste">poste</label>
                                <select  id= "poste" class="form-control" name="poste" >
                                    <option></option>
                                    @foreach($postes as $poste)
                                        <option value="{{ $poste->id }}">{{ $poste->name }}</option>
                                    @endforeach
                                </select>
                        </div>
                                            
            
                        <div class="form-group">
                            <label>@lang('site.code_nivU')</label>
                            <select id="fabriq" class="form-control" name="fabriq" value="{{ old('fabriq') }}">
                                <option disabled selected>Fabriquant</option> 
                                <option>Toyota</option>
                                <option>Peugeot</option>
                                <option>Renaut</option>
                                <option>Mercedes</option>
                                <option>Fiat</option>
                                <option>Mahindra</option>
                                <option>Hyundai</option>
                                <option>Suzuki</option>
                                <option>Mitsubishi</option>  
                                <option>Autre</option>
                            </select>   
                        </div>

                         <!-- finis -->
                        <div class="form-group">
                            <label>@lang('site.finition')</label>
                            <select id="select2" class="form-control" list="finis" name="finis" value="{{ old('finis') }}">
                                <option disabled selected> Finition</option> 
                                <option>Berlingo</option>
                                <option>Doblo</option>
                                <option>Fabia</option>
                                <option>Accent</option>
                                <option>Swift</option>
                                <option>Hilux</option>
                                <option>Jempi</option>
                                <option>Kongo</option>
                                <option>G200</option>
                                <option>Autre</option>
                            </select>   
                        </div>
                        <!--
                        <label for="ice-cream-choice">Choose a flavor:</label>
                        <input list="ice-cream-flavors" id="ice-cream-choice" name="ice-cream-choice" />
                        
                        <datalist id="ice-cream-flavors">
                            <option value="Chocolate">
                            <option value="Coconut">
                            <option value="Mint">
                            <option value="Strawberry">
                            <option value="Vanilla">
                        </datalist>     -->
                        <!-- immatri-->
                        <div class="form-group"> 
                        <label>@lang("site.Immatri")</label>
                        <input type="text" id="immatri" name="immatri" class="form-control" value="{{ old('immatri') }}">
                        </div>

                       <!-- Carburant -->
                       <div class="form-group">
                        <label>@lang('site.carburant')</label>
                        <select id="carbu" class="form-control" name="carbu" value="{{ old('carbu') }}">
                            <option disabled selected>Type de Carburant</option> 
                            <option>Essence</option>
                            <option>Gazoil</option>
                            <option>GPL/Sirghaz</option>
                            <option>Electrique</option>
                        </select>   
                    </div>

                    <!-- Propri -->
                    <div class="form-group">
                        <label>@lang('site.propri')</label>
                        <select id="propri" class="form-control" name="propri" value="{{ old('carbur') }}">
                            <option disabled selected>Le propriétaire</option> 
                            <option>Location</option>
                            <option>Sonelgaz</option>
                            <option>Autre</option>
                        </select>   
                    </div>

                        <!-- 1er date -->
                        <div class="form-group"> 
                            <label>@lang("site.1er date d'utilisation")</label>
                            <input type="date" id="datemise" name="datemise" class="form-control" value="{{ old('datemise') }}">
                        </div>

                        <div class="form-group"> 
                            <label>Etat de la travée</label>
                            <select type="text" name="etat" class="form-control" value="{{ old('etat') }}">
                            <option>En Marche</option>
                            <option>En panne</option>
                            </select>
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

            $("#finis").select2({
                placeholder: "Select Finition",
                allowClear: true
            });
    </script>


@endsection

