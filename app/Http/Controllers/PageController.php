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

 
    class PageController extends Controller{

        // Đăng nhập admin
        public function getLoginAdmin(){
            session()->forget('key');
            return view('admin/page.loginadmin');        
        }
        
        //User

        public static function getUrl($text){
            // $urlAPI = "http://172.16.198.84:3000/".$text;
            $urlAPI = "http://localhost:3000/".$text;
            return $urlAPI;
        }

        public function getIndex(){
            
            // get json
            $client = new \GuzzleHttp\Client();
            // $text = ;
            $res = $client->request('GET', PageController::getUrl('customers'));
            $data = json_decode($res->getBody()->getContents(), true);
            // dd($data);
            // end get json

            //post data json

            // $datajson=array(
            //     "customerId" => "5b962d37738558095492b988",
            //     "storeName" => "Máy tính Phong Vũ",
            //     "location" => "Hồ Chí Minh",
            //     "phoneNumber" => "0909159753",
            //     'categories' => [
            //         [
            //             'categoryId'     => '5b974fb26153321ffc61b828'
            //         ],
            //         [
            //             'categoryId'     => '5b974fbf6153321ffc61b829'
            //         ]
            //     ]);
     
            //  $jsonData =json_encode($datajson);
            //  $json_url = PageController::getUrl('test');
            //  $ch = curl_init( $json_url );
            //  $options = array(
            //      CURLOPT_RETURNTRANSFER => true,
            //      CURLOPT_HTTPHEADER => array('Content-type: application/json') ,
            //      CURLOPT_POSTFIELDS => $jsonData
            //  );
            //  curl_setopt_array( $ch, $options );
            //  $result =  curl_exec($ch);
            //  dd($result);
            //  exit();
            //  Log::info($result);
            //  curl_close($ch);

             //end post json


            return view('user/page.trangchu', compact('data'));
        }
        
        public function getAddToCart(Request $req, $id){
            $client = new \GuzzleHttp\Client();
            $res = $client->request('GET',PageController::getUrl('products/'.$id.'') );
            $data[] = json_decode($res->getBody()->getContents(), true);

            $res = $client->request('GET',PageController::getUrl('productimages/product/'.$id.''));
            $datatext[] = json_decode($res->getBody()->getContents(), true);

            $oldCart = Session('cart')?Session::get('cart'):null;
            $cart = new Cart($oldCart);
            // dd($datatext[0]['images'][0]['imageList'][0]['imageURL']);
            $cart->add($data[0]['product'], $id, $datatext[0]['imageList'][0]['imageURL']);
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

            return view('user/page.product',compact('resultdata','resultimg'));
        }

        public function getProductList(){
             //get json san pham theo gian hang
             $client1 = new \GuzzleHttp\Client();
            //  $res = $client1->request('GET',PageController::getUrl('products/store/5bb1c71a8875381e34da95ff'));
             $res = $client1->request('GET',PageController::getUrl('products'));
             $data = json_decode($res->getBody()->getContents(), true);
            //   dd($data['products']);

             //end get json
             $dataPrice = array();
                $datasaleOff =array();
                $dataPriceProduct = array();
             $datatext = array();
             for ($i=0;  $i < count($data['products']); $i++){
                $datasaleOff[] = $data['products'][$i]['saleOff']['discount'];
                $dataPrice[] = $data['products'][$i]['price'];
                $data2 = $data['products'][$i]['_id'];
                $res2 = $client1->request('GET',PageController::getUrl('productimages/product/'.$data2.''));
                $datatext[] = json_decode($res2->getBody()->getContents(), true);
             }
             $result = compact('datatext');
            //  dd($datatext);
            foreach( $datasaleOff as $price => $sale ) {
                $dataPriceProduct[] = ($dataPrice[$price]-($dataPrice[$price]*$sale)/100);   
            }
            $resultPrice = compact('dataPriceProduct');
            return view('user/page.productlist',compact('data','result','resultPrice'));
        }

        public function getRegister(){
            return view('user/page.register');
        }

        public function getLogin(){
            return view('user/page.login');
        }

        public function getProfileShop(){
            return view('user/page.profileshop');
        }

        public function getCart(){
            //get thong tin san pham
            $client = new \GuzzleHttp\Client();
            $res = $client->request('GET',PageController::getUrl('deliveryprices') );
            $data = json_decode($res->getBody()->getContents(), true);
            // dd($data);

            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);
            $product_cart = $cart->items;           
            return view('user/page.cart',compact('product_cart','data'));
        }

        public function getCheckCart(){
            //get thong tin san pham
            $client = new \GuzzleHttp\Client();
            $res = $client->request('GET',PageController::getUrl('deliveryprices') );
            $data = json_decode($res->getBody()->getContents(), true);
            // dd($data);

            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);
            $product_cart = $cart->items;  
            return view('user/page.checkcart',compact('product_cart','data'));
        }

        public function getCheckOut(){
            return view('user/page.checkout');
        }

        public function getProfileUser(){
            return view('user/page.profileuser');
        }

        public function getProfileUserShop(){
            return view('user/page.profileusershop');
        }

        public function getRegisterShop(){
            return view('user/page.registershop');
        }

        public function getReviewShop(){
            return view('user/page.reviewshop');
        }

        public function getWriteReviewShop(){
            return view('user/page.writereviewadmin');
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
                return view('admin/page.reviewadmin');            
            }
            return redirect()->guest(route('login-admin', [], false));            
            
        }

        public function getDiscount(){
            if (Session::has('key') && Session::get('key')['role']['roleName'] == 'Quản lý gian hàng'){
                $store  = Session::get('key')[0]['store']['_id'];
                //get json san pham theo gian hang
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
                    $res1 =PageController::getUrl('stores/'.$store.'');
                    $data_category = PageController::getUrl('categories');
                    $data_product_type = PageController::getUrl('producttypes/category');
                    $data_product_type_specificationtypes = PageController::getUrl('specificationtypes/producttype');

                    return view('admin/page.discountadmin', compact('data','res1' ,'result', 'data_category','data_product_type','data_product_type_specificationtypes'));
                }else{
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
                    $res1 =PageController::getUrl('stores/'.$store.'');
                    $data_category = PageController::getUrl('categories');
                    $data_product_type = PageController::getUrl('producttypes/category');
                    $data_product_type_specificationtypes = PageController::getUrl('specificationtypes/producttype');
    
                    return view('admin/page.discountadmin', compact('data','res1' ,'result', 'data_category','data_product_type','data_product_type_specificationtypes'));
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
