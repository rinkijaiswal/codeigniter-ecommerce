<?php

namespace App\Controllers;
use App\Models\OrderModel;
use App\Models\CartModel;
use App\Models\UserModel;
use Razorpay\Api\Api;

class OrderController extends \CodeIgniter\Controller{
    public $model;
    public $session;
    public $api;
    public $order_id;
    public function __construct() {
        helper('form');
        $this->model = new OrderModel();
        $this->session = \Config\Services::session();
        $this->api = new Api('rzp_test_o1u0tTxeizLfpj', 'QwEEeFGTBTPEkjnq8v58fC8N');
    }
    
    public function index(){
        $user = [];
        $total = "";
        if($this->request->getMethod() == 'post'){
            $products = $this->request->getVar('products');
            $total = $this->request->getVar('total');
            $email = $this->session->get('user_email');
            $model = new UserModel();
            $user = $model->getUserByEmail($email);
            $id = 0;
            foreach($products as $p){
                $id++;
//                $order = explode(',',$p);
                $prod = $this->model->checkIfOrderExists($p,'false');
                if($prod){
                    foreach($prod as $order_product){
                        $order_id = $order_product['id'];
                        $this->model->deleteOrderAlreadyAdded($order_id);
                    }
                }else{
                    $this->model->save([
                    'name' =>$user['name'],
                    'email' => $user['email'],
                    'address' => $user['house_no'].' '.$user['locality'].' '.$user['city'].','.$user['state'].','.$user['country'].','.$user['pincode'],
                    'payment_id'=> '54135',
                    'product_detail' => $p,
                    'order_number' => $id,
                    'status' => 'false',
                    'phone' => $user['phone']
                    ]);
                $data = [];
                $data = $this->api->order->create(array(
                    'receipt' => '123', 
                    'amount' => 100, 
                    'currency' => 'INR', 
                    'notes'=> array('key1'=> 'value3','key2'=> 'value2')));
                $array = (array) $data;
                foreach($array as $ar){
                     $this->order_id = $ar['id'];
                }
                return redirect()->to(base_url('/order/checkout'));
            }
           }
        }
        
        $email = $this->session->get('user_email');
        $model = new CartModel();
        $model2 = new UserModel();
        $data['user'] = $model2->getUserByEmail($email);
        $data['cart_count'] = $model->getCount($email);
        $data['id'] = $this->order_id;
        $data['products'] = $model->getCartByUserEmail($email);
        $data['total'] = $total;
        return view('cart/checkout',$data);
    }
}
