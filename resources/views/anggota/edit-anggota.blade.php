@extends('layout/main')

@section('container')
@section('anggota', 'active')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h3 class="h3 mb-2 text-dark">Daftar Anggota</h3>
        <p class="mb-4">Isikan form berikut untuk menambah data Anggota</p>
        <div class="card shadow mb-4">
            
            <div class="card-body">
                <form class="row" action="{{ url('update-anggota', $anggota->id)}}" method="post">
                    {{ csrf_field() }}
                    <dt class="col-sm-3 mt-2 ml-5 mr-5">Unit</dt>
                        <div class="form-group col-md-6">
                            <select class="form-control select2" style="width: 100%" name="daftar_unit_id" id="daftar_unit_id">
                            <option disabled value>Pilih Unit</option>
                            <option value="{{ $anggota->daftar_unit_id }}">{{ $anggota->daftar_unit->nama }}</option>
                        @foreach ($unit as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                            </select>
                        </div>
                    <dt class="col-sm-3 mt-2 ml-5 mr-5">Nama</dt>
                        <div class="form-group col-md-6">
                            <input type="text" id="nama" name="nama" class="form-control " placeholder="Isikan Nama Anggota Baru .." value=" {{ $anggota->nama }}" required="required">
                        </div>
                    <dt class="col-sm-3 mt-2 ml-5 mr-5">NIP</dt>
                        <div class="form-group col-md-6">
                            <input type="text" id="nip" name="nip" class="form-control " placeholder="Isikan NIP Anggota Baru .." value=" {{ $anggota->nip }}" required="required">
                        </div>
                    <dt class="col-sm-3 mt-2 ml-5 mr-5">Golongan</dt>
                        <div class="form-group col-md-6">
                            <select class="form-control select2" style="width: 100%" name="daftar_unit_id" id="daftar_unit_id">
                            <option disabled value>Pilih Unit</option>
                            <option value="{{ $anggota->golongan_id }}">{{ $anggota->golongan->golongan }}</option>
                        @foreach ($golongan as $item)
                            <option value="{{ $item->id }}">{{ $item->golongan }}</option>
                        @endforeach
                            </select>
                        </div>
                    </form>

                


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
                <form action="{{ route('importanggota') }}" method="post" enctype="multipart/form-data">

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
