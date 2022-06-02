<?php

/**
 *
 */
class Sewa extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if (empty($this->session->userdata('is_login'))) {
      echo '<script>alert("Anda Harus Login Terlebih Dahulu");window.location.href="' . base_url('login') . '"</script>';
    }
  }

  public function index()
  {
    $this->load->view('sewa_view');
  }


  public function simpan_sewa()
  {
    date_default_timezone_set('Asia/Jakarta');
      $data_simpan = array(
        'user_id'    => $this->session->userdata('user_id'),
        'tiket_id'  => $this->input->post('tiket_id'),
        'tanggal'       => $this->input->post('tanggal'),
        'waktu'     => $this->input->post('waktu'),
        'jenis'     => $this->input->post('jenis'),
        'jumlah'     => $this->input->post('jumlah'),
        'totalharga'      => $this->input->post('harga'),
        'waktubooking' => time()
      );
      $this->all_model->insert($data_simpan, 'transaksi');
      redirect('akun');
  }

  public function tutup()
  {
    $this->cart->destroy();
    $this->session->set_flashdata('msg', '<div class="alert alert-success">Anda Berhasil Membeli Tiket, Silahkan lanjutkan melakukan Pembayaran</div>');
    redirect('akun');
  }
}
