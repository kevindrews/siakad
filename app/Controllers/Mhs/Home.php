<?php 

namespace App\Controllers\Mhs;

use App\Controllers\BaseController;

use Config\Services;

use App\Models\Mahasiswa\KrsModel;

/*use App\Models\Admin\MetaModel;*/

class Home extends BaseController
{
	protected $session;

	//protect adminmodel
	//protected $AdminModel;
	/**
	 * Authentication settings.
	 */
	protected $KrsModel;

	protected $config;

	public function __construct()
	{
		 // start session
		$this->session = Services::session();

		// load auth settings
		$this->config = config('Auth');

		// load model object
		//$this->MetaModel = new MetaModel();
		 $this->KrsModel = new KrsModel();

	}

	public function index()
	{
		if(session('userData.role') != 'mhs')
		{
			return redirect()->to(base_url('/'));
		}
		
		$data = 
		[
			'title' => 'Halaman Utama SIAKAD UIN SUSKA',

			/*'krs' => $this->KrsModel->getSemester($semester),*/
			/*'pengguna'	=> $this->MetaModel->getPengguna(),
			'laporan'	=> $this->MetaModel->getLaporan(),
			'thread'	=> $this->MetaModel->getThread(),*/
		];

		return view('view_mhs/vi_home', $data);
	}
 
}
