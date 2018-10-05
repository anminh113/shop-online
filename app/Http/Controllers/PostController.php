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
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Validator;

 
    class PostController extends Controller{
        
        

        public static function getUrl($text){
            // $urlAPI = "http://172.16.198.84:3000/".$text;
            $urlAPI = "http://localhost:3000/".$text;
            return $urlAPI;
        }

        // Đăng nhập
        public function postLoginAdmin(Request $req){
            $client = new \GuzzleHttp\Client();
            try {
                $res = $client->request('GET', PageController::getUrl('accounts/'.$req->email.''));
                $data = json_decode($res->getBody()->getContents(), true);
                // dd($data);
                //   $this->validate($req,[
                //         'email'=>'required|email',
                //         'password'=>'required|min:6|max:20'
                //     ],[
                //         'email.required'=>'Vui lòng nhập email',
                //         'email.email'=>'Không đúng định dạng email',
                //         'password.required'=>'Vui lòng nhập mật khẩu',
                //         'password.min'=>'Mật khẩu có ít nhất 6 ký tự',
                //         'password.max'=>'Mật khẩu tối đa 20 ký tự'
                //     ]);
                // $credentials = array($data['account']['username']=>$req->email , $data['account']['password']=>$req->password);
                // // dd($credentials);
                // if(Auth::attempt($credentials)){
                //     echo 'ok';
                //     return redirect()->route('trang-chu')->with(['flag'=>'success','message'=>'Dang nhap thanh cong']);
                // }
                // else{
                //     echo 'eo ok';
                //     return redirect()->back()->with(['flag'=>'danger','message'=>'Dang nhap khong thanh cong']);
                // }
                // $rules = ([
                //             'email'=>'required|email',
                //             'password'=>'required|min:6|max:20',
                //             'email.required'=>'Vui lòng nhập email',
                //             'email.email'=>'Không đúng định dạng email',
                //             'password.required'=>'Vui lòng nhập mật khẩu',
                //             'password.min'=>'Mật khẩu có ít nhất 6 ký tự',
                //             'password.max'=>'Mật khẩu tối đa 20 ký tự'
                //         ]);
            
                // $input = $req->only('email', 'password');
            
                // $validator = Validator::make($input, $rules);
                    
                // if($validator->fails()) {
                //     $error = $validator->messages();
                //     return response()->json(['success'=> false, 'error'=> $error]);
                // }
            
            
                $email = $req['email'];
                $password = $req['password'];
                if($data['account']){
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
                $json_url1 = PageController::getUrl('specificationtypes/'.$data2['specificationType']['specificationTypeId'].'');
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

            if(!empty($result1->createdProduct->productId)){
                //post data json
                $datajson1=array(
                    "productId" => $result1->createdProduct->productId,
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
                return redirect()->back();
            }
                        
        
           
         
            // end post json
           
        }

    }

?>
