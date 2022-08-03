<?php

namespace App\Controllers;
use App\Models\AdminModel;
use App\Models\BookModel;
use App\Models\UserModel;
use App\Models\CategoryModel;
use App\Models\OrderModel;
use App\Models\contact;

class Admin extends \CodeIgniter\Controller{
    
    public $session;
    
    public function __construct() {
        helper('form');
        
        $this->session = \Config\Services::session();
    }
    
    public function index(){
        if($this->session->get('adminLogin') == true){
            return view('admin/index');
        }else{
            return redirect()->to('/admin/login');
        }
    }
    
    public function login(){
        $data = [];
        if($this->request->getMethod() == 'post'){
            $rules = ([
               'email'=> 'required|valid_email',
                'password' => 'required|min_length[3]'
            ]);
            if($this->validate($rules))
            {
                $email = $this->request->getPost('email');
                $password = $this->request->getPost('password');
                $model = new AdminModel();
                $data['user'] = $model->login($email, $password);
                if($data['user']){
                    $this->session->setTempdata('success','Account login successfully.',1);
                    $this->session->set('adminLogin',true);
                    return redirect()->to(base_url('/admin/dashboard'));
                }else{
                    $this->session->setTempdata('error','No User Found! Invalid Credentials',1);
                }
            }else{
                $data['validation'] = $this->validator;
            }
        }
        return view('admin/login',$data);
    }
    
    public function logout(){
        $this->session->remove('adminLogin');
        return redirect()->to('/admin/login');
    }
    
    public function dashboard(){
        if($this->session->get('adminLogin') == true){
            $model = new BookModel();
            $model2 = new UserModel();
            $model3 = new CategoryModel();
            $model4 = new OrderModel();
            $data['user'] = $model2->getCount();
            $data['book'] = $model->getCount();
            $data['category'] = $model3->getCount();
            $data['order'] = $model4->getCountOfOrders();
            return view('admin/dashboard',$data);
        }else{
            return redirect()->to('/admin/login');
        }
    }
    
    public function orders(){
        $model = new OrderModel();
        $data = [
                'orders' => $model->getAllOrders(),
                'pager' => $model->pager,
            ];
        return view('admin/orders',$data);
    }
    
    public function contact(){
        $model = new contact();
        $data['contacts'] = $model->getAllContact();
        return view('/admin/contact', $data);
    }
    
    
}
