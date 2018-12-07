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
    // use Illuminate\Support\Facades\Request;

 
    class PostController extends Controller{
        
        

    

        // Đăng nhập


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
             return redirect()->back()->with(['flag'=>'success','title'=>'Thành công' ,'message'=>'Đã thêm danh mục']);
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
            return redirect()->back()->with(['flag'=>'success','title'=>'Thành công' ,'message'=>'Đã thêm']);
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
            if($data['message'] == "Specification type of product type is already" ){
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
                return redirect()->back()->with(['flag'=>'success','title'=>'Thành công' ,'message'=>'Đã thêm']);
        }

        public function postAdmin(Request $req){
            $client = new \GuzzleHttp\Client();
            $res = $client->request('GET',PageController::getUrl('registeredSales/'.$req['registeredSalesId'].''));            
            $data = json_decode($res->getBody()->getContents(), true);
            // dd($data);
            $datajson=array(
                "username" =>  $data['registeredSale']['username'],
                "password" =>  $data['registeredSale']['password'],
                "roleId" =>  '5b962b5389403417208b6489'
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
            if($result1->message == "Created account successfully"){
                $datacustomerjson=array(
                    "accountId" =>  $result1->createdAccount->_id,
                    "storeName" =>  $data['registeredSale']['storeName'],
                    "location" =>  $data['registeredSale']['address'],
                    "phoneNumber" =>  $data['registeredSale']['phoneNumber'],
                    "email" =>  $data['registeredSale']['email']
                );
                $jsonData1 =json_encode($datacustomerjson);
                $json_url1 = PageController::getUrl('stores');
                $ch1 = curl_init( $json_url1 );
                $options1 = array(
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_HTTPHEADER => array('Content-type: application/json') ,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => $jsonData1
                );
                curl_setopt_array( $ch1, $options1 );
                $result =  curl_exec($ch1);
                $datajson2=array([
                    "propName" =>  "isApprove",
                    "value" =>  true
                ]);
                $jsonData2 =json_encode($datajson2);
                $json_url2 = PageController::getUrl('registeredSales/'.$data['registeredSale']['_id'].'');
                $ch2 = curl_init( $json_url2 );
                $options2 = array(
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_HTTPHEADER => array('Content-type: application/json') ,
                    CURLOPT_CUSTOMREQUEST => "PATCH",
                    CURLOPT_POSTFIELDS => $jsonData2
                );
                curl_setopt_array( $ch2, $options2 );
                $result2 =  curl_exec($ch2);
                $result12 =json_decode($result2);

            }

            return redirect()->back()->with(['flag'=>'success','title'=>'Thành công' ,'message'=>'Đã tạo gian hàng']);
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
            if(!empty($result1->createdProduct->_id)){
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

                return redirect()->route('san-pham-admin')->with(['flag'=>'success','title'=>'Thành công' ,'message'=>'Đã thêm sản phẩm thành công']);
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
                
            return redirect()->back()->with(['flag'=>'success','title'=>'Thành công' ,'message'=>'Đã thêm danh mục']);
            }   elseif($count == 0){
                $value1 =(["category" => $req->categoryId]);
                $datajson=array([
                    "propName" => "categories",
                    "value" => $value1
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
                $result1 =json_decode($result);
                // dd($result1);
                return redirect()->back()->with(['flag'=>'success','title'=>'Thành công' ,'message'=>'Đã thêm danh mục']);
            }
          
            return redirect()->back()->with(['flag'=>'error','title'=>'Thất bại' ,'message'=>'Thêm danh mục không thành công']);
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
            if($end > $start) {
                $datajson = array(
                    "storeId" => $store,
                    "discount" => $req->DiscountNumber,
                    "dateStart" => $start,
                    "dateEnd" => $end
                );
                $jsonData = json_encode($datajson);
                $json_url = PageController::getUrl('salesoff');
                $ch = curl_init($json_url);
                $options = array(
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_HTTPHEADER => array('Content-type: application/json'),
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => $jsonData
                );
                curl_setopt_array($ch, $options);
                $result = curl_exec($ch);
                return redirect()->back()->with(['flag'=>'success','title'=>'Thành công' ,'message'=>'Đã thêm sự kiện']);
            }
        return redirect()->back()->with(['flag'=>'error','title'=>'Thất bại' ,'message'=>'Ngày kết thúc phải lớn hơn ngày bắt đầu!!!']);
        }

        public function postAddDiscount(Request $req){
            $quantities = Input::get('productDiscount');

            if($req->discount != null && $quantities != null){
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
                return redirect()->back()->with(['flag'=>'success','title'=>'Thành công' ,'message'=>'Đã thêm sản phẩm vào sự kiện']);
            }else{
                return redirect()->back()->with(['flag'=>'warning','title'=>'Thông báo' ,'message'=>'Bạn phải chọn sản phẩm và sự kiện giảm giá!!!']);
            }
        }

        public function postDeleteDiscount(Request $req){
            $quantities = Input::get('DeleteProductDiscount');
             if($quantities != null){
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
                 return redirect()->back()->with(['flag'=>'success','title'=>'Thành công' ,'message'=>'Đã xóa khỏi sự kiện']);
             }else{
                 return redirect()->back()->with(['flag'=>'warning','title'=>'Thông báo' ,'message'=>'Bạn phải chọn sản phẩm!!!']);

             }

        }

        // User

        public function postAddToCart(Request $req){
            $client = new \GuzzleHttp\Client();
            $restime = $client->request('GET','https://api.timezonedb.com/v2.1/get-time-zone?key=BSPXCELRM0KP&format=json&by=zone&zone=Asia/Ho_Chi_Minh');
            $datatime = json_decode($restime->getBody()->getContents(), true);
            $todaytime = new DateTime($datatime['formatted']);
            $todaytime->setTimezone(new DateTimeZone('UTC'));
            $time =  $todaytime->format('Y-m-d\TH:i:s.u\Z');
//            dd(Session::get('cart'));
            if(is_array(Input::get('productid')) && is_array( Input::get('qty'))){
                $productid = Input::get('productid');
                $qty = Input::get('qty');
                session()->forget('cart');
                for($i=0; $i< count($productid); $i++){
                     $oldCart = Session('cart')?Session::get('cart'):null;
                     $cart = new Cart($oldCart);
                     $cart->add($productid[$i], $qty[$i] ,$time);
                     $req->session()->put('cart', $cart);
                 }
            }else{
                $oldCart = Session('cart')?Session::get('cart'):null;
                $cart = new Cart($oldCart);
                $cart->add($req->productid, $req->qty ,$time);
                $req->session()->put('cart', $cart);
            }
        return redirect()->route('cart');
        }

        public function postRegister(Request $req){
            $datajson=array(
                "username" =>  $req['user'],
                "password" =>  $req['pass'],
                "roleId" =>  $req['role']
                );
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
                  return redirect()->route('dang-nhap')->with(['flag'=>'success','title'=>'Thành công' ,'message'=>'Đăng ký thành công']);
            }else{
                return redirect()->back()->with(['flag'=>'warning','title'=>'Thất bại' ,'message'=>'Tên tài khoản đã được sử dụng']);
            }
        return redirect()->route('dang-nhap')->with(['flag'=>'success','title'=>'Thành công' ,'message'=>'Đăng ký thành công']);
        }

        public function postRegisterGoogleFacebook(Request $req){
                $client = new \GuzzleHttp\Client();
            try {     
                $res = $client->request('GET', PageController::getUrl('customers/account/' . $req['Id'] . ''));
                $data = json_decode($res->getBody()->getContents(), true);
                return redirect()->route('dang-nhap')->with(['flag'=>'info','title'=>' ' ,'message'=>'Bạn đã có tài khoản hãy đăng nhập']);

            } catch (\GuzzleHttp\Exception\RequestException $e) {
               $datacustomerjson=array(
                    "accountId" =>  $req['Id'],
                    "name" =>  $req['User'],
                    "email" =>  $req['Email']
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
                $result1 =json_decode($result);
                return redirect()->route('dang-nhap')->with(['flag'=>'success','title'=>'Thành công' ,'message'=>'Đã tạo tài khoản']);
            }
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
        return redirect()->back()->with(['flag'=>'success','title'=>'Thành công' ,'message'=>'Đã cập nhật thông tin']);
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
        return redirect()->back()->with(['flag'=>'success','title'=>'Thành công' ,'message'=>'Đã thêm địa chỉ']);
        }

        public function postProductList(Request $req){
            //get json san pham theo gian hang
            $client1 = new \GuzzleHttp\Client();
            $restime = $client1->request('GET','https://api.timezonedb.com/v2.1/get-time-zone?key=BSPXCELRM0KP&format=json&by=zone&zone=Asia/Ho_Chi_Minh');
            $datatime = json_decode($restime->getBody()->getContents(), true);
            $todaytime = new DateTime($datatime['formatted']);
            $todaytime->setTimezone(new DateTimeZone('UTC'));
            $time12 =  $todaytime->format('Y-m-d\TH:i:s.u\Z');

            $res3 = $client1->request('GET',PageController::getUrl('categories') );
            $data3 = json_decode($res3->getBody()->getContents(), true);
            $data4 =  $data3['categories'];
            for($i=0; $i<count($data3['categories']); $i++){
                $res1 = $client1->request('GET',PageController::getUrl('producttypes/category/'.$data3['categories'][$i]['_id'].'') );
                $data1[] = json_decode($res1->getBody()->getContents(), true);
            }
            $result1 = compact('data1');
            if($req['search'] != null){
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
                $data = array();
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
                return view('user/page.productlist',compact('datajson1','data','result','result1','data4','resultPrice','time12','resultdatareview','countstar_5','countstar_4','countstar_3','countstar_2','countstar_1'));        
            }
            else{
               
                return redirect()->route('post-danhsach-sanpham');
            }
        return view('user/page.productlist',compact('datajson1','data','result','result1','data4','resultPrice','time12','resultdatareview','countstar_5','countstar_4','countstar_3','countstar_2','countstar_1'));        
        }
       
        public function postProductTypeProductList(Request $req){
            $client1 = new \GuzzleHttp\Client();
            $restime = $client1->request('GET','https://api.timezonedb.com/v2.1/get-time-zone?key=BSPXCELRM0KP&format=json&by=zone&zone=Asia/Ho_Chi_Minh');
            $datatime = json_decode($restime->getBody()->getContents(), true);
            $todaytime = new DateTime($datatime['formatted']);
            $todaytime->setTimezone(new DateTimeZone('UTC'));
            $time12 =  $todaytime->format('Y-m-d\TH:i:s.u\Z');

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
            

            $result = compact('datatext');
        return view('user/page.productlist',compact('datajson1','data','result','result1','data4','resultPrice','time12','resultdatareview','countstar_5','countstar_4','countstar_3','countstar_2','countstar_1'));
        }

        public function postCheckOut(Request $req){
            $client1 = new \GuzzleHttp\Client();
            $amount= $req['amount'];
            $from="USD";
            $to="VND";
            $url = file_get_contents('https://free.currencyconverterapi.com/api/v5/convert?q=' . $from . '_' . $to . '&compact=ultra');
            $json = json_decode($url, true);
            $rate = implode(" ",$json);
            $total =  ($amount / ($rate /1000)) ;
            $rounded = round($total);
            $datajson=array(
                "email" =>   Session::get('keyuser')['customer']['email'],
                "order" =>  $req['orderId'],
                "source" =>  $req['stripeToken'],
                "amount" =>  $rounded * 100
                );
//            dd($datajson);
            $jsonData =json_encode($datajson);
            $json_url = PageController::getUrl('checkouts');
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
            dd($result1);
            if($result1->charge->status == "succeeded"){
                $datajson=array([
                    "propName" =>  "orderState",
                    "value" =>  "5b9a17f3e747da371818fd9d"
                ]);
                // dd($datajson);
                $jsonData =json_encode($datajson);
                $json_url = PageController::getUrl('orders/'.$req['orderId'].'');
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

                $resOrderItem = $client1->request('GET',PageController::getUrl('orderItems/order/'.$req['orderId'].''));
                $dataOrderItem = json_decode($resOrderItem->getBody()->getContents(), true);

                for ($i=0; $i <$dataOrderItem['count'] ; $i++) { 
                    $datajson=array([
                        "propName" =>  "orderItemState",
                        "value" =>  "5b9a17f3e747da371818fd9d"
                    ]);
                    // dd($datajson);
                    $jsonData =json_encode($datajson);
                    $json_url = PageController::getUrl('orderItems/'.$dataOrderItem['orderItems'][$i]['_id'].'');
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
                }
                
                session()->forget('cart');
                session()->forget('OrderId');
                return redirect()->route('trang-chu')->with(['flag'=>'success','title'=>'Giao dịch thành công!' ,'message'=>'Đơn đã được hiển thị trong thông tin đơn hàng ']);
            }else{
                return redirect()->back()->with(['flag'=>'error','title'=>'Giao dịch thất bại' ,'message'=>' ']);
            }
        
        }

        public function postCheckCart(Request $req){
            session()->flash('Idaddress', $req['radio-grp']);
            return redirect()->route('check-cart');
        }

        public function postdeliveryAddressCheckCart(Request $req){
           if($req['paymentMethod']=='5b98c76f6481170514777563'){
            $orderStateId = '5b9a17f3e747da371818fd9d';
           }else if($req['paymentMethod']=='5b98c7806481170514777564'){
            $orderStateId = '5b9a196cffed2b1e60a5d781';
           }
            $datajson=array(
                "customerId" =>   $req['customerId'],
                "deliveryAddress" => array(
                    "presentation" => $req['presentation'],
                    "phoneNumber" => $req['phoneNumber'],
                    "address" => $req['address']
                ),
                "deliveryPriceId" =>  $req['deliveryPrice'],
                "totalQuantity" =>  $req['totalQuantity'],
                "totalPrice" =>  $req['totalPrice'],
                "paymentMethodId" =>  $req['paymentMethod'],
                "orderStateId" => $orderStateId
                );
            $jsonData =json_encode($datajson);
            $json_url = PageController::getUrl('orders');
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
            session()->put('OrderId', $result1->createdOrder->_id);
            if($result1->message == "Order saved"){
                $cart = Session::get('cart');
                // dd($orderStateId);
                foreach($cart->items as $key => $value){
                    $datajsonOrderItem = array(
                        "orderId" =>   $result1->createdOrder->_id,
                        "product" => array(
                            "_id" => $key,
                            "productName" => $value['item']['productName'],
                            "price" => $value['price'],
                            "store" => array(
                                "_id" => $value['item']['store']['_id'],
                                "storeName" => $value['item']['store']['storeName']
                            ),
                            "imageURL" => $value['img']
                        ),
                        "quantity" =>  $value['qty'],
                        "orderItemStateId" => $orderStateId
                    );
                    $jsonDataOrderItem =json_encode($datajsonOrderItem);
                    $json_urlOrderItem = PageController::getUrl('orderItems');
                    $chOrderItem = curl_init( $json_urlOrderItem );
                    $optionsOrderItem = array(
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_HTTPHEADER => array('Content-type: application/json') ,
                        CURLOPT_CUSTOMREQUEST => "POST",
                        CURLOPT_POSTFIELDS => $jsonDataOrderItem
                    );
                    curl_setopt_array( $chOrderItem, $optionsOrderItem );
                    $resultOrderItem =  curl_exec($chOrderItem);
                    $result1OrderItem =json_decode($resultOrderItem);

                    $datajsonupdate = array([
                        "propName" =>  "quantity",
                        "value" =>  ($value['item']['quantity'] - $value['qty'])
                    ]);
                    $jsonDataupdate =json_encode($datajsonupdate);
                    $json_urlupdate = PageController::getUrl('products/'.$key.'');
                    $chupdate = curl_init( $json_urlupdate );
                    $optionsupdate = array(
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_HTTPHEADER => array('Content-type: application/json') ,
                        CURLOPT_CUSTOMREQUEST => "PATCH",
                        CURLOPT_POSTFIELDS => $jsonDataupdate
                    );
                    curl_setopt_array( $chupdate, $optionsupdate );
                    $resultupdate =  curl_exec($chupdate);
                    $result1update =json_decode($resultupdate);
                }
                if($req['paymentMethod'] == '5b98c7806481170514777564'){
                     session()->forget('cart');
                    session()->forget('OrderId');
                    return redirect()->route('check-out',$result1->createdOrder->_id);
                }
                session()->forget('cart');
                session()->forget('OrderId');
            return redirect()->route('trang-chu')->with(['flag'=>'success','title'=>'Đặt hàng thành công' ,'message'=>' ']);
            }
            if($req['paymentMethod'] == '5b98c7806481170514777564'){
                session()->forget('cart');
                session()->forget('OrderId');
                return redirect()->route('check-out',$result1->createdOrder->_id);
            }
            session()->forget('cart');
            session()->forget('OrderId');
        return redirect()->route('trang-chu')->with(['flag'=>'success','title'=>'Đặt hàng thành công' ,'message'=>' ']);
        }

        public function postProfileUser(Request $req){
            $datajson=array([
                "propName" =>  "orderState",
                "value" =>  "5b9a19d4ffed2b1e60a5d782"
            ]);
//             dd($datajson);
            $jsonData =json_encode($datajson);
            $json_url = PageController::getUrl('orders/'.$req['orderId'].'');
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

            $client = new \GuzzleHttp\Client();
            $resOrderItems = $client->request('GET', PageController::getUrl('orderItems/order/'.$req['orderId'].''));
            $dataOrderItems = json_decode($resOrderItems->getBody()->getContents(), true);
//            dd($dataOrderItems);
            for ($i=0;$i<count($dataOrderItems['orderItems']); $i++){
                $datajson1 = array([
                    "propName" => "orderItemState",
                    "value" => "5b9a19d4ffed2b1e60a5d782"
                ]);
                $jsonData1 = json_encode($datajson1);
                $json_url1 = PageController::getUrl('orderItems/' . $dataOrderItems['orderItems'][$i]['_id']. '');
                $ch1 = curl_init($json_url1);
                $options1 = array(
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_HTTPHEADER => array('Content-type: application/json'),
                    CURLOPT_CUSTOMREQUEST => "PATCH",
                    CURLOPT_POSTFIELDS => $jsonData1
                );
                curl_setopt_array($ch1, $options1);
                $result11 = curl_exec($ch1);
            }
//

         return redirect()->route('profile-user',Session::get('keyuser')['info'][0]['customer']['_id'])->with(['flag'=>'success','title'=>'Đơn hàng đã được hủy' ,'message'=>' ']);
        }

        public function postWriteReviewShop(Request $req){
            $client = new \GuzzleHttp\Client();
            // đánh giá product
            // dd($req['orderitemId']);
            $resreviewProducts = $client->request('GET',PageController::getUrl('ratingStars'));
            $datareviewProducts = json_decode($resreviewProducts->getBody()->getContents(), true);
            for ($i=0; $i < count($datareviewProducts['ratingStars']) ; $i++) { 
               if($datareviewProducts['ratingStars'][$i]['ratingStar'] == $req['ratingproduct']){
                $countStar = $datareviewProducts['ratingStars'][$i]['_id'];
               }
            }
            $datajsonreviewProducts = array(
                "customerId" => Session::get('keyuser')['info'][0]['customer']['_id'],
                "product" => array(
                    "_id" => $req['productId'],
                    "productName" => $req['ProductName'],
                    "imageURL" => $req['image']
                ),
                "ratingStarId" =>  $countStar,
                "review" => $req['reviewProduct']
            );
//             dd($datajsonreviewProducts);
            $jsonDatareviewProducts =json_encode($datajsonreviewProducts);
            $json_urlreviewProducts = PageController::getUrl('reviewProducts');
            $chreviewProducts = curl_init( $json_urlreviewProducts );
            $optionsreviewProducts = array(
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => array('Content-type: application/json') ,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => $jsonDatareviewProducts
            );
            curl_setopt_array( $chreviewProducts, $optionsreviewProducts );
            $resultreviewProducts =  curl_exec($chreviewProducts);
            $result1reviewProducts =json_decode($resultreviewProducts);
            $datajsonupdatestate=array([
                "propName" =>  "isReview",
                "value" =>  true
            ]);
            $jsonDataupdatestate =json_encode($datajsonupdatestate);
            $json_urlupdatestate = PageController::getUrl('orderItems/'.$req['orderitemId'].'');
            $chupdatestate = curl_init( $json_urlupdatestate );
            $optionsupdatestate = array(
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => array('Content-type: application/json') ,
                CURLOPT_CUSTOMREQUEST => "PATCH",
                CURLOPT_POSTFIELDS => $jsonDataupdatestate
            );
            curl_setopt_array( $chupdatestate, $optionsupdatestate );
            $resultupdatestate =  curl_exec($chupdatestate);
            $result1updatestate =json_decode($resultupdatestate);
            // đánh giá store



            $resreviewStores = $client->request('GET',PageController::getUrl('ratingLevels'));
            $datareviewStores = json_decode($resreviewStores->getBody()->getContents(), true);

            for ($i=0; $i < count($datareviewStores['ratingLevels']) ; $i++) { 
               if($datareviewStores['ratingLevels'][$i]['ratingLevel'] == $req['ratingLevel']){
                $countLevel = $datareviewStores['ratingLevels'][$i]['_id'];
               }
            }
           
            $datajsonreviewStore =array(
                "customerId" => Session::get('keyuser')['info'][0]['customer']['_id'],
                "storeId" =>  $req['storeId'],
                "ratingLevelId" => $countLevel,
                "review" =>  $req['reviewShop']
               
            );
            $jsonDatareviewStore =json_encode($datajsonreviewStore);
            $json_urlreviewStore = PageController::getUrl('reviewStores');
            $chreviewStore = curl_init( $json_urlreviewStore );
            $optionsreviewStore = array(
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => array('Content-type: application/json') ,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => $jsonDatareviewStore
            );
            curl_setopt_array( $chreviewStore, $optionsreviewStore );
            $resultreviewStore =  curl_exec($chreviewStore);
            $result1reviewStore =json_decode($resultreviewStore);

         return redirect()->route('profile-user',Session::get('keyuser')['info'][0]['customer']['_id'])->with(['flag'=>'success','title'=>'Đánh giá đã được lưu thành công' ,'message'=>' ']);

        }

        public function postwishList(Request $req){
            if(Session::has('keyuser')){
                $datajson =array(
                    "customerId" => Session::get('keyuser')['info'][0]['customer']['_id'],
                    "productId" =>  $req['productId']
                );
                $jsonData =json_encode($datajson);
                $json_url = PageController::getUrl('wishList');
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
                return redirect()->back()->with(['flag'=>'success','title'=>'Đã lưu sản phẩm này' ,'message'=>' ']);
            }
            return redirect()->back()->with(['flag'=>'info','title'=>'Đăng nhập để lưu sản phẩm này vào danh sách yêu thích' ,'message'=>' ']);
        }

        public function postFollow(Request $req){
            if(Session::has('keyuser')){
                $datajson =array(
                    "customerId" => Session::get('keyuser')['info'][0]['customer']['_id'],
                    "storeId" =>  $req['storeId']
                );
                // dd($datajson);
                $jsonData =json_encode($datajson);
                $json_url = PageController::getUrl('followStores');
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
                return redirect()->back()->with(['flag'=>'success','title'=>'Đã theo dõi gian hàng này' ,'message'=>' ']);
            }
            return redirect()->back()->with(['flag'=>'info','title'=>'Đăng nhập để theo dõi gian hàng này' ,'message'=>' ']);
        }

        public function postRegisterShop(Request $req){
            $client = new \GuzzleHttp\Client();
            if(Session::has('keyuser')){
                try {
                    $res = $client->request('GET', PageController::getUrl('accounts/username/'.$req['username'].''));
                    $data = json_decode($res->getBody()->getContents(), true);
                     return redirect()->back()->with(['flag'=>'warning','title'=>'Thất bại' ,'message'=>'Tên tài khoản đã được sử dụng']);
                } catch (\GuzzleHttp\Exception\RequestException $e) {
                      $datajson =array(
                    "customerId" => Session::get('keyuser')['info'][0]['customer']['_id'],
                    "storeName" =>  $req['namestore'],
                    "address" => $req['tinh-thanhpho'],
                    "phoneNumber" => $req['sdt'],
                    "email" => $req['email'],
                    "username" => $req['username'],
                    "password" => $req['pass1']
                    );
                    $jsonData =json_encode($datajson);
                    $json_url = PageController::getUrl('registeredSales');
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
                    return redirect()->route('trang-chu')->with(['flag'=>'success','title'=>'Đã đăng ký tạo gian hàng trên hệ thống' ,'message'=>' ']);
                }
              
            }
            return redirect()->back()->with(['flag'=>'info','title'=>'Đăng nhập để thực hiện này' ,'message'=>' ']);
        }
 

    }

?>
