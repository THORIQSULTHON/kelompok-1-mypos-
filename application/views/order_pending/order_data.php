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
                                    // $quer = $this->db->query("SELECT * FROM transaksi")->result_array();
                                    foreach($row as $data){
                                        $ids = $data['id_transaksi'];?>
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

                                <button  class="btn btn-danger btn-xs" disabled>
                                            <i class="fa fa-times-circle"></i> Tolak
                                       </button>
                                       <button data-target="#modalAcc<?=$ids;?>" data-toggle="modal" class="btn btn-success btn-xs">
                                            <i class="fa fa-check"></i> Terima
                                       </button>
                                </td>
                        </tr>  

                            <?php }?>

                        </tbody>
                    </table>
                </div>
            </div>
</Section>

<?php 

    $qy    = $this->db->query("SELECT * FROM transaksi")->result_array();
    foreach($qy as $data) :
        $id = $data['id_transaksi'];
        $qy    = $this->db->query("SELECT * FROM transaksi WHERE id_transaksi = '$id'")->result_array();
?>
    <!-- Modal upload sekaligus input no rek -->
    <div class="modal fade" id="modalAcc<?=$id;?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                            <h4 class="modal-tittle">Apakah data transaksi dari id <b><?=$id;?></b> Menurut anda valid?</h4>
                    </div>
                <form action="<?=base_url('Order/process');?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="norek"></label>
                            <input type="text" class="form-control" name="idr" id="idr" value="<?=$id;?>">
                    </div>
                <div class="modal-footer">
                        <button class="btn btn-default" data-dismiss="modal">Tidak</button>
                        <button class="btn btn-success" name="acc_tombol" type="submit">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php
    endforeach;
?>