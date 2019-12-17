@extends('admin.layout.master')
@section('content')
    <div id="content">


        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
            </div>

            <!-- Content Row -->
            <div class="row">

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Tổng đơn hàng</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{number_format($total_order)}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Tổng doanh thu dự kiến</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">$ {{number_format($total)}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Đơn hàng hoàn thành</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">$ {{number_format($total_order_sucess)}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Tổng doanh thu</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">$ {{number_format($total_price_sucsess)}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Area Chart -->
                <div class="col-xl-8 col-lg-7">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Đơn hàng cần xử lí</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead class="black white-text">
                                <tr>
                                    <th style="width: 2%">STT</th>
                                    <th style="width: 20%">Mã đơn hàng</th>
                                    <th>Thông tin người nhận</th>
                                    <th class="text-center" width="200px">Ngày mua</th>
                                    <th class="text-center" width="100px">Trạng thái</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($order_process as $item)
                                    <tr id="orderStatus{{$item->id}}" >
                                        <td style="text-align: center">{{$loop->iteration}}</td>
                                        <td><a href="{{route('order_admin.detail',$item->id)}}">{{$item->order_number}}</a></td>
                                        <td><div>
                                                <span>Tên khách hàng : {{$item->phone_number}}</span><br/>
                                                <span>Số điện thoại : {{$item->phone_number}}</span><br/>
                                                <span>Địa chỉ : {{$item->order_desc}}</span>
                                            </div></td>
                                        <td class="text-center">{{date_format($item->updated_time, 'h:m d-m-Y')}}</td>
                                        <td class="text-center">  @if($item->status == 0)
                                                <span  class="badge badge-pill badge-brand">Đặt hàng</span>
                                            @elseif($item->status == 1)
                                                <span  class="badge badge-pill badge-warning">Đang xử lí</span>
                                            @elseif($item->status == 2)
                                                <span  class="badge badge-pill badge-info">Đang giao hàng</span>
                                            @elseif($item->status == 3)
                                                <span  class="badge badge-pill badge-success">Hoàn thành</span>
                                            @elseif($item->status == 4)
                                                <span  class="badge badge-pill badge-dark">Đã thanh toán</span>
                                            @elseif($item->status == -1)
                                                <span  class="badge badge-pill badge-danger">Hủy</span>
                                            @endif</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Pie Chart -->
                <div class="col-xl-4 col-lg-5">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                    <div class="dropdown-header">Dropdown Header:</div>
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-pie pt-4 pb-2">
                                <canvas id="myPieChart"></canvas>
                            </div>
                            <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Direct
                    </span>
                                <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Social
                    </span>
                                <span class="mr-2">
                      <i class="fas fa-circle text-info"></i> Referral

                    </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Content Row -->
            <div class="row">
                <!-- Area Chart -->
                <div class="col-xl-8 col-lg-7">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Thống kê doanh thu năm 2019</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
{{--                            <div class="chart-area">--}}
                                <canvas id="lineChartExample"></canvas>
{{--                            </div>--}}
                        </div>
                    </div>
                </div>

                <!-- Pie Chart -->
                <div class="col-xl-4 col-lg-5">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                    <div class="dropdown-header">Dropdown Header:</div>
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-pie pt-4 pb-2">
                                <canvas id="myPieChart"></canvas>
                            </div>
                            <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Direct
                    </span>
                                <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Social
                    </span>
                                <span class="mr-2">
                      <i class="fas fa-circle text-info"></i> Referral
                    </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" id="labels" value="{{json_encode($labels)}}"/>
            <input type="hidden" id="data" value="{{json_encode($data)}}"/>
            <!-- Content Row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    @endsection
@section('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>
        var ctx = document.getElementById('lineChartExample').getContext('2d');
        var labels = JSON.parse($('#labels').val());
        var data = JSON.parse($('#data').val());
        // console.log(backgroundColor,'backgroundColorbackgroundColorbackgroundColor');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Doanh thu',
                    data: data,
                    backgroundColor: 'rgba(0, 0, 0, 0)',
                    borderColor: '#0B86DF',
                    borderWidth: 3,

                }],
            },
            maintainAspectRatio: false,
            responsive: true,
            options: {
                tooltips: {
                    mode: 'index',
                    axis: 'y'
                },
                scales:
                    {
                        yAxes:
                            [
                                {
                                    scaleLabel: {display: true, labelString: 'Tổng doanh thu'},
                                    position: 'left', id: 'y-axis-2', type: 'linear',
                                    ticks: {min: 0, beginAtZero: true},
                                    gridLines: {display: false},

                                }
                            ]
                    },
                legend: {position: 'bottom'}
            },
        });
    </script>
@endsection