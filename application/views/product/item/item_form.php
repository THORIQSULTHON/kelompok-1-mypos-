<section class="content-header">
<h1> Barang 
    <small>Daftar barang</small>

</h1>
<ol class="breadcrumb">
    <li><a href=""><i class="fa fa-user"></i></a></li>
    <li class="active">Daftar Barang</li>
</ol>
</section>

<!-- Main Content -->
<Section class="content">
<?php $this->view('messages'); ?>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?=ucfirst($page)?> Kategori</h3>
                <div class="pull-right">
                        <a href="<?=site_url('item')?>" class="btn btn-warning btn-flat">
                                <i class="fa fa-arrow-circle-left"></i> Back
                        </a>
                </div>
            </div>

            <div class="box-body">
                    <div class="row">
                            <div class="col-md-4 col-md-offset-4">
                               <?= form_open_multipart('item/process')?>
                                    <div class="form-group">
                                    <input type="hidden" name="id" value="<?=$row->item_id?>">
                                        <p>Tanda <b>*</b> Artinya Wajib Di isi</p>
                                        <label for="">Barcode *</label>
                                        <input type="text" name="barcode" value="<?= $row->barcode?>" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="product_name">Nama Produk *</label>
                                        <input type="text" name="product_name"id="product_name" value="<?= $row->name?>" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="price1">Kategori Barang *</label>
                                        <select name="category" class="form-control" required>
                                                <option value="">- Pilih -</option>
                                                <?php foreach ($category->result() as $key => $data) {?>
                                                    <option value="<?=$data->category_id?>" <?=$data->category_id == $row->category_id ? "selected" : null?>><?=$data->name?></option>
                                                <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="price1">Unit barang *</label>
                                        <?php echo form_dropdown('unit', $unit, $selectedunit, 
                                        ['class' => 'form-control', 'required' => 'required']) ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="price1">Harga *</label>
                                        <input type="number" name="price" id="price1" value="<?= $row->price?>" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="price1">Gambar/Foto Barang</label>
                                            <?php if($page == 'edit'){
                                                    if($row->image != null) {?>
                                                            <div style="margin-bottom:5px">
                                                            <img src=" <?= base_url ('uploads/product/'.$row->image)?>" alt="" style="width:80%">
                                                            </div>
                                                   <?php }
                                                }?>
                                        <input type="file" name="image" id="price1" class="form-control" >
                                        <small>(Biarkan Kosong jika tidak ingin <?= $page == 'edit' ? 'Mengganti gambarnya' : 'Menambahkan gambarnya'?>)</small>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="<?= $page ?>" class="btn btn-success btn-flat"><i class="fa fa-paper-plane"></i> Simpan</button>
                                        <button type="reset" class="btn btn-flat"><i class="fa fa-undo"></i> Reset</button>
                                    </div>
                                <?= form_close() ?>
                            </div>
                    </div>
                </div>
            </div>
</Section>