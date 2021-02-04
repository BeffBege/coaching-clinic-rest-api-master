<?php 

namespace App\Controllers;

use App\Models\AdminModel;

class Login extends BaseController
{
    protected $model;

    public function __construct()
    {
        // $this->model = new UserModel();
        $this->helpers = ['form', 'url'];
    }

    public function index()
    {
        if ($this->isLoggedIn()) {
            return redirect()->to(base_url('admin'));
        }
        $data = [
            'title' => 'Login | UMC AC',
            'nav' => '<li class="nav-item"><a href="/transaction" class="nav-link">Transaction</a></li>
            <li class="nav-item"><a href="/logout" class="nav-link">Logout</a></li>',
            'navv' => ' <li class="nav-item"><a href="/register" class="nav-link">Registration</a></li>
            <li class="nav-item"><a href="/login" class="nav-link">Login</a></li>'
        ];

        if (! $this->isLoggedIn()) {
			$data['nav'] = null ;
        } else {
            $data['navv'] = null ;
        }
        // $this->load->helper('form');
        return view('pages/login', $data);
    }

    private function isLoggedIn(): bool
    {
        if (session()->get('logged_in')) {
            return true;
        }
        return false;
    }
	
 	public function login()
    {
        $role = $this->request->getPost('role');
        if ($role == 'admin'){
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $credentials = ['email' => $email];
        $user = $this->adminModel->where($credentials)
            ->first();
        if (! $user) {
            session()->setFlashdata('error', 'Email atau password anda salah.');
            return redirect()->back();
        }
        $passwordCheck = password_verify($password, $user['password']);
        if (! $passwordCheck) {
            session()->setFlashdata('error', 'Email atau password anda salah.');
            return redirect()->back();
        }
        $userData = [
            'id' => $user['id'],
            'name' => $user['name'],
            'email' => $user['email'],
            'role' => $user['role'],
            'logged_in' => TRUE
        ];
        session()->set($userData);
        return redirect()->to(base_url('/admin'));
        } else {
            $role = $this->request->getPost('role');
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $credentials = ['email' => $email];
            $user = $this->adminModel->where($credentials)
                ->first();
            if (! $user) {
                session()->setFlashdata('error', 'Email atau password anda salah.');
                return redirect()->back();
            }
            $passwordCheck = password_verify($password, $user['password']);
            if (! $passwordCheck) {
                session()->setFlashdata('error', 'Email atau password anda salah.');
                return redirect()->back();
            }
            $userData = [
                'id' => $user['id'],
                'name' => $user['name'],
                'email' => $user['email'],
                'role' => $user['role'],
                'logged_in' => TRUE
            ];
            session()->set($userData);
            return redirect()->to(base_url('/coach'));
        }
	}
	
}