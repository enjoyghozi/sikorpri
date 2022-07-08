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
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-body">
                <form class="row" action=" {{ route('simpan-unit')}}" method="post" required="required">
                    {{ csrf_field() }}
                    <dt class="col-sm-3 mt-2 ml-5 mr-5">Nama Unit</dt>
                        <div class="form-group col-md-6">
                            <input type="text" id="nama" name="nama" class="form-control " placeholder="Isikan nama unit .." required="required">
                            <button type="submit" class="btn btn-success btn-sm float-right mt-3">Simpan data</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
        
    </div> <!-- /.container-fluid -->
    
    <!-- Modal Upload -->
    <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadModalLabel">Upload Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('importunit') }}" method="post" enctype="multipart/form-data">

                    <div class="modal-body">
                        <div class="form-group">


                            {{ csrf_field() }}
                            <div class="form-group">
                                <input type="file" name="file" required="required">  
                            </div>
                        </div>
        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
