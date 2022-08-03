<?php

namespace App\Controllers;
use App\Models\BookModel;

class Book extends \CodeIgniter\Controller{
    public $session;
    public function __construct() {
        helper('form');
        $this->session = \Config\Services::session();
    }
    
    public function view(){
        if($this->session->get('adminLogin') == true){
            $model = new BookModel();
            $data = [
                'books' => $model->getAllBooks(),
                'pager' => $model->pager,
            ];
            return view('book/view',$data);
        }else{
            return redirect()->to('/admin/login');
        }
    }
    
    public function create(){
        if($this->session->get('adminLogin') == true){
        
            $data = [];
            if($this->request->getMethod() == 'post')
            {
                $rules = ([
                    'title' => 'required|min_length[3]',
                    'description' => 'required|min_length[3]|max_length[500]',
                    'mrp' => 'required|numeric',
                    'selling_price' => 'required|numeric',
                    'image' => 'uploaded[image]|is_image[image]|max_size[image,5024]|ext_in[image,png,jpg,gif]',
                    'author' => 'required',
                    'availability' => 'required',
                    'language' => 'required',
                    'category' => 'required',
                    'pages' => 'required|integer',
                    'isbn_no' => 'required|numeric|min_length[8]|max_length[13]'
                ]);
                if($this->validate($rules)){
                    $file = $this->request->getFile('image');
                    if($file->isValid() && !$file->hasMoved()){
                        $newName = $file->getRandomName();
                        if($file->move(FCPATH.'/uploads/',$newName)){
                            $data = ([
                                'title' => $this->request->getPost('title'),
                                'description' => $this->request->getPost('description'),
                                'mrp' => $this->request->getPost('mrp'),
                                'selling_price' => $this->request->getPost('selling_price'),
                                'image' => $newName,
                                'author' => $this->request->getPost('author'),
                                'availability' => $this->request->getPost('availability'),
                                'language' => $this->request->getPost('language'),
                                'category' => $this->request->getPost('category'),
                                'pages' => $this->request->getPost('pages'),
                                'isbn_no' => $this->request->getPost('isbn_no')
                            ]);
                            $model = new BookModel();
                            $model->create($data);
                            $this->session->setTempdata('success','Book created successfully.',3);
                            return redirect()->to(base_url('/book/create'));
                        }else{
                            echo $file->getErrorString()."".$file->getError();
                        }
                    }
                }else{
                    $data['validation'] = $this->validator;
                }
            }
            return view('book/create',$data);
        }
       else{
            return redirect()->to('/admin/login');
        }
    }
    
    public function edit($id){
        $model = new BookModel();
        $data['book'] = $model->getBookById($id);
        if($this->request->getMethod() == 'post'){
            $rules = ([
                    'title' => 'required|min_length[3]',
                    'description' => 'required|min_length[3]|max_length[500]',
                    'mrp' => 'required|numeric',
                    'selling_price' => 'required|numeric',
                    'author' => 'required',
                    'availability' => 'required',
                    'language' => 'required',
                    'category' => 'required',
                    'pages' => 'required|integer',
                    'isbn_no' => 'required|numeric|min_length[8]|max_length[13]'
                ]);
                if($this->validate($rules)){
                    $file = $this->request->getFile('image');
                    
                    if($file == ''){
                        $newName = $data['book']['image'];
                    }else{
                        $newName = $file->getRandomName();
                        $file->move(FCPATH.'/uploads/',$newName);
                    }
                    $data = ([
                        'title' => $this->request->getPost('title'),
                        'description' => $this->request->getPost('description'),
                        'mrp' => $this->request->getPost('mrp'),
                        'selling_price' => $this->request->getPost('selling_price'),
                        'image' => $newName,
                        'author' => $this->request->getPost('author'),
                        'availability' => $this->request->getPost('availability'),
                        'language' => $this->request->getPost('language'),
                        'category' => $this->request->getPost('category'),
                        'pages' => $this->request->getPost('pages'),
                        'isbn_no' => $this->request->getPost('isbn_no')
                    ]);
                    $model = new BookModel();
                    $model->updateBook($id,$data);
                    $this->session->setTempdata('success','Book updated successfully.',3);
                    return redirect()->to(base_url('/book/edit/'.$id));
                    
                        
                }else{
                    $data['validation'] = $this->validator;
                }
        }

        if($this->session->get('adminLogin') == true){
            
            return view('book/edit',$data);
        }else{
            return redirect()->to('/admin/login');
        }
    }
    
    public function delete($id){
        $model = new BookModel();
        $model->deleteBook($id);
        $this->session->setTempdata('delete','Book deleted successfully.',3);
        return redirect()->to(base_url('/book/view'));
    }
    
    public function single($id){
        $model = new BookModel();
        $data['book'] = $model->getBookById($id);
        return view('book/single',$data);
    }
    
    public function search(){
        $data = [];
        if($this->request->getMethod() == 'post'){
            $search = $this->request->getPost('search');
            $model = new BookModel();
            $data['books'] = $model->getSearchResult($search);
            $data['query'] = $search;
        }
        return view('book/search',$data);
    }
    
    public function category($name){
        $model = new BookModel();
        $data = [
                'books' => $model->getCategory($name),
                'pager' => $model->pager,
            ];
        $data['query'] = $name;
        return view('book/category',$data);
    }
    
}
