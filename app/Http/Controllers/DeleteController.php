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
    use GuzzleHttp\Exception\ClientException;
    use Exception;
    
 
    class DeleteController extends Controller{
        
        //User

        // public static function getUrl($text){
        //     // $urlAPI = "http://172.16.198.84:3000/".$text;
        //     $urlAPI = "http://localhost:3000/".$text;
        //     return $urlAPI;
        // }

        public function deleteDeliveryProfileUser(Request $req){
            //get json danh muc all
            $client1 = new \GuzzleHttp\Client();
            $res = $client1->request('DELETE',PageController::getUrl('deliveryaddresses/'.$req->id.'') );
            $data = json_decode($res->getBody()->getContents(), true);

            return redirect()->back()->with(['flag'=>'success','title'=>'Đã xóa thành công' ,'message'=>' ']);
        }




        // Admin hệ thống
        public function deleteAddCategoryAdmin(Request $req){
             //get json danh muc all
                // $client1 = new \GuzzleHttp\Client();
                try {
                    $client = new \GuzzleHttp\Client();
                    $res = $client->request('DELETE',PageController::getUrl('categories/'.$req->id.''));
                    $data = json_decode($res->getBody()->getContents(), true);
                    return redirect()->back()->with(['flag'=>'success','title'=>'Đã xóa thành công' ,'message'=>' ']);     
                } catch (\GuzzleHttp\Exception\RequestException $e) {
                    return redirect()->back()->with(['flag'=>'error','title'=>'Thất bại!','message'=>'Phải xóa loại sản phẩm trong danh mục trước']);
                }
        }

        public function deleteAddProductTypeAdmin(Request $req){
            //get json danh muc all
            try {
                $client1 = new \GuzzleHttp\Client();
                $res = $client1->request('DELETE',PageController::getUrl('producttypes/'.$req->id.'') );
                $data = json_decode($res->getBody()->getContents(), true);
                return redirect()->back()->with(['flag'=>'success','title'=>'Đã xóa thành công' ,'message'=>' ']);
            } catch (\GuzzleHttp\Exception\RequestException $e) {
                return redirect()->back()->with(['flag'=>'error','title'=>'Thất bại!','message'=>'Phải xóa thông số lỹ thuật trong loại sản phẩm trước']);
            }
        }

        public function deleteAddSpecificationAdmin(Request $req){
            $datatitle = array();
            $client1 = new \GuzzleHttp\Client();  
            $res = $client1->request('GET',PageController::getUrl('specificationtypes/producttype/'.$req->productTypeId.'') );
            $data2 = json_decode($res->getBody()->getContents(), true);
            for ($i=0;  $i < count($data2['specificationType']['specificationTitle']); $i++){
                $data3 = $data2['specificationType']['specificationTitle'][$i];
                if($data2['specificationType']['specificationTitle'][$i]['_id'] != $req->specificationTypeIdTitle){
                    $datatitle[] = $data3;
                }
            }
            if(empty($datatitle)){
                // dd($datatitle);
                $res = $client1->request('delete',PageController::getUrl('specificationtypes/'.$data2['specificationType']['_id'].'') );
                $data = json_decode($res->getBody()->getContents(), true);
                return redirect()->back();
            }
          
            for($i=0; $i< count($datatitle); $i++){
                $value[]= $datatitle[$i];
            }
            // dd($value);
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
            return redirect()->back()->with(['flag'=>'success','title'=>'Đã xóa thành công' ,'message'=>' ']);
        }

        public function deleteCategoryAdmin(Request $req){
            $client = new \GuzzleHttp\Client();  
            $store = Session::get('key')[0]['store']['_id'];
            $res = $client->request('GET',PageController::getUrl('producttypes/category/'.$req->categoryId.'') );
            $data = json_decode($res->getBody()->getContents(), true);
            for($i=0; $i<count($data['productTypes']); $i++){
                $data1[] = $data['productTypes'][$i]['_id'];
            }
            $datacount = 0;
            for($i=0; $i<count($data1); $i++){
                $res1 = $client->request('GET',PageController::getUrl('products/store/producttype/'.$store.'/'.$data1[$i].''));
                $datatext[] = json_decode($res1->getBody()->getContents(), true);
                $datacount = $datacount + $datatext[$i]['count'];
            }
            // dd($datacount);
            if($datacount > 0){
                return redirect()->back()->with(['flag'=>'error','title'=>'Thất bại' ,'message'=>'Không thể xóa khi có sản phẩm trong danh mục']);
            }else{
                $res2 = $client->request('GET',PageController::getUrl('stores/'.$store.''));
                $data3 = json_decode($res2->getBody()->getContents(), true);
              
                for ($i=0;  $i < count($data3['store']['categories']); $i++){
                    if($data3['store']['categories'][$i]['category']['_id'] != $req->categoryId){
                        $value[]= (["category" => $data3['store']['categories'][$i]['category']['_id'],]);
                    }
                }
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
                return redirect()->back()->with(['flag'=>'success','title'=>'Đã xóa thành công' ,'message'=>' ']);
            }

            return redirect()->back()->with(['flag'=>'success','title'=>'Đã xóa thành công' ,'message'=>' ']);
        }
    
        public function deleteFollow(Request $req){

            try {
                $client1 = new \GuzzleHttp\Client();
                $resfollow = $client1->request('DELETE',PageController::getUrl('followStores/'.Session::get('keyuser')['info'][0]['customer']['_id'].'/'.$req['storeId'].''));
                $datafollow = json_decode($resfollow->getBody()->getContents(), true);
                return redirect()->back()->with(['flag'=>'success','title'=>'Đã bỏ theo dõi thành công' ,'message'=>' ']);
            } catch (\GuzzleHttp\Exception\RequestException $e) {
                return redirect()->back()->with(['flag'=>'error','title'=>'Thất bại!','message'=>' ']);
            }
        }

        public function deleteWishList(Request $req){

            try {
                $client1 = new \GuzzleHttp\Client();
                $resfollow = $client1->request('DELETE',PageController::getUrl('wishList/'.Session::get('keyuser')['info'][0]['customer']['_id'].'/'.$req['productId'].''));
                $datafollow = json_decode($resfollow->getBody()->getContents(), true);
                return redirect()->back()->with(['flag'=>'success','title'=>'Đã bỏ sản phẩm yêu thích' ,'message'=>' ']);
            } catch (\GuzzleHttp\Exception\RequestException $e) {
                return redirect()->back()->with(['flag'=>'error','title'=>'Thất bại!','message'=>' ']);
            }
        }
 
        

      


    }

?>
