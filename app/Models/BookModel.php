<?php

namespace App\Models;

class BookModel extends \CodeIgniter\Model{
    protected $table = "product";
    protected $allowedFields = ['title','description','mrp','selling_price','image',
        'author','availability','language','category','pages','isbn_no'];
    
    public function create($data){
        return $this->save($data);
    }
    
    public function getAllBooks(){
        return $this->paginate(6);
    }
    
    public function getBookById($id){
        return $this->where('id',$id)->first();
    }
    
    public function updateBook($id,$data){
        return $this->update($id, $data);
    }
    
    public function deleteBook($id){
        return $this->delete($id);
    }
    
    public function getCount(){
        return $this->countAllResults();
    }
    
    public function getSearchResult($query){
        return $this->like('title',$query)->findAll();
    }
    
    public function getCategory($name){
        return $this->where('category',$name)->paginate(3);
    }
}
