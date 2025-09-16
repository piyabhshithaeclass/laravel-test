<!-- File: resources/views/layouts/education.blade.php -->
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'My Academy')</title>

    <!-- Bootstrap CSS v5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root{ --brand:#0d6efd; --accent:#6610f2; }
        body{ font-family: 'Inter', system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial; background:#f7f9fc; }
        .navbar-brand{ font-weight:700; letter-spacing:0.2px; }
        .hero{ background: linear-gradient(120deg, rgba(13,110,253,0.08), rgba(102,16,242,0.04)); border-radius:18px; padding:60px 30px; }
        .feature-card{ border:0; border-radius:12px; box-shadow:0 8px 30px rgba(15,23,42,0.06); }
        .btn-lg-pill{ padding:.75rem 1.25rem; border-radius:999px; }
        .login-btns .btn{ min-width:150px; }
        footer{ font-size:.9rem; color:#6b7280; }
    </style>
</head>
<body>

<!-- Header / Navbar -->
<header class="mb-4">
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <div class="me-2" style="width:40px;height:40px;border-radius:8px;background:linear-gradient(45deg,var(--brand),var(--accent));display:flex;align-items:center;justify-content:center;color:white;font-weight:700;">A</div>
                <div>
                    <div>Academy</div>
                    <small class="text-muted">Learning for tomorrow</small>
                </div>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center">
                    <li class="nav-item"><a class="nav-link" href="#courses">Courses</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                    <li class="nav-item ms-3 login-btns d-flex gap-2">
                        <!-- Student Login button (header) -->
                        <a href="{{ route('student.login') }}" class="btn btn-primary btn-sm btn-lg-pill">Student Login</a>
                        <!-- Admin Login button (header) -->
                        <a href="{{ route('admin.login') }}" class="btn btn-outline-secondary btn-sm btn-lg-pill">Admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<!-- Main content wrapper -->
<main class="container">

    <!-- Hero section with matching buttons in body -->
    <section class="hero mb-5">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <h1 class="display-5 fw-bold">Learn. Grow. Succeed.</h1>
                <p class="lead text-muted">Join thousands of learners — modern courses, expert instructors, and a learning platform built for real progress.</p>

                <div class="d-flex gap-3 mt-4">
                    <!-- Student Login button (body) -->
                    <a href="{{ route('student.login') }}" class="btn btn-primary btn-lg btn-lg-pill shadow">Student Login</a>
                    <!-- Admin Login button (body) -->
                    <a href="{{ route('admin.login') }}" class="btn btn-outline-secondary btn-lg btn-lg-pill">Admin Login</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Yield page-specific content -->
    @yield('content')

    <!-- Example feature row -->
    <section id="courses" class="my-5">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="p-4 feature-card">
                    <h5>Interactive Courses</h5>
                    <p class="text-muted">Project-based lessons designed to build real skills, with checkpoints and assessments.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 feature-card">
                    <h5>Experienced Mentors</h5>
                    <p class="text-muted">Get guidance from instructors who've worked at top companies across the industry.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 feature-card">
                    <h5>Certifications</h5>
                    <p class="text-muted">Earn certificates that you can share on LinkedIn or your resume.</p>
                </div>
            </div>
        </div>
    </section>

</main>

<!-- Footer -->
<footer class="mt-5 py-4 bg-white border-top">
    <div class="container d-flex justify-content-between align-items-center">
        <div>
            <strong>Academy</strong>
            <div class="text-muted">© {{ date('Y') }} Academy. All rights reserved.</div>
        </div>

    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>



<!-- File: resources/views/home.blade.php -->

@section('title','Home - Academy')

@section('content')
    <section class="my-5">
        <div class="row">
            <div class="col-lg-6">
                <h3>Welcome to Academy</h3>
                <p class="text-muted">Explore our catalog or sign in to your student dashboard. If you're an administrator, use the admin login to manage courses and users.</p>
                <div class="mt-3 d-flex gap-2">
                    <a href="{{ route('student.login') }}" class="btn btn-primary btn-lg-pill">Student Login</a>
                    <a href="{{ route('admin.login') }}" class="btn btn-outline-secondary btn-lg-pill">Admin</a>
                </div>
            </div>
            <div class="col-lg-6">
                <!-- Placeholder for announcements or featured courses -->
                <div class="p-4 feature-card">
                    <h5>Latest announcement</h5>
                    <p class="text-muted mb-0">New courses on Web Development launching next week — enroll now to get an early-bird discount.</p>
                </div>
            </div>
        </div>
    </section>
@endsection
