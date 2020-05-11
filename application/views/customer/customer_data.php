<section class="content-header">
<h1> Pelanggan 
    <small>Daftar Pelanggan</small>

</h1>
<ol class="breadcrumb">
    <li><a href=""><i class="fa fa-user"></i></a></li>
    <li class="active">Pelanggan</li>
</ol>
</section>

<!-- Main Content -->
<Section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Daftar customer</h3>
                <div class="pull-right">
                        <a href="<?=site_url('customer/add')?>" class="btn btn-primary btn-flat">
                                <i class="fa fa-plus"></i> Buat
                        </a>
                </div>
            </div>

            <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama customer</th>
                                <th>Jenis Kelamin</th>
                                <th>NoHP</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th>Actions</th>
                            </tr>    
                        </thead>
                        <tbody>
                            <?php   $no = 1;
                                    foreach($row->result() as $key => $data){?>
                        <tr>
                                <td style="width:5%;"><?=$no++?>.</td>
                                <td><?= $data->name?></td>
                                <td><?= $data->gender?></td>
                                <td><?= $data->phone?></td>
                                <td><?= $data->email_db?></td>
                                <td><?= $data->address?></td>
                                <td class="text-center" width="160px">

                                <a href="<?=site_url('customer/edit/'. $data->customer_id)?>" class="btn btn-warning btn-xs">
                                            <i class="fa fa-pencil"></i> Edit
                                       </a>
                                       <a href="<?=site_url('customer/del/'. $data->customer_id)?>" onclick="return confirm('apakah Anda Yakin Menghapus Data?')" class="btn btn-danger btn-xs">
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