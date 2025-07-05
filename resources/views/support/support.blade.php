<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Judging System | Support</title>
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
    @if (Route::has('login'))
    <nav class="navbar navbar-expand-lg navbar-light shadow-sm"
        style="background: rgba(255,255,255,0.85); backdrop-filter: blur(8px); border-radius: 0 0 18px 18px;">
        <div class="container">
            {{-- Brand Logo --}}
            <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="{{ url('/') }}">
                {{-- Logo --}}
                <img src="{{ asset('storage/images/slsu2.png') }}" alt="Logo" style="width: 40px; min-width: 30px;">
                <span class="d-none d-sm-inline">Judging System (Bontoc Campus)</span>
                <span class="d-inline d-sm-none">Judging System (BC)</span>
            </a>

            {{-- Toggler for Mobile --}}
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain"
                aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            {{-- Collapsible Menu --}}
            <div class="collapse navbar-collapse" id="navbarMain">
                {{-- Left Links --}}
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link fw-semibold" href="{{ url('/') }}"><i class="bi bi-house-door-fill me-1"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold" href="{{route('vote')}}">
                            <i class="bi bi-bar-chart me-1"></i> Live Vote
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold" href="{{ route('features') }}"><i class="bi bi-stars me-1"></i> Features</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle fw-semibold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots"></i> More
                        </a>
                        <ul class="dropdown-menu rounded-3 shadow">
                            <li><a class="dropdown-item" href="{{ route('about') }}"><i class="bi bi-info-circle me-1"></i> About</a></li>
                            <li><a class="dropdown-item active" href="#"><i class="bi bi-life-preserver me-1"></i> Support</a></li>
                        </ul>
                    </li>
                </ul>

                {{-- Right Auth Buttons --}}
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

    {{-- Main Content --}}
    <main>
        {{-- About Section --}}
        <section id="about" class="about-section">

        </section>

        {{-- Support Section --}}
        <section id="support" class="bg-light support-section">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-8">
                        <div class="card shadow-lg border-0 rounded-4">
                            <div class="card-body p-5 text-center">
                                <div class="mb-4">
                                    <i class="bi bi-life-preserver display-4 text-primary"></i>
                                </div>
                                <h2 class="fw-bold mb-3">Need Help? We're Here for You!</h2>
                                <p class="lead text-muted mb-4">
                                    If you have questions, encounter issues, or need assistance with the Judging System, our support team is ready to help. Reach out to us and we'll respond as soon as possible.
                                </p>
                                <a href="mailto:support@slsu.edu.ph" class="btn btn-primary btn-lg rounded-pill px-4">
                                    <i class="bi bi-envelope-fill me-2"></i>Contact Support
                                </a>
                                <div class="mt-4">
                                    <small class="text-muted">
                                        You can also visit our <a href="#" class="link-primary">FAQ page</a> for quick answers.
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    {{-- Footer --}}
    <footer>
        &copy; {{ date('Y') }} Judging System. Built with ❤️ using Laravel & Bootstrap.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>