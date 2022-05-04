<!-- Antelope.io - Sidebar  -->
<div class="iq-sidebar">

    <div class="iq-sidebar-logo d-flex justify-content-between">

        <a href="/">
            <img src="{{ asset('images/logo.png') }}" class="img-fluid" alt="">
            <span>{{ APPLICATION_NAME }}</span>
            <sub class="header-sub-title" style="display: inline-block; transform: rotate(-30deg); margin-top: 4px; line-height: unset; background: red; padding-right: 2px; padding-left: 2px; border-radius: 4px;">{{ APPLICATION_SUB_NAME }}</sub>
        </a>

        <div class="iq-menu-bt align-self-center">
            <div class="wrapper-menu">
                <div class="line-menu half start"></div>
                <div class="line-menu"></div>
                <div class="line-menu half end"></div>
            </div>
        </div>

    </div>

    <div id="sidebar-scrollbar">

        <nav class="iq-sidebar-menu">
            <ul id="iq-sidebar-toggle" class="iq-menu">

                <li class="iq-menu-title"><i class="ri-separator"></i><span>{!! __('core.main') !!}</span></li>

                @if(!auth()->user())
                <li @if($route == "join_us") class="active" @endif>
                    <a href="/join_us" class="iq-waves-effect text-warning"><i class="ri-star-line"></i><span>{!! __('join_us.sidebar_explorer') !!}</span></a>
                </li>
                @endif

                <li @if($route == "dashboard") class="active" @endif>
                    <a href="/" class="iq-waves-effect"><i class="ri-home-4-line"></i><span>{!! __('features.dashboard') !!}</span></a>
                </li>


                @can('admin')
                <li @if(str_contains($route, "admin_") && !str_contains($route, "superadmin_")) class="active" @endif>
                    <a href="#antelope-sidebar-admin" class="iq-waves-effect collapsed"  data-toggle="collapse" aria-expanded="false"><i class="ri-shield-star-fill"></i><span>{!! __('features.admin') !!}</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                    <ul id="antelope-sidebar-admin" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li><a href="/admin/user_management">{!! __('features.admin_user_management') !!}</a></li>
                        <li><a href="/admin/rank_management">{!! __('features.admin_rank_management') !!}</a></li>
                    </ul>
                </li>
                @endcan

                @can('superadmin')
                <li @if(str_contains($route, "superadmin_")) class="active" @endif>
                    <a href="#antelope-sidebar-superadmin" class="iq-waves-effect collapsed"  data-toggle="collapse" aria-expanded="false"><i class="ri-server-line"></i><span>{!! __('features.superadmin') !!}</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                    <ul id="antelope-sidebar-superadmin" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li><a href="/superadmin/universe_settings">Universe Settings</a></li>

                        @if(env('APP_ENV', 'production') == 'local')
                        <li><a href="/developer_debug">Antelope Developers</a></li>
                        @endif
                    </ul>
                </li>
                @endcan

                @can('incident_reporter')
                <li class="iq-menu-title"><i class="ri-separator"></i><span>{!! __('core.incident_reporter') !!}</span></li>

                <li @if($route == "ir_control_center") class="active" @endif>
                    <a href="/incident_reporter/control_center" class="iq-waves-effect"><i class="ri-customer-service-line"></i><span>{!! __('features.ir_control_center') !!}</span></a>
                </li>
                @endcan

                @can('fire_explorer')
                <li class="iq-menu-title"><i class="ri-separator"></i><span>{!! __('core.fire_explorer') !!}</span></li>

                <li @if($route == "fe_incident_archive") class="active" @endif>
                    <a href="/fire_explorer/incident_archive" class="iq-waves-effect"><i class="ri-archive-line"></i><span>{!! __('features.fe_incident_archive') !!}</span></a>
                </li>
                @endcan

                <li class="iq-menu-title"><i class="ri-separator"></i><span>{!! __('core.public_resources') !!}</span></li>

                <li @if($route == "incidents_live_map") class="active" @endif>
                    <a href="/incidents/live_map" class="iq-waves-effect"><i class="ri-map-pin-line"></i><span>{!! __('features.live_map') !!}</span></a>
                </li>

                <li>
                    <a href="https://lsfd.gta.world/viewforum.php?f=331" class="iq-waves-effect"><i class="ri-file-text-line"></i><span>{!! __('features.press_releases') !!}</span></a>
                </li>

            </ul>
        </nav>

        <div class="p-3"></div>

    </div>

</div>
<!-- #END - Sidebar  -->
