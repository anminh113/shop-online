<!-- Recently Viewed -->
<div class="viewed">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="viewed_title_container">
                    <h4 class="viewed_title">Gợi ý hôm nay</h4>
                    <div class="viewed_nav_container">
                        <div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
                        <div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
                    </div>
                </div>
                <div class="viewed_slider_container">
                    <!-- Recently Viewed Slider -->
                    <div class="owl-carousel owl-theme viewed_slider">
                        <?php $i = 1; shuffle($data1['products']);?>
                        @foreach ($data1['products'] as $item)
                        <?php $i = $i + 1?>
                        <div class="owl-item" >
                            <div class="viewed_item d-flex flex-column align-items-center justify-content-center text-center" style="height: 320px">
                                <div class="viewed_image"><img src="{{$item['image']}}"
                                        width="115" height="115" alt=""></div>
                                <div class="viewed_content text-center">
                                    <div class="viewed_name"><a href="{{ route('san-pham',$item['_id'] )}}">{{$item['productName']}}</a></div>
                                </div>
                                <ul class="item_marks">
                                    <li class="item_mark item_discount">-25%</li>
                                    <li class="item_mark item_new">new</li>
                                </ul>
                            </div>
                        </div>
                        @if($i>6)
                        @break
                        @endif
                        @endforeach
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>