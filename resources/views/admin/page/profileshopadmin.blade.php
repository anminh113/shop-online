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
            <div class="panel panel-profile" style="    background-color: transparent;">
                <div class="clearfix">
                    <!-- LEFT COLUMN -->
                    <div class="profile-left"  style="position: inherit">
                        <!-- PROFILE HEADER -->
                        <div class="profile-header">
                            <div class="overlay"></div>
                            <div class="profile-main">
                                <h3 class="name">{{$data['store']['storeName']}}</h3>
                                <span class="online-status status-available">Đang hoạt động</span>
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
                                      <li>Email <span>{{$data['store']['email']}}</span></li>
                                    <li>Địa chỉ <span>{{$data['store']['location']}}</span></li>
                                </ul>
                            </div>
                            <div class="text-center"><a href=""   data-toggle="modal"
                                                        data-target="#informationshop" class="btn btn-primary">Cập nhật</a></div>
                        </div>
                        <!-- END PROFILE DETAIL -->
                    </div>
                    <!-- END LEFT COLUMN -->
                    <!-- RIGHT COLUMN -->
                    <div class="profile-right"  style="background-color: #fff; ">

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
                                    @foreach(array_reverse($datareviewshop['reviewStores']) as $item => $timereview)
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

<div class="modal fade" id="informationshop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="viewed_title" style="border-right:solid 1px #dadada;" id="exampleModalLabel">Cập nhật gian hàng&nbsp;</h4>&nbsp;
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('update-profile-shop-admin')}}" method="POST" id="update" name="update">
                    <div class="row">
                        <div class="col-lg-6 order-lg-1 order-1">
                            <div class="form-group">
                                <label for="">Địa điểm</label>
                                <select name="tinh-thanhpho" id="tinh-thanhpho" class="form-control" required="required" style="margin-left: 0px;"
                                        id="">
                                    <option value="">Chọn tỉnh thành</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 order-lg-3 order-2">
                            <div class="form-group">
                                <label for="">Số điện thoại</label>
                                <input type="number" required="required" value="{{$data['store']['phoneNumber']}}" class="form-control" id="" name="sdt">
                            </div>
                        </div>
                        <div class="col-lg-6 order-lg-3 order-2">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" required="required" value="{{$data['store']['email']}}" class="form-control" id="" name="email">
                            </div>
                        </div>
                        <input type="text" hidden value="{{$data['store']['_id']}}" name="storeId">

                    </div>
                    @method('PATCH')
                    {{ csrf_field() }}
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                <button type="submit" form="update" class="btn btn-outline-warning btn-save text-right">Lưu thông tin
                </button>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("form[name='update']").validate({
                errorElement: "em",
                submitHandler: function(form) {
                    form.submit();
                }
            });
        });
    </script>
</div>


@endsection

@section('footer')
<script>
    var element = document.getElementById("profile-shop-admin");
    element.classList.add("active");
    
</script>
<script>
    $(document).ready(function () {

        load_json_data('tinh-thanhpho');

        function load_json_data(id, parent_id) {
            var html_code = '';
            $.getJSON("source/user/datacontry/tinh_tp.json", function (data) {
                html_code += '<option value="">Chọn tỉnh thành</option>';
                $.each(data, function (key, value) {
                    if (id == 'tinh-thanhpho') {
                        if (value.type == 'tinh' || value.type == 'thanh-pho') {
                            html_code += '<option value="' + value.name + '">' + value.name_with_type +
                                '</option>';
                        }
                    } else {
                        if (value.code == parent_id) {
                            html_code += '<option value="' + value.name + '">' + value.name_with_type +
                                '</option>';
                        }
                    }
                });
                $('#tinh-thanhpho').html(html_code);
            });
        }
    });
</script>

@endsection
