<?php 

namespace App\Controllers\Adm;

use App\Controllers\BaseController;

use Config\Services;

use App\Models\Admin\MkModel;

class Mata_kuliah extends BaseController
{
	protected $session;

	//protect adminmodel
	protected $MkModel;

	protected $config;

	public function __construct()
	{
		 // start session
		$this->session = Services::session();

		// load auth settings
		$this->config = config('Auth');

		// load model object
		$this->MkModel = new  MkModel();

		helper(['form', 'text']);

	}


	public function index()
	{
		if(session('userData.role') != 'adm')
		{
			return redirect()->to(base_url('/'));
		}

        $current = $this->request->getVar('page_mata_kuliah') ? $this->request->getVar('page_mata_kuliah') : 1;

        $keyword = $this->request->getVar('keyword');

        if($keyword)
        {
            $ctc = $this->MkModel->search($keyword);

        }else{

            $ctc = $this->MkModel;
        }

		$data = [
			'title' => 'Data Mata Kuliah - SIAKAD',
            'mk' => $ctc->paginate(10, 'mata_kuliah'),
            'pager' =>$this->MkModel->pager,
            'current' => $current
		];

		return view('view_adm/vi_mk', $data);
	}

	public function add()
	{
		if(session('userData.role') != 'adm')
        {
            return redirect()->to(base_url('/'));
        }

        $data = [

            'title' => 'Tambah Data Mata Kuliah - SIAKAD',
            'ruang' => $this->MkModel->get_all_kode_ruang(),
            'prasyarat' => $this->MkModel->get_all_prasyarat(),
            'validation' => \Config\Services::validation(),
            
        ]; 

         return view('view_adm/vi_mk_add', $data);
	}

	public function hapus_mata_kuliah($kd_mk)
    {

        if(session('userData.role') != 'adm')
        {
            return redirect()->to(base_url('/'));
        }

        $this->MkModel->delete_mk($kd_mk);
        session()->setFlashdata('success', 'Mata Kuliah berhasil di hapus!');
        return redirect()->to(base_url('adm/mata_kuliah'));
    }

	public function save_mk()
    {
        if ($this->request->getMethod() !=='post') {
             session()->setFlashdata('error','Access Not Allowed!');
            return redirect()->to(base_url('/adm/mata_kuliah/add'));
        }

        if(session('userData.role') != 'adm')
        {
            return redirect()->to(base_url('/'));
        }

        $validated = $this->validate([

            'kd_mk' => [
                'rules' => 'required|max_length[300]|is_unique[mata_kuliah.kd_mk]',
                'errors' => [
                    'required' => 'Nama mata kuliah wajib diisi',
                    'max_length' => 'Nama mata kuliah maksimal 100 huruf',
                    'is_unique' => 'Nama mata kuliah tidak boleh sama'
                ]
            ],

            'nama_mk' => [
                'rules' => 'required|max_length[300]|is_unique[mata_kuliah.nama_mk]',
                'errors' => [
                    'required' => 'Nama mata kuliah wajib diisi',
                    'max_length' => 'Nama mata kuliah maksimal 100 huruf',
                    'is_unique' => 'Nama mata kuliah tidak boleh sama'
                ]
            ],
            'semester' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Semester wajib diisi'
                ]
            ],
             'jumlah_sks' => [
                'rules' => 'required',
                'errors' => [
                	'required' => 'Jumlah sks wajib diisi',
                   
                ]
            ],
             'prasyarat' => [
                'rules' => 'required',
                'errors' => [
                	'required' => 'Prasyarat wajib diisi',
                  
                ]
            ],
        ]);


        if($validated == FALSE)
        {

             $validation = \Config\Services::validation();
            
            return redirect()->to(base_url('/adm/mata_kuliah/add'))->withInput()->with('validation', '$validation');

        }else{

            $kd_mk      = $this->request->getPost('kd_mk', FILTER_SANITIZE_STRING);
        
            $kd_ruang      = $this->request->getPost('kd_ruang', FILTER_SANITIZE_STRING);

            $nama_mk   = $this->request->getPost('nama_mk', FILTER_SANITIZE_STRING);

            $semester = $this->request->getPost('semester', FILTER_SANITIZE_STRING);

            $jumlah_sks = $this->request->getPost('jumlah_sks', FILTER_SANITIZE_STRING);

            $prasyarat = $this->request->getPost('prasyarat', FILTER_SANITIZE_STRING);


            $data = [
                'kd_mk' => $kd_mk,

                'kd_ruang' => $kd_ruang,

                'nama_mk'     => $nama_mk, 

                'semester'    => $semester,

                'jumlah_sks'     => $jumlah_sks,

                'prasyarat'     => $prasyarat,
            ];

            //dd($data);
     
            $simpan = $this->MkModel->insertMk($data);
     
            if($simpan){
                session()->setFlashdata('success', 'Data mata kuliah berhasil di tambah');
                return redirect()->to('/adm/mata_kuliah');
            }   else {
            die("Gagal menyimpan data");
        }
        }
    }

    public function edit_mata_kuliah($kd_mk)
    {

        //cek apakah user telah login
        if(session('userData.role') != 'adm')
        {
            return redirect()->to(base_url('/'));
        }

        //cek apakah yang di edit data user tersebut
      
         $data = [

            'title' => 'Edit Data Mata Kuliah',

            'edit' => $this->MkModel->edit_mata_kuliah($kd_mk),

            'validation' => \Config\Services::validation(),

            'ruang' => $this->MkModel->get_all_kode_ruang(),

            'prasyarat' => $this->MkModel->get_all_prasyarat(),
            
        ]; 

         return view('view_adm/vi_mk_edit', $data);

    }

    public function update_mk($kd_mk)
    {
        if ($this->request->getMethod() !=='post') {
            return redirect()->to(base_url());
        }

        if(session('userData.role') != 'adm')
        {
            return redirect()->to(base_url('/'));
        }
      

        $kd_ruang    = $this->request->getPost('kd_ruang', FILTER_SANITIZE_STRING);

        $nama_mk      = $this->request->getPost('nama_mk', FILTER_SANITIZE_STRING);

        $semester     = $this->request->getPost('semester', FILTER_SANITIZE_STRING);

        $jumlah_sks   = $this->request->getPost('jumlah_sks', FILTER_SANITIZE_STRING);

        $prasyarat        = $this->request->getPost('prasyarat', FILTER_SANITIZE_STRING);

        $data = [

            'kd_ruang'=> $kd_ruang,

            'nama_mk' => $nama_mk,

            'semester'  => $semester,

            'jumlah_sks' => $jumlah_sks,

            'prasyarat' => $prasyarat
        ];

        $this->MkModel->updateThread($data, $kd_mk);
        session()->setFlashdata('success', 'Podcast berhasil di edit!');
        return redirect()->to('/adm/mata_kuliah');
    }
 
}
