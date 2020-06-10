<section class="content-header">
<h1> Report penjualan 
    <small>Daftar Report penjualan</small>

</h1>
<ol class="breadcrumb">
    <li><a href=""><i class="fa fa-user"></i></a></li>
    <li class="active">report</li>
</ol>
</section>

<!-- Main Content -->
<Section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Daftar penjualan</h3>
            </div>

            <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Invoice</th>
                                <th>Tanggal</th>
                                <th>Customer</th>
                                <th>Total</th>
                                <th>Diskon</th>
                                <th>Grand Total</th>
                                <th>Actions</th>
                            </tr>    
                        </thead>
                        <tbody>
                            <?php   $no = 1;
                                    foreach($row->result() as $key => $data){?>
                        <tr>
                                <td style="width:5%;"><?=$no++?>.</td>
                                <td><?= $data->invoice?></td>
                                <td><?= indo_date($data->date)?></td>
                                <td><?= $data->customer_id == null ? "Umum" : $data->customer_name?></td>
                                <td><?= indo_currency($data->total_price)?></td>
                                <td><?= indo_currency($data->discount)?></td>
                                <td><?= indo_currency($data->final_price)?></td>
                                <td class="text-center" width="200px">
                                <button class="btn btn-default btn-xs">Detail</button>
                                <a href="<?=site_url('Sale/cetak/'. $data->sale_id)?>" target="_blank" class="btn btn-info btn-xs">
                                            <i class="fa fa-print"></i> Print
                                       </a>
                                       <a href="<?=site_url('Sale/del/'. $data->sale_id)?>" onclick="return confirm('apakah Anda Yakin Menghapus Data?')" class="btn btn-danger btn-xs">
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