@extends( 'layout.main' )

@section('container')
@section('title', 'Pembayaran Wajib')
@section('pembayaran', 'active')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h2 class=" text-gray-800">Laman Pembayaran Iuran Wajib KORPRI</h2>
            <p class="mt-4 text-gray-800">Selamat datang di laman pembayaran iuran wajib Unit <span class="font-weight-bold">KORPRI.</span>  <br>Ini adalah rincian pembayaran iuran wajib unit berdasarkan jumlah anggota. <span class="font-weight-bold"> Hati-hati!</span> dalam melakukan pembayaran. Pastikan <span class="font-weight-bold">nominal sesuai</span> dengan total yang di tentukan.</p>

        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a herf="#">Pembayaran</a></li>
                <li class="breadcrumb-item active">PembayaranWajib</li>
            </ol>
        </div>
    </div>
    <div class="card mt-3 shadow mb-4">
        <div class="card-header">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
            Pilih Unit +
            </button>
        </div>
        <div class="card-body">
            <table action="post" class="table text-gray-800" id="table-pembayaran">
                <thead class="table-primary">
                    <tr>
                        <th class="text-gray-800">ID Pembayaran</th>
                        <th class="text-gray-800">Nama Unit</th>
                        <th class="text-gray-800">Jumlah Anggota</th>
                        <th class="text-gray-800">Tanggal Pembayaran</th>
                        <th class="text-gray-800">Rincian Pembayaran</th>
                    </tr>
                </thead>
                @foreach ($pembayaran as $item)
                <tbody>
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->daftar_unit->nama}} </td>
                        <td>{{ $item->daftar_unit->anggota->count()}}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->rincian_pembayaran }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <a class="btn btn-secondary shadow mb-4 float-right" href="{{ route('show-pembayaran', $item->daftar_unit_id)}}" >Lihat Detail dan Pembayaran</a>
        </div>
        @endforeach
    </div>
</div>
    



<!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <div class="modal-body">
                    <form class="row mt-2" action=" {{ route('simpan-pembayaran')}}" method="post">
                        {{ csrf_field() }}
                        <dt class="col-md-5 ml-3">Unit*</dt>
                            <div class="form-group col-md-6">
                                <select class="form-control select2" style="width: 100%" name="daftar_unit_id" id="daftar_unit_id">
                                    <option disabled value="- Pilih Unit -">- Pilih Unit -</option>
                                    @foreach ($unit as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        <dt class="col-md-5 ml-3">Rincian</dt>
                            <div class="form-group col-md-6">
                                <input type="text" readonly id="staticEmail" name="rincian_pembayaran" class="form-control-plaintext" value="Pembayaran Iuran Wajib">
                            </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection