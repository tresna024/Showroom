<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up / Login Form</title>
    <link rel="stylesheet" href="{{ asset('login') }}/dist/style.css" />
    <!-- Pastikan file CSS ini ada di lokasi yang benar -->
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet" />
</head>

<body>
    <!-- Main Container for Form -->
    <div class="main">
        <input type="checkbox" id="chk" aria-hidden="true" />

        <!-- Sign Up Form -->
        <div class="signup">
            <form action="{{ route('register') }}" method="POST"> <!-- Ganti dengan rute registrasi Laravel -->
                @csrf
                <label for="chk" aria-hidden="true">Sign up</label>
                <input type="text" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap" required="" />
                <input type="email" name="email" id="email" placeholder="Email" required="" />
                <input type="text" name="alamat" id="alamat" placeholder="Alamat" required="" />
                <input type="text" name="no_hp" id="no_hp" placeholder="Telepon" required="" />
                <input type="text" name="username" id="username" placeholder="Username" required="" />
                <input type="password" name="password" id="password" placeholder="Password" required="" />
                <button type="submit">Sign up</button>
            </form>
        </div>

        <!-- Login Form -->
        <div class="login">
            <form action="{{ route('submit_login') }}" method="POST"> <!-- Ganti dengan rute login Laravel -->
                @csrf
                <label for="chk" aria-hidden="true">Login</label>
                <input type="username" name="username" placeholder="Username" required="" />
                <input type="password" name="password" placeholder="Password" required="" />
                <button type="submit">Login</button>
            </form>
        </div>
    </div>

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
