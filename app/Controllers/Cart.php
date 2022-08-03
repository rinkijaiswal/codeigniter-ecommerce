<?php

namespace App\Controllers;
use App\Models\CartModel;

class Cart extends \CodeIgniter\Controller{
    public $session;
    public function __construct() {
        helper('form');
        $this->session = \Config\Services::session();
    }
    
    public function index(){
        $email = $this->session->get('user_email');
        $model = new CartModel();
        $data['products'] = $model->getCartByUserEmail($email);
        return view('cart/index',$data);
    }
    
    public function add(){
        if($this->request->getMethod() == 'post'){
            $model = new CartModel();
            $product_id = $this->request->getPost('product_id');
            $data['product'] = $model->getCartByProductId($product_id);
            if($data['product'] != ''){
                $this->session->setTempdata('cart','product already added',3);
                return redirect()->to(base_url('/book/single/'.$product_id));
            }else{
                $user_email = $this->session->get('user_email');
                $quantity = 1;
                $price = $this->request->getPost('price');
                $data = ([
                    'product_id' => $this->request->getPost('product_id'),
                    'product_name' => $this->request->getPost('product_name'),
                    'price' => $price,
                    'user_email' => $user_email,
                    'quantity' => $quantity,
                    'total' => $price * $quantity
                ]);

                $model->create($data);
                return redirect()->to(base_url('/cart'));
            }
        }
    }
    
    public function update($id){
        if($this->request->getMethod() == 'post'){
            $user_email = $this->session->get('user_email');
            $price = $this->request->getPost('price');
            $quantity = $this->request->getPost('quantity');
            
            $data = ([
                'product_id' => $this->request->getPost('product_id'),
                'product_name' => $this->request->getPost('product_name'),
                'price' => $price,
                'user_email' => $user_email,
                'quantity' => $quantity,
                'total' =>  $price * $quantity
            ]);
            $model = new CartModel();
            $model->updateCart($id,$data);
            return redirect()->to(base_url('/cart'));
        }
    }
    
    public function delete($id){
        $model = new CartModel();
        $model->deleteCart($id);
        return redirect()->to(base_url('/cart'));
    }
    
}
