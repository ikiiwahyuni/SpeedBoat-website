<?php $this->load->view('admin/header') ?>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Edit Tiket</h3>
      </div>
      <div class="box-body">
        <form data-parsley-validate action="<?php echo base_url('data_tiket/simpan_edit')?>" method="post" enctype="multipart/form-data">
          <div class="col-sm-6">
            <div class="form-group">
              <label>Nama Tiket</label>
              <input class="form-control" type="hidden" name="tiket_id" value="<?php echo (!empty($tiket[0]->tiket_id)) ? $tiket[0]->tiket_id : ''?>" >
              <input class="form-control" type="text" name="nama_tiket" value="<?php echo (!empty($tiket[0]->nama_tiket)) ? $tiket[0]->nama_tiket : ''?>" required>
            </div>
            <div class="form-group">
              <label>Kategori</label>
              <select class="form-control" name="kategori" required>
                <option value="" selected>Pilih Kategori</option>
                <?php foreach ($kategori as $key => $k):
                  $kid = (!empty($tiket[0]->kategori_id)) ? $tiket[0]->kategori_id : '';
                  if ($kid == $k->kategori_id) {
                    echo '<option value="'.$kid.'" selected>'.$k->nama_kategori.'</option>';
                  }else {
                    echo '<option value="'.$k->kategori_id.'">'.$k->nama_kategori.'</option>';
                  }
                 endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label>Harga</label>
              <input class="form-control" type="text" name="harga" data-parsley-type="number" value="<?php echo (!empty($tiket[0]->harga)) ? $tiket[0]->harga : ''?>" required>
            </div>
            <div class="form-group">
              <label>Deskripsi</label>
              <textarea class="form-control" type="text" name="deskripsi" required><?php echo (!empty($tiket[0]->deskripsi)) ? $tiket[0]->deskripsi : ''?></textarea>
            </div>
            <div class="form-group">
              <label></label>
              <button class="btn btn-info" type="submit">Simpan</button>
              <a class="btn btn-default" href="<?php echo base_url('data_tiket')?>">Kembali</a>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="form-group">
              <label>Gambar</label>
              <input type="file" name="gambar" accept="image/*" required><br>
              <?php if (!empty($tiket[0]->gambar)): ?>
                <img src="<?php echo base_url('upload/'.$tiket[0]->gambar);?>" width="100" alt="">
              <?php endif; ?>
            </div>
          </div>


        </form>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('admin/footer') ?>
