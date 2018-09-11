<?php
    namespace App\Http\Controllers;

    use Illuminate\Http\Request;

    class PageController extends Controller{
        
        //User
        public function getIndex(){
            return view('user/page.trangchu');
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

        //Admin
        public function getIndexAdmin(){
            return view('admin/page.trangchu');
        }

        public function getProductAdmin(){
            return view('admin/page.product');
        }

        public function getCategoryAdmin(){
            return view('admin/page.categoryadmin');
        }

        public function getProductDetailAdmin(){
            return view('admin/page.productdetail');
        }

        public function getEditProductDetailAdmin(){
            return view('admin/page.editproductdetail');
        }

        public function getAddProductDetailAdmin(){
            return view('admin/page.addproductdetail');
        }

    }

?>