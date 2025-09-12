<!-- resources/views/layouts/admin.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2c5aa0;
            --sidebar-width: 260px;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
        
        .sidebar {
            width: var(--sidebar-width);
            min-height: 100vh;
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(10px);
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            box-shadow: 0 0 30px rgba(0,0,0,0.1);
        }
        
        .main-content {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
        }
        
        .nav-link {
            color: #333;
            padding: 12px 20px;
            margin: 5px 15px;
            border-radius: 10px;
            transition: all 0.3s ease;
        }
        
        .nav-link:hover, .nav-link.active {
            background: var(--primary-color);
            color: white;
            transform: translateX(5px);
        }
        
        .card {
            border: none;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            border-radius: 15px;
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(10px);
        }
        
        .bg-gradient-primary { background: linear-gradient(45deg, #007bff, #0056b3); }
        .bg-gradient-success { background: linear-gradient(45deg, #28a745, #1e7e34); }
        .bg-gradient-warning { background: linear-gradient(45deg, #ffc107, #e0a800); }
        .bg-gradient-info { background: linear-gradient(45deg, #17a2b8, #138496); }
        
        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }
        
        .status-pending { background-color: #fff3cd; color: #856404; }
        .status-diproses { background-color: #d1ecf1; color: #0c5460; }
        .status-selesai { background-color: #d4edda; color: #155724; }
        .status-ditolak { background-color: #f8d7da; color: #721c24; }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="p-4 border-bottom">
            <h4 class="text-primary mb-0">
                <i class="fas fa-certificate me-2"></i>
                Admin TTE
            </h4>
            <small class="text-muted">Kabupaten Sumbawa</small>
        </div>
        <nav class="nav flex-column py-3">
            <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" 
               href="{{ route('admin.dashboard') }}">
                <i class="fas fa-tachometer-alt me-2"></i>
                Dashboard
            </a>
            <a class="nav-link {{ request()->routeIs('admin.permohonan') ? 'active' : '' }}" 
               href="{{ route('admin.permohonan') }}">
                <i class="fas fa-file-alt me-2"></i>
                Data Permohonan
            </a>
            <hr class="mx-3">
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="nav-link border-0 bg-transparent w-100 text-start">
                    <i class="fas fa-sign-out-alt me-2"></i>
                    Logout
                </button>
            </form>
        </nav>
    </div>

    <div class="main-content">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
