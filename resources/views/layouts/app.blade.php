<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Educational Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #74ebd5 0%, #9face6 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .navbar {
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        .navbar-brand {
            font-weight: bold;
            font-size: 1.3rem;
        }
        .nav-link {
            transition: all 0.2s ease-in-out;
        }
        .nav-link:hover {
            color: #74ebd5 !important;
        }
        .container {
            flex: 1;
        }
        footer {
            background: #212529;
            color: #ccc;
            text-align: center;
            padding: 15px 0;
            margin-top: auto;
            font-size: 0.9rem;
        }
        .alert {
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
        }
    </style>
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">🎓 EDUCATION MANAGEMENT</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-lg-center nav-custom">
                @if(Auth::guard('student')->check())
                    <li class="nav-item">
                        <span class="nav-link fw-bold text-light">👋 WELCOME, {{ Auth::guard('student')->user()->first_name }}</span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('student.dashboard') }}">📚 DASHBOARD</a>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('student.logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link">🚪 LOGOUT</button>
                        </form>
                    </li>
                @elseif(Auth::guard('admin')->check())
                    <li class="nav-item">
                        <span class="nav-link fw-bold text-light">👋 Welcome, Admin</span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">📊 Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.classes') }}">🏫 Classes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.students') }}">👥 Students</a>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('admin.logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link">🚪 Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('student.login') }}">👨‍🎓 Student Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('student.register.form') }}">📝 Student Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.login') }}">🛡️ Admin Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.register.form') }}">📝 Admin Register</a>
                    </li>
                @endif
            </ul>
        </div>

    </div>
</nav>

<!-- Content -->
<div class="container mt-4">
    @if(session('success'))
        <div class="alert alert-success">
            ✅ {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            ❌ {{ session('error') }}
        </div>
    @endif

    @yield('content')
</div>

<!-- Footer -->
{{--<footer>--}}
{{--    <div class="container">--}}
{{--        <p>© {{ date('Y') }} Educational Management System | Built with E-Class</p>--}}
{{--    </div>--}}
{{--</footer>--}}

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
<style>
    .navbar {
        background: linear-gradient(135deg, #007bff 0%, #6610f2 100%);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.25);
    }

    .nav-custom .nav-link {
        color: #f8f9fa !important;
        font-weight: 500;
        margin: 0 8px;
        border-radius: 20px;
        padding: 8px 16px;
        transition: all 0.3s ease-in-out;
    }

    .nav-custom .nav-link:hover {
        background-color: rgba(255, 255, 255, 0.15);
        color: #fff !important;
        transform: translateY(-2px);
    }

    .nav-custom .btn-link {
        border: none;
        padding: 8px 16px;
        color: #f8f9fa !important;
    }

    .nav-custom .btn-link:hover {
        background-color: rgba(255, 255, 255, 0.15);
        color: #fff !important;
    }

    .navbar-brand {
        font-weight: bold;
        font-size: 1.3rem;
        letter-spacing: 0.5px;
    }
</style>

</html>
