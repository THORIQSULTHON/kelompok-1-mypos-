<section class="content-header">
<h1> Barang 
    <small>Daftar barang</small>

</h1>
<ol class="breadcrumb">
    <li><a href=""><i class="fa fa-user"></i></a></li>
    <li class="active">Daftar Barang</li>
</ol>
</section>

<!-- Main Content -->
<Section class="content">
        <?php $this->view('messages'); ?>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Daftar Barang</h3>
                <div class="pull-right">
                        <a href="<?=site_url('item/add')?>" class="btn btn-primary btn-flat">
                                <i class="fa fa-plus"></i>  Tambah Data Barang
                        </a>
                </div>
            </div>

            <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Barcode</th>
                                <th>Nama item</th>
                                <th>Kategori Barang</th>
                                <th>Unit</th>
                                <th>Harga Barang</th>
                                <th>Berat</th>
                                <th>Stock</th>
                                <td><b>Gambar Barang</b></td>
                                <th>Actions</th>
                            </tr>    
                        </thead>
                        <tbody>
                            <?php   $no = 1;
                                    foreach($row->result() as $key => $data){?>
                        <tr>
                                <td style="width:5%;"><?=$no++?>.</td>
                                <td>
                                    <?= $data->barcode?> <br> <br>
                                    <a href="<?=site_url('item/barcode_qrcode/'. $data->item_id)?>" class="bg-navy active color-palette btn btn-warning btn-xs ">
                                      Cetak <i class="fa fa-barcode"></i>
                                       </a>
                                </td>
                                <td><?= $data->name?></td>
                                <td><?= $data->category_name?></td>
                                <td><?= $data->unit_name?></td>
                                <td><?= $data->price?></td>
                                <td><?= $data->berat?></td>
                                <td><?= $data->stock?></td>
                                <td>
                                <?php if($data->image != null) { ?>
                                    <img src=" <?= base_url ('uploads/product/'.$data->image)?>" alt="" style="width:100px">   
                                <?php } ?>
                                </td>
                                <td class="text-center" width="160px">

                                <a href="<?=site_url('item/edit/'. $data->item_id)?>" class="btn btn-warning btn-xs">
                                            <i class="fa fa-pencil"></i> Edit
                                       </a>
                                       <a href="<?=site_url('item/del/'. $data->item_id)?>" onclick="return confirm('apakah Anda Yakin Menghapus Data?')" class="btn btn-danger btn-xs">
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

<script>
  $(document).ready(function(){
    $('#table1').DataTable({
        "processing": true,
        "serverSide": true,
         "ajax": {
             "url":"<?=site_url('item/get_ajax')?>",
             "type": "POST"
         },
         "columnDefs": 
         [
             {
                    "targets": [5, 6],
                    "className": 'text-right'
             },

             {
                    "targets": [7 , -1],
                    "className": 'text-center'
             },

             {
                    "targets": [0, 7, -1],
                    "orderable": false
             }
         
         ],
         "order": []
    })
  })
</script>
<!--          "columnDefs": [
             {

                "targets": [6, 6],
                "className": 'text-right'

             },

             {

            "targets": [7, -1],
            "className": 'text-center'

            },

            {

            "targets": [7, -1],
            "orderabel": false  

            }
        ] -->