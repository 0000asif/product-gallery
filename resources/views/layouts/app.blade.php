<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Product Gallery Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" />

    <meta name="csrf-token" content="{{ csrf_token() }}">


    @stack('css')
    <style>
        .sidebar {
            background: linear-gradient(180deg, #1f1f1f, #2c2c2c);
        }

        .sidebar .nav-link {
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .sidebar .nav-link:hover {
            background-color: #0d6efd;
            color: #fff;
            padding-left: 12px;
        }

        .sidebar .nav-link.active {
            background-color: #0d6efd;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-flex flex-column bg-dark text-white sidebar min-vh-100 p-3">

                <div class="text-center mb-4">
                    <h5 class="mb-0">{{ auth()->user()->name }}</h5>
                    <small class="text-white">Admin Panel</small>
                </div>

                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item mb-2">
                        <a href="{{ route('dashboard') }}" class="nav-link text-white d-flex align-items-center">
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="{{ route('products.index') }}" class="nav-link text-white d-flex align-items-center">
                            Products
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="{{ route('profile.edit') }}" class="nav-link text-white d-flex align-items-center">
                            Profile Settings
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link text-white text-start p-0">
                                Logout
                            </button>
                        </form>
                    </li>
                </ul>


            </nav>

            <main class="col-md-10 p-4">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                @if (session('failed'))
                    <div class="alert alert-danger">{{ session('failed') }}</div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @stack('js')
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
</body>

</html>
