<?php
function checkout($data)
{
    // global $koneksi;
    // $rowDB1 = mysqli_query($koneksi, "SELECT * FROM transaksi");
    // $field = mysqli_num_rows($rowDB1);
    // $brg = "IDTR";
    // $d = date('mdy', time());
 
    // $hasil = $brg . $d . "0" . ($field + 1);
 
    // $idTransaksi = $hasil;
    // $id_admin = "Belum Terkonfirmasi";
    // $id_pembeli = htmlspecialchars($data['id_users']);
    // $id_toko = "IDT001";
    // $alamat_kirim = htmlspecialchars($data["alamat_kirim"]);
    // $tgl_kirim = "00/00/0000";
    // $ongkir = htmlspecialchars($data["ongkir_kurir"]);
    // $total_harga = htmlspecialchars($data["harga_subtotal"]);
    // $total_final = htmlspecialchars($data["harga_final"]);
    // $status_bayar = htmlspecialchars($data["status_bayar"]);
    // $status_kirim = htmlspecialchars($data["status_kirim"]);
    // $tgl_transaksi = date('Y-m-j', time());
    // $no_rekening = "Belum Terisi";
 
    // $bukti_bayar = "checkout.jpg";
 
    // // $bukti_bayar = uploadBukti();
    // // if (!$bukti_bayar) {
    // //     $bukti_bayar = "checkout.jpg";
    // // }
 
    $hitungExp = mysqli_query($koneksi, "SELECT * FROM dtl_transaksi");
    $hitungExp1 = mysqli_num_rows($hitungExp);
    $query = "INSERT INTO transaksi VALUES('$idTransaksi','$id_admin','$id_pembeli','$id_toko','$alamat_kirim','$tgl_kirim','$ongkir','$total_harga','$total_final','$status_bayar','$status_kirim','$tgl_transaksi','$bukti_bayar','$no_rekening')";
 
    mysqli_query($koneksi, $query);
    $number = count($_POST["id_barang"]);
    $number1 = count($_POST["harga_satuan"]);
 
    $jml_dibeli = "0";
    if ($number >= 1 && $number1 >= 1) {
        for ($i = 0; $i < $number; $i++) {
            $hitungExp1++;
            if (trim($_POST["harga_satuan"][$i] != '') && trim($_POST["jml_dibeli_tmp"][$i] != '')) {
                $sql = "INSERT INTO dtl_transaksi VALUES('$idTransaksi','" . mysqli_real_escape_string($koneksi, $_POST["id_barang"][$i]) . "','$hitungExp1','" . mysqli_real_escape_string($koneksi, $_POST["harga_satuan"][$i]) . "','" . mysqli_real_escape_string($koneksi, $_POST["jml_dibeli_tmp"][$i]) . "','$jml_dibeli')";
                mysqli_query($koneksi, $sql);
            }
        }
    }
 
 
    for ($j = 0; $j <= $number; $j++) {
        $hitungExp1++;
        if (trim($_POST["harga_satuan"][$j] != '') && trim($_POST["jml_dibeli_tmp"][$j] != '')) {
            $dlt = "DELETE FROM cart WHERE id_cart='$i' OR id_users='$id_pembeli'";
            mysqli_query($koneksi, $dlt);
        }
    }
    return mysqli_affected_rows($koneksi);
}