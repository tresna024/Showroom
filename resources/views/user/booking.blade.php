<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Booking Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .booking-container {
            max-width: 600px;
            margin: 50px auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-header {
            margin-bottom: 20px;
            text-align: center;
        }

        .form-header h1 {
            font-size: 24px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="booking-container">
        <div class="form-header">
            <h1>Apakah Data anda Sudah Sesuai</h1>
        </div>
        <form action="{{ route('simpan_booking') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="name" name="name"
                    placeholder="Enter your full name" value="{{ $user->nama_lengkap }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email"
                    value="{{ $user->email }}" required>
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat"
                    value="{{ $user->alamat }}" required>
            </div>

            <div class="mb-3">
                <label for="telepon" class="form-label">Telepon</label>
                <input type="text" class="form-control" id="telepon" name="telepon"
                    placeholder="Enter your phone number" value="{{ $user->no_hp }}" required>
            </div>

            <div class="mb-3">
                <label for="mobil" class="form-label">Nama Mobil</label>
                <input type="text" class="form-control" id="mobil" name="mobil"
                    placeholder="Enter your phone number" value="{{ $mobil->title }}" readonly>
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label">Harga Mobil</label>
                <input type="text" class="form-control" id="harga" name="harga"
                    placeholder="Enter your phone number" value="{{ $mobil->price }}" readonly>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary" id="confirmButton">Ya</button>
                <a href="{{ route('show_mobil', $mobil->id) }}" class="btn btn-danger">Batal</a>
            </div>
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>
