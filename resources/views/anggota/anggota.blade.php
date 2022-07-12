@extends('layout/main')

@section('container')
@section('title', 'Anggota')
@section('anggota', 'active')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row mb-2">
            <div class="col-sm-6">
            <h2 class="h3 text-gray-800">Daftar Anggota KORPRI</h2>
            <p class="mb-4 text-gray-800">Berikut adalah daftar semua Anggota tiap Unit </p>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a herf="#">Anggota</a></li>
                    <li class="breadcrumb-item active">DaftarAnggota</li>
                </ol>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header">
            @if (auth()->user()->level == "admin")
                <a href=" {{ route('exportanggota') }}" class="btn btn-success btn-sm" >Download</a>
                <a href="#" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#uploadModal">Upload</a>
                <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#create-anggota">+ Tambah Anggota</a>
            @endif
            <div class="card-body text-gray-800">
                <table class="table-striped" id="myTable">
                    <thead>
                        <tr class="table-primary">
                            <th class="text-gray-800">#</th>
                            <th class="text-gray-800">Unit</th>
                            <th class="text-gray-800">Nama</th>
                            <th class="text-gray-800">NIP</th>
                            <th class="text-gray-800">Golongan</th>
                            <th class="text-gray-800">Keterangan (SubUnit)</th>
                            <th class="text-gray-800">Tindakan</th>
                        </tr>
                    </thead>
                    <tfoot class="table-primary">
                        <tr>
                            <th class="text-gray-800">#</th>
                            <th class="text-gray-800">Unit</th>
                            <th class="text-gray-800">Nama</th>
                            <th class="text-gray-800">NIP</th>
                            <th class="text-gray-800">Golongan</th>
                            <th class="text-gray-800">Keterangan (SubUnit)</th>
                            @if (auth()->user()->level == "admin")
                            <th class="text-gray-800">Tindakan</th>
                            @endif
                        </tr>
                    </tfoot>
                    @foreach ($anggota as $item)
                    <tr>
                        <td class="text-gray-800">{{$loop->iteration }}</td>
                        <td class="text-gray-800">{{ $item->daftar_unit->nama }}</td>
                        <td>{{ $item->nama}}</td>
                        <td class="text-gray-800">{{ $item->nip }}</td>
                        <td class="text-gray-800 text-center">{{ $item->golongan->golongan}}</td>
                        <td>{{ $item->keterangan }}</td>
                        <td>
                            <div class ="text-gray-800">
                            @if (auth()->user()->level == "admin")
                                <a href="{{ url('edit-anggota', $item->id)}}"><i class="fa-solid fa-pencil ml-2 "></i></a> 
                                | 
                                <a href="#"><i class="fa-solid fa-trash delete-anggota" style="color: red;" data-id="{{$item->id}}"></i></a>
                            @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </table>
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


        <!-- Modal create Anggota -->
<div class="modal fade" id="create-anggota" tabindex="-1" role="dialog" aria-labelledby="create-anggotaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="create-anggotaLabel">Tambah Anggota Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action=" {{ route('simpan-anggota')}}" method="post" required="required">
                <div class="modal-body">
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
                            <option value="{{ $item->nominal }}">Rp{{ number_format($item->nominal) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label font-weight-bold">Keterangan (SubUnit)</label>
                        <textarea class="form-control" name="keterangan" id="keterangan" placeholder="Sub Unit .."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                
            </form>
        </div>
    </div>
</div>
    @include('sweetalert::alert')


@endsection
