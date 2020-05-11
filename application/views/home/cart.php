	<!-- cart section end -->
	<section class="cart-section spad" id="coba_hitung">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="cart-table">
						<h3>Your Cart</h3> 
						<div class="cart-table-warp">
							<table>
							<thead>
								<tr>
									<th class="product-th">Produk</th>
									<th class="quy-th">Jumlah</th>
									<th class="total-th">Berat gram</th>
									<th class="total-th">SubHarga</th>
									<th class="product-th">Aksi</th>
								</tr>
							</thead>
							<tbody>
                                <?php 

									foreach( $row as $data) :
									$customer = $this->session->userdata('customerid');
									$id = $data['id_item'];
									$qty = $data['qty_dibeli'];
									$harga = $data['price'];
									$total = $harga * $qty;
									$total_sebelum_ongkir = array($total);
								?>
								<tr>
									<td class="product-col">
										<div class="pc-title">
											<h4><?=$data['item_name'];?></h4>
										<input type="number" name="harga12[]" id="harga12" class="form-control" value="<?=$harga?>" readonly>
										</div>
									</td>
									<td class="quy-col">
												<p><?=$data['qty_dibeli'];?></p>
									</td>
									<td class="quy-col">
												<p><?=$data['berat'];?></p>
									</td>
									<td class="total-col"><input type="text" name="total" value="<?= indo_currency($total);?>" class="form-control" readonly><input type="hidden" class="form-control harga_satuan1"value="<?= $total; ?>"></td>
									<td>
									
									<button data-target="#modalUpdate<?= $id; ?>" data-toggle="modal" class="btn btn-flat  btn-warning">Edit</button>
										
										<a href="#modalDelete" data-toggle="modal" onclick="$('#modalDelete #formDelete').attr('action', '<?=base_url('Home/del_cart/'. $id);?>')" class="btn btn-flat  btn-danger">Hapus</a>
										<!-- <a href="<?=base_url('Home/del_cart/'. $data['id_cart']);?>" class="btn btn-flat btn-danger">Hapus</a> -->
									</td>
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
						</div>
						<div class="total-cost">
							<h6>Total Sebelum Ongkir<span name="final_total1" id="final_total1"></span></h6>
						</div>
					</div>
				 
				</div>
				<div class="col-lg-4 card-right">
					<a href="<?= base_url('Home');?>" class="site-btn sb-dark">Continue shopping</a>
				</div>
			</div>
			<br>
			<br>
			<div class="col-lg-8 order-2 order-lg-1 mt-1">
					<form action="<?=base_url('Home/check_out');?>" id="formKu" method="post" enctype="multipart/form-data" class="checkout-form">
						<div class="cf-title">Billing Address</div>

						<div class="row address-inputs">
							<div class="col-md-12">
									<label for="">keseluruhan berat</label>
								<input type="text"  id="keseluruhanberat" value="" placeholder="ads">
									<label for="kota_provinsi">Pilih profinsi anda</label>
									<select name="kota_provinsi" id="kota_provinsi" class="form-control mb-3 pb-1" onchange="get_kota()">
									</select>
										<label for="kota_kirim">Pilih kabupaten anda</label>
									<select name="kota_kirim" id="kota_kirim" class="form-control mb-3 pb-1" onchange="get_ongkir()">
									</select>

									<label for="opsi_ongkir">Opsi Ongkir anda</label>
									<select name="opsi_ongkir" id="opsi_ongkir" class="form-control mb-3 pb-1" onchange="get_harga_ongkir()">
									</select>
								
								<?php foreach ($row as $op) : 
									$cs = $this->session->userdata('customerid');?>
								<!-- Inputan untuk kedalam detail transaksi(checkout) -->
									<input type="hidden" name="id_brg_tmp[]" value="<?= $op['id_item']; ?>">
									<input type="hidden" name="harga_brg_tmp[]" value="<?= $op['price']; ?>">
									<input type="hidden" name="qty_brg_tmp[]" value="<?= $op['qty_dibeli']; ?>">
								<!-- Akhir inputan -->

								<!-- Inputan hidden -->
								<input type="hidden" value="<?=$op['id_cart'];?>" name="cartid" placeholder="id cart">
								<input type="hidden" value="<?=$cs;?>" name="idcustomer" placeholder="id customer">
								<input type="hidden" value="<?=$op['id_item'];?>" name="iditem"  placeholder="id item">
								<input type="hidden" value="<?=$op['qty_dibeli'];?>" name="qtybeli" id="qtybeli" placeholder="qty">
								<input type="hidden" value="<?=$op['total_berat'];?>" name="berat" id="berat" class="berat">
								<input type="hidden" value="<?=$op['tgl_transaksi'];?>" name="tglbeli" placeholder="tgl">
								<?php endforeach;?>
								<!-- inputan yang akan di jumlahkan -->
								<label for="">Biaya</label>
								<input type="text" name="final_total2" id="final_total2"  placeholder="ads">
								<input type="text" name="coba1"  id="coba1"  placeholder="ini tempat nyoba bos">
								<!-- Akhir Inputan hidden -->
								<label for="">Total</label>
								<input type="text" placeholder="Total Pembayaran" name="total_bayar" id="total_bayar" readonly>
								
										<label for="alamat">Alamat Barang yang akan di kirim*</label> <br>
										<textarea name="alamat" id="alamat" class="form-control" cols="90" rows="10"></textarea>
								
							</div>
							<!-- <div class="col-md-6">
								<input type="text" name="" placeholder="Zip code">
							</div> -->
							<div class="col-md-6 mt-3">
						<button type="submit" name="transak" class="site-btn submit-order-btn">Proceed to checkout</button>
					</form>
				</div>


		</div>
	</section>
	<!-- cart section end -->

		<!-- checkout section  -->
		<!-- <section class="checkout-section spad">
		<div class="container">
			<div class="row">
				
			</div>
		</div>
	</section> -->
	<!-- checkout section end -->


	<!-- modal delet -->
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
<?php 

	foreach( $row as $d) :
	$id = $d['id_item'];
	$qty = $d['qty_dibeli'];
	$berat = $d['total_berat'];
?>
	<!-- modal edit -->
	<div class="modal fade" id="modalUpdate<?= $id; ?>">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-tittle">Silahkan ubah jumlah barang yang akan anda beli</h4>
            </div>
			<form action="<?=base_url('Home/prosesct');?>" id="formEdit" method="post">
				<div class="modal-body">
					<div class="form-group">
						<label for="qty"></label>
							<input type="number" class="form-control" value="<?= $qty; ?>" id="qty12" name="qty12" placeholder="Menu Name">
							<input type="hidden" class="form-control" value="<?= $d['berat']; ?>" id="beratrat" name="beratrat" placeholder="Menu Name" readonly>
							<input type="hidden" class="form-control" value="" id="totaltal" name="totaltal" placeholder="">
							<input type="hidden" class="form-control" value="<?= $d['item_name']; ?>" id="item_name" name="item_name" placeholder="Menu Name">
							<input type="hidden" class="form-control" value="<?= $id; ?>" id="id_item" name="id_item" placeholder="Menu Name">
					</div>
				</div>
            <div class="modal-footer">
                    <button class="btn btn-default" data-dismiss="modal">Tidak</button>
                    <button class="btn btn-danger" name="edit_tombol" type="submit">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
	<?php endforeach;?>

