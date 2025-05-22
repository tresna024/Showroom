@extends('layout.menu')

@section('content')
    <!-- Hero Section with Carousel -->
    <div id="carouselExampleRide" class="carousel slide hero-carousel" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://bluesky-cogcms-prodb.cdn.imgeng.in/media/fafp2bls/volvo-nearly-new-banner.jpg"
                    class="d-block w-100" alt="Car 1">
            </div>
            <div class="carousel-item">
                <img src="https://gld-creative.s3.us-west-2.amazonaws.com/2025-toyota-4runner-off-roading-in-the-forest-banner-8af23b3c4281-1920x600.jpg"
                    class="d-block w-100" alt="Car 2">
            </div>
            <div class="carousel-item">
                <img src="https://cdn07.carsforsale.com/CustomTemplatePhotos/1023595/images/ss1.492ba4d2.jpg"
                    class="d-block w-100" alt="Car 3">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Main Content -->
    <div class="container mt-5">
        <h2 class="text-center text-primary mb-4">Our Featured Cars</h2>

        @if ($mobils->isEmpty())
            <div class="alert alert-warning text-center">No cars available at the moment.</div>
        @else
            <div class="row">
                @foreach ($mobils as $mobil)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            <img src="{{ asset('storage/' . $mobil->image) }}" class="card-img-top"
                                alt="{{ $mobil->title }}" style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $mobil->title }}</h5>
                                <p>Price: <span
                                        class="text-success">{{ 'Rp ' . number_format($mobil->price, 2, ',', '.') }}</span>
                                </p>
                                <p>Stock: {{ $mobil->stock }}</p>
                                <a href="{{ route('show_mobil', $mobil->id) }}" class="btn btn-primary w-100">View
                                    Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- <!-- Pagination -->
            <div class="d-flex justify-content-center">
                {{ $mobils->links() }}
            </div> --}}
        @endif
    </div>

@endsection
