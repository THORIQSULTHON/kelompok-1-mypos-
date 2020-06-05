	<!-- product section -->
	<section class="product-section">
		<div class="container">
			<div class="back-link">
				<a href="<?= base_url ('Home')?>"> &lt;&lt; Back to Category</a>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="product-pic-zoom">
						<img class="product-big-img" src="<?= base_url ('uploads/product/'.$row->image);?>" alt="" style="width: 300px; height:400px;">
					</div>
				</div>
				
					<div class="col-lg-6 product-details">
						<h2 class="p-title"><?= $row->name?></h2>
						<h3 class="p-price"><?=indo_currency($row->price)?></h3>
						<h4 class="p-stock">Ketersediaan Stock: <span>ADA</span></h4>
						<div class="p-rating">
							<i class="fa fa-star-o"></i>
							<i class="fa fa-star-o"></i>
							<i class="fa fa-star-o"></i>
							<i class="fa fa-star-o"></i>
							<i class="fa fa-star-o"></i>
							<!-- <i class="fa fa-star-o fa-fade"></i> ini yntuk bintang kosongnya -->
						</div>
						<!-- <div class="p-review">
							<a href="">3 reviews</a>|<a href="">Add your review</a>
						</div> -->
					
						<form action="<?= base_url('Home/proses'); ?>" id="formMu" method="post">
						<input type="hidden" name="id_produk" value="<?= $row->item_id; ?>">
						<input type="hidden" name="customer_id" value="<?= $this->session->userdata('customerid'); ?>">
						<input type="hidden" name="tanggal" value="<?= date('Y-m-d H:i:s')?>">

						<div class="quantity">
							<p>Jumlah</p>
							<div class="pro-qty"><input type="number" id="qeteye" name="qty"></div>
						</div>
						
						<div id="accordion" class="accordion-area">
							<div class="panel">
								<div class="panel-header" id="headingOne">
									<button class="panel-link active" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">Informasi</button>
								</div>
								<div id="collapse1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
									<div class="panel-body">
										<p><?= $row->deskripsi?></p>
										<input type="hidden" id="beban_berat" value="<?= $row->berat?>">
										<input type="hidden" id="ratrat" name="ratrat" value="">
									</div>
								</div>
							</div>
						</div>
						<br>
						<div class="quantity">
						<?php 
							$customer_id = $this->session->userdata('customerid');
							$id_item = $row->item_id;
							$query = "SELECT * FROM cart WHERE id_item = '$id_item' AND customer_id = '$customer_id'";
							$qr = $this->db->query($query);
						if($qr->num_rows() > 0):?>
							<button type="submit" href="<?= base_url('Home/cart');?>" name="sudah_ada" class="site-btn">Barang Sudah di keranjang!!</button>
						<?php else : ?>
							<button type="submit" name="tambah_cart" class="site-btn">Beli Sekarang</button>
						<?php endif;?>
						</div>
					</form>
					<!-- <div class="social-sharing">
						<a href=""><i class="fa fa-google-plus"></i></a>
						<a href=""><i class="fa fa-pinterest"></i></a>
						<a href=""><i class="fa fa-facebook"></i></a>
						<a href=""><i class="fa fa-twitter"></i></a>
						<a href=""><i class="fa fa-youtube"></i></a>
					</div> -->
				</div>
			</div>
		</div>
	</section>
	<!-- product section end -->