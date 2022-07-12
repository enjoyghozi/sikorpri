@extends('layout/main')

@section('container')
@section('title', 'Tambah Unit')
@section('unit', 'active')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row mb-2">
        <div class="col-sm-6">
            <h3 class="h3 mb-2 text-dark">Tambah Unit</h3>
            <p class="mb-4">Isikan form berikut untuk menambah data Unit</p>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a herf="#">Unit</a></li>
                <li class="breadcrumb-item active">TambahUnit</li>
            </ol>
        </div>
    </div>
    <div class="container w-50">
        <div class="card shadow mb-4">
            <div class="card-header">Tambah Unit Baru</div>
            <div class="card-body">
                <form action=" {{ route('simpan-unit')}}" method="post" required="required">
                    {{ csrf_field() }}
                    <div class="form-group">
                            <label class="form-label">Nama Unit</label>
                            <input type="text" id="nama" name="nama" class="form-control " placeholder="Isikan nama unit .." required="required">
                            <button type="submit" class="btn btn-success btn-sm float-right mt-3">Simpan data</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
        
    </div> <!-- /.container-fluid -->

@endsection
