@extends( 'layout.main' )

@section('container')
@section('title', 'User')
@section('admin', 'active')

<div class="container-fluid">
        <!-- Page Heading -->
        
        <div class="row mb-2">
                <div class="col-sm-6">
                    <h2 class="h3 text-gray-800">Daftar User KORPRI</h2>
                    <p class="mb-4 text-gray-800">Berikut adalah daftar semua User</p>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a herf="#">User</a></li>
                        <li class="breadcrumb-item active">DaftarUser</li>
                    </ol>
                </div>
            </div>

        <div class="card shadow mb-4">
            <div class="card-header">
                <button class="btn btn-success" data-toggle="modal" data-target="#createModal">Tambah User +</button>
            </div>
            <div class="card-body text-gray-800">
                <table class="table-striped" id="myTable">
                    <thead>
                        <tr class="table-primary">
                            <th class="text-gray-800">ID</th>
                            <th class="text-gray-800">Nama</th>
                            <th class="text-gray-800">Level</th>
                            <th class="text-gray-800">Email</th>
                            <th class="text-gray-800">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user as $item)
                        <tr>
                            <td>{{ $item-> id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->level }}</td>
                            <td>{{ $item->email }}</td>
                            <td>
                            <div>
                                <a href="{{ url('edit-admin', $item->id)}}"><i class="fa-solid fa-pencil ml-2 "></i></a> 
                                | 
                                <a href="#"><i class="fa-solid fa-trash delete-user" style="color: red;" data-id="{{$item->id}}"></i></a>
                            </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
</div>

<div class="modal fade border-0" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="color: black;">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="createModalLabel">Tambah User Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

        <div class="modal-body">
            <form action="{{ route('simpanregistrasi') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="form-label font-weight-bold">Nama*</label>
                    <input type="text" class="form-control" name="name" placeholder="Nama Lengkap" required="required">
                </div>
                <div class="form-group">
                    <label class="form-label font-weight-bold">Level*</label>
                    <select name="level" class="form-control w-100" required="required" id="">
                        <option >- PilihLevel -</option>
                        <option value="admin">Admin</option>
                        <option value="unit">Unit</option>
                    </select>        
                </div>
                    <div class="form-group">
                        <label class="form-label font-weight-bold">Email*</label>
                        <input type="email" class="form-control" name="email"placeholder="Email Address" required="required">
                    </div>
                <div class="form-group">
                    <label class="form-label font-weight-bold">Password*</label>
                    <input type="password" class="form-control" name="password" placeholder="Password" required="required">
                </div>
                <button type="submit" class="btn btn-primary mb-4 float-right">Register Account</button>
            </form>
        </div>
    </div>
</div>
@include('sweetalert::alert')
@endsection