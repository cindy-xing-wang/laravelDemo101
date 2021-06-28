<div class="page-wrap">
    <div class="app-sidebar colored">
        <div class="sidebar-header">
            <a class="header-brand" href="index.html">
                <div class="logo-img">
                   {{-- <img src="{{asset('template/src/img/brand-white.svg')}}" class="header-brand-img" alt="lavalite">  --}}
                   {{-- <img src="https://static.wixstatic.com/media/843435_19ebea197738465ab4f07d4c64518959%7Emv2.png/v1/fill/w_32%2Ch_32%2Clg_1%2Cusm_0.66_1.00_0.01/843435_19ebea197738465ab4f07d4c64518959%7Emv2.png" class="header-brand-img" alt="lavalite">  --}}
                </div>
                <span class="text">Laravel Demo</span>
            </a>
            <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
            <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
        </div>
        
        <div class="sidebar-content">
            <div class="nav-container">
                <nav id="main-menu-navigation" class="navigation-main">
                    <div class="nav-item active">
                        <a href="{{url('dashboard')}}"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                    </div>
                    <div class="nav-item has-sub">
                        @if (Auth::user()->role_id==1 || Auth::user()->role_id==2)
                            
                            <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Staff</span> 
                                <span class="badge badge-danger">
                                    @if (Auth::user()->role_id==1)
                                        {{count(App\Models\User::get())}}
                                    @else
                                        {{count(App\Models\User::where('site_id','=', Auth::user()->site_id)->get())}}
                                    @endif
                                </span>
                            </a>
                            <div class="submenu-content">
                                <a href="{{route('staffs.index')}}" class="menu-item">Staff List</a>
                                <a href="{{route('staffs.create')}}" class="menu-item">New Staff</a>
                            </div>
                        @endif
                    </div>
                    <div class="nav-item active">
                        <a href="{{route('checklistLogs.create')}}"><i class="ik ik-edit"></i><span>New checklist</span> </a>
                    </div>
                    @if (Auth::user()->role_id==1)
                        <div class="nav-item active">
                            <a href="{{route('checklists.index')}}"><i class="ik ik-file-text"></i></i><span>Checklist Management</span> </a>
                        </div>
                    @endif
                    <div class="nav-item active">
                        <a href="{{url('calendars')}}"><i class="ik ik-calendar"></i><span>Calendars</span> </a>
                    </div>
                </nav>
            </div>
        </div>
    </div>