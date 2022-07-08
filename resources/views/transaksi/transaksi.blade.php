@extends( 'layout.main' )

@section('container')
@section('title', 'Transaksi')
@section('transaksi', 'active')

<div class="container-fluid">
        <!-- Page Heading -->
        <div class="row mb-2">
            <div class="col-sm-6">
                <h2 class="">Laman Transaksi KORPRI</h2>
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
            <div class="card-body">
                <table id="myTable">
                    <thead class="table-primary">
                        <tr>
                            <th class="text-center">Id Pembayaran</th>
                            <th class="text-center">Unit</th>
                            <th class="text-center">Total Pembayaran</th>
                            <th class="text-center">Tanggal Pembayaran</th>
                            <th class="text-center">Foto Bukti</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dtTransaksi as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->nama_unit }}</td>
                            <td class="text-center">{{ $item->total_pembayaran }}</td>
                            <td class="text-center">{{ $item->tanggal_pembayaran }}</td>
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
</div> <!-- /.container-fluid -->

@endsection