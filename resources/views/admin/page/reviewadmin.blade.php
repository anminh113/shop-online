@extends('admin/master')

@section('head')
<link href="{{ URL::asset('source/admin/assets/css/product.css') }}" rel="stylesheet" type="text/css" >

<style type="text/css">
    .bar-verygood {
        height: 16px;
        background-color: #FFCC40;
    }
    
    .bar-good {
        height: 16px;
        background-color: #FFCC40;
    }
    
    .bar-bad {
        height: 16px;
        background-color: #FFCC40;
    }
    .product_item {
        position: inherit;
        display: table-column;
    }
    
    .page-active {
        display: block;
    }
    </style>
@endsection

@section('content')


<!-- MAIN -->
<div class="main">

    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="panel">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <h2 class="panel-title" style="width: 380px; font-size: 24px"><b>Đánh giá và nhận xét gian hàng</b> </h2>
                            <div class="space10">&nbsp;</div>
                        </div>
                       
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="section-title">Điểm đánh giá trung bình</div>
                            <div class="rating-overview">
                                <div class="left">
                                    <div class="score">
                                        <label class="average">{{$countrating}}%</label>
                                    </div>
                                    <div class="count">
                                        <div class="countText">
                                            Đánh giá tích cực
                                        </div>
                                    </div>
                                </div>
                                <div class="right">
                                    <div class="scoreItem">
                                        <div class="row">
                                                @if($datareviewshop['count'] != 0)
                                            <div class="col-lg-12">
                                                <div class="side" style="width: 15%">
                                                    <div class="tillet">Tốt</div>
                                                </div>
                                                <div class="middle" style="    width: 70%;">
                                                    <div class="bar-container" style="width: 80%">
                                                        <div class="bar-verygood" style=" width: {{number_format(($countstar_1 / $datareviewshop['count'])*100 , 0, '', '')}}%;"></div>
                                                    </div>
                                                </div>
                                                <div class="side right">
                                                    <div class="tillet">{{$countstar_1}}</div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="side" style="width: 15%">
                                                    <div class="tillet">Trung bình</div>
                                                </div>
                                                <div class="middle" style="    width: 70%;">
                                                    <div class="bar-container" style="width: 80%">
                                                        <div class="bar-good" style=" width: {{number_format(($countstar_2 / $datareviewshop['count'])*100 , 0, '', '')}}%;"></div>
                                                    </div>
                                                </div>
                                                <div class="side right">
                                                    <div class="tillet"> {{$countstar_2}}</div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="side" style="width: 15%">
                                                    <div class="tillet">Chưa tốt</div>
                                                </div>
                                                <div class="middle" style="    width: 70%;">
                                                    <div class="bar-container" style="width: 80%">
                                                        <div class="bar-bad" style=" width: {{number_format(($countstar_1 / $datareviewshop['count'])*100 , 0, '', '')}}%;"></div>
                                                    </div>
                                                </div>
                                                <div class="side right">
                                                    <div class="tillet"> {{$countstar_3}}</div>
                                                </div>
                                            </div>
                                            @else
                                            <div class="col-lg-12">
                                                    <div class="side" style="width: 15%">
                                                        <div class="tillet" >Tốt</div>
                                                    </div>
                                                    <div class="middle" style="width: 70%;">
                                                        <div class="bar-container" style="width: 80%">
                                                            <div class="bar-verygood" style=" width:0%;"></div>
                                                        </div>
                                                    </div>
                                                    <div class="side right">
                                                        <div class="tillet">0</div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="side" style="width: 15%">
                                                        <div class="tillet" >Trung bình</div>
                                                    </div>
                                                    <div class="middle" style="    width: 70%;">
                                                        <div class="bar-container" style="width: 80%">
                                                            <div class="bar-good" style=" width: 0%;"></div>
                                                        </div>
                                                    </div>
                                                    <div class="side right">
                                                        <div class="tillet"> 0</div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="side"style="width: 15%">
                                                        <div class="tillet" >Chưa tốt</div>
                                                    </div>
                                                    <div class="middle" style="    width: 70%;">
                                                        <div class="bar-container" style="width: 80%">
                                                            <div class="bar-bad" style=" width: 0%;"></div>
                                                        </div>
                                                    </div>
                                                    <div class="side right">
                                                        <div class="tillet"> 0</div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="section-title"> Nhận xét và đánh giá nhà bán hàng ({{$datareviewshop['count']}})</div>
                            <div class="sis-seller-reviews">
                                @if($datareviewshop['count'] != 0)
                                @foreach($datareviewshop['reviewStores'] as $item => $timereview)
                                <div class="seller-review-item">
                                    <div class="row rate">
                                        @if($timereview['ratingLevel']['ratingLevel'] == 1)
                                            <img class="" src="source/user/images/icon-color-verygood.png" width="24" height="24">&nbsp;&nbsp;<span> {{$timereview['ratingLevel']['description']}}</span>
                                        @endif
                                        @if($timereview['ratingLevel']['ratingLevel'] == 2)
                                            <img class="" src="source/user/images/icon-color-good.png" width="24" height="24">&nbsp;&nbsp;<span> {{$timereview['ratingLevel']['description']}}</span>
                                        @endif
                                        @if($timereview['ratingLevel']['ratingLevel'] == 3)
                                            <img class="" src="source/user/images/icon-color-bad.png" width="24" height="24">&nbsp;&nbsp;<span> {{$timereview['ratingLevel']['description']}}</span>
                                        @endif
                                        
                                    </div>
                                    <div class="row">
                                        <label class="comments">{{$timereview['review']}}</label>
                                    </div>
                                    <div class="row reviewer">
                                        <label class="itemFooter">{{$timereview['customer']['name']}} - {{$timereviewshop[$item]}}</label>
                                    </div>
                                </div>
                                @endforeach
                                @else
                                <div class="seller-review-item">
                                    
                                    <div class="row">
                                        <label class="comments">Chưa có đánh giá về gian hàng</label>
                                    </div>
                                    
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
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
        var element = document.getElementById("review-admin");
        element.classList.add("active");
</script>

@endsection 