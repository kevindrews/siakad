<?php 

namespace App\Controllers\Adm;

use App\Controllers\BaseController;

use Config\Services;

use App\Models\Admin\DosenModel;

class Dosen extends BaseController
{
	protected $session;

	protected $DosenModel;

	protected $config;

	public function __construct()
	{
		 // start session
		$this->session = Services::session();

		// load auth settings
		$this->config = config('Auth');

		// load model object
		$this->DosenModel = new  DosenModel();

		helper(['form', 'text']);

	}


	public function index()
	{
		if(session('userData.role') != 'adm')
		{
			return redirect()->to(base_url('/'));
		}

        $current = $this->request->getVar('page_dosen') ? $this->request->getVar('page_dosen') : 1;

        $keyword = $this->request->getVar('keyword');

        if($keyword)
        {
            $ctc = $this->DosenModel->search($keyword);

        }else{

            $ctc = $this->DosenModel;
        }

		$data = [
			'title' => 'Data Dosen - SIAKAD',
            'dosen' => $ctc->paginate(10, 'prasyarat'),
            'pager' =>$this->DosenModel->pager,
            'current' => $current
		];

		return view('view_adm/vi_dosen', $data);
	}

	public function add()
	{
		if(session('userData.role') != 'adm')
        {
            return redirect()->to(base_url('/'));
        }

        $data = [

            'title' => 'Tambah Data Dosen - SIAKAD',
            /*'ruang' => $this->MkModel->get_all_kode_ruang(),*/
            'validation' => \Config\Services::validation(),
            
        ]; 

         return view('view_adm/vi_dosen_add', $data);
	}

	public function hapus_dosen($nip)
    {

        if(session('userData.role') != 'adm')
        {
            return redirect()->to(base_url('/'));
        }

        $this->DosenModel->delete_dosen($nip);
        session()->setFlashdata('success', 'Berhasil di hapus!');
        return redirect()->to(base_url('adm/dosen'));
    }

	public function save_dosen()
    {
        if ($this->request->getMethod() !=='post') {
             session()->setFlashdata('error','Access Not Allowed!');
            return redirect()->to(base_url('/adm/prasyarat/add'));
        }

        if(session('userData.role') != 'adm')
        {
            return redirect()->to(base_url('/'));
        }

        $validated = $this->validate([

            'nip' => [
                'rules' => 'required|is_unique[dosen.nip]',
                'errors' => [
                    'required' => 'NIP dosen wajib diisi',
                    'is_unique' => 'ID tidak boleh sama'
                ]
            ],

            'nama_dosen' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama dosen wajib diisi'
                ]
            ],

            'jenis_kelamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis Kelamin wajib diisi'
                ]
            ],

            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat dosen wajib diisi'
                ]
            ],

            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Email wajib diisi'
                ]
            ]
        ]);


        if($validated == FALSE)
        {

             $validation = \Config\Services::validation();
            
            return redirect()->to(base_url('/adm/dosen/add'))->withInput()->with('validation', '$validation');

        }else{

            $nip   = $this->request->getPost('nip', FILTER_SANITIZE_STRING);

            $nama_dosen   = $this->request->getPost('nama_dosen', FILTER_SANITIZE_STRING);

            $jenis_kelamin = $this->request->getPost('jenis_kelamin', FILTER_SANITIZE_STRING);

            $alamat = $this->request->getPost('alamat', FILTER_SANITIZE_STRING);

            $email = $this->request->getPost('email', FILTER_SANITIZE_STRING);


            $data = [

                'nip'     => $nip, 

                'nama_dosen'     => $nama_dosen, 

                'jenis_kelamin'    => $jenis_kelamin,

                'alamat'     => $alamat,

                'email' => $email,
            ];
     
            $simpan = $this->DosenModel->insertDosen($data);
     
            if($simpan){
                session()->setFlashdata('success', 'Data mata kuliah prasyarat berhasil di tambah');
                return redirect()->to('/adm/dosen');
            }   else {
            die("Gagal menyimpan data");
        }
        }
    }

    public function edit_dosen($nip)
    {

        //cek apakah user telah login
        if(session('userData.role') != 'adm')
        {
            return redirect()->to(base_url('/'));
        }

        //cek apakah yang di edit data user tersebut
      
         $data = [

            'title' => 'Edit Data Dosen',

            'edit' => $this->DosenModel->edit_dosen($nip),

            'validation' => \Config\Services::validation(),
            
        ]; 

         return view('view_adm/vi_dosen_edit', $data);

    }

    public function update_dosen($nip)
    {
        if ($this->request->getMethod() !=='post') {
            return redirect()->to(base_url());
        }

        if(session('userData.role') != 'adm')
        {
            return redirect()->to(base_url('/'));
        }
      

        $nip    = $this->request->getPost('nip', FILTER_SANITIZE_STRING);

        $nama_dosen     = $this->request->getPost('nama_dosen', FILTER_SANITIZE_STRING);

        $jenis_kelamin   = $this->request->getPost('jenis_kelamin', FILTER_SANITIZE_STRING);

        $alamat   = $this->request->getPost('alamat', FILTER_SANITIZE_STRING);

        $email   = $this->request->getPost('email', FILTER_SANITIZE_STRING);

        $data = [

            'nip'=> $nip,

            'nama_dosen'  => $nama_dosen,

            'jenis_kelamin' => $jenis_kelamin,

            'alamat' => $alamat,

            'email' => $email,

        ];

        $this->DosenModel->updateDosen($data, $nip);
        session()->setFlashdata('success', 'Mata Kuliah Prasyarat Berhasil di Edit');
        return redirect()->to('/adm/dosen');
    }
 
}
