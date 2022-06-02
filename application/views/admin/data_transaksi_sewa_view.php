<?php $this->load->view('admin/header') ?>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Data Transaksi Pembelian Tiket</h3>
      </div>
      <div class="box-body">
        <table id="example1" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama User</th>
              <th>Nama Tiket</th>
              <th>Kategori</th>
              <th>Tanggal</th>
              <th>Waktu</th>
              <th>Jumlah Tiket</th>
              <th>Biaya</th>
              <th>Pembayaran</th>
              <th>Bukti Pembayaran</th>
              <th>Status</th>
              <th>Setuju</th>
              <th>Tolak</th>
              <th>Cetak Tiket</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($transaksi)) :
              foreach ($transaksi as $key => $p) {
                $no = $key + 1;

                if ($p->jenis == 'Transfer') {
                  if ($p->status == '0') {
                    $status = '<label class="label label-default">Menunggu</label>';
                  } elseif ($p->status == '2') {
                    $status = '<label class="label label-warning">Di Tolak</label>';
                  } else {
                    $status = '<label class="label label-success">Disetujui</label>';
                  }
                  if (!empty($p->bukti)) {
                    if ($p->status == '0') {
                      $setuju = '<a href="' . base_url('data_transaksi_sewa/setuju/' . $p->transaksi_id . '/' . $p->tiket_id) . '" class="btn btn-info btn-xs">Setujui</a>';
                      $tolak = '<a href="' . base_url('data_transaksi_sewa/kembali/' . $p->transaksi_id . '/' . $p->tiket_id) . '" class="btn btn-danger btn-xs">Tolak</a>';
                    } else {
                      $setuju = "-";
                      $tolak = "-";
                    }
                  } else {
                    $setuju = "Belum Upload Bukti Pembayaran";
                    $tolak = "Belum Upload Bukti Pembayaran";
                  }
                } else {
                  if ($p->status == '0') {
                    $setuju = '<a href="' . base_url('data_transaksi_sewa/setuju/' . $p->transaksi_id . '/' . $p->tiket_id) . '" class="btn btn-info btn-xs">Datang</a>';
                    $tolak = '<a href="' . base_url('data_transaksi_sewa/kembali/' . $p->transaksi_id . '/' . $p->tiket_id) . '" class="btn btn-danger btn-xs">Tidak Datang</a>';
                  } else {
                    $setuju = "-";
                    $tolak = "-";
                  }
                  if ($p->status == '0') {
                    $status = '<label class="label label-default">Menunggu</label>';
                  } elseif ($p->status == '2') {
                    $status = '<label class="label label-warning">Tidak Datang</label>';
                  } else {
                    $status = '<label class="label label-success">Datang</label>';
                  }
                }

                echo '<tr>';
                echo '<td>' . $no . '</td>';
                echo '<td>' . $p->nama_lengkap . '</td>';
                echo '<td>' . $p->nama_tiket . '</td>';
                echo '<td>' . $p->nama_kategori . '</td>';
                echo '<td>' . $this->all_model->format_tanggal($p->tanggal) . '</td>';
                echo '<td>' . $p->waktu. '</td>';
                echo '<td>' . $p->jumlah . '</td>';
                echo '<td>' . $this->all_model->format_harga($p->harga) . '</td>';
                echo '<td>' . $p->jenis . '</td>';
                if ($p->jenis == 'Transfer') {
                  if (!empty($p->bukti)) {
                    echo '<td><img src="' . base_url('upload/' . $p->bukti) . '" width="100" alt=""><br><br><a target="_blank" href="' . base_url('upload/' . $p->bukti) . '" class="btn btn-primary btn-block text-center">Lihat</a></td>';
                  } else {
                    echo '<td>Belum Upload Bukti Pembayaran</td>';
                  }
                } else {
                  echo '<td>-</td>';
                }
                echo '<td>' . $status . '</td>';
                echo '<td>' . $setuju . '</td>';
                echo '<td>' . $tolak . '</td>';
                if ($p->status == '1') {
                  echo '<td><a href="' . base_url('laporanpdf/cetaktiket/' . $p->transaksi_id) . '" class="label label-primary">Cetak Tiket</a></td>';
                } else {
                  echo '<td>-</td>';
                }
                echo '</tr>';
              }
            endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $('#example1').DataTable();
</script>
<?php $this->load->view('admin/footer') ?>