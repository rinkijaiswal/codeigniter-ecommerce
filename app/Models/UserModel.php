<?php

namespace App\Models;

class UserModel extends \CodeIgniter\Model{
    protected $table = "user";
    protected $allowedFields = ['name','email','password','phone','country','state','city','house_no','pincode','locality'];
    
    public function signup($data){
        return $this->save($data);
    }
    
    public function login($email,$password){
        $array = array('email'=>$email,'password'=>$password);
        return $this->where($array)->first();
    }
    
    public function getUserById($id){
        return $this->where('id',$id)->first();
    }
    
    public function getAllUsers(){
        return $this->paginate(4);
    }
    
    public function getCount(){
        return $this->countAllResults();
    }
    
    public function updateUser($id,$data){
        return $this->update($id, $data);
    }
    
    public function getUserByEmail($email){
        return $this->where('email',$email)->first();
    }
}
