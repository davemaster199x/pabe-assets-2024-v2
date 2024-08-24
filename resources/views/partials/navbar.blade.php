
    <!-- Page Sidebar Start-->
    <div class="sidebar-wrapper">
        <div>
            <div class="logo-wrapper"><a href="{{ route('dashboard') }}"><img class="img-fluid for-light"
                        src="{{ asset('images/pabe-logo.png') }}" alt="" width="90"><img class="img-fluid for-dark"
                        src="{{ asset('images/pabe-logo.png') }}" alt="" width="90"></a>
                <div class="back-btn"><i class="fa fa-angle-left"></i></div>
                <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid">
                    </i></div>
            </div>
            <div class="logo-icon-wrapper"><a href="{{ route('dashboard') }}"><img class="img-fluid" width="75" src="{{ asset('images/pabe-logo.png') }}"
                        alt="" width="100"></a></div>
            <nav class="sidebar-main">
                <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
                <div id="sidebar-menu">
                    <ul class="sidebar-links" id="simple-bar">
                        <li class="back-btn"><a href="{{ route('dashboard') }}"><img class="img-fluid" src="{{ asset('images/pabe-logo.png') }}"
                                    alt="" width="100"></a>
                            <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                    aria-hidden="true"></i></div>
                        </li>
                        <li class="sidebar-main-title">
                            <div>
                                <h6 class="lan-1">General</h6>
                            </div>
                        </li>
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" id="dashboard-navbar" style="display: flex;"
                                href="{{ route('dashboard') }}"><i data-feather="home">
                                </i><span>Dashboard</span></a></li>
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" style="display: flex;"
                                id="list_of_assets-navbar" href="{{ route('list_of_assets') }}"><i data-feather="list">
                                </i><span>List of Assets</span></a></li>
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" id="add_assets-navbar" style="display: flex;"
                                href="{{ route('add_assets') }}"><i data-feather="plus"> </i><span>Add
                                    an Asset </span></a></li>
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" id="check_out-navbar" style="display: flex;"
                                href="{{ route('check_out') }}"><i data-feather="check"> </i><span>Check
                                    out</span></a></li>
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" id="check_in-navbar" style="display: flex;"
                                href="{{ route('check_in') }}"><i data-feather="x"> </i><span>Check
                                    In</span></a></li>
                        <!-- <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" id="dispose-navbar" style="display: flex;"
                                href="{{ route('dispose') }}"><i data-feather="refresh-cw">
                                </i><span>Dispose</span></a></li> -->
                    </ul>
                </div>
                <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
            </nav>
        </div>
    </div>