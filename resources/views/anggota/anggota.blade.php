@extends('layout/main')

@section('container')
@section('title', 'Anggota')
@section('anggota', 'active')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h2>Daftar Anggota KORPRI</h2>
        <p class="mb-4">Berikut adalah daftar semua Anggota tiap Unit </p>
        <div class="card shadow mb-4">
            <div class="card-header">
                <a href=" {{ route('exportanggota') }}" class="btn btn-success btn-sm" >Download</a>
                <a href="#" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#uploadModal">Upload</a>
                <a href=" {{ route('create-anggota')}}" class="btn btn-primary btn-sm" >+ Tambah Anggota</a>

                
            <div class="card-body">
                <table class="table-striped" id="myTable">
                    <thead>
                        <tr class="table-primary">
                            <th style="text-align: center;">#</th>
                            <th style="text-align: center;">UNIT</th>
                            <th style="text-align: center;">NAMA</th>
                            <th style="text-align: center;">NIP</th>
                            <th style="text-align: center;">GOLONGAN</th>
                            <th style="text-align: center;">TINDAKAN</th>
                        </tr>
                    </thead>
                    <tfoot class="table-primary">
                        <tr>
                            <th style="text-align: center;">#</th>
                            <th style="text-align: center;">UNIT</th>
                            <th style="text-align: center;">NAMA</th>
                            <th style="text-align: center;">NIP</th>
                            <th style="text-align: center;">GOLONGAN</th>
                            <th style="text-align: center;">TINDAKAN</th>
                        </tr>
                    </tfoot>
                    @foreach ($anggota as $item)
                    <tr>
                        <td class="text-center">{{$loop->iteration }}</td>
                        <td class="text-center">{{ $item->daftar_unit->nama }}</td>
                        <td>{{ $item->nama}}</td>
                        <td class="text-center">{{ $item->nip }}</td>
                        <td class="text-center">{{ $item->golongan->golongan}}</td>
                        <td>
                            <div class ="text-center">
                                <a href="{{ url('edit-anggota', $item->id)}}"><i class="fa-solid fa-pencil ml-2 "></i></a> 
                                | 
                                <a href="#"><i class="fa-solid fa-trash delete-anggota" style="color: red;" data-id="{{$item->id}}"></i></a>
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
    @include('sweetalert::alert')


@endsection
