<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Judging System | Features</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('storage/images/slsu2.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', sans-serif;
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
        }

        .features-section {
            padding: 60px 15px;
            background-color: #fff;
        }

        .feature-box {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 30px 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s;
            height: 100%;
        }

        .feature-box:hover {
            transform: translateY(-5px);
        }

        .feature-icon {
            font-size: 2.2rem;
            margin-bottom: 15px;
        }

        footer {
            text-align: center;
            padding: 20px;
            font-size: 0.9rem;
            background: #f1f1f1;
            color: #555;
        }
    </style>
</head>

<body>

    {{-- Responsive Navbar with Auth --}}
    @if (Route::has('login'))
    <nav class="navbar navbar-expand-lg navbar-light shadow-sm" style="background: rgba(255,255,255,0.85); backdrop-filter: blur(8px); border-radius: 0 0 18px 18px;">
        <div class="container">
            <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="#">
                <img src="{{ asset('storage/images/slsu2.png') }}" alt="Logo" style="width: 40px; min-width: 30px;">
                <span class="d-none d-sm-inline">Judging System (Bontoc Campus)</span>
                <span class="d-inline d-sm-none">Judging System (BC)</span>
            </a>

            {{-- Toggle button for mobile --}}
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain"
                aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            {{-- Collapsible links --}}
            <div class="collapse navbar-collapse" id="navbarMain">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    {{-- Public navigation --}}
                    <li class="nav-item">
                        <a class="nav-link fw-semibold" href="#">
                            <i class="bi bi-house-door-fill me-1"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold" href="{{route('vote')}}">
                            <i class="bi bi-bar-chart me-1"></i> Live Vote
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link fw-semibold active" href="{{ route('features')}}">
                            <i class="bi bi-stars me-1"></i> Features
                        </a>
                    </li>
                    {{-- Optional Dropdown --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle fw-semibold" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="bi bi-three-dots"></i> More
                        </a>
                        <ul class="dropdown-menu rounded-3 shadow">
                            <li><a class="dropdown-item" href="{{ route('about') }}"><i class="bi bi-info-circle me-1"></i> About</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-life-preserver me-1"></i> Support</a></li>
                        </ul>
                    </li>
                </ul>

                {{-- Auth Buttons --}}
                <ul class="navbar-nav mb-2 mb-lg-0 gap-2">
                    @auth
                    <li class="nav-item">
                        <a href="{{ url('/home') }}" class="btn btn-outline-primary btn-sm px-3 rounded-pill">
                            <i class="bi bi-speedometer2 me-1"></i> Dashboard
                        </a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="btn btn-outline-secondary btn-sm px-3 rounded-pill">Login</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="btn btn-primary btn-sm px-3 rounded-pill">Register</a>
                    </li>
                    @endif
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    @endif

    <main>
        {{-- Features Section --}}
        <section id="features" class="features-section text-center">
            <div class="container">
                <h2 class="mb-4 fw-bold display-6">
                    <i class="bi bi-stars text-primary me-2"></i>
                    Why Choose Our System?
                </h2>
                <p class="mb-5 text-muted fs-5">Simplify your event's judging process with these key features</p>
                <div class="row g-4">
                    <div class="col-12 col-md-6 col-lg-4 d-flex">
                        <div class="feature-box w-100 shadow-lg border-0 bg-white h-100 p-4">
                            <div class="feature-icon mb-3">
                                <span class="rounded-circle bg-primary bg-opacity-10 d-inline-flex align-items-center justify-content-center" style="width:60px; height:60px;">
                                    <i class="bi bi-bullseye text-primary fs-2"></i>
                                </span>
                            </div>
                            <h5 class="fw-semibold">Criteria-Based Scoring</h5>
                            <p class="text-muted">Customizable judging criteria with weighted scoring and real-time computation.</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 d-flex">
                        <div class="feature-box w-100 shadow-lg border-0 bg-white h-100 p-4">
                            <div class="feature-icon mb-3">
                                <span class="rounded-circle bg-success bg-opacity-10 d-inline-flex align-items-center justify-content-center" style="width:60px; height:60px;">
                                    <i class="bi bi-person-badge-fill text-success fs-2"></i>
                                </span>
                            </div>
                            <h5 class="fw-semibold">Judge Management</h5>
                            <p class="text-muted">Add, assign, and monitor judges per category or contest with easy role control.</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 d-flex mx-auto">
                        <div class="feature-box w-100 shadow-lg border-0 bg-white h-100 p-4">
                            <div class="feature-icon mb-3">
                                <span class="rounded-circle bg-info bg-opacity-10 d-inline-flex align-items-center justify-content-center" style="width:60px; height:60px;">
                                    <i class="bi bi-bar-chart-fill text-info fs-2"></i>
                                </span>
                            </div>
                            <h5 class="fw-semibold">Live Results & Analytics</h5>
                            <p class="text-muted">Track scores and generate reports instantly with visual breakdowns and insights.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        &copy; {{ date('Y') }} Judging System. Built with ❤️ using Laravel & Bootstrap.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>