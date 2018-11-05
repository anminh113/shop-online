@extends('admin/master')

@section('head')

@endsection

@section('content')


<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <!-- OVERVIEW -->
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Tổng quan về gian hàng</h3>
                    <p class="panel-subtitle">Từ: 07/2018 - 08/2019</p>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="metric">
                                <span class="icon" ><i class="fa fa-truck"></i></span>
                                <p>
                                    <span class="number">{{count($resultProductOrder['dataProductOrder'])}}</span>
                                    <span class="title">Số sản phẩm bán ra</span>
                                </p>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="metric">
                                <span class="icon"><i class="fa fa-eye"></i></span>
                                <p>
                                    <span class="number">{{$datafollowStore['count']}}</span>
                                    <span class="title">Lượt theo dỏi</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="metric">
                                <span class="icon"><i class="fa fa-thumbs-o-up"></i></span>
                                <p>
                                    <span class="number">{{$countrating}}%</span>
                                    <span class="title">Đánh giá tính cực</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="metric">
                                <span class="icon"><i class="fa fa-money"></i></span>
                                <p>
                                    <span class="number">{{number_format($totalprice)}},000₫</span>
                                    <span class="title">Tổng tiền</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6" style="border-right:solid 1px #dadada;">
                            <canvas id="doughnut-chart"></canvas>
                        </div>
                        <div class="col-lg-6">
                            <canvas id="doughnut-chart1"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END OVERVIEW -->
            <div class="row">
                <div class="col-md-12">
                    <!-- RECENT PURCHASES -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Khách hàng mua gần đây</h3>
                            <div class="right">
                                <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                            </div>
                        </div>
                        <div class="panel-body no-padding">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên khách hàng</th>
                                        <th>Tiền</th>
                                        <th>Ngày mua hàng</th>
                                        <th>trạng thái</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1;?>
                                @foreach($resultOrder['dataOrder'] as $item)
                                    <tr>
                                        <td><a href="#"><?php echo $i;?></a></td>
                                        <td>{{$item['product']['customer']['name']}}</td>
                                        <td>{{number_format($item['total'])}},000₫</td>
                                        <td><script>var dtstart = moment('{{$item['product']['purchaseDate']}}').format('DD/MM/YYYY'); document.write(dtstart);</script></td>
                                        <td><span class="label label-success">{{$item['OrderItem']['orderItemState']['orderStateName']}}</span></td>
                                    </tr>
                                <?php $i++;?>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="panel-footer">

                        </div>
                    </div>
                    <!-- END RECENT PURCHASES -->
                </div>
            </div>

        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->
@endsection

@section('footer')
<script>
    var element = document.getElementById("index-admin");
    element.classList.add("active");
</script>

<script>
    $(function() {

        new Chart(document.getElementById("doughnut-chart"), {
            type: 'doughnut',
            data: {
                labels: [
                    @foreach($datacategorystore['store']['categories'] as $item)
                        "{{$item['category']['categoryName']}}",
                    @endforeach
                ],
                datasets: [
                    {
                        label: "Sản phẩm bán ra dựa theo danh mục sản phẩm",
                        backgroundColor: [
                            @foreach($datacategorystore['store']['categories'] as $item)
                            (function(m, s, c) {
                                return (c ? arguments.callee(m, s, c - 1) : '#') + s[m.floor(m.random() * s.length)]
                            })(Math, 'ABCDEF0123456789', 5),
                            @endforeach
                        ],
                        data: [
                            @foreach($datacategorystore['store']['categories'] as $key => $item)
                            @foreach($countcategory as $key1 => $value)
                            @if($item['category']['_id'] ==  $key1)
                            {{$value}},
                            @endif
                            @endforeach
                            @endforeach
                        ]
                    }
                ]
            },
            options: {
                title: {
                    display: true,
                    text: 'Sản phẩm bán ra dựa theo danh mục sản phẩm'
                }
            }
        });

    });
</script>
<script>
    $(function() {

        new Chart(document.getElementById("doughnut-chart1"), {
            type: 'doughnut',
            data: {
                labels: [
                    @foreach($datacategorystore['store']['categories'] as $item)
                        "{{$item['category']['categoryName']}}",
                    @endforeach
                ],
                datasets: [
                    {
                        label: "doanh thu dựa theo danh mục sản phẩm",
                        backgroundColor: [
                            @foreach($datacategorystore['store']['categories'] as $item)
                            (function(m, s, c) {
                                return (c ? arguments.callee(m, s, c - 1) : '#') + s[m.floor(m.random() * s.length)]
                            })(Math, 'ABCDEF0123456789', 5),
                            @endforeach
                        ],
                        data: [
                            @foreach($datacategorystore['store']['categories'] as $key => $item)
                            @foreach($countcategory as $key1 => $value)
                            @if($item['category']['_id'] ==  $key1)
                            {{$value}},
                            @endif
                            @endforeach
                            @endforeach
                        ]
                    }
                ]
            },
            options: {
                title: {
                    display: true,
                    text: 'doanh thu dựa theo danh mục sản phẩm'
                }
            }
        });

    });
</script>
@endsection