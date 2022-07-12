@extends('layout/main')

@section('container')
@section('title', 'Detail Unit')
@section('unit', 'active')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row mb-2">
            <div class="col-sm-6">
                @foreach ($anggota->take(1) as $item)
                <h1 class="h3 mb-2 text-gray-800">Daftar Anggota {{$item->daftar_unit->nama}}</h1>
                @endforeach
                <p class="mb-4 text-gray-800">Berikut adalah daftar Anggota Unit </p>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a herf="#">Unit</a></li>
                    <li class="breadcrumb-item active">DetailUnit</li>
                </ol>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header">
            @if (auth()->user()->level == "admin")
                <a href=" {{ route('exportanggota') }}" class="btn btn-success btn-sm" >Download</a>
                <a href="#" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#uploadModal">Upload</a>
                <a href=" {{ route('create-anggota')}}" class="btn btn-primary btn-sm" >+ Tambah Anggota</a>
            @endif
            <div class="card-body">
                <div class="table text-gray-800">
                    <table class="table-striped" id="myTable">
                        <thead class="table-primary">
                            <tr>
                                <th class="text-gray-800">#</th>
                                <th class="text-gray-800">Unit</th>
                                <th class="text-gray-800">Nama</th>
                                <th class="text-gray-800">NIP</th>
                                <th class="text-gray-800">Golongan</th>
                                <th class="text-gray-800">Keterangan (SubUnit)</th>
                                <th class="text-gray-800">Tindakan</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="table-primary">
                                <th class="text-gray-800">#</th>
                                <th class="text-gray-800">Unit</th>
                                <th class="text-gray-800">Nama</th>
                                <th class="text-gray-800">NIP</th>
                                <th class="text-gray-800">Golongan</th>
                                <th class="text-gray-800">Keterangan (SubUnit)</th>
                                <th class="text-gray-800">Tindakan</th>
                            </tr>
                        </tfoot>
                        @foreach ($anggota as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td class="text-gray-800">{{ $item->daftar_unit->nama }}</td>
                            <td>{{ $item->nama}}</td>
                            <td class="text-gray-800">{{ $item->nip }}</td>
                            <td class="text-gray-800 text-center">{{ $item->golongan->golongan}}</td>
                            <td>{{ $item->keterangan }}</td>
                            <td>
                            @if (auth()->user()->level == "admin")
                                <div class ="text-center">
                                    <a href="{{ url('edit-anggota', $item->id)}}"><i class="fa-solid fa-pencil ml-2 "></i></a> 
                                    | 
                                    <a href="#"><i class="fa-solid fa-trash delete-anggota" style="color: red;" data-id="{{$item->id}}"></i></a>
                                </div>
                            @endif
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
    @include('sweetalert::alert')


@endsection
