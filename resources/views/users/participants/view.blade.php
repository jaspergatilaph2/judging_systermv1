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
                    <a href="{{route('users.dashboard')}}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-home-circle"></i>
                        <div data-i18n="Analytics">Dashboard</div>
                    </a>
                </li>

                <!-- Layouts -->

                <li class="menu-item {{$ActiveTab === 'view' ? 'active' : ''}}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon fa-solid fa-circle-user"></i>
                        <div data-i18n="Layouts">Participants</div>
                    </a>

                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="{{route('users.participants.participants')}}" class="menu-link">
                                <div data-i18n="Without menu">Participate or Join
                                </div>
                            </a>
                        </li>
                        <li class="menu-item {{ $SubActiveTab === 'entries review' ? 'active' : ''}}">
                            <a href="" class="menu-link">
                                <div data-i18n="Without menu">Entries Overview
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
                            <a href="{{route('users.accounts.accounts')}}" class="menu-link">
                                <div data-i18n="Account">Account</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="" class="menu-link">
                                <div data-i18n="Notifications">Settings</div>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a href="{{route('users.accounts.editProfile')}}" class="menu-link">
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
                            <!-- Search Puporse -->
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
                                                <span class="fw-semibold d-block">{{ optional(Auth::user())->name }}</span>
                                                <small class="text-muted">Admin</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{route('users.accounts.accounts')}}">
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
                    <!-- Create a table -->
                    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Participants/</span>Show List Participants</h4>
                    <div class="card">
                        <h5 class="card-header">Participants</h5>
                        <div class="card-body">
                            <div class="table-responsive text-nowrap">
                                @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                                @endif
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Student's ID</th>
                                            <th>Student Name</th>
                                            <th>Contest Type</th>
                                            <th>Contest Category</th>
                                            <th>Group Or Team</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($participants as $participant)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $participant->student_id }}</td>
                                            <td>{{ $participant->student_name }}</td>
                                            <td>{{ $participant->contest_type }}</td>
                                            <td>{{ $participant->contest_category }}</td>
                                            <td>
                                                @if(in_array($participant->contest_type, ['Solo', 'Individual']))
                                                N/A
                                                @else
                                                {{ $participant->group_team ?? 'N/A' }}
                                                @endif
                                            </td>
                                            <td>
                                                <!-- Edit Button triggers modal -->
                                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editModal{{ $participant->id }}">
                                                    <i class="fa fa-user-edit"></i>
                                                </button>

                                                <!-- Edit Modal for each judge -->
                                                <div class="modal fade" id="editModal{{ $participant->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $participant->id }}" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form method="POST" action="{{ route('users.participants.update', $participant->id) }}" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="editModalLabel{{ $participant->id }}">Edit Participants</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Student ID</label>
                                                                        <input type="text" class="form-control" name="student_id" value="{{ $participant->student_id }}" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Student Name</label>
                                                                        <input type="text" class="form-control" name="student_name" value="{{ $participant->student_name }}">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="contest-category-{{ $participant->id }}">Contest Category</label>
                                                                        <select class="form-control" id="contest-category-{{ $participant->id }}" name="contest_category" required onchange="ContestTypes({{ $participant->id }})">
                                                                            <option value="" disabled>-- Select Contest Category --</option>
                                                                            @php
                                                                            $categories = [
                                                                            "Singing Contest", "Dance Contest", "Pageant", "Quiz Bee", "Debate", "Mr. & Ms. Contest",
                                                                            "Talent Show", "Battle of the Bands", "Spoken Word / Poetry", "Essay Writing", "Poster Making",
                                                                            "Drawing Contest", "Photography Contest", "Cosplay Competition", "Modeling Contest", "Cooking Contest"
                                                                            ];
                                                                            @endphp
                                                                            @foreach ($categories as $category)
                                                                            <option value="{{ $category }}" {{ $participant->contest_category === $category ? 'selected' : '' }}>
                                                                                {{ $category }}
                                                                            </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="contest-type-{{ $participant->id }}">Contest Type</label>
                                                                        <select class="form-control" id="contest-type-{{ $participant->id }}" name="contest_type" required>
                                                                            <option value="" disabled>-- Select Contest Type --</option>
                                                                            <option value="{{ $participant->contest_type }}" selected>{{ $participant->contest_type }}</option>
                                                                        </select>
                                                                    </div>

                                                                    <div id="group-name-container-{{ $participant->id }}" class="mb-3"></div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <form action="{{ route('users.participants.destroy', $participant->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>

                                        <!-- Modal for each judge -->
                                        <div class="modal fade" id="viewModal{{ $participant->id }}" tabindex="-1"
                                            aria-labelledby="viewModalLabel{{ $participant->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="viewModalLabel{{ $participant->id }}">Judge Details</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p><strong>Name:</strong>
                                                        <div class="event-message-box p-2 border rounded">
                                                            {{ $participant->name }}
                                                        </div>
                                                        </p>
                                                        <p><strong>Organization:</strong>
                                                        <div class="event-message-box p-2 border rounded">
                                                            {{ $participant->organization }}
                                                        </div>
                                                        </p>
                                                        <p><strong>Email:</strong>
                                                        <div class="event-message-box p-2 border rounded">
                                                            {{ $participant->email }}
                                                        </div>
                                                        </p>
                                                        <p><strong>Phone:</strong>
                                                        <div class="event-message-box p-2 border rounded">
                                                            {{ $participant->phone }}
                                                        </div>
                                                        </p>
                                                        <p><strong>Password:</strong>
                                                        <div class="event-message-box p-2 border rounded">
                                                            {{ $participant->password }}
                                                        </div>
                                                        </p>
                                                        <img src="{{ asset('storage/' . $participant->image) }}" alt="Judge Image" class="img-fluid" style="border-radius: 10%;">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </tbody>
                                </table>
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
                        <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">Jas<span class="fw-bold"
                                style="color: #ff6347;">Coder</span></a>
                    </div>
                    <div>
                        <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
                        <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">Contuct Us</a>

                        <a href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/" target="_blank"
                            class="footer-link me-4">Documentation</a>

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