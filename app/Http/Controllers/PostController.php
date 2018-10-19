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
    use Illuminate\Support\Facades;
    // use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Validator;
    use Hash;
    use Illuminate\Support\Facades\Auth;
    use DateTime;
    use DateTimeZone;

 
    class PostController extends Controller{
        
        

        // public static function getUrl($text){
        //     // $urlAPI = "http://172.16.198.84:3000/".$text;
        //     $urlAPI = "http://localhost:3000/".$text;
        //     return $urlAPI;
        // }

        // Đăng nhập
        public function postLoginAdmin(Request $req){
            $client = new \GuzzleHttp\Client();
            try {
                $res = $client->request('GET', PageController::getUrl('accounts/'.$req->email.''));
                $data = json_decode($res->getBody()->getContents(), true);
                $email = $req['email'];
                $password = $req['password'];
                if($password === $data['account']['password']){
                    if($data['account']['role']['roleName'] == 'Quản lý gian hàng')
                    {
                    return redirect()->route('trang-chu-admin')->with(['flag'=>'success','message'=>'Dang nhap thanh cong','role'=>'Quản lý gian hàng']);
                    }
                    else if($data['account']['role']['roleName'] == 'Quản trị viên')
                    {
                    return redirect()->route('trang-chu-admin-he-thong')->with(['flag'=>'success','message'=>'Dang nhap thanh cong','role'=>'Quản trị viên']);
                    }
                }else{
                    return redirect()->back()->with(['flag'=>'danger','message'=>'Dang nhap khong thanh cong']);
                }
            }catch (\GuzzleHttp\Exception\ClientException $e) {
                // return $e->getResponse()->getStatusCode();
                return redirect()->back()->with(['flag'=>'danger','message'=>'Dang nhap khong thanh cong']);
            }     
        }

        // Admin hệ thống
        public function postAddCategoryAdmin(Request $req){
             //post data json
             $datajson=array("categoryName" => $req->namecategory);
             $jsonData =json_encode($datajson);
             $json_url = PageController::getUrl('categories');
             $ch = curl_init( $json_url );
             $options = array(
                 CURLOPT_RETURNTRANSFER => true,
                 CURLOPT_HTTPHEADER => array('Content-type: application/json') ,
                 CURLOPT_CUSTOMREQUEST => "POST",
                 CURLOPT_POSTFIELDS => $jsonData
             );
             curl_setopt_array( $ch, $options );
             $result =  curl_exec($ch);
            //  dd($result);
            //  exit();
             Log::info($result);
             curl_close($ch);
             //end post json
             return redirect()->back();
        }

        public function postAddProductTypeAdmin(Request $req){
            //post data json
            $datajson=array(
                "productTypeName" => $req->nameproducttype,
                "imageURL" => $req->img,
                "categoryId" => $req->categoryId
                );
            // dd($datajson);
            $jsonData =json_encode($datajson);
            $json_url = PageController::getUrl('producttypes');
            $ch = curl_init( $json_url );
            $options = array(
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => array('Content-type: application/json') ,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => $jsonData
            );
            curl_setopt_array( $ch, $options );
            $result =  curl_exec($ch);
            // dd($result);
            // exit();
           
            Log::info($result);
            curl_close($ch);
            //end post json
            return redirect()->back();
        }

        public function postAddSpecificationAdmin(Request $req){
            //post data json
            $datajson=array(
                "productTypeId" => $req->productTypeId,
                "specificationTitle" => [
                    "title" =>$req->namespeecification
                    ]
            );
            // dd($datajson);
            $jsonData =json_encode($datajson);
            $json_url = PageController::getUrl('specificationtypes');
            $ch = curl_init( $json_url );
            $options = array(
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => array('Content-type: application/json') ,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => $jsonData
            );
            curl_setopt_array( $ch, $options );
            $result =  curl_exec($ch);
            $data = json_decode($result, true);
            if($data[0]['message'] == "Specification type of product type is already" ){
                $datatitle = array();
                $client1 = new \GuzzleHttp\Client();  
                $res = $client1->request('GET',PageController::getUrl('specificationtypes/producttype/'.$req->productTypeId.'') );
                $data2 = json_decode($res->getBody()->getContents(), true);
                for ($i=0;  $i < count($data2['specificationType']['specificationTitle']); $i++){
                    $data3 = $data2['specificationType']['specificationTitle'][$i]['title'];
                    $datatitle[] = $data3;
                }
                for($i=0; $i< count($datatitle); $i++){
                    $value[]= ([
                        "title" => $datatitle[$i],
                        ]);
                 }
                $value1 =(["title" => $req->namespeecification]);
                array_push($value,$value1);
                $datajson1 =array([
                    "propName" => "specificationTitle",
                    "value" =>     $value    ]);
                $jsonData1 =json_encode($datajson1);
                $json_url1 = PageController::getUrl('specificationtypes/'.$data2['specificationType']['_id'].'');
                $ch1 = curl_init( $json_url1 );
                $options1 = array(
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_HTTPHEADER => array('Content-type: application/json') ,
                    CURLOPT_CUSTOMREQUEST => "PATCH",
                    CURLOPT_POSTFIELDS => $jsonData1
                );
                curl_setopt_array( $ch1, $options1 );
                $result1 =  curl_exec($ch1);
            }
                return redirect()->back();
        }

        //Admin gian hàng

        public function postAddProductDetailAdmin(Request $req){
            $client = new \GuzzleHttp\Client();
            $res = $client->request('GET',PageController::getUrl('specificationtypes/producttype/'.$req->producttypeid.''));
            $data = json_decode($res->getBody()->getContents(), true);
            for ($i=0;  $i < count($data['specificationType']['specificationTitle']); $i++){
                $data1 = $data['specificationType']['specificationTitle'][$i]['title'];
                $datatitle[] = $data1;
            }
            $quantities = Input::get('title1');
           
            for($i=0; $i< count($datatitle); $i++){
                $valuespecifications[]= ([
                    "title" => $datatitle[$i],
                    "value" => $quantities[$i]
                    ]);
             }
            // dd($reqtitle);
            $title2 = Input::get('title2');
            $value2 = Input::get('value2');
            foreach($title2 as $key => $n ) {
                $arrData[] = array("title"=>$title2[$key], "value"=>$value2[$key]);    
            }
            //post data json
            $datajson=array(
                "productTypeId" => $req->producttypeid,
                "storeId" => $req->storeId,
                "productName" => $req->productname,
                "price" => $req->price,
                "quantity" => $req->quantity,
                "specifications" => $valuespecifications,
                "overviews" => $arrData
                );
            // dd($datajson);
            $jsonData =json_encode($datajson);
            $json_url = PageController::getUrl('products');
            $ch = curl_init( $json_url );
            $options = array(
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => array('Content-type: application/json') ,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => $jsonData
            );
            curl_setopt_array( $ch, $options );
            $result =  curl_exec($ch);
            $result1 =json_decode($result);
           

            if(!empty($result1[0]->createdProduct->_id)){
                //post data json
                $datajson1=array(
                    "productId" => $result1->createdProduct->_id,
                    "imageList" => array(
                        ["imageURL" => $req->img1],
                        ["imageURL" => $req->img2],
                        ["imageURL" => $req->img3]
                    )
                    );
                $jsonData1 =json_encode($datajson1);
                $json_url1 = PageController::getUrl('productimages');
                $ch1 = curl_init( $json_url1 );
                $options1 = array(
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_HTTPHEADER => array('Content-type: application/json') ,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => $jsonData1
                );
                curl_setopt_array( $ch1, $options1 );
                $result2 =  curl_exec($ch1);

                return redirect()->back()->with(['flag'=>'success','title'=>'Thành công' ,'message'=>'Đã thêm']);
            }
           
        }

        public function postProductAdmin(Request $req){
            session()->flash('SearchProductTypeId', $req->producttypeid);
            return redirect()->route('san-pham-admin');
        }

        public function postCategoryAdmin(Request $req){
            $store = Session::get('key')[0]['store']['_id'];
            $client = new \GuzzleHttp\Client();
            $res = $client->request('GET',PageController::getUrl('stores/'.$store.''));
            $data = json_decode($res->getBody()->getContents(), true);
            $count = 0;
            for ($i=0;  $i < count($data['store']['categories']); $i++){
                $value[]= (["category" => $data['store']['categories'][$i]['category']['_id'],]);
                $count ++;
            }
            if($count>0){
                $value1 =(["category" => $req->categoryId]);
                array_push($value,$value1);
                $datajson=array([
                    "propName" => "categories",
                    "value" => $value
                ]);
                // dd($datajson);
                $jsonData =json_encode($datajson);
                $json_url = PageController::getUrl('stores/'.$store.'');
                $ch = curl_init( $json_url );
                $options = array(
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_HTTPHEADER => array('Content-type: application/json') ,
                    CURLOPT_CUSTOMREQUEST => "PATCH",
                    CURLOPT_POSTFIELDS => $jsonData
                );
                curl_setopt_array( $ch, $options );
                $result =  curl_exec($ch);
                // dd($result);
            return redirect()->back()->with(['flag'=>'success','title'=>'Thành công' ,'message'=>'Đã thêm']);
            }   
        }

        public function postSearchDiscount(Request $req){
            session()->flash('SearchProductTypeId', $req->producttypeid);
            return redirect()->route('discount-admin');
        }

        public function postSaleoffAdmin(Request $req){
            session()->flash('SearchSaleOffId', $req->saleoffid);
            session()->flash('HasSearchSaleOffId', '1');
            return redirect()->route('discount-admin');
        }

        public function postDiscount(Request $req){
            $store = Session::get('key')[0]['store']['_id'];

            $dtstart = new DateTime($req->start);
            $dtstart->setTimezone(new DateTimeZone('UTC'));
            $start =  $dtstart->format('Y-m-d\TH:i:s.u\Z');

            $dtend = new DateTime($req->enddate);
            $dtend->setTimezone(new DateTimeZone('UTC'));
            $end =  $dtend->format('Y-m-d\TH:i:s.u\Z');

            $datajson=array(
                "storeId" =>  $store,
                "discount" => $req->DiscountNumber,
                "dateStart" => $start,
                "dateEnd" => $end
                );
            $jsonData =json_encode($datajson);
            $json_url = PageController::getUrl('salesoff');
            $ch = curl_init( $json_url );
            $options = array(
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => array('Content-type: application/json') ,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => $jsonData
            );
            curl_setopt_array( $ch, $options );
            $result =  curl_exec($ch);
        return redirect()->back()->with(['flag'=>'success','title'=>'Thành công' ,'message'=>'Đã thêm']);
        }

        public function postAddDiscount(Request $req){

            $quantities = Input::get('productDiscount');
            for($i=0; $i< count($quantities); $i++){
                $datajson=array([
                    "propName" => "saleOff",
                    "value" => $req->discount
                ]);

                $jsonData =json_encode($datajson);
                $json_url = PageController::getUrl('products/'.$quantities[$i].'');
                $ch = curl_init( $json_url );
                $options = array(
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_HTTPHEADER => array('Content-type: application/json') ,
                    CURLOPT_CUSTOMREQUEST => "PATCH",
                    CURLOPT_POSTFIELDS => $jsonData
                );
                curl_setopt_array( $ch, $options );
                $result =  curl_exec($ch);
            }

           

        return redirect()->back()->with(['flag'=>'success','title'=>'Thành công' ,'message'=>'Đã thêm']);
        }

        public function postDeleteDiscount(Request $req){
            $quantities = Input::get('DeleteProductDiscount');
            for($i=0; $i< count($quantities); $i++){
                $datajson=array([
                    "propName" => "saleOff",
                    "value" => null
                ]);

                $jsonData =json_encode($datajson);
                $json_url = PageController::getUrl('products/'.$quantities[$i].'');
                $ch = curl_init( $json_url );
                $options = array(
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_HTTPHEADER => array('Content-type: application/json') ,
                    CURLOPT_CUSTOMREQUEST => "PATCH",
                    CURLOPT_POSTFIELDS => $jsonData
                );
                curl_setopt_array( $ch, $options );
                $result =  curl_exec($ch);
            }

           

        return redirect()->back()->with(['flag'=>'success','title'=>'Thành công' ,'message'=>'Đã thêm']);
        }

        // User

        public function postAddToCart(Request $req){
            $client = new \GuzzleHttp\Client();

            $restime = $client->request('GET','http://api.geonames.org/timezoneJSON?formatted=true&lat=10.041791&lng=105.747099&username=cyberzone&style=full');
            $datatime = json_decode($restime->getBody()->getContents(), true);
            $todaytime = new DateTime($datatime['time']);
            $todaytime->setTimezone(new DateTimeZone('UTC'));
            $time =  $todaytime->format('Y-m-d\TH:i:s.u\Z');
         
         

            $oldCart = Session('cart')?Session::get('cart'):null;
            $cart = new Cart($oldCart);
            // dd($req->productid);
           
            // dd($datatext[0]['images'][0]['imageList'][0]['imageURL']);
            $cart->add($req->productid, $req->qty ,$time);
            $req->session()->put('cart', $cart);
            return redirect()->route('cart');
        }

        public function postRegister(Request $req){
              
            $datajson=array(
                "username" =>  $req['email'],
                "password" =>  $req['pass'],
                "roleId" =>  $req['role']
                );
            // dd($datajson);
            $jsonData =json_encode($datajson);
            $json_url = PageController::getUrl('accounts');
            $ch = curl_init( $json_url );
            $options = array(
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => array('Content-type: application/json') ,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => $jsonData
            );
            curl_setopt_array( $ch, $options );
            $result =  curl_exec($ch);
            $result1 =json_decode($result);
            // dd($result1->createdAccount->_id);
            if($result1->message == "Created account successfully"){
                $dtstart = new DateTime("".$req['year']."-".$req['month']."-".$req['day']."");
                $dtstart->setTimezone(new DateTimeZone('UTC'));
                $start =  $dtstart->format('Y-m-d');
                $datacustomerjson=array(
                    "accountId" =>  $result1->createdAccount->_id,
                    "name" =>  $req['hoten'],
                    "gender" =>  $req['gender'],
                    "email" =>  $req['email'],
                    "phoneNumber" =>  $req['sdt'],
                    "birthday" => $start
                );
                $jsonData1 =json_encode($datacustomerjson);
                $json_url1 = PageController::getUrl('customers');
                $ch1 = curl_init( $json_url1 );
                $options1 = array(
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_HTTPHEADER => array('Content-type: application/json') ,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => $jsonData1
                );
                curl_setopt_array( $ch1, $options1 );
                $result =  curl_exec($ch1);
            }
        return redirect()->back()->with(['flag'=>'success','title'=>'Thành công' ,'message'=>'Đã thêm']);
        }

        public function postUpdateProfileUser(Request $req){
            $datajson=array(
                [ 
                    "propName" => "name",
                    "value" => $req['hoten']
                ],[
                    "propName" => "gender",
                    "value" => $req['gender']
                ],[
                    "propName" => "birthday",
                    "value" => $req['date']
                ],[
                    "propName" => "email",
                    "value" => $req['email']
                ],[
                    "propName" => "phoneNumber",
                    "value" => $req['sdt']
                ]
            );
            $jsonData =json_encode($datajson);
            $json_url = PageController::getUrl('customers/'.$req['customerid'].'');
            $ch = curl_init( $json_url );
            $options = array(
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => array('Content-type: application/json') ,
                CURLOPT_CUSTOMREQUEST => "PATCH",
                CURLOPT_POSTFIELDS => $jsonData
            );
            curl_setopt_array( $ch, $options );
            $result =  curl_exec($ch);
            $result1 =json_decode($result);
        return redirect()->back()->with(['flag'=>'success','title'=>'Thành công' ,'message'=>'Đã thêm']);
        }

        public function postDeliveryProfileUser(Request $req){
            $address = "".$req['diachi'].", ".$req['xa-phuong']."";
            $datajson=array(
                "customerId" =>  $req['customerid'],
                "presentation" =>$req['hoten'],
                "phoneNumber" =>  $req['sdt'],
                "address" =>  $address,
            );
            $jsonData =json_encode($datajson);
            $json_url = PageController::getUrl('deliveryaddresses');
            $ch = curl_init( $json_url );
            $options = array(
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => array('Content-type: application/json') ,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => $jsonData
            );
            curl_setopt_array( $ch, $options );
            $result =  curl_exec($ch);
            $result1 =json_decode($result);
        return redirect()->back()->with(['flag'=>'success','title'=>'Thành công' ,'message'=>'Đã thêm']);
        }

        public function postProductList(Request $req){
            //get json san pham theo gian hang
            $client1 = new \GuzzleHttp\Client();
            //  $res = $client1->request('GET',PageController::getUrl('products/store/5bb1c71a8875381e34da95ff'));
            $restime = $client1->request('GET','http://api.geonames.org/timezoneJSON?formatted=true&lat=10.041791&lng=105.747099&username=cyberzone&style=full');
            $datatime = json_decode($restime->getBody()->getContents(), true);
            $todaytime = new DateTime($datatime['time']);
            $todaytime->setTimezone(new DateTimeZone('UTC'));
            $time =  $todaytime->format('Y-m-d\TH:i:s.u\Z');

            $res3 = $client1->request('GET',PageController::getUrl('categories') );
            $data3 = json_decode($res3->getBody()->getContents(), true);
            $data4 =  $data3['categories'];
            for($i=0; $i<count($data3['categories']); $i++){
                $res1 = $client1->request('GET',PageController::getUrl('producttypes/category/'.$data3['categories'][$i]['_id'].'') );
                $data1[] = json_decode($res1->getBody()->getContents(), true);
            }
            $result1 = compact('data1');

            $datajson=array(
                "name" =>  $req['search']
                );
            // dd($datajson);
            $jsonData =json_encode($datajson);
            $json_url = PageController::getUrl('products/findByName');
            $ch = curl_init( $json_url );
            $options = array(
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => array('Content-type: application/json') ,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => $jsonData
            );
            curl_setopt_array( $ch, $options );
            $result =  curl_exec($ch);

            $data =json_decode($result,JSON_NUMERIC_CHECK);

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

            $result = compact('datatext');
            $resultdatareview = compact('datareview');
          

            array_push($data,$datareview);
            // dd($data);
            for($i=0; $i < count($resultdatareview['datareview']); $i++){
                for($j=0; $j < count($resultdatareview['datareview'][$i]['reviewProducts']); $j++){
                $countstar[] = $resultdatareview['datareview'][$i]['reviewProducts'][$j]['ratingStar']['ratingStar']    ;
                $datajson1 =array(
                    "id" => $resultdatareview['datareview'][$i]['reviewProducts'][$j]['product']['_id'],
                    "value" =>  $countstar
                );
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
                }
            }
         
           
            return view('user/page.productlist',compact('datajson1','data','result','result1','data4','resultPrice','time','resultdatareview','countstar_5','countstar_4','countstar_3','countstar_2','countstar_1'));        }

        public function postProductTypeProductList(Request $req){
            // dd($req->id);
            //get json san pham theo gian hang
            $client1 = new \GuzzleHttp\Client();
            $restime = $client1->request('GET','http://api.geonames.org/timezoneJSON?formatted=true&lat=10.041791&lng=105.747099&username=cyberzone&style=full');
            $datatime = json_decode($restime->getBody()->getContents(), true);
            $todaytime = new DateTime($datatime['time']);
            $todaytime->setTimezone(new DateTimeZone('UTC'));
            $time =  $todaytime->format('Y-m-d\TH:i:s.u\Z');

            $countstar_5 = 0;
            $countstar_4 = 0;
            $countstar_3 = 0;
            $countstar_2 = 0;
            $countstar_1 = 0;
            $datareview = array();
            $countstar = array();

            $res3 = $client1->request('GET',PageController::getUrl('categories') );
            $data3 = json_decode($res3->getBody()->getContents(), true);
            $data4 =  $data3['categories'];
            for($i=0; $i<count($data3['categories']); $i++){
                $res1 = $client1->request('GET',PageController::getUrl('producttypes/category/'.$data3['categories'][$i]['_id'].'') );
                $data1[] = json_decode($res1->getBody()->getContents(), true);

              
            }
            $result1 = compact('data1');
           

            $res = $client1->request('GET',PageController::getUrl('products/productType/'.$req->id.''));
            $data = json_decode($res->getBody()->getContents(), true);
             //end get json
           
            $datatext = array();
            for ($i=0;  $i < count($data['products']); $i++){
         
            $data2 = $data['products'][$i]['_id'];
            $res2 = $client1->request('GET',PageController::getUrl('productimages/product/'.$data2.''));
            $datatext[] = json_decode($res2->getBody()->getContents(), true);

            $res3 = $client1->request('GET',PageController::getUrl('reviewProducts/product/'.$data2.''));
            $datareview[] = json_decode($res3->getBody()->getContents(), true);
            }
            $resultdatareview = compact('datareview');
            array_push($data,$datareview);
            $datajson1 = array();

            for($i=0; $i < count($resultdatareview['datareview']); $i++){
                for($j=0; $j < count($resultdatareview['datareview'][$i]['reviewProducts']); $j++){
                $countstar[] = $resultdatareview['datareview'][$i]['reviewProducts'][$j]['ratingStar']['ratingStar']    ;
                $datajson1 =array(
                    "id" => $resultdatareview['datareview'][$i]['reviewProducts'][$j]['product']['_id'],
                    "value" =>  $countstar
                );
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
                }
            }
          

            $result = compact('datatext');



 

            return view('user/page.productlist',compact('datajson1','data','result','result1','data4','resultPrice','time','resultdatareview','countstar_5','countstar_4','countstar_3','countstar_2','countstar_1'));
        }
                        
        
           
         
           
        

    }

?>
