<?php 

namespace App\Models\Mahasiswa;

use CodeIgniter\Model;

class KrsModel extends Model
{

	protected $table = 'krs';
	protected $primaryKey = 'id_krs';
	protected $allowedFields = ['nip', 'kd_mk', 'nim', 'semester'];
	protected $useTimestamps = false;

	public function insertKrs($data)
	{
		return $this->db->table($this->table)->insert($data);
	}

	public function getRuangKuliah()
	{
		return $this->db->table("ruang_kuliah")->countAll();
	}

	public function getMatakuliah()
	{
		return $this->db->table("mata_kuliah")->countAll();
	}

	public function getDosen()
	{
		return $this->db->table("dosen")->countAll();
	}

	public function getMahasiswa()
	{
		return $this->db->table("mahasiswa")->countAll();
	}

	public function getKrsku($email)
    {
        return $this->db->table($this->table)->where('email', $email)->get()->countAll();
    }

	public function getSemester($semester)
    {
        return $this->db->table('krs_admin')->where('semester', $semester)->get()->getRowArray();
    }

    public function getRiwayat($email)
    {
        return $this->db->table($this->table)->where('email', $email)->get()->getResultArray();
    }

    public function getRiwayat1($email)
    {
        return $this->db->table($this->table)->orderBy('id_krs','DESC')->where('email', $email)->get()->getResultArray();
    }

    public function getMk($semester)
    {
        return $this->db->table('mata_kuliah')->where('semester', $semester)->get()->getResultArray();
    }

	public function get_contact()
	{
		return $this->db->table($this->table)->get()->getRowArray();
	}

	public function insert_contact_to($data)
	{
		return $this->db->table($this->table)->insert($data);
	}

	public function delete_mk($id_krs)
    {
        return $this->db->table($this->table)->delete(array('id_krs' => $id_krs));
    }

	public function get_pages()
    {
        return $this->db->table('tbl_page')->get()->getResultArray();
    }
	/*public function delete_announce($id)
    {
        return $this->db->table($this->table)->delete(array('id' => $id));
    }
    public function getCountAnnounce()
	{
		//return $this->db->table('tiket')->where(array('email' => $email))->get()->countAll();
		return $this->db->table($this->table)->countAllResults();
	}*/
}	