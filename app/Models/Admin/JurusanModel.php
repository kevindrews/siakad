<?php 

namespace App\Models\Admin;

use CodeIgniter\Model;

class JurusanModel extends Model
{

	protected $table = 'jurusan';
	protected $primaryKey = 'kd_jurusan';
	protected $allowedFields = ['nama_jurusan', 'jenjang_pendidikan'];
	protected $useTimestamps = false;

	public function insertJurusan($data)
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
	public function delete_jurusan($kd_jurusan)
    {
        return $this->db->table($this->table)->delete(array('kd_jurusan' => $kd_jurusan));
    }

	public function edit_jurusan($kd_jurusan)
    {
        return $this->db->table($this->table)->where('kd_jurusan', $kd_jurusan)->get()->getRowArray();
    }

    public function update_ruang($data, $kd_jurusan)
    {
        return $this->db->table($this->table)->update($data, array('kd_jurusan' => $kd_jurusan));
    }

    public function search($keyword)
    {
        return $this->table($this->table)->like('nama_jurusan', $keyword);
    }
}	