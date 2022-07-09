@extends( 'layout.main' )


@section('container')
@section('title', 'Tambah Pembayaran TaliAsih & Uang Duka')
@section('Pembayaran', 'active')

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
        <div class="container justify-content-center mt-5">
            <div class="card shadow mb-4">
                <div class="card-header">
                        <div class="card-body">
                            <form action="{{ route('simpan-transaksi') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group row">
                                    <dt class="col-md-6">Unit*</dt>
                                    <div class="col-md-6 mb-3">
                                        <select class="form-control select2" name="namaunit" id="namaunit" required="required">
                                            <option value="- Pilih Unit -">- Pilih Unit -</option>
                                            @foreach ($unit as $item)
                                            <option value="{{ $item->nama }}">{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <dt class="mb-2 col-md-6">Jenis Pembayaran*</dt>
                                    <div class="col-md-6">
                                        <input type="text" hidden id="rincian" name="rincian" class="form-control col" value="Tali Asih & Uang Duka">
                                        Tali Asih & Uang Duka
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <dt class="col-md-6">Nominal*</dt>
                                    <div class="col-md-6">
                                        <input type="number_format" id="number" name="total" class="input-currency w-100" placeholder="Rp" type-currency="IDR" required="required">
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
</div>
@include('sweetalert::alert')
@endsection