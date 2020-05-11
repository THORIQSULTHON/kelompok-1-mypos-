<!-- letest product section -->
<section class="top-letest-product-section">
		<div class="container">
			<div class="section-title">
				<h2>LATEST PRODUCTS</h2>
			</div>
			<div class="product-slider owl-carousel">
					<?php foreach($row as $key => $data) :?>
				<div class="product-item">
					<div class="pi-pic">
						<img src="<?= base_url ('uploads/product/'.$data->image)?>" alt="">
						<div class="pi-links">
							<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
							<!-- <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a> -->
						</div>
					</div>
					<div class="pi-text">
						<h6><?= $data->price?></h6>
						<p><?= $data->name?></p>
					</div>
				</div>
				<?php endforeach;?>
				
			</div>
		</div>
	</section>
	<!-- letest product section end -->

