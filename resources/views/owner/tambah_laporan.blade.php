@extends('layout.menu_owner')

@section('content_owner')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1 class="mt-2">Tambah Laporan</h1>
                <hr>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Add Laporan
                        </button>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Mobil</th>
                                    <th scope="col">Nama Pelanggan</th>
                                    <th scope="col">Uang Muka</th>
                                    <th scope="col">Harga Mobil</th>
                                    <th scope="col">Sisa Tunggakan</th>
                                    <th scope="col">Tanggal Input</th>
                                    <th scope="col" style="width: 20%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($laporan as $no => $lp)
                                    <tr>
                                        <td>{{ $no + 1 }}</td>
                                        <td>{{ $lp->nama_mobil }}</td>
                                        <td>{{ $lp->nama_penyewa }}</td>
                                        <td>{{ 'Rp ' . number_format($lp->harga_mobil, 2, ',', '.') }}</td>
                                        <td>{{ 'Rp ' . number_format($lp->total, 2, ',', '.') }}</td>
                                        <td>{{ 'Rp ' . number_format($lp->total - $lp->harga_mobil, 2, ',', '.') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($lp->created_at)->format('d-m-Y') }}</td>
                                        <td class="text-center">
                                            <form id="formHapus{{ $lp->id }}"
                                                action="{{ route('laporan_hapus', $lp->id) }}" method="POST">
                                                <button type="button" data-bs-target="#ModalEdit{{ $lp->id }}"
                                                    data-bs-toggle="modal" class="btn btn-sm btn-warning">EDIT</button>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="konfirmasiHapus({{ $lp->id }})">HAPUS</button>
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
                        {{ $laporan->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @foreach ($laporan as $lp)
        <div class="modal fade" id="ModalEdit{{ $lp->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Laporan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('edit_laporan', $lp->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="mb-3">
                                <label for="nama_mobil" class="form-label">Nama Mobil</label>
                                <input type="text" class="form-control" id="nama_mobil" name="nama_mobil"
                                    placeholder="Masukkan Nama Mobil" value="{{ $lp->nama_mobil }}">
                            </div>
                            <div class="mb-3">
                                <label for="nama_penyewa" class="form-label">Nama Pelanggan</label>
                                <input type="text" class="form-control" id="nama_penyewa" name="nama_penyewa"
                                    placeholder="Masukkan Nama Pelanggan" value="{{ $lp->nama_penyewa }}">
                            </div>
                            <div class="mb-3">
                                <label for="harga_mobil" class="form-label">Uang Muka</label>
                                <input type="text" class="form-control" id="harga_mobil" name="harga_mobil"
                                    placeholder="Masukkan Uang Muka" value="{{ $lp->harga_mobil }}">
                            </div>
                            <div class="mb-3">
                                <label for="total" class="form-label">Harga Mobil</label>
                                <input type="text" class="form-control" id="total" name="total"
                                    placeholder="Masukkan Harga Mobil" value="{{ $lp->total }}">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    @endforeach

    <!-- Modal Tambah-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('simpan_laporan') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_mobil" class="form-label">Nama Mobil</label>
                            <input type="text" class="form-control" id="nama_mobil" name="nama_mobil"
                                placeholder="Masukkan Nama Mobil">
                        </div>
                        <div class="mb-3">
                            <label for="nama_penyewa" class="form-label">Nama Pelanggan</label>
                            <input type="text" class="form-control" id="nama_penyewa" name="nama_penyewa"
                                placeholder="Masukkan Nama Pelanggan">
                        </div>
                        <div class="mb-3">
                            <label for="harga_mobil" class="form-label">Uang Muka</label>
                            <input type="text" class="form-control" id="harga_mobil" name="harga_mobil"
                                placeholder="Masukkan Uang Muka">
                        </div>
                        <div class="mb-3">
                            <label for="total" class="form-label">Harga Mobil</label>
                            <input type="text" class="form-control" id="total" name="total"
                                placeholder="Masukkan Harga Mobil">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function konfirmasiHapus(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit form hapus
                    document.getElementById('formHapus' + id).submit();
                }
            })
        }
    </script>
@endsection
