@extends('layout/main')

@section('container')
@section('title', 'Daftar Pensiun/Purnatugas')
@section('Pensiun / Purna Tugas', 'active')
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
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#purnaModal">Tambah Daftar +</button>
            <div class="form-group float-right">
              <a href="#" target="_blank" data-toggle="modal" data-target="#cetak" class="btn btn-secondary btn-sm" >Cetak <i class="fa-solid fa-print"></i></a>
            </div>
          </div>
            <div class="card-body text-gray-800">
                    <table class="table-striped" id="myTable">
                        <thead class="table-primary">
                            <tr>
                                <th class="text-gray-800">#</th>
                                <th class="text-gray-800">Nama Anggota</th>
                                <th class="text-gray-800">NIP</th>
                                <th class="text-gray-800">Unit</th>
                                <th class="text-gray-800">Tanggal & Waktu Penerimaan</th>
                                <th class="text-gray-800">Bukti Penerimaan</th>
                            </tr>
                        </thead>
                        <tfoot class="table-primary">
                            <th class="text-gray-800">#</th>
                            <th class="text-gray-800">Nama Anggota</th>
                            <th class="text-gray-800">NIP</th>
                            <th class="text-gray-800">Unit</th>
                            <th class="text-gray-800">Tanggal & Waktu Penerimaan</th>
                            <th class="text-gray-800">Bukti Penerimaan</th>
                        </tfoot>
                        @foreach ($purna as $item)
                        <tr>   
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_anggota }}</td>
                            <td>{{ $item->nip }}</td>
                            <td>{{ $item->unit }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>
                              <a href="{{ asset( 'img/'. $item->bukti ) }}" target="_blank" rel="noopener noreferrer"> Lihat foto</a>
                            </td>
                            @endforeach
                        </tr>
                    </table>
                </div>
        </div>
        
    </div> <!-- /.container-fluid -->
    

<!-- Modal -->
<div class="modal fade" id="purnaModal" tabindex="-1" role="dialog" aria-labelledby="purnaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="purnaModalLabel">Tambah daftar baru</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action=" {{ route('simpan-purna')}}" method="post" required="required" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="form-label">Nama Anggota</label>
                    <input type="text" id="nama" name="nama_anggota" class="form-control " placeholder="Isikan nama unit .." required="required">
                </div>
                <div class="form-group">
                    <label class="form-label">NIP</label>
                    <input type="text" id="nama" name="nip" class="form-control " placeholder="Isikan nama unit .." required="required">
                </div>
                <div class="form-group">
                  <label class="form-label">Unit*</label>
                  <select class="form-control select2" style="width:100%;" name="nama_unit" id="nama_unit" required>
                  <option disabled value>Pilih Unit</option>
              @foreach ($unit as $item)
                  <option value="{{ $item->nama }}">{{ $item->nama }}</option>
              @endforeach
                  </select>
              </div>
                
              <div class="form-group">
                    <label class="form-label">Bukti Penerima</label>
                    <input type="file" id="nama" name="bukti" class="form-control " placeholder="Isikan nama unit .." required="required">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal cetak -->
<div class="modal fade" id="cetak" tabindex="-1" role="dialog" aria-labelledby="cetakLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="cetakLabel">Cetak Per Tanggal</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <div class="modal-body mb-4">
              <div class="form-group mb-4">
                  <label class="form-label font-weight-bold">Tanggal Awal</label>
                  <input type="date" name="tglawal" id="tglawal" class="form-control" />
              </div>
              <div class="form-group mb-4">
                  <label class="form-label font-weight-bold">Tanggal Akhir</label>
                  <input type="date" name="tglakhir" id="tglakhir" class="form-control" />
              </div>
          </div>
              <div class="modal-footer">
                  <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                  <a onclick="this.href='/cetak-purnatugaspertanggal/' + document.getElementById('tglawal').value + '/' + document.getElementById('tglakhir').value " target="_blank" class="btn btn-primary">Cetak</a>
              </div>
        </div>
    </div>
</div>
    @include('sweetalert::alert')


@endsection
