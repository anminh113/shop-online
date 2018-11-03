<?php

namespace App\Providers;
use Session;
use App\Cart;
use View, Input, Redirect;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Promise;
use GuzzleHttp\Pool;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Exception\RequestException;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */

    public static function getUrl($text){
//         $urlAPI = "http://172.16.198.84:3000/".$text;
        $urlAPI = "http://localhost:3000/".$text;
        return $urlAPI;
    }
    public function boot()
    {
        //
        view()->composer('user/header', function($view){
            if(Session('cart')){
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
                $view->with(['cart'=>Session::get('cart'), 'product_cart'=>$cart->items, 'totalPrice'=>$cart->totalPrice, 'totalQty'=>$cart->totalQty]);
            }
        });

        view()->composer('admin/header', function($view){
            if (Session::has('key')){
                try {
                    $client = new \GuzzleHttp\Client();
                    $res = $client->request('GET',AppServiceProvider::getUrl('stores/account/'.Session::get('key')['_id'].''));
                    $data = json_decode($res->getBody()->getContents(), true);
                   
                    // dd($data);
                    session()->push('key',$data);
                    $view->with(['name'=>$data['store']['storeName']]);
                }catch (\GuzzleHttp\Exception\ClientException $e) {
                    // $view->with(['product_cart'=>$cart->items]);
                    // return $e->getResponse()->getStatusCode();
                    $view->with(['name'=>'Quản trị hệ thống']);
                }
            }
        });

        view()->composer('user/header', function($view){
           
            try {
                $data1 = array();
                $client = new \GuzzleHttp\Client();
                $res = $client->request('GET',AppServiceProvider::getUrl('categories') );
                $data = json_decode($res->getBody()->getContents(), true);
                
                for($i=0; $i<count($data['categories']); $i++){
                    $res1 = $client->request('GET',AppServiceProvider::getUrl('producttypes/category/'.$data['categories'][$i]['_id'].'') );
                    $data1[] = json_decode($res1->getBody()->getContents(), true);
                }
                $result1 = compact('data1');
                $datawl['count'] = 0;
                try {
                    $reswl = $client->request('GET',AppServiceProvider::getUrl('wishList/customer/'.Session::get('keyuser')['info'][0]['customer']['_id'].''));
                    $datawl = json_decode($reswl->getBody()->getContents(), true);
                    $view->with(['datacategory'=>$result1, 'data'=>$data['categories'], 'datawl'=>$datawl['count']]);
                    } catch (\GuzzleHttp\Exception\RequestException $e) {
                        $view->with(['datacategory'=>$result1, 'data'=>$data['categories'], 'datawl'=>0]);
                    }
               
                // dd($result1);
            }catch (\GuzzleHttp\Exception\ClientException $e) {
                // $view->with(['product_cart'=>$cart->items]);
                return $e->getResponse()->getStatusCode();
            }
            $view->with(['datacategory'=>$result1, 'data'=>$data['categories'], 'datawl'=>$datawl['count']]);
            
        });

        view()->composer('user/RecentlyViewed', function($view){
        
            try {
                $client = new \GuzzleHttp\Client();
                $res = $client->request('GET',AppServiceProvider::getUrl('products'));
                $data1 = json_decode($res->getBody()->getContents(), true);
                for ($i=0;  $i < count($data1['products']); $i++){
                    $res2 = $client->request('GET',AppServiceProvider::getUrl('productimages/product/'.$data1['products'][$i]['_id'].''));
                    $datatext[] = json_decode($res2->getBody()->getContents(), true);
                    if($datatext[$i]['productId'] == $data1['products'][$i]['_id']){
                        $data1['products'][$i]['image']= $datatext[$i]['imageList'][0]['imageURL'];
                    }
                }
                $view->with(['data1'=>$data1]);
            }catch (\GuzzleHttp\Exception\ClientException $e) {
                // return $e->getResponse()->getStatusCode();
                $view->with(['data'=>'data1']);
            }
           
        });


       
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
