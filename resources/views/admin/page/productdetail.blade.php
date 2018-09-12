@extends('admin/master')

@section('head')
<link rel="stylesheet" href="source/admin/assets/css/detail-product.css">
@endsection

@section('content')

@section('sidebar')
    <li><a href="index-admin" class=""><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
    <li><a href="category-admin" class=""><i class="lnr lnr-code"></i> <span>Category</span></a></li>
    <li><a href="product-admin" class="active"><i class="lnr lnr-chart-bars"></i> <span>Product</span></a></li>
    <li><a href="panels.html" class=""><i class="lnr lnr-cog"></i> <span>Panels</span></a></li>
    <li><a href="notifications.html" class=""><i class="lnr lnr-alarm"></i> <span>Notifications</span></a></li>
    <li><a href="tables.html" class=""><i class="lnr lnr-dice"></i> <span>Tables</span></a></li>
    <li><a href="typography.html" class=""><i class="lnr lnr-text-format"></i> <span>Typography</span></a></li>
    <li><a href="icons.html" class=""><i class="lnr lnr-linearicons"></i> <span>Icons</span></a></li>
@endsection
<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="panel panel-headline">
                <div class="panel-heading text-right">
                    <h2 class="panel-title">Bàn phím cơ Fuhlen M87s Blue Kailh đen</h2>
                    <p class="panel-subtitle">
                        <ul class="breadcrumb">
                            <li><a href="#">Chuột</a></li>
                            <li>Mã sản phẩm: XXX</li>
                        </ul>
                    </p>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <form id="imgur" class="upload">
                            <input type="file" id="file-upload1" class=" imgur btn btn-default btn-file" accept="image/*" data-max-size="5000" />
                            <input type="file" id="file-upload2" class=" imgur btn btn-default btn-file" accept="image/*" data-max-size="5000" />
                            <input type="file" id="file-upload3" class=" imgur btn btn-default btn-file" accept="image/*" data-max-size="5000" />
                        </form>
                        <div class="col-lg-5 col-md-5">
                            <div class="container-fluid" style="padding-right: 0px; margin-right: -15px;">
                                <div class="image_selected" id="image_selected">
                                    <img id="expandedImg" src="https://i.imgur.com/9rv7nCf.jpg" style="width:100%">
                                </div>
                                <div class="image-column">
                                    <div class="column1" id="column1">
                                        <!-- <label for="file-upload1" id="label1" class="custom-file-upload"><i class="lnr lnr-sync"></i></label> -->
                                        <img id="test1" src="https://i.imgur.com/9rv7nCf.jpg" style="width:100%" onclick="imgshow(this);">
                                    </div>
                                    <div class="column1" id="column2">
                                        <!-- <label for="file-upload2" id="label2" class="custom-file-upload"><i class="lnr lnr-sync"></i></label> -->
                                        <img id="test2" src="https://i.imgur.com/cRvQ900.jpg" style="width:100%" onclick="imgshow(this);">
                                    </div>
                                    <div class="column1" id="column3">
                                        <!-- <label for="file-upload3" id="label3" class="custom-file-upload"><i class="lnr lnr-sync"></i></label> -->
                                        <img id="test3" src="https://i.imgur.com/semuiGA.jpg" style="width:100%" onclick="imgshow(this);">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7">
                            <div class="space10">&nbsp;</div>
                            <label for="basic" style="font-size: 19px">Giá sản phẩm: </label>
                            <div id="giasp">
                                <span style="font-size: 20px">99.000.000 VND</span>
                                <br>
                                <span style="font-size: 18px; text-decoration: line-through;">100.000.000 VND</span>
                                <span style="font-size: 20px"> -5%</span>
                            </div>
                            <div class="space15">&nbsp;</div>
                            <label for="basic" style="font-size: 19px">Thông số kỹ thuật:</label>
                            <div class="space10">&nbsp;</div>
                            <table class="table form-style-4">
                                <!--    <thead>
                                    <tr>
                                        <th>Tên</th>
                                        <th>Thông số</th>
                                        
                                    </tr>
                                </thead> -->
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="text-table">1Simon</div>
                                        </td>
                                        <td>
                                            <div class="text-table">1Simon</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="text-table">23Simon</div>
                                        </td>
                                        <td>
                                            <div class="text-table">1Simon</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="text-table">1Simon</div>
                                        </td>
                                        <td>
                                            <div class="text-table">1Simon</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="text-table">1Simon</div>
                                        </td>
                                        <td>
                                            <div class="text-table">1Simon</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="text-table">1Simon</div>
                                        </td>
                                        <td>
                                            <div class="text-table">1Simon</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="text-table">1Simon</div>
                                        </td>
                                        <td>
                                            <div class="text-table">1Simon</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="text-table">1Simon</div>
                                        </td>
                                        <td>
                                            <div class="text-table">1Simon</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="text-table">1Simon</div>
                                        </td>
                                        <td>
                                            <div class="text-table">1Simon</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="text-table">1Simon</div>
                                        </td>
                                        <td>
                                            <div class="text-table">1Simon</div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="space10">&nbsp;</div>
                            <div class="space15">&nbsp;</div>
                            <label for="basic">Tổng quan sản phẩm:</label>
                            <p style="margin-left: 10px">Laptop Asus A510UA-EJ870T (Gold) thiết kế nhỏ gọn, vẻ ngoài năng động, phong cách đơn giản nhưng lại cực kỳ thời trang và tinh tế, cùng với vỏ ngoài phủ tông màu gold sang trọng tạo điểm nhấn cho máy. Màn hình 15.6 hiển thị hình ảnh sống động, sắc nét, cực kỳ chi tiết, độ tương phản tốt, không gây mỏi mắt, màu sắc cũng hết sức trung thực và đẹp mắt. Người dùng có thể tận hưởng những giây phút giải trí thú vị, đặc biệt là khi coi phim, xem video, hay đọc báo và lướt web giải trí sau những giờ làm việc mệt mỏi. </p>
                            <p style="margin-left: 10px">Laptop Asus A510UA-EJ870T (Gold) thiết kế nhỏ gọn, vẻ ngoài năng động, phong cách đơn giản nhưng lại cực kỳ thời trang và tinh tế, cùng với vỏ ngoài phủ tông màu gold sang trọng tạo điểm nhấn cho máy. Màn hình 15.6 hiển thị hình ảnh sống động, sắc nét, cực kỳ chi tiết, độ tương phản tốt, không gây mỏi mắt, màu sắc cũng hết sức trung thực và đẹp mắt. Người dùng có thể tận hưởng những giây phút giải trí thú vị, đặc biệt là khi coi phim, xem video, hay đọc báo và lướt web giải trí sau những giờ làm việc mệt mỏi. </p>
                        </div>
                        <div class="col-lg-6">
                            <div class="space10">&nbsp;</div>
                            <button type="button" class="btn btn-default" onclick="window.location='edit-product-detail-admin';">Default</button>
                            <button type="button" class="btn btn-primary">Primary</button>
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
<script src="source/admin/assets/scripts/iziToast.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js"></script>
<script src="source/admin/assets/scripts/detail-product.js"></script>
<script type="text/javascript">
    function imgshow(imgs) {
        var expandImg = document.getElementById("expandedImg");
        var imgText = document.getElementById("imgtext");
        expandImg.src = imgs.src;
        expandImg.parentElement.style.display = "block";
    }
</script>
<script type="text/javascript">
    jQuery.each(jQuery('textarea[data-autoresize]'), function() {
        var offset = this.offsetHeight - this.clientHeight;

        var resizeTextarea = function(el) {
            jQuery(el).css('height', 'auto').css('height', el.scrollHeight + offset);
        };
        jQuery(this).on('keyup input', function() { resizeTextarea(this); }).removeAttr('data-autoresize');
    });
</script>
@endsection
      