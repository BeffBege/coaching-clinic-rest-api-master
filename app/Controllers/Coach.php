<?php 
namespace App\Controllers;
 
use App\Libraries\Notification;
use App\Models\AdminModel;
use App\Models\MateriModel;


class Coach extends BaseController
{
    // protected $helpers = ['form','date'];
    // protected $session = null;
    // protected $request = null;

    public function __construct()
    {
        // $this->session = session();
        // $this->request = \Config\Services::request();
        // $this->notif = new Notification();
        // $this->moduser = model('App\Models\ModUsers');
        $this->helpers = ['form', 'url'];
    }
    
    private function isLoggedIn(): bool
    {
        if (session()->get('logged_in')) {
            return true;
        }
        return false;
    }

    public function index()
    {
        $data = [
            'title' => 'Welcome to Admin Dashboard'
        ];
        if (! $this->isLoggedIn()) {
            session()->setFlashdata('error', "Anda harus login sebagai admin");
			return redirect()->to('/login');
        }    
        return view('pages/homecoach', $data);
    }
    
// DETAIL,JUAL,BELI PAKET PERNIKAHAN DISOKIN BRAYYY 

public function listmatericoach(){
	$data = [
		'title' => 'List Materi',
		'list' => $this->materiModel->findAll()
    ];
    
    if (! $this->isLoggedIn()) {
        session()->setFlashdata('error', "Anda harus login sebagai admin");
        return redirect()->to('/login');
    }   

	return view('pages/listmatericoach', $data);
}

public function detailmatericoach($id)
    {

        $data = [
            'title' => 'Detail Materi',
            'materi' => $this->materiModel->getPackage($id)
        ];
        if (! $this->isLoggedIn()) {
            session()->setFlashdata('error', "Anda harus login sebagai admin");
			return redirect()->to('/loginAdmin');
        }   
        // kalo komik ga ada
        if (empty($data['paket'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('IRI? BILANG BOSS AHAHA PAPALEPA PALEPI PALE PALE BUDI');
        }
        return view('pages/detailmatericoach', $data);
    }


    public function tambahmatericoach()
    {
        $data = [
            'title' => 'Tambah Data Item',
            'validation' => \Config\Services::validation()
        ];
        if (! $this->isLoggedIn()) {
            session()->setFlashdata('error', "Anda harus login sebagai admin");
			return redirect()->to('/loginAdmin');
        }   
        return view('pages/tambahmatericoach', $data);
    }



    public function prosestambahmatericoach()
    {
        //validasi input
        if (!$this->validate([
            'nama_materi' => [
                'rules' => 'required|is_unique[materi.nama_materi]',
                'errors' => [
                    'required' => '{field} paket Harus Diisi',
                    'is_unique' => '{field} paket sudah ada'
                ]
            ],
            'file_pemateri' => [
                'rules' => 'max_size[file_pemateri,10024]',
                'errors' => [
                    'max_size' => 'Kegedean ukuran file gambar nya gan',
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/komik/tambah')->withInput()->with('validation', $validation);
            return redirect()->to('/coach/tambahmatericoach')->withInput();
        }

        //ambil gambar
        $filePict = $this->request->getFile('file_pemateri');
        //apakah gambar kosong
        if ($filePict->getError() == 4) {
            $namaPict = 'images.png';
        } else {
            //pindahin gambar ke folder img
            $filePict->move('file');
            //ambil nama file
            $namaPict = $filePict->getName();
        }


        $this->materiModel->save([
            'nama_pemateri' => $this->request->getVar('nama_pemateri'),
            'jenis_materi' => $this->request->getVar('jenis_materi'),
            'deskripsi_materi' => $this->request->getVar('deskripsi_materi'),
            'file_materi' => $namaPict,
            'jenis_coaching' => $this->request->getVar('jenis_coaching'),
            'idpembuat_materi' => $this->request->getVar('idpembuat_materi'),
            'pembuat_materi' => $this->request->getVar('pembuat_materi'),
        ]);

        session()->setFlashdata('berhasil', 'Data udah masuk gan.');

        return redirect()->to('/coach/tambahmatericoach');
    }


    public function deleteitem($id)
    {
        //cari gambar berdasarkan id
        $paket = $this->itemsModel->find($id);
        //cek jika file gambar default
        if ($paket['item_pict'] != 'images.png') {
            //hapus gambar  
            unlink('img/' . $paket['item_pict']);
        } else {
        }


        $this->itemsModel->delete($id);
        session()->setFlashdata('Berhasil', 'Data berhasil dihapus');

        return redirect()->to('/admin/items');
    }


    public function edititem($id)
    {
        $data = [
            'title' => 'Edit Data items',
            'validation' => \Config\Services::validation(),
            'items' => $this->itemsModel->getItems($id),
        ];

        if (! $this->isLoggedIn()) {
            session()->setFlashdata('error', "Anda harus login sebagai admin");
			return redirect()->to('/loginAdmin');
        }   

        return view('admin/edititem', $data);
    }


    public function updateitem($id)
    {
        //validasi input
        if (!$this->validate([
            'item_name' => [
                'rules' => 'required|is_unique[items.item_name]',
                'errors' => [
                    'required' => '{field} paket Harus Diisi',
                    'is_unique' => '{field} paket sudah ada'
                ]
            ],
            'item_pict' => [
                'rules' => 'max_size[item_pict,5024]|is_image[item_pict]|mime_in[item_pict,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Kegedean ukuran file gambar nya gan',
                    'is_image' => 'Lu milih apaan si ngab',
                    'mime_in'  => 'Lu milih apaan stai ngab'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/komik/tambah')->withInput()->with('validation', $validation);
            return redirect()->to('/admin/items')->withInput();
        }

          $fileSampul = $this->request->getFile('item_pict');

         //cek gambar berubah apa engga
         if ($fileItem_pict->getError() == 4) {
             $namaPict = $this->request->getVar('item_pictLama');
         } else {
             //ambil nama file
             $namaPict = $fileItem_pict->getName();
             //pindahin gambar ke folder img
             $fileSampul->move('img', $namaPict);
             //hapus file lama
             unlink('img/' . $this->request->getVar('item_pictLama'));
         }

        

        $desc = url_title($this->request->getVar('item_name'), '-', true);
        $this->itemsModel->save([
            'id' => $id,
            'item_name' => $this->request->getVar('item_name'),
            'item_category' => $this->request->getVar('item_category'),
            'item_code' => $this->request->getVar('item_code'),
            'item_pict' => $namaPict
        ]);

        session()->setFlashdata('berhasil', 'Data berhasil diubah.');

        return redirect()->to('/admin/items');
    }





    public function listuser()
    {
        $data = [
            'title' => 'List Data User',
            'validation' => \Config\Services::validation(),
            'user' => $this->userModel->findAll()
        ];
        if (! $this->isLoggedIn()) {
            session()->setFlashdata('error', "Anda harus login sebagai admin");
			return redirect()->to('/loginAdmin');
        }   
        return view('/admin/listuser', $data);
    }
}