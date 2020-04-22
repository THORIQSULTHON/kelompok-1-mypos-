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
        <?php $this->view('messages'); ?>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Riwayat Stock Masuk</h3>
                <div class="pull-right">
                        <a href="<?=site_url('stock/in/add')?>" class="btn btn-primary btn-flat">
                                <i class="fa fa-plus"></i> Tambah Stok Masuk
                        </a>
                </div>
            </div>

            <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Barcode</th>
                                <th>Nama Produk</th>
                                <th>Qty</th>
                                <th>Tanggal</th>
                                <th>Actions</th>
                            </tr>    
                        </thead>
                        <tbody>
                        <?php $no = 1;
                        foreach($row as $key => $data){?>
                        <tr>
                                <td style="width:5%;"><?=$no++?>.</td>
                                <td><?= $data->barcode?></td>
                                <td><?= $data->item_name?></td>
                                <td class="text-right"><?= $data->qty?></td>
                                <td class="text-center"><?= indo_date($data->date)?></td>  
                                <td class="text-center" width="160px">

                                <a id="set_dtl" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal-detail"
                                data-barcode="<?=$data->barcode?>"
                                data-itemname="<?=$data->item_name?>"
                                data-detail="<?=$data->detail?>"
                                data-suppliername="<?=$data->supplier_name?>"
                                data-qty="<?=$data->qty?>"
                                data-date="<?= indo_date($data->date)?>">
                                            <i class="fa fa-eye"></i> Detail
                                       </a>
                                       <a href="<?=site_url('stock/in/del/'. $data->stock_id.'/'.$data->item_id)?>" onclick="return confirm('apakah Anda Yakin Menghapus Data?')" class="btn btn-danger btn-xs">
                                            <i class="fa fa-trash"></i> Hapus
                                       </a>
                                </td>
                        </tr>  

                            <?php }?>
                    
                        </tbody>
                    </table>
                </div>
            </div>
</Section>

<div class="modal fade" id="modal-detail">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-tittle">Stock Detail</h4>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered no-margin">
                            <tbody>
                                <tr>
                                    <th style="width:30%">Barcode</th>
                                    <td><span id="barcode"></span></td>
                                </tr>
                                <tr>
                                    <th style="">Nama Item</th>
                                    <td><span id="item_name"></span></td>
                                </tr>
                                <tr>
                                    <th style="">Detail Pembelian</th>
                                    <td><span id="detail"></span></td>
                                </tr>
                                <tr>
                                    <th style="">Nama Supplier</th>
                                    <td><span id="supplier_name"></span></td>
                                </tr>
                                <tr>
                                    <th style="">Qty</th>
                                    <td><span id="qty"></span></td>
                                </tr>
                                <tr>
                                    <th style="">Tanggal</th>
                                    <td><span id="date"></span></td>
                                </tr>
                            </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $(document).on('click', '#set_dtl', function(){
        // variable barcode di ambil dari id span di baris ke 85
        var barcode = $(this).data('barcode');
        var itemname = $(this).data('itemname');
        var detail = $(this).data('detail');
        var suppliername = $(this).data('suppliername');
        var qty = $(this).data('qty');
        var date = $(this).data('date');
                    // pertama val di ganti text karna kita menggunakan tampil bukan inputan, baru kalau inputan kita beri val.('namavaluue')
        $('#barcode').text(barcode);
        $('#item_name').text(itemname);
        $('#detail').text(detail);
        $('#supplier_name').text(suppliername);
        $('#qty').text(qty);
        $('#date').text(date);
        $('#detail').text(detail);
    })
})
</script>