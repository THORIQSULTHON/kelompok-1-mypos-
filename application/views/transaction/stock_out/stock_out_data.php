<section class="content-header">
<h1> Stock Keluar
    <small>Barang Keluar/ pembelian</small>

</h1>
<ol class="breadcrumb">
    <li><a href=""><i class="fa fa-user"></i></a></li>
    <li>Transaksi</li>
    <li class="active">Stok Keluar</li>
</ol>
</section>

<!-- Inti Content -->
<Section class="content">
        <?php $this->view('messages'); ?>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Riwayat Stock Keluar</h3>
                <div class="pull-right">
                        <a href="<?=site_url('stock/out/add')?>" class="btn btn-primary btn-flat">
                                <i class="fa fa-plus"></i> Tambah Stok Keluar
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
                                <th>Detail</th>
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
                                <!-- kalau name mengikuti variable dari dalam file stock_in_data.php yaitu item_name maka akan error undifined masalahnya belum tau mungkin akan di cari lain kali -->
                                <td><?= $data->name?></td>
                                <td class="text-right"><?= $data->qty?></td>
                                <td><?= $data->detail?></td>
                                <td class="text-center"><?= indo_date($data->date)?></td>  
                                <td class="text-center" width="160px">
                                       <a href="<?=site_url('stock/out/del/'. $data->stock_id.'/'.$data->item_id)?>" onclick="return confirm('apakah Anda Yakin Menghapus Data?')" class="btn btn-danger btn-xs">
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