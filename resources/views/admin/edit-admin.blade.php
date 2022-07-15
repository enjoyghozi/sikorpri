@extends( 'layout.main' )

@section('container')
@section('title', 'User')
@section('admin', 'active')

<div class="container-fluid">
        <!-- Page Heading -->
        
        <div class="row mb-2">
                <div class="col-sm-6">
                    <h2 class="h3 text-gray-800">Edit User</h2>
                    <p class="mb-4 text-gray-800">Admin dapat mengubah user.</p>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a herf="#">Edit User</a></li>
                        <li class="breadcrumb-item active">Edit Data</li>
                    </ol>
                </div>
            </div>

        <div class="card shadow mb-4">
            <div class="card-body text-gray-800">
                <form class="row" action="{{ route('update-admin', $user->id) }}" method="post" class="user ml-5">
                    {{ csrf_field() }}
                    <dt class="col-sm-3 mt-2 ml-5 mr-5">Nama</dt>
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" name="name" placeholder="Nama Lengkap" required="required" value="{{ $user->name }}">
                    </div>

                    <dt class="col-sm-3 mt-2 ml-5 mr-5">Telp/HP</dt>
                    <div class="form-group col-md-6">
                        <input type="number" class="form-control" name="telp" placeholder="Telp/HP" required="required" value="{{ $user->telp }}">
                    </div>

                    <dt class="col-sm-3 mt-2 ml-5 mr-5">Level</dt>
                    <div class="form-group col-md-6">
                        <select name="level" class="form-control col-md-6 w-100" required="required" id="">
                            <option value="{{ $user->level }}">{{ $user->level }}</option>
                            <option value="admin">admin</option>
                            <option value="unit">unit</option>
                        </select>        
                    </div>
                    <dt class="col-sm-3 mt-2 ml-5 mr-5">Email</dt>
                    <div class="form-group col-md-6">
                        <input type="email" class="form-control form-control-user" name="email"placeholder="Email Address" required="required" value="{{ $user->email }}">
                    </div>
                    <div class="form-group col-md-6 ml-5">
                    </div>
                        <button type="submit" class="btn btn-primary mb-4">Ubah Data</button>
                </form>
            </div>
        </div>
</div>
@endsection