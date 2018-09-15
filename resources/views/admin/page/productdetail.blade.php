@extends('admin/master')

@section('head')
<link rel="stylesheet" href="source/admin/assets/css/detail-product.css">
@endsection

@section('content')


<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        @foreach ($result['data'] as $item)
            <div class="container-fluid">
                <div class="panel panel-headline">
                    <div class="panel-heading text-right">
                    <h2 class="panel-title">{{$item['product']['productName']}}</h2>
                        <p class="panel-subtitle">
                            <ul class="breadcrumb">
                                <li>{{$item['product']['productType']['productTypeName']}}</li>
                                {{-- <li>Mã sản phẩm: XXX</li> --}}
                            </ul>
                        </p>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            {{-- <form id="imgur" class="upload">
                                <input type="file" id="file-upload1" class=" imgur btn btn-default btn-file" accept="image/*" data-max-size="5000" />
                                <input type="file" id="file-upload2" class=" imgur btn btn-default btn-file" accept="image/*" data-max-size="5000" />
                                <input type="file" id="file-upload3" class=" imgur btn btn-default btn-file" accept="image/*" data-max-size="5000" />
                            </form> --}}
                            <div class="col-lg-5 col-md-5">
                                <div class="container-fluid" style="padding-right: 0px; margin-right: -15px;">
                                    <div class="image_selected" id="image_selected">
                                        @foreach ($result1['datatext'] as $da )
                                            @foreach ($da['images'] as $da1)   
                                                    <img id="expandedImg" src={{$da1["imageURL"]}} style="width:100%">
                                                    @break
                                            @endforeach 
                                        @endforeach
                                        {{-- <img id="expandedImg" src="https://i.imgur.com/9rv7nCf.jpg" style="width:100%"> --}}

                                    </div>
                                    <div class="image-column">
                                        @foreach ($result1['datatext'] as $da )
                                            @foreach ($da['images'] as $da1)  
                                            <div class="column1" id="column1">
                                                <img id="test1" src={{$da1["imageURL"]}} style="width:100%" onclick="imgshow(this);">
                                            </div>
                                            @endforeach 
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                            {{-- 4.999 -(4.999*5/100) --}}
                            <div class="col-lg-7 col-md-7">
                                <div class="space10">&nbsp;</div>
                                <label for="basic" style="font-size: 19px">Giá sản phẩm: </label>
                                <div id="giasp">
                                    <span style="font-size: 20px" id="price">{{$item['product']['price']}} VND</span>
                                    <br>
                                    <span style="font-size: 18px; text-decoration: line-through;">{{$item['product']['price']}} VND</span>
                                    <span style="font-size: 20px"> -{{$item['product']['saleOff']['discount']}}%</span>
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
                                        @foreach ($item['product']['specifications'] as $item1)
                                            <tr>
                                                <td>
                                                <div class="text-table">{{$item1['title']}}</div>
                                                </td>
                                                <td>
                                                    <div class="text-table">{{$item1['value']}}</div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="space10">&nbsp;</div>
                                <div class="space15">&nbsp;</div>
                                <label for="basic"><h3>Tổng quan sản phẩm:</h3> </label>
                                @foreach ($item['product']['overviews'] as $item2)
                                    @if ( count($item2['title']) === 1)
                                     <div></div>
                                    @else
                                        <b style="margin-left: 10px">{{$item2['title']}} </b>
                                    @endif

                                    <p style="margin-left: 10px">{{$item2['value']}}</p>

                                @endforeach
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
        @endforeach
    </div>
    <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->
@endsection

@section('footer')
<script src="source/admin/assets/scripts/iziToast.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js"></script>
<script src="source/admin/assets/scripts/detail-product.js"></script>

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

<script>
        var a = ('{{$item['product']['price']}}' - ('{{$item['product']['price']}}' * '{{$item['product']['saleOff']['discount']}}'/100) );
        document.getElementById('price').innerHTML = a.toPrecision(4)+" VND";
</script>
@endsection
      