<section class="content-header">
<h1> Pelanggan 
    <small>Daftar Pelanggan</small>

</h1>
<ol class="breadcrumb">
    <li><a href=""><i class="fa fa-user"></i></a></li>
    <li class="active">Pelanggan</li>
</ol>
</section>

<!-- Main Content -->
<Section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?=ucfirst($page)?> Pelanggan</h3>
                <div class="pull-right">
                        <a href="<?=site_url('customer')?>" class="btn btn-warning btn-flat">
                                <i class="fa fa-arrow-circle-left"></i> Back
                        </a>
                </div>
            </div>

            <div class="box-body">
                    <div class="row">
                            <div class="col-md-4 col-md-offset-4">
                               
                                <form action="<?=site_url('customer/process')?>" method="post">
                                    <div class="form-group">
                                    <input type="hidden" name="id" value="<?=$row->customer_id?>">
                                        <p>Tanda <b>*</b> Artinya Wajib Di isi</p>
                                        <label for="">Nama customer *</label>
                                        <input type="text" name="customer_name" value="<?= $row->name?>" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Jenis Kelamin</label>
                                       <select name="gender" class="form-control" required>
                                                <option value="">- Pilih -</option>
                                                <option value="L"<?= $row->gender == 'L' ? 'selected' : null?>>Laki-Laki</option>
                                                <option value="P"<?= $row->gender == 'P' ? 'selected' : null?>>Perempuan</option>
                                       </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nomor Hp customer *</label>
                                        <input type="number" name="phone" value="<?=$row->phone?>" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email *</label>
                                        <input type="text" name="email" value="<?=$row->email_db?>" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Password *</label>
                                        <input type="password" name="pass" value="<?=$row->password_db?>" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Alamat customer *</label>
                                        <textarea name="addr" value="" class="form-control" required><?=$row->address?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="<?= $page ?>" class="btn btn-success btn-flat"><i class="fa fa-paper-plane"></i> Simpan</button>
                                        <button type="reset" class="btn btn-flat"><i class="fa fa-undo"></i> Reset</button>
                                    </div>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
</Section>