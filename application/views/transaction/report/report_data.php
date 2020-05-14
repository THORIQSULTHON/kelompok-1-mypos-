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
                                <td><?=$data->invoice;?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="text-center" width="160px">

                                <!-- <a href="<?=site_url('supplier/edit/'. $data->supplier_id)?>" class="btn btn-warning btn-xs"> -->
                                            <i class="fa fa-pencil"></i> Edit
                                       </a>
                                       <!-- <a href="<?=site_url('supplier/del/'. $data->supplier_id)?>" onclick="return confirm('apakah Anda Yakin Menghapus Data?')" class="btn btn-danger btn-xs">
                                            <i class="fa fa-trash"></i> Hapus
                                       </a> -->
                                                                                        <!-- di dalam onlcik di buat code jQuery, yang di dalam kurung pertama mempunyai 2 pparameter Yaitu id "modalDelete" pada baris ke 69, dan para meter ke 2 adalah memanggil id "formDelete" pada baris ke 79 -->
                                                                                        <!-- Setelah itu di beri atribute"attr" di beri 2 parameter parameter pertama adalah berupa action pada baris ke 80, dan parameter ke 2 adalah sebagai isi dari form action di baris ke 80 tersebut -->
                                       <!-- <a href="#modalDelete" data-toggle="modal" onclick="$('#modalDelete #formDelete').attr('action', '')" class="btn btn-danger btn-xs">
                                            <i class="fa fa-trash"></i> Hapus
                                        </a> -->
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
<div class="modal fade" id="modalDelete">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-tittle">Yakin Anda Ingin Menghapus Data ini?</h4>
            </div>
            <div class="modal-footer">
                <form action="" id="formDelete" method="post">
                    <button class="btn btn-default" data-dismiss="modal">Tidak</button>
                    <button class="btn btn-danger" type="submit">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>