<h1 class="h3 mb-4 text-gray-800 mt-4">Halaman Histori Transaksi Untuk pembayaran Silahkan Transfer ke nomer rekening <b>891821921</b></h1>
          <!-- <a href="" class="btn btn-primary mb-3 ml-3" data-toggle="modal" data-target="#newSloganModal"><i class="fa fa-fw fa-plus"></i>  Tambah Data Produk</a> -->
          <div class="row">
              <div class="col-lg-12">

              <table class="table table-hover">
                  <thead>
                      <tr>
                      <th scope="col">#</th>
                      <th scope="col">Kode Transaksi</th>
                      <th scope="col">Alamat Kirim</th>
                      <th scope="col">Sub Harga</th>
                      <th scope="col">Final Harga</th>
                      <th scope="col">Tanggal Transaksi</th>
                      <th scope="col">Status Bayar</th>
                      <th scope="col">Foto Bukti Transfer</th>
                      <!-- <th scope="col">Aksi</th> -->
                      <th scope="col">Untuk kode </th>
                      <th scope="col">Untuk kode </th>
                      </tr>
                  </thead>
                    <tbody>
                    <?php 
                        $no=1; 
                        $usr = $this->session->userdata('customerid');
                        $qr = $this->db->query("SELECT * FROM transaksi WHERE customer_id = '$usr'")->result_array();
                        foreach($qr as $data) : 
                        $alamat = $data['alamat_kirim'];
                        $harga1 = $data['total_harga'];
                        $harga2 = $data['total_final'];
                        $id = $data['id_transaksi'];
                    ?>
                    <tr>
                        <th scope="row"><?= $no++;?></th>
                        <td><?=$data['id_transaksi'];?></td>
                        <td><?=$alamat;?></td>
                        <td><?=indo_currency($harga1);?></td>
                        <td><?=indo_currency($harga2);?></td>
                        <td><?=$data['tgl_transaksi'];?></td>
                        <td>
                            <?php if($data['status_bayar'] != null) :?>
                                <a class="badge badge-success" style="color: white;">Sudah Terkomfirmasi</a>
                                <a class="badge badge-light">Barang Akan di kirim</a>
                            <?php elseif ($data['bukti_transfer'] != null) :?>
                                <a class="badge badge-primary" style="color: white;">Tunggu konfirmasi Penjual</a>
                            <?php else :?>
                                <a class="badge badge-warning" >Belum Terkomfirmasi</a>
                            <?php endif;?>
                        </td>
                        <td >
                            <?php if($data['bukti_transfer'] != null) :?>
                                <img style="width:100px; height: 100px;" src="<?=base_url('uploads/bukti/'. $data['bukti_transfer']);?>">
                            <?php else :  ?>
                                belum mengirim bukti transfer 
                            <?php endif; ?>
                        </td>
                        <!-- <td>
                        <a href="#"  class="badge badge-warning">Edit</a>
                        <a href="#" onclick="return confirm('apakah Anda Yakin Menghapus Data?')" class="badge badge-danger">Delete</a>
                        </td> -->
                        <td>
                            <div class="col-sm">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Perhatian Untuk kode<?= $data['id_transaksi']; ?></h5>
                                        <?php if($data['bukti_transfer'] != null) :?>
                                               <p class="badge badge-light">Bukti Transfer Telah di upload, Klik tombol "Ganti foto" ganti Bukti</p>
                                        <?php else : ?>
                                                <p class="card-text">Silahkan Membayar ke rekening di atas, dan mengirim foto dengan menekan tombol "<b>Upload Bukti</b>"</p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </td>
                        
                        <td>
                            <!-- tombol batal untuk membatalkan gambar transaksinya -->
                            <?php if($data['status_bayar'] != null) : ?>
                                <button data-target="#modalBatal<?=$id?>" data-toggle="modal" class="btn btn-success btn-sm mt-3 mb-2" disabled><i class="fa fa-check"> Selesai</i></button>
                            <?php elseif($data['bukti_transfer'] != null) :?>
                                <button data-target="#modalBayar<?=$id?>" data-toggle="modal" class="btn btn-danger btn-sm mt-3 mb-2" ><i class="fa fa-times-circle"> Ganti foto</i></button>
                            <?php else :?>
                                <button data-target="#modalBayar<?=$id?>" data-toggle="modal" class="btn btn-primary btn-sm mt-3 mb-2" >Upload Bukti</button>
                            <?php endif;?>
                        </td>
                    </tr>
                        
                    <?php endforeach; ?>
                        
                </tbody>
            </table>
        </div>
    </div>
<?php 

    $users = $this->session->userdata('customerid');
    $qy    = $this->db->query("SELECT * FROM transaksi WHERE customer_id = '$users'")->result_array();
    foreach($qy as $data) :
    $id = $data['id_transaksi'];
?>
    <!-- Modal upload sekaligus input no rek -->
    <div class="modal fade" id="modalBayar<?=$id?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                            <h4 class="modal-tittle">Silahkan ubah jumlah barang yang akan anda beli</h4>
                    </div>
                <form action="<?=base_url('Home/prosesct');?>" enctype="multipart/form-data" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="norek"></label>
                            <?php if($data['no_rek'] != null) :?>
                                <input type="number" class="form-control" value="<?=$data['no_rek'];?>" id="norek" name="norek" placeholder="Masukan no rek">
                            <?php else : ?>
                                <input type="number" class="form-control" value="<?=$data['no_rek'];?>" id="norek" name="norek" placeholder="Masukan no rek">
                            <?php endif;?>
                                <input type="hidden" class="form-control" value="<?=$id;?>" id="id_trans" name="id_trans" placeholder="Masukan no rek">
                        </div>
                        <?php if($data['bukti_transfer'] != null) : ?>
                            <center>
                                <img src="<?=base_url('uploads/bukti/'. $data['bukti_transfer']);?>" alt="">
                            </center>
                        <?php endif;?>
                        <div class="form-group">
                            <label for="upload_foto">Pilih Foto bukti transaksi</label>
                            <input type="file" class="form-control" id="upload_foto" name="upload_foto">
                        </div>
                    </div>
                <div class="modal-footer">
                        <button class="btn btn-default" data-dismiss="modal">Tidak</button>
                        <button class="btn btn-success" name="Upload_tombol" type="submit">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
    endforeach;
?>
<!-- modal batal untuk gambar -->
