<?php $this->load->view('header'); ?>
<style media="screen">
  div textarea {
    border: none;
    border: 1px solid #e6e6e6;
    margin-top: 20px;
    width: 50%;
    padding: 15px;
    font-weight: 100;
    font-family: sans-serif;
    color: #747779;
    resize: none;
    height: 200px;
    outline: none;
  }
</style>
<div class="head-bread">
</div>
<div class="reg-form">
  <div class="container">
    <div class="reg">
      <h1>Daftar</h1>
      <br>
      <h2>Selamat datang, silahkan melakukan pendaftaran.</h2>
      <br>
      <p>Jika anda sudah punya akun, silahkan <a href="<?php echo base_url('login') ?>">Login</a></p>
      <?php echo $this->session->flashdata('msg'); ?>
      <form data-parsley-validate action="<?php echo base_url('daftar/simpan') ?>" method="post">
        <div class="form-group">
          <label for="exampleInputPassword1">Nama Lengkap</label>
          <input class="form-control" type="text" name="nama" required>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">No Telp</label>
          <input class="form-control" type="number" name="notelp" required>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Alamat</label>
          <input class="form-control" type="text" name="alamat" required>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Email</label>
          <input class="form-control" type="email" name="email" required>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input class="form-control" type="password" name="password" required>
        </div>
        <input class="btn btn-success btn-block" type="submit" value="Daftar">
      </form>
    </div>
  </div>
</div>
<?php $this->load->view('footer'); ?>