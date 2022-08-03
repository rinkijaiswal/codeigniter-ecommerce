<?php

namespace App\Models;

class CartModel extends \CodeIgniter\Model{
    protected $table = "cart";
    protected $allowedFields = ['product_id','product_name','price','user_email','quantity','total'];
    
    public function create($data){
        return $this->save($data);
    }
    
    public function getCartByUserEmail($email){
        return $this->where('user_email',$email)->findAll();
    }
    
    public function updateCart($id,$data){
        return $this->update($id, $data);
    }
    
    public function deleteCart($id){
        return $this->delete($id);
    }
    
    public function getCartByProductId($id){
        return $this->where('product_id',$id)->first();
    }
    
    public function getCount($email){
        $data['users'] = $this->where('user_email',$email)->findAll();
        return count($data['users']);
    }
}
