@extends('admin/master')

@section('head')
<link href="{{ URL::asset('source/admin/assets/css/product.css') }}" rel="stylesheet" type="text/css">
<style>
        ul.activity-timeline>li:after{
            left: 11px;
            content: "";
            display: block;
            border-left: 1px solid #eaeaea;
            width: 1px;
            height: 70px;
            position: absolute;
            top: 30px;
            z-index: -1;
        }
        }
</style>
@endsection

@section('content')


    

<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="panel panel-profile">
                <div class="clearfix">
                    <!-- LEFT COLUMN -->
                    <div class="profile-left">
                        <!-- PROFILE HEADER -->
                        <div class="profile-header">
                            <div class="overlay"></div>
                            <div class="profile-main">
                                <h3 class="name">{{$data['store']['storeName']}}</h3>
                                <span class="online-status status-available">Available</span>
                            </div>
                            <div class="profile-stat">
                                <div class="row">
                                    <div class="col-md-4 stat-item">
                                        {{count($data['store']['categories'])}} <span>Danh mục</span>
                                    </div>
                                    <div class="col-md-4 stat-item">
                                        {{$datastoreproduct['count']}} <span>Sản phẩm</span>
                                    </div>
                                    <div class="col-md-4 stat-item">
                                            {{$countrating}}%  <span class="lnr lnr-thumbs-up"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END PROFILE HEADER -->
                        <!-- PROFILE DETAIL -->
                        <div class="profile-detail">
                            <div class="profile-info">
                                <h4 class="heading">Thông tin cơ bản</h4>
                                <ul class="list-unstyled list-justify">
                                    <li>Ngày tạo gian hàng <span><script>var dtstart = moment('{{$data['store']['createdDate']}}').format('MM/DD/YYYY'); document.write(dtstart);</script></span></li>
                                    <li>Số điện thoại <span>{{$data['store']['phoneNumber']}}</span></li>
                                      {{--<li>Email <span>{{$data['store']['customers']['email']}}</span></li>  --}}
                                    <li>Địa chỉ <span>{{$data['store']['location']}}</span></li>
                                </ul>
                            </div>
                            {{--<div class="text-center"><a href="#" class="btn btn-primary">Cập nhật</a></div>--}}
                        </div>
                        <!-- END PROFILE DETAIL -->
                    </div>
                    <!-- END LEFT COLUMN -->
                    <!-- RIGHT COLUMN -->
                    <div class="profile-right">

                        <!-- TABBED CONTENT -->
                        <div class="custom-tabs-line tabs-line-bottom left-aligned">
                            <ul class="nav" role="tablist">
                                <li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab">Đánh giá gian hàng</a></li>
                                {{--<li><a href="#tab-bottom-left2" role="tab" data-toggle="tab">Projects <span class="badge">7</span></a></li>--}}
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="tab-bottom-left1">
                                    @if($datareviewshop['count'] != 0)
                                    @foreach($datareviewshop['reviewStores'] as $item => $timereview)
                                <ul class="list-unstyled activity-timeline">
                                    <li>
                                        @if($timereview['ratingLevel']['ratingLevel'] == 1)
                                            <img class="" src="source/user/images/icon-color-verygood.png" width="24" height="24">&nbsp;&nbsp;<span> {{$timereview['ratingLevel']['description']}}</span>
                                        @endif
                                        @if($timereview['ratingLevel']['ratingLevel'] == 2)
                                            <img class="" src="source/user/images/icon-color-good.png" width="24" height="24">&nbsp;&nbsp;<span> {{$timereview['ratingLevel']['description']}}</span>
                                        @endif
                                        @if($timereview['ratingLevel']['ratingLevel'] == 3)
                                            <img class="" src="source/user/images/icon-color-bad.png" width="24" height="24">&nbsp;&nbsp;<span> {{$timereview['ratingLevel']['description']}}</span>
                                        @endif
                                        <p>{{$timereview['review']}} <span class="timestamp">{{$timereview['customer']['name']}} - {{$timereviewshop[$item]}}</span></p>
                                    </li>
                                    @endforeach
                                    @else
                                    <li>
                                        <i class="fa fa-cloud-upload activity-icon"></i>
                                        <p>Chưa đánh giá</p>
                                    </li>
                                    @endif
                                </ul>
                                {{--<div class="margin-top-30 text-center"><a href="#" class="btn btn-default">See all--}}
                                        {{--activity</a></div>--}}
                            </div>
                            <div class="tab-pane fade" id="tab-bottom-left2">
                                <div class="table-responsive">

                                </div>
                            </div>
                        </div>
                        <!-- END TABBED CONTENT -->
                    </div>
                    <!-- END RIGHT COLUMN -->
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
    var element = document.getElementById("profile-shop-admin");
    element.classList.add("active");
    
</script>

@endsection
