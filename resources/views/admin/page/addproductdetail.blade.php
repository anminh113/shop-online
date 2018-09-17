@extends('admin/master')

@section('head')
<link href="{{ URL::asset('source/admin/assets/css/detail-product.css') }}" rel="stylesheet" type="text/css" >

@endsection

@section('content')


<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="panel panel-headline">
                <div class="panel-heading text-right">
                    <div class="row">
                        <div class="col-lg-4 col-md-4"></div>
                        <div class="col-lg-8 col-md-8">
                            <h3 class="panel-title"><input class="form-control input-lg" type="text" placeholder="Tên sản phẩm "></h3>
                            <p class="panel-subtitle">
                                <ul class="breadcrumb">
                                    <!-- <li><a href="#">Chuột</a></li> -->
                                    <li>Mã sản phẩm: XXX</li>
                                </ul>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                    
                        <form id="imgur">
                            <input type="file" id="file-upload1" class=" imgur btn btn-default btn-file" style="display:none" accept="image/*" data-max-size="5000" />
                            <input type="file" id="file-upload2" class=" imgur btn btn-default btn-file" style="display:none" accept="image/*" data-max-size="5000" />
                            <input type="file" id="file-upload3" class=" imgur btn btn-default btn-file" style="display:none" accept="image/*" data-max-size="5000" />
                        </form>
                        <div class="col-lg-5 col-md-5">
                            <div class="container-fluid" style="padding-right: 0px; margin-right: -15px;">
                                <div class="image_selected" id="image_selected">
                                    <img id="expandedImg" src="http://placehold.it/1000x1000/cccccc/000000" style="width:100%">
                                </div>
                                <div class="image-column">
                                    <div class="column">
                                        <label for="file-upload1" id="label1" class="custom-file-upload">
                                            <img id="test1" src="http://placehold.it/1920x1080?text= Thêm ảnh" style="width:100%" onclick="imgshow(this);"> </label>
                                    </div>
                                    <div class="column">
                                        <label for="file-upload2" id="label2" class="custom-file-upload">
                                            <img id="test2" src="http://placehold.it/1920x1080?text= Thêm ảnh" style="width:100%" onclick="imgshow(this);"> </label>
                                    </div>
                                    <div class="column">
                                        <label for="file-upload3" id="label3" class="custom-file-upload">
                                            <img id="test3" src="http://placehold.it/1920x1080?text= Thêm ảnh" style="width:100%" onclick="imgshow(this);">
                                        </label>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7">
                            <label for="basic">Giá sản phẩm:</label>
                            <div class="input-group">
                                <input class="form-control" type="text">
                                <span class="input-group-addon">VND</span>
                            </div>
                            <div class="space15">&nbsp;</div>
                            <label for="basic">Chọn danh mục sản phẩm:</label>
                            <select class="form-control">
                                <option value="mozarella">Chọn danh mục</option>
                                <option value="cheese">RAM</option>
                                <option value="tomatoes">CPU</option>
                                <option value="mozarella">Mozzarella</option>
                                <option value="mushrooms">Mushrooms</option>
                                <option value="pepperoni">Pepperoni</option>
                                <option value="onions">Onions</option>
                            </select>
                            <div class="space15">&nbsp;</div>
                            <label for="basic">Thông số kỹ thuật:</label>
                            <select class="form-control">
                                <option value="mozarella">Chọn loại thông số kỹ thuật</option>
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
                            <textarea class="form-control" style=" box-sizing: border-box; resize: none;" placeholder="Thông tin thêm " data-autoresize rows="4"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="space10">&nbsp;</div>
                        </div>
                        <div class="col-lg-7">
                            <div class="space10">&nbsp;</div>
                            <button type="button" class="btn btn-outline- btn-save" onclick="window.location='add-product-detail-admin';">Thêm sản phẩm</button>
                            {{-- <button type="button" class="btn btn-outline- btn-change" onclick="window.location='add-product-detail-admin';">Thêm sản phẩm</button> --}}
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
<script type="text/javascript" src="{{ URL::asset('source/admin/assets/scripts/iziToast.min.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js"></script>
<script type="text/javascript" src="{{ URL::asset('source/admin/assets/scripts/upload.js') }}"></script>

<script>
        var element = document.getElementById("product-admin");
        element.classList.add("active");
</script>
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