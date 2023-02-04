@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('site.dashboard')</h1>

            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</li>
            </ol>
        </section>

        <section class="content">

            <div class="row">

                {{-- lignes--}}
           <!--    <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3> {{ \App\Ligne::where('region_id', '6')->sum('longeur') }}  Km  </h3>

                            <p>@lang('site.lignes')</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-mic-c"></i>
                        </div>
                        <a href="{{ route('dashboard.lignes.index') }}" class="small-box-footer">@lang('site.read') <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            -->

               <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h4 style="font-size: 200%"><strong>{{ \App\Ligne::sum('longeur') }} Km Lignes</strong></h4>
                            <h4><strong>{{ \App\Ligne::where('nivU', '400')->sum('longeur') }} Km</strong> Ligne 400kV  </h4>
                            <h4><strong>{{ \App\Ligne::where('nivU' , '220')->sum('longeur') }} Km</strong> Ligne 220kV</h4>
                            <h4><strong>{{ \App\Ligne::where('nivU' , '60') ->sum('longeur') }} Km</strong> Ligne 60kV </h4><br>
                        </div>
                        <div class="icon">
                            <i class="ion ion-mic-c"></i>
                        </div>
                        <a href="{{ route('dashboard.lignes.index') }}" class="small-box-footer">@lang('site.read') <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            
                {{-- postes--}}
                <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-teal">
                            <div class="inner">
                                <h4 style="font-size: 200%"><strong>{{\App\Poste::count() }} Postes</strong></h4>
                                <h4><strong>{{ \App\Poste::where('nivU', '400/220')->count() }}</strong> Poste 400/220kV  </h4>
                                <h4><strong>{{ \App\Poste::where('nivU' , '220/60')->count() }}</strong> Poste 220/60kV</h4>
                                <h4><strong>{{ \App\Poste::where('nivU' , '220/60/30')->count() }}</strong> Poste 220/60/30kV</h4>
                                <h4><strong>{{ \App\Poste::where('nivU' , '60/30') ->count() }}</strong> Poste 60/30kV </h4>
                            </div>
                            <div class="icon">
                                <i class="ion ion-home"></i>
                            </div>
                            <a href="{{ route('dashboard.wilayas.index')}}" class="small-box-footer">@lang('site.read') <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                </div>

                  {{-- transfo--}}
                  <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-olive">
                        <div class="inner">
                            <h4 style="font-size: 200%"><strong>{{ \App\Transfo::count() }} Transfos</strong></h4>
                            <h4><strong>{{ \App\Transfo::where('nivU','400/220')->count() }}</strong> TR 400/220kV  </h4>
                            <h4><strong>{{ \App\Transfo::where('nivU' ,'220/60/10')->count() }}</strong> TR 220/60kV</h4>
                            <h4><strong>{{ \App\Transfo::where('nivU' ,'220/60/30')->count() }}</strong> TR 220/60/30kV</h4>
                            <h4><strong>{{ \App\Transfo::where('nivU' ,'60/30') ->count() }}</strong> TR 60/30kV </h4>
                        </div>
                        <div class="icon">
                            <i class="ion ion-cube"></i>
                        </div>
                        <a href="{{ route('dashboard.transfos.index')}}" class="small-box-footer">@lang('site.read') <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
            </div>
            
                {{--clients--}}
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-maroon">
                        <div class="inner">
                            <h4 style="font-size: 200%"><strong>{{ \App\Client::count()  }} Clients</strong></h4>
                            <h4><strong>{{ \App\Client::where('uclient', '220')->count() }}</strong> Clients 220kV </h4>
                            <h4><strong>{{ \App\Client::where('uclient' , '60')->count() }}</strong> Clients  60kV</h4>
                            <h4><strong>{{ \App\Client::where('uclient' , '30')->count() }}</strong> Clients 30kV</h4><br><br>
                            
                        </div>
                        <div class="icon">
                            <i class="fa fa-user"></i>
                        </div>
                        <a href="{{ route('dashboard.clients.index') }}" class="small-box-footer">@lang('site.read')<i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
           
            </div><!-- end of row -->

            {{--    <div class="box box-solid">  
                    <div class=" col-lg-6 col-xs-12">
                                            
                    </div>

                    <div class=" col-lg-6 col-xs-12">
                        {!! $chartjs2->render() !!}
                    </div>                   
                </div>--}}
                <div class="row"> <!-- /start row1 -->
                    
                    <div class="box box-solid  col-lg-6 col-xs-12" style="width:50%;">
                      
                                <div class="box-header">
                                    <h3 class="box-title" style="justify-content:center ">Courbe de transite</h3>
                                </div>
                                <div class="box-body border-radius-none">
                                        {!! $chartjs->render() !!} 
                                </div>
                        
                    </div>
                    <div class="box box-solid  col-lg-6 col-xs-12" style="width:50%;" >
                        
                        <div class="box-header">
                            <h3 class="box-title">END-Objectif par Région de transport</h3>
                        </div>
                        <div class="box-body border-radius-none">
                                {!! $chartjs2->render() !!} 
                        </div>
                    </div>
                  
                </div>
                        <!-- deux comembaire END & Anomalie -->
                        <!-- start row2 -->
                <div class="row" >
                    <!-- anomalie par metier  -->
                    <div class="box box-solid  col-lg-3 col-xs-12" style="width:50%;">
                      
                                <div class="box-header">
                                    <h3 class="box-title">END par région</h3>
                                </div>
                                <div class="box-body border-radius-none">
                                        {!! $chartjs3->render() !!} 
                                </div>
                        
                    </div>
                    <!-- anomalie par metier  -->
                    <div class="box box-solid  col-lg-3 col-xs-12" style="width:50%;" >
                        
                            <div class="box-header">
                                <h3 class="box-title">END par métier</h3>
                            </div>
                            <div class="box-body border-radius-none">
                                {!! $chartjs4->render() !!} 
                            </div>
                    </div>
                    <!-- anomalie par metier  -->
                    <div class="box box-solid  col-lg-3 col-xs-12" style="width:50%;" >
                        
                        <div class="box-header">
                            <h3 class="box-title">Anomalie par métier</h3>
                        </div>
                        <div class="box-body border-radius-none">
                            {!! $chartjs5->render() !!} 
                        </div>
                    </div>
                </div> <!-- /end row2 -->

            </div> <!-- /.box-body -->
                        
        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection
