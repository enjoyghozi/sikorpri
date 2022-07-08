@extends( 'layout.main' )

@section('container')
@section('dashboard', 'active')

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center mb-2">
        <h1 class="h3">Dashboard Si KORPRI </h1>
    </div>
        <p>( Sistem Informasi KORPRI Kabupaten Blora )</p>

    <!-- Content Row -->
    <div class="row justify-content-center mt-5">

        <!-- Jumlah Unit KORPRI Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                JUMLAH UNIT KORPRI</div>
                            @foreach($unit as $item)
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $item->count() }} UNIT</div>
                            @endforeach
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-university fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Jumlah Angota KORPRI Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                TOTAL ANGGOTA</div>
                                @foreach ($anggota as $item)
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $item->count() }} ORANG</div>
                                @endforeach
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Saldo KORPRI Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Saldo Saat Ini
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">-</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar"
                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

@endsection