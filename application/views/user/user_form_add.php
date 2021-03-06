<section class="content-header">
<h1> User 
    <small>Daftar Pengguna</small>

</h1>
<ol class="breadcrumb">
    <li><a href=""><i class="fa fa-user"></i></a></li>
    <li class="active">User</li>
</ol>
</section>

<!-- Main Content -->
<Section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Tambah Pengguna</h3>
                <div class="pull-right">
                        <a href="<?=site_url('user')?>" class="btn btn-warning btn-flat">
                                <i class="fa fa-arrow-circle-left"></i> Back
                        </a>
                </div>
            </div>

            <div class="box-body">
                    <div class="row">
                            <div class="col-md-4 col-md-offset-4">
                               
                                <form action="" method="post">
                                    <div class="form-group <?= form_error('fullname') ? 'has-error' : null?>">
                                        <p>Tanda <b>*</b> Artinya Wajib Di isi</p>
                                        <label for="">Nama *</label>
                                        <input type="text" name="fullname" value="<?= set_value('fullname') ?>" class="form-control">
                                        <?= form_error('fullname')?>
                                    </div>
                                    <div class="form-group <?= form_error('username') ? 'has-error' : null?>">
                                        <label for="">Username *</label>
                                        <input type="text" name="username" value="<?= set_value('username') ?>" class="form-control">
                                        <?= form_error('username')?>
                                    </div>
                                    <div class="form-group <?= form_error('password') ? 'has-error' : null?>">
                                        <label for="">Passwrod *</label>
                                        <input type="password" name="password" value="<?= set_value('password') ?>" class="form-control">
                                        <?= form_error('password')?>
                                    </div>
                                    <div class="form-group <?= form_error('passconf') ? 'has-error' : null?>">
                                        <label for="">Konfirmasi Password *</label>
                                        <input type="password" name="passconf" value="<?= set_value('passconf') ?>" class="form-control">
                                        <?= form_error('passconf')?>
                                    </div>
                                    <div class="form-group <?= form_error('address') ? 'has-error' : null?>">
                                        <label for="">Alamat</label>
                                        <textarea type="text" name="address" class="form-control"><?= set_value('address') ?></textarea>
                                    </div>
                                    <div class="form-group <?= form_error('level') ? 'has-error' : null?>">
                                        <label for="">Level *</label>
                                        <select name="level" class="form-control">
                                            <option value="">- Pilih -</option>
                                            <option value="1"<?= set_value('level') == 1 ? "selected": null?>>Admin</option>
                                            <option value="2"<?= set_value('level') == 2 ? "selected": null?>>Kasir</option>
                                        </select>
                                        <?= form_error('level')?>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-paper-plane"></i> Simpan</button>
                                        <button type="reset" class="btn btn-flat"><i class="fa fa-undo"></i> Reset</button>
                                    </div>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
</Section>