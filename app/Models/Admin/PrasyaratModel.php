<?php 

namespace App\Models\Admin;

use CodeIgniter\Model;

class PrasyaratModel extends Model
{

	protected $table = 'prasyarat';
	protected $primaryKey = 'id_prasyarat';
	protected $allowedFields = ['mk_prasyarat', 'semester', 'jumlah_sks'];
	protected $useTimestamps = false;

	public function insertPrasyarat($data)
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
	public function delete_prasyarat($id_prasyarat)
    {
        return $this->db->table($this->table)->delete(array('id_prasyarat' => $id_prasyarat));
    }

	public function edit_mata_kuliah_prasyarat($id_prasyarat)
    {
        return $this->db->table($this->table)->where('id_prasyarat', $id_prasyarat)->get()->getRowArray();
    }

    public function updatePrasyarat($data, $id_prasyarat)
    {
        return $this->db->table($this->table)->update($data, array('id_prasyarat' => $id_prasyarat));
    }

    public function search($keyword)
    {
        return $this->table($this->table)->like('mk_prasyarat', $keyword);
    }
}	