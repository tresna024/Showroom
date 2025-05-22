@extends('layout.menu')

@section('content')
    <!-- Contact Header -->
    <div class="contact-header">
        <h1>Contact Us</h1>
        <p>We would love to hear from you! Here's how you can reach us.</p>
    </div>

    <!-- Contact Info Section -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <div class="contact-info">
                    <h3>Showroom Address</h3>
                    <p>548P+3CV, Jl. Medan B. Aceh, Mns Mee, Kec. Muara Dua, Kota Lhokseumawe, Aceh 24355</p>
                    <h4>Phone:</h4>
                    <p><a href="tel:+1234567890" class="text-decoration-none text-primary">+62 812 4013 8384</a></p>
                    <h4>Email:</h4>
                    <p><a href="carshowroom99@gmail.com" class="text-decoration-none text-primary">carshowroom99@gmail.com</a>
                    </p>
                    <h4>Opening Hours:</h4>
                    <p>Monday - Friday: 9:00 AM - 6:00 PM<br>Saturday: 10:00 AM - 4:00 PM<br>Sunday: Closed</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="map-container">
                    <!-- Embed Google Maps -->
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d993.4041094124533!2d97.13540786952736!3d5.165244535334941!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304783e4e8c36869%3A0xabfb59fb67694f67!2sIwang%20Detailing%20Auto%20Spa%20Professional!5e0!3m2!1sid!2sid!4v1734189573619!5m2!1sid!2sid"
                        width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
@endsection
