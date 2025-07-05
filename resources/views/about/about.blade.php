<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Judging System | About</title>
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

        .about-section {
            padding: 60px 15px;
            background-color: #fff;
        }

        .about-box {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 30px 25px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
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
            <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="{{ url('/') }}">
                {{-- Logo --}}
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
                        <a class="nav-link  fw-semibold" href="#">
                            <i class="bi bi-house-door-fill me-1"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold" href="{{route('vote')}}">
                            <i class="bi bi-bar-chart me-1"></i> Live Vote
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold" href="{{ route('features')}}">
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
                            <li><a class="dropdown-item active" href="{{ route('about') }}"><i class="bi bi-info-circle me-1"></i> About</a></li>
                            <li><a class="dropdown-item" href="{{route('support')}}"><i class="bi bi-life-preserver me-1"></i> Support</a></li>
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
        {{-- About Section --}}
        <section id="about" class="about-section">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-6 mb-4 mb-lg-0">
                        <div class="text-center">
                            <img src="{{ asset('storage/images/slsu2.png') }}" alt="Logo" class="img-fluid mb-3" style="max-width:110px;">
                        </div>
                        <div class="about-box shadow-lg border-0">
                            <h2 class="text-center mb-3">
                                <i class="bi bi-stars text-primary"></i>
                                About the Judging System
                            </h2>
                            <p class="lead text-center mb-4">
                                The Judging System is a web-based platform developed for managing competitions at <strong>Southern Leyte State University - Bontoc Campus</strong>.
                            </p>
                            <ul class="list-group list-group-flush mb-4">
                                <li class="list-group-item bg-transparent border-0">
                                    <i class="bi bi-gear-fill text-primary me-2"></i>
                                    Flexible judging criteria &amp; live scoring
                                </li>
                                <li class="list-group-item bg-transparent border-0">
                                    <i class="bi bi-bar-chart-fill text-success me-2"></i>
                                    Real-time analytics &amp; reporting
                                </li>
                                <li class="list-group-item bg-transparent border-0">
                                    <i class="bi bi-people-fill text-warning me-2"></i>
                                    User-friendly for admins, judges, and participants
                                </li>
                                <li class="list-group-item bg-transparent border-0">
                                    <i class="bi bi-shield-check text-info me-2"></i>
                                    Transparent, accurate, and fair evaluations
                                </li>
                            </ul>
                            <p>
                                With its intuitive design and efficient management tools, the platform adapts to any event—solo or group, academic or cultural.
                            </p>
                            <div class="d-flex justify-content-center align-items-center gap-2 mt-3">
                                <span class="badge bg-danger">Laravel</span>
                                <span class="badge bg-primary">Bootstrap</span>
                                <span class="badge bg-dark">Modern Web</span>
                            </div>
                            <p class="text-center mt-4">
                                <strong>Contact Us:</strong> <br>
                                <a href="mailto:support@slsu.edu.ph" class="link-primary text-decoration-none">
                                    <i class="bi bi-envelope-fill me-1"></i>support@slsu.edu.ph
                                </a>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 d-none d-lg-block">
                        <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=600&q=80"
                            alt="Judging Illustration" class="img-fluid rounded-4 shadow-lg" style="object-fit:cover; height: 100%;">
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