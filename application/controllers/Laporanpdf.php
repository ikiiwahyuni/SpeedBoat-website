<?php
class Laporanpdf extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->library('pdf');
  }
  public function proses($id)
  {
    ob_start();
    $data['transaksi'] = $this->all_model->get_transaksi(array('transaksi_id' => $id), 'transaksi');
    $pdf = new FPDF('l', 'mm', 'A5');
    // membuat halaman baru
    $pdf->AddPage();
    // setting jenis font yang akan digunakan
    $pdf->SetFont('Arial', 'B', 16);
    // mencetak string 
    $pdf->Cell(190, 7, 'TIKET Spead Boat', 0, 1, 'C');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(190, 7, 'PT. Anugrah Jala Chandra', 0, 1, 'C');

    // $this->session->userdata('email')

    // Memberikan space kebawah agar tidak terlalu rapat
    $pdf->Cell(10, 7, '', 0, 1);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(30, 7, 'Nama', 0, 0);
    $pdf->Cell(0, 7, ' : ' . $this->session->userdata('nama'), 0, 1);
    $pdf->Cell(30, 7, 'Email', 0, 0);
    $pdf->Cell(0, 7, ' : ' . $this->session->userdata('email'), 0, 1);
    $pdf->Cell(30, 7, 'No. HP', 0, 0);
    $pdf->Cell(0, 7, ' : ' . $this->session->userdata('notelp'), 0, 1);
    $pdf->Cell(30, 7, 'Alamat', 0, 0);
    $pdf->Cell(70, 7, ' : ' . $this->session->userdata('alamat'), 0, 1);
    $pdf->Cell(10, 7, '', 0, 1);
    $pdf->Cell(50, 6, 'TANGGAL & WAKTU', 1, 0);
    $pdf->Cell(50, 6, 'NAMA TIKET', 1, 0);
    $pdf->Cell(40, 6, 'JURUSAN', 1, 0);
    $pdf->Cell(40, 6, 'JUMLAH', 1, 1);
    $pdf->SetFont('Arial', '', 10);

    foreach ($data['transaksi'] as $row) {

      $pdf->Cell(50, 6, $this->all_model->format_tanggal($row->tanggal) . " " . $row->waktu, 1, 0);
      $pdf->Cell(50, 6, $row->nama_tiket, 1, 0);
      $pdf->Cell(40, 6, $row->nama_kategori, 1, 0);
      $pdf->Cell(40, 6, $row->jumlah . " Tiket", 1, 1);
    }

    $pdf->Output();
    ob_end_flush();
  }

  public function cetaktiket($id)
  {
    ob_start();
    $data['transaksi'] = $this->all_model->get_transaksi(array('transaksi_id' => $id), 'transaksi');
    $pdf = new FPDF('l', 'mm', 'A5');
    // membuat halaman baru
    $pdf->AddPage();
    // setting jenis font yang akan digunakan
    $pdf->SetFont('Arial', 'B', 16);
    // mencetak string 
    $pdf->Cell(190, 7, 'TIKET Spead Boat', 0, 1, 'C');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(190, 7, 'PT. Anugrah Jala Chandra', 0, 1, 'C');

    // $this->session->userdata('email')
    foreach ($data['transaksi'] as $row) {
      // Memberikan space kebawah agar tidak terlalu rapat
      $pdf->Cell(10, 7, '', 0, 1);
      $pdf->SetFont('Arial', 'B', 10);
      $pdf->Cell(30, 7, 'Nama', 0, 0);
      $pdf->Cell(0, 7, ' : ' . $row->nama_lengkap, 0, 1);
      $pdf->Cell(30, 7, 'Email', 0, 0);
      $pdf->Cell(0, 7, ' : ' . $row->email, 0, 1);
      $pdf->Cell(30, 7, 'No. HP', 0, 0);
      $pdf->Cell(0, 7, ' : ' . $row->notelp, 0, 1);
      $pdf->Cell(30, 7, 'Alamat', 0, 0);
      $pdf->Cell(70, 7, ' : ' . $row->alamat, 0, 1);
      $pdf->Cell(10, 7, '', 0, 1);
      $pdf->Cell(50, 6, 'TANGGAL & WAKTU', 1, 0);
      $pdf->Cell(50, 6, 'NAMA TIKET', 1, 0);
      $pdf->Cell(40, 6, 'JURUSAN', 1, 0);
      $pdf->Cell(40, 6, 'JUMLAH', 1, 1);
      $pdf->SetFont('Arial', '', 10);

      $pdf->Cell(50, 6, $this->all_model->format_tanggal($row->tanggal) . " " . $row->waktu, 1, 0);
      $pdf->Cell(50, 6, $row->nama_tiket, 1, 0);
      $pdf->Cell(40, 6, $row->nama_kategori, 1, 0);
      $pdf->Cell(40, 6, $row->jumlah . " Tiket", 1, 1);
    }

    $pdf->Output();
    ob_end_flush();
  }
}
