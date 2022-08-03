<?php

namespace App\Models;

class CategoryModel extends \CodeIgniter\Model{
    protected $table="category";
    protected $allowedFields = ['name'];
    
    public function create($data){
        return $this->save($data);
    }
    
    public function getAllCategory(){
        return $this->paginate(4);
    }
    
    public function getAll(){
        return $this->findAll();
    }
    
    public function getCount(){
        return $this->countAllResults();
    }
    
    public function updateCategory($id,$data){
        return $this->update($id, $data);
    }
    
    public function getSingleCategory($id){
        return $this->where('id',$id)->first();
    }
    
    public function deleteCategory($id){
        return $this->delete($id);
    }
    
}
