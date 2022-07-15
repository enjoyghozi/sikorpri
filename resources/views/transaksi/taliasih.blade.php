@extends( 'layout.main' )

@section('container')
@section('title', 'Transaksi Taliasih')
@section('transaksi', 'active')

<body class="hold-transition sidebar-mini">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Taliasih & Uangduka</h1>
                    <p>Berikut adalah daftar transaksi taliasih dan uangduka</p>
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
            @if (auth()->user()->level == "superadmin")
            <div class="card-header">
                <a href="#" target="_blank" data-toggle="modal" data-target="#cetak" class="btn btn-secondary btn-sm float-right" >Cetak <i class="fa-solid fa-print"></i></a>
            </div>
            @endif
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
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_unit }}</td>
                            <td>{{ $item->jumlah_anggota }}</td>
                            <td>Rp {{ number_format($item->total) }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>
                            <a href="{{ asset( 'img/'. $item->foto ) }}" target="_blank" rel="noopener noreferrer"> Lihat foto</a>
                            </td>
                            <td>
                            @if (auth()->user()->level == "superadmin")
                                <a href="#" data-id="{{$item->id}}"class="btn btn-danger delete-taliasih" >Hapus</a>
                            @endif
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
</body>
<!-- Modal cetak -->
<div class="modal fade" id="cetak" tabindex="-1" role="dialog" aria-labelledby="cetakLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cetakLabel">Cetak Per Tanggal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body mb-4">
            <div class="form-group mb-4">
                <label class="form-label font-weight-bold">Tanggal Awal</label>
                <input type="date" name="tglawal" id="tglawal" class="form-control" />
            </div>
            <div class="form-group mb-4">
                <label class="form-label font-weight-bold">Tanggal Akhir</label>
                <input type="date" name="tglakhir" id="tglakhir" class="form-control" />
            </div>

        </div>
            <div class="modal-footer">
                <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                <a onclick="this.href='/cetak-taliasihpertanggal/' + document.getElementById('tglawal').value + '/' + document.getElementById('tglakhir').value " target="_blank" class="btn btn-primary">Cetak</a>
            </div>
    </div>
  </div>
</div>
@include('sweetalert::alert')
@endsection