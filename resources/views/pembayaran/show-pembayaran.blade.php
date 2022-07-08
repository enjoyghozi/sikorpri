@extends( 'layout.main' )

@section('container')
@section('title', 'Detail Pembayaran')
@section('pembayaran', 'active')

    @foreach ($anggota->take(1) as $item)
    <h1 class="h3 mb-2">Detail Pembayaran Unit {{$item->daftar_unit->nama}}</h1>
    @endforeach
    <p class="ml-5">Detail pembayaran sesuai dengan golongan tiap anggota. <br> Harap di teliti sebelum melakukan transaksi.</p>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg">
                <div class="card">
                    <div class="card-header text-center">Detail Anggota</div>
                    <div class="card-body shadow mb-4">
                    <table class="table-responsive" id="myTable">
                        <thead class="table-primary">
                            <tr>
                                <th style="text-align: center;">Nama Unit</th>
                                <th style="text-align: center;">Daftar Anggota</th>
                                <th style="text-align: center;">Golongan</th>
                                <th style="text-align: center;">Nominal</th>
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
                <div class="card">
                    <div class="card-body">
                        <div class="card-header">
                            <h5 class="">Total Pembayaran    :   <span class="font-weight-bold float-right">Rp {{number_format($anggota->sum('nominal'))}}</span></h5>
                        </div>
                        <a href="#" class="btn btn-primary mt-3 float-right" data-toggle="modal" data-target="#exampleModal">Form Pembayaran</a>
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
        <div class="modal-body">
            <form action=" {{ route('simpan-transaksi')}}" method="post" enctype="multipart/form-data" required="required">
            {{ csrf_field() }}
                <div class="form-group row">
                    <label class="col-sm-6 col-form-label">Nama Unit*</label>
                    <div class="col-sm-6">
                    @foreach ($anggota->take(1) as $item)
                        <input type="text" class="form-control-plaintext" name="namaunit" id="namaunit" value="{{$item->daftar_unit->nama}}">
                    @endforeach
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-6 col-form-label">Total Pembayaran*</label>
                    <div class="col-sm-5">
                    <input type="text" readonly class="form-control" name="total" id="total" placeholder="Rp {{number_format($anggota->sum('nominal'))}} " value="Rp {{number_format($anggota->sum('nominal'))}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-6 col-form-label">Tanggal Pembayaran*</label>
                    <div class="col-sm-5">
                    <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal Pembayaran" required="required">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-6 col-form-label">Rekening Tujuan*</label>
                        <p class="col-md-6" style="font-size: 13px; font-weight: bold;">BANK JATENG CABANG BLORA <br> a.n. Dewan Pengurus KORPRI</p>
                    <div class="col-md-6 text-center" style="margin-left: 245px;">
                        <input type="text" readonly class="form-control-plaintext" id="" placeholder="3-016-22368-8">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-6 col-form-label">Bukti Pembayaran*</label>
                    <div class="col-md-6">
                    <input type="file" class="form-control-file" name="foto" id="foto">
                    </div>      
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </form>
        </div>
  </div>
</div>
@endsection

