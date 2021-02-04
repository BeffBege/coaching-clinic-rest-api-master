<?php 

namespace App\Controllers;

use App\Models\AdminModel;

class Register extends BaseController
{
    protected $model;

    public function __construct()
    {
        // $this->model = new UserModel();
        $this->helpers = ['form', 'url'];
    }

    public function index()
    {
        $data = [
            'title' => 'Register | Wedding App',
        ];

        if (! $this->isLoggedIn()) {
			$data['nav'] = null ;
        } else {
            $data['navv'] = null ;
        }
        
        return view('pages/register', $data);
    }

    private function isLoggedIn(): bool
    {
        if (session()->get('logged_in')) {
            return true;
        }
        return false;
    }

    public function store()
    {
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $role = $this->request->getPost('role');
        $user = [
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'role' => $role
        ];
        $save = $this->adminModel->save($user);
        if ($save) {
            session()->setFlashdata('success', 'Register Berhasil!');
            return redirect()->to(base_url('login'));
        } else {
            session()->setFlashdata('error', $this->adminModel->errors());
            return redirect()->back();
        }
    }
    
}