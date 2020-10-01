


<!-- ini kontennya -->
	

	

	<!-- Product filter section -->
	<section class="product-filter-section">
		<div class="container">
			<div class="section-title">
				<h2>BROWSE TOP SELLING PRODUCTS</h2>
			</div>

			<div class="row">
				<?php foreach($row->result() as $key => $data) :?>
				<div class="col-lg-3 col-sm-6">
						<div class="product-item">
							<div class="pi-pic">
								<img src="<?= base_url ('uploads/product/'.$data->image);?>" style="width: 250px; height:350px;">
								<div class="pi-links">
									<a href="<?= base_url('Home/detail/'. $data->item_id);?>" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
									<!-- <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a> -->
								</div>
							</div>
							<div class="pi-text">
								<h6>Rp. <?= $data->price?></h6>
								<p><?= $data->name?> </p>
							</div>
						</div>
				</div>
				<?php endforeach;?>
				
		</div>
	</section>
	<!-- Product filter section end -->


<!-- konten index -->


