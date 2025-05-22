<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Mobils</title>
    <style>
        body {
            background: #606868;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            margin: 50px auto;
            width: 90%;
            max-width: 1200px;
            display: flex;
            gap: 20px;
        }
        .card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            position: relative;
        }
        .card img {
            width: 100%;
            display: block;
            object-fit: cover;
            height: 400px; /* Atur tinggi gambar agar lebih besar */
            border-radius: 10px 10px 0 0; 
        }
        .card-body {
            padding: 20px;
        }
        h3 {
            margin: 0;
            color: #333;
        }
        p {
            margin: 10px 0;
        }
        hr {
            border: 0;
            border-top: 1px solid #ddd;
            margin: 15px 0;
        }
        .price {
            font-size: 1.5em;
            font-weight: bold;
            color: #007bff;
        }
        .description {
            font-size: 1em;
            color: #555;
            white-space: pre-line;
        }
        .stock {
            font-size: 1em;
            font-weight: bold;
        }
        .col-md-4, .col-md-8 {
            flex: 1;
        }
        .col-md-4 {
            max-width: 45%; /* Beri ruang lebih pada kolom gambar */
        }
        .col-md-8 {
            max-width: 55%; /* Kurangi lebar kolom deskripsi */
        }
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }
            .col-md-4, .col-md-8 {
                max-width: 100%;
            }
            .card img {
                height: auto; /* Sesuaikan tinggi gambar pada layar kecil */
            }
        }
        .checkout-button {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 10px;
            background-color: #28a745;
            color: white;
            text-align: center;
            text-decoration: none;
            font-size: 1em;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
        }
        .checkout-button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="col-md-4">
            <div class="card">
                <img src="{{ asset('storage/'.$mobil->image) }}" alt="Mobil Image">
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h3>{{ $mobil->title }}</h3>
                    <hr/>
                    <p class="price">{{ "Rp " . number_format($mobil->price, 2, ',', '.') }}</p>
                    <p class="description">{!! $mobil->description !!}</p>
                    <hr/>
                    <p class="stock">Stock : {{ $mobil->stock }}</p>
                    <div class="d-flex">

                        <a class="checkout-button" href="{{ route('booking_user', $mobil->id) }}">Checkout</a>
                        <a class="checkout-button" href="{{ route('home') }}">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
