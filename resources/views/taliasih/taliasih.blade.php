@extends( 'layout.main' )

@section('container')
@section('title', 'Taliasih')
@section('pembayaran', 'active')
<body class="hold-transition sidebar-mini">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h2 class="">Tambah Transaksi Tali Asih <br> & Uang Duka</h2>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a herf="#">Pembayaran</a></li>
                        <li class="breadcrumb-item active">TaliAsih&UangDuka</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="card shadow mb-4">
            <div class="card-header">
                    <a href="{{ route('create-taliasih') }}" class="btn btn-success">Tambah Data <i class="fas fa-plus-square"></i></a>
            
            <div class="card-body">
                <table class="table-striped" id="myTable">
                    <thead class="table-primary">
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Unit</th>
                            <th class="text-center">Tanggal</th>
                            <th class="text-center">Nominal </th>
                            <th class="text-center">Tindakan</th>
                        </tr>
                    </thead>
                    @foreach ($dttaliasih as $item)
                    <tbody>
                        <tr>
                            <td>{{$loop->iteration }}</td>
                            <td>{{ $item->unit }}</td>
                            <td class="text-center">{{ $item->tanggal }}</td>
                            <td class="text-center">Rp {{ number_format($item->nominal) }}</td>
                            <td>
                            @if (auth()->user()->level == "admin")
                                <a href="{{ url('edit-taliasih', $item->id) }}"><i class="fa-solid fa-pencil"></i></a> | <a href="#"><i class="fa-solid fa-trash-can delete-taliasih" data-id="{{$item->id}}" style="color: red"></i></a>
                            @endif
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>  
</body>
@include('sweetalert::alert')
@endsection