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
                <li class="menu-item">
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

                <li class="menu-item {{$ActiveTab === 'criteria' ? 'active' : ''}}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon fas fa-calendar-check"></i>
                        <div data-i18n="Layouts">Events & Criteria</div>
                    </a>

                    <ul class="menu-sub">
                        <li class="menu-item ">
                            <a href="" class="menu-link">
                                <div data-i18n="Without menu">Create Events</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="" class="menu-link">
                                <div data-i18n="Without navbar">View Events</div>
                            </a>
                        </li>
                        <li class="menu-item {{ $SubActiveTab === 'Adding Criteria' ? 'active' : '' }}">
                            <a href="" class="menu-link">
                                <div data-i18n="Without navbar">Add Criteria</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{route('admin.criteria.view')}}" class="menu-link">
                                <div data-i18n="Without navbar">View Criteria</div>
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
                <li class="menu-item">
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
                        <li class="menu-item">
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
                                                <span class="fw-semibold d-block">{{ optional(Auth::user())->name }}
                                                </span>
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
                                    <a class="dropdown-item" href="{{route('admin.settings.view')}}">
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
                    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Add/</span> Criteria</h4>

                    <!-- Basic Layout -->
                    <div class="row">
                        <div class="col-xl">
                            <div class="card mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">Criteria</h5>
                                    <small class="text-muted float-end">Default label</small>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('admin.criteria.store') }}">
                                        @csrf

                                        @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif

                                        @if(session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                        @endif

                                        <div id="criteria-wrapper">
                                            <div class="mb-3 criteria-group">
                                                <label class="form-label" for="criteria-name-0">Name of Criteria 1</label>
                                                <input type="text" class="form-control mb-2" id="criteria-name-0" name="name[]" placeholder="e.g. Vocal Quality" required />

                                                <label class="form-label" for="criteria-percentage-0">Percentage</label>
                                                <input type="number" class="form-control percentage-input" id="criteria-percentage-0" name="percentage[]" placeholder="e.g. 30" min="1" max="100" required />
                                            </div>
                                        </div>

                                        <div class="mb-3" id="criteria-buttons">
                                            <button type="button" class="btn btn-secondary me-2" onclick="addCriteriaField()" id="add-criteria-btn">+ Add Another Criteria</button>
                                            <button type="button" class="btn btn-danger" onclick="clearCriteriaFields()">Clear</button>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Total Percentage</label>
                                            <input type="number" class="form-control" id="total-percentage" readonly value="0">
                                        </div>

                                        {{-- Contest Type --}}
                                        <div class="mb-3">
                                            <label class="form-label" for="contest-category">Contest Category</label>
                                            <select class="form-control" id="contest-category" name="contest_category" required onchange="adminContestTypes()">
                                                <option value="" selected disabled>-- Select Contest Category --</option>
                                                <option value="Singing Contest">Singing Contest</option>
                                                <option value="Dance Contest">Dance Contest</option>
                                                <option value="Pageant">Pageant</option>
                                                <option value="Quiz Bee">Quiz Bee</option>
                                                <option value="Debate">Debate</option>
                                                <option value="Mr. & Ms. Contest">Mr. & Ms. Contest</option>
                                                <option value="Talent Show">Talent Show</option>
                                                <option value="Battle of the Bands">Battle of the Bands</option>
                                                <option value="Spoken Word / Poetry">Spoken Word / Poetry</option>
                                                <option value="Essay Writing">Essay Writing</option>
                                                <option value="Poster Making">Poster Making</option>
                                                <option value="Drawing Contest">Drawing Contest</option>
                                                <option value="Photography Contest">Photography Contest</option>
                                                <option value="Cosplay Competition">Cosplay Competition</option>
                                                <option value="Modeling Contest">Modeling Contest</option>
                                                <option value="Cooking Contest">Cooking Contest</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="contest-type">Contest Type</label>
                                            <select class="form-control" id="contest-type" name="contest_type" required>
                                                <option value="" selected disabled>-- Select Contest Type --</option>
                                            </select>
                                        </div>



                                        <button type="submit" class="btn btn-primary">Save Criteria</button>
                                    </form>

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
                            <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">Jas<span
                                    class="fw-bold" style="color: #ff6347;">Coder</span></a>
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