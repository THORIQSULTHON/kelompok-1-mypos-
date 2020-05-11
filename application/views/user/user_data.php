<section class="content-header">
<h1> Supplier 
    <small>Daftar Pemasok barang</small>

</h1>
<ol class="breadcrumb">
    <li><a href=""><i class="fa fa-user"></i></a></li>
    <li class="active">Supplier</li>
</ol>
</section>

<!-- Main Content -->
<Section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Daftar Pengguna</h3>
                <div class="pull-right">
                        <a href="<?=site_url('user/add')?>" class="btn btn-primary btn-flat">
                                <i class="fa fa-user-plus"></i> Buat
                        </a>
                </div>
            </div>

            <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped" id="table1">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Username</th>
                                <th scope="col">Name</th>
                                <th scope="col">Address</th>
                                <th scope="col">Level</th>
                                <th scope="col">Actions</th>
                            </tr>    
                        </thead>
                        <tbody>
                            <?php   $no = 1;
                                    foreach($row->result() as $key => $data){?>
                        <tr>
                                <td style="width:5%;"><?=$no++?>.</td>
                                <td><?= $data->username?></td>
                                <td><?= $data->name?></td>
                                <td><?= $data->address?></td>
                                <td><?= $data->level == 1 ? "Admin" : "Kasir"?></td>
                                <td class="text-center" width="160px">
                                <form action="<?= site_url('user/del/')?>" method="post">
                                       <a href="<?=site_url('user/edit/'. $data->user_id)?>" class="btn btn-warning btn-xs">
                                            <i class="fa fa-pencil"></i> Edit
                                       </a>
                                            <input name="user_id" type="hidden" value="<?= $data->user_id?>">
                                                <button onclick="return confirm('apakah anda yakin?')" class="btn btn-danger btn-xs">
                                                    <i class="fa fa-trash"></i> Hapus
                                                </button>
                                        </form>
                                </td>
                        </tr>  

                            <?php }?>

                        </tbody>
                    </table>
                </div>
            </div>
</Section>