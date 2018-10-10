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
  use Illuminate\Support\Facades\Validator;
  use Hash;
  use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function showProfileAdmin(Request $req)
    {

        $client = new \GuzzleHttp\Client();
        try {
            $res = $client->request('GET', PageController::getUrl('accounts/'.$req->email.''));
            $data = json_decode($res->getBody()->getContents(), true);
            
            $email = $req['email'];
            $password = $req['password'];
            if($password === $data['account']['password']){
                if($data['account']['role']['roleName'] == 'Quản lý gian hàng')
                {
                $req->session()->put('key',$data['account'] );

                return redirect()->route('trang-chu-admin')->with(['flag'=>'info','title'=>'Welcome' ,'message'=>'back!','role'=>'Quản lý gian hàng']);
                }
                else if($data['account']['role']['roleName'] == 'Quản trị viên')
                {
                $req->session()->put('key',$data['account'] );

                return redirect()->route('trang-chu-admin-he-thong')->with(['flag'=>'info','title'=>'Welcome' ,'message'=>'back!','role'=>'Quản trị viên']);
                }
            }else{
                return redirect()->back()->with(['flag'=>'error','title'=>'Thất bại!','message'=>'Đăng nhập không thành công']);
            }
        }catch (\GuzzleHttp\Exception\ClientException $e) {
            // return $e->getResponse()->getStatusCode();
            return redirect()->route('login-admin')->with(['flag'=>'error','title'=>'Thất bại!','message'=>'Đăng nhập không thành công']);
        }
        
        //
    }

}
?>