<?php 

namespace App\Controllers;

use App\Models\MateriModel;
use App\Models\User_model;
use App\Libraries\Notification;

class Admin extends BaseController
{
	public function index()
	{
		$data = [
            'title' => 'HomePage | Hello',
            'user' => $this->userModel->findAll()
        ];
        if (! $this->isLoggedIn()) {
            session()->setFlashdata('error', "Anda harus login sebagai admin");
			return redirect()->to('/login');
        }    
		return view('pages/home', $data);
    }

    private function isLoggedIn(): bool
    {
        if (session()->get('logged_in')) {
            return true;
        }
        return false;
    }

    
    
    public function listuser(){

        $data = [
            'title' => 'List User | Hello',
            'list' => $this->userModel->findAll()
        ];
        if (! $this->isLoggedIn()) {
            session()->setFlashdata('error', "Anda harus login sebagai admin");
			return redirect()->to('/login');
        }
        return view('pages/listuser', $data);
    }

    public function listmateri(){

        $data = [
            'title' => 'List User | Hello',
            'list' => $this->materiModel->findAll()
        ];
        if (! $this->isLoggedIn()) {
            session()->setFlashdata('error', "Anda harus login sebagai admin");
			return redirect()->to('/login');
        }
        return view('pages/listmateri', $data);
    }

    public function tambahuser()
    {
        $data = [
            'title' => 'Tambah Data User',
            'validation' => \Config\Services::validation()
        ];
        if (! $this->isLoggedIn()) {
            session()->setFlashdata('error', "Anda harus login sebagai admin");
			return redirect()->to('/login');
        }
        // if (! $this->isLoggedIn()) {
        //     session()->setFlashdata('error', "Anda harus login sebagai admin");
		// 	return redirect()->to('/loginAdmin');
        // }   
        return view('pages/tambahuser', $data);
    }

// didalam program yang simple terdapat sistem yang kompleks

// didalam sistem yang simple terdapat pemrograman yang kompleks


    public function prosestambahuser()
    {
        // validasi input
        if (!$this->validate([
            'nama' => [
                'rules' => 'required|is_unique[users.nama]',
                'errors' => [
                    'required' => '{field} paket Harus Diisi',
                    'is_unique' => '{field} paket sudah ada'
                ]
            ],
            'gambar_profil' => [
                'rules' => 'max_size[gambar_profil,5024]|is_image[gambar_profil]|mime_in[gambar_profil,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Kegedean ukuran file gambar nya gan',
                    'is_image' => 'Lu milih apaan si ngab',
                    'mime_in'  => 'Lu milih apaan si ngab'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            return redirect()->to('/admin/tambahuser')->withInput();
        }

        

        //ambil gambar
        $filePict = $this->request->getFile('gambar_profil');
        //apakah gambar kosong
        if ($filePict->getError() == 4) {
            $namaPict = 'images.png';
        } else {
            //pindahin gambar ke folder img
            $filePict->move('img');
            //ambil nama file
            $namaPict = $filePict->getName();
        }

        $i1 = $this->request->getVar('nama') ;
        $i2 =  $this->request->getVar('tanggal_lahir');
        $i3 = str_replace('-','', $i2);
        $password = "$i1$i3" ;
        $this->userModel->save([
            'nama' => $this->request->getVar('nama'),
            'password' => $password,
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'peran' => $this->request->getVar('peran'),
            'no_telp' => $this->request->getVar('no_telp'),
            'gambar_profil' => $namaPict
        ]);

        session()->setFlashdata('berhasil', 'Data udah masuk gan.');

        return redirect()->to('/admin/listuser');
    }

    public function deleteuser($id)
    {
        //cari gambar berdasarkan id
        $paket = $this->userModel->find($id);
        //cek jika file gambar default
        if ($paket['gambar_profil'] != 'images.png') {
            //hapus gambar  
            unlink('img/' . $paket['gambar_profil']);
        } else {
            
        }


        $this->userModel->delete($id);
        session()->setFlashdata('berhasil', 'Data berhasil dihapus.');

        return redirect()->to('/admin/listuser');
    }

    public function edituser($id)
    {
        $data = [
            'title' => 'Edit Data User',
            'validation' => \Config\Services::validation(),
            'users' => $this->userModel->find($id),
        ];

        if (! $this->isLoggedIn()) {
            session()->setFlashdata('error', "Anda harus login sebagai admin");
			return redirect()->to('/loginAdmin');
        }   

        return view('admin/edit', $data);
    }
    

	//--------------------------------------------------------------------

}
