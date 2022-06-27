<?php 

namespace App\Controllers\Mhs;

use App\Controllers\BaseController;

use Config\Services;

use App\Models\Mahasiswa\KrsModel;

class Krs extends BaseController
{
    protected $session;

    //protect adminmodel
    protected $KrsModel;

    protected $config;

    public function __construct()
    {
         // start session
        $this->session = Services::session();

        // load auth settings
        $this->config = config('Auth');

        // load model object
        $this->KrsModel = new KrsModel();

        helper(['form', 'text']);

    }


    public function isi($semester = true)
    {

        if(session('userData.role') != 'mhs')
        {
            return redirect()->to(base_url('/'));
        }

        $data = [
           
            'title' => 'Insert Data KRS - SIAKAD',

            'krs' => $this->KrsModel->getSemester($semester),

            'mk' => $this->KrsModel->getMk($semester),

            'validation' => \Config\Services::validation(),

        ];

        return view('view_mhs/vi_krs', $data);
    }

    public function my($email = true)
    {

        if(session('userData.role') != 'mhs')
        {
            return redirect()->to(base_url('/'));
        }

        $data = [
            //ini adalah title untuk halaman profile
            'title' => 'Halaman User Profile - SIAKAD',
            //ini untuk menampilkan data profile
            'profile'  => $this->ProfileModel->getProfile($email)

        ];

        /*if($data['profile'] === null){
            return view('errors/html/error_404');
            //echo "Maaf anda tidak bisa akses halaman ini";
        }*/

        return view('view_mhs/vi_my_profile', $data);
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

    public function hapus_mk($id_krs)
    {

        if(session('userData.role') != 'mhs')
        {
            return redirect()->to(base_url('/'));
        }

        $this->KrsModel->delete_mk($id_krs);
        session()->setFlashdata('success', 'Mata Kuliah berhasil di hapus!');
        return redirect()->to(base_url('mhs/krs/riwayat/'.session('userData.email')));
    }

    public function save_krs()
    {
        if ($this->request->getMethod() !=='post') {
             session()->setFlashdata('error','Access Not Allowed!');
            return redirect()->to(base_url('/mhs/home'));
        }

        if(session('userData.role') != 'mhs')
        {
            return redirect()->to(base_url('/'));
        }

        $validated = $this->validate([

            'kd_mk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Wajib Pilih!'
                ]
            ]
        ]);


        if($validated == FALSE)
        {

             $validation = \Config\Services::validation();
            
            return redirect()->to(base_url('/mhs/krs/isi/'))->withInput()->with('validation', '$validation');

        }else{
        
            $nama_mk     = $this->request->getPost('nama_mk', FILTER_SANITIZE_STRING);

            $email     = $this->request->getPost('email', FILTER_SANITIZE_STRING);

            $kd_mk     = $this->request->getPost('kd_mk', FILTER_SANITIZE_STRING);


            $data = [

                'mk_kuliah' => $nama_mk,

                'email' => $email,

                'kd_mk' => $kd_mk

            ];
     
            $simpan = $this->KrsModel->insertKrs($data);
     
            if($simpan){
                session()->setFlashdata('success', 'Berhasil nambah dan edit data');
                return redirect()->to('/mhs/krs/riwayat/'.$email);
                //echo "data berhasil di masukkan";
            }   else {
            die("Gagal menyimpan data");
        }
        }
    }

    public function riwayat($email = true)
    {

        if(session('userData.role') != 'mhs')
        {
            return redirect()->to(base_url('/'));
        }

        $data = [
            //ini adalah title untuk halaman profile
            'title' => 'Halaman Riwayat KRS - SIAKAD',
            //ini untuk menampilkan data profile
            'profile'  => $this->KrsModel->getRiwayat1($email)

        ];

        return view('view_mhs/vi_riwayat', $data);
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
