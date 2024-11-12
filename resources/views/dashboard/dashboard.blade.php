@extends('layouts.app')
@section('content')

<div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Dashboard</span>
            <h3 class="page-title">Overview</h3>
        </div>
    </div>
    <!-- End Page Header -->
    <!-- Small Stats Blocks -->
    <div class="row">
        <div class="col-lg col-md-6 col-sm-6 mb-4">
            <div class="stats-small stats-small--1 card card-small">
                <div class="card-body p-0 d-flex">
                    <div class="d-flex flex-column m-auto">
                        <div class="stats-small__data text-center">
                            <span class="stats-small__label text-uppercase">Products</span>
                            <h6 class="stats-small__value count my-3">{{$productCount}}</h6>
                        </div>
                        <div class="stats-small__data">
                            <!--<span class="stats-small__percentage stats-small__percentage--increase">4.7%</span>-->
                        </div>
                    </div>
                    <canvas height="120" class="blog-overview-stats-small-1"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg col-md-6 col-sm-6 mb-4">
            <div class="stats-small stats-small--1 card card-small">
                <div class="card-body p-0 d-flex">
                    <div class="d-flex flex-column m-auto">
                        <div class="stats-small__data text-center">
                            <span class="stats-small__label text-uppercase">Categories</span>
                            <h6 class="stats-small__value count my-3">{{$categoryCount}}</h6>
                        </div>
                        <div class="stats-small__data">
                            <!--<span class="stats-small__percentage stats-small__percentage--increase">12.4%</span>-->
                        </div>
                    </div>
                    <canvas height="120" class="blog-overview-stats-small-2"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg col-md-4 col-sm-6 mb-4">
            <div class="stats-small stats-small--1 card card-small">
                <div class="card-body p-0 d-flex">
                    <div class="d-flex flex-column m-auto">
                        <div class="stats-small__data text-center">
                            <span class="stats-small__label text-uppercase">Users</span>
                            <h6 class="stats-small__value count my-3">{{$userCount}}</h6>
                        </div>
                        <div class="stats-small__data">
                            <!--<span class="stats-small__percentage stats-small__percentage--decrease">3.8%</span>-->
                        </div>
                    </div>
                    <canvas height="120" class="blog-overview-stats-small-3"></canvas>
                </div>
            </div>
        </div>
    </div>
    <!-- End Small Stats Blocks -->
    <div class="row">
        <!-- New Draft Component -->
        <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
            <!-- Quick Post -->
            <div class="card card-small h-100">
                <div class="card-header border-bottom">
                    <h6 class="m-0">Yearly Product Creation Trend {{date("Y")}}</h6>
                </div>
                <div class="card-body d-flex flex-column">
                    <canvas id="productCreationChart"></canvas>
                </div>
            </div>
            <!-- End Quick Post -->
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
var ctx = document.getElementById('productCreationChart').getContext('2d');
var graphData = @json($graphData);
console.log(graphData);
var productCreationChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
                label: 'Yearly Products Creation Trend',
                data: graphData,
                borderColor: 'rgba(75, 192, 192, 1)',
                fill: false,
            }]
    }
});
</script>

@endsection