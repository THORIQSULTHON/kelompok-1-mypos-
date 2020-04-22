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
        <div class="box">
            <div class="box-header ">
                <h3 class="box-title">Pencetak Barcode</h3>
                <div class="pull-right">
                        <a href="<?=site_url('item')?>" class="btn btn-warning btn-flat btn-sm">
                                <i class="fa fa-arrow-circle-left"></i> Back
                        </a>
                </div>
            </div>

            <div class="box-body">
            <?php
            $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
                                                                                            // buat array lung biar bisa manggil beberapa data bukan cuma 1 data barcod doang, maunya sih manggil barcode, nama barang, dan harganya
            echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($row->barcode, $generator::TYPE_CODE_128)) . '"style="width: 200px;">';
            ?>    
            <br>
            <?=$row->barcode?>
            <br>
            <br>
            <a href="<?=site_url('item/barcode_print/'.$row->item_id)?>" target="_blank" class=" btn btn-success btn-sm ">
                <i class="fa fa-print"></i> Print
            </a>
            <br>
            </div>
        </div>

        <div class="box">
            <div class="box-header ">
                <h3 class="box-title">Pencetak QrCode</h3>
            </div>

            <div class="box-body">
            <?php
                $qrcode = new Endroid\QrCode\QrCode($row->barcode);
                $qrcode->writeFile('uploads/qr-code/item-'.$row->barcode.'.png');
            ?>
            <img src="<?=base_url('uploads/qr-code/item-'.$row->barcode.'.png')?>" style="width: 200px;">   
            <br>
            <?=$row->barcode?>
            <br>
            <br>
                                                            <!-- do bagian setelah $row-> harus sesuain sama target kolom di tabel yang udah di pi;ih lung, kalo sampe nama funvtion atau salah pdfnya gak bisa di buka atau di baca  -->
            <a href="<?=site_url('item/qrcode_print/'.$row->item_id)?>" target="_blank" class=" btn btn-success btn-sm ">
            <i class="fa fa-print"></i> Print
            </a>
            <br>
            </div>
        </div>
</Section>