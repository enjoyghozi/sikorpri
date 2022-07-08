@extends( 'layout.main' )


@section('container')
@section('title', 'Tambah Pembayaran TaliAsih & Uang Duka')
@section('Pembayaran', 'active')

<div class="container-fluid">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h2 class="mt-2">Tambah Transaksi Tali Asih <br> & Uang Duka</h2>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a herf="#">TaliAsih</a></li>
                        <li class="breadcrumb-item active">Tambah Tali Asih</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container justify-content-center mt-5" style="margin-left: 200px">
        <div class="card shadow mb-4 w-75">
            <div class="card-header">
                
                <h3>Create Data Tali Asih</h3>

                
                    <div class="card-body">
                        <form action="{{ route('simpan-taliasih') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <dt class="mb-2 col">Nama Unit</dt>
                                <input type="text" id="unit" name="unit" class="form-control col" placeholder="Unit" required="required">
                            </div>
                            <div class="form-group row">
                                <dt class="mb-2 col">Tanggal</dt>
                                <input type="date" id="tanggal" name="tanggal" class="form-control col" placeholder="Tanggal" required="required">
                            </div>
                        <div class="form-group row">
                            <dt class="mb-2 col">Nominal</dt>
                            <input type="number" id="nominal" name="nominal" class="form-control col" placeholder="Nominal" required="required">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success float-right">Simpan Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>  
</div>
@endsection