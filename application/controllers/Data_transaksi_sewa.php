<?php

/**
 *
 */
class Data_transaksi_sewa extends CI_Controller {

  public function __construct() {
    parent::__construct();
  }

  public function index() {
    $data['transaksi'] = $this->all_model->get_transaksi_sewa(array());
    $this->load->view('admin/data_transaksi_sewa_view', $data);
  }

  public function setuju($idt, $idp) {
    $transaksi = $this->all_model->get_transaksi_sewa(array('transaksi.transaksi_id'=>$idt));
    $tiket    = $this->all_model->get_transaksi_sewa(array('tiket.tiket_id'=>$idp));
    if ($this->all_model->update(array('transaksi_id'=>$idt), array('status'=>'1'), 'transaksi')) {
      redirect('data_transaksi_sewa');
    }
  }

  public function kembali($idt, $idp) {
    $transaksi = $this->all_model->get_transaksi_sewa(array('transaksi.transaksi_id'=>$idt));
    $tiket    = $this->all_model->get_transaksi_sewa(array('tiket.tiket_id'=>$idp));
    if ($this->all_model->update(array('transaksi_id'=>$idt), array('status'=>'2'), 'transaksi')) {
      redirect('data_transaksi_sewa');
    }
  }
}

 ?>
