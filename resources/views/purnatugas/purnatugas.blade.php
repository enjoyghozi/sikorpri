@extends('layout/main')

@section('container')
@section('title', 'Unit')
@section('unit', 'active')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row mb-2">
            <div class="col-sm-6">
                <h2 class="h3 text-gray-800">Daftar Pensiun dan Purna Tugas</h2>
                <p class="mb-4 text-gray-800">Berikut adalah daftar anggota KORPRI yang sudah menerima dana Taliasih & Uang Duka</p>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a herf="#">Daftar Purnatugas</a></li>
                    <li class="breadcrumb-item active">Semua daftar</li>
                </ol>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header">
                <div class="card-body text-gray-800">
                    <table class="table-striped" id="myTable">
                        <thead class="table-primary">
                            <tr>
                                <th class="text-gray-800">#</th>
                                <th class="text-gray-800">Nama Anggota</th>
                                <th class="text-gray-800">NIP</th>
                                <th class="text-gray-800">Unit</th>
                                <th class="text-gray-800">Bukti Penerimaan</th>
                            </tr>
                        </thead>
                        <tfoot class="table-primary">
                            <th class="text-gray-800">#</th>
                            <th class="text-gray-800">Nama Anggota</th>
                            <th class="text-gray-800">NIP</th>
                            <th class="text-gray-800">Unit</th>
                            <th class="text-gray-800">Bukti Penerimaan</th>
                        </tfoot>
                        @foreach ($purna as $item)
                        <tr>   
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->nip }}</td>
                            <td>{{ $item->unit }}</td>
                            <td>{{ $item->bukti }}</td>
                            @endforeach
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        
    </div> <!-- /.container-fluid -->
    
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
    @include('sweetalert::alert')


@endsection
