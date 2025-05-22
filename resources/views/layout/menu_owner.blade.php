<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin - Car Showroom</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: #1d1e1e;
        }

        .navbar a {
            color: white !important;
            font-weight: bold;
        }

        footer {
            background: #1d1e1e;
            color: white;
            text-align: center;
            padding: 15px 0;
            margin-top: 50px;
        }

        .card img {
            height: 200px;
            object-fit: cover;
        }

        .text-primary {
            color: #1d1e1e !important;
        }

        .btn-primary {
            background-color: #1d1e1e !important;
            border-color: #1d1e1e !important;
        }

        .btn-primary:hover {
            background-color: #333 !important;
            border-color: #333 !important;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Admin - Car Showroom</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home_owner') }}">Manage Cars</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tambah_laporan') }}">Tambah Laporan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('booking') }}">Data Booking</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{ auth('owner')->user()->nama }}</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="nav-link">Log Out</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content_owner')

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Admin - Car Showroom. All Rights Reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        //message with sweetalert
        @if (session('success'))
            Swal.fire({
                icon: "success",
                title: "BERHASIL",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @elseif (session('error'))
            Swal.fire({
                icon: "error",
                title: "GAGAL!",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif
    </script>

</body>

</html>
