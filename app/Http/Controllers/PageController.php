<?php
    namespace App\Http\Controllers;
    use View, Input, Redirect;
    use App\Cart;
    use Session;
    use Illuminate\Http\Request;
    use GuzzleHttp\Client;
    use GuzzleHttp\Promise;
    use GuzzleHttp\Pool;
    use Illuminate\Support\Facades\Log;
    use GuzzleHttp\Exception\RequestException;
    use DateTime;
    use Date;
    use DateTimeZone;
 
    class PageController extends Controller{

        // Đăng nhập admin
        public function getLoginAdmin(){
            session()->forget('key');
            session()->forget('SearchProductTypeId');
            session()->forget('SearchSaleOffId');
            session()->forget('HasSearchSaleOffId');
            return view('admin/page.loginadmin');        
        }
        
        //User

        public static function getUrl($text){
            $urlAPI = "http://localhost:3000/".$text;
                // $urlAPI = "http://172.16.198.84:3000/".$text;            
            return $urlAPI;
        }

        public function getIndex(){
            $client1 = new \GuzzleHttp\Client();
            $restime = $client1->request('GET','http://api.geonames.org/timezoneJSON?formatted=true&lat=10.041791&lng=105.747099&username=cyberzone&style=full');
            $datatime = json_decode($restime->getBody()->getContents(), true);
            $todaytime = new DateTime($datatime['time']);
            $todaytime->setTimezone(new DateTimeZone('UTC'));
            $time =  $todaytime->format('Y-m-d\TH:i:s.u\Z');

            $res = $client1->request('GET',PageController::getUrl('products'));
            $data = json_decode($res->getBody()->getContents(), true);

            $datatext = array();

            $countstar_5 = 0;
            $countstar_4 = 0;
            $countstar_3 = 0;
            $countstar_2 = 0;
            $countstar_1 = 0;
            $datareview = array();
            $countstar = array();


            $countstar_5_guss = 0;
            $countstar_4_guss = 0;
            $countstar_3_guss = 0;
            $countstar_2_guss = 0;
            $countstar_1_guss = 0;
            $datareview_guss = array();
            $countstar_guss = array();

            for ($i=0;  $i < count($data['products']); $i++){
            $data2 = $data['products'][$i]['_id'];
            $res2 = $client1->request('GET',PageController::getUrl('productimages/product/'.$data2.''));
            $datatext[] = json_decode($res2->getBody()->getContents(), true);

            $res_guss = $client1->request('GET',PageController::getUrl('reviewProducts/product/'.$data2.''));
            $datareview_guss[] = json_decode($res_guss->getBody()->getContents(), true);

            
            }

            $result = compact('datatext');
            $resultdatareview_guss = compact('datareview_guss');
            array_push($data,$datareview_guss);

            for($i=0; $i < count($resultdatareview_guss['datareview_guss']); $i++){
                for($j=0; $j < count($resultdatareview_guss['datareview_guss'][$i]['reviewProducts']); $j++){
                $countstar_guss[] = $resultdatareview_guss['datareview_guss'][$i]['reviewProducts'][$j]['ratingStar']['ratingStar']    ;
                $datajson_guss =array(
                    "id" => $resultdatareview_guss['datareview_guss'][$i]['reviewProducts'][$j]['product']['_id'],
                    "value" =>  $countstar_guss
                );
                    switch ($countstar_guss[$j]) {
                        case "5":
                            $countstar_5_guss ++;
                            break;
                        case "4":
                            $countstar_4_guss ++;
                            break;
                        case "3":
                            $countstar_3_guss ++;
                            break;
                        case "2":
                            $countstar_2_guss ++;
                            break;
                        case "1":
                            $countstar_1_guss ++;
                            break;
                    
                    }
                }
            }

            $res1 = $client1->request('GET',PageController::getUrl('producttypes') );
            $dataproducttypes = json_decode($res1->getBody()->getContents(), true);


            $resproductPurchase = $client1->request('GET',PageController::getUrl('orderItems/productPurchase'));
            $dataproductPurchase = json_decode($resproductPurchase->getBody()->getContents(), true);
            $datatextproductPurchase = array();
          
            for ($i=0;  $i < count($dataproductPurchase['productPurchases']); $i++){
            $dataproductPurchase1 = $dataproductPurchase['productPurchases'][$i]['_id']['_id'];
            $res4 = $client1->request('GET',PageController::getUrl('products/'.$dataproductPurchase1.''));
            // $datatextproductPurchase[] = $dataproductPurchase1;
            $datatextproductPurchase[] = json_decode($res4->getBody()->getContents(), true);
            }
            $resultproductPurchase = compact('datatextproductPurchase');  
            

            $datatextproductPurchaseImage = array();
            for ($i=0;  $i < count($resultproductPurchase['datatextproductPurchase']); $i++){
            $data5 = $resultproductPurchase['datatextproductPurchase'][$i]['product']['_id'];
            $res5 = $client1->request('GET',PageController::getUrl('productimages/product/'.$data5.''));
            $datatextproductPurchaseImage[] = json_decode($res5->getBody()->getContents(), true);
            $res3 = $client1->request('GET',PageController::getUrl('reviewProducts/product/'.$data5.''));
            $datareview[] = json_decode($res3->getBody()->getContents(), true);
            }
            $resultproductPurchaseImage = compact('datatextproductPurchaseImage');  
            $resultdatareview = compact('datareview');
            array_push($resultproductPurchase,$datareview);
            // $datajson1 = array();
            for($i=0; $i < count($data['0']); $i++){
                if(!empty($data['0'][$i])){
                    $countstar_5 = 0;
                    $countstar_4 = 0;
                    $countstar_3 = 0;
                    $countstar_2 = 0;
                    $countstar_1 = 0;
                    $countstar = array();
                    for ($j=0; $j < count($data['0'][$i]['reviewProducts']); $j++) { 
                        $IDreview[] =  $data['0'][$i]['reviewProducts'][$j]['product']['_id'];
                        $countstar[] = $data['0'][$i]['reviewProducts'][$j]['ratingStar']['ratingStar'];
                         switch ($countstar[$j]) {
                            case "5":
                                $countstar_5 ++;
                                break;
                            case "4":
                                $countstar_4 ++;
                                break;
                            case "3":
                                $countstar_3 ++;
                                break;
                            case "2":
                                $countstar_2 ++;
                                break;
                            case "1":
                                $countstar_1 ++;
                                break;      
                        }
                        if($j == (count($data['0'][$i]['reviewProducts']) -1)){
                            $text12  =  number_format((5 * $countstar_5 + 4 * $countstar_4 + 3 * $countstar_3 + 2 * $countstar_2 + 1 * $countstar_1)/($countstar_5+$countstar_4+$countstar_3+$countstar_2+$countstar_1), 1, '.', '');
                            $datajson1['countsar'][] = array(
                            "id" => array_pop($IDreview) ,
                            "value" => ($text12)
                        ); 
                        }
                    }  
                }      
            } 
            // dd($resultproductPurchase);
            return view('user/page.trangchu',compact('datajson_guss','datajson1','countstar_5_guss','countstar_4_guss','countstar_3_guss','countstar_2_guss','countstar_1_guss','countstar_5','countstar_4','countstar_3','countstar_2','countstar_1','resultproductPurchase','resultproductPurchaseImage','data','result','resultPrice','time','dataproducttypes'));
        }
        
        public function getAddToCart(Request $req, $id){
            $client = new \GuzzleHttp\Client();
            $restime = $client->request('GET','http://api.geonames.org/timezoneJSON?formatted=true&lat=10.041791&lng=105.747099&username=cyberzone&style=full');
            $datatime = json_decode($restime->getBody()->getContents(), true);
            $todaytime = new DateTime($datatime['time']);
            $todaytime->setTimezone(new DateTimeZone('UTC'));
            $time =  $todaytime->format('Y-m-d\TH:i:s.u\Z');

         


            $oldCart = Session('cart')?Session::get('cart'):null;
            $cart = new Cart($oldCart);
            $cart->add($id,1 , $time);
            // $cart->add($data[0]['product'], $id,1, $datatext[0]['imageList'][0]['imageURL'], $time);
            $req->session()->put('cart', $cart);
            return redirect()->back();
        }

        public function getDelToCart($id){
            $oldCart = Session('cart') ? Session::get('cart'):null;
            $cart = new Cart($oldCart);
            $cart->removeItem($id);
            if(count($cart->items)>0){
                Session::put('cart', $cart);
                return redirect()->back();
            }else{
                Session::forget('cart');
                return redirect('productlist');
            }
            
        }
        
        public function getDelToCart1($id){
            $oldCart = Session('cart') ? Session::get('cart'):null;
            $cart = new Cart($oldCart);
            $cart->reduceByOne($id);
            if(count($cart->items)>0){
                Session::put('cart', $cart);
                return redirect()->back();
            }else{
                Session::forget('cart');
                return redirect('productlist');
            }
            
        }

        public function getProduct(Request $req){
            $data = array();
            $datatext = array();
            $timereview = array();
            $countstar = array();
            //get json san pham theo ID san pham

            //get thong tin san pham
            $client = new \GuzzleHttp\Client();

            $restime = $client->request('GET','http://api.geonames.org/timezoneJSON?formatted=true&lat=10.041791&lng=105.747099&username=cyberzone&style=full');
            $datatime = json_decode($restime->getBody()->getContents(), true);
            $todaytime = new DateTime($datatime['time']);
            $todaytime->setTimezone(new DateTimeZone('UTC'));
            $timeend =  $todaytime->format('Y-m-d\TH:i:s.u\Z');


            $res = $client->request('GET',PageController::getUrl('products/'.$req->id.'') );
            $data[] = json_decode($res->getBody()->getContents(), true);
            $resultdata = compact('data');
            //get anh san pham
            $res = $client->request('GET',PageController::getUrl('productimages/product/'.$req->id.''));
            $datatext[] = json_decode($res->getBody()->getContents(), true);
            $resultimg = compact('datatext');

            $res = $client->request('GET',PageController::getUrl('reviewProducts/product/'.$req->id.''));
            $datareview = json_decode($res->getBody()->getContents(), true);
            // dd($datareview);
            $countstar_5 = 0;
            $countstar_4 = 0;
            $countstar_3 = 0;
            $countstar_2 = 0;
            $countstar_1 = 0;



            for($i=0; $i<$datareview['count']; $i++){
                $dtstart = new DateTime($datareview['reviewProducts'][$i]['dateReview']);
                $dtstart->setTimezone(new DateTimeZone('UTC'));
                $timereview[] =  $dtstart->format('d/m/Y');

                $countstar[] = $datareview['reviewProducts'][$i]['ratingStar']['ratingStar'];
                switch ($countstar[$i]) {
                    case "5":
                        $countstar_5 ++;
                        break;
                    case "4":
                        $countstar_4 ++;
                        break;
                    case "3":
                        $countstar_3 ++;
                        break;
                    case "2":
                        $countstar_2 ++;
                        break;
                    case "1":
                        $countstar_1 ++;
                        break;
                    default:
                      
                        break;
                }
            }

            $datawl = '';
            if( Session::has('keyuser')){
                try {
                $reswl = $client->request('GET',PageController::getUrl('wishList/check/'.Session::get('keyuser')['info'][0]['customer']['_id'].'/'.$req->id.''));
                $datawl = json_decode($reswl->getBody()->getContents(), true);
                // dd($datawl);
                } catch (\GuzzleHttp\Exception\RequestException $e) {
                
                }


            }
         
            return view('user/page.product',compact('datawl','timeend','resultdata','resultimg','datareview','timereview','countstar_5','countstar_4','countstar_3','countstar_2','countstar_1'));
        }

        public function getProductList(){
             //get json san pham theo gian hang
            $client1 = new \GuzzleHttp\Client();
            $restime = $client1->request('GET','http://api.geonames.org/timezoneJSON?formatted=true&lat=10.041791&lng=105.747099&username=cyberzone&style=full');
            $datatime = json_decode($restime->getBody()->getContents(), true);
            $todaytime = new DateTime($datatime['time']);
            $todaytime->setTimezone(new DateTimeZone('UTC'));
            $time12 =  $todaytime->format('Y-m-d\TH:i:s.u\Z');

            $datat = array();
            $res = $client1->request('GET',PageController::getUrl('products'));
            $data = json_decode($res->getBody()->getContents(), true);
            for ($i=0;  $i < count($data['products']); $i++){
                if(!empty($data['products'][$i]['saleOff'])){
                    $datat[] =$data['products'][$i];
                }
            }
          
            $countstar_5 = 0;
            $countstar_4 = 0;
            $countstar_3 = 0;
            $countstar_2 = 0;
            $countstar_1 = 0;
            $datareview = array();
            $datatext = array();
            $countstar = array();
            
            for ($i=0;  $i < count($data['products']); $i++){
                $data2 = $data['products'][$i]['_id'];
                $res2 = $client1->request('GET',PageController::getUrl('productimages/product/'.$data2.''));
                $datatext[] = json_decode($res2->getBody()->getContents(), true);
                $res3 = $client1->request('GET',PageController::getUrl('reviewProducts/product/'.$data2.''));
                $datareview[] = json_decode($res3->getBody()->getContents(), true);
            }
            $result = compact('datatext');
            $resultdatareview = compact('datareview');
            array_push($data,$datareview);



            for($i=0; $i < count($data['0']); $i++){
                if(!empty($data['0'][$i])){
                    $countstar_5 = 0;
                    $countstar_4 = 0;
                    $countstar_3 = 0;
                    $countstar_2 = 0;
                    $countstar_1 = 0;
                    $countstar = array();
                    for ($j=0; $j < count($data['0'][$i]['reviewProducts']); $j++) { 
                        $IDreview[] =  $data['0'][$i]['reviewProducts'][$j]['product']['_id'];
                        $countstar[] = $data['0'][$i]['reviewProducts'][$j]['ratingStar']['ratingStar'];
                         switch ($countstar[$j]) {
                            case "5":
                                $countstar_5 ++;
                                break;
                            case "4":
                                $countstar_4 ++;
                                break;
                            case "3":
                                $countstar_3 ++;
                                break;
                            case "2":
                                $countstar_2 ++;
                                break;
                            case "1":
                                $countstar_1 ++;
                                break;      
                        }
                        if($j == (count($data['0'][$i]['reviewProducts']) -1)){
                            $text12  =  number_format((5 * $countstar_5 + 4 * $countstar_4 + 3 * $countstar_3 + 2 * $countstar_2 + 1 * $countstar_1)/($countstar_5+$countstar_4+$countstar_3+$countstar_2+$countstar_1), 1, '.', '');
                            $datajson1['countsar'][] = array(
                            "id" => array_pop($IDreview) ,
                            "value" => ($text12)
                        ); 
                        }
                    }  
                }      
            }    

                       



            $res3 = $client1->request('GET',PageController::getUrl('categories') );
            $data3 = json_decode($res3->getBody()->getContents(), true);
            $data4 =  $data3['categories'];
            for($i=0; $i<count($data3['categories']); $i++){
                $res1 = $client1->request('GET',PageController::getUrl('producttypes/category/'.$data3['categories'][$i]['_id'].'') );
                $data1[] = json_decode($res1->getBody()->getContents(), true);
            }
            $result1 = compact('data1');
         
           
            return view('user/page.productlist',compact('datajson1','data','result','result1','data4','resultPrice','time12','resultdatareview','countstar_5','countstar_4','countstar_3','countstar_2','countstar_1'));
        }

        public function getRegister(){
            return view('user/page.register');
        }

        public function getLogin(){
            session()->forget('keyuser');
            return view('user/page.login');
        }

        public function getProfileShop(Request $req){
              //get json san pham theo gian hang
              $client1 = new \GuzzleHttp\Client();
              $restime = $client1->request('GET','http://api.geonames.org/timezoneJSON?formatted=true&lat=10.041791&lng=105.747099&username=cyberzone&style=full');
              $datatime = json_decode($restime->getBody()->getContents(), true);
              $todaytime = new DateTime($datatime['time']);
              $todaytime->setTimezone(new DateTimeZone('UTC'));
              $time =  $todaytime->format('Y-m-d\TH:i:s.u\Z');

              $resshop = $client1->request('GET',PageController::getUrl('stores/'.$req->id.''));
              $datashop = json_decode($resshop->getBody()->getContents(), true);
  
              $res = $client1->request('GET',PageController::getUrl('products/store/'.$req->id.''));
              $data = json_decode($res->getBody()->getContents(), true);
               //end get json
           
              $datatext = array();
              $countstar_5 = 0;
              $countstar_4 = 0;
              $countstar_3 = 0;
              $countstar_2 = 0;
              $countstar_1 = 0;
              $datareview = array();
              $countstar = array();

              for ($i=0;  $i < count($data['products']); $i++){
              $data2 = $data['products'][$i]['_id'];
              $res2 = $client1->request('GET',PageController::getUrl('productimages/product/'.$data2.''));
              $datatext[] = json_decode($res2->getBody()->getContents(), true);
              $res3 = $client1->request('GET',PageController::getUrl('reviewProducts/product/'.$data2.''));
              $datareview[] = json_decode($res3->getBody()->getContents(), true);
              }

              $createdDate = new DateTime($datashop['store']['createdDate']);
              $createdDate->setTimezone(new DateTimeZone('UTC'));
              $createdTime =  $createdDate->format('d-m-Y');
              
              $result = compact('datatext');
              $resultdatareview = compact('datareview');
         
              array_push($data,$datareview);


              $res3 = $client1->request('GET',PageController::getUrl('categories') );
              $data3 = json_decode($res3->getBody()->getContents(), true);
              $data4 =  $data3['categories'];
              for($i=0; $i<count($data3['categories']); $i++){
                  $res1 = $client1->request('GET',PageController::getUrl('producttypes/category/'.$data3['categories'][$i]['_id'].'') );
                  $data1[] = json_decode($res1->getBody()->getContents(), true);
              }
              $result1 = compact('data1');


              for($i=0; $i < count($data['0']); $i++){
                if(!empty($data['0'][$i])){
                    $countstar_5 = 0;
                    $countstar_4 = 0;
                    $countstar_3 = 0;
                    $countstar_2 = 0;
                    $countstar_1 = 0;
                    $countstar = array();
                    for ($j=0; $j < count($data['0'][$i]['reviewProducts']); $j++) { 
                        $IDreview[] =  $data['0'][$i]['reviewProducts'][$j]['product']['_id'];
                        $countstar[] = $data['0'][$i]['reviewProducts'][$j]['ratingStar']['ratingStar'];
                         switch ($countstar[$j]) {
                            case "5":
                                $countstar_5 ++;
                                break;
                            case "4":
                                $countstar_4 ++;
                                break;
                            case "3":
                                $countstar_3 ++;
                                break;
                            case "2":
                                $countstar_2 ++;
                                break;
                            case "1":
                                $countstar_1 ++;
                                break;      
                        }
                        if($j == (count($data['0'][$i]['reviewProducts']) -1)){
                            $text12  =  number_format((5 * $countstar_5 + 4 * $countstar_4 + 3 * $countstar_3 + 2 * $countstar_2 + 1 * $countstar_1)/($countstar_5+$countstar_4+$countstar_3+$countstar_2+$countstar_1), 1, '.', '');
                            $datajson1['countsar'][] = array(
                            "id" => array_pop($IDreview) ,
                            "value" => ($text12)
                        ); 
                        }
                    }  
                }      
            }    

            $resreviewshop = $client1->request('GET',PageController::getUrl('reviewStores/store/'.$req->id.''));
            $datareviewshop = json_decode($resreviewshop->getBody()->getContents(), true);
            $countstar_3 = 0;
            $countstar_2 = 0;
            $countstar_1 = 0;
            $countstar = array();
            for($i=0; $i<$datareviewshop['count']; $i++){
                $dtstart = new DateTime($datareviewshop['reviewStores'][$i]['dateReview']);
                $dtstart->setTimezone(new DateTimeZone('UTC'));
                $timereviewshop[] =  $dtstart->format('d/m/Y');
                $countstar[] = $datareviewshop['reviewStores'][$i]['ratingLevel']['ratingLevel'];
                switch ($countstar[$i]) {
                    case "3":
                        $countstar_3 ++;
                        break;
                    case "2":
                        $countstar_2 ++;
                        break;
                    case "1":
                        $countstar_1 ++;
                        break;      
                }
            }
            if( $datareviewshop['count'] == 0 ){
                $countrating = 0;
            }else{
                $countrating = number_format((($countstar_2 + $countstar_1)/($countstar_2 + $countstar_1 + $countstar_3))*100, 1, '.', '');
            }
            //   dd($countrating);
            return view('user/page.profileshop', compact('countstar_1','countstar_2','countstar_3','countrating','timereviewshop','datareviewshop','createdTime','datashop', 'datajson1','data','result','result1','data4','resultPrice','time','resultdatareview','countstar_5','countstar_4','countstar_3','countstar_2','countstar_1'));
        }

        public function getCart(){
            //get thong tin san pham
            $client = new \GuzzleHttp\Client();
            $restime = $client->request('GET','http://api.geonames.org/timezoneJSON?formatted=true&lat=10.041791&lng=105.747099&username=cyberzone&style=full');
            $datatime = json_decode($restime->getBody()->getContents(), true);
            $todaytime = new DateTime($datatime['time']);
            $todaytime->setTimezone(new DateTimeZone('UTC'));
            $time =  $todaytime->format('Y-m-d\TH:i:s.u\Z');
            $res = $client->request('GET',PageController::getUrl('deliveryprices') );
            $data = json_decode($res->getBody()->getContents(), true);
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);
            $product_cart = $cart->items;           
            return view('user/page.cart',compact('product_cart','data','time'));
        }

        public function getCheckCart(){
            if (Session::has('Idaddress')){
                $client = new \GuzzleHttp\Client();
                $restime = $client->request('GET','http://api.geonames.org/timezoneJSON?formatted=true&lat=10.041791&lng=105.747099&username=cyberzone&style=full');
                $datatime = json_decode($restime->getBody()->getContents(), true);
                $todaytime = new DateTime($datatime['time']);
                $todaytime->setTimezone(new DateTimeZone('UTC'));
                $time =  $todaytime->format('Y-m-d\TH:i:s.u\Z');
                $res = $client->request('GET',PageController::getUrl('deliveryprices') );
                $data = json_decode($res->getBody()->getContents(), true);

                $oldCart = Session::get('cart');
                // dd($oldCart);
                $cart = new Cart($oldCart);
                $product_cart = $cart->items;  
                // dd(Session::get('keyuser'));

                $resPaymentMethods = $client->request('GET',PageController::getUrl('PaymentMethods') );
                $dataPaymentMethods = json_decode($resPaymentMethods->getBody()->getContents(), true);

                $resaddressone = $client->request('GET',PageController::getUrl('deliveryAddresses/'.Session::get('Idaddress').'') );
                $dataaddressone = json_decode($resaddressone->getBody()->getContents(), true);
                $resaddress = $client->request('GET',PageController::getUrl('deliveryaddresses/customer/'.Session::get('keyuser')['info'][0]['customer']['_id'].'') );
                $dataaddress = json_decode($resaddress->getBody()->getContents(), true);
                // dd($dataaddress);
                return view('user/page.checkcart',compact('product_cart','data','time','dataaddress','dataaddressone','dataPaymentMethods'));
            }
            if (Session::has('keyuser')){
                $client = new \GuzzleHttp\Client();
                $restime = $client->request('GET','http://api.geonames.org/timezoneJSON?formatted=true&lat=10.041791&lng=105.747099&username=cyberzone&style=full');
                $datatime = json_decode($restime->getBody()->getContents(), true);
                $todaytime = new DateTime($datatime['time']);
                $todaytime->setTimezone(new DateTimeZone('UTC'));
                $time =  $todaytime->format('Y-m-d\TH:i:s.u\Z');
                $res = $client->request('GET',PageController::getUrl('deliveryprices') );
                $data = json_decode($res->getBody()->getContents(), true);
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
                $product_cart = $cart->items;  
                $resPaymentMethods = $client->request('GET',PageController::getUrl('PaymentMethods') );
                $dataPaymentMethods = json_decode($resPaymentMethods->getBody()->getContents(), true);

                $resaddress = $client->request('GET',PageController::getUrl('deliveryaddresses/customer/'.Session::get('keyuser')['info'][0]['customer']['_id'].'') );
                $dataaddress = json_decode($resaddress->getBody()->getContents(), true);
                return view('user/page.checkcart',compact('product_cart','data','time','dataaddress','dataPaymentMethods'));
            }else{
                return redirect()->route('dang-nhap')->with(['flag'=>'info','title'=>'Cần đăng nhập' ,'message'=>' ']);
            }
           
        }

        public function getCheckOut(Request $req){
             if (Session::has('keyuser')){

                $client = new \GuzzleHttp\Client();
                $restime = $client->request('GET','http://api.geonames.org/timezoneJSON?formatted=true&lat=10.041791&lng=105.747099&username=cyberzone&style=full');
                $datatime = json_decode($restime->getBody()->getContents(), true);
                $todaytime = new DateTime($datatime['time']);
                $todaytime->setTimezone(new DateTimeZone('UTC'));
                $time =  $todaytime->format('Y-m-d\TH:i:s.u\Z');
                $res = $client->request('GET',PageController::getUrl('deliveryprices') );
                $data = json_decode($res->getBody()->getContents(), true);
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
                $product_cart = $cart->items;  

                $resorder = $client->request('GET',PageController::getUrl('orders/'.$req->id.'') );
                $dataorder = json_decode($resorder->getBody()->getContents(), true);
                // dd($dataorder);
                return view('user/page.checkout',compact('product_cart','data','time','dataorder'));
            }else{
                return redirect()->route('dang-nhap')->with(['flag'=>'info','title'=>'Cần đăng nhập' ,'message'=>' ']);
            }
        }

        public function getProfileUser(Request $req){
            $client = new \GuzzleHttp\Client();
            try {
                $rescustomer = $client->request('GET',PageController::getUrl('customers/account/'.$req->id.'') );
                $datacustomer = json_decode($rescustomer->getBody()->getContents(), true);
                $resaddress = $client->request('GET',PageController::getUrl('deliveryaddresses/customer/'.$datacustomer['customer']['_id'].'') );
                $dataaddress = json_decode($resaddress->getBody()->getContents(), true);
                // dd($dataaddress);
               
                
                $dtstart = new DateTime( $datacustomer['customer']['birthday']);
                $dtstart->setTimezone(new DateTimeZone('UTC'));
                $start =  $dtstart->format('Y-m-d');

                $resorder = $client->request('GET',PageController::getUrl('orders/customer/'.$datacustomer['customer']['_id'].'') );
                $dataorder = json_decode($resorder->getBody()->getContents(), true);
                // dd($dataorder);
                $dataorderitem = array();
                for ($i=0; $i <count($dataorder['orders']) ; $i++) { 
                    $resorderitem = $client->request('GET',PageController::getUrl('orderItems/order/'.$dataorder['orders'][$i]['_id'].'') );
                    $dataorderitem[] = json_decode($resorderitem->getBody()->getContents(), true);

                }
                $resultorderitem = compact('dataorderitem');
                // dd($resultorderitem);


                return view('user/page.profileuser',compact('datacustomer','dataaddress','start','dataorder','resultorderitem'));

            }catch (\GuzzleHttp\Exception\ClientException $e) {
                return $e->getResponse()->getStatusCode();
                
            }
            // dd($dataaddress);
            return view('user/page.profileuser',compact('datacustomer','dataaddress'));
        }

        public function getProfileUserShop(){
         
            return view('user/page.profileusershop');
        }

        public function getRegisterShop(){
            return view('user/page.registershop');
        }

        public function getReviewShop(Request $req){
              $client = new \GuzzleHttp\Client();
            try {
                $rescustomer = $client->request('GET',PageController::getUrl('customers/account/'.$req->id.'') );
                $datacustomer = json_decode($rescustomer->getBody()->getContents(), true);
                $resorder = $client->request('GET',PageController::getUrl('orders/customer/'.$datacustomer['customer']['_id'].'') );
                $dataorder = json_decode($resorder->getBody()->getContents(), true);
                // dd($dataorder);
                $dataorderitem = array();
                for ($i=0; $i <count($dataorder['orders']) ; $i++) { 
                    $resorderitem = $client->request('GET',PageController::getUrl('orderItems/order/'.$dataorder['orders'][$i]['_id'].'') );
                    $dataorderitem[] = json_decode($resorderitem->getBody()->getContents(), true);

                }

                $resultorderitem = compact('dataorderitem');
                // dd($resultorderitem);
                }catch (\GuzzleHttp\Exception\ClientException $e) {
                return $e->getResponse()->getStatusCode();
                
            }

            return view('user/page.reviewshop',compact('dataorder','resultorderitem'));
        }

        public function getWriteReviewShop(Request $req){
            // dd($req->id);
            $client = new \GuzzleHttp\Client();
            $res = $client->request('GET',PageController::getUrl('products/'.$req->id.'') );
            $data[] = json_decode($res->getBody()->getContents(), true);
            $resultdata = compact('data');
            // dd($resultdata);
            //get anh san pham
            $res = $client->request('GET',PageController::getUrl('productimages/product/'.$req->id.''));
            $datatext[] = json_decode($res->getBody()->getContents(), true);
            $resultimg = compact('datatext');
            return view('user/page.writereviewadmin',compact('resultdata','resultimg'));
        }

        //End user


        //Admin gian hàng
        public function getIndexAdmin(){
            if (Session::has('key') && Session::get('key')['role']['roleName'] == 'Quản lý gian hàng'){
                return view('admin/page.trangchu');
            }
            return redirect()->guest(route('login-admin'));            
        }

        public function getProductAdmin(){
            if (Session::has('key') && Session::get('key')['role']['roleName'] == 'Quản lý gian hàng'){
                $store = Session::get('key')[0]['store']['_id'];
                $client1 = new \GuzzleHttp\Client();
                if(Session::has('SearchProductTypeId')){

                    $res = $client1->request('GET',PageController::getUrl('products/store/producttype/'.$store.'/'.Session::get('SearchProductTypeId').''));
                    $data = json_decode($res->getBody()->getContents(), true);
                    //  dd($data);
                    //end get json
                    $datatext = array();
                    for ($i=0;  $i < count($data['products']); $i++){
                        $data2 = $data['products'][$i]['_id'];
                        $res2 = $client1->request('GET',PageController::getUrl('productimages/product/'.$data2.''));
                        $datatext[] = json_decode($res2->getBody()->getContents(), true);
                        
                    }
                    $result = compact('datatext');
                    // dd($result);
                    $res12 = PageController::getUrl('stores/'.$store.'');
                    $data_category = PageController::getUrl('categories');
                    $data_product_type = PageController::getUrl('producttypes/category');
                    $data_product_type_specificationtypes = PageController::getUrl('specificationtypes/producttype');

                    return view('admin/page.product', compact('data','res12' ,'result', 'store', 'data_category','data_product_type','data_product_type_specificationtypes'));

                }else{
                    //get json san pham theo gian hang
                   
                    $res = $client1->request('GET',PageController::getUrl('products/store/'.$store.''));
                    $data = json_decode($res->getBody()->getContents(), true);
                    //  dd($data);
                    //end get json
                    $datatext = array();
                    for ($i=0;  $i < count($data['products']); $i++){
                        $data2 = $data['products'][$i]['_id'];
                        $res2 = $client1->request('GET',PageController::getUrl('productimages/product/'.$data2.''));
                        $datatext[] = json_decode($res2->getBody()->getContents(), true);
                        
                    }
                    $result = compact('datatext');
                    // dd($result);
                    $res12 = PageController::getUrl('stores/'.$store.'');
                    $data_category = PageController::getUrl('categories');
                    $data_product_type = PageController::getUrl('producttypes/category');
                    $data_product_type_specificationtypes = PageController::getUrl('specificationtypes/producttype');

                    return view('admin/page.product', compact('data','result','res12' , 'store', 'data_category','data_product_type','data_product_type_specificationtypes'));
                }
            }
            return redirect()->guest(route('login-admin', [], false));            
               
        }

        public function getCategoryAdmin(){
            if (Session::has('key') && Session::get('key')['role']['roleName'] == 'Quản lý gian hàng'){
                $store = Session::get('key')[0]['store']['_id'];
                //get json danh muc all
                $client1 = new \GuzzleHttp\Client();
                $res = $client1->request('GET',PageController::getUrl('categories') );
                $data = json_decode($res->getBody()->getContents(), true);
                //end get json
    
                //get storeId
                $res1 = $client1->request('GET',PageController::getUrl('stores/'.$store.''));
                $data1 = json_decode($res1->getBody()->getContents(), true);
                // dd($data1['store']['categories']);
                //get danh muc trong store
                for ($i=0;  $i < count($data1['store']['categories']); $i++){
                    $data2[] = $data1['store']['categories'][$i]['category'];
                }
                $data3  = array();
                for($i=0; $i<count($data['categories']); $i++){
                    $count =0;
                    for($j=0; $j<count($data2); $j++){
                        if($data2[$j]['_id'] != $data['categories'][$i]['_id']){
                            $count ++;
                            if( $count == count($data2)){
                                $data3[] = $data['categories'][$i];
                            }
                        }
                    }
                }

                $result1 = compact('data3');

                $result = compact('data2');
                // dd($result);
              
                return view('admin/page.categoryadmin', compact('data','result','result1')); 
            }
            return redirect()->guest(route('login-admin', [], false));            
            
        }

        public function getProductDetailAdmin(Request $req){
            if (Session::has('key') && Session::get('key')['role']['roleName'] == 'Quản lý gian hàng'){
                $data = array();
                $datatext = array();
                //get json san pham theo ID san pham

                //get thong tin san pham
                $client = new \GuzzleHttp\Client();
                $res = $client->request('GET',PageController::getUrl('products/'.$req->id.'') );
                $data[] = json_decode($res->getBody()->getContents(), true);
                $resultdata = compact('data');
                // dd($resultdata);
                //get anh san pham
                $res = $client->request('GET',PageController::getUrl('productimages/product/'.$req->id.''));
                $datatext[] = json_decode($res->getBody()->getContents(), true);
                $resultimg = compact('datatext');

                //end get json
                // dd($result);

                return view('admin/page.productdetail', compact('resultdata','resultimg'));
            }
            return redirect()->guest(route('login-admin', [], false));            
            
        }

        public function getEditProductDetailAdmin(Request $req){
            if (Session::has('key') && Session::get('key')['role']['roleName'] == 'Quản lý gian hàng'){
                $data = array();
                $datatext = array();
                //get json san pham theo ID san pham

                //get thong tin san pham
                $client = new \GuzzleHttp\Client();
                $res = $client->request('GET',PageController::getUrl('products/'.$req->id.'') );
                $data[] = json_decode($res->getBody()->getContents(), true);
                $resultdata = compact('data');

                //get anh san pham
                $res = $client->request('GET',PageController::getUrl('productimages/product/'.$req->id.''));
                $datatext[] = json_decode($res->getBody()->getContents(), true);
                $resultimg = compact('datatext');

                //end get json
                return view('admin/page.editproductdetail', compact('resultdata','resultimg'));        
            }
            return redirect()->guest(route('login-admin', [], false));            
        }

        public function getAddProductDetailAdmin(Request $req){
            if (Session::has('key') && Session::get('key')['role']['roleName'] == 'Quản lý gian hàng'){
                $storeId = $req->id;
                $store = Session::get('key')[0]['store']['_id'];
                $res1 = PageController::getUrl('stores/'.$store.'');
                $data_category = PageController::getUrl('categories');
                $data_product_type = PageController::getUrl('producttypes/category');
                $data_product_type_specificationtypes = PageController::getUrl('specificationtypes/producttype');
                return view('admin/page.addproductdetail',compact('storeId', 'res1', 'data_category','data_product_type','data_product_type_specificationtypes'));      
            }
            return redirect()->guest(route('login-admin', [], false));            
        }

        public function getReview(){
            if (Session::has('key') && Session::get('key')['role']['roleName'] == 'Quản lý gian hàng'){
                $client1 = new \GuzzleHttp\Client();
                $resreviewshop = $client1->request('GET',PageController::getUrl('reviewStores/store/'.Session::get('key')[0]['store']['_id'].''));
                $datareviewshop = json_decode($resreviewshop->getBody()->getContents(), true);
                $countstar_3 = 0;
                $countstar_2 = 0;
                $countstar_1 = 0;
                $countstar = array();
                for($i=0; $i<$datareviewshop['count']; $i++){
                    $dtstart = new DateTime($datareviewshop['reviewStores'][$i]['dateReview']);
                    $dtstart->setTimezone(new DateTimeZone('UTC'));
                    $timereviewshop[] =  $dtstart->format('d/m/Y');
                    $countstar[] = $datareviewshop['reviewStores'][$i]['ratingLevel']['ratingLevel'];
                    switch ($countstar[$i]) {
                        case "3":
                            $countstar_3 ++;
                            break;
                        case "2":
                            $countstar_2 ++;
                            break;
                        case "1":
                            $countstar_1 ++;
                            break;      
                    }
                }
                if( $datareviewshop['count'] == 0 ){
                    $countrating = 0;
                }else{
                    $countrating = number_format((($countstar_2 + $countstar_1)/($countstar_2 + $countstar_1 + $countstar_3))*100, 1, '.', '');
                }
                return view('admin/page.reviewadmin',compact('datareviewshop','countrating','timereviewshop','countstar_1','countstar_2','countstar_3'));            
            }
            return redirect()->guest(route('login-admin', [], false));            
            
        }

        public function getDiscount(){
            if (Session::has('key') && Session::get('key')['role']['roleName'] == 'Quản lý gian hàng'){
               
              
                $store  = Session::get('key')[0]['store']['_id'];
                $client1 = new \GuzzleHttp\Client();
                $restime = $client1->request('GET','http://api.geonames.org/timezoneJSON?formatted=true&lat=10.041791&lng=105.747099&username=cyberzone&style=full');
                $datatime = json_decode($restime->getBody()->getContents(), true);
              
                $todaytime = new DateTime($datatime['time']);
                $todaytime->setTimezone(new DateTimeZone('UTC'));
                $time =  $todaytime->format('Y-m-d\TH:i:s.u\Z');

                

                // dd($time);
                //get json san pham theo gian hang
               
                if(Session::has('SearchProductTypeId')){
                    $res = $client1->request('GET',PageController::getUrl('products/store/producttype/'.$store.'/'.Session::get('SearchProductTypeId').''));
                    $data = json_decode($res->getBody()->getContents(), true);

                    $datatext1 = array();
                    $datatext2 = array();
                    for ($i=0;  $i < count($data['products']); $i++){
                        if(empty($data['products'][$i]['saleOff']) || $data['products'][$i]['saleOff']['dateEnd'] < $time){
                            $datatext1[] = $data['products'][$i];
                        }
                    }
                    $result1 = compact('datatext1');

                    // for ($i=0;  $i < count($data['products']); $i++){
                    //     if(empty($data['products'][$i]['saleOff']) || $data['products'][$i]['saleOff']['dateEnd'] > $time){
                    //         $datatext2[] = $data['products'][$i];
                    //     }
                    // }
                    // $result2 = compact('datatext2');
                    // dd($result2);
                    //end get json
                    $datatext = array();
                    for ($i=0;  $i < count($data['products']); $i++){
                        if(empty($data['products'][$i]['saleOff']) || $data['products'][$i]['saleOff']['dateEnd'] < $time){
                        $data2 = $data['products'][$i]['_id'];
                        $res2 = $client1->request('GET',PageController::getUrl('productimages/product/'.$data2.''));
                        $datatext[] = json_decode($res2->getBody()->getContents(), true);
                        }
                    }
                    $result = compact('datatext');
                    $resdis = PageController::getUrl('salesoff/store/'.$store.'');
                    $res1 =PageController::getUrl('stores/'.$store.'');
                    $data_category = PageController::getUrl('categories');
                    $data_product_type = PageController::getUrl('producttypes/category');
                    $data_product_type_specificationtypes = PageController::getUrl('specificationtypes/producttype');
                return view('admin/page.discountadmin', compact('time','data','result3','result2' , 'resdis','result1'  ,'res1' ,'result', 'data_category','data_product_type','data_product_type_specificationtypes'));
                
                }else if(Session::has('SearchSaleOffId')){
                    $res = $client1->request('GET',PageController::getUrl('products/saleoff/'.Session::get('SearchSaleOffId').''));
                    $data = json_decode($res->getBody()->getContents(), true);
                    $datatext1 = array();
                    $datatext2 = array();
                    for ($i=0;  $i < count($data['products']); $i++){
                        if(empty($data['products'][$i]['saleOff']) || $data['products'][$i]['saleOff']['dateEnd'] < $time){
                            $datatext1[] = $data['products'][$i];
                        }
                    }
                    $result1 = compact('datatext1');

                    for ($i=0;  $i < count($data['products']); $i++){
                        if(empty($data['products'][$i]['saleOff']) || $data['products'][$i]['saleOff']['dateEnd'] > $time){
                            $datatext2[] = $data['products'][$i];
                        }
                    }
                    $result2 = compact('datatext2');

                    //end get json
                    $datatext = array();
                    for ($i=0;  $i < count($data['products']); $i++){
                        if(empty($data['products'][$i]['saleOff']) || $data['products'][$i]['saleOff']['dateEnd'] < $time){
                        $data2 = $data['products'][$i]['_id'];
                        $res2 = $client1->request('GET',PageController::getUrl('productimages/product/'.$data2.''));
                        $datatext[] = json_decode($res2->getBody()->getContents(), true);
                        }
                    }
                    $result = compact('datatext');

                    $datatext1 = array();
                    for ($i=0;  $i < count($data['products']); $i++){
                        if(empty($data['products'][$i]['saleOff']) || $data['products'][$i]['saleOff']['dateEnd'] > $time){
                        $data21 = $data['products'][$i]['_id'];
                        $res21 = $client1->request('GET',PageController::getUrl('productimages/product/'.$data21.''));
                        $datatext1[] = json_decode($res21->getBody()->getContents(), true);
                        }
                    }
                    $result3 = compact('datatext1');
                    // dd($result);
                    $resdis = PageController::getUrl('salesoff/store/'.$store.'');
                    $res1 =PageController::getUrl('stores/'.$store.'');
                    $data_category = PageController::getUrl('categories');
                    $data_product_type = PageController::getUrl('producttypes/category');
                    $data_product_type_specificationtypes = PageController::getUrl('specificationtypes/producttype');
                  
                return view('admin/page.discountadmin', compact('time','data','result3','result2' , 'resdis','result1'  ,'res1' ,'result', 'data_category','data_product_type','data_product_type_specificationtypes'));
               
                }else{
                    $res = $client1->request('GET',PageController::getUrl('products/store/'.$store.''));
                    $data = json_decode($res->getBody()->getContents(), true);
                    $datatext1 = array();
                    $datatext2 = array();
                    
                    for ($i=0;  $i < count($data['products']); $i++){
                        if(empty($data['products'][$i]['saleOff']) || $data['products'][$i]['saleOff']['dateEnd'] < $time   ){
                            $datatext1[] = $data['products'][$i];
                        }
                    }
                    $result1 = compact('datatext1');
                    
                    for ($i=0;  $i < count($data['products']); $i++){
                        if(!empty($data['products'][$i]['saleOff']) && $data['products'][$i]['saleOff']['dateEnd'] > $time ){
                            $datatext2[] = $data['products'][$i];
                        }
                    }
                    $result2 = compact('datatext2');

                    //end get json
                    $datatext = array();
                    for ($i=0;  $i < count($data['products']); $i++){
                        if(empty($data['products'][$i]['saleOff']) || $data['products'][$i]['saleOff']['dateEnd'] < $time   ){
                        $data2 = $data['products'][$i]['_id'];
                        $res2 = $client1->request('GET',PageController::getUrl('productimages/product/'.$data2.''));
                        $datatext[] = json_decode($res2->getBody()->getContents(), true);
                        }
                    }
                    $result = compact('datatext');

                    $datatext1 = array();
                    for ($i=0;  $i < count($data['products']); $i++){
                        if(!empty($data['products'][$i]['saleOff']) && $data['products'][$i]['saleOff']['dateEnd'] > $time  ){
                        $data21 = $data['products'][$i]['_id'];
                        $res21 = $client1->request('GET',PageController::getUrl('productimages/product/'.$data21.''));
                        $datatext1[] = json_decode($res21->getBody()->getContents(), true);
                        }
                    }
                    $result3 = compact('datatext1');
                    // dd($result);
                    $resdis = PageController::getUrl('salesoff/store/'.$store.'');
                    $res1 =PageController::getUrl('stores/'.$store.'');
                    $data_category = PageController::getUrl('categories');
                    $data_product_type = PageController::getUrl('producttypes/category');
                    $data_product_type_specificationtypes = PageController::getUrl('specificationtypes/producttype');
                return view('admin/page.discountadmin', compact('time','data','result3','result2' , 'resdis', 'result1'  ,'res1' ,'result', 'data_category','data_product_type','data_product_type_specificationtypes'));
                }
            }
            return redirect()->guest(route('login-admin', [], false));           
        }

        //Admin hệ thống
        public function getAdmin(){
            if (Session::has('key') && Session::get('key')['role']['roleName'] == 'Quản trị viên'){
                return view('admin/page.admin');
            }
            return redirect()->guest(route('login-admin', [], false));            
        }

        public function getCategoryAdminShop(){
            if (Session::has('key') && Session::get('key')['role']['roleName'] == 'Quản trị viên'){
                return view('admin/page.categoryadminshop');
            }
            return redirect()->guest(route('login-admin', [], false));            
           
        }

        public function getDetailAdminShop(){
            if (Session::has('key') && Session::get('key')['role']['roleName'] == 'Quản trị viên'){
                return view('admin/page.detailadminshop');
            }
            return redirect()->guest(route('login-admin', [], false));            
            
        }

        public function getAddCategoryAdmin(){
            if (Session::has('key') && Session::get('key')['role']['roleName'] == 'Quản trị viên'){
                //get json danh muc all
                $client1 = new \GuzzleHttp\Client();
                $res = $client1->request('GET',PageController::getUrl('categories') );
                $data = json_decode($res->getBody()->getContents(), true);
                //end get json
                return view('admin/page.addcategoryadmin', compact('data'));
            }
            return redirect()->guest(route('login-admin', [], false));            
           
        }
       
        public function getAddProductTypeAdmin(Request $req){
            if (Session::has('key') && Session::get('key')['role']['roleName'] == 'Quản trị viên'){
                //get json danh muc all
                $client1 = new \GuzzleHttp\Client();
                $res = $client1->request('GET',PageController::getUrl('categories/'.$req->id.'') );
                $data = json_decode($res->getBody()->getContents(), true);
                //end get json

                $res = $client1->request('GET',PageController::getUrl('producttypes/category/'.$req->id.'') );
                $data1 = json_decode($res->getBody()->getContents(), true);
                // dd($data1);

                return view('admin/page.addproducttypeadmin', compact('data','data1'));
            }
            return redirect()->guest(route('login-admin', [], false));            
            
        }

        public function getAddSpecificationAdmin(Request $req){
            if (Session::has('key') && Session::get('key')['role']['roleName'] == 'Quản trị viên'){
                $client1 = new \GuzzleHttp\Client();  
                try {
                    $res = $client1->request('GET',PageController::getUrl('producttypes/'.$req->id.'') );
                    $data1 = json_decode($res->getBody()->getContents(), true);
                    // dd($data1);
                    $res = $client1->request('GET',PageController::getUrl('specificationtypes/producttype/'.$req->id.'') );
                    $status = $res->getStatusCode();

                    $data = json_decode($res->getBody()->getContents(), true);
                    //  dd($data);
                    return view('admin/page.addspecificationadmin', compact('data','data1','status'));

                } catch (RequestException $e) {
                    if ($e->getResponse()->getStatusCode() == '404') {
                        $status = $e->getResponse()->getStatusCode();
                        return view('admin/page.addspecificationadmin', compact('data','data1','status'));
                    }            
                } 
            }
            return redirect()->guest(route('login-admin', [], false));            
             
           
        }


    }

?>
