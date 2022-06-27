<?php 

namespace App\Models\Admin;

use CodeIgniter\Model;

class RuangModel extends Model
{

	protected $table = 'ruang_kuliah';
	protected $primaryKey = 'kd_ruang';
	protected $allowedFields = ['nama_ruang', 'kapasitas'];
	protected $useTimestamps = false;

	public function insertRuang($data)
	{
		return $this->db->table($this->table)->insert($data);
	}

	public function get_all_mk()
    {
        return $this->db->table($this->table)->get()->getResultArray();
    }

    public function get_all_kode_ruang()
    {
        return $this->db->table('ruang_kuliah')->get()->getResultArray();
    }
	public function delete_ruang($kd_ruang)
    {
        return $this->db->table($this->table)->delete(array('kd_ruang' => $kd_ruang));
    }

	public function edit_ruang_kuliah($kd_ruang)
    {
        return $this->db->table($this->table)->where('kd_ruang', $kd_ruang)->get()->getRowArray();
    }

    public function update_ruang($data, $kd_ruang)
    {
        return $this->db->table($this->table)->update($data, array('kd_ruang' => $kd_ruang));
    }

    public function search($keyword)
    {
        return $this->table($this->table)->like('nama_ruang', $keyword);
    }
}	