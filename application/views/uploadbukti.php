<?php $this->load->view('header') ?>
<br><br>
<div class="container">
  <form data-parsley-validate class="col-sm-12" action="<?php echo base_url('uploadbukti/simpan_bukti') ?>" method="post" enctype="multipart/form-data">
    <legend>Upload Bukti Pembayaran</legend>
    <p class="text-primary">Silahkan Melakukan Pembayaran Ke Bank Mandiri 1234567890 (A.N : PT. Anugrah Jala Chandra)</p>
    <?php echo $this->session->flashdata('msg'); ?>
    <div class="form-group">
		    <label>Bukti Transfer :</label>
          <input class="form-control" type="hidden" name="transaksi_id" value="<?php echo $transaksi[0]->transaksi_id?>" >
          <input type="file" name="gambar" accept="image/*" required>
		  </div>
    <div class="form-group">
      <label></label>
      <button type="submit" class="btn btn-success btn-lg">Simpan</button>
    </div>
  </form>
      </tbody>
    </table>
  </div> 
</div>
<br><br><br><br><br><br><br><br><br><br><br>
<?php $this->load->view('footer') ?>
<script type="text/javascript">
  $('#basic-addon2').mousedown(function() {
    $('#pswd').attr('type', 'text');
  });
  $('#basic-addon2').mouseup(function() {
    $('#pswd').attr('type', 'password');
  });
</script>