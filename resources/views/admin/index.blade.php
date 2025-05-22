@extends('layout.menu_admin')

@section('content_admin')

    <!-- Main Content -->
    <div class="container mt-5">
        <h2 class="text-center text-primary mb-4">Manage Cars</h2>

        <!-- Filter & Search -->
        <div class="d-flex justify-content-between mb-3">
            <form class="d-flex" action="{{ route('admin') }}" method="GET">
                <input type="text" name="search" class="form-control me-2" placeholder="Search by title...">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-search"></i> Search
                </button>
            </form>
            <a href="{{ route('tambah') }}" class="btn btn-success">
                <i class="fas fa-plus-circle"></i> Add Car
            </a>
        </div>

        @if ($mobils->isEmpty())
            <div class="alert alert-warning text-center">No cars available at the moment.</div>
        @else
            <div class="row">
                @foreach ($mobils as $mobil)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            <img src="{{ asset('storage/' . $mobil->image) }}" class="card-img-top"
                                alt="{{ $mobil->title }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $mobil->title }}</h5>
                                <p>
                                    <strong>Price:</strong> {{ 'Rp ' . number_format($mobil->price, 2, ',', '.') }}<br>
                                    <strong>Stock:</strong> {{ $mobil->stock }}
                                </p>
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('lihat_detail', $mobil->id) }}" class="btn btn-dark btn-sm">
                                        <i class="fas fa-eye"></i> View
                                    </a>
                                    <a href="{{ route('edit', $mobil->id) }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form onsubmit="return confirm('Are you sure?');"
                                        action="{{ route('hapus_mobil', $mobil->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center">
                {{ $mobils->links() }}
            </div>
        @endif
    </div>
@endsection
