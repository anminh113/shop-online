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

class PageController extends Controller
{



    public static function getUrl($text)
    {
        $urlAPI = "http://localhost:3000/" . $text;
//         $urlAPI = "http://172.16.198.84:3000/".$text;
        return $urlAPI;
    }

    // Đăng nhập admin
    public function getLoginAdmin()
    {
        session()->forget('key');
        session()->forget('SearchProductTypeId');
        session()->forget('SearchSaleOffId');
        session()->forget('HasSearchSaleOffId');
        return view('admin/page.loginadmin');
    }

    //User
    public function getIndex()
    {
        $client1 = new \GuzzleHttp\Client();
        $restime = $client1->request('GET', 'https://api.timezonedb.com/v2.1/get-time-zone?key=BSPXCELRM0KP&format=json&by=zone&zone=Asia/Ho_Chi_Minh');
        $datatime = json_decode($restime->getBody()->getContents(), true);
        $todaytime = new DateTime($datatime['formatted']);
        $todaytime->setTimezone(new DateTimeZone('UTC'));
        $time = $todaytime->format('Y-m-d\TH:i:s.u\Z');

        $res = $client1->request('GET', PageController::getUrl('products'));
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

        for ($i = 0; $i < count($data['products']); $i++) {
            $data2 = $data['products'][$i]['_id'];
            $res2 = $client1->request('GET', PageController::getUrl('productimages/product/' . $data2 . ''));
            $datatext[] = json_decode($res2->getBody()->getContents(), true);

            $res_guss = $client1->request('GET', PageController::getUrl('reviewProducts/product/' . $data2 . ''));
            $datareview_guss[] = json_decode($res_guss->getBody()->getContents(), true);


        }

        $result = compact('datatext');
        $resultdatareview_guss = compact('datareview_guss');
        array_push($data, $datareview_guss);
        for ($i = 0; $i < count($resultdatareview_guss['datareview_guss']); $i++) {
            for ($j = 0; $j < count($resultdatareview_guss['datareview_guss'][$i]['reviewProducts']); $j++) {
                $countstar_guss[] = $resultdatareview_guss['datareview_guss'][$i]['reviewProducts'][$j]['ratingStar']['ratingStar'];
                $datajson_guss = array(
                    "id" => $resultdatareview_guss['datareview_guss'][$i]['reviewProducts'][$j]['product']['_id'],
                    "value" => $countstar_guss
                );
                switch ($countstar_guss[$j]) {
                    case "5":
                        $countstar_5_guss++;
                        break;
                    case "4":
                        $countstar_4_guss++;
                        break;
                    case "3":
                        $countstar_3_guss++;
                        break;
                    case "2":
                        $countstar_2_guss++;
                        break;
                    case "1":
                        $countstar_1_guss++;
                        break;

                }
            }
        }

        $res1 = $client1->request('GET', PageController::getUrl('producttypes'));
        $dataproducttypes = json_decode($res1->getBody()->getContents(), true);


        $resproductPurchase = $client1->request('GET', PageController::getUrl('orderItems/productPurchase'));
        $dataproductPurchase = json_decode($resproductPurchase->getBody()->getContents(), true);
        $datatextproductPurchase = array();

        for ($i = 0; $i < count($dataproductPurchase['productPurchases']); $i++) {
            $dataproductPurchase1 = $dataproductPurchase['productPurchases'][$i]['_id'];
            try {
                $res4 = $client1->request('GET', PageController::getUrl('products/' . $dataproductPurchase1 . ''));
                $datatextproductPurchase[] = json_decode($res4->getBody()->getContents(), true);
            } catch (\GuzzleHttp\Exception\RequestException $e) {
                continue;
            }
        }
        $resultproductPurchase = compact('datatextproductPurchase');


        $datatextproductPurchaseImage = array();
        for ($i = 0; $i < count($resultproductPurchase['datatextproductPurchase']); $i++) {
            $data5 = $resultproductPurchase['datatextproductPurchase'][$i]['product']['_id'];
            $res5 = $client1->request('GET', PageController::getUrl('productimages/product/' . $data5 . ''));
            $datatextproductPurchaseImage[] = json_decode($res5->getBody()->getContents(), true);
            $res3 = $client1->request('GET', PageController::getUrl('reviewProducts/product/' . $data5 . ''));
            $datareview[] = json_decode($res3->getBody()->getContents(), true);
        }
        $resultproductPurchaseImage = compact('datatextproductPurchaseImage');
        $resultdatareview = compact('datareview');
        array_push($resultproductPurchase, $datareview);
        // $datajson1 = array();
        for ($i = 0; $i < count($data['0']); $i++) {
            if (!empty($data['0'][$i])) {
                $countstar_5 = 0;
                $countstar_4 = 0;
                $countstar_3 = 0;
                $countstar_2 = 0;
                $countstar_1 = 0;
                $countstar = array();
                for ($j = 0; $j < count($data['0'][$i]['reviewProducts']); $j++) {
                    $IDreview[] = $data['0'][$i]['reviewProducts'][$j]['product']['_id'];
                    $countstar[] = $data['0'][$i]['reviewProducts'][$j]['ratingStar']['ratingStar'];
                    switch ($countstar[$j]) {
                        case "5":
                            $countstar_5++;
                            break;
                        case "4":
                            $countstar_4++;
                            break;
                        case "3":
                            $countstar_3++;
                            break;
                        case "2":
                            $countstar_2++;
                            break;
                        case "1":
                            $countstar_1++;
                            break;
                    }
                    if ($j == (count($data['0'][$i]['reviewProducts']) - 1)) {
                        $text12 = number_format((5 * $countstar_5 + 4 * $countstar_4 + 3 * $countstar_3 + 2 * $countstar_2 + 1 * $countstar_1) / ($countstar_5 + $countstar_4 + $countstar_3 + $countstar_2 + $countstar_1), 1, '.', '');
                        $datajson1['countsar'][] = array(
                            "id" => array_pop($IDreview),
                            "value" => ($text12)
                        );
                    }
                }
            }
        }
        // dd($resultproductPurchase);
        return view('user/page.trangchu', compact('datajson_guss', 'datajson1', 'countstar_5_guss', 'countstar_4_guss', 'countstar_3_guss', 'countstar_2_guss', 'countstar_1_guss', 'countstar_5', 'countstar_4', 'countstar_3', 'countstar_2', 'countstar_1', 'resultproductPurchase', 'resultproductPurchaseImage', 'data', 'result', 'resultPrice', 'time', 'dataproducttypes'));
    }

