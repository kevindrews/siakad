<?php 

namespace App\Controllers\Adm;

use App\Controllers\BaseController;

use Config\Services;

use App\Models\Admin\PrasyaratModel;

class Prasyarat extends BaseController
{
	protected $session;

	protected $PrasyaratModel;

	protected $config;

	public function __construct()
	{
		 // start session
		$this->session = Services::session();

		// load auth settings
		$this->config = config('Auth');

		// load model object
		$this->PrasyaratModel = new  PrasyaratModel();

		helper(['form', 'text']);

	}


	public function index()
	{
		if(session('userData.role') != 'adm')
		{
			return redirect()->to(base_url('/'));
		}

        $current = $this->request->getVar('page_prasyarat') ? $this->request->getVar('page_prasyarat') : 1;

        $keyword = $this->request->getVar('keyword');

        if($keyword)
        {
            $ctc = $this->PrasyaratModel->search($keyword);

        }else{

            $ctc = $this->PrasyaratModel;
        }

		$data = [
			'title' => 'Data Mata Kuliah Prasyarat - SIAKAD',
            'syarat' => $ctc->paginate(10, 'prasyarat'),
            'pager' =>$this->PrasyaratModel->pager,
            'current' => $current
		];

		return view('view_adm/vi_prasyarat', $data);
	}

	public function add()
	{
		if(session('userData.role') != 'adm')
        {
            return redirect()->to(base_url('/'));
        }

        $data = [

            'title' => 'Tambah Data Mata Kuliah - SIAKAD',
            /*'ruang' => $this->MkModel->get_all_kode_ruang(),*/
            'validation' => \Config\Services::validation(),
            
        ]; 

         return view('view_adm/vi_prasyarat_add', $data);
	}

	public function hapus_prasyarat($id_prasyarat)
    {

        if(session('userData.role') != 'adm')
        {
            return redirect()->to(base_url('/'));
        }

        $this->PrasyaratModel->delete_prasyarat($id_prasyarat);
        session()->setFlashdata('success', 'Mata Kuliah berhasil di hapus!');
        return redirect()->to(base_url('adm/prasyarat'));
    }

	public function save_prasyarat()
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

            'id_prasyarat' => [
                'rules' => 'required|is_unique[prasyarat.id_prasyarat]',
                'errors' => [
                    'required' => 'Nama mata kuliah prasyarat wajib diisi',
                    'is_unique' => 'ID tidak boleh sama'
                ]
            ],

            'mk_prasyarat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'ID wajib diisi'
                ]
            ]
        ]);


        if($validated == FALSE)
        {

             $validation = \Config\Services::validation();
            
            return redirect()->to(base_url('/adm/prasyarat/add'))->withInput()->with('validation', '$validation');

        }else{

            $id_prasyarat   = $this->request->getPost('id_prasyarat', FILTER_SANITIZE_STRING);

            $mk_prasyarat   = $this->request->getPost('mk_prasyarat', FILTER_SANITIZE_STRING);

            $semester = $this->request->getPost('semester', FILTER_SANITIZE_STRING);

            $jumlah_sks = $this->request->getPost('jumlah_sks', FILTER_SANITIZE_STRING);


            $data = [

                'id_prasyarat'     => $id_prasyarat, 

                'mk_prasyarat'     => $mk_prasyarat, 

                'semester'    => $semester,

                'jumlah_sks'     => $jumlah_sks,
            ];
     
            $simpan = $this->PrasyaratModel->insertPrasyarat($data);
     
            if($simpan){
                session()->setFlashdata('success', 'Data mata kuliah prasyarat berhasil di tambah');
                return redirect()->to('/adm/prasyarat');
            }   else {
            die("Gagal menyimpan data");
        }
        }
    }

    public function edit_prasyarat($id_prasyarat)
    {

        //cek apakah user telah login
        if(session('userData.role') != 'adm')
        {
            return redirect()->to(base_url('/'));
        }

        //cek apakah yang di edit data user tersebut
      
         $data = [

            'title' => 'Edit Data Mata Kuliah Prasyarat',

            'edit' => $this->PrasyaratModel->edit_mata_kuliah_prasyarat($id_prasyarat),

            'validation' => \Config\Services::validation(),
            
        ]; 

         return view('view_adm/vi_prasyarat_edit', $data);

    }

    public function update_mk_prasyarat($id_prasyarat)
    {
        if ($this->request->getMethod() !=='post') {
            return redirect()->to(base_url());
        }

        if(session('userData.role') != 'adm')
        {
            return redirect()->to(base_url('/'));
        }
      

        $mk_prasyarat    = $this->request->getPost('mk_prasyarat', FILTER_SANITIZE_STRING);

        $semester     = $this->request->getPost('semester', FILTER_SANITIZE_STRING);

        $jumlah_sks   = $this->request->getPost('jumlah_sks', FILTER_SANITIZE_STRING);

        $data = [

            'mk_prasyarat'=> $mk_prasyarat,

            'semester'  => $semester,

            'jumlah_sks' => $jumlah_sks,
        ];

        $this->PrasyaratModel->updatePrasyarat($data, $id_prasyarat);
        session()->setFlashdata('success', 'Mata Kuliah Prasyarat Berhasil di Edit');
        return redirect()->to('/adm/prasyarat');
    }
 
}
