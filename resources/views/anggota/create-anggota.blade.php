@extends('layout/main')

@section('container')
@section('title', 'Tambah Anggota')
@section('anggota', 'active')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="h3 mb-2 text-gray-800">Tambah Daftar Anggota</h3>
                <p class="mb-4 text-gray-800">Isikan form berikut untuk menambah data Anggota</p>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a herf="#">Anggota</a></li>
                    <li class="breadcrumb-item active">TambahAnggota</li>
                </ol>
            </div>
        </div>

        <!-- Card Create -->
        <div class="container w-50">
            <div class="card shadow">
                <div class="card-body">
                    <form action=" {{ route('simpan-anggota')}}" method="post" required="required">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="form-label font-weight-bold">NIP*</label>
                            <input type="number" id="nip" name="nip" class="form-control " placeholder="Isikan NIP Anggota Baru .." required="required">
                        </div>
                        <div class="form-group">
                            <label class="form-label font-weight-bold">Nama*</label>
                            <input type="text" id="nama" name="nama" class="form-control " placeholder="Isikan Nama Anggota Baru .." required="required">
                        </div>
                        <div class="form-group">
                            <label class="form-label font-weight-bold">Unit*</label>
                            <select class="form-control select2" style="width: 100%" name="daftar_unit_id" id="daftar_unit_id" required>
                                <option value="- Pilih Unit -">- Pilih Unit -</option>
                                @foreach ($unit as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label font-weight-bold">Golongan*</label>
                            <select class="form-control select2" style="width: 100%" name="golongan_id" required="required">
                                <option value="- Pilih Golongan -">- Pilih Golongan -</option>
                                @foreach ($golongan as $item)
                                <option value="{{ $item->id }}">{{ $item->golongan }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label font-weight-bold">Nominal Iuran*</label>
                            <select class="form-control select2" style="width: 100%" name="nominal" id="nominal" required="required">
                                <option value="- Pilih Nominal -">- Pilih Nominal -</option>
                                @foreach ($golongan as $item)
                                <option value="{{ $item->nominal }}">{{ $item->nominal }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label font-weight-bold">Keterangan (SubUnit)</label>
                            <textarea class="form-control" name="keterangan" id="keterangan" placeholder="Sub Unit .."></textarea>
                        </div>
                        <div class="form-group float-right">
                                <button type="submit" class="btn btn-success btn-sm">Simpan data</button>
                        </div>
                    </form>
                </div>
            </div> 
        </div>
            <!-- end card -->
        
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
    @include('sweetalert::alert')

@endsection
