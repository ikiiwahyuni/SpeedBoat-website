<?php

class Home extends CI_Controller {

  public function __construct() {
    parent::__construct();
  }

  public function index() {
    $data['tiket'] = $this->all_model->get_tiket_limit(array(), 'tiket');
    $this->load->view('home_view', $data);
  }


}

 ?>
