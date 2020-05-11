<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login Apobase | By Kelompok 1</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?= base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/dist/css/AdminLTE.min.css">
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">

    <div class="login-box">
        <div class="login-logo">
        <a href="">Apo<b>BASE</b> by Kelompok 1</a>
        </div>
    <div class="login-box-body">
        <p class="login-box-msg">Register</p>

    <form action="<?= site_url('auth/registrasi')?>" method="post">
                <p>Tanda <b>*</b> Artinya Wajib Di isi</p>
                <div class="form-group <?= form_error('customer_name') ? 'has-error' : null?>">
                    <label for="">Nama customer *</label>
                    <input type="text" name="customer_name" value="<?= set_value('customer_name') ?>" class="form-control" required>
                    <?= form_error('customer_name')?>
                </div>
            <div class="form-group">
                <label for="">Jenis Kelamin</label>
                <select name="gender" class="form-control" >
                        <option value="">- Pilih -</option>
                        <option value="L">Laki-Laki</option>
                        <option value="P">Perempuan</option>
                </select>
            </div>
            <div class="form-group" <?= form_error('phone') ? 'has-error' : null?>>
                <label for="">Nomor Hp customer *</label>
                <input type="number" name="phone" value="<?= set_value('phone') ?>"  class="form-control" required>
                <?= form_error('phone')?>
            </div>
            <div class="form-group" <?= form_error('email') ? 'has-error' : null?>>
                <label for="">Email *</label>
                <input type="email" name="email" value="<?= set_value('email') ?>"  class="form-control" required>
                <?= form_error('email')?>
            </div>
            <div class="form-group" <?= form_error('pass') ? 'has-error' : null?>>
                <label for="">Password *</label>
                <input type="password" name="pass"  class="form-control">
                <?= form_error('pass')?>
            </div>
            <div class="form-group" <?= form_error('pass1') ? 'has-error' : null?>>
                <label for="">Konfirmasi Password *</label>
                <input type="password" name="pass1"  class="form-control">
                <?= form_error('pass1')?>
            </div>
            <div class="form-group">
                <label for="">Alamat customer </label>
                <textarea name="addr" value="<?= set_value('addr') ?>" class="form-control"></textarea>
            </div>
            <div class="form-group">
            <button type="submit"  class="btn btn-success btn-flat"><i class="fa fa-paper-plane"></i> Registrasi</button>
        </div>
    </form>
    </div>
    </div>

<!-- jQuery 3 -->
<script src="<?= base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?= base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?= base_url()?>assets/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
