<?php

/**
 *
 */
class All_model extends CI_model {

  public $table = "transaksi";
  
  public function __construct() {
    parent::__construct();
  }

  public function ambil_satu($syarat)
	{
		$this->db->where($syarat);
		return $this->db->get($this->table)->row();
  }
  
  public function format_tanggal($tgl) {
    $y    = date('Y', strtotime($tgl));
    $d    = date('d', strtotime($tgl));
    $dt_m = date('m', strtotime($tgl));
    $m    = $this->month($dt_m);
		$date = $d.' '.$m.' '.$y;
    return $date;
  }

  public function month($dt) {
		$array = array(
			'01'=>'Januari',
			'02'=>'Febuari',
			'03'=>'Maret',
			'04'=>'April',
			'05'=>'Mei',
			'06'=>'Juni',
			'07'=>'Juli',
			'08'=>'Agustus',
			'09'=>'September',
			'10'=>'Oktober',
			'11'=>'November',
			'12'=>'Desember',
		);
		return $array[$dt];
	}


  public function format_harga($harga) {
    $new = number_format($harga, 0, '.','.');
    return 'Rp. '.$new;
  }

  public function get_laporan_sewa($tgl1, $tgl2) {
    $this->db->from('transaksi');
    $this->db->join('tiket', 'transaksi.tiket_id = tiket.tiket_id', 'LEFT');
    $this->db->join('kategori', 'tiket.kategori_id = kategori.kategori_id', 'LEFT');
    $this->db->join('users', 'users.user_id = transaksi.user_id', 'LEFT');
    if (!empty($tgl1)) {
      $this->db->where('DATE(transaksi.created_on) BETWEEN "'.$tgl1.'" AND "'.$tgl2.'"');
    }
    return $this->db->get()->result();
  }



  public function get_where($where = array(), $table) {
    $this->db->from($table);
    $this->db->where($where);
    return $this->db->get()->result();
  }

  public function get_dimana($where = array(), $table) {
    $this->db->from($table);
    $this->db->where($where);
    return $this->db->get()->row();

  }

  public function get_tiket($where = array()) {
    $this->db->from('tiket');
    $this->db->join('kategori', 'tiket.kategori_id = kategori.kategori_id', 'LEFT');
    $this->db->where($where);
    return $this->db->get()->result();
  }

  public function get_tiket_limit($where = array()) {
    $this->db->from('tiket');
    $this->db->join('kategori', 'tiket.kategori_id = kategori.kategori_id', 'LEFT');
    $this->db->where($where);
    // $this->db->limit(6);
    return $this->db->get()->result();
  }

  public function get_transaksi_sewa($where) {
    $this->db->from('transaksi');
    $this->db->join('tiket', 'transaksi.tiket_id = tiket.tiket_id', 'LEFT');
    $this->db->join('kategori', 'tiket.kategori_id = kategori.kategori_id', 'LEFT');
    $this->db->join('users', 'users.user_id = transaksi.user_id', 'LEFT');
    $this->db->where($where);
      return $this->db->get()->result();
  }


  public function insert($data, $table) {
    return $this->db->insert($table, $data);
  }

  public function delete($where, $table) {
    $this->db->where($where);
    return $this->db->delete($table);
  }

  public function update($where, $data, $table) {
    $this->db->where($where);
    return $this->db->update($table, $data);
  }

  public function get_transaksi($where = array()) {
    $this->db->from('transaksi');
    $this->db->join('tiket', 'transaksi.tiket_id = tiket.tiket_id', 'LEFT');
    $this->db->join('kategori', 'tiket.kategori_id = kategori.kategori_id', 'LEFT');
    $this->db->join('users', 'users.user_id = transaksi.user_id', 'LEFT');
    $this->db->where($where);
    return $this->db->get()->result();
  }

  

}

 ?>
