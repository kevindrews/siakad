<?php 

namespace App\Models\Admin;

use CodeIgniter\Model;

class MkModel extends Model
{

	protected $table = 'mata_kuliah';
	protected $primaryKey = 'kd_mk';
	protected $allowedFields = ['kd_mk','kd_ruang', 'nama_mk', 'semester', 'jumlah_sks', 'prasyarat'];
	protected $useTimestamps = false;

	public function insertMk($data)
	{
		return $this->db->table($this->table)->insert($data);
	}

	/*public function get_mata_kuliah()
	{
		return $this->db->table($this->table)->get()->getRowArray();
	}

	public function insert_contact_to($data)
	{
		return $this->db->table($this->table)->insert($data);
	}
*/
	public function get_all_mk()
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

	public function delete_mk($kd_mk)
    {
        return $this->db->table($this->table)->delete(array('kd_mk' => $kd_mk));
    }

	public function edit_mata_kuliah($kd_mk)
    {
        return $this->db->table($this->table)->where('kd_mk', $kd_mk)->get()->getRowArray();
    }

    public function updateThread($data, $kd_mk)
    {
        return $this->db->table($this->table)->update($data, array('kd_mk' => $kd_mk));
    }

    public function search($keyword)
    {
        return $this->table($this->table)->like('nama_mk', $keyword);
    }
}	