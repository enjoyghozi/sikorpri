@extends('layout/main')

@section('container')
@section('title', 'Unit')
@section('unit', 'active')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h2 class="">Daftar Unit</h2>
        <p class="mb-4">Berikut adalah daftar unit KORPRI </p>
        <div class="card shadow mb-4">
            <div class="card-header">
                @if (auth()->user()->level == "admin")
                <a href=" {{ route('exportunit') }}" class="btn btn-success btn-sm" >Download</a>
                <a href="#" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#uploadModal">Upload</a>
                <a href=" {{ route('create-unit')}}" class="btn btn-primary btn-sm" >+ Tambah Unit</a>
                @endif
                <div class="card-body">
                    <table class="table-striped" id="myTable" style="width:100%; font-color: #000000;" >
                    <thead class="table-primary">
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">NAMA UNIT</th>
                            <th class="text-center">JUMLAH ANGGOTA</th>
                            <th class="text-center">INFO</th>
                            <th class="text-center">TINDAKAN</th>
                        </tr>
                    </thead>
                    <tfoot class="table-primary">
                        <th class="text-center">#</th>
                        <th class="text-center">NAMA UNIT</th>
                        <th class="text-center">JUMLAH ANGGOTA</th>
                        <th class="text-center">INFO</th>
                        <th class="text-center">TINDAKAN</th>
                    </tfoot>
                    @foreach ($daftar_unit as $index => $unit)
                    <tr>   
                        <td class="text-center">{{ $index +1 }}</td>
                        <td>{{ $unit->nama }}</td>
                        <td class="text-center">{{ $unit->Anggota->count() }}</td>
                        
                        <td>
                            <div class="text-center">
                                <a class="btn btn-secondary btn-sm text-center"href=" {{ route('show-unit', $unit->id)}}">Lihat<i class="fa-solid fa-eye ml-3"></i></i></a></td>
                            </div>
                            <td>
                            @if (auth()->user()->level == "admin")
                                <div class ="text-center">
                                    <a href="{{ url('edit-unit', $unit->id)}}"><i class="fa-solid fa-pencil ml-2 "></i></a> 
                                    | 
                                    <a href="#"><i class="fa-solid fa-trash delete-unit" style="color: red;" data-id="{{$unit->id}}"></i></a>
                                </div>
                            @endif
                            </td>
                        </tr>
                        @endforeach
                    </table>
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
    @include('sweetalert::alert')


@endsection
