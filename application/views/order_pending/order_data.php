<section class="content-header">
<h1> Kategori 
    <small>Daftar Pemasok barang</small>

</h1>
<ol class="breadcrumb">
    <li><a href=""><i class="fa fa-user"></i></a></li>
    <li class="active">Kategori Barang</li>
</ol>
</section>

<!-- Main Content -->
<Section class="content">
        <?php $this->view('messages'); ?>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Daftar Kategori</h3>
                <div class="pull-right">
                        <a href="<?=site_url('category/add')?>" class="btn btn-primary btn-flat">
                                <i class="fa fa-plus"></i> Buat
                        </a>
                </div>
            </div>

            <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Transaksi</th>
                                <th>Penangan</th>
                                <th>Pembeli</th>
                                <th>Total barang</th>
                                <th>Total Tagihan</th>
                                <th>Bukti Transfer</th>
                                <th>No Rekening</th>
                                <th>Actions</th>
                            </tr>    
                        </thead>
                        <tbody>
                            <?php   $no = 1;
                                    $quer = $this->db->query("SELECT * FROM transaksi")->result_array();
                                    foreach($quer as $key => $data){?>
                        <tr>
                                <td style="width:5%;"><?=$no++?>.</td>
                                <td><?= $data['id_transaksi'];?></td>
                                <td><?= $data['user_id'];?></td>
                                <td><?= $data['customer_id'];?></td>
                                <td><?= indo_currency($data['total_harga']);?></td>
                                <td><?= indo_currency($data['total_final']);?></td>
                                <td>
                                <?php if($data['bukti_transfer'] != null) :?>
                                    <img style="width:100px; height: 100px;" src="<?=base_url('uploads/bukti/'. $data['bukti_transfer']);?>">
                                <?php else :  ?>
                                    belum mengirim bukti transfer 
                                <?php endif; ?>
                                </td>
                                <td><?= $data['no_rek'];?></td>
                                <td class="text-center" width="160px">

                                <a href="<?=base_url('Category/edit/'. $data['user_id']);?>" class="btn btn-danger btn-xs">
                                            <i class="fa fa-times-circle"></i> Tolak
                                       </a>
                                       <a href="<?=base_url('category/del/'. $data['user_id']);?>" onclick="return confirm('apakah Anda Yakin Menghapus Data?')" class="btn btn-success btn-xs">
                                            <i class="fa fa-check"></i> Terima
                                       </a>
                                </td>
                        </tr>  

                            <?php }?>

                        </tbody>
                    </table>
                </div>
            </div>
</Section>