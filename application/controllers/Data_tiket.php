<?php

/**
 *
 */
class Data_tiket extends CI_Controller
{

  public function __construct()   {
    parent::__construct();
    if (empty($this->session->userdata('is_login'))) {
      echo '<script>alert("Anda Harus Login Terlebih Dahulu");window.location.href="'.base_url('login').'"</script>';
    }
  }

  public function index() {
    $data['tiket'] = $this->all_model->get_tiket(array(), 'tiket');
    $this->load->view('admin/data_tiket_view', $data);
  }

  public function edit($id) {
    $data['kategori'] = $this->all_model->get_where(array(), 'kategori');
    $data['tiket'] = $this->all_model->get_tiket(array('tiket_id'=>$id), 'tiket');
    $this->load->view('admin/edit_tiket_view', $data);
  }

  public function tambah() {
    $data['kategori'] = $this->all_model->get_where(array(), 'kategori');
    $this->load->view('admin/tambah_tiket_view', $data);
  }

  public function hapus($id) {
    $hapus = $this->all_model->delete(array('tiket_id'=>$id), 'tiket');
    if ($hapus) {
      redirect('data_tiket');
    }
  }

  public function simpan() {
    $nama_tiket = $this->input->post('nama_tiket');
    $kategori = $this->input->post('kategori');
    $harga = $this->input->post('harga');
    $deskripsi = $this->input->post('deskripsi');
    if (!empty($_FILES)) {
      $config['upload_path']          = getcwd().'/upload/';
      $config['allowed_types']        = 'gif|jpg|png|jpeg';
      $config['max_size']             = 5024;
      // $config['max_width']            = 1024;
      // $config['max_height']           = 768;
      $config['encrypt_name']         = true;
      $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('gambar')) {
          $error = array('error' => $this->upload->display_errors());
          print_r($error);
        } else {
          $data = array('upload_data' => $this->upload->data());
          $filename = $data['upload_data']['file_name'];
          $data_update = array(
            'kategori_id' => $kategori,
            'nama_tiket' => $nama_tiket,
            'harga'       => $harga,
            'deskripsi'   => $deskripsi,
            'gambar'      => $filename,
          );
          $simpan = $this->all_model->insert($data_update, 'tiket');
          if ($simpan) {
            redirect('data_tiket');
          }
        }
    }else {
      $data_update = array(
        'kategori_id' => $kategori,
        'nama_tiket' => $nama_tiket,
        'harga'       => $harga,
        'deskripsi'   => $deskripsi,
      );
      $simpan = $this->all_model->insert($data_update, 'tiket');
      if ($simpan) {
        redirect('data_tiket');
      }
    }
  }

  public function simpan_edit() {
    $tiket_id = $this->input->post('tiket_id');
    $nama_tiket = $this->input->post('nama_tiket');
    $kategori = $this->input->post('kategori');
    $harga = $this->input->post('harga');
    $deskripsi = $this->input->post('deskripsi');

    if (!empty($_FILES)) {
      $config['upload_path']          = getcwd().'/upload/';
      $config['allowed_types']        = 'gif|jpg|png';
      $config['max_size']             = 1024;
      // $config['max_width']            = 1024;
      // $config['max_height']           = 768;
      $config['encrypt_name']         = true;
      $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('gambar')) {
          $error = array('error' => $this->upload->display_errors());
          print_r($error);
        } else {
          $data = array('upload_data' => $this->upload->data());
          $filename = $data['upload_data']['file_name'];
          $data_update = array(
            'kategori_id' => $kategori,
            'nama_tiket' => $nama_tiket,
            'harga'       => $harga,
            'deskripsi'   => $deskripsi,
            'gambar'      => $filename,
          );
          $simpan = $this->all_model->update(array('tiket_id'=>$tiket_id),$data_update, 'tiket');
          if ($simpan) {
            redirect('data_tiket');
          }
        }
    }else {
      $data_update = array(
        'kategori_id' => $kategori,
        'nama_tiket' => $nama_tiket,
        'harga'       => $harga,
        'deskripsi'   => $deskripsi,
      );
      $simpan = $this->all_model->update(array('tiket_id'=>$tiket_id),$data_update, 'tiket');
      if ($simpan) {
        redirect('data_tiket');
      }
    }
  }

}

 ?>
