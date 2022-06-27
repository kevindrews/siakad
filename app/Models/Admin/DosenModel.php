<?php 

namespace App\Models\Admin;

use CodeIgniter\Model;

class DosenModel extends Model
{

	protected $table = 'dosen';
	protected $primaryKey = 'nip';
	protected $allowedFields = ['nip','nama_dosen', 'jenis_kelamin', 'alamat', 'email'];
	protected $useTimestamps = false;

	public function insertDosen($data)
	{
		return $this->db->table($this->table)->insert($data);
	}

	public function get_all_dosen()
    {
        return $this->db->table($this->table)->get()->getResultArray();
    }

    public function get_all_kode_ruang()
    {
        return $this->db->table('ruang_kuliah')->get()->getResultArray();
    }

    public function get_all_prasyarat()
    {
        return $this->db->table('prasyarat')->get()->getResultArray();
    }

	public function delete_dosen($nip)
    {
        return $this->db->table($this->table)->delete(array('nip' => $nip));
    }

	public function edit_dosen($nip)
    {
        return $this->db->table($this->table)->where('nip', $nip)->get()->getRowArray();
    }

    public function updateDosen($data, $nip)
    {
        return $this->db->table($this->table)->update($data, array('nip' => $nip));
    }

    public function search($keyword)
    {
        return $this->table($this->table)->like('nama_mk', $keyword);
    }
}	