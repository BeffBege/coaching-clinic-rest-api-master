<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'HomePage | Hello'
		];
		return view('pages/home', $data);
	}

	//--------------------------------------------------------------------

}
