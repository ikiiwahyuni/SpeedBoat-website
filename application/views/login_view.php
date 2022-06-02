<?php $this->load->view('header'); ?>
<br>
<div class="login">
    <div class="container">
        <div class="login-grids">
            <div class="col-md-6 log">
                <h1>Login</h1><br>
                <div class="strip"></div>
                <h2>Selamat Datang, Silahkan masuk</h2>
                <p>Jika belum punya akun, silahkan <a href="<?php echo base_url('daftar') ?>">Daftar</a></p>
                <?php echo $this->session->flashdata('msg'); ?>
                <form data-parsley-validate action="<?php echo base_url('login/aksi_login') ?>" method="post">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Email</label>
                        <input class="form-control" type="text" name="email" data-parsley-type="email" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input class="form-control" type="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-success btn-block" type="submit" value="Login">
                    </div>
                </form>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<?php $this->load->view('footer') ?>