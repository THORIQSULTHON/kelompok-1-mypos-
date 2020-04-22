<section class="content-header">
<h1> Stock in 
    <small>Barang Masuk/ pembelian</small>

</h1>
<ol class="breadcrumb">
    <li><a href=""><i class="fa fa-user"></i></a></li>
    <li>Transaksi</li>
    <li class="active">Stok Masuk</li>
</ol>
</section>

<!-- Main Content -->
<Section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"> Tambah Stock </h3>
                <div class="pull-right">
                        <a href="<?=site_url('stock/in')?>" class="btn btn-warning btn-flat">
                                <i class="fa fa-arrow-circle-left"></i> Back
                        </a>
                </div>
            </div>

            <div class="box-body">
                    <div class="row">
                            <div class="col-md-4 col-md-offset-4">
                               
                                <form action="<?=site_url('stock/process')?>" method="post">
                                    <div class="form-group">
                                        <p>Tanda <b>*</b> Artinya Wajib Di isi</p>
                                        <label for="">Tanggal *</label>
                                        <input type="date" name="date" value="<?=date('Y-m-d')?>" class="form-control" required>
                                    </div>
                                    <div>
                                        <label for="barcode">Barcode *</label>
                                    </div>
                                    <div class="form-group input-group">
                                        <input type="hidden" name="item_id" id="item_id">
                                        <input type="text" name="barcode" id="barcode" class="form-control" required autofocus>
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nama barang *</label>
                                        <input type="text" name="item_name" id="item_name"  class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <label for="unit_name">Unit Barang</label>
                                                <input type="text" name="unit_name" id="unit_name" value="-" class="form-control" readonly>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="stock">stock awal</label>
                                                <input type="text" name="stock" id="stock" value="-" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Detail *</label>
                                        <input type="text" name="detail" class="form-control" placeholder="Kulakan / Tambahan / Dll" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Suppplier </label>
                                        <select name="supplier" id="" class="form-control">
                                            <option value="">- Pilih -</option>
                                            <?php foreach ($supplier as $i => $data){
                                                    echo'<option value="'.$data->supplier_id.'">'.$data->name.'</option>';
                                            }?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Qty *</label>
                                        <input type="number" name="qty" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" name="in_add" class="btn btn-success btn-flat"><i class="fa fa-paper-plane"></i> Simpan</button>
                                        <button type="reset" class="btn btn-flat"><i class="fa fa-undo"></i> Reset</button>
                                    </div>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
</Section>

<div class="modal fade" id="modal-item">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-tittle">Pilih Item Produk</h4>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Barcode</th>
                            <th>Name</th>
                            <th>Unit</th>
                            <th>Harga</th>
                            <th>Stock</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                                    <!-- membuat perulangan dari variable itemyang ada di Stock.php di folder Controller dan lalu di buat kondisi loopingnya -->
                    <?php foreach($item as $i => $data ) { ?>
                        <tr>
                                         <!-- barcode ini sesuai dengan field di database atau sesuai dengan query database -->
                            <td><?=$data->barcode?></td>
                            <td><?=$data->name?></td>
                                        <!-- unit name ini adalah alias dari name unit di file item_m.php di dalam folder model di baris code ke 11 -->
                            <td><?=$data->unit_name?></td>
                            <td class="text-right"><?=indo_currency($data->price)?></td>
                            <td class="text-right"><?=$data->stock?></td>
                            <td class="text-right">
                                <button class="btn btn-xs btn-info" id="select" 
                                data-id="<?=$data->item_id?>" 
                                data-barcode ="<?=$data->barcode?>" 
                                data-name="<?=$data->name?>" 
                                data-unit="<?=$data->unit_name?>" 
                                data-stock="<?=$data->stock?>">
                                    <i class="fa fa-check"></i> Pilih
                                </button>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $(document).on('click', '#select', function(){     
                        // tmengambil data('id') silahkan liat di bagian baris code 123 data-id. data itu di panggil setelah titik (.data) dan id itu di gunakan seletah data ('id') jika di gabung adalah data('id')
        var item_id = $(this).data('id');
    //barcode hanya pendefinisian variable aja 
        var barcode = $(this).data('barcode');
        var name = $(this).data('name');
        var unit_name = $(this).data('unit');
        var stock = $(this).data('stock');
        $('#item_id').val(item_id);
        $('#barcode').val(barcode);
        $('#item_name').val(name);
        $('#unit_name').val(unit_name);
        $('#stock').val(stock);
        $('#modal-item').modal('hide');
    })
})
</script>