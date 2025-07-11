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
          <span class="app-brand-text demo menu-text fw-bolder ms-2" style="text-transform:uppercase">slsu(BC)</span>
        </a>

        <!-- <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
          <i class="bx bx-chevron-left bx-sm d-flex align-items-center justify-content-center"></i>
        </a> -->
      </div>

      <div class="menu-inner-shadow"></div>

      <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item active">
          <a href="" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="Analytics">Dashboard</div>
          </a>
        </li>

        <!-- Layouts -->

        <li class="menu-item">
          <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon fa-solid fa-circle-user"></i>
            <div data-i18n="Layouts">Judging Panel</div>
          </a>

          <ul class="menu-sub">
            <li class="menu-item">
              <a href="{{route('judges.participants.vote')  }}" class="menu-link">
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
                        <span class="fw-semibold d-block">{{Auth::user()->name}}</span>
                        <small class="text-muted"> {{ auth()->guard('judges')->check() ? 'Judge' : 'Guest' }}</small>
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
          <div class="container">
            <div class="row">
              <div class="col-md-4 pt-3">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">TOTAL NUMBERS OF CONTESTANT</h5>
                    <p class="card-text">Here the <span class="fw-bold" style="color: #ff6347;">total</span> appointments</p>
                    <div style="display: flex; justify-content: center; align-items: center; height:13rem;">
                      <strong style="font-size:8.5rem; text-align:center;"></strong>
                    </div>

                  </div>
                </div>
              </div>

              <!-- <div class="col-md-4 pt-3">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">TOTAL NUMBERS OF PENDING CONTESTANT</h5>
                    <p class="card-text">Here the <span class="fw-bold" style="color: #ff6347;">total</span> pending</p>
                    <div style="display: flex; justify-content: center; align-items: center; height:13rem;">
                      <strong style="font-size:8.5rem; text-align:center;"></strong>
                    </div>
                  </div>
                </div>
              </div> -->

              <!-- <div class="col-md-4 pt-3">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">TOTAL NUMBERS OF CONFIRMED CONTESTANT</h5>
                    <p class="card-text">Here the <span class="fw-bold" style="color: #ff6347;">total</span> confirmed</p>
                    <div style="display: flex; justify-content: center; align-items: center; height:13rem;">
                      <strong style="font-size:8.5rem; text-align:center;"></strong>
                    </div>
                  </div>
                </div>
              </div> -->

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