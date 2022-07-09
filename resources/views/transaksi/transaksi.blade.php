@extends( 'layout.main' )

@section('container')
@section('title', 'Transaksi')
@section('transaksi', 'active')

<div class="container-fluid">
        <!-- Page Heading -->
        <div class="row mb-2">
            <div class="col-sm-6">
                <h2 class=" h3 text-gray-800">Laman Transaksi KORPRI</h2>
                <p class="text-danger font-weight-bold">Halaman transaksi disini menampilkan semua hasil pembayaran unit yang berupa <br> Iuran Wajib dan Iuran Tali Asih & Uang Duka</p>

        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a herf="#">Transaksi</a></li>
                <li class="breadcrumb-item active">TransaksiPembayaran</li>
            </ol>
        </div>
    </div>
    <div class="card shadow mb-4 mt-5">
        <div class="card-header">
            <div class="card-body text-gray-800">
                <table id="myTable">
                    <thead class="table-primary">
                        <tr>
                            <th class="text-gray-800">Id Pembayaran</th>
                            <th class="text-gray-800">Unit</th>
                            <th class="text-gray-800">Total Pembayaran</th>
                            <th class="text-gray-800">Tanggal Pembayaran</th>
                            <th class="text-gray-800">Foto Bukti</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dtTransaksi as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->nama_unit }}</td>
                            <td class="text-gray-800">Rp {{ number_format($item->total_pembayaran) }}</td>
                            <td class="text-gray-800">{{ $item->tanggal_pembayaran }}</td>
                            <td>
                                <a href="{{ asset( 'img/'. $item->foto_bukti ) }}" target="_blank" rel="noopener noreferrer"> Lihat foto</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
        <!-- Total -->
    <div class="card float-right shadow mb-4" style="width: 18rem; text-weight: bold">
        <h6 class="card-header">Total Semua Pembayaran</h6>
        <div class="card-body">
            <h4 class="text-center">Rp {{ number_format($dtTransaksi->sum('total_pembayaran')) }}</h4>
        </div>
    </div>
</div> <!-- /.container-fluid -->

@endsection