<?php

namespace App\Models;

class contact extends \CodeIgniter\Model{
    protected $table = 'contact';
    protected $allowedFields = ['name','email','phone','query'];
    
     public function saveData($data) {
        return $this->save($data);
    }
    
    public function getAllContact(){
        return $this->findAll();
    }
    
}
