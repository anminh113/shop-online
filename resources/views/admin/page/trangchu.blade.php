@extends('admin/master')

@section('head')
    <style>
        #canvas-holder {
            width: 100%;
            margin-top: 50px;
            text-align: center;
        }
        #chartjs-tooltip1 {
            opacity: 1;
            position: absolute;
            background: rgba(0, 0, 0, .75);
            color: white;
            border-radius: 3px;
            -webkit-transition: all .1s ease;
            transition: all .1s ease;
            pointer-events: none;
            -webkit-transform: translate(-50%, 0);
            transform: translate(-50%, 0);
        }
        #chartjs-tooltip {
            opacity: 1;
            position: absolute;
            background: rgba(0, 0, 0, .75);
            color: white;
            border-radius: 3px;
            -webkit-transition: all .1s ease;
            transition: all .1s ease;
            pointer-events: none;
            -webkit-transform: translate(-50%, 0);
            transform: translate(-50%, 0);
        }

        .chartjs-tooltip-key {
            display: inline-block;
            width: 10px;
            height: 10px;
            margin-right: 10px;
        }
    </style>
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
                    {{--<p class="panel-subtitle">Từ: 07/2018 - 08/2019</p>--}}
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
                                    <span class="title">Lượt theo dõi</span>
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
                                    <span class="number">{{number_format($totalprice,3 ,'.', '.')}}₫</span>
                                    <span class="title">Tổng tiền</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6" style="border-right:solid 1px #dadada;">
                            <canvas id="doughnut-chart" width="400" height="400"></canvas>
                            <div id="chartjs-tooltip">
                                <table></table>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <canvas id="doughnut-chart1" width="400" height="400"></canvas>
                            <div id="chartjs-tooltip1">
                                <table></table>
                            </div>
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
                                @foreach(array_reverse($resultOrder['dataOrder']) as $item)
                                    <tr>
                                        <td><a href="#"><?php echo $i;?></a></td>
                                        <td>{{$item['order']['customer']['name']}}</td>
                                        <td>{{number_format($item['total'],3 ,'.', '.')}}₫</td>
                                        <td><script>var dtstart = moment('{{$item['order']['purchaseDate']}}').format('DD/MM/YYYY'); document.write(dtstart);</script></td>
                                        <td><span class="label label-success">{{$item['OrderItem']['orderItemState']['orderStateName']}}</span></td>
                                    </tr>
                                <?php $i++;?>
                                    @if($i>10)
                                        @break
                                    @endif
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
    var dynamicColors = function() {
        var r = Math.floor(Math.random() * 255);
        var g = Math.floor(Math.random() * 255);
        var b = Math.floor(Math.random() * 255);
        return "rgba(" + r + "," + g + "," + b + ", 0.75)";
    };
    var test = function(tooltip) {
        // Tooltip Element
        var tooltipEl = document.getElementById('chartjs-tooltip');

        // Hide if no tooltip
        if (tooltip.opacity === 0) {
            tooltipEl.style.opacity = 0;
            return;
        }

        // Set caret Position
        tooltipEl.classList.remove('above', 'below', 'no-transform');
        if (tooltip.yAlign) {
            tooltipEl.classList.add(tooltip.yAlign);
        } else {
            tooltipEl.classList.add('no-transform');
        }

        function getBody(bodyItem) {
            return bodyItem.lines;
        }

        // Set Text
        if (tooltip.body) {
            var titleLines = tooltip.title || [];
            var bodyLines = tooltip.body.map(getBody);

            var innerHtml = '';

            titleLines.forEach(function(title) {
                innerHtml += '<tr><th>' + title + '</th></tr>';
            });
            innerHtml += '<tbody>';

            bodyLines.forEach(function(body, i) {
                var colors = tooltip.labelColors[i];
                var style = 'background:' + colors.backgroundColor;
                style += '; border-color:' + colors.borderColor;
                style += '; border-width: 2px';
                var span = '<span class="chartjs-tooltip-key" style="' + style + '"></span>';
                innerHtml += '<tr><td>' + span + body + ' Sản phẩm</td></tr>';
            });
            innerHtml += '</tbody>';

            var tableRoot = tooltipEl.querySelector('table');
            tableRoot.innerHTML = innerHtml;
        }

        var positionY = this._chart.canvas.offsetTop;
        var positionX = this._chart.canvas.offsetLeft;

        // Display, position, and set styles for font
        tooltipEl.style.opacity = 1;
        tooltipEl.style.left = positionX + tooltip.caretX + 'px';
        tooltipEl.style.top = positionY + tooltip.caretY + 'px';
        tooltipEl.style.fontFamily = tooltip._bodyFontFamily;
        tooltipEl.style.fontSize = tooltip.bodyFontSize;
        tooltipEl.style.fontStyle = tooltip._bodyFontStyle;
        tooltipEl.style.padding = tooltip.yPadding + 'px ' + tooltip.xPadding + 'px';
    };

    var config = {
        type: 'doughnut',
        data: {
            datasets: [{
                data: [
                    @foreach($datacategorystore['store']['categories'] as $key => $item)
                    @foreach($countcategory as $key1 => $value)
                    @if($item['category']['_id'] ==  $key1)
                    {{$value}},
                    @endif
                    @endforeach
                    @endforeach
                ],
                backgroundColor: [
                    @foreach($datacategorystore['store']['categories'] as $item)
                    dynamicColors(),
                    @endforeach
                ],
            }],
            labels: [
                @foreach($datacategorystore['store']['categories'] as $item)
                    "{{$item['category']['categoryName']}}",
                @endforeach
            ]
        },
        options: {
            responsive: true,
            title: {
                display: true,
                text: 'Sản phẩm bán ra dựa theo danh mục sản phẩm',
                fontSize : 18,
                fontColor : "#111"
            },
            legend: {
                position: 'right'
            },
            tooltips: {
                enabled: false,
                custom:test
            }
        }
    };


    var test1 = function(tooltip1) {
        // Tooltip Element
        var tooltipEl = document.getElementById('chartjs-tooltip1');

        // Hide if no tooltip
        if (tooltip1.opacity === 0) {
            tooltipEl.style.opacity = 0;
            return;
        }

        // Set caret Position
        tooltipEl.classList.remove('above', 'below', 'no-transform');
        if (tooltip1.yAlign) {
            tooltipEl.classList.add(tooltip1.yAlign);
        } else {
            tooltipEl.classList.add('no-transform');
        }

        function getBody(bodyItem) {
            return bodyItem.lines;
        }

        // Set Text
        if (tooltip1.body) {
            var titleLines = tooltip1.title || [];
            var bodyLines = tooltip1.body.map(getBody);

            var innerHtml = '';

            titleLines.forEach(function(title) {
                innerHtml += '<tr><th>' + title + '</th></tr>';
            });
            innerHtml += '<tbody>';
            bodyLines.forEach(function(body, i) {
                var colors = tooltip1.labelColors[i];
                var style = 'background:' + colors.backgroundColor;
                style += '; border-color:' + colors.borderColor;
                style += '; border-width: 2px';
                var span = '<span class="chartjs-tooltip-key" style="' + style + '"></span>';
                innerHtml += '<tr><td>' + span + body + '.000₫</td></tr>';
            });
            innerHtml += '</tbody>';
            var tableRoot = tooltipEl.querySelector('table');
            tableRoot.innerHTML = innerHtml;
        }
        var positionY = this._chart.canvas.offsetTop;
        var positionX = this._chart.canvas.offsetLeft;

        // Display, position, and set styles for font
        tooltipEl.style.opacity = 1;
        tooltipEl.style.left = positionX + tooltip1.caretX + 'px';
        tooltipEl.style.top = positionY + tooltip1.caretY + 'px';
        tooltipEl.style.fontFamily = tooltip1._bodyFontFamily;
        tooltipEl.style.fontSize = tooltip1.bodyFontSize;
        tooltipEl.style.fontStyle = tooltip1._bodyFontStyle;
        tooltipEl.style.padding = tooltip1.yPadding + 'px ' + tooltip1.xPadding + 'px';
    };

    var config1 = {
        type: 'doughnut',
        data: {
            datasets: [{
                data: [
                    @foreach($datacategorystore['store']['categories'] as $key => $item)
                    @foreach($counts as $key1 => $value)
                    @if($item['category']['_id'] ==  $key1)
                    '{{number_format($value, 0, ' ', '.')}}',
                    @endif
                    @endforeach
                    @endforeach
                ],
                backgroundColor: [
                    @foreach($datacategorystore['store']['categories'] as $item)
                    dynamicColors(),
                    @endforeach
                ],
            }],
            labels: [
                @foreach($datacategorystore['store']['categories'] as $item)
                "{{$item['category']['categoryName']}}",
                @endforeach
            ]
        },
        options: {
            responsive: true,
            title: {
                display: true,
                text: 'Doanh thu dựa theo danh mục sản phẩm',
                fontSize : 18,
                fontColor : "#111"
            },
            legend: {
                position: 'right'
            },
            tooltips: {
                enabled: false,
                custom:test1
            }
        }
    };

    window.onload = function() {
        var ctx = document.getElementById('doughnut-chart');
        var ctx1 = document.getElementById('doughnut-chart1');
        window.myPie = new Chart(ctx1, config1);
        window.myPie = new Chart(ctx, config);
    };
</script>


@endsection