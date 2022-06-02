<?php $this->load->view('admin/header') ?>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Data Tiket Sewa</h3>
        <div class="box-tools pull-right">
          <a href="<?php echo base_url('data_tiket/tambah')?>" class="btn btn-primary ">Tambah</a>
        </div>
      </div>
      <div class="box-body">
        <table id="example1" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Tiket</th>
              <th>Kategori</th>
              <th>Harga</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($tiket)):
                foreach ($tiket as $key => $p) {
                  $no = $key+1;
                  echo '<tr>';
                    echo '<td>'.$no.'</td>';
                    echo '<td>'.$p->nama_tiket.'</td>';
                    echo '<td>'.$p->nama_kategori.'</td>';
                    echo '<td>'.$this->all_model->format_harga($p->harga).'</td>';
                    echo '<td><a href="'.base_url('data_tiket/edit/'.$p->tiket_id).'"class="btn btn-info btn-xs">Edit</a>
                    <a href="'.base_url('data_tiket/hapus/'.$p->tiket_id).'" class="btn btn-danger btn-xs">Hapus</a>              
                    </td>';
                  echo '</tr>';
                } endif; ?>
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
