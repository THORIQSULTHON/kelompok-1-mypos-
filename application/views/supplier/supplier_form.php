<section class="content-header">
<h1> Supplier 
    <small>Daftar Pemasok barang</small>

</h1>
<ol class="breadcrumb">
    <li><a href=""><i class="fa fa-user"></i></a></li>
    <li class="active">Supplier</li>
</ol>
</section>

<!-- Main Content -->
<Section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?=ucfirst($page)?> Supplier</h3>
                <div class="pull-right">
                        <a href="<?=site_url('supplier')?>" class="btn btn-warning btn-flat">
                                <i class="fa fa-arrow-circle-left"></i> Back
                        </a>
                </div>
            </div>

            <div class="box-body">
                    <div class="row">
                            <div class="col-md-4 col-md-offset-4">
                               
                                <form action="<?=site_url('supplier/process')?>" method="post">
                                    <div class="form-group">
                                    <input type="hidden" name="id" value="<?=$row->supplier_id?>">
                                        <p>Tanda <b>*</b> Artinya Wajib Di isi</p>
                                        <label for="">Nama Supplier *</label>
                                        <input type="text" name="supplier_name" value="<?= $row->name?>" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nomor Hp Supplier *</label>
                                        <input type="number" name="phone" value="<?=$row->phone?>" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Alamat Supplier *</label>
                                        <textarea name="addr" value="" class="form-control" required><?=$row->address?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Deskripsi</label>
                                        <textarea name="desc" value="" class="form-control" ><?=$row->description?></textarea>
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