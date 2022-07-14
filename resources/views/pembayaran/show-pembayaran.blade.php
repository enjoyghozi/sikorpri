@extends( 'layout.main' )

@section('container')
@section('title', 'Detail Pembayaran')
@section('pembayaran', 'active')
<div class="container-luid">
    <div class="row mb-2">
            <div class="col-sm-6">
        @foreach ($anggota->take(1) as $item)
        <h1 class="h3 mb-2 text-gray-800">Detail Pembayaran Unit {{$item->daftar_unit->nama}}</h1>
        @endforeach
        <p class="ml-5 text-gray-800">Detail pembayaran sesuai dengan golongan tiap anggota. <br> Harap di teliti sebelum melakukan transaksi.</p>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a herf="#">Pembayaran</a></li>
            <li class="breadcrumb-item active">DetailPembayaran</li>
        </ol>
    </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg">
                <div class="card">
                    <div class="card-header text-center">Detail Anggota</div>
                    <div class="card-body shadow mb-4">
                    <table class="table-responsive text-gray-800" id="myTable">
                        <thead class="table-primary">
                            <tr>
                                <th class="text-gray-800">Nama Unit</th>
                                <th class="text-gray-800">Daftar Anggota</th>
                                <th class="text-gray-800">Golongan</th>
                                <th class="text-gray-800">Nominal</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <tr>
                            @foreach ($anggota as $item) 
                                <td>{{ $item->daftar_unit->nama }}</td>
                                <td>{{ $item->nama}}</td>
                                <td class="text-center">{{ $item->golongan->golongan}}</td>
                                <td class="text-center">Rp {{number_format($item->nominal)}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <table class="table table-hover table-striped table-dark mt-2">     
                        <tr>
                            <td class="font-weight-bold">TOTAL</td>
                                
                                <td class="text-right font-weight-bold">Rp {{number_format($anggota->sum('nominal'))}}</td>
                            </tr>
                    </table>
                </div>
                </div>
            </div>

            <div class="col-lg">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="card-header">
                        @foreach ($anggota->take(1) as $item)
                            <h6 class="">Total Pembayaran unit {{$item->daftar_unit->nama}} :</h6>
                        @endforeach
                            <div class="card-body">
                                <h5 class="font-weight-bold float-right">Rp {{number_format($anggota->sum('nominal'))}}</h5>
                            </div>
                        </div>
                        <a href="#" class="btn btn-primary mt-3 float-right" data-toggle="modal" data-target="#exampleModal">Form Pembayaran</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="color: black;">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLabel">Form Pembayaran Unit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        
            <div class="modal-body ml-3">
                <form action=" {{ route('simpan-transaksi')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                    <div class="form-group">
                        <label class="form-label text-secondary">Nama Unit*</label>
                        @foreach ($anggota->take(1) as $item)
                            <input type="text" class="ml-3 form-control-plaintext font-weight-bold text-black" name="namaunit" id="namaunit" value="{{$item->daftar_unit->nama}}">
                        @endforeach
                    </div>

                    <div class="form-group">
                        <label class="form-label text-secondary">Rincian*</label> <br>
                        <input type="hidden" class="form-control-plaintext" name="rincian" id="rincian" value="Iuran Wajib"><span class="ml-3 font-weight-bold text-black">Pembayaran Iuran Wajib</span>
                    </div>

                    <div class="form-group">
                        <label class="form-label text-secondary">Total Pembayaran*</label> <br>
                        <input type="number" hidden class="ml-3 form-control" name="total" id="total" placeholder="{{$anggota->sum('nominal')}}" value="{{$anggota->sum('nominal')}}"><span class="ml-3 font-weight-bold text-black">Rp {{number_format($anggota->sum('nominal'))}}</span>
                    </div>

                    <div class="form-group">
                        <label class="form-label text-secondary">Tanggal Pembayaran*</label>
                        <input type="date" class="ml-3 form-control w-50 font-weight-bold text-black" name="tanggal" id="tanggal" required="required">
                    </div>

                    <div class="form-group">
                        <label class="form-label text-secondary">Nomor Rekening</label>
                        <p class="ml-3 text-black" style="font-size: 18px; font-weight: bold;">3-016-22368-8</p>
                    </div>

                    <div class="form-group">
                        <label class="form-label text-secondary">Rekening Tujuan*</label>
                            <p class="ml-3 text-black" style="font-size: 15px; font-weight: bold;">BANK JATENG CABANG BLORA a.n. Dewan Pengurus KORPRI</p>
                    </div>
                        
                    <div class="form-group">
                        <label class="form-label text-secondary">Bukti Pembayaran*</label>
                        <input type="file" class="ml-3 form-control-file" name="foto" id="foto" required="required">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                </form>
            </div>
    </div>
</div>
@include('sweetalert::alert')
@endsection

