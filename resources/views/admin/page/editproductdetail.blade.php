@extends('admin/master')

@section('head')
<link rel="stylesheet" href="source/admin/assets/css/detail-product.css">
@endsection

@section('content')
<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="panel panel-headline">
                <div class="panel-heading text-right">
                    <h3 class="panel-title">
                        <div class="input-group" id="tensp" style="width: 65%; margin-left: 35%">
                            <input class="form-control text-right" type="text" placeholder="Bàn phím cơ Fuhlen M87s Blue Kailh đen">
                        </div></h3>
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
                                        <label for="file-upload1" id="label1" class="custom-file-upload"><i class="lnr lnr-sync"></i></label>
                                        <img id="test1" src="https://i.imgur.com/9rv7nCf.jpg" style="width:100%" onclick="imgshow(this);">
                                    </div>
                                    <div class="column1" id="column2">
                                        <label for="file-upload2" id="label2" class="custom-file-upload"><i class="lnr lnr-sync"></i></label>
                                        <img id="test2" src="https://i.imgur.com/cRvQ900.jpg" style="width:100%" onclick="imgshow(this);">
                                    </div>
                                    <div class="column1" id="column3">
                                        <label for="file-upload3" id="label3" class="custom-file-upload"><i class="lnr lnr-sync"></i></label>
                                        <img id="test3" src="https://i.imgur.com/semuiGA.jpg" style="width:100%" onclick="imgshow(this);">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7">
                            <label for="basic">Giá sản phẩm: </label>
                            <div class="input-group" id="giasp">
                                <input class="form-control" type="text" placeholder="100.000.000">
                                <span class="input-group-addon">VND</span>
                            </div>
                            <div class="space15">&nbsp;</div>
                            <label for="basic">Thông số kỹ thuật:</label>
                            <select class="form-control">
                                <option value="mozarella">RAM</option>
                                <option value="cheese">RAM</option>
                                <option value="tomatoes">CPU</option>
                                <option value="mozarella">Mozzarella</option>
                                <option value="mushrooms">Mushrooms</option>
                                <option value="pepperoni">Pepperoni</option>
                                <option value="onions">Onions</option>
                            </select>
                            <div class="space15">&nbsp;</div>
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
                                            <input type="text" class="form-control" placeholder="text field">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="text-table">23Simon</div>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" placeholder="text field">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="text-table">1Simon</div>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" placeholder="text field">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="text-table">1Simon</div>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" placeholder="text field">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="text-table">1Simon</div>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" placeholder="text field">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="text-table">1Simon</div>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" placeholder="text field">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="text-table">1Simon</div>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" placeholder="text field">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="text-table">1Simon</div>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" placeholder="text field">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="text-table">1Simon</div>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" placeholder="text field">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="space15">&nbsp;</div>
                            <label for="basic">Tổng quan sản phẩm:</label>
                            <textarea class="form-control" style=" box-sizing: border-box; resize: none;" placeholder="Laptop Asus A510UA-EJ870T (Gold) thiết kế nhỏ gọn, vẻ ngoài năng động, phong cách đơn giản nhưng lại cực kỳ thời trang và tinh tế, cùng với vỏ ngoài phủ tông màu gold sang trọng tạo điểm nhấn cho máy. Màn hình 15.6 hiển thị hình ảnh sống động, sắc nét, cực kỳ chi tiết, độ tương phản tốt, không gây mỏi mắt, màu sắc cũng hết sức trung thực và đẹp mắt. Người dùng có thể tận hưởng những giây phút giải trí thú vị, đặc biệt là khi coi phim, xem video, hay đọc báo và lướt web giải trí sau những giờ làm việc mệt mỏi." data-autoresize rows="8"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="space10">&nbsp;</div>
                        </div>
                        <div class="col-lg-6">
                            <div class="space10">&nbsp;</div>
                            <button type="button" class="btn btn-default">Default</button>
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
      
