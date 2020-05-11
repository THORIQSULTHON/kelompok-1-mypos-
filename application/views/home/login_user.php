
    <div class="login-box">
        <div class="login-logo">
        </div>
    <div class="login-box-body">
        <p class="login-box-msg">Login Untuk Memulai Aktifitas Anda</p>

    <form action="<?= site_url('Auth_user/proses')?>" method="post">
        <div class="form-group has-feedback">
            <input type="text" name="username" class="form-control" placeholder="Username" require autofocus>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="Password" require>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
            <div class="col-xs-8">
                <div class="col-xs-6">
                    <button type="submit" name="login_user" class="btn btn-primary btn-block btn-flat mt-3">Login</button>
                </div>
        <!-- /.col -->
            </div>
            <!-- <a href="#">Lupa Password!</a> -->
            <p class="ml-5 mt-2">Tidak memiliki akun? silahkan <a href="<?= base_url('Auth/registrasi');?>">Registrasi!</a></p>
    </form>
    </div>
    </div>


