<?php 
namespace App\Controllers;

class Logout extends BaseController
{
    protected $model;

    public function __construct()
    {
        // $this->model = new UserModel();
        $this->helpers = ['form', 'url'];
    }

	public function index()
	{
		$userData = [
			'name',
			'email',
            'logged_in'
        ];

        $data = [
            'title' => 'Logout | Wedding App',
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
   
        session()->remove($userData);
        session()->setFlashdata('success', "Berhasil Logout <a href='/'>Kembali Ke Homepage</a>");
		return view('pages/login', $data);
    }
    
    private function isLoggedIn(): bool
    {
        if (session()->get('logged_in')) {
            return true;
        }
        return false;
    }
	
}	