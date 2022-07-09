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
            <div class="card-body text-gray-800">
                <table class="table-striped" id="myTable">
                    <thead>
                        <tr class="table-primary">
                            <th class="text-gray-800">ID</th>
                            <th class="text-gray-800">Nama</th>
                            <th class="text-gray-800">Level</th>
                            <th class="text-gray-800">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user as $item)
                        <tr>
                            <td>{{ $item-> id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->level }}</td>
                            <td>{{ $item->email }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

</div>
@endsection