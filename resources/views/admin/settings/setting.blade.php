@extends('layouts.app')

@section('content')
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
            <div class="app-brand demo">
                <a href="{{ route('admin.dashboard') }}" class="app-brand-link">
                    <span class="app-brand-logo demo">
                    </span>
                    <img src="{{asset('storage/images/slsu2.png')}}" alt="" style="width: 50px;">
                    <span class="app-brand-text demo menu-text fw-bolder ms-2" style="text-transform:uppercase">slsu</span>
                </a>

                <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                    <i class="bx bx-chevron-left bx-sm align-middle"></i>
                </a>
            </div>

            <div class="menu-inner-shadow"></div>

            <ul class="menu-inner py-1">
                <!-- Dashboard -->
                <li class="menu-item active">
                    <a href="{{ route('admin.dashboard') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-home-circle"></i>
                        <div data-i18n="Analytics">Dashboard</div>
                    </a>
                </li>

                <!-- Layouts -->

                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon fa-solid fa-circle-user"></i>
                        <div data-i18n="Layouts">Contestant</div>
                    </a>

                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="" class="menu-link">
                                <div data-i18n="Without menu">View Constestant</div>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon fas fa-calendar-check"></i>
                        <div data-i18n="Layouts">Events & Criteria</div>
                    </a>

                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="" class="menu-link">
                                <div data-i18n="Without menu">Create Events</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="" class="menu-link">
                                <div data-i18n="Without navbar">View Events</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="" class="menu-link">
                                <div data-i18n="Without navbar">Add Criteria</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon fa-solid fa-gavel"></i>
                        <div data-i18n="Layouts">Adding Judges</div>
                    </a>

                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="{{ route('admin.judges.create') }}" class="menu-link">
                                <div data-i18n="Without navbar">Judges</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{route('admin.judges.viewjudges')}}" class="menu-link">
                                <div data-i18n="Without navbar">View Judges</div>
                            </a>
                        </li>
                    </ul>
                </li>



                <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">Accounts</span>
                </li>
                <li class="menu-item {{$ActiveTab === 'settings' ? 'active' : ''}}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-dock-top"></i>
                        <div data-i18n="Account Settings">Account Settings</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="{{ route('admin.accounts.index') }}" class="menu-link">
                                <div data-i18n="Account">Account</div>
                            </a>
                        </li>
                        <li class="menu-item {{ $SubActiveTab === 'viewSettings' ? 'active' : '' }}">
                            <a href="{{ route('admin.settings.view') }}" class="menu-link">
                                <div data-i18n="Notifications">Settings</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('admin.accounts.editProfile') }}" class="menu-link">
                                <div data-i18n="Notifications">Update Account</div>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">Miscellaneous</span>
                </li>
                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-file"></i>
                        <div data-i18n="Misc">Misc</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="" class="menu-link">
                                <div data-i18n="Under Maintenance">Logs</div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
            <!-- Navbar -->

            <nav
                class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                id="layout-navbar">
                <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                        <i class="bx bx-menu bx-sm"></i>
                    </a>
                </div>

                <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                    <!-- Search -->
                    <div class="navbar-nav align-items-center">
                        <div class="nav-item d-flex align-items-center">
                            <!-- <i class="bx bx-search fs-4 lh-0"></i>
              <input type="text" class="form-control border-0 shadow-none" placeholder="Search..."
                aria-label="Search..." /> -->
                        </div>
                    </div>
                    <!-- /Search -->

                    <ul class="navbar-nav flex-row align-items-center ms-auto">
                        <!-- Place this tag where you want the button to render. -->


                        <!-- User -->
                        <li class="nav-item navbar-dropdown dropdown-user dropdown">
                            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                <div class="avatar avatar-online">
                                    <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt
                                        class="w-px-120 h-px-120 rounded-circle" />
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar avatar-online">
                                                    <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt
                                                        class="w-px-120 h-px-120 rounded-circle" />
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <span class="fw-semibold d-block">{{Auth::user()->name}}</span>
                                                <small class="text-muted">Admin</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{route('admin.accounts.index')}}">
                                        <i class="bx bx-user me-2"></i>
                                        <span class="align-middle">My Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="">
                                        <i class="bx bx-cog me-2"></i>
                                        <span class="align-middle">Settings</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="">
                                        <i class="menu-icon tf-icons bx bx-file"></i>
                                        <span class="align-middle">Logs</span>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="javascript:void(0);"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="bx bx-power-off me-2"></i>
                                        <span class="align-middle" style="color:#ff6347;">Log Out</span>
                                    </a>
                                    <form action="{{route('logout')}}" method="post" id="logout-form">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                        <!--/ User -->
                    </ul>
                </div>
            </nav>

            <!-- / Navbar -->

            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->
                <div class="container-xxl flex-grow-1 container-p-y">
                    <!-- Navigation Tabs -->
                    <ul class="nav nav-pills flex-column flex-md-row mb-4">
                        <li class="nav-item">
                            <a class="nav-link active" href="javascript:void(0);">
                                <i class='bx bxs-cog me-1'></i> Settings
                            </a>
                        </li>
                    </ul>

                    <!-- Settings Card -->
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <!-- Dark Mode Toggle -->
                            <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between">
                                <div class="mb-2 mb-sm-0">
                                    <h6 class="mb-1">Dark Mode</h6>
                                    <small class="text-muted">Enable or disable dark mode</small>
                                </div>
                                <div>
                                    <div class="form-check form-switch mb-0">
                                        <input type="checkbox" class="form-check-input dark-mode-toggle" id="darkModeSwitch" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <!-- Dark Mode Toggle -->
                            <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between">
                                <div class="mb-2 mb-sm-0">
                                    <h6 class="mb-1">Enable Judges</h6>
                                    <small class="text-muted">Enable or disable judges</small>
                                </div>
                                <div>
                                    <div class="form-check form-switch mb-0">
                                        <input type="checkbox" class="form-check-input dark-mode-toggle" id="darkModeSwitch" />
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="card-body">
                            <!-- Dark Mode Toggle -->
                            <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between">
                                <div class="mb-2 mb-sm-0">
                                    <h6 class="mb-1">Enable Contestant</h6>
                                    <small class="text-muted">Enable or disable contestant</small>
                                </div>
                                <div>
                                    <div class="form-check form-switch mb-0">
                                        <input type="checkbox" class="form-check-input dark-mode-toggle" id="darkModeSwitch" />
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="card-body">
                            <!-- Dark Mode Toggle -->
                            <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between">
                                <div class="mb-2 mb-sm-0">
                                    <h6 class="mb-1">Enable Votes For Audience</h6>
                                    <small class="text-muted">Enable or disable audience voting</small>
                                </div>
                                <div>
                                    <div class="form-check form-switch mb-0">
                                        <input type="checkbox" class="form-check-input dark-mode-toggle" id="darkModeSwitch" />
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <!-- / Content -->

                <!-- Footer -->
                <footer class="content-footer footer bg-footer-theme">
                    <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                        <div class="mb-2 mb-md-0">
                            ©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            , made with ❤️ by
                            <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">Jas<span class="fw-bold" style="color: #ff6347;">Coder</span></a>
                        </div>
                        <div>
                            <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
                            <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">Contuct Us</a>

                            <a href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
                                target="_blank" class="footer-link me-4">Documentation</a>

                            <a href="https://github.com/themeselection/sneat-html-admin-template-free/issues" target="_blank"
                                class="footer-link me-4">Support</a>
                        </div>
                    </div>
                </footer>
                <!-- / Footer -->

                <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
</div>
<!-- / Layout wrapper -->
@endsection