    public function getAddToCart(Request $req, $id)
    {
        $client = new \GuzzleHttp\Client();
        $restime = $client->request('GET', 'https://api.timezonedb.com/v2.1/get-time-zone?key=BSPXCELRM0KP&format=json&by=zone&zone=Asia/Ho_Chi_Minh');
        $datatime = json_decode($restime->getBody()->getContents(), true);
        $todaytime = new DateTime($datatime['formatted']);
        $todaytime->setTimezone(new DateTimeZone('UTC'));
        $time = $todaytime->format('Y-m-d\TH:i:s.u\Z');


        $oldCart = Session('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($id, 1, $time);
        $req->session()->put('cart', $cart);
        return redirect()->back()->with(['flag'=>'success','title'=>'Thành công' ,'message'=>'Đã thêm vào giỏ']);
    }

    public function getDelToCart($id)
    {
        $oldCart = Session('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
            return redirect()->back()->with(['flag'=>'success','title'=>'Thành công' ,'message'=>'Đã xóa khỏi giỏ']);
        } else {
            Session::forget('cart');
            return redirect('productlist');
        }

    }

    public function getDelToCart1($id)
    {
        $oldCart = Session('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
            return redirect()->back()->with(['flag'=>'success','title'=>'Thành công' ,'message'=>'Đã xóa khỏi giỏ']);
        } else {
            Session::forget('cart');
            return redirect('productlist');
        }

    }

    public function getProduct(Request $req)
    {
        $data = array();
        $datatext = array();
        $timereview = array();
        $countstar = array();
        //get json san pham theo ID san pham

        //get thong tin san pham
        $client = new \GuzzleHttp\Client();

        $restime = $client->request('GET', 'https://api.timezonedb.com/v2.1/get-time-zone?key=BSPXCELRM0KP&format=json&by=zone&zone=Asia/Ho_Chi_Minh');
        $datatime = json_decode($restime->getBody()->getContents(), true);
        $todaytime = new DateTime($datatime['formatted']);
        $todaytime->setTimezone(new DateTimeZone('UTC'));
        $timeend = $todaytime->format('Y-m-d\TH:i:s.u\Z');

        $res = $client->request('GET', PageController::getUrl('products/' . $req->id . ''));
        $data[] = json_decode($res->getBody()->getContents(), true);
        $resultdata = compact('data');
        //get anh san pham
        $res = $client->request('GET', PageController::getUrl('productimages/product/' . $req->id . ''));
        $datatext[] = json_decode($res->getBody()->getContents(), true);
        $resultimg = compact('datatext');

        $res = $client->request('GET', PageController::getUrl('reviewProducts/product/' . $req->id . ''));
        $datareview = json_decode($res->getBody()->getContents(), true);
        // dd($datareview);
        $countstar_5 = 0;
        $countstar_4 = 0;
        $countstar_3 = 0;
        $countstar_2 = 0;
        $countstar_1 = 0;

        for ($i = 0; $i < $datareview['count']; $i++) {
            $dtstart = new DateTime($datareview['reviewProducts'][$i]['dateReview']);
            $dtstart->setTimezone(new DateTimeZone('UTC'));
            $timereview[] = $dtstart->format('d/m/Y');

            $countstar[] = $datareview['reviewProducts'][$i]['ratingStar']['ratingStar'];
            switch ($countstar[$i]) {
                case "5":
                    $countstar_5++;
                    break;
                case "4":
                    $countstar_4++;
                    break;
                case "3":
                    $countstar_3++;
                    break;
                case "2":
                    $countstar_2++;
                    break;
                case "1":
                    $countstar_1++;
                    break;
                default:

                    break;
            }
        }

        $datawl = '';
        if (Session::has('keyuser')) {
            try {
                $reswl = $client->request('GET', PageController::getUrl('wishList/check/' . Session::get('keyuser')['info'][0]['customer']['_id'] . '/' . $req->id . ''));
                $datawl = json_decode($reswl->getBody()->getContents(), true);
                // dd($datawl);
            } catch (\GuzzleHttp\Exception\RequestException $e) {
            }
        }

        return view('user/page.product', compact('datawl', 'timeend', 'resultdata', 'resultimg', 'datareview', 'timereview', 'countstar_5', 'countstar_4', 'countstar_3', 'countstar_2', 'countstar_1'));
    }

    public function getProductList()
    {
        //get json san pham theo gian hang
        $client1 = new \GuzzleHttp\Client();
        $restime = $client1->request('GET', 'https://api.timezonedb.com/v2.1/get-time-zone?key=BSPXCELRM0KP&format=json&by=zone&zone=Asia/Ho_Chi_Minh');
        $datatime = json_decode($restime->getBody()->getContents(), true);
        $todaytime = new DateTime($datatime['formatted']);
        $todaytime->setTimezone(new DateTimeZone('UTC'));
        $time12 = $todaytime->format('Y-m-d\TH:i:s.u\Z');

        $datat = array();
        $res = $client1->request('GET', PageController::getUrl('products'));
        $data = json_decode($res->getBody()->getContents(), true);
        for ($i = 0; $i < count($data['products']); $i++) {
            if (!empty($data['products'][$i]['saleOff'])) {
                $datat[] = $data['products'][$i];
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

        for ($i = 0; $i < count($data['products']); $i++) {
            $data2 = $data['products'][$i]['_id'];
            $res2 = $client1->request('GET', PageController::getUrl('productimages/product/' . $data2 . ''));
            $datatext[] = json_decode($res2->getBody()->getContents(), true);
            $res3 = $client1->request('GET', PageController::getUrl('reviewProducts/product/' . $data2 . ''));
            $datareview[] = json_decode($res3->getBody()->getContents(), true);
        }
        $result = compact('datatext');
        $resultdatareview = compact('datareview');
        array_push($data, $datareview);

        for ($i = 0; $i < count($data['0']); $i++) {
            if (!empty($data['0'][$i])) {
                $countstar_5 = 0;
                $countstar_4 = 0;
                $countstar_3 = 0;
                $countstar_2 = 0;
                $countstar_1 = 0;
                $countstar = array();
                for ($j = 0; $j < count($data['0'][$i]['reviewProducts']); $j++) {
                    $IDreview[] = $data['0'][$i]['reviewProducts'][$j]['product']['_id'];
                    $countstar[] = $data['0'][$i]['reviewProducts'][$j]['ratingStar']['ratingStar'];
                    switch ($countstar[$j]) {
                        case "5":
                            $countstar_5++;
                            break;
                        case "4":
                            $countstar_4++;
                            break;
                        case "3":
                            $countstar_3++;
                            break;
                        case "2":
                            $countstar_2++;
                            break;
                        case "1":
                            $countstar_1++;
                            break;
                    }
                    if ($j == (count($data['0'][$i]['reviewProducts']) - 1)) {
                        $text12 = number_format((5 * $countstar_5 + 4 * $countstar_4 + 3 * $countstar_3 + 2 * $countstar_2 + 1 * $countstar_1) / ($countstar_5 + $countstar_4 + $countstar_3 + $countstar_2 + $countstar_1), 1, '.', '');
                        $datajson1['countsar'][] = array(
                            "id" => array_pop($IDreview),
                            "value" => ($text12)
                        );
                    }
                }
            }
        }


        $res3 = $client1->request('GET', PageController::getUrl('categories'));
        $data3 = json_decode($res3->getBody()->getContents(), true);
        $data4 = $data3['categories'];
        for ($i = 0; $i < count($data3['categories']); $i++) {
            $res1 = $client1->request('GET', PageController::getUrl('producttypes/category/' . $data3['categories'][$i]['_id'] . ''));
            $data1[] = json_decode($res1->getBody()->getContents(), true);
        }
        $result1 = compact('data1');


        return view('user/page.productlist', compact('datajson1', 'data', 'result', 'result1', 'data4', 'resultPrice', 'time12', 'resultdatareview', 'countstar_5', 'countstar_4', 'countstar_3', 'countstar_2', 'countstar_1'));
    }

    public function getProductListCustom(Request $req)
    {
        //get json san pham theo gian hang
        $client1 = new \GuzzleHttp\Client();
        $restime = $client1->request('GET', 'https://api.timezonedb.com/v2.1/get-time-zone?key=BSPXCELRM0KP&format=json&by=zone&zone=Asia/Ho_Chi_Minh');
        $datatime = json_decode($restime->getBody()->getContents(), true);
        $todaytime = new DateTime($datatime['formatted']);
        $todaytime->setTimezone(new DateTimeZone('UTC'));
        $time12 = $todaytime->format('Y-m-d\TH:i:s.u\Z');
        if($req->id == "sale"){
            $styleSearch = array(
                "style" =>   'sale',
            );

            $datat = array();
            $res = $client1->request('GET', PageController::getUrl('products'));
            $data = json_decode($res->getBody()->getContents(), true);
            for ($i = 0; $i < count($data['products']); $i++) {
                if (!empty($data['products'][$i]['saleOff'])) {
                    $datat[] = $data['products'][$i];
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

            for ($i = 0; $i < count($data['products']); $i++) {
                $data2 = $data['products'][$i]['_id'];
                $res2 = $client1->request('GET', PageController::getUrl('productimages/product/' . $data2 . ''));
                $datatext[] = json_decode($res2->getBody()->getContents(), true);
                $res3 = $client1->request('GET', PageController::getUrl('reviewProducts/product/' . $data2 . ''));
                $datareview[] = json_decode($res3->getBody()->getContents(), true);
            }
            $result = compact('datatext');
            $resultdatareview = compact('datareview');
            array_push($data, $datareview);

            for ($i = 0; $i < count($data['0']); $i++) {
                if (!empty($data['0'][$i])) {
                    $countstar_5 = 0;
                    $countstar_4 = 0;
                    $countstar_3 = 0;
                    $countstar_2 = 0;
                    $countstar_1 = 0;
                    $countstar = array();
                    for ($j = 0; $j < count($data['0'][$i]['reviewProducts']); $j++) {
                        $IDreview[] = $data['0'][$i]['reviewProducts'][$j]['product']['_id'];
                        $countstar[] = $data['0'][$i]['reviewProducts'][$j]['ratingStar']['ratingStar'];
                        switch ($countstar[$j]) {
                            case "5":
                                $countstar_5++;
                                break;
                            case "4":
                                $countstar_4++;
                                break;
                            case "3":
                                $countstar_3++;
                                break;
                            case "2":
                                $countstar_2++;
                                break;
                            case "1":
                                $countstar_1++;
                                break;
                        }
                        if ($j == (count($data['0'][$i]['reviewProducts']) - 1)) {
                            $text12 = number_format((5 * $countstar_5 + 4 * $countstar_4 + 3 * $countstar_3 + 2 * $countstar_2 + 1 * $countstar_1) / ($countstar_5 + $countstar_4 + $countstar_3 + $countstar_2 + $countstar_1), 1, '.', '');
                            $datajson1['countsar'][] = array(
                                "id" => array_pop($IDreview),
                                "value" => ($text12)
                            );
                        }
                    }
                }
            }

            $res3 = $client1->request('GET', PageController::getUrl('categories'));
            $data3 = json_decode($res3->getBody()->getContents(), true);
            $data4 = $data3['categories'];
            for ($i = 0; $i < count($data3['categories']); $i++) {
                $res1 = $client1->request('GET', PageController::getUrl('producttypes/category/' . $data3['categories'][$i]['_id'] . ''));
                $data1[] = json_decode($res1->getBody()->getContents(), true);
            }
            $result1 = compact('data1');
            return view('user/page.searchproductlist', compact('datajson1', 'data','styleSearch', 'result', 'result1', 'data4', 'resultPrice', 'time12', 'resultdatareview', 'countstar_5', 'countstar_4', 'countstar_3', 'countstar_2', 'countstar_1'));

        }
        if($req->id == "hot"){
            $styleSearch = array(
                "style" =>   'hot',
            );
            $res = $client1->request('GET', PageController::getUrl('orderItems/productPurchase'));
            $dataproductPurchase = json_decode($res->getBody()->getContents(), true);
            for ($i = 0; $i < count($dataproductPurchase['productPurchases']); $i++) {
                $dataproductPurchase1 = $dataproductPurchase['productPurchases'][$i]['_id'];
                try {
                    $res4 = $client1->request('GET', PageController::getUrl('products/' . $dataproductPurchase1 . ''));
                    $datatextproductPurchase[] = json_decode($res4->getBody()->getContents(), true);
                } catch (\GuzzleHttp\Exception\RequestException $e) {
                    continue;
                }
            }
            $countstar_5 = 0;
            $countstar_4 = 0;
            $countstar_3 = 0;
            $countstar_2 = 0;
            $countstar_1 = 0;
            for ($i = 0; $i < count($datatextproductPurchase); $i++) {
                $res2 = $client1->request('GET', PageController::getUrl('productimages/product/' . $datatextproductPurchase[$i]['product']['_id'] . ''));
                $datatext = json_decode($res2->getBody()->getContents(), true);
                $datatextproductPurchase[$i]['product']['img'] = $datatext['imageList'][0]['imageURL'];
                $res3 = $client1->request('GET', PageController::getUrl('reviewProducts/product/' . $datatextproductPurchase[$i]['product']['_id'] . ''));
                $datareview = json_decode($res3->getBody()->getContents(), true);
                $datatextproductPurchase[$i]['product']['datareview'] =  $datareview;
            }
//            dd($datatextproductPurchase);

            for ($i = 0; $i < count($datatextproductPurchase); $i++) {
                if ($datatextproductPurchase[$i]['product']['datareview']['count'] != 0) {
                    $countstar_5 = 0;
                    $countstar_4 = 0;
                    $countstar_3 = 0;
                    $countstar_2 = 0;
                    $countstar_1 = 0;
                    $countstar = array();
                    for ($j = 0; $j < count($datatextproductPurchase[$i]['product']['datareview']['reviewProducts']); $j++) {
                        $IDreview[] = $datatextproductPurchase[$i]['product']['_id'];
                        $countstar[] = $datatextproductPurchase[$i]['product']['datareview']['reviewProducts'][$j]['ratingStar']['ratingStar'];
                        switch ($countstar[$j]) {
                            case "5":
                                $countstar_5++;
                                break;
                            case "4":
                                $countstar_4++;
                                break;
                            case "3":
                                $countstar_3++;
                                break;
                            case "2":
                                $countstar_2++;
                                break;
                            case "1":
                                $countstar_1++;
                                break;
                        }
                        if ($j == (count($datatextproductPurchase[$i]['product']['datareview']['reviewProducts']) - 1)) {
                            $text12 = number_format((5 * $countstar_5 + 4 * $countstar_4 + 3 * $countstar_3 + 2 * $countstar_2 + 1 * $countstar_1) / ($countstar_5 + $countstar_4 + $countstar_3 + $countstar_2 + $countstar_1), 1, '.', '');
                            $datajson1['countsar'][] = array(
                                "id" => array_pop($IDreview),
                                "value" => ($text12)
                            );
                        }
                    }
                }
            }
            $res3 = $client1->request('GET', PageController::getUrl('categories'));
            $data3 = json_decode($res3->getBody()->getContents(), true);
            $data4 = $data3['categories'];
            for ($i = 0; $i < count($data3['categories']); $i++) {
                $res1 = $client1->request('GET', PageController::getUrl('producttypes/category/' . $data3['categories'][$i]['_id'] . ''));
                $data1[] = json_decode($res1->getBody()->getContents(), true);
            }
            $result1 = compact('data1');
            return view('user/page.searchproductlist', compact('datajson1', 'data','styleSearch','datatextproductPurchase', 'result', 'result1', 'data4', 'resultPrice', 'time12', 'resultdatareview', 'countstar_5', 'countstar_4', 'countstar_3', 'countstar_2', 'countstar_1'));

        }

    }

    public function getRegister()
    {
        return view('user/page.register');
    }

    public function getLogin()
    {
        session()->forget('keyuser');
        return view('user/page.login');
    }

    public function getProfileShop(Request $req)
    {
        //get json san pham theo gian hang
        $client1 = new \GuzzleHttp\Client();
        $restime = $client1->request('GET', 'https://api.timezonedb.com/v2.1/get-time-zone?key=BSPXCELRM0KP&format=json&by=zone&zone=Asia/Ho_Chi_Minh');
        $datatime = json_decode($restime->getBody()->getContents(), true);
        $todaytime = new DateTime($datatime['formatted']);
        $todaytime->setTimezone(new DateTimeZone('UTC'));
        $time12 = $todaytime->format('Y-m-d\TH:i:s.u\Z');

        $resshop = $client1->request('GET', PageController::getUrl('stores/' . $req->id . ''));
        $datashop = json_decode($resshop->getBody()->getContents(), true);

        $res = $client1->request('GET', PageController::getUrl('products/store/' . $req->id . ''));
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

        for ($i = 0; $i < count($data['products']); $i++) {
            $data2 = $data['products'][$i]['_id'];
            $res2 = $client1->request('GET', PageController::getUrl('productimages/product/' . $data2 . ''));
            $datatext[] = json_decode($res2->getBody()->getContents(), true);
            $res3 = $client1->request('GET', PageController::getUrl('reviewProducts/product/' . $data2 . ''));
            $datareview[] = json_decode($res3->getBody()->getContents(), true);
        }

        $createdDate = new DateTime($datashop['store']['createdDate']);
        $createdDate->setTimezone(new DateTimeZone('UTC'));
        $createdTime = $createdDate->format('d-m-Y');

        $result = compact('datatext');
        $resultdatareview = compact('datareview');

        array_push($data, $datareview);


        $res3 = $client1->request('GET', PageController::getUrl('categories'));
        $data3 = json_decode($res3->getBody()->getContents(), true);
        $data4 = $data3['categories'];
        for ($i = 0; $i < count($data3['categories']); $i++) {
            $res1 = $client1->request('GET', PageController::getUrl('producttypes/category/' . $data3['categories'][$i]['_id'] . ''));
            $data1[] = json_decode($res1->getBody()->getContents(), true);
        }
        $result1 = compact('data1');


        for ($i = 0; $i < count($data['0']); $i++) {
            if (!empty($data['0'][$i])) {
                $countstar_5 = 0;
                $countstar_4 = 0;
                $countstar_3 = 0;
                $countstar_2 = 0;
                $countstar_1 = 0;
                $countstar = array();
                for ($j = 0; $j < count($data['0'][$i]['reviewProducts']); $j++) {
                    $IDreview[] = $data['0'][$i]['reviewProducts'][$j]['product']['_id'];
                    $countstar[] = $data['0'][$i]['reviewProducts'][$j]['ratingStar']['ratingStar'];
                    switch ($countstar[$j]) {
                        case "5":
                            $countstar_5++;
                            break;
                        case "4":
                            $countstar_4++;
                            break;
                        case "3":
                            $countstar_3++;
                            break;
                        case "2":
                            $countstar_2++;
                            break;
                        case "1":
                            $countstar_1++;
                            break;
                    }
                    if ($j == (count($data['0'][$i]['reviewProducts']) - 1)) {
                        $text12 = number_format((5 * $countstar_5 + 4 * $countstar_4 + 3 * $countstar_3 + 2 * $countstar_2 + 1 * $countstar_1) / ($countstar_5 + $countstar_4 + $countstar_3 + $countstar_2 + $countstar_1), 1, '.', '');
                        $datajson1['countsar'][] = array(
                            "id" => array_pop($IDreview),
                            "value" => ($text12)
                        );
                    }
                }
            }
        }

        $resreviewshop = $client1->request('GET', PageController::getUrl('reviewStores/store/' . $req->id . ''));
        $datareviewshop = json_decode($resreviewshop->getBody()->getContents(), true);
        $countstar_3 = 0;
        $countstar_2 = 0;
        $countstar_1 = 0;
        $countstar = array();
        for ($i = 0; $i < $datareviewshop['count']; $i++) {
            $dtstart = new DateTime($datareviewshop['reviewStores'][$i]['dateReview']);
            $dtstart->setTimezone(new DateTimeZone('UTC'));
            $timereviewshop[] = $dtstart->format('d/m/Y');
            $countstar[] = $datareviewshop['reviewStores'][$i]['ratingLevel']['ratingLevel'];
            switch ($countstar[$i]) {
                case "3":
                    $countstar_3++;
                    break;
                case "2":
                    $countstar_2++;
                    break;
                case "1":
                    $countstar_1++;
                    break;
            }
        }
        if ($datareviewshop['count'] == 0) {
            $countrating = 0;
        } else {
            $countrating = number_format((($countstar_2 + $countstar_1) / ($countstar_2 + $countstar_1 + $countstar_3)) * 100, 1, '.', '');
        }
        $resfollowcount = $client1->request('GET', PageController::getUrl('followStores/store/' . $req->id . ''));
        $datafollowcount = json_decode($resfollowcount->getBody()->getContents(), true);

        $datafollow = '';
        if (Session::has('keyuser')) {
            try {
                $resfollow = $client1->request('GET', PageController::getUrl('followStores/check/' . Session::get('keyuser')['info'][0]['customer']['_id'] . '/' . $req->id . ''));
                $datafollow = json_decode($resfollow->getBody()->getContents(), true);
                // dd($datawl);
            } catch (\GuzzleHttp\Exception\RequestException $e) {

            }
        }
        //   dd($countrating);
        return view('user/page.profileshop', compact('datafollowcount', 'datafollow', 'countstar_1', 'countstar_2', 'countstar_3', 'countrating', 'timereviewshop', 'datareviewshop', 'createdTime', 'datashop', 'datajson1', 'data', 'result', 'result1', 'data4', 'resultPrice', 'time12', 'resultdatareview', 'countstar_5', 'countstar_4', 'countstar_3', 'countstar_2', 'countstar_1'));
    }

    public function getCart()
    {
        //get thong tin san pham
        if (Session::has('cart')) {
            $client = new \GuzzleHttp\Client();
            $restime = $client->request('GET', 'https://api.timezonedb.com/v2.1/get-time-zone?key=BSPXCELRM0KP&format=json&by=zone&zone=Asia/Ho_Chi_Minh');
            $datatime = json_decode($restime->getBody()->getContents(), true);
            $todaytime = new DateTime($datatime['formatted']);
            $todaytime->setTimezone(new DateTimeZone('UTC'));
            $time = $todaytime->format('Y-m-d\TH:i:s.u\Z');
            $res = $client->request('GET', PageController::getUrl('deliveryprices'));
            $data = json_decode($res->getBody()->getContents(), true);

            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);

              if (count($cart->items) > 0) {
                  $product_cart = $cart->items;
                  $oldCart1 = Session::get('cart');
                  $cart1 = new Cart($oldCart1);
                  foreach ($product_cart as $key => $value) {
                      $res1 = $client->request('GET', PageController::getUrl('products/' . $value['item']['_id'] . ''));
                      $data1 = json_decode($res1->getBody()->getContents(), true);
                      if ($data1['product']['quantity'] == 0) {
                          $cart1->removeItem($value['item']['_id']);
                          if (count($cart1->items) > 0) {
                              Session::put('cart', $cart1);
                          } else {
                              Session::forget('cart');
                          }
                      }
                      $cart1->add($value['item']['_id'], 0, $time);
                      Session::put('cart', $cart1);

                  }
                  $product_cart = $cart1->items;
              }
            return view('user/page.cart', compact('product_cart', 'data', 'time'));
        } else {
            return redirect()->back()->with(['flag'=>'info','title'=>'Thông báo' ,'message'=>'Chưa có sản phẩm trong giỏ hàng']);
        }

    }

    public function getCheckCart()
    {
        if (Session::has('Idaddress')) {
            $client = new \GuzzleHttp\Client();
            $restime = $client->request('GET', 'https://api.timezonedb.com/v2.1/get-time-zone?key=BSPXCELRM0KP&format=json&by=zone&zone=Asia/Ho_Chi_Minh');
            $datatime = json_decode($restime->getBody()->getContents(), true);
            $todaytime = new DateTime($datatime['formatted']);
            $todaytime->setTimezone(new DateTimeZone('UTC'));
            $time = $todaytime->format('Y-m-d\TH:i:s.u\Z');
            $res = $client->request('GET', PageController::getUrl('deliveryprices'));
            $data = json_decode($res->getBody()->getContents(), true);

            $oldCart = Session::get('cart');
            // dd($oldCart);
            $cart = new Cart($oldCart);
            $product_cart = $cart->items;
            // dd(Session::get('keyuser'));

            $resPaymentMethods = $client->request('GET', PageController::getUrl('PaymentMethods'));
            $dataPaymentMethods = json_decode($resPaymentMethods->getBody()->getContents(), true);

            $resaddressone = $client->request('GET', PageController::getUrl('deliveryAddresses/' . Session::get('Idaddress') . ''));
            $dataaddressone = json_decode($resaddressone->getBody()->getContents(), true);

            $resaddress = $client->request('GET', PageController::getUrl('deliveryaddresses/customer/' . Session::get('keyuser')['info'][0]['customer']['_id'] . ''));
            $dataaddress = json_decode($resaddress->getBody()->getContents(), true);

            return view('user/page.checkcart', compact('product_cart', 'data', 'time', 'dataaddress', 'dataaddressone', 'dataPaymentMethods'));
        }
        if (Session::has('keyuser')) {
            $client = new \GuzzleHttp\Client();
            $restime = $client->request('GET', 'https://api.timezonedb.com/v2.1/get-time-zone?key=BSPXCELRM0KP&format=json&by=zone&zone=Asia/Ho_Chi_Minh');
            $datatime = json_decode($restime->getBody()->getContents(), true);
            $todaytime = new DateTime($datatime['formatted']);
            $todaytime->setTimezone(new DateTimeZone('UTC'));
            $time = $todaytime->format('Y-m-d\TH:i:s.u\Z');
            $res = $client->request('GET', PageController::getUrl('deliveryprices'));
            $data = json_decode($res->getBody()->getContents(), true);
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);
            $product_cart = $cart->items;
            $resPaymentMethods = $client->request('GET', PageController::getUrl('PaymentMethods'));
            $dataPaymentMethods = json_decode($resPaymentMethods->getBody()->getContents(), true);

            $resaddress = $client->request('GET', PageController::getUrl('deliveryaddresses/customer/' . Session::get('keyuser')['info'][0]['customer']['_id'] . ''));
            $dataaddress = json_decode($resaddress->getBody()->getContents(), true);
//            dd($dataaddress);
            return view('user/page.checkcart', compact('product_cart', 'data', 'time', 'dataaddress', 'dataPaymentMethods'));
        } else {
            return redirect()->route('dang-nhap')->with(['flag' => 'info', 'title' => 'Cần đăng nhập để sử dụng chức năng', 'message' => ' ']);
        }

    }

    public function getCheckOut(Request $req)
    {
        if (Session::has('keyuser')) {

            $client = new \GuzzleHttp\Client();
            $restime = $client->request('GET', 'https://api.timezonedb.com/v2.1/get-time-zone?key=BSPXCELRM0KP&format=json&by=zone&zone=Asia/Ho_Chi_Minh');
            $datatime = json_decode($restime->getBody()->getContents(), true);
            $todaytime = new DateTime($datatime['formatted']);
            $todaytime->setTimezone(new DateTimeZone('UTC'));
            $time = $todaytime->format('Y-m-d\TH:i:s.u\Z');
            $res = $client->request('GET', PageController::getUrl('deliveryprices'));
            $data = json_decode($res->getBody()->getContents(), true);
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);
            $product_cart = $cart->items;

            $resorder = $client->request('GET', PageController::getUrl('orders/' . $req->id . ''));
            $dataorder = json_decode($resorder->getBody()->getContents(), true);
            // dd($dataorder);
            return view('user/page.checkout', compact('product_cart', 'data', 'time', 'dataorder'));
        } else {
            return redirect()->route('dang-nhap')->with(['flag' => 'info', 'title' => 'Cần đăng nhập để sử dụng chức năng', 'message' => ' ']);
        }
    }

    public function getProfileUser(Request $req)
    {
        $client = new \GuzzleHttp\Client();
        try {
            $rescustomer = $client->request('GET', PageController::getUrl('customers/' . $req->id . ''));
            $datacustomer = json_decode($rescustomer->getBody()->getContents(), true);
//            dd($datacustomer);
            $resaddress = $client->request('GET', PageController::getUrl('deliveryaddresses/customer/' . Session::get('keyuser')['info'][0]['customer']['_id'] . ''));
            $dataaddress = json_decode($resaddress->getBody()->getContents(), true);
            // dd($dataaddress);
            if ($datacustomer['customer']['birthday'] != null) {
                $dtstart = new DateTime($datacustomer['customer']['birthday']);
                $dtstart->setTimezone(new DateTimeZone('UTC'));
                $start = $dtstart->format('Y-m-d');
            }else{
                $start = 'Y-m-d';
            }


            $resorder = $client->request('GET', PageController::getUrl('orders/customer/' . Session::get('keyuser')['info'][0]['customer']['_id'] . ''));
            $dataorder = json_decode($resorder->getBody()->getContents(), true);
//             dd($dataorder);
            $dataorderitem = array();
            for ($i = 0; $i < count($dataorder['orders']); $i++) {
                $resorderitem = $client->request('GET', PageController::getUrl('orderItems/order/' . $dataorder['orders'][$i]['_id'] . ''));
                $dataorderitem[] = json_decode($resorderitem->getBody()->getContents(), true);
                $dataorder['orders'][$i]['OrderItem'] = $dataorderitem[$i];
            }
            $resultorderitem = compact('dataorderitem');
//             dd($dataorder);

            $resregisterstore = $client->request('GET', PageController::getUrl('registeredSales/customer/' . Session::get('keyuser')['info'][0]['customer']['_id'] . ''));
            $dataregisterstore = json_decode($resregisterstore->getBody()->getContents(), true);
            // dd($dataregisterstore);
            return view('user/page.profileuser', compact('dataregisterstore', 'datacustomer', 'dataaddress', 'start', 'dataorder', 'resultorderitem'));

        } catch (\GuzzleHttp\Exception\ClientException $e) {
            return $e->getResponse()->getStatusCode();

        }
        // dd($dataaddress);
        return view('user/page.profileuser', compact('datacustomer', 'dataaddress'));
    }

    public function getProfileUserShop(Request $req)
    {
        $client = new \GuzzleHttp\Client();
        try {
            $restime = $client->request('GET', 'https://api.timezonedb.com/v2.1/get-time-zone?key=BSPXCELRM0KP&format=json&by=zone&zone=Asia/Ho_Chi_Minh');
            $datatime = json_decode($restime->getBody()->getContents(), true);
            $todaytime = new DateTime($datatime['formatted']);
            $todaytime->setTimezone(new DateTimeZone('UTC'));
            $time12 = $todaytime->format('Y-m-d\TH:i:s.u\Z');

            $reswl = $client->request('GET', PageController::getUrl('wishList/customer/' . $req->id . ''));
            $datawl = json_decode($reswl->getBody()->getContents(), true);
            // dd($datawl);
            $dataproduct = array();
            for ($i = 0; $i < $datawl['count']; $i++) {
                if ($datawl['wishList'][$i]['product']['_id'] != null) {
                    $resproduct = $client->request('GET', PageController::getUrl('products/' . $datawl['wishList'][$i]['product']['_id'] . ''));
                    $dataproduct[] = json_decode($resproduct->getBody()->getContents(), true);
                    $resproduct = $client->request('GET', PageController::getUrl('productimages/product/' . $datawl['wishList'][$i]['product']['_id'] . ''));
                    $dataproductimgae[] = json_decode($resproduct->getBody()->getContents(), true);
                } else {
                    continue;
                }
            }
            $resultproduct = compact('dataproduct');
            $resultproductimage = compact('dataproductimgae');
            $dataStore = array();
            $resfollowStore = $client->request('GET', PageController::getUrl('followStores/customer/' . Session::get('keyuser')['info'][0]['customer']['_id'] . ''));
            $datafollow = json_decode($resfollowStore->getBody()->getContents(), true);
            for ($i = 0; $i < count($datafollow['followStores']); $i++) {
                $resStore = $client->request('GET', PageController::getUrl('stores/' . $datafollow['followStores'][$i]['store']['_id'] . ''));
                $dataStore[] = json_decode($resStore->getBody()->getContents(), true);
                $resProductStore = $client->request('GET', PageController::getUrl('products/store/' . $datafollow['followStores'][$i]['store']['_id'] . ''));
                $dataProductStore[] = json_decode($resProductStore->getBody()->getContents(), true);
                for ($j = 0; $j < count($dataProductStore[$i]['products']); $j++) {
                    $res2 = $client->request('GET', PageController::getUrl('productimages/product/' . $dataProductStore[$i]['products'][$j]['_id'] . ''));
                    $dataimgproduct[] = json_decode($res2->getBody()->getContents(), true);
                }

            }
            $resultStore = compact('dataStore');
            // dd($dataimgproduct);
            // dd($resultProductStore);
            return view('user/page.profileusershop', compact('dataproduct', 'dataimgproduct', 'dataProductStore', 'resultStore', 'time12', 'datawl', 'resultproduct', 'dataproductimgae', 'resultproductimage'));
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            // return $e->getResponse()->getStatusCode();
            return view('user/page.profileusershop', compact('dataproduct', 'dataimgproduct', 'dataProductStore', 'resultStore', 'time12', 'datawl', 'resultproduct', 'dataproductimgae', 'resultproductimage'));


        }
        return view('user/page.profileusershop', compact('datawl', 'dataproduct', 'resultproductimage'));
    }

    public function getRegisterShop()
    {
        if(Session::has('keyuser')){
            return view('user/page.registershop');
        }else{
            return redirect()->route('dang-nhap');
        }
    }

    public function getReviewShop(Request $req)
    {
        $client = new \GuzzleHttp\Client();
        try {
            $rescustomer = $client->request('GET', PageController::getUrl('customers/' . $req->id . ''));
            $datacustomer = json_decode($rescustomer->getBody()->getContents(), true);
            $resorder = $client->request('GET', PageController::getUrl('orders/customer/' . $datacustomer['customer']['_id'] . ''));
            $dataorder = json_decode($resorder->getBody()->getContents(), true);
//            dd($dataorder);
            $dataorderitem = array();
            $dataproduct = array();
            for ($i = 0; $i < count($dataorder['orders']); $i++) {
                $resorderitem = $client->request('GET', PageController::getUrl('orderItems/order/' . $dataorder['orders'][$i]['_id'] . ''));
                $dataorderitem[] = json_decode($resorderitem->getBody()->getContents(), true);
                for ($j = 0; $j < count($dataorderitem[$i]['orderItems']); $j++) {
                    for ($h = 0; $h < count($dataorderitem[$i]['orderItems'][$j]); $h++) {
                        if($dataorderitem[$i]['orderItems'][$j]['isReview'] === false && $dataorderitem[$i]['orderItems'][$j]['orderItemState']['_id'] === '5b9a1a1bffed2b1e60a5d783'){
                            try {
                                $resproduct = $client->request('GET', PageController::getUrl('products/' . $dataorderitem[$i]['orderItems'][$j]['product']['_id']. ''));
                                $dataproduct[] = $dataorderitem[$i]['orderItems'][$j];
                                break;
                            } catch (\GuzzleHttp\Exception\RequestException $e) {
                                break;
                            }
                        }


                    }
                }
            }
//            dd($dataproduct);
            $resultorderitem = compact('dataorderitem');
            $resreviewproduct = $client->request('GET', PageController::getUrl('reviewProducts/customer/' . $datacustomer['customer']['_id'] . ''));
            $datareviewproduct = json_decode($resreviewproduct->getBody()->getContents(), true);
            $resreviewshop = $client->request('GET', PageController::getUrl('reviewStores/customer/' . $datacustomer['customer']['_id'] . ''));
            $datareviewshop = json_decode($resreviewshop->getBody()->getContents(), true);
            $datareviewproduct['reviewStores'] = $datareviewshop['reviewStores'];

        } catch (\GuzzleHttp\Exception\RequestException $e) {
            return $e->getResponse()->getStatusCode();
        }

        return view('user/page.reviewshop', compact('datareviewshop','dataproduct', 'datareviewproduct', 'dataorder', 'resultorderitem'));
    }

    public function getWriteReviewShop(Request $req)
    {
        // dd($req);
        $client = new \GuzzleHttp\Client();
        $resOrderItem = $client->request('GET', PageController::getUrl('orderItems/' . $req->id . ''));
        $dataOrderItem = json_decode($resOrderItem->getBody()->getContents(), true);
        // dd($data);
        $OrderItemId = $req->id;
        //get anh san pham
        $res = $client->request('GET', PageController::getUrl('products/' . $dataOrderItem['orderItem']['product']['_id'] . ''));
        $data[] = json_decode($res->getBody()->getContents(), true);
        $resultdata = compact('data');
        $res = $client->request('GET', PageController::getUrl('productimages/product/' . $dataOrderItem['orderItem']['product']['_id'] . ''));
        $datatext[] = json_decode($res->getBody()->getContents(), true);
        $resultimg = compact('datatext');
        return view('user/page.writereviewadmin', compact('resultdata', 'resultimg', 'OrderItemId'));
    }

    public function getContact(){
        return view('user/page.contact');
    }
    //End user


    //Admin gian hàng
    public function getIndexAdmin()
    {
        $client = new \GuzzleHttp\Client();
        if (Session::has('key') && Session::get('key')['role']['roleName'] == 'Quản lý gian hàng') {
            $store = Session::get('key')[0]['store']['_id'];
            $resOrderItems = $client->request('GET', PageController::getUrl('orderItems/getByState/5b9a1a1bffed2b1e60a5d783'));
            $dataOrderItems = json_decode($resOrderItems->getBody()->getContents(), true);
            for ($i = 0; $i < $dataOrderItems['count']; $i++) {
                $resProductStore = $client->request('GET', PageController::getUrl('products/store/' . $store . ''));
                $dataProductStore = json_decode($resProductStore->getBody()->getContents(), true);
                for ($j = 0; $j < count($dataProductStore['products']); $j++) {
                    if ($dataOrderItems['orderItems'][$i]['product']['_id'] == $dataProductStore['products'][$j]['_id']) {
                        $dataProductOrder[] = $dataOrderItems['orderItems'][$i];
                    }
                }
            }
            $resultProductOrder = compact('dataProductOrder');
            $rescategorystore = $client->request('GET', PageController::getUrl('stores/' . $store . ''));
            $datacategorystore = json_decode($rescategorystore->getBody()->getContents(), true);
//            dd($datacategorystore);
            $totalprice = 0;
            if(!empty($resultProductOrder['dataProductOrder'])){
                for ($i = 0; $i < count($resultProductOrder['dataProductOrder']); $i++) {
                    $totalprice += ($resultProductOrder['dataProductOrder'][$i]['product']['price'] * $resultProductOrder['dataProductOrder'][$i]['quantity']);
                }
                //            CustomOrder

                for ($i = 0; $i < count($resultProductOrder['dataProductOrder']); $i++) {
                    $resOrder = $client->request('GET', PageController::getUrl('orders/' . $resultProductOrder['dataProductOrder'][$i]['orderId'] . ''));
                    $dataOrder[] = json_decode($resOrder->getBody()->getContents(), true);

                    if ($dataOrder[$i]['order']['_id'] == $resultProductOrder['dataProductOrder'][$i]['orderId']) {
                        $dataOrder[$i]['OrderItem'] = $dataProductOrder[$i];
                        $dataOrder[$i]['total'] = ($resultProductOrder['dataProductOrder'][$i]['product']['price'] * $resultProductOrder['dataProductOrder'][$i]['quantity']);
                        $resProductType = $client->request('GET', PageController::getUrl('products/' . $dataOrder[$i]['OrderItem']['product']['_id'] . ''));
                        $dataProductType = json_decode($resProductType->getBody()->getContents(), true);
                        $dataOrder[$i]['OrderItem']['ProductType'] = $dataProductType['product']['productType'];
                        $resCategory = $client->request('GET', PageController::getUrl('productTypes/' . $dataOrder[$i]['OrderItem']['ProductType']['_id'] . ''));
                        $dataCategory = json_decode($resCategory->getBody()->getContents(), true);
                        $dataOrder[$i]['OrderItem']['Category'] = $dataCategory['productType']['category'];
                    }
                }
//                array_reverse($dataOrder);
                $resultOrder = compact('dataOrder');
//                dd($resultOrder);
//                $test123 =  array_reverse($resultOrder['dataOrder']);
//                dd($test123);
                $counttotal = array();
                for ($i = 0; $i < count($dataOrder); $i++) {
                    for ($j = 0; $j < count($datacategorystore['store']['categories']); $j++) {
                        if (($j++) ) {
                            $counttotal[]= $dataOrder[$i]['OrderItem']['Category']['_id'];
                        }
                    }
                }
                $countcategory = array_count_values($counttotal);
                $counts = array();
                for ($i = 0; $i < count($dataOrder); $i++) {
                    for ($j = 0; $j < count($datacategorystore['store']['categories']); $j++) {
                        if (($j++)) {
                            if( array_key_exists( $dataOrder[$i]['OrderItem']['Category']['_id'], $counts) === true){
                                $counts[$dataOrder[$i]['OrderItem']['Category']['_id']] =$counts[$dataOrder[$i]['OrderItem']['Category']['_id']] + $dataOrder[$i]['total'];
                            }else{
                                $counts[$dataOrder[$i]['OrderItem']['Category']['_id']] = $dataOrder[$i]['total'];
                            }
                        }

                    }
                }

            }else{
                $resultProductOrder['dataProductOrder'] = array();
                $resultOrder['dataOrder'] = array();
                $countcategory = array();
                $counts = array();
            }
//            reviewStore
            $resreviewshop = $client->request('GET', PageController::getUrl('reviewStores/store/' .$store. ''));
            $datareviewshop = json_decode($resreviewshop->getBody()->getContents(), true);
            $countstar_3 = 0;
            $countstar_2 = 0;
            $countstar_1 = 0;
            $countstar = array();
            for ($i = 0; $i < $datareviewshop['count']; $i++) {
                $dtstart = new DateTime($datareviewshop['reviewStores'][$i]['dateReview']);
                $dtstart->setTimezone(new DateTimeZone('UTC'));
                $timereviewshop[] = $dtstart->format('d/m/Y');
                $countstar[] = $datareviewshop['reviewStores'][$i]['ratingLevel']['ratingLevel'];
                switch ($countstar[$i]) {
                    case "3":
                        $countstar_3++;
                        break;
                    case "2":
                        $countstar_2++;
                        break;
                    case "1":
                        $countstar_1++;
                        break;
                }
            }
            if ($datareviewshop['count'] == 0) {
                $countrating = 0;
            } else {
                $countrating = number_format((($countstar_2 + $countstar_1) / ($countstar_2 + $countstar_1 + $countstar_3)) * 100, 1, '.', '');
            }
//            followStore
            $resfollowStore = $client->request('GET', PageController::getUrl('followStores/store/' .$store. ''));
            $datafollowStore = json_decode($resfollowStore->getBody()->getContents(), true);


            return view('admin/page.trangchu',compact('resultProductOrder','counts','countrating','datafollowStore','resultOrder','totalprice','datacategorystore','countcategory'));
        }
        return redirect()->guest(route('login-admin'));
    }

    public function getProductAdmin()
    {
        if (Session::has('key') && Session::get('key')['role']['roleName'] == 'Quản lý gian hàng') {
            $store = Session::get('key')[0]['store']['_id'];
            $client1 = new \GuzzleHttp\Client();
            if (Session::has('SearchProductTypeId')) {

                $res = $client1->request('GET', PageController::getUrl('products/store/producttype/' . $store . '/' . Session::get('SearchProductTypeId') . ''));
                $data = json_decode($res->getBody()->getContents(), true);
                //  dd($data);
                //end get json
                $datatext = array();
                for ($i = 0; $i < count($data['products']); $i++) {
                    $data2 = $data['products'][$i]['_id'];
                    $res2 = $client1->request('GET', PageController::getUrl('productimages/product/' . $data2 . ''));
                    $datatext[] = json_decode($res2->getBody()->getContents(), true);

                }
                $result = compact('datatext');
                // dd($result);
                $res12 = PageController::getUrl('stores/' . $store . '');
                $data_category = PageController::getUrl('categories');
                $data_product_type = PageController::getUrl('producttypes/category');
                $data_product_type_specificationtypes = PageController::getUrl('specificationtypes/producttype');

                return view('admin/page.product', compact('data', 'res12', 'result', 'store', 'data_category', 'data_product_type', 'data_product_type_specificationtypes'));

            } else {
                //get json san pham theo gian hang

                $res = $client1->request('GET', PageController::getUrl('products/store/' . $store . ''));
                $data = json_decode($res->getBody()->getContents(), true);
                //  dd($data);
                //end get json
                $datatext = array();
                for ($i = 0; $i < count($data['products']); $i++) {
                    $data2 = $data['products'][$i]['_id'];
                    $res2 = $client1->request('GET', PageController::getUrl('productimages/product/' . $data2 . ''));
                    $datatext[] = json_decode($res2->getBody()->getContents(), true);

                }
                $result = compact('datatext');
                // dd($result);
                $res12 = PageController::getUrl('stores/' . $store . '');
                $data_category = PageController::getUrl('categories');
                $data_product_type = PageController::getUrl('producttypes/category');
                $data_product_type_specificationtypes = PageController::getUrl('specificationtypes/producttype');

                return view('admin/page.product', compact('data', 'result', 'res12', 'store', 'data_category', 'data_product_type', 'data_product_type_specificationtypes'));
            }
        }
        return redirect()->guest(route('login-admin', [], false));

    }

    public function getCategoryAdmin()
    {
        if (Session::has('key') && Session::get('key')['role']['roleName'] == 'Quản lý gian hàng') {
            $store = Session::get('key')[0]['store']['_id'];
            //get json danh muc all
            $client1 = new \GuzzleHttp\Client();
            $res = $client1->request('GET', PageController::getUrl('categories'));
            $data = json_decode($res->getBody()->getContents(), true);
            //get storeId
            $res1 = $client1->request('GET', PageController::getUrl('stores/' . $store . ''));
            $data1 = json_decode($res1->getBody()->getContents(), true);
            //get danh muc trong store
            $data2 = array();
            for ($i = 0; $i < count($data1['store']['categories']); $i++) {
                $data2[] = $data1['store']['categories'][$i]['category'];
            }
            $data3 = array();
            for ($i = 0; $i < count($data['categories']); $i++) {
                $count = 0;
                for ($j = 0; $j < count($data2); $j++) {
                    if ($data2[$j]['_id'] != $data['categories'][$i]['_id']) {
                        $count++;
                        if ($count == count($data2)) {
                            $data3[] = $data['categories'][$i];
                        }
                    }
                }
            }

            $result1 = compact('data3');

            $result = compact('data2');
            // dd($result);

            return view('admin/page.categoryadmin', compact('data', 'result', 'result1'));
        }
        return redirect()->guest(route('login-admin', [], false));

    }

    public function getProductDetailAdmin(Request $req)
    {
        if (Session::has('key') && Session::get('key')['role']['roleName'] == 'Quản lý gian hàng') {
            $data = array();
            $datatext = array();
            //get json san pham theo ID san pham

            //get thong tin san pham
            $client = new \GuzzleHttp\Client();
            $res = $client->request('GET', PageController::getUrl('products/' . $req->id . ''));
            $data[] = json_decode($res->getBody()->getContents(), true);
            $resultdata = compact('data');
            // dd($resultdata);
            //get anh san pham
            $res = $client->request('GET', PageController::getUrl('productimages/product/' . $req->id . ''));
            $datatext[] = json_decode($res->getBody()->getContents(), true);
            $resultimg = compact('datatext');

            //end get json
            // dd($result);

            return view('admin/page.productdetail', compact('resultdata', 'resultimg'));
        }
        return redirect()->guest(route('login-admin', [], false));

    }

    public function getEditProductDetailAdmin(Request $req)
    {
        if (Session::has('key') && Session::get('key')['role']['roleName'] == 'Quản lý gian hàng') {
            $data = array();
            $datatext = array();
            //get json san pham theo ID san pham

            //get thong tin san pham
            $client = new \GuzzleHttp\Client();
            $res = $client->request('GET', PageController::getUrl('products/' . $req->id . ''));
            $data[] = json_decode($res->getBody()->getContents(), true);
            $resultdata = compact('data');

            //get anh san pham
            $res = $client->request('GET', PageController::getUrl('productimages/product/' . $req->id . ''));
            $datatext[] = json_decode($res->getBody()->getContents(), true);
            $resultimg = compact('datatext');

            //end get json
            return view('admin/page.editproductdetail', compact('resultdata', 'resultimg'));
        }
        return redirect()->guest(route('login-admin', [], false));
    }

    public function getAddProductDetailAdmin(Request $req)
    {
        if (Session::has('key') && Session::get('key')['role']['roleName'] == 'Quản lý gian hàng') {
            $storeId = $req->id;
            $store = Session::get('key')[0]['store']['_id'];
            $res1 = PageController::getUrl('stores/' . $store . '');
            $data_category = PageController::getUrl('categories');
            $data_product_type = PageController::getUrl('producttypes/category');
            $data_product_type_specificationtypes = PageController::getUrl('specificationtypes/producttype');
            return view('admin/page.addproductdetail', compact('storeId', 'res1', 'data_category', 'data_product_type', 'data_product_type_specificationtypes'));
        }
        return redirect()->guest(route('login-admin', [], false));
    }

    public function getReview()
    {
        if (Session::has('key') && Session::get('key')['role']['roleName'] == 'Quản lý gian hàng') {
            $client1 = new \GuzzleHttp\Client();
            $resreviewshop = $client1->request('GET', PageController::getUrl('reviewStores/store/' . Session::get('key')[0]['store']['_id'] . ''));
            $datareviewshop = json_decode($resreviewshop->getBody()->getContents(), true);
            $countstar_3 = 0;
            $countstar_2 = 0;
            $countstar_1 = 0;
            $countstar = array();
            for ($i = 0; $i < $datareviewshop['count']; $i++) {
                $dtstart = new DateTime($datareviewshop['reviewStores'][$i]['dateReview']);
                $dtstart->setTimezone(new DateTimeZone('UTC'));
                $timereviewshop[] = $dtstart->format('d/m/Y');
                $countstar[] = $datareviewshop['reviewStores'][$i]['ratingLevel']['ratingLevel'];
                switch ($countstar[$i]) {
                    case "3":
                        $countstar_3++;
                        break;
                    case "2":
                        $countstar_2++;
                        break;
                    case "1":
                        $countstar_1++;
                        break;
                }
            }
            if ($datareviewshop['count'] == 0) {
                $countrating = 0;
            } else {
                $countrating = number_format((($countstar_2 + $countstar_1) / ($countstar_2 + $countstar_1 + $countstar_3)) * 100, 1, '.', '');
            }
            return view('admin/page.reviewadmin', compact('datareviewshop', 'countrating', 'timereviewshop', 'countstar_1', 'countstar_2', 'countstar_3'));
        }
        return redirect()->guest(route('login-admin', [], false));

    }

    public function getDiscount()
    {
        if (Session::has('key') && Session::get('key')['role']['roleName'] == 'Quản lý gian hàng') {
            $store = Session::get('key')[0]['store']['_id'];
            $client1 = new \GuzzleHttp\Client();
            $restime = $client1->request('GET', 'https://api.timezonedb.com/v2.1/get-time-zone?key=BSPXCELRM0KP&format=json&by=zone&zone=Asia/Ho_Chi_Minh');
            $datatime = json_decode($restime->getBody()->getContents(), true);

            $todaytime = new DateTime($datatime['formatted']);
            $todaytime->setTimezone(new DateTimeZone('UTC'));
            $time = $todaytime->format('Y-m-d\TH:i:s.u\Z');
            // dd($time);
            //get json san pham theo gian hang

            if (Session::has('SearchProductTypeId')) {
                $res = $client1->request('GET', PageController::getUrl('products/store/producttype/' . $store . '/' . Session::get('SearchProductTypeId') . ''));
                $data = json_decode($res->getBody()->getContents(), true);

                $datatext1 = array();
                $datatext2 = array();
                for ($i = 0; $i < count($data['products']); $i++) {
                    if (empty($data['products'][$i]['saleOff']) || $data['products'][$i]['saleOff']['dateEnd'] < $time) {
                        $datatext1[] = $data['products'][$i];
                    }
                }
                $result1 = compact('datatext1');

                // for ($i=0;  $i < count($data['products']); $i++){
                //     if(empty($data['products'][$i]['saleOff']) || $data['products'][$i]['saleOff']['dateEnd'] > $time){
                //         $datatext2[] = $data['products'][$i];
                //     }
                // }
                $result2 = array();
                // dd($result2);
                //end get json
                $datatext = array();
                for ($i = 0; $i < count($data['products']); $i++) {
                    if (empty($data['products'][$i]['saleOff']) || $data['products'][$i]['saleOff']['dateEnd'] < $time) {
                        $data2 = $data['products'][$i]['_id'];
                        $res2 = $client1->request('GET', PageController::getUrl('productimages/product/' . $data2 . ''));
                        $datatext[] = json_decode($res2->getBody()->getContents(), true);
                    }
                }
                $result = compact('datatext');
                $resdis = PageController::getUrl('salesoff/store/' . $store . '');
                $res1 = PageController::getUrl('stores/' . $store . '');
                $data_category = PageController::getUrl('categories');
                $data_product_type = PageController::getUrl('producttypes/category');
                $data_product_type_specificationtypes = PageController::getUrl('specificationtypes/producttype');
                $resdis1 = $client1->request('GET', $resdis);
                $datatextdis = json_decode($resdis1->getBody()->getContents(), true);
                return view('admin/page.discountadmin', compact('datatextdis','time', 'data', 'result3', 'result2', 'resdis', 'result1', 'res1', 'result', 'data_category', 'data_product_type', 'data_product_type_specificationtypes'));

            } else if (Session::has('SearchSaleOffId')) {
                $res = $client1->request('GET', PageController::getUrl('products/saleoff/' . Session::get('SearchSaleOffId') . ''));
                $data = json_decode($res->getBody()->getContents(), true);
                $datatext1 = array();
                $datatext2 = array();
                for ($i = 0; $i < count($data['products']); $i++) {
                    if (empty($data['products'][$i]['saleOff']) || $data['products'][$i]['saleOff']['dateEnd'] < $time) {
                        $datatext1[] = $data['products'][$i];
                    }
                }
                $result1 = compact('datatext1');

                for ($i = 0; $i < count($data['products']); $i++) {
                    if (empty($data['products'][$i]['saleOff']) || $data['products'][$i]['saleOff']['dateEnd'] > $time) {
                        $datatext2[] = $data['products'][$i];
                    }
                }
                $result2 = compact('datatext2');

                //end get json
                $datatext = array();
                for ($i = 0; $i < count($data['products']); $i++) {
                    if (empty($data['products'][$i]['saleOff']) || $data['products'][$i]['saleOff']['dateEnd'] < $time) {
                        $data2 = $data['products'][$i]['_id'];
                        $res2 = $client1->request('GET', PageController::getUrl('productimages/product/' . $data2 . ''));
                        $datatext[] = json_decode($res2->getBody()->getContents(), true);
                    }
                }
                $result = compact('datatext');

                $datatext1 = array();
                for ($i = 0; $i < count($data['products']); $i++) {
                    if (empty($data['products'][$i]['saleOff']) || $data['products'][$i]['saleOff']['dateEnd'] > $time) {
                        $data21 = $data['products'][$i]['_id'];
                        $res21 = $client1->request('GET', PageController::getUrl('productimages/product/' . $data21 . ''));
                        $datatext1[] = json_decode($res21->getBody()->getContents(), true);
                    }
                }
                $result3 = compact('datatext1');
                // dd($result);
                $resdis = PageController::getUrl('salesoff/store/' . $store . '');
                $res1 = PageController::getUrl('stores/' . $store . '');
                $data_category = PageController::getUrl('categories');
                $data_product_type = PageController::getUrl('producttypes/category');
                $data_product_type_specificationtypes = PageController::getUrl('specificationtypes/producttype');
                $resdis1 = $client1->request('GET', $resdis);
                $datatextdis = json_decode($resdis1->getBody()->getContents(), true);
                return view('admin/page.discountadmin', compact('datatextdis','time', 'data', 'result3', 'result2', 'resdis', 'result1', 'res1', 'result', 'data_category', 'data_product_type', 'data_product_type_specificationtypes'));

            } else {
                $res = $client1->request('GET', PageController::getUrl('products/store/' . $store . ''));
                $data = json_decode($res->getBody()->getContents(), true);
                $datatext1 = array();
                $datatext2 = array();

                for ($i = 0; $i < count($data['products']); $i++) {
                    if (empty($data['products'][$i]['saleOff']) || $data['products'][$i]['saleOff']['dateEnd'] < $time) {
                        $datatext1[] = $data['products'][$i];
                    }
                }
                $result1 = compact('datatext1');

                for ($i = 0; $i < count($data['products']); $i++) {
                    if (!empty($data['products'][$i]['saleOff']) && $data['products'][$i]['saleOff']['dateEnd'] > $time) {
                        $datatext2[] = $data['products'][$i];
                    }
                }
                $result2 = compact('datatext2');

                //end get json
                $datatext = array();
                for ($i = 0; $i < count($data['products']); $i++) {
                    if (empty($data['products'][$i]['saleOff']) || $data['products'][$i]['saleOff']['dateEnd'] < $time) {
                        $data2 = $data['products'][$i]['_id'];
                        $res2 = $client1->request('GET', PageController::getUrl('productimages/product/' . $data2 . ''));
                        $datatext[] = json_decode($res2->getBody()->getContents(), true);
                    }
                }
                $result = compact('datatext');
                $datatext1 = array();
                for ($i = 0; $i < count($data['products']); $i++) {
                    if (!empty($data['products'][$i]['saleOff']) && $data['products'][$i]['saleOff']['dateEnd'] > $time) {
                        $data21 = $data['products'][$i]['_id'];
                        $res21 = $client1->request('GET', PageController::getUrl('productimages/product/' . $data21 . ''));
                        $datatext1[] = json_decode($res21->getBody()->getContents(), true);
                    }
                }
                $result3 = compact('datatext1');
                // dd($result);

                $resdis = PageController::getUrl('salesoff/store/' . $store . '');
                $res1 = PageController::getUrl('stores/' . $store . '');
                $data_category = PageController::getUrl('categories');
                $data_product_type = PageController::getUrl('producttypes/category');
                $data_product_type_specificationtypes = PageController::getUrl('specificationtypes/producttype');
                $resdis1 = $client1->request('GET', $resdis);
                $datatextdis = json_decode($resdis1->getBody()->getContents(), true);
                return view('admin/page.discountadmin', compact('datatextdis','time', 'data', 'result3', 'result2', 'resdis', 'result1', 'res1', 'result', 'data_category', 'data_product_type', 'data_product_type_specificationtypes'));
            }
        }
        return redirect()->guest(route('login-admin', [], false));
    }

    public function getOrderAdmin()
    {
        $client1 = new \GuzzleHttp\Client();
        if (Session::has('key') && Session::get('key')['role']['roleName'] == 'Quản lý gian hàng') {
            $dataProductOrder = array();
            $dataOrder = array();
            $store = Session::get('key')[0]['store']['_id'];
            $resOrderItems = $client1->request('GET', PageController::getUrl('orderItems/getByState/5b9a17f3e747da371818fd9d'));
            $dataOrderItems = json_decode($resOrderItems->getBody()->getContents(), true);

            for ($i = 0; $i < count($dataOrderItems['orderItems']); $i++) {
                if ($store == $dataOrderItems['orderItems'][$i]['product']['store']['_id']) {
                    $dataProductOrder[] = $dataOrderItems['orderItems'][$i];
                }
            }
            $resultProductOrder = compact('dataProductOrder');
            for ($i = 0; $i < count($resultProductOrder['dataProductOrder']); $i++) {
                $resOrder = $client1->request('GET', PageController::getUrl('orders/' . $resultProductOrder['dataProductOrder'][$i]['orderId'] . ''));
                $dataOrder[] = json_decode($resOrder->getBody()->getContents(), true);
                if ($dataOrder[$i]['order']['_id'] == $resultProductOrder['dataProductOrder'][$i]['orderId']) {
                    $dataOrder[$i]['OrderItem'] = $dataProductOrder[$i];
                }
            }

            $resultOrder = compact('dataOrder');
//            dd($resultOrder);
            try {
                $resOrderAll = $client1->request('GET', PageController::getUrl('orders/getByState/5b9a17f3e747da371818fd9d'));
                $dataOrderAll = json_decode($resOrderAll->getBody()->getContents(), true);
                for ($i = 0; $i < $dataOrderAll['count']; $i++) {
                    $resProductOrder = $client1->request('GET', PageController::getUrl('orderItems/order/' . $dataOrderAll['orders'][$i]['_id'] . ''));
                    $dataProductorderAll[] = json_decode($resProductOrder->getBody()->getContents(), true);
                    for ($j = 0; $j < count($dataProductorderAll[$i]['orderItems']); $j++) {
                        if ($dataOrderAll['orders'][$i]['_id'] == $dataProductorderAll[$i]['orderItems'][$j]['orderId']) {
                            $dataOrderAll['orders'][$i]['OrderItem'] = $dataProductorderAll[$i]['orderItems'];
                        }
                    }
                }
                $count = 0;
                $text = array();
                for ($i = 0; $i < count($dataOrderAll['orders']); $i++) {
                    for ($j = 0; $j < count($dataOrderAll['orders'][$i]['OrderItem']); $j++) {
                        if (($count == (count($dataOrderAll['orders'][$i]['OrderItem']) - 1)) && ($dataOrderAll['orders'][$i]['OrderItem'][$j]['orderItemState']['orderStateName'] === "Đã xử lý")) {

                            $text[] = $dataOrderAll['orders'][$i]['OrderItem'];
                            $datajson = array([
                                "propName" => "orderState",
                                "value" => "5bd01017832c13219c366d1b"
                            ]);
                            $jsonData = json_encode($datajson);
                            $json_url = PageController::getUrl('orders/' . $dataOrderAll['orders'][$i]['_id'] . '');
                            $ch = curl_init($json_url);
                            $options = array(
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_HTTPHEADER => array('Content-type: application/json'),
                                CURLOPT_CUSTOMREQUEST => "PATCH",
                                CURLOPT_POSTFIELDS => $jsonData
                            );
                            curl_setopt_array($ch, $options);
                            $result = curl_exec($ch);
                        }
                        if ($dataOrderAll['orders'][$i]['OrderItem'][$j]['orderItemState']['orderStateName'] === "Đã xử lý") {
                            $count++;
                        }
                        if ($j == (count($dataOrderAll['orders'][$i]['OrderItem']) - 1)) {
                            break;
                        }
                    }
                }
                // dd($text);
            } catch (\GuzzleHttp\Exception\RequestException $e) {
                return redirect()->back()->with(['flag' => 'error', 'title' => 'Thất bại!', 'message' => ' ']);
            }
            return view('admin/page.orderadmin', compact('resultOrder', 'dataProductOrder'));
        } else {
            return redirect()->guest(route('login-admin', [], false));
        }
        return redirect()->guest(route('login-admin', [], false));
    }

    public function getOrderWatningAdmin()
    {
        $client1 = new \GuzzleHttp\Client();
        if (Session::has('key') && Session::get('key')['role']['roleName'] == 'Quản lý gian hàng') {
            $dataProductOrder = array();
            $dataOrder = array();
            $datatext = array();
            $store = Session::get('key')[0]['store']['_id'];
            $resOrderItems = $client1->request('GET', PageController::getUrl('orderItems/getByState/5bd01017832c13219c366d1b'));

            // $resOrderItems = $client1->request('GET',PageController::getUrl('orderItems'));
            $dataOrderItems = json_decode($resOrderItems->getBody()->getContents(), true);
            // dd($dataOrderItems);
            for ($i = 0; $i < count($dataOrderItems['orderItems']); $i++) {
                if ($store == $dataOrderItems['orderItems'][$i]['product']['store']['_id']) {
                    $dataProductOrder[] = $dataOrderItems['orderItems'][$i];
                }
            }
            $resultProductOrder = compact('dataProductOrder');
            for ($i = 0; $i < count($resultProductOrder['dataProductOrder']); $i++) {
                $resOrder = $client1->request('GET', PageController::getUrl('orders/' . $resultProductOrder['dataProductOrder'][$i]['orderId'] . ''));
                $dataOrder[] = json_decode($resOrder->getBody()->getContents(), true);
                if ($dataOrder[$i]['order']['_id'] == $resultProductOrder['dataProductOrder'][$i]['orderId']) {
                    $dataOrder[$i]['OrderItem'] = $dataProductOrder[$i];
                }
            }


            $resultOrder = compact('dataOrder');


            try {
                $resOrderAll = $client1->request('GET', PageController::getUrl('orders/getByState/5bd01017832c13219c366d1b'));
                $dataOrderAll = json_decode($resOrderAll->getBody()->getContents(), true);
                for ($i = 0; $i < $dataOrderAll['count']; $i++) {
                    $resProductOrder = $client1->request('GET', PageController::getUrl('orderItems/order/' . $dataOrderAll['orders'][$i]['_id'] . ''));
                    $dataProductorderAll[] = json_decode($resProductOrder->getBody()->getContents(), true);
                    for ($j = 0; $j < count($dataProductorderAll[$i]['orderItems']); $j++) {
                        if ($dataOrderAll['orders'][$i]['_id'] == $dataProductorderAll[$i]['orderItems'][$j]['orderId']) {
                            $dataOrderAll['orders'][$i]['OrderItem'] = $dataProductorderAll[$i]['orderItems'];
                        }
                    }
                }
                $count = 0;
                $text = array();
                for ($i = 0; $i < count($dataOrderAll['orders']); $i++) {
                    for ($j = 0; $j < count($dataOrderAll['orders'][$i]['OrderItem']); $j++) {

                        if (($count == (count($dataOrderAll['orders'][$i]['OrderItem']) - 1)) && ($dataOrderAll['orders'][$i]['OrderItem'][$j]['orderItemState']['orderStateName'] === "Đang giao hàng")) {

                            $text[] = $dataOrderAll['orders'][$i]['OrderItem'];
                            $datajson = array([
                                "propName" => "orderState",
                                "value" => "5b9a18f8ffed2b1e60a5d780"
                            ]);
                            // dd($datajson);
                            $jsonData = json_encode($datajson);
                            $json_url = PageController::getUrl('orders/' . $dataOrderAll['orders'][$i]['_id'] . '');
                            $ch = curl_init($json_url);
                            $options = array(
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_HTTPHEADER => array('Content-type: application/json'),
                                CURLOPT_CUSTOMREQUEST => "PATCH",
                                CURLOPT_POSTFIELDS => $jsonData
                            );
                            curl_setopt_array($ch, $options);
                            $result = curl_exec($ch);
                            $result1 = json_decode($result);
                        }
                        if ($dataOrderAll['orders'][$i]['OrderItem'][$j]['orderItemState']['orderStateName'] === "Đang giao hàng") {
                            $count++;
                        }
                        if ($j == (count($dataOrderAll['orders'][$i]['OrderItem']) - 1)) {
                            break;
                        }
                    }
                }
                // dd($text);
            } catch (\GuzzleHttp\Exception\RequestException $e) {
                return redirect()->back()->with(['flag' => 'error', 'title' => 'Thất bại!', 'message' => ' ']);
            }
            return view('admin/page.orderadminwanting', compact('resultOrder', 'dataProductOrder'));
        }
        return redirect()->guest(route('login-admin', [], false));
    }

    public function getOrderShippingAdmin()
    {
        $client1 = new \GuzzleHttp\Client();
        if (Session::has('key') && Session::get('key')['role']['roleName'] == 'Quản lý gian hàng') {
            $dataProductOrder = array();
            $dataOrder = array();
            $datatext = array();
            $store = Session::get('key')[0]['store']['_id'];
            $resOrderItems = $client1->request('GET', PageController::getUrl('orderItems/getByState/5b9a18f8ffed2b1e60a5d780'));

            // $resOrderItems = $client1->request('GET',PageController::getUrl('orderItems'));
            $dataOrderItems = json_decode($resOrderItems->getBody()->getContents(), true);
            // dd($dataOrderItems);
            for ($i = 0; $i < count($dataOrderItems['orderItems']); $i++) {
                if ($store == $dataOrderItems['orderItems'][$i]['product']['store']['_id']) {
                    $dataProductOrder[] = $dataOrderItems['orderItems'][$i];
                }
            }
            $resultProductOrder = compact('dataProductOrder');
            for ($i = 0; $i < count($resultProductOrder['dataProductOrder']); $i++) {
                $resOrder = $client1->request('GET', PageController::getUrl('orders/' . $resultProductOrder['dataProductOrder'][$i]['orderId'] . ''));
                $dataOrder[] = json_decode($resOrder->getBody()->getContents(), true);
                if ($dataOrder[$i]['order']['_id'] == $resultProductOrder['dataProductOrder'][$i]['orderId']) {
                    $dataOrder[$i]['OrderItem'] = $dataProductOrder[$i];
                }
            }


            $resultOrder = compact('dataOrder');

            try {
                $resOrderAll = $client1->request('GET', PageController::getUrl('orders/getByState/5b9a18f8ffed2b1e60a5d780'));
                $dataOrderAll = json_decode($resOrderAll->getBody()->getContents(), true);
                for ($i = 0; $i < $dataOrderAll['count']; $i++) {
                    $resProductOrder = $client1->request('GET', PageController::getUrl('orderItems/order/' . $dataOrderAll['orders'][$i]['_id'] . ''));
                    $dataProductorderAll[] = json_decode($resProductOrder->getBody()->getContents(), true);
                    for ($j = 0; $j < count($dataProductorderAll[$i]['orderItems']); $j++) {
                        if ($dataOrderAll['orders'][$i]['_id'] == $dataProductorderAll[$i]['orderItems'][$j]['orderId']) {
                            $dataOrderAll['orders'][$i]['OrderItem'] = $dataProductorderAll[$i]['orderItems'];
                        }
                    }
                }
                $count = 0;
                $text = array();
                for ($i = 0; $i < count($dataOrderAll['orders']); $i++) {
                    for ($j = 0; $j < count($dataOrderAll['orders'][$i]['OrderItem']); $j++) {
                        if (($count == (count($dataOrderAll['orders'][$i]['OrderItem']) - 1)) && ($dataOrderAll['orders'][$i]['OrderItem'][$j]['orderItemState']['orderStateName'] === "Đã giao hàng")) {

                            $text[] = $dataOrderAll['orders'][$i]['OrderItem'];

                            $datajson = array([
                                "propName" => "orderState",
                                "value" => "5b9a1a1bffed2b1e60a5d783"
                            ]);
                            // dd($datajson);
                            $jsonData = json_encode($datajson);
                            $json_url = PageController::getUrl('orders/' . $dataOrderAll['orders'][$i]['_id'] . '');
                            $ch = curl_init($json_url);
                            $options = array(
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_HTTPHEADER => array('Content-type: application/json'),
                                CURLOPT_CUSTOMREQUEST => "PATCH",
                                CURLOPT_POSTFIELDS => $jsonData
                            );
                            curl_setopt_array($ch, $options);
                            $result = curl_exec($ch);
                            $result1 = json_decode($result);
                        }
                        if ($dataOrderAll['orders'][$i]['OrderItem'][$j]['orderItemState']['orderStateName'] === "Đã giao hàng") {
                            $count++;
                        }
                        if ($j == (count($dataOrderAll['orders'][$i]['OrderItem']) - 1)) {
                            break;
                        }
                    }
                }
                // dd($text);
            } catch (\GuzzleHttp\Exception\RequestException $e) {
                return redirect()->back()->with(['flag' => 'error', 'title' => 'Thất bại!', 'message' => ' ']);
            }
            return view('admin/page.orderadminshipping', compact('resultOrder', 'dataProductOrder'));
        }
        return redirect()->guest(route('login-admin', [], false));
    }

    public function getOrderDoneAdmin()
    {
        $client1 = new \GuzzleHttp\Client();
        if (Session::has('key') && Session::get('key')['role']['roleName'] == 'Quản lý gian hàng') {
            $dataProductOrder = array();
            $dataOrder = array();
            $datatext = array();
            $store = Session::get('key')[0]['store']['_id'];
            $resOrderItems = $client1->request('GET', PageController::getUrl('orderItems/getByState/5b9a1a1bffed2b1e60a5d783'));

            // $resOrderItems = $client1->request('GET',PageController::getUrl('orderItems'));
            $dataOrderItems = json_decode($resOrderItems->getBody()->getContents(), true);
            // dd($dataOrderItems);
            for ($i = 0; $i < count($dataOrderItems['orderItems']); $i++) {
                if ($store == $dataOrderItems['orderItems'][$i]['product']['store']['_id']) {
                    $dataProductOrder[] = $dataOrderItems['orderItems'][$i];
                }
            }
            $resultProductOrder = compact('dataProductOrder');
            for ($i = 0; $i < count($resultProductOrder['dataProductOrder']); $i++) {
                $resOrder = $client1->request('GET', PageController::getUrl('orders/' . $resultProductOrder['dataProductOrder'][$i]['orderId'] . ''));
                $dataOrder[] = json_decode($resOrder->getBody()->getContents(), true);
                if ($dataOrder[$i]['order']['_id'] == $resultProductOrder['dataProductOrder'][$i]['orderId']) {
                    $dataOrder[$i]['OrderItem'] = $dataProductOrder[$i];
                }
            }


            $resultOrder = compact('dataOrder');
            return view('admin/page.orderadmindone', compact('resultOrder', 'dataProductOrder'));
        }
        return redirect()->guest(route('login-admin', [], false));
    }

    public function getProfileShopAdmin()
    {
        if (Session::has('key') && Session::get('key')['role']['roleName'] == 'Quản lý gian hàng') {
            // dd(Sessio    n::get('key'));
            $store = Session::get('key')[0]['store']['_id'];
            $client = new \GuzzleHttp\Client();
            $res = $client->request('GET', PageController::getUrl('stores/' . $store . ''));
            $data = json_decode($res->getBody()->getContents(), true);

            $resstoreproduct = $client->request('GET', PageController::getUrl('products/store/' . $store . ''));
            $datastoreproduct = json_decode($resstoreproduct->getBody()->getContents(), true);

            $resreviewshop = $client->request('GET', PageController::getUrl('reviewStores/store/' . Session::get('key')[0]['store']['_id'] . ''));
            $datareviewshop = json_decode($resreviewshop->getBody()->getContents(), true);
            $countstar_3 = 0;
            $countstar_2 = 0;
            $countstar_1 = 0;
            $countstar = array();
            for ($i = 0; $i < $datareviewshop['count']; $i++) {
                $dtstart = new DateTime($datareviewshop['reviewStores'][$i]['dateReview']);
                $dtstart->setTimezone(new DateTimeZone('UTC'));
                $timereviewshop[] = $dtstart->format('d/m/Y');
                $countstar[] = $datareviewshop['reviewStores'][$i]['ratingLevel']['ratingLevel'];
                switch ($countstar[$i]) {
                    case "3":
                        $countstar_3++;
                        break;
                    case "2":
                        $countstar_2++;
                        break;
                    case "1":
                        $countstar_1++;
                        break;
                }
            }
            if ($datareviewshop['count'] == 0) {
                $countrating = 0;
            } else {
                $countrating = number_format((($countstar_2 + $countstar_1) / ($countstar_2 + $countstar_1 + $countstar_3)) * 100, 1, '.', '');
            }
//            dd($data);
            return view('admin/page.profileshopadmin', compact('datareviewshop', 'countrating', 'timereviewshop', 'data', 'datastoreproduct'));
        }
        return redirect()->guest(route('login-admin'));
    }

    //Admin hệ thống
    public function getAdmin()
    {
        if (Session::has('key') && Session::get('key')['role']['roleName'] == 'Quản trị viên') {
            $client = new \GuzzleHttp\Client();
            $res = $client->request('GET', PageController::getUrl('registeredSales'));
            $data = json_decode($res->getBody()->getContents(), true);
            return view('admin/page.admin', compact('data'));
        }
        return redirect()->guest(route('login-admin', [], false));
    }

    public function getCategoryAdminShop()
    {
        if (Session::has('key') && Session::get('key')['role']['roleName'] == 'Quản trị viên') {
            $client = new \GuzzleHttp\Client();
            $res = $client->request('GET', PageController::getUrl('stores'));
            $data = json_decode($res->getBody()->getContents(), true);

            // dd($data);
            return view('admin/page.categoryadminshop', compact('data'));
        }
        return redirect()->guest(route('login-admin', [], false));

    }

    public function getDetailAdminShop()
    {
        if (Session::has('key') && Session::get('key')['role']['roleName'] == 'Quản trị viên') {
            return view('admin/page.detailadminshop');
        }
        return redirect()->guest(route('login-admin', [], false));

    }

    public function getAddCategoryAdmin()
    {
        if (Session::has('key') && Session::get('key')['role']['roleName'] == 'Quản trị viên') {
            //get json danh muc all
            $client = new \GuzzleHttp\Client();
            $res = $client->request('GET', PageController::getUrl('categories'));
            $data = json_decode($res->getBody()->getContents(), true);
            //end get json
            return view('admin/page.addcategoryadmin', compact('data'));
        }
        return redirect()->guest(route('login-admin', [], false));

    }

    public function getAddProductTypeAdmin(Request $req)
    {
        if (Session::has('key') && Session::get('key')['role']['roleName'] == 'Quản trị viên') {
            //get json danh muc all
            $client1 = new \GuzzleHttp\Client();
            $res = $client1->request('GET', PageController::getUrl('categories/' . $req->id . ''));
            $data = json_decode($res->getBody()->getContents(), true);
            //end get json

            $res = $client1->request('GET', PageController::getUrl('producttypes/category/' . $req->id . ''));
            $data1 = json_decode($res->getBody()->getContents(), true);
            // dd($data1);
            return view('admin/page.addproducttypeadmin', compact('data', 'data1'));
        }
        return redirect()->guest(route('login-admin', [], false));

    }

    public function getAddSpecificationAdmin(Request $req)
    {
        if (Session::has('key') && Session::get('key')['role']['roleName'] == 'Quản trị viên') {
            $client1 = new \GuzzleHttp\Client();
            try {
                $res = $client1->request('GET', PageController::getUrl('producttypes/' . $req->id . ''));
                $data1 = json_decode($res->getBody()->getContents(), true);
                // dd($data1);
                $res = $client1->request('GET', PageController::getUrl('specificationtypes/producttype/' . $req->id . ''));
                $status = $res->getStatusCode();

                $data = json_decode($res->getBody()->getContents(), true);
                //  dd($data);
                return view('admin/page.addspecificationadmin', compact('data', 'data1', 'status'));

            } catch (RequestException $e) {
                if ($e->getResponse()->getStatusCode() == '404') {
                    $status = $e->getResponse()->getStatusCode();
                    return view('admin/page.addspecificationadmin', compact('data', 'data1', 'status'));
                }
            }
        }
        return redirect()->guest(route('login-admin', [], false));


    }

    public function getAllOrderAdmin()
    {
        if (Session::has('key') && Session::get('key')['role']['roleName'] == 'Quản trị viên') {
            $client = new \GuzzleHttp\Client();
            $res = $client->request('GET', PageController::getUrl('orders'));
            $data = json_decode($res->getBody()->getContents(), true);

            for ($i = 0; $i < $data['count']; $i++) {
                $resProductOrder = $client->request('GET', PageController::getUrl('orderItems/order/' . $data['orders'][$i]['_id'] . ''));
                $dataProductorderAll[] = json_decode($resProductOrder->getBody()->getContents(), true);
                for ($j = 0; $j < count($dataProductorderAll[$i]['orderItems']); $j++) {
                    if ($data['orders'][$i]['_id'] == $dataProductorderAll[$i]['orderItems'][$j]['orderId']) {
                        $data['orders'][$i]['OrderItem'] = $dataProductorderAll[$i]['orderItems'];
                    }
                }
            }
//            dd($data);
            return view('admin/page.allorderadmin',compact('data'));
        }
        return redirect()->guest(route('login-admin', [], false));


    }


}

?>
