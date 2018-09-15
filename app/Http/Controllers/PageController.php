<?php
    namespace App\Http\Controllers;
    use View, Input, Redirect;
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
            $urlAPI = "http://172.16.198.84:3000/".$text;
            return $urlAPI;
        }

        public function getIndex(){
            
            // get json
            $client = new \GuzzleHttp\Client();
            // $text = ;
            $res = $client->request('GET', PageController::getUrl('customers'));
            $data = json_decode($res->getBody()->getContents(), true);
            dd($data);
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
            //  $json_url = "http://172.16.198.84:3000/stores";
            //  $ch = curl_init( $json_url );
            //  $options = array(
            //      CURLOPT_RETURNTRANSFER => true,
            //      CURLOPT_HTTPHEADER => array('Content-type: application/json') ,
            //      CURLOPT_POSTFIELDS => $jsonData
            //  );
            //  curl_setopt_array( $ch, $options );
            //  $result =  curl_exec($ch);
            //  print_r($result);
            //  Log::info($result);
            //  curl_close($ch);

             //end post json


            return view('user/page.trangchu', compact('data'));
        }

        public function getProduct(){
            return view('user/page.product');
        }

        public function getProductList(){
            return view('user/page.productlist');
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
            return view('user/page.cart');
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

            //  http://172.16.198.84:3000/productimages/product/5b9b4350f6edbe19140898ad

            $datatext = array();
            for ($i=0;  $i < count($data['products']); $i++){
                $data2 = $data['products'][$i]['productId'];
                $res2 = $client1->request('GET',PageController::getUrl('productimages/product/'.$data2.''));
                $datatext[] = json_decode($res2->getBody()->getContents(), true);
                
            }
            $result = compact('datatext');
            // dd($result);

            return view('admin/page.product', compact('data','result'));
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
            // dd($result);
            return view('admin/page.categoryadmin', compact('data','result')); 
        }

        public function getProductDetailAdmin(){
            //get json san pham theo ID san pham
            $client1 = new \GuzzleHttp\Client();
            $res = $client1->request('GET',PageController::getUrl('products/5b9b4269f6edbe19140898ac') );
            $data = json_decode($res->getBody()->getContents(), true);
           //  dd($data);
            //end get json

            return view('admin/page.productdetail');
        }

        public function getEditProductDetailAdmin(){
            return view('admin/page.editproductdetail');
        }

        public function getAddProductDetailAdmin(){

            return view('admin/page.addproductdetail');
        }

        public function getReview(){
            return view('admin/page.reviewadmin');
        }

        //Admin hệ thống
        public function getAdmin(){
            return view('admin/page.admin');
        }


    }

?>