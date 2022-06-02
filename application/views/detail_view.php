<?php $this->load->view('header'); ?>
<br><br>
<section class="ftco-section ftco-no-pt ftco-no-pb bg-light">
  <div class="container">
    <div class="row no-gutters">
      <div class="col-md-6 p-md-5 img img-2 mt-5 mt-md-0" style="background-image: url(<?php echo base_url('upload/' . $detail[0]->gambar); ?>);">
      </div>
      <div class="col-md-6 wrap-about py-4 py-md-5 ftco-animate">
        <div class="heading-section">
          <div class="pl-md-5">
            <span class="subheading mb-2"><?php echo $this->all_model->format_harga($detail[0]->harga); ?></span>
            <h2><?php echo $detail[0]->nama_tiket; ?></h2>
          </div>
        </div>
        <div class="pl-md-5">
        <p class="text-danger"><?php echo $detail[0]->nama_kategori; ?></p>
          <p><?php echo $detail[0]->deskripsi; ?></p>
          <form class="" action="<?php echo base_url('sewa/simpan_sewa') ?>" method="post">
            <div class="form-group">
              <label for="tanggal">Tanggal Keberangkatan</label>
              <input type="hidden" name="tiket_id" value="<?php echo $detail[0]->tiket_id; ?>" required>
              <input class="form-control" type="hidden" name="nama_tiket" value="<?php echo $detail[0]->nama_tiket; ?>" required>
              <input class="form-control" type="hidden" id="txtFirstNo" value="<?php echo $detail[0]->harga; ?>" required>
              <input class="form-control" type="date" name="tanggal" class="form-control" required>
            </div> 
            <div class="form-group">
              <label for="pukul">Pukul Keberangkatan</label>
              <select class="form-control qnty-chrt" name="waktu" required>
                <option value="08.00 W.I.B">08.00 W.I.B</option>
                <option value="09.00 W.I.B">09.00 W.I.B</option>
                <option value="10.00 W.I.B">10.00 W.I.B</option>
                <option value="11.00 W.I.B">11.00 W.I.B</option>
                <option value="12.00 W.I.B">12.00 W.I.B</option>
                <option value="13.00 W.I.B">13.00 W.I.B</option>
                <option value="14.00 W.I.B">14.00 W.I.B</option>
                <option value="15.00 W.I.B">15.00 W.I.B</option>
                <option value="16.00 W.I.B">16.00 W.I.B</option>
                <option value="17.00 W.I.B">17.00 W.I.B</option>
              </select>
            </div>
            <div class="form-group">
              <label>Jenis Reservasi</label>
              <select class="form-control qnty-chrt" name="jenis" required>
                <option value="Transfer">Transfer</option>
                <option value="Reservasi">Reservasi</option>
              </select>
            </div>
            <div class="form-group">
              <label for="jumlah">Jumlah</label>
              <input class="form-control" id="txtSecondNo" type="text" name="jumlah" onkeypress='validate(event)' onkeyup="sum()" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="total">Total Harga</label>
              <input class="form-control" id="rupiah" name="harga" class="form-control" readonly required>
            </div>
            <div class="form-group">
              <label></label>
              <button type="submit" role="button" class="btn btn-success btn-block">Beli</button>
            </div>
          </form>
        </div>
        <div class="heading-section">
          <div class="pl-md-5">
            <p>Harap Menaati Protokol Kesehatan</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script type="text/javascript">
  function sum() {
    var txtFirstNo = document.getElementById('txtFirstNo').value;
    var txtSecondNo = document.getElementById('txtSecondNo').value;
    var result = parseInt(txtFirstNo) * parseInt(txtSecondNo);
    if (!isNaN(result)) {
      var rupiah = document.getElementById("rupiah").value = result;
    }
  }
  function validate(evt) {
		var theEvent = evt || window.event;

		// Handle paste
		if (theEvent.type === 'paste') {
			key = event.clipboardData.getData('text/plain');
		} else {
			// Handle key press
			var key = theEvent.keyCode || theEvent.which;
			key = String.fromCharCode(key);
		}
		var regex = /[0-9]|\./;
		if (!regex.test(key)) {
			theEvent.returnValue = false;
			if (theEvent.preventDefault) theEvent.preventDefault();
		}
	}
</script>
<?php $this->load->view('footer'); ?>