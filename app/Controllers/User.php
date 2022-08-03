<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\OrderModel;

class User extends \CodeIgniter\Controller{
    
    public $session;
    public $auth;
    
    public function __construct() {
        helper('form');
        $this->session = \Config\Services::session();
    }
    
    public function index(){
        if($this->session->get('isLoggedIn') == true){
            $id = $this->session->get('user_id');
            $email = $this->session->get('user_email');
            $model = new UserModel();
            $model2 = new OrderModel();
            $data['orders'] = $model2->getUserByEmailAndStatus($email);
            $data['user'] = $model->getUserById($id);
            return view('user/index',$data);
        }else{
            return redirect()->to('/user/login');
        }
    }
    
    public function signup(){
        $data = [];
        if($this->request->getMethod() == 'post'){
            $rules = ([
                'name' => 'required|min_length[3]',
                'email' => 'required|valid_email|is_unique[user.email]',
                'password' => 'required|min_length[3]',
                'cpassword' => 'required|min_length[3]',
                'phone' => 'required|numeric|exact_length[10]',
                 'house_no' => 'required',
                 'country' => 'required',
                 'state' => 'required',
                 'city' => 'required',
                 'pincode' => 'required|numeric',
                'locality' => 'required'
             ]);
            if($this->validate($rules)){
                if($this->request->getPost('password') == $this->request->getPost('cpassword')){
                     $data = ([
                         'name' => $this->request->getPost('name'),
                         'email' => $this->request->getPost('email'),
                         'password' => $this->request->getPost('password'),
                         'phone' => $this->request->getPost('phone'),
                         'house_no' => $this->request->getPost('house_no'),
                         'country' => $this->request->getPost('country'),
                         'state' => $this->request->getPost('state'),
                         'city' => $this->request->getPost('city'),
                         'pincode' => $this->request->getPost('pincode'),
                         'locality' => $this->request->getPost('locality')
                    ]);
                     $model = new UserModel();
                     $model->signup($data);
                     $this->session->setTempdata('success','Account created successfully.',3);
                     return redirect()->to(base_url('/user/signup'));
                }else{
                    $data['error_password'] = "password do not match";
                }
               
                
            }else{
                $data['validation'] = $this->validator;
            }
        }
        if($this->session->get('isLoggedIn') == true){
            return redirect()->to(base_url('/'));
        }
        return view('user/signup',$data);
    }

    public function login(){
        $data = [];
        if($this->request->getMethod() == 'post')
        {
            $rules=([
                'email' => 'required|valid_email',
                'password' =>'required|min_length[3]'
            ]);
            if($this->validate($rules)){
                $email = $this->request->getPost('email');
                $password = $this->request->getPost('password');
                $model = new UserModel();
                $data['user'] = $model->login($email, $password);
                if($data['user'] == ''){
                    $this->session->setTempdata('error','No User Found! Invalid Credentials',1);
                }else{
                    $id = $data['user']['id'];
                    if($data['user']){
                        $this->session->setTempdata('success','Account login successfully.',1);
                        $this->session->set('isLoggedIn',true);
                        $this->session->set('user_id',$id);
                        $this->session->set('user_email',$email);
                        return redirect()->to(base_url('/'));
                    }else{
                        $this->session->setTempdata('error','No User Found! Invalid Credentials',1);
                    }
                }
                
//                return redirect()->to(base_url('/'));
            }else{
                $data['validation'] = $this->validator;
            }
        }
        if($this->session->get('isLoggedIn') == true){
            return redirect()->to(base_url('/'));
        }
        return view('user/login',$data);
    }
    
    public function logout(){
        $this->session->remove('isLoggedIn');
        $this->session->remove('user_id');
        return redirect()->to(base_url('/user/login'));
    }
    
    public function all(){
        if($this->session->get('adminLogin') == true){
            $model = new UserModel();
            $data = [
                'users' => $model->getAllUsers(),
                'pager' => $model->pager,
            ];
            return view('user/all',$data);
        }else{
            return redirect()->to('/admin/login');
        }
    }
    
    public function edit($id){
        if($this->request->getMethod() == 'post'){
            $data = ([
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'password' => $this->request->getPost('password'),
                'phone' => $this->request->getPost('phone'),
                'house_no' => $this->request->getPost('house_no'),
                'country' => $this->request->getPost('country'),
                'state' => $this->request->getPost('state'),
                'city' => $this->request->getPost('city'),
                'pincode' => $this->request->getPost('pincode'),
                'locality' => $this->request->getPost('locality')
           ]);
            $model = new UserModel();
            $model->updateUser($id,$data);
            $this->session->setTempdata('success','Account updated successfully.',3);
            return redirect()->to(base_url('/user'));
        }
    }
    
}
