<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barcode Produk<?=$row->barcode?></title>
</head>
<body>
    <?php
        $generator = new Picqer\Barcode\BarcodeGeneratorPNG();                                                             // buat array lung biar bisa manggil beberapa data bukan cuma 1 data barcod doang, maunya sih manggil barcode, nama barang, dan harganya
        echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($row->barcode, $generator::TYPE_CODE_128)) . '"style="width: 200px;">';
        ?>    
        <br>
    <?=$row->barcode?>
</body>
</html>