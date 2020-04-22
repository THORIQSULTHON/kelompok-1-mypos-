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
                                <th>Nama category</th>
                                <th>Actions</th>
                            </tr>    
                        </thead>
                        <tbody>
                            <?php   $no = 1;
                                    foreach($row->result() as $key => $data){?>
                        <tr>
                                <td style="width:5%;"><?=$no++?>.</td>
                                <td><?= $data->name?></td>
                                <td class="text-center" width="160px">

                                <a href="<?=site_url('category/edit/'. $data->category_id)?>" class="btn btn-warning btn-xs">
                                            <i class="fa fa-pencil"></i> Edit
                                       </a>
                                       <a href="<?=site_url('category/del/'. $data->category_id)?>" onclick="return confirm('apakah Anda Yakin Menghapus Data?')" class="btn btn-danger btn-xs">
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