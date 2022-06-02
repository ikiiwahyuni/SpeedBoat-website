<?php

/**
 *
 */
class Tiket extends CI_Controller {

  public function __construct() {
    parent::__construct();
    if (empty($this->session->userdata('is_login'))) {
      echo '<script>alert("Anda Harus Login Terlebih Dahulu");window.location.href="'.base_url('login').'"</script>';
    }
  }

  public function index() {
    $data['tiket'] = $this->all_model->get_tiket(array());
    $this->load->view('tiket_view', $data);
  }

  public function detail($id = null) {
    $data['detail'] = $this->all_model->get_tiket(array('tiket_id'=>$id));
    $this->load->view('detail_view', $data);
  }

  public function kategori($kat = null) {
    $where = (!empty($kat)) ? array('tiket.kategori_id'=>$kat) : array();
    $data['tiket'] = $this->all_model->get_tiket($where);
    $this->load->view('tiket_view', $data);
  }

}

 ?>
