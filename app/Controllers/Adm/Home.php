<?php 

namespace App\Controllers\Adm;

use App\Controllers\BaseController;

use Config\Services;

use App\Models\Mahasiswa\KrsModel;

class Home extends BaseController
{
	protected $session;

	protected $config;

	public function __construct()
	{
		 // start session
		$this->session = Services::session();

		// load auth settings
		$this->config = config('Auth');

		 $this->krs = new KrsModel;

	}

	public function index()
	{
		if(session('userData.role') != 'adm')
		{
			return redirect()->to(base_url('/'));
		}
		
		$data = 
		[
			'title' => 'Halaman Administrator SIAKAD UIN SUSKA',

			'getMahasiswa' => $this->krs->getMahasiswa(),

			'getRuangKuliah' => $this->krs->getRuangKuliah(),

			'getMatakuliah' => $this->krs->getMatakuliah(),

			'getDosen' => $this->krs->getDosen(),



		
		];

		return view('view_adm/vi_home', $data);
	}
 
}
