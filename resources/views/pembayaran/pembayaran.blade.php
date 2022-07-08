@extends( 'layout.main' )

@section('container')
@section('pembayaran', 'active')
<h2 class="">Laman Pembayaran KORPRI</h2>
    <p class="mt-4 ml-5">Selamat datang di laman pembayaran iuran pokok Unit KORPRI. <br>Ini adalah rincian pembayaran iuran wajib perbulan unit berdasarkan jumlah anggota. <br>Harap hati-hati dalam melakukan pembayaran. Pastikan nominal saat melakukan pembayaran. </p>

    <div class="card card-info mt-5 shadow mb-4" style="width: 50rem; margin-left: 50px;">
    <h3 class="h3 p-3 text-center">Pembayaran Iuran Wajib KORPRI</h3>
        <form class="row mt-2" action=" {{ route('simpan-pembayaran')}}" method="post" required="required">
            {{ csrf_field() }}
            <dt class="col-sm-3 mt-2 ml-5 mr-5">Unit*</dt>
                <div class="form-group col-md-6">
                    <select class="form-control select2" name="daftar_unit_id" id="daftar_unit_id" required="required">
                        <option value="- Pilih Unit -">- Pilih Unit -</option>
                        @foreach ($unit as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>
            <dt class="col-sm-3 mt-2 ml-5 mr-5">Rincian Pembayaran</dt>
                <div class="form-group col-md-6">
                    <input type="text" readonly id="staticEmail" name="rincian_pembayaran" class="form-control-plaintext" value="Pembayaran Iuran Wajib">
                </div>
            <div class="col mb-4">
                <button type="submit" class="btn btn-success btn-sm" style="margin-left: 300px;">Tambah Pembayaran</button>
            </div>
        </form>
    </div>


    <div class="card mt-3">
        <div class="card-body shadow mb-4">
            <table action="post" class="table table-hover table-striped table-bordered" id="table-pembayaran">
                <thead class="table-primary">
                    <tr>
                        <th style="text-align: center;">ID Pembayaran</th>
                        <th style="text-align: center;">Nama Unit</th>
                        <th style="text-align: center;">Jumlah Anggota</th>
                        <th style="text-align: center;">Tanggal Pembayaran</th>
                        <th style="text-align: center;">Rincian Pembayaran</th>
                    </tr>
                </thead>
                @foreach ($pembayaran as $item)
                <tbody>
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->daftar_unit->nama}} </td>
                        <td class="text-center">{{ $item->daftar_unit->anggota->count()}}</td>
                        <td class="text-center">{{ $item->created_at }}</td>
                        <td class="text-center">{{ $item->rincian_pembayaran }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="mr-3 mt-3">
        <a class="btn btn-secondary shadow mb-4 float-right" href="{{ route('show-pembayaran', $item->daftar_unit_id)}}" >Lihat Detail dan Pembayaran</a>
    </div>
    
    @endforeach
@endsection