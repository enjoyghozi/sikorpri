@extends( 'layout.main' )

@section('container')
@section('title', 'Akun')
@section('akun', 'active')

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row mb-2">
        <div class="col-sm-6">
            <div class="d-sm-flex align-items-center mb-2">
                <h1 class="h3">Akun anda </h1>
            </div>
                <p class="text-danger">Maaf Anda belum bisa merubah data anda karena sedang proses pengembangan</p>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a herf="#">Pengaturan</a></li>
                <li class="breadcrumb-item active">Akun</li>
            </ol>
        </div>
    </div>
        <div class="container justiy-content-center">
            <div class="card shadow mb-4 mt-5" style="width: 40rem;">
                <div class="card-body">
                    <form action="#" method="post">
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" name="name" value="{{ auth()->user()->name }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" value="{{ auth()->user()->email }}">
                        </div>
                        <!-- <button type="submit" class="btn btn-primary float-right">Ubah</button> -->
                    </form>
                    
                </div>
            </div>
        </div>
</div>

@endsection