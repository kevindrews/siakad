<?php 

namespace App\Controllers\Adm;

use App\Controllers\BaseController;

use Config\Services;

use App\Models\Admin\JurusanModel;

class Jurusan extends BaseController
{
	protected $session;

	//protect adminmodel
	protected $JurusanModel;

	protected $config;

	public function __construct()
	{
		 // start session
		$this->session = Services::session();

		// load auth settings
		$this->config = config('Auth');

		// load model object
		$this->JurusanModel = new  JurusanModel();

		helper(['form', 'text']);

	}


	public function index()
	{
		if(session('userData.role') != 'adm')
		{
			return redirect()->to(base_url('/'));
		}

        $current = $this->request->getVar('page_jurusan') ? $this->request->getVar('page_jurusan') : 1;

        $keyword = $this->request->getVar('keyword');

        if($keyword)
        {
            $ctc = $this->JurusanModel->search($keyword);

        }else{

            $ctc = $this->JurusanModel;
        }

		$data = [
			'title' => 'Data Jurusan - SIAKAD',
            'jurusan' => $ctc->paginate(10, 'mata_kuliah'),
            'pager' =>$this->JurusanModel->pager,
            'current' => $current
		];

		return view('view_adm/vi_jurusan', $data);
	}

	public function add()
	{
		if(session('userData.role') != 'adm')
        {
            return redirect()->to(base_url('/'));
        }

        $data = [

            'title' => 'Tambah Data Mata Kuliah - SIAKAD',
            'validation' => \Config\Services::validation(),
            
        ]; 

         return view('view_adm/vi_jurusan_add', $data);
	}

	public function hapus_jurusan($kd_jurusan)
    {

        if(session('userData.role') != 'adm')
        {
            return redirect()->to(base_url('/'));
        }

        $this->JurusanModel->delete_jurusan($kd_jurusan);
        session()->setFlashdata('success', 'Mata Kuliah berhasil di hapus!');
        return redirect()->to(base_url('adm/jurusan'));
    }

	public function save_jurusan()
    {
        if ($this->request->getMethod() !=='post') {
             session()->setFlashdata('error','Access Not Allowed!');
            return redirect()->to(base_url('/adm/jurusan/add'));
        }

        if(session('userData.role') != 'adm')
        {
            return redirect()->to(base_url('/'));
        }

        $validated = $this->validate([

            'kd_jurusan' => [
                'rules' => 'required|max_length[300]|is_unique[jurusan.kd_jurusan]',
                'errors' => [
                    'required' => 'Kode Jurusan wajib diisi',
                    'max_length' => 'Kode Jurusan maksimal 300 huruf',
                    'is_unique' => 'Kode Jurusan tidak boleh sama'
                ]
            ],
            'nama_jurusan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama jurusan wajib diisi'
                ]
            ],
             'jenjang_pendidikan' => [
                'rules' => 'required',
                'errors' => [
                	'required' => 'Jenjang pendidikan wajib diisi',
                   
                ]
            ]
        ]);


        if($validated == FALSE)
        {

             $validation = \Config\Services::validation();
            
            return redirect()->to(base_url('/adm/jurusan/add'))->withInput()->with('validation', '$validation');

        }else{
        
            $kd_jurusan      = $this->request->getPost('kd_jurusan', FILTER_SANITIZE_STRING);

            $nama_jurusan   = nl2br($this->request->getPost('nama_jurusan', FILTER_SANITIZE_STRING));

            $jenjang_pendidikan = $this->request->getPost('jenjang_pendidikan', FILTER_SANITIZE_STRING);


            $data = [
                'kd_jurusan' => $kd_jurusan,

                'nama_jurusan'     => $nama_jurusan, 

                'jenjang_pendidikan'    => $jenjang_pendidikan,
            ];
     
            $simpan = $this->JurusanModel->insertJurusan($data);
     
            if($simpan){
                session()->setFlashdata('success', 'Data mata kuliah berhasil di tambah');
                return redirect()->to('/adm/jurusan');
            }   else {
            die("Gagal menyimpan data");
        }
        }
    }

    public function edit_jurusan($kd_jurusan)
    {

        //cek apakah user telah login
        if(session('userData.role') != 'adm')
        {
            return redirect()->to(base_url('/'));
        }

        //cek apakah yang di edit data user tersebut
      
         $data = [

            'title' => 'Edit Data Mata Kuliah',

            'edit' => $this->JurusanModel->edit_jurusan($kd_jurusan),

            'validation' => \Config\Services::validation(),
            
        ]; 

         return view('view_adm/vi_jurusan_edit', $data);

    }

    public function update_jurusan($kd_jurusan)
    {
        if ($this->request->getMethod() !=='post') {
            return redirect()->to(base_url());
        }

        if(session('userData.role') != 'adm')
        {
            return redirect()->to(base_url('/'));
        }
      

        $kd_jurusan    = $this->request->getPost('kd_jurusan', FILTER_SANITIZE_STRING);

        $nama_jurusan      = $this->request->getPost('nama_jurusan', FILTER_SANITIZE_STRING);

        $jenjang_pendidikan     = $this->request->getPost('jenjang_pendidikan', FILTER_SANITIZE_STRING);

        $data = [

            'kd_jurusan'=> $kd_jurusan,

            'nama_jurusan' => $nama_jurusan,

            'jenjang_pendidikan'  => $jenjang_pendidikan,
        ];

        $this->JurusanModel->update_ruang($data, $kd_jurusan);
        session()->setFlashdata('success', 'Podcast berhasil di edit!');
        return redirect()->to('/adm/jurusan');
    }
 
}
