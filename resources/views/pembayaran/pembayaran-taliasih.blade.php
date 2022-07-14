@extends( 'layout.main' )

@section('container')
@section('title', 'Riwayat Taliasih')
@section('riwayat', 'active')
<body class="hold-transition sidebar-mini">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Tali Asih</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a herf="#">Taliasih & Uang Duka</a></li>
                        <li class="breadcrumb-item active">Transaksi</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="card shadow mb-4">
            <div class="card-header">
                <div class="card-body">
                    <table class="table-striped text-gray-800" id="myTable">
                        <thead>
                            <tr class="table-primary">
                                <th class="text-gray-800">No</th>
                                <th class="text-gray-800">Unit</th>
                                <th class="text-gray-800">Jumlah Anggota</th>
                                <th class="text-gray-800">Total Pembayaran</th>
                                <th class="text-gray-800">Tanggal</th>
                                <th class="text-gray-800">Foto Bukti</th>
                                <th class="text-gray-800">Tindakan</th>
                            </tr>
                        </thead>
                        @foreach ($dttaliasih as $item)
                        <tbody>
                            <tr>
                                <td>{{$loop->iteration }}</td>
                                <td>{{ $item->nama_unit }}</td>
                                <td>{{ $item->jumlah_anggota }}</td>
                                <td>Rp {{ number_format($item->total) }}</td>
                                <td>{{ $item->tanggal }}</td>
                                <td>
                                <a href="{{ asset( 'img/'. $item->foto ) }}" target="_blank" rel="noopener noreferrer"> Lihat foto</a>
                                </td>
                                <td>
                                    <a href="#"><i class="fa-solid fa-trash-can delete-taliasih" data-id="{{$item->id}}" style="color: red"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                        <tfoot>
                            <tr class="table-primary">
                                <th class="text-gray-800">No</th>
                                <th class="text-gray-800">Unit</th>
                                <th class="text-gray-800">Jumlah Anggota</th>
                                <th class="text-gray-800">Total Pembayaran</th>
                                <th class="text-gray-800">Tanggal</th>
                                <th class="text-gray-800">Foto Bukti</th>
                                <th class="text-gray-800">Tindakan</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>  
</body>
@include('sweetalert::alert')
@endsection