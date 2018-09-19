<?php
    namespace App\Http\Controllers;
    use View, Input, Redirect;
    use App\Cart;
    use Session;
    use Illuminate\Http\Request;
    // use GuzzleHttp\Psr7\Request;
    use GuzzleHttp\Client;
    use GuzzleHttp\Promise;
    use GuzzleHttp\Pool;
    use Illuminate\Support\Facades\Log;
    // use Illuminate\Support\Facades\View;
 
    class PageController extends Controller{
        
        //User

        public static function getUrl($text)
        {
            // $urlAPI = "http://172.16.198.84:3000/".$text;
            $urlAPI = "http://172.16.238.133:3000/".$text;
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
            // dd($data[0]['product']);
            $cart->add($data[0]['product'], $id, $datatext[0]['images'][0]['imageURL']);
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
             $res = $client1->request('GET',PageController::getUrl('products/store/5b989eb9a6bce5234c9522ea'));
             $data = json_decode($res->getBody()->getContents(), true);
            //   dd($data);

             //end get json
             $datatext = array();
             for ($i=0;  $i < count($data['products']); $i++){
                 $data2 = $data['products'][$i]['productId'];
                 $res2 = $client1->request('GET',PageController::getUrl('productimages/product/'.$data2.''));
                 $datatext[] = json_decode($res2->getBody()->getContents(), true);
             }
             $result = compact('datatext');

             // dd($result);

          

            return view('user/page.productlist',compact('data','result'));
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
            // $data = array();
            //get json san pham theo ID san pham

            //get thong tin san pham
            $client = new \GuzzleHttp\Client();
            $res = $client->request('GET',PageController::getUrl('deliveryprices') );
            $data = json_decode($res->getBody()->getContents(), true);
            // $resultdata = compact('data');

            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);
            $product_cart = $cart->items;           
            return view('user/page.cart',compact('product_cart','data'));
        }

        public function getCheckCart(){
            return view('user/page.checkcart');
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

        //End user

        // Đăng nhập admin
        public function getLoginAdmin(){
            return view('admin/page.loginadmin');
        }

        

        //Admin gian hàng
        public function getIndexAdmin(){
            return view('admin/page.trangchu');
        }

        public function getProductAdmin(){
                //get json san pham theo gian hang
                $client1 = new \GuzzleHttp\Client();
                $res = $client1->request('GET',PageController::getUrl('products/store/5b989eb9a6bce5234c9522ea'));
                $data = json_decode($res->getBody()->getContents(), true);
                //  dd($data);
                //end get json


                $datatext = array();
                for ($i=0;  $i < count($data['products']); $i++){
                    $data2 = $data['products'][$i]['productId'];
                    $res2 = $client1->request('GET',PageController::getUrl('productimages/product/'.$data2.''));
                    $datatext[] = json_decode($res2->getBody()->getContents(), true);
                    
                }
                $result = compact('datatext');
                // dd($result);

                $data_category = PageController::getUrl('categories');
                $data_product_type = PageController::getUrl('producttypes/category');
                $data_product_type_specificationtypes = PageController::getUrl('specificationtypes/producttype');

            return view('admin/page.product', compact('data','result', 'data_category','data_product_type','data_product_type_specificationtypes'));
        }

        public function getCategoryAdmin(){
            //get json danh muc all
            $client1 = new \GuzzleHttp\Client();
            $res = $client1->request('GET',PageController::getUrl('categories') );
            $data = json_decode($res->getBody()->getContents(), true);
            //end get json

            //get storeId
            $res1 = $client1->request('GET',PageController::getUrl('stores/5b989eb9a6bce5234c9522ea'));
            $data1 = json_decode($res1->getBody()->getContents(), true);
            
            //get danh muc trong store
            $datatext = array();
            for ($i=0;  $i < count($data1['store']['categories']); $i++){
                $data2 = $data1['store']['categories'][$i]['categoryId'];
                $res2 = $client1->request('GET',PageController::getUrl('categories/'.$data2.'') );
                $datatext[] = json_decode($res2->getBody()->getContents(), true);
                
            }
            $result = compact('datatext');
          
            return view('admin/page.categoryadmin', compact('data','result')); 
        }

        public function getProductDetailAdmin(Request $req){
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
            // dd($result);

            return view('admin/page.productdetail', compact('resultdata','resultimg'));
        }

        public function getEditProductDetailAdmin(){
            return view('admin/page.editproductdetail');
        }

        public function getAddProductDetailAdmin(){
            $data_category = PageController::getUrl('categories');
            $data_product_type = PageController::getUrl('producttypes/category');
            $data_product_type_specificationtypes = PageController::getUrl('specificationtypes/producttype');
            return view('admin/page.addproductdetail',compact('data_category','data_product_type','data_product_type_specificationtypes'));
        }

        public function getReview(){
            return view('admin/page.reviewadmin');
        }
        public function getDiscount(){
                //get json san pham theo gian hang
                $client1 = new \GuzzleHttp\Client();
                $res = $client1->request('GET',PageController::getUrl('products/store/5b989eb9a6bce5234c9522ea'));
                $data = json_decode($res->getBody()->getContents(), true);
                //  dd($data);

                //end get json
                $datatext = array();
                for ($i=0;  $i < count($data['products']); $i++){
                    $data2 = $data['products'][$i]['productId'];
                    $res2 = $client1->request('GET',PageController::getUrl('productimages/product/'.$data2.''));
                    $datatext[] = json_decode($res2->getBody()->getContents(), true);
                    
                }
                $result = compact('datatext');
                // dd($result);

                $data_category = PageController::getUrl('categories');
                $data_product_type = PageController::getUrl('producttypes/category');
                $data_product_type_specificationtypes = PageController::getUrl('specificationtypes/producttype');

            return view('admin/page.discountadmin', compact('data','result', 'data_category','data_product_type','data_product_type_specificationtypes'));
        }
      

        //Admin hệ thống
        public function getAdmin(){
            return view('admin/page.admin');
        }


    }

?>