<?php 

namespace App\Controllers\Adm;

use App\Controllers\BaseController;

use Config\Services;

use App\Models\Admin\RuangModel;

class Ruang_kuliah extends BaseController
{
	protected $session;

	protected $RuangModel;

	protected $config;

	public function __construct()
	{
		 // start session
		$this->session = Services::session();

		// load auth settings
		$this->config = config('Auth');

		// load model object
		$this->RuangModel = new RuangModel();

		helper(['form', 'text']);

	}


	public function index()
	{
		if(session('userData.role') != 'adm')
		{
			return redirect()->to(base_url('/'));
		}

        $current = $this->request->getVar('page_ruang_kuliah') ? $this->request->getVar('page_ruang_kuliah') : 1;

        $keyword = $this->request->getVar('keyword');

        if($keyword)
        {
            $ctc = $this->RuangModel->search($keyword);

        }else{

            $ctc = $this->RuangModel;
        }

		$data = [
			'title' => 'Data Ruangan Perkuliahan - SIAKAD',
            'ruang' => $ctc->paginate(10, 'ruang_kuliah'),
            'pager' =>$this->RuangModel->pager,
            'current' => $current
		];

		return view('view_adm/vi_ruang_kuliah', $data);
	}

	public function add()
	{
		if(session('userData.role') != 'adm')
        {
            return redirect()->to(base_url('/'));
        }

        $data = [

            'title' => 'Tambah Data Ruang Kuliah - SIAKAD',
            /*'ruang' => $this->MkModel->get_all_kode_ruang(),*/
            'validation' => \Config\Services::validation(),
            
        ]; 

         return view('view_adm/vi_ruang_kuliah_add', $data);
	}

	public function hapus_ruang($kd_ruang)
    {

        if(session('userData.role') != 'adm')
        {
            return redirect()->to(base_url('/'));
        }

        $this->RuangModel->delete_ruang($kd_ruang);
        session()->setFlashdata('success', 'Mata Kuliah berhasil di hapus!');
        return redirect()->to(base_url('adm/ruang_kuliah'));
    }

	public function save_ruang()
    {
        if ($this->request->getMethod() !=='post') {
             session()->setFlashdata('error','Access Not Allowed!');
            return redirect()->to(base_url('/adm/ruang_kuliah/add'));
        }

        if(session('userData.role') != 'adm')
        {
            return redirect()->to(base_url('/'));
        }

        $validated = $this->validate([

            'kd_ruang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kode Ruangan Wajib Diisi'
                ]
            ],
            'nama_ruang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Ruangan Wajib Diisi'
                ]
            ],
             'kapasitas' => [
                'rules' => 'required',
                'errors' => [
                	'required' => 'Kapasitas Wajib Diisi',
                   
                ]
            ],
        ]);


        if($validated == FALSE)
        {

             $validation = \Config\Services::validation();
            
            return redirect()->to(base_url('/adm/ruang_kuliah/add'))->withInput()->with('validation', '$validation');

        }else{

            $kd_ruang   = $this->request->getPost('kd_ruang', FILTER_SANITIZE_STRING);

            $nama_ruang = $this->request->getPost('nama_ruang', FILTER_SANITIZE_STRING);

            $kapasitas = $this->request->getPost('kapasitas', FILTER_SANITIZE_STRING);


            $data = [

                'kd_ruang'     => $kd_ruang, 

                'nama_ruang'    => $nama_ruang,

                'kapasitas'     => $kapasitas,
            ];
     
            $simpan = $this->RuangModel->insertRuang($data);
     
            if($simpan){
                session()->setFlashdata('success', 'Data Ruang Kuliah Berhasil di Tambah');
                return redirect()->to('/adm/ruang_kuliah');
            }   else {
            die("Gagal menyimpan data");
        }
        }
    }

    public function edit_ruang($kd_ruang)
    {

        //cek apakah user telah login
        if(session('userData.role') != 'adm')
        {
            return redirect()->to(base_url('/'));
        }

        //cek apakah yang di edit data user tersebut
      
         $data = [

            'title' => 'Edit Data Ruang Kuliah - SIAKAD',

            'edit' => $this->RuangModel->edit_ruang_kuliah($kd_ruang),

            'validation' => \Config\Services::validation(),
            
        ]; 

         return view('view_adm/vi_ruang_kuliah_edit', $data);

    }

    public function update_ruang_kuliah($kd_ruang)
    {
        if ($this->request->getMethod() !=='post') {
            return redirect()->to(base_url());
        }

        if(session('userData.role') != 'adm')
        {
            return redirect()->to(base_url('/'));
        }
      

        $nama_ruang     = $this->request->getPost('nama_ruang', FILTER_SANITIZE_STRING);

        $kapasitas   = $this->request->getPost('kapasitas', FILTER_SANITIZE_STRING);

        $data = [

            'nama_ruang'=> $nama_ruang,

            'kapasitas'  => $kapasitas
        ];

        $this->RuangModel->update_ruang($data, $kd_ruang);
        session()->setFlashdata('success', 'Mata Kuliah Prasyarat Berhasil di Edit');
        return redirect()->to('/adm/ruang_kuliah');
    }
 
}
