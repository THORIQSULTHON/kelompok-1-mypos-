	<!-- Footer section -->
	<section class="footer-section">
		<div class="container">
			<div class="footer-logo text-center">
				<a href="index.html"><img src="" alt=""></a>
			</div>
			<div class="row">
				<div class="col-lg-3 col-sm-6">
					<div class="footer-widget about-widget">
						<h2>About</h2>
						<p>Kopi rempah adalah kopi buatan khas jember yang tempat produksi kopi rempah ini berada di desa Garahan</p>
						<img src="<?= base_url(); ?>assets/assets_landingpage/img/cards.png" alt="">
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="footer-widget about-widget">
						<h2>Questions</h2>
						<ul>
							<li><a href="<?= base_url('auth/login'); ?>">Admin</a></li>
							<li><a href="">Track Orders</a></li>
							<li><a href="">Returns</a></li>
							<li><a href="">Jobs</a></li>
							<li><a href="">Shipping</a></li>
							<li><a href="">Blog</a></li>
						</ul>
						<ul>
							<li><a href="">Partners</a></li>
							<li><a href="">Bloggers</a></li>
							<li><a href="">Support</a></li>
							<li><a href="">Terms of Use</a></li>
							<li><a href="">Press</a></li>
						</ul>
					</div>
				</div>
				<!-- <div class="col-lg-3 col-sm-6">
					<div class="footer-widget about-widget">
						<h2>Questions</h2>
						<div class="fw-latest-post-widget">
							<div class="lp-item">
								<div class="lp-thumb set-bg" data-setbg="img/blog-thumbs/1.jpg"></div>
								<div class="lp-content">
									<h6>what shoes to wear</h6>
									<span>Oct 21, 2018</span>
									<a href="#" class="readmore">Read More</a>
								</div>
							</div>
							<div class="lp-item">
								<div class="lp-thumb set-bg" data-setbg="img/blog-thumbs/2.jpg"></div>
								<div class="lp-content">
									<h6>trends this year</h6>
									<span>Oct 21, 2018</span>
									<a href="#" class="readmore">Read More</a>
								</div>
							</div>
						</div>
					</div>
				</div> -->
				<div class="col-lg-3 col-sm-6">
					<div class="footer-widget contact-widget">
						<h2>Questions</h2>
						<div class="con-info">
							<span>C.</span>
							<p>Your Company Ltd </p>
						</div>
						<div class="con-info">
							<span>B.</span>
							<p>1481 Creekside Lane  Avila Beach, CA 93424, P.O. BOX 68 </p>
						</div>
						<div class="con-info">
							<span>T.</span>
							<p>+53 345 7953 32453</p>
						</div>
						<div class="con-info">
							<span>E.</span>
							<p>office@youremail.com</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="social-links-warp">
			<div class="container">
				<div class="social-links">
					<a href="" class="instagram"><i class="fa fa-instagram"></i><span>instagram</span></a>
					<a href="" class="google-plus"><i class="fa fa-google-plus"></i><span>g+plus</span></a>
					<a href="" class="pinterest"><i class="fa fa-pinterest"></i><span>pinterest</span></a>
					<a href="" class="facebook"><i class="fa fa-facebook"></i><span>facebook</span></a>
					<a href="" class="twitter"><i class="fa fa-twitter"></i><span>twitter</span></a>
					<!-- <a href="" class="youtube"><i class="fa fa-youtube"></i><span>youtube</span></a> -->
					<!-- <a href="" class="tumblr"><i class="fa fa-tumblr-square"></i><span>tumblr</span></a> -->
				</div>

<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --> 
<p class="text-white text-center mt-5">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

			</div>
		</div>
	</section>
	<!-- Footer section end -->



	<!--====== Javascripts & Jquery ======-->
	<script src="<?= base_url(); ?>assets/assets_landingpage/js/jquery-3.2.1.min.js"></script>
	<script src="<?= base_url(); ?>assets/assets_landingpage/js/bootstrap.min.js"></script>
	<script src="<?= base_url(); ?>assets/assets_landingpage/js/jquery.slicknav.min.js"></script>
	<script src="<?= base_url(); ?>assets/assets_landingpage/js/owl.carousel.min.js"></script>
	<script src="<?= base_url(); ?>assets/assets_landingpage/js/jquery.nicescroll.min.js"></script>
	<script src="<?= base_url(); ?>assets/assets_landingpage/js/jquery.zoom.min.js"></script>
	<script src="<?= base_url(); ?>assets/assets_landingpage/js/jquery-ui.min.js"></script>
	<script src="<?= base_url(); ?>assets/assets_landingpage/js/main.js"></script>


<script type="text/javascript">
    $(function() {
        var total_berat = function() {
            var sum = 0;
 
            $('.beratTotal').each(function() {
                var num = $(this).val();
 
                if (num !== 0) {
                    sum += parseInt(num);
                }
            });
 
            $('#keseluruhanBerat').val(sum);
        }
        $('#formKu').click(function() {
            total_berat();
        });
    });
