<?php


namespace App\Models;

class OrderModel extends \CodeIgniter\Model{
    protected $table = 'checkout_order';
    protected $allowedFields = ['name','email','address','payment_id','product_detail','order_number','status','phone'];
    
    public function getOrderWithEmail($email){
        $array = array('email' => $email,'status'=> 'false');
        return $this->where($array)->findAll();
    }
    
    public function getUserByEmailAndStatus($email){
        $array = array('email' => $email,'status'=> 'true');
        return $this->where($array)->findAll();
    }
    
    public function getOrder($email){
        return $this->where('email',$email)->paginate(4);
    }
    
    public function checkIfOrderExists($product){
        $p = explode(',',$product);
        $array = array('product_detail' => $p[0],'status'=> 'false');
        return $this->like($array)->findAll();
    }
    
    public function deleteOrderAlreadyAdded($id){
        return $this->delete($id);
    }
    
    public function getCountOfOrders(){
        return $this->countAllResults();
    }
    
    public function getAllOrders(){
        return $this->paginate();
    }
    
}
