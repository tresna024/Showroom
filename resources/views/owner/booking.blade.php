@extends('layout.menu_owner')

@section('content_owner')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1 class="mt-2">Data Booking Mobil</h1>
                <hr>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Pelanggan</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">No Telepon</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Nama Mobil</th>
                                    <th scope="col">Harga Mobil</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col" style="width: 20%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($booking as $no => $lp)
                                    <tr>
                                        <td>{{ $no + 1 }}</td>
                                        <td>{{ $lp->name }}</td>
                                        <td>{{ $lp->email }}</td>
                                        <td>{{ $lp->telepon }}</td>
                                        <td>{{ $lp->alamat }}</td>
                                        <td>{{ $lp->mobil }}</td>
                                        <td>{{ 'Rp ' . number_format($lp->harga, 2, ',', '.') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($lp->created_at)->format('d-m-Y') }}</td>
                                        <td class="text-center">
                                            <form id="formHapus{{ $lp->id }}" action="{{ route('hapus_booking', $lp->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="konfirmasiHapus({{ $lp->id }})">HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data Laporan belum Tersedia.
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
