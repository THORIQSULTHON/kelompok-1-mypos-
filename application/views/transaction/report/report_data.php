<section class="content-header">
<h1> Report 
    <small>Daftar Pemasok barang</small>

</h1>
<ol class="breadcrumb">
    <li><a href=""><i class="fa fa-user"></i></a></li>
    <li class="active">Report</li>
</ol>
</section>

<!-- Main Content -->
<Section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Daftar Report</h3>
                <div class="pull-right">
                        <!-- <a href="<?=site_url('Report/add')?>" class="btn btn-primary btn-flat">
                                <i class="fa fa-plus"></i> Buat
                        </a> -->
                </div>
            </div>

            <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>KOde Transaksi</th>
                                <th>Pembeli</th>
                                <th>Kasir</th>
                                <th>Total Harga</th>
                                <th>Tanggal Transaksi</th>
                                <th>Actions</th>
                            </tr>    
                        </thead>
                        <tbody>
                            <?php   $no = 1;
                                    foreach($row->result() as $key => $data){?>
                        <tr>
                                <td style="width:5%;"><?=$no++?>.</td>
                                <td><?=$data->id_transaksi;?></td>
                                <td><?=$data->user_id;?></td>
                                <td><?=$data->total_final;?></td>
                                <td><?= $data->tgl_kirim;?></td>
                                <td class="text-center" width="160px">

                                <a id="set_dtl" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal-detail"
                                data-idtrans="<?=$data->id_transaksi;?>"
                                data-user="<?=$data->user_id;?>"
                                data-total="<?=$data->total_final;?>"
                                data-tgl="<?=$data->tgl_transaksi;?>">
                                            <i class="fa fa-book"></i> Lihat
                                       </a>
                                       
                                    </td>
                                </tr>  
                            <!-- <?php }?> -->

                        </tbody>
                    </table>
                </div>
            </div>
</Section>
 
<!-- method ini adalah method alert dari bootstrap -->

<!-- membuat class fade seperti ini dan di beri id "modalDelete" setelah itu id ini akan di pangil di href tombol delete -->
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
                                    <th style="width:30%">Kode Transaksi</th>
                                    <td><span id="idt"></span></td>
                                </tr>
                                <tr>
                                    <th style="">Kasir</th>
                                    <td><span id="kasir"></span></td>
                                </tr>
                                <tr>
                                    <th style="">Total</th>
                                    <td><span id="detail"></span></td>
                                </tr>
                                <tr>
                                    <th style="">Tanggal Transaksi</th>
                                    <td><span id="tgl"></span></td>
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
        var idtrans = $(this).data('idtrans');
        var user = $(this).data('user');
        var total = $(this).data('total');
        var tgl = $(this).data('tgl');
                    // pertama val di ganti text karna kita menggunakan tampil bukan inputan, baru kalau inputan kita beri val.('namavaluue')
        $('#idt').text(idtrans);
        $('#kasir').text(user);
        $('#detail').text(total);
        $('#tgl').text(tgl);
    })
})
</script>