<?php 

namespace App\Models\Mahasiswa;

use CodeIgniter\Model;

class ProfileModel extends Model
{

    protected $table = 'mahasiswa';

    protected $primaryKey = 'nim';

    protected $allowedFields = ['kd_jurusan', 'kd_ruang', 'nip', 'nama_mahasiswa', 'jenis_kelamin', 'angkatan','alamat','email'];

    protected $useTimestamps = true;


    public function getProfile($email = null)
    {
        return $this->db->table($this->table)->where('email', $email)->get()->getRowArray();
    }

    public function insertData($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

   public function getJurusan()
    {
        return $this->db->table('jurusan')->get()->getResultArray();
    }

    public function getDosen()
    {
        return $this->db->table('dosen')->get()->getResultArray();
    }

    public function getRuang()
    {
        return $this->db->table('ruang_kuliah')->get()->getResultArray();
    }

    public function getThread($username)
    {
        return $this->db->table('tbl_thread')->orderBy('created_at','DESC')->where('created_by', $username)->get()->getResultArray();
    }

    public function getPodcast($username)
    {
        return $this->db->table('tbl_podcast')->orderBy('created_at','DESC')->where('created_by', $username)->get()->getResultArray();
    }

    public function getVideos($username)
    {
        return $this->db->table('tbl_videos')->orderBy('created_at','DESC')->where('created_by', $username)->get()->getResultArray();
    }


     public function getRandomPeople()
    {
        //return $this->db->table('artikel')->get(4, 7)->getResultArray();
             $this->table($this->table);
             $this->orderBy('id','RANDOM');
             $this->limit(7);
             $ok = $this->get();
             return $ok->getResultArray();
    }

    public function getRandomPodcast()
    {
        //return $this->db->table('artikel')->get(4, 7)->getResultArray();
             $this->table('tbl_podcast');
             $this->orderBy('id','RANDOM');
             $this->limit(7);
             $ok = $this->get();
             return $ok->getResultArray();
    }


    public function getData($username = false)
    {
        if($username === false){
             $this->table($this->table);
             $ok = $this->get();
             return $ok->getResultArray();

            } else {
            return $this->table($this->table)
                        ->where('username', $username)
                        ->get()
                        ->getRowArray();
        }
    }

    public function editThread($id_thread)
    {
        return $this->db->table('tbl_thread')->where('id_thread', $id_thread)->get()->getRowArray();
    }

    public function updateThread($data, $id_thread)
    {
        return $this->db->table('tbl_thread')->update($data, array('id_thread' => $id_thread));
    }

    public function deleteThread($id_thread)
    {
        return $this->db->table('tbl_thread')->delete(array('id_thread' => $id_thread));
    }

    public function deleteAllComment($id_thread)
    {
        return $this->db->table('tbl_reply')->delete(array('id_thread' => $id_thread));
    }


    /*Ini podcast*/

    public function editPodcast($id_podcast)
    {
        return $this->db->table('tbl_podcast')->where('id_podcast', $id_podcast)->get()->getRowArray();
    }

    public function deletePodcast($id_podcast)
    {
        return $this->db->table('tbl_podcast')->delete(array('id_podcast' => $id_podcast));
    }

    public function updatePodcast($data, $id_podcast)
    {
        return $this->db->table('tbl_podcast')->update($data, array('id_podcast' => $id_podcast));
    }

    /*Ini videos*/

    public function editVideos($uuid)
    {
        return $this->db->table('tbl_videos')->where('uuid', $uuid)->get()->getRowArray();
    }

    public function deleteVideos($uuid)
    {
        return $this->db->table('tbl_videos')->delete(array('uuid' => $uuid));
    }

    public function updateVideos($data, $uuid)
    {
        return $this->db->table('tbl_videos')->update($data, array('uuid' => $uuid));
    }

}