</script>
<script type="text/javascript">
    function get_ongkir() {
        $('#opsi_ongkir').html('<option disabled hidden selected>Mohon Tunggu Sedang memproses ...</option>');
        $.ajax({
            method: 'GET',
            url: '<?= base_url(); ?>Api_rajaongkir/getongkir',
            data: {
                'city_id': $('#kota_kirim').val(),
                'berat': $('#keseluruhanberat').val()
            },
            dataType: 'JSON',
            success: function(result) {
                field_ongkir = '<ul>';
                $.each(result.rajaongkir.results[0].costs, function(index1, jenis_ongkir) {
                    $.each(jenis_ongkir.cost, function(index1, tarif) {
                        field_ongkir += '<option value="' + tarif.value + '">Paket "' + jenis_ongkir.description + '" (Harga Rp. ' + tarif.value + ') Durasi (Selama ' + tarif.etd + ' Hari) Dengan Jumlah total berat barang (' + $('#keseluruhanberat').val() / 1000 + 'KG)</option>'
                        // field_ongkir += '<li><input type="radio" value="' + tarif.value + '" name="kurir" id="harga_ongkier">' + jenis_ongkir.description + ' [' + tarif.value + ']</li>';
						
                    });
                });
                field_ongkir += '</ul>';
                $('#opsi_ongkir').html(field_ongkir);
            }
        });
    }
	function get_harga_ongkir()
	{
		var a = document.getElementById("coba1");
		a.value = parseInt($('#opsi_ongkir').val());
		var b = document.getElementById("total_bayar");


		$('#opsi_ongkir').ready(function(){
		var bil1 = parseInt($('#coba1').val())
		var bil2 = parseInt($('#final_total2').val())	

		var hasil = bil1 + bil2
		$('#total_bayar').attr('value', hasil);
		})
	}
</script>
<script type="text/javascript">
    $.ajax({
        method: 'GET',
        url: '<?= base_url(); ?>Api_rajaongkir/getprovinsi',
        dataType: 'JSON',
        success: function(result) {
            provinsi = '<option disabled selected hidden>Pilih Provinsi</option>';
            $.each(result.rajaongkir.results, function(index, data) {
                provinsi += '<option value="' + data.province_id + '">' + data.province + '</option>';
            });
            $('#kota_provinsi').html(provinsi);
        }
    });
 
    function get_kota() {
        $('#kota_kirim').html('<option disabled hidden selected>Mohon Tunggu ...</option>');
        $.ajax({
            method: 'GET',
            url: '<?= base_url(); ?>Api_rajaongkir/getkota',
            data: {
                'province': $('#kota_provinsi').val()
            },
            dataType: 'JSON',
            success: function(result) {
                kota = '<option disabled selected hidden>Pilih Kota</option>';
                $.each(result.rajaongkir.results, function(index, data) {
                    kota += '<option value="' + data.city_id + '">' + data.city_name + '</option>';
                });
                $('#kota_kirim').html(kota);
            }
        });
    }
 
 
    // $('#kota_provinsi')
 
    function autofill_kota(id) {
        alert(id);
        var kota_kirim = $("#kota_kirim").val();
        $.ajax({
            url: '../transaksi/autofill_ongkir.php',
            data: 'id=' + kota_kirim,
            success: function(data) {
                var json = data,
                    obj = JSON.parse(json);
                $('#ongkir_kurir').val(obj.ongkir_kurir);
            }
        });
    }
</script>

<script type="text/javascript">
	$('#formKu').click(function(){
		var bil1 = parseInt($('#berat').val())
		var bil2 = parseInt($('#qtybeli').val())	

		var hasil = bil1 * bil2
		$('#Berat_Total').attr('value', hasil);
	})
</script>


<!-- logika pepmbuka hitung qty dan berat detail -->
<script type="text/javascript">
	$('#formMu').click(function(){
		var bil1 = parseInt($('#beban_berat').val())
		var bil2 = parseInt($('#qeteye').val())	

		var hasil = bil1 * bil2
		$('#ratrat').attr('value', hasil);
	})
</script>
<!-- penutupuan logika di cartnua -->

<!-- logika pepmbuka hitung qty dan berat edit di cart -->
<script type="text/javascript">
	$('#formEdit').click(function(){
		var bil1 = parseInt($('#beratrat').val())
		var bil2 = parseInt($('#qty12').val())	

		var hasil = bil1 * bil2
		$('#totaltal').attr('value', hasil);
	})
</script>
<!-- penutupuan logika di cartnya -->

<script type="text/javascript">
	$(function()
	{
		var total_berat = function()
		{
			var sum = 0;

			$('.berat').each(function(){
				var num = $(this).val();

				if(num !== 0)
				{
					sum += parseInt(num);
				}
			});
			$('#keseluruhanberat').val(sum);
		}
		$('#formKu').ready(function(){
			total_berat();
		});
	});
</script>
<script>
	$(function()
		{
			var total_harga = function()
			{
				var sum_harga = 0;

				$('.harga_satuan1').each(function(){
					var num_harga = $(this).val();

					if(num_harga !== 0)
					{
						sum_harga += parseInt(num_harga);
					}
				});
				$('#final_total1').text('Rp. '+sum_harga);
				$('#final_total2').val(sum_harga);
			}
			$('#coba_hitung').ready(function(){
				total_harga();
			})
		}
	)
</script>
<script type="text/javascript">
	$(function()
		{
			var total_bayar = function()
			{
				var harga = 0;
				var harga_awal = parseInt($('#final_total2'))
				var harga_ongkir = parseInt($('#coba1'))

				var hasil_akhir = harga_awal + harga_ongkir
				$('#total_bayar').attr('value', hasil_akhir);
			}
			$('#total_bayar').change(function(){
				total_bayar();
			})
		}
	)
</script>
	</body>
</html>
