@extends('layouts.app')

@php
use App\Models\logs;
@endphp

@section('content')
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
            <div class="app-brand demo">
                <a href="{{ route('admin.dashboard') }}" class="app-brand-link">
                    <span class="app-brand-logo demo"></span>
                    <img src="{{asset('storage/images/slsu2.png')}}" alt="" style="width: 50px;">
                    <span class="app-brand-text demo menu-text fw-bolder ms-2"
                        style="text-transform:uppercase">SLSU (BC)</span>
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

                <li class="menu-item {{ $ActiveTab === 'events' ? 'active' : '' }}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon fas fa-calendar-check"></i>
                        <div data-i18n="Layouts">Events & Criteria</div>
                    </a>

                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="{{route('admin.events.events')}}" class="menu-link">
                                <div data-i18n="Without menu">Create Events</div>
                            </a>
                        </li>
                        <li class="menu-item {{$SubActiveTab === 'view Events' ? 'active' : ''}}">
                            <a href="" class="menu-link">
                                <div data-i18n="Without navbar">View Events</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('admin.criteria.index') }}" class="menu-link">
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
                                <div data-i18n="Without navbar">Add Judges</div>
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

            <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                id="layout-navbar">
                <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                        <i class="bx bx-menu bx-sm"></i>
                    </a>
                </div>

                <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                    <ul class="navbar-nav flex-row align-items-center ms-auto">
                        <!-- Place this tag where you want the button to render. -->
                        <!--  -->
                        <!-- User -->
                        <li class="nav-item navbar-dropdown dropdown-user dropdown">
                            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                data-bs-toggle="dropdown">
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
                                                <span class="fw-semibold d-block">{{ Auth::user()->name }}</span>
                                                <small class="text-muted">
                                                    {{ auth()->user()->role === 'admin' ? 'Admin' : 'User' }}</small>
                                            </div>

                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('admin.accounts.index') }}">
                                        <i class="bx bx-user me-2"></i>
                                        <span class="align-middle">My Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('admin.settings.view') }}">
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
                    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Events /</span>History</h4>

                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="mb-0">Events History</h5>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive text-nowrap">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Events Name</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>End Time</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $counter = ($events->currentPage() - 1) * $events->perPage() + 1; @endphp
                                        @foreach($events as $event)
                                        <tr>
                                            <td>{{ $counter++ }}</td>
                                            <td>{{ $event->eventsName }}</td>
                                            <td>{{ \Carbon\Carbon::parse($event->date)->setTimezone(config('app.timezone'))->format('Y-m-d') }}
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($event->time)->setTimezone(config('app.timezone'))->format('h:i A') }}
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($event->endtime)->setTimezone(config('app.timezone'))->format('h:i A') }}
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editEventModal{{ $event->id }}">
                                                    <i class="fa fa-edit text-white"></i>
                                                </button>

                                                <!-- Edit Event Modal -->
                                                <div class="modal fade" id="editEventModal{{ $event->id }}" tabindex="-1" aria-labelledby="editEventModalLabel{{ $event->id }}" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="{{ route('admin.events.update', $event->id) }}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="editEventModalLabel{{ $event->id }}">Edit Event</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="mb-3">
                                                                        <label for="eventsName{{ $event->id }}" class="form-label">Event Name</label>
                                                                        <input type="text" class="form-control" id="eventsName{{ $event->id }}" name="eventsName" value="{{ $event->eventsName }}" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="date{{ $event->id }}" class="form-label">Date</label>
                                                                        <input type="date" class="form-control" id="date{{ $event->id }}" name="date" value="{{ $event->date }}" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="time{{ $event->id }}" class="form-label">Start Time</label>
                                                                        <input type="time" class="form-control" id="time{{ $event->id }}" name="time" value="{{ \Carbon\Carbon::parse($event->time)->format('H:i') }}" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="endtime{{ $event->id }}" class="form-label">End Time</label>
                                                                        <input type="time" class="form-control" id="endtime{{ $event->id }}" name="endtime" value="{{ \Carbon\Carbon::parse($event->endtime)->format('H:i') }}" required>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Delete Button -->
                                                <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>

                                        </tr>
                                        @endforeach

                                        @if($events->isEmpty())
                                        <tr>
                                            <td colspan="6" class="text-center text-muted">No events found.</td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>


                            <!-- Pagination Links -->
                            <div class="d-flex justify-content-center mt-3">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination pagination-m"> <!-- Added pagination-sm to make it smaller -->
                                        {{-- Previous Page Link --}}
                                        @if ($events->onFirstPage())
                                        <li class="page-item disabled">
                                            <span class="page-link">Previous</span>
                                        </li>
                                        @else
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $events->previousPageUrl() }}">Previous</a>
                                        </li>
                                        @endif

                                        {{-- Page Number Links --}}
                                        @foreach ($events->links()->elements[0] as $page => $url)
                                        <li class="page-item {{ $events->currentPage() == $page ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                        </li>
                                        @endforeach

                                        {{-- Next Page Link --}}
                                        @if ($events->hasMorePages())
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $events->nextPageUrl() }}">Next</a>
                                        </li>
                                        @else
                                        <li class="page-item disabled">
                                            <span class="page-link">Next</span>
                                        </li>
                                        @endif
                                    </ul>
                                </nav>
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
                        <a href="https://themeselection.com/license/" class="footer-link me-4"
                            target="_blank">License</a>
                        <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">Contuct Us</a>

                        <a href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
                            target="_blank" class="footer-link me-4">Documentation</a>

                        <a href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
                            target="_blank" class="footer-link me-4">Support</a>
                    </div>
                </div>
            </footer>
            <!-- / Footer -->
        </div>
        <!-- / Content wrapper -->
    </div>
    <!-- / Layout container -->
</div>
</div>

{{-- Modal for Success Message --}}
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered"> <!-- Added modal-dialog-centered to center the modal -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Success</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if(session('success'))
                {{ session('success') }}
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection
@if(session('success'))
<script>
    // Ensure that the script runs after the page has finished loading
    document.addEventListener('DOMContentLoaded', function() {
        // Show the modal after a successful deletion
        var successModal = new bootstrap.Modal(document.getElementById('successModal'), {
            keyboard: false
        });
        successModal.show();
    });
</script>
@endif