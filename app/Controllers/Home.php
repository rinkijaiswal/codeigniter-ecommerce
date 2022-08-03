<?php

namespace App\Controllers;
use App\Models\CategoryModel;
use App\Models\BookModel;
use Razorpay\Api\Api;
use App\Models\OrderModel;
use App\Models\CartModel;
use App\Models\contact;

class Home extends BaseController
{
 
    public $session;
    public $api;
    public function __construct() {
        $this->session = \Config\Services::session();
        $this->api = new Api('rzp_test_G3WgRXRFU9TCPY', '2HsUNJgjrDYE3SqLD7Em9gtO');
    }
    
    public function index()
    {
        if($this->session->get('isLoggedIn') == true ){
            $model = new CategoryModel();
            $model2 = new BookModel();
            $data = [
                'books' => $model2->getAllBooks(),
                'pager' => $model2->pager,
            ];
            $data['category'] =  $model->getAll();
            return view('main',$data);
        }else{
            return redirect()->to('/user/login');
        }
    }
    
    public function success($id){
        $users = [];
        $carts = [];
        $model = new OrderModel();
        $email = $this->session->get('user_email');
        $users = $model->getOrderWithEmail($email);
        $order_id = array();
        $data = [
          'status'=> 'true',
          'payment_id' => $id
        ];
        foreach($users as $u){
            $order_id[] = $u['id']; 
        }
        $model->whereIn('id', $order_id)->set($data)->update();
        $email = $this->session->get('user_email');
        $model4 = new CartModel();
        $carts = $model4->getCartByUserEmail($email);
        foreach($carts as $cart){
           $model4->deleteCart($cart['id']);
        }
        $this->session->setTempdata('success','Order is placed.Thank you for shopping with us.',3);
        return redirect()->to(base_url('/'));
    }
    
    public function failure($description,$reason,$payment_id){
        echo $description - $reason - $payment_id;
    }
    
    public function about(){
        return view('about');
    }
    
    public function contact(){
        $data = [];
        if($this->request->getMethod() == 'post'){
            $data = [
                'name' => $this->request->getVar('name'),
                'email' => $this->request->getVar('email'),
                'phone' => $this->request->getVar('phone'),
                'query' => $this->request->getVar('query')
            ];
            $model = new contact();
            $model->saveData($data);
            $this->session->setTempdata('success','Thank you for your query.',3);
            return redirect()->to('/contact');
        }
        return view('contact',$data);
    }
    
}
