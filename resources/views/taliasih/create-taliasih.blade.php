@extends( 'layout.main' )


@section('container')
@section('title', 'Tambah Pembayaran TaliAsih & Uang Duka')
@section('pembayaran', 'active')

<div class="container-fluid">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4 class="h3 text-gray-800">Tambah Transaksi Tali Asih <br> & Uang Duka</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a herf="#">TaliAsih & UangDuka</a></li>
                        <li class="breadcrumb-item active">Tambah Transaksi</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container w-75">
        <div class="justify-content-center mt-5">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <button type="button" class="btn btn-success w-25 float-right" data-toggle="modal" data-target="#pilihunit">+ Pilih Unit</button>
                </div>
                        <div class="card-body">
                            <form action="{{ route('simpan-taliasih') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                @foreach ($byr as $item)
                                <div class="form-group row">
                                    <dt class="mb-2 col-md-6">Unit*</dt>
                                    <div class="col-md-6">
                                        <input type="text" readonly id="unit" name="unit" class="form-control col" value="{{ $item->daftar_unit->nama }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <dt class="mb-2 col-md-6">Jumlah Anggota*</dt>
                                    <div class="col-md-6">
                                        <input type="number" readonly name="jumlah_anggota" class="form-control col" value="{{ $item->daftar_unit->anggota->count() }}">
                                        @endforeach
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <dt class="col-md-6">Iuran Per Orang x Jumlah Anggota</dt>
                                    <div class="col-md-6">
                                        <div class="row justify-content-between">
                                        <input type="text" id="iuran" name="iuran" class="form-control col-sm-5 ml-3" placeholder="iuran per orang" required="required">
                                        <p class="mt-2">X</p>
                                        <input type="number" id="jumlah" class="form-control col-sm-5 mr-3"  placeholder="jumlah anggota" required="required">
                                        </div>
                                    </div>
                                </div>
                                <div>

                                <div class="form-group row">
                                    <dt class="col-md-6">Iuran Bulan Ini*</p></dt>
                                    
                                    <div class="col-md-6">
                                        <input type="text" readonly id="total" name="total" class="form-control" required="required">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <dt class="col-md-6">Tanggal Pembayaran*</dt>
                                    <div class="col-md-6 mb-3">
                                        <input type="date" id="tanggal" name="tanggal" class="form-control col" placeholder="Tanggal" required="required">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <dt class="col-md-6">Bukti Pembayaran*</dt>
                                    <div class="col-md-6">
                                        <input type="file" class="form-control-file" name="foto" id="foto" required="required">
                                    </div>      
                                </div>
                            <div class="form-group mt-5">
                                <button type="submit" class="btn btn-success float-right">Simpan Data</button>
                            </div>
                        </form>
                    </div>
                </div>
        </div>  
    </div>
</div>




<!-- Modal pilih unit -->
    <div class="modal fade" id="pilihunit" tabindex="-1" role="dialog" aria-labelledby="unitLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="pilihunit">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action=" {{ route('simpan-daftar')}}" method="post" required="required">
                        {{ csrf_field() }}
                        <div class="form-group">
                        <label class="form-label">Unit*</label>
                            <select class="form-control select2 w-50" style="width: 100%" name="daftar_unit_id" id="daftar_unit_id" required="required">
                                <option disabled value="- Pilih Unit -">- Pilih Unit -</option>
                                @foreach ($unit as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Tambah Pembayaran</button>
                        </div>
                    </form>
                </div>

                
            </div>
        </div>
    </div>
@include('sweetalert::alert')
@endsection