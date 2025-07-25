@extends('layouts.app')

@section('content')
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
            <div class="app-brand demo">
                <a href="{{ route('judges.dashboard') }}" class="app-brand-link">
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
                    <a href="{{ route('judges.dashboard') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-home-circle"></i>
                        <div data-i18n="Analytics">Dashboard</div>
                    </a>
                </li>

                <!-- Layouts -->

                <li class="menu-item {{ $ActiveTab === 'view' ? 'active' : '' }}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon fa-solid fa-circle-user"></i>
                        <div data-i18n="Layouts">Judging Panel</div>
                    </a>

                    <ul class="menu-sub">
                        <li class="menu-item {{ $SubActiveTab === 'judges' ? 'active' : '' }}">
                            <a href="" class="menu-link">
                                <div data-i18n="Without menu">Participant
                                </div>
                            </a>
                        </li>

                    </ul>
                </li>

                <!-- <li class="menu-item">
          <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon fas fa-calendar-check"></i>
            <div data-i18n="Layouts">Events</div>
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
          </ul>
        </li> -->
                <!-- <li class="menu-item">
          <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon fa-solid fa-gavel"></i>
            <div data-i18n="Layouts">Adding Judges</div>
          </a>

          <ul class="menu-sub">
            <li class="menu-item">
              <a href="" class="menu-link">
                <div data-i18n="Without navbar">Judges</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="" class="menu-link">
                <div data-i18n="Without navbar">View Judges</div>
              </a>
            </li>
          </ul>
        </li> -->



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
                            <a href="{{route('judges.accounts.AccountsIndex')}}" class="menu-link">
                                <div data-i18n="Account">Account</div>
                            </a>
                        </li>

                        <!-- <li class="menu-item">
              <a href="" class="menu-link">
                <div data-i18n="Notifications">Update Account</div>
              </a>
            </li> -->
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
                                    <img src="{{ asset('storage/' . auth()->guard('judges')->user()->image) }}" alt
                                        class="w-px-120 h-px-120 rounded-circle" />
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar avatar-online">
                                                    <img src="{{ asset('storage/' . auth()->guard('judges')->user()->image) }}" alt
                                                        class="w-px-120 h-px-120 rounded-circle" />
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <span class="fw-semibold d-block">{{ optional(Auth::user())->name }}
                                                </span>
                                                <small class="text-muted">{{ auth()->guard('judges')->check() ? 'Judge' : 'Guest' }}</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{route('judges.accounts.AccountsIndex')}}">
                                        <i class="bx bx-user me-2"></i>
                                        <span class="align-middle">My Profile</span>
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
                    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Votes/</span> Or Judge</h4>

                    <!-- Basic Layout -->
                    <div class="row">
                        <div class="col-xl">
                            <div class="card mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">Judge Participant</h5>
                                    <small class="text-muted float-end">Scoring Form</small>
                                </div>
                                <div class="card-body">
                                    {{-- Display validation errors --}}
                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif

                                    {{-- Success message --}}
                                    @if(session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                    @endif

                                    {{-- Total score info --}}
                                    @if(session('totalScore'))
                                    <div class="alert alert-info">
                                        <strong>Total Score:</strong> {{ session('totalScore') }}
                                    </div>
                                    @endif

                                    {{-- Percentage info --}}
                                    @if(session('scorePercent'))
                                    <div class="alert alert-info">
                                        <strong>Percentage:</strong> {{ session('scorePercent') }}%
                                    </div>
                                    @endif

                                    {{-- Category selection --}}
                                    <form method="GET" action="{{ route('judges.participants.scoreForm') }}">
                                        <div class="mb-3">
                                            <label class="form-label" for="contest_category">Select Contest Category</label>
                                            <select name="contest_category" id="contest_category" class="form-select" onchange="this.form.submit()" required>
                                                <option value="" disabled {{ request('contest_category') ? '' : 'selected' }}>Choose Category...</option>
                                                @foreach($contestCategories as $category)
                                                <option value="{{ $category }}" {{ request('contest_category') == $category ? 'selected' : '' }}>
                                                    {{ $category }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </form>

                                    {{-- Participant selection (only if category is selected and has participants) --}}
                                    @if(request('contest_category') && $participants->count())
                                    <form method="GET" action="{{ route('judges.participants.scoreForm') }}">
                                        <input type="hidden" name="contest_category" value="{{ request('contest_category') }}">
                                        <div class="mb-3">
                                            <label class="form-label">Select Participant</label>
                                            <select name="participant_id" class="form-select" onchange="this.form.submit()" required>
                                                <option value="" disabled {{ request('participant_id') ? '' : 'selected' }}>Choose Participant...</option>
                                                @foreach($participants as $participant)
                                                <option value="{{ $participant->id }}" {{ request('participant_id') == $participant->id ? 'selected' : '' }}>
                                                    {{ $participant->student_name }} ({{ $participant->contest_type }})
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </form>
                                    @endif

                                    {{-- Scoring form (only if a participant is selected) --}}
                                    @if($selectedParticipant)
                                    <form method="POST" action="{{ route('judges.participants.storeScore') }}">
                                        @csrf

                                        <input type="hidden" name="participant_id" value="{{ $selectedParticipant->id }}">

                                        <div class="mb-3">
                                            <label class="form-label">Contest Category</label>
                                            <input type="text" class="form-control" value="{{ $selectedParticipant->contest_category }}" readonly>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Contest Type</label>
                                            <input type="text" class="form-control" value="{{ $selectedParticipant->contest_type }}" readonly>
                                        </div>

                                        <hr>
                                        <h6 class="fw-bold">Criteria Scores:</h6>

                                        @foreach($criteria as $criterion)
                                        <div class="mb-3">
                                            <label class="form-label">{{ $criterion->name }} (Max: {{ $criterion->percentage }}%)</label>
                                            <input type="number"
                                                name="scores[{{ $criterion->id }}]"
                                                class="form-control"
                                                min="0"
                                                max="{{ $criterion->percentage }}"
                                                step="0.01"
                                                required>
                                        </div>
                                        @endforeach

                                        <button type="submit" class="btn btn-success">Submit Score</button>
                                    </form>
                                    @endif
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