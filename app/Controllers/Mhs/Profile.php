<?php 

namespace App\Controllers\Mhs;

use App\Controllers\BaseController;

use Config\Services;

use App\Models\Mahasiswa\ProfileModel;

use App\Models\Mahasiswa\KrsModel;

class Profile extends BaseController
{
    protected $session;

    //protect adminmodel
    protected $ProfileModel;

    protected $KrsModel;

    protected $config;

    public function __construct()
    {
         // start session
        $this->session = Services::session();

        // load auth settings
        $this->config = config('Auth');

        // load model object
        $this->ProfileModel = new ProfileModel();

        $this->KrsModel = new KrsModel();

        helper(['form', 'text']);

    }


    public function p($email = false)
    {

        if(session('userData.role') != 'mhs')
        {
            return redirect()->to(base_url('/'));
        }

        $data = [
            //ini adalah title untuk halaman profile
            'title' => 'Halaman User Profile - SIAKAD',
            //ini untuk menampilkan data profile
            'profile'  => $this->ProfileModel->getProfile($email),

            'jurusan'  => $this->ProfileModel->getJurusan(),

            'ruang'  => $this->ProfileModel->getRuang(),

            'dosen'  => $this->ProfileModel->getDosen(),

            'validation' => \Config\Services::validation(),

        ];

        /*if($data['profile']['email'] == $email){
            return view('errors/html/error_profile');
            //echo "Maaf anda tidak bisa akses halaman ini";
        }*/

        //dd($data['profile']['email']);

        return view('view_mhs/vi_profile', $data);
    }

    public function my($email = false)
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

    public function save_data()
    {
        if ($this->request->getMethod() !=='post') {
             session()->setFlashdata('error','Access Not Allowed!');
            return redirect()->to(base_url('/mhs/profile/p/'.session('userData.email')));
        }

        if(session('userData.role') != 'mhs')
        {
            return redirect()->to(base_url('/'));
        }

        $validated = $this->validate([

            'nim' => [
                'rules' => 'required|max_length[300]|is_unique[mahasiswa.nim]',
                'errors' => [
                    'required' => 'Wajib diisi',
                    'max_length' => 'NIM Mahasiswa tidak boleh lebih dari 300',
                    'is_unique' => 'NIM mahasiswa tidak boleh ada yang sama'
                ]
            ],
            'nama_mahasiswa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Mahasiswa wajib diisi'
                ]
            ],
             'jenis_kelamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis Kelamin wajib diisi',
                   
                ]
            ],

             'angkatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Angkatan wajib diisi',
                   
                ]
            ],
             'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat wajib diisi',
                   
                ]
            ],
             'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Email wajib diisi',
                   
                ]
            ]
        ]);


        if($validated == FALSE)
        {

             $validation = \Config\Services::validation();
            
            return redirect()->to(base_url('/mhs/profile/p/'.session('userData.email')))->withInput()->with('validation', '$validation');

        }else{
        
            $nim      = $this->request->getPost('nim', FILTER_SANITIZE_STRING);

            $kd_jurusan   = nl2br($this->request->getPost('kd_jurusan', FILTER_SANITIZE_STRING));

            $kd_ruang = $this->request->getPost('kd_ruang', FILTER_SANITIZE_STRING);

            $nip = $this->request->getPost('nip', FILTER_SANITIZE_STRING);

            $nama_mahasiswa = $this->request->getPost('nama_mahasiswa', FILTER_SANITIZE_STRING);

            $jenis_kelamin = $this->request->getPost('jenis_kelamin', FILTER_SANITIZE_STRING);

            $angkatan = $this->request->getPost('angkatan', FILTER_SANITIZE_STRING);

            $alamat = $this->request->getPost('alamat', FILTER_SANITIZE_STRING);

            $email = $this->request->getPost('email', FILTER_SANITIZE_STRING);


            $data = [
                'nim' => $nim,

                'kd_jurusan'     => $kd_jurusan, 

                'kd_ruang'    => $kd_ruang,

                'nip' => $nip,

                'nama_mahasiswa' => $nama_mahasiswa, 

                'jenis_kelamin' => $jenis_kelamin, 

                'angkatan' => $angkatan, 

                'alamat' => $alamat, 

                'email' => $email, 

            ];
     
            $simpan = $this->ProfileModel->insertData($data);
     
            if($simpan){
                session()->setFlashdata('success', 'Berhasil nambah dan edit data');
                return redirect()->to('/mhs/profile/'.session('userData.email'));
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
