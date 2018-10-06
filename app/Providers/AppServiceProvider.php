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
        // $urlAPI = "http://172.16.198.84:3000/".$text;
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
                    $res = $client->request('GET',AppServiceProvider::getUrl('customers/account/'.Session::get('key')['accountId'].''));
                    $data = json_decode($res->getBody()->getContents(), true);
                    // dd($data);
                    $view->with(['name'=>$data['customer']['name']]);
                }catch (\GuzzleHttp\Exception\ClientException $e) {
                    // $view->with(['product_cart'=>$cart->items]);
                    // return $e->getResponse()->getStatusCode();
                    $view->with(['name'=>$e->getResponse()->getStatusCode()]);
                }

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
