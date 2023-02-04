<aside class="main-sidebar">

    <section class="sidebar">

        <ul class="sidebar-menu" data-widget="tree">
           
            <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-th"></i><span>@lang('site.dashboard')</span></a></li>
        
            {{-- sidebar of incidents et PQS --}}

            <li class="treeview">
                <a href="#"><i class="fa fa-fire"></i> <span>@lang('Incidents & PQS')</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                    @if (auth()->user()->hasPermission('read_ends'))
                    <li><a href="{{ route('dashboard.ends.index') }}"><i class="fa fa-flag"></i><span>Incidents Postes</a></li>
                    @endif
                    @if (auth()->user()->hasPermission('read_inclignes'))
                    <li><a href="{{ route('dashboard.inclignes.index') }}"><i class="fa fa-flag"></i><span>Incidents Lignes</a></li>
                    @endif
                </ul>
              </li>


      {{-- sidebar of Anomalie et intervention --}}

              <li class="treeview">
                <a href="#"><i class="fa fa-calendar-check-o"></i> <span>@lang("site.Gestion_d'anomalies")</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                    @if (auth()->user()->hasPermission('read_anomalieexps'))
                    <li><a href="{{ route('dashboard.anomalieexps.index') }}"><i class="fa fa-flag"></i><span>@lang('site.anomalieexp')</a></li>
                    @endif
                    @if (auth()->user()->hasPermission('read_anomaliestes'))
                    <li><a href="{{ route('dashboard.anomaliestes.index') }}"><i class="fa fa-flag"></i><span>@lang('site.anomalieste')</a></li>
                    @endif
                    @if (auth()->user()->hasPermission('read_anomalieprogs'))
                    <li><a href="{{ route('dashboard.anomalieprogs.index') }}"><i class="fa fa-flag"></i><span>@lang('site.anomalieprog')</a></li>
                    @endif
                </ul>
              </li>


       {{-- sidebar of consignations et transferts --}}

       <li class="treeview">
        <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> <span>@lang('site.Cons_Trans')</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
            @if (auth()->user()->hasPermission('read_plantras'))
            <li><a href="{{ route('dashboard.plantras.index') }}"><i class="fa fa-flag"></i><span>@lang('site.plantras')</a></li>
            @endif
            @if (auth()->user()->hasPermission('read_bulhebdos'))
            <li><a href="{{ route('dashboard.bulhebdos.index') }}"><i class="fa fa-flag"></i><span>@lang('site.bulhebdos')</a></li>
            @endif
            @if (auth()->user()->hasPermission('read_progconsigs'))
            <li><a href="{{ route('dashboard.progconsigs.index') }}"><i class="fa fa-flag"></i><span>@lang('site.progconsigs')</a></li>
            @endif
        </ul>
      </li>

  

       {{-- sidebar of organismes --}}

       <li class="treeview">
        <a href="#"><i class="fa fa-map-signs"></i> <span>@lang('site.organismes')</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
            @if (auth()->user()->hasPermission('read_regions'))
            <li><a href="{{ route('dashboard.regions.index') }}"><i class="fa fa-paper-plane-o"></i><span>@lang('site.regions_de_transport')</a></li>
            @endif
            @if (auth()->user()->hasPermission('read_structures'))
            <li><a href="{{ route('dashboard.structures.index') }}"><i class="fa fa-cubes"></i><span>@lang('site.structures')</a></li>
            @endif
            @if (auth()->user()->hasPermission('read_stes'))
            <li><a href="{{ route('dashboard.stes.index') }}"><i class="fa fa-wrench"></i><span>@lang('site.stes')</a></li>
            @endif
            @if (auth()->user()->hasPermission('read_clients'))
            <li><a href="{{ route('dashboard.clients.index') }}"><i class="fa fa-user-secret"></i><span>@lang('site.clients_producteurs')</a></li>
            @endif
            @if (auth()->user()->hasPermission('read_constructeurs'))
            <li><a href="{{ route('dashboard.constructeurs.index') }}"><i class="fa fa-cog"></i><span>@lang('site.constructeurs')</a></li>
            @endif
        </ul>
      </li>

             {{-- sidebar of Ouvrages --}}   
            <li class="treeview">
                <a href="#"><i class="fa fa-bolt"></i><span>@lang('site.ouvrages')</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                    @if (auth()->user()->hasPermission('read_postes'))
                    <li><a href="{{ route('dashboard.postes.index') }}"><i class="fa fa-institution"></i><span>@lang('site.postes')</a></li>
                    @endif
                    @if (auth()->user()->hasPermission('read_lignes'))
                    <li><a href="{{ route('dashboard.lignes.index') }}"><i class="fa fa-i-cursor"></i><span>@lang('site.lignes')</a></li>
                    @endif
                    @if (auth()->user()->hasPermission('read_cms'))
                    <li><a href="{{ route('dashboard.cms.index') }}"><i class="fa fa-flag"></i><span>@lang('site.cms')</a></li>
                    @endif
                    @if (auth()->user()->hasPermission('read_pcgs'))
                    <li><a href="{{ route('dashboard.pcgs.index') }}"><i class="fa fa-flag"></i><span>@lang('site.pcgs')</a></li>
                    @endif
                    @if (auth()->user()->hasPermission('read_gpus'))
                    <li><a href="{{ route('dashboard.gpus.index') }}"><i class="fa fa-flag"></i><span>@lang('site.gpus')</a></li>
                    @endif
                </ul>
              </li>

             {{-- sidebar of sièges --}}   
          
            <li class="treeview">
                <a href="#"><i class="fa fa-steam-square"></i> <span>@lang('site.sieges')</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                    @if (auth()->user()->hasPermission('read_departs'))
                    <li><a href="{{ route('dashboard.departs.index') }}"><i class="fa fa-flag"></i><span>@lang('site.departs')</a></li>
                    @endif
                    @if (auth()->user()->hasPermission('read_transfos'))
                    <li><a href="{{ route('dashboard.transfos.index') }}"><i class="fa fa-flag"></i><span>@lang('site.transfos')</a></li>
                    @endif
                    @if (auth()->user()->hasPermission('read_transas'))
                    <li><a href="{{ route('dashboard.transas.index') }}"><i class="fa fa-flag"></i><span>@lang('site.transas')</a></li>
                    @endif
                    @if (auth()->user()->hasPermission('read_transcs'))
                    <li><a href="{{ route('dashboard.transcs.index') }}"><i class="fa fa-flag"></i><span>@lang('site.transcs')</a></li>
                    @endif
                    @if (auth()->user()->hasPermission('read_transps'))
                    <li><a href="{{ route('dashboard.transps.index') }}"><i class="fa fa-flag"></i><span>@lang('site.transps')</a></li>
                    @endif
                    @if (auth()->user()->hasPermission('read_disjoncs'))
                    <li><a href="{{ route('dashboard.disjoncs.index') }}"><i class="fa fa-flag"></i><span>@lang('site.disjoncs')</a></li>
                    @endif
                    @if (auth()->user()->hasPermission('read_batconds'))
                    <li><a href="{{ route('dashboard.batconds.index') }}"><i class="fa fa-flag"></i><span>@lang('site.batconds')</a></li>
                    @endif
                    @if (auth()->user()->hasPermission('read_protections'))
                    <li><a href="{{ route('dashboard.protections.index') }}"><i class="fa fa-cog"></i><span>@lang('site.protections')</a></li>
                    @endif
                    @if (auth()->user()->hasPermission('read_compteurs'))
                    <li><a href="{{ route('dashboard.compteurs.index') }}"><i class="fa fa-calculator"></i><span>@lang('site.compteurs')</a></li>
                    @endif
                    @if (auth()->user()->hasPermission('read_groupelecs'))
                    <li><a href="{{ route('dashboard.groupelecs.index') }}"><i class="fa fa-cog"></i><span>@lang('site.groupelecs')</a></li>
                    @endif
                </ul>
              </li>

              {{-- Logistique et Moyen --}}   
              <li class="treeview">
                <a href="#"><i class="fa fa-truck"></i><span>@lang('site.logistique_moyens')</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                    @if (auth()->user()->hasPermission('read_parcautos'))
                    <li><a href="{{ route('dashboard.parcautos.index') }}"><i class="fa fa-car"></i><span>@lang('site.parcautos')</a></li>
                    @endif
                    @if (auth()->user()->hasPermission('read_prisecharges'))
                    <li><a href="{{ route('dashboard.prisecharges.index') }}"><i class="fa fa-hotel"></i><span>@lang('site.prisecharges')</a></li>
                    @endif
                    @if (auth()->user()->hasPermission('read_boncarburons'))
                    <li><a href="{{ route('dashboard.boncarburons.index') }}"><i class="fa fa-calendar-check-o"></i><span>@lang('site.boncarburons')</a></li>
                    @endif
                </ul>
              </li>





              {{-- sidebar of Localités --}}   

              <li class="treeview">
                <a href="#"><i class="fa fa-area-chart"></i> <span>@lang('site.transite_comptage')</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                    @if (auth()->user()->hasPermission('read_transites'))
                    <li><a href="{{ route('dashboard.transites.index') }}"><i class="fa fa-flag"></i><span>Point de transite</a></li>
                    @endif
                    @if (auth()->user()->hasPermission('read_comptages'))
                    <li><a href="{{ route('dashboard.comptages.index') }}"><i class="fa fa-flag"></i><span>Comptage d'energie</a></li>
                    @endif
                </ul>
              </li>

              {{-- sidebar of Localités --}}  

            <li class="treeview">
                <a href="#"><i class="fa fa-map-marker"></i> <span>@lang('site.lieux_communes')</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                    @if (auth()->user()->hasPermission('read_wilayas'))
                    <li><a href="{{ route('dashboard.wilayas.index') }}"><i class="fa fa-flag"></i><span>@lang('site.wilayas')</a></li>
                    @endif
                    @if (auth()->user()->hasPermission('read_communes'))
                    <li><a href="{{ route('dashboard.communes.index') }}"><i class="fa fa-flag"></i><span>@lang('site.communes')</a></li>
                    @endif
                </ul>
              </li>

              <li class="treeview">
                <a href="#"><i class="fa fa-users"></i> <span>Gestion personnel</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                   @if (auth()->user()->hasPermission('read_users'))
                <li><a href="{{ route('dashboard.users.index') }}"><i class="fa fa-users"></i><span>@lang('site.users')</span></a></li>
                     @endif
                </ul>
              </li>
            {{--<li><a href="{{ route('dashboard.categories.index') }}"><i class="fa fa-book"></i><span>@lang('site.categories')</span></a></li>--}}
            {{----}}
            {{----}}
            {{--<li><a href="{{ route('dashboard.users.index') }}"><i class="fa fa-users"></i><span>@lang('site.users')</span></a></li>--}}

            {{--<li class="treeview">--}}
            {{--<a href="#">--}}
            {{--<i class="fa fa-pie-chart"></i>--}}
            {{--<span>الخرائط</span>--}}
            {{--<span class="pull-right-container">--}}
            {{--<i class="fa fa-angle-left pull-right"></i>--}}
            {{--</span>--}}
            {{--</a>--}}
            {{--<ul class="treeview-menu">--}}
            {{--<li>--}}
            {{--<a href="../charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<a href="../charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<a href="../charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<a href="../charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a>--}}
            {{--</li>--}}
            {{--</ul>--}}
            {{--</li>--}}
        </ul>

    </section>

</aside>

