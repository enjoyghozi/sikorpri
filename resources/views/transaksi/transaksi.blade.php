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
    <div class="card shadow mt-5">
        <div class="card-header">
         <a href="#" target="_blank" data-toggle="modal" data-target="#cetak" class="btn btn-secondary btn-sm float-right mb-3" >Cetak <i class="fa-solid fa-print"></i></a>
            <div class="card-body text-gray-800">
                <table id="myTable">
                    <thead class="table-primary">
                        <tr>
                            <th class="text-gray-800">Id Pembayaran</th>
                            <th class="text-gray-800">Unit</th>
                            <th class="text-gray-800">Jenis Pembayaran</th>
                            <th class="text-gray-800">Total Pembayaran</th>
                            <th class="text-gray-800">Tanggal Pembayaran</th>
                            <th class="text-gray-800">Foto Bukti</th>
                            <th class="text-gray-800">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dtTransaksi as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->nama_unit }}</td>
                            <td>{{ $item->jenis_pembayaran }}</td>
                            <td class="text-gray-800">Rp {{ number_format($item->total_pembayaran) }}</td>
                            <td class="text-gray-800">{{ $item->created_at }}</td>
                            <td>
                                <a href="{{ asset( 'img/'. $item->foto_bukti ) }}" target="_blank" rel="noopener noreferrer"> Lihat foto</a>
                            </td>
                            <td>
                                <a href="#" class="btn btn-sm btn-danger delete-transaksi" data-id="{{$item->id}}">Hapus</a>
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
                <a onclick="this.href='/cetak-transaksipertanggal/' + document.getElementById('tglawal').value + '/' + document.getElementById('tglakhir').value " target="_blank" class="btn btn-primary">Cetak</a>
            </div>
    </div>
  </div>
</div>

@endsection