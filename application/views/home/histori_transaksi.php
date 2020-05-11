<h1 class="h3 mb-4 text-gray-800">Halaman Management Selogan</h1>
          <a href="" class="btn btn-primary mb-3 ml-3" data-toggle="modal" data-target="#newSloganModal"><i class="fa fa-fw fa-plus"></i>  Tambah Data Produk</a>
          <div class="row">
              <div class="col-lg-6">

              <table class="table table-hover">
                  <thead>
                      <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nama Kategori</th>
                      <th scope="col">Aksi</th>
                      </tr>
                  </thead>
                      <tbody>
                      <?php $no=1; 
                            foreach($row as $key) { ?>
                          <tr>
                              <th scope="row"><?= $no++;?></th>
                                  <td><?=$key['alamat_kirim'];?></td>
                                  <td>
                                  <a href="<?=base_url('admin/menu/Slogan/edit_slogan/'. $data->id_transaksi)?>"  class="badge badge-warning">Edit</a>
                                  <a href="<?=base_url('admin/menu/Slogan/del_slogan/'. $data->id_transaksi)?>" onclick="return confirm('apakah Anda Yakin Menghapus Data?')" class="badge badge-danger">Delete</a>
                                  </td>
                          </tr>
                            <?php } ?>
                      </tbody>
              </table>

                
                </div>
              
        </div>