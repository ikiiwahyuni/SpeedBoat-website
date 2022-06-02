<?php $this->load->view('header') ?>
<br>
<div class="head-bread">
  <div class="container">
    <?php echo $this->session->flashdata('msg'); ?>
  </div>
</div>
<div class="container">
  <div class="row">


    <div class="col-md-12">
      <legend>Data Sewa</legend>
      <p class="text-primary">Silahkan Melakukan Pembayaran Ke Bank Mandiri 1234567890 (A.N : PT. Anugrah Jala Chandra)</p>
      <table class="table table-hover table-responsive">
        <?php if (!empty($transaksi_sewa)) :
          date_default_timezone_set('Asia/Jakarta');
        ?>
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Tiket</th>
              <th>Kategori</th>
              <th>Waktu</th>
              <th>Tanggal</th>
              <th>Jumlah Tiket</th>
              <th>Biaya</th>
              <th>Pembayaran</th>
              <th>Bukti Bayar</th>
              <th>Status</th>
              <th>Upload Bukti Pembayaran</th>
              <th>Waktu Batas Bayar</th>
            </tr>
          </thead>
          <tbody>
          <?php
          foreach ($transaksi_sewa as $key => $p) {
            $currentTime = $p->waktubooking;
            $hoursToAdd = 2;
            $secondsToAdd = $hoursToAdd * (60 * 60);
            $newTime = $currentTime + $secondsToAdd;

            $no = $key + 1;
            if ($p->status == '0') {
              $status = '<label class="label label-default">Menunggu</label>';
            } elseif ($p->status == '2') {
              $status = '<label class="label label-warning">Ditolak</label>';
            } else {
              $status = '<label class="label label-success">Disetujui</label>';
            }
            echo '<tr>';
            echo '<td>' . $no . '</td>';
            echo '<td>' . $p->nama_tiket . '</td>';
            echo '<td>' . $p->nama_kategori . '</td>';
            echo '<td>' . $p->waktu . '</td>';
            echo '<td>' . $this->all_model->format_tanggal($p->tanggal) . '</td>';
            echo '<td>' . $p->jumlah . '</td>';
            echo '<td>' . $this->all_model->format_harga($p->totalharga) . '</td>';
            echo '<td>' . $p->jenis . '</td>';
            // echo '<td>' . $p->bukti . '</td>';
            if ($p->jenis == 'Transfer') {
              if ($p->status == '0') {
                if (time() - $p->waktubooking < (7200)) {
                  $aksi = '<a href="' . base_url('uploadbukti/edit/' . $p->transaksi_id) . '" class="label label-success"">Upload Bukti Pembayaran
                  </a><br><br><p></p>';
                } else {
                  $aksi = '<p>Pembayaran Kadaluarsa</p>';
                  $status = '<label class="label label-warning">Ditolak</label>';
                }
              } elseif ($p->status == '2') {
                $aksi = '-';
              } else {
                $aksi = '<a href="' . base_url('laporanpdf/proses/' . $p->transaksi_id) . '" class="label label-success">Cetak Tiket</a>';
              }

              if (!empty($p->bukti)) {
                echo '<td><img src="' . base_url('upload/' . $p->bukti) . '" width="100" alt=""></td>';
              } else {
                echo '<td>Belum Upload Bukti Pembayaran</td>';
              }
            } else {
              $aksi = '<p>-</p>';
              $status = '<label class="label label-warning">-</label>';
              echo '<td>Harap Datang 1 Jam Sebelum Keberangkatan</td>';
            }

            echo '<td>' . $status . '</td>';
            echo '<td>' . $aksi . '</td>';
            if ($p->jenis == 'Transfer') {
              if ($p->waktubooking != '') {
                echo '<td>' . date("d/m/y H:i", $newTime) . ' W.I.B' . '</td>';
                echo '</tr>';
              }
            } else {
              echo '<td>-</td>';
            }
          }
        endif; ?>
          </tbody>
      </table>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <form data-parsley-validate action="<?php echo base_url('akun/simpan') ?>" method="post">
        <legend>Data Diri</legend>
        <div class="form-group">
          <label>Nama</label>
          <input type="hidden" name="user_id" value="<?php echo $this->session->userdata('user_id') ?>">
          <input type="text" name="nama" value="<?php echo $this->session->userdata('nama') ?>" class="form-control" required>
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="email" name="email" data-parsley-type="email" value="<?php echo $this->session->userdata('email') ?>" class="form-control" required>
        </div>
        <div class="form-group">
          <label>No Telp</label>
          <input type="text" name="notelp" data-parsley-type="number" value="<?php echo $this->session->userdata('notelp') ?>" class="form-control" required>
        </div>
        <div class="form-group">
          <label>Alamat</label>
          <textarea name="alamat" class="form-control" required><?php echo $this->session->userdata('alamat') ?></textarea>
        </div>
        <div class="form-group">
          <label>Password</label>
          <div class="input-group">
            <input id="pswd" type="password" name="password" value="<?php echo $this->session->userdata('password') ?>" class="form-control" required>
            <span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-eye-open"></span></span>
          </div>
        </div>
        <div class="form-group">
          <label></label>
          <button type="submit" class="btn btn-success btn-block">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

</div>
<?php $this->load->view('footer') ?>

<script type="text/javascript">
  $('#basic-addon2').mousedown(function() {
    $('#pswd').attr('type', 'text');
  });
  $('#basic-addon2').mouseup(function() {
    $('#pswd').attr('type', 'password');
  });
</script>