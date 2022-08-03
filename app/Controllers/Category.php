<?php

namespace App\Controllers;
use App\Models\CategoryModel;

class Category extends \CodeIgniter\Controller{
    public $session;
    
    public function __construct(){
        helper('form');
        $this->session = \Config\Services::session();
    }
    
    public function create(){
        $data = [];
        if($this->request->getMethod() == 'post'){
            $rules = ([
                'name' => 'required'
            ]);
            if($this->validate($rules)){
                $data=([
                    'name'=> $this->request->getPost('name')
                ]);
                $model = new CategoryModel();
                $model->create($data);
                $this->session->setTempdata('success','Category created successfully.',3);
                return redirect()->to('category/create');
            }else{
                $data['validation'] = $this->validator;
            }
        }
        if($this->session->get('adminLogin') == true){
            return view('category/create',$data);
        }else{
            return redirect()->to('/admin/login');
        }
    }
    
    public function view(){
        if($this->session->get('adminLogin') == true){
            $model = new CategoryModel();
            $data = [
                'categories' => $model->getAllCategory(),
                'pager' => $model->pager,
            ];
            return view('category/view',$data);
        }else{
            return redirect()->to('/admin/login');
        }
    }
    
    public function edit($id){    
        $data = [];
        $model = new CategoryModel();
        $data['category'] = $model->getSingleCategory($id);
        if($this->request->getMethod() == 'post'){
            $rules = ([
               'name' => 'required' 
            ]);
            if($this->validate($rules)){
                $data = ([
                   'name' => $this->request->getPost('name') 
                ]);
                $model->updateCategory($id,$data);
                $this->session->setTempdata('success','Category updated successfully.',3);
                return redirect()->to('category/edit/'.$id);
            }else{
                $data['validation'] = $this->validator;
            }
        }
        
        if($this->session->get('adminLogin') == true){
            return view('category/edit',$data);
        }else{
            return redirect()->to('/admin/login');
        }
    }
    
    public function delete($id){
        $model = new CategoryModel();
        $model->deleteCategory($id);
        $this->session->setTempdata('delete','Category deleted successfully.',3);
        return redirect()->to('category/view');
    }
}
