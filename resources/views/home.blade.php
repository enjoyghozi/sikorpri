@extends( 'layout.main' )

@section('container')
@section('title', 'Beranda')
@section('dashboard', 'active')

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row mb-2">
        <div class="col-sm-6">
            <div class="d-sm-flex align-items-center mb-2">
                <h1 class="h3 text-gray-800">Dashboard SIKORPRI </h1>
            </div>
                <p class="text-gray-800">( Sistem Informasi KORPRI Kabupaten Blora )</p>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a herf="#">Home</a></li>
                <li class="breadcrumb-item active">Beranda</li>
            </ol>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row justify-content-center mt-5">

        <!-- Jumlah Unit KORPRI Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                JUMLAH UNIT KORPRI
                            </div>
                            @foreach($unit as $item)
                            <div class="h6 mb-0 font-weight-bold text-gray-800"><a href="/unit" class="text-gray-800">{{ $item->count() }} Unit</a> </div>
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
                            <div class="h6 mb-0 font-weight-bold text-gray-800"><a href="/anggota" class="text-gray-800">{{ $item->count() }} Anggota</a> </div>
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
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Saldo Saat Ini</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800">Rp {{ number_format($dtTransaksi->sum('total_pembayaran')) }}</div>
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
            
            <!-- Tasks -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Saldo Tali Asih & Uang Duka
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800">Rp {{ number_format($dtTaliasih->sum('total')) }}</div>
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
                            <i class="fas fa-thin fa-sack-dollar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Pie Chart</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-primary"></i> Anggota
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> Unit
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-info"></i> Saldo
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Task</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>

@endsection