<section class="content-header">
<h1> Penjualan 
    <small>Penjualan</small>

</h1>
<ol class="breadcrumb">
    <li><a href=""><i class="fa fa-user"></i></a></li>
    <li>Transaksi</li>
    <li class="active">Penjualan</li>
</ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-lg-4">
            <div class="box box-widget">
                <div class="box-body">
                    <table width="100%">
                        <tr>
                            <td style="vertical-align:top">
                                <label for="date"> Tanggal</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="date" id="date" value="<?=date('Y-m-d')?>" class="form-control" readonly>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align:top; width:30%">
                                <label for="user">Kasir</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" id="user" value="<?=$this->fungsi->user_login()->name?>" class="form-control" readonly>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align:top">
                                        
                                <label for="customer">Pelanggan</label>
                            </td>
                            <td>
                                <div>
                                            <!-- Ini harus di samakan dengan line dengan variable customer_id yang menampung inputan select box dari customer572 -->
                                    <select id="customer" class="form-control">
                                        <option value="">- Umum -</option>
                                        <?php foreach ($customer as $cust => $value) {
                                            echo '<option value="'.$value->customer_id.'">'.$value->name.'</option>';
                                        }?>
                                    </select>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    
        <div class="col-lg-4">
            <div class="box box-widget">
                <div class="box-body">
                    <table width="100%">
                        <tr>
                            <td style="vertical-align:top; width:30%">
                                <label for="barcode">Barcode</label>
                            </td>
                            <td>
                                <div class="form-group input-group">
                                    <input type="hidden" id="item_id">
                                    <input type="hidden" id="price">
                                    <input type="hidden" id="stock">
                                    <input type="text" id="barcode" class="form-control" autofocus>
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top">
                                <label for="qty">Qty</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="qty" value="1" min="1" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <div>
                                    <button type="button" id="add_cart" class="btn btn-primary">
                                        <i class="fa fa-cart-plus"></i> Tambah
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="box box-widget">
                <div class="box-body">
                    <div align="right">
                        <h4>Invoice <b><span id="invoice"><?=$invoice?></span></b></h4>
                        <h1><b><span id="grand_total2" style="font-size:50pt">0</span></b></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="box box-widget">
                <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Barcode</th>
                                <th>Barang Produk</th>
                                <th>Harga</th>
                                <th>Qty</th>
                                <th width="10%">Diskon Barang</th>
                                <th width="10%">Total</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="cart_table">
                                    <?php $this->view('transaction/sale/cart_data') ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3">
            <div class="box box-widget">
                <div class="box-body">
                    <table width="100%">
                        <tr>
                            <td style="vertical-align:top; width:30%">
                                <label for="sub_total">Sub Total</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="sub_total" value="" class="form-control" readonly>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align:top">
                                <label for="discount">Diskon</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="discount" value="0" min="0" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align:top">
                                <label for="grand_total">Total Keseluruhan</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="grand_total" class="form-control" readonly>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="box box-widget">
                <div class="box-body">
                    <table style="100%">
                        <tr>
                            <td style="vertical-align:top; width:30%">
                                <label for="cash">Cash</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="cash" value="0" min="0" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align:top">
                                <label for="change">Kembalian</label>
                            </td>
                            <td>
                                <div>
                                    <input type="number" id="change" class="form-control" readonly>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="box box-widget">
                <div class="box-body">
                    <table style="100%">
                        <tr>
                            <td style="vertical-align:top">
                                <label for="note">Catatan</label>
                            </td>
                            <td>
                                <div>
                                    <textarea id="note" rows="3"></textarea>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div>
                <button id="cancel_payment" class="btn btn-flat btn-warning">
                    <i class="fa fa-refresh"></i> Batalkan Pembelian
                </button><br><br>
                <button id="process_payment" class="btn btn-flat btn-lg btn-success">
                    <i class="fa fa-paper-plane-o"></i> Proses Pembelian
                </button><br><br>
            </div>
        </div>
    </div>
</section>

<!-- Modal tambah produk -->
<div class="modal fade" id="modal-item">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-tittle">Pilih Item Produk</h4>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Barcode</th>
                            <th>Name</th>
                            <th>Unit</th>
                            <th>Harga</th>
                            <th>Stock</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($item as $i => $data ) { ?>
                        <tr>
                                         <!-- barcode ini sesuai dengan field di database atau sesuai dengan query database -->
                            <td><?=$data->barcode?></td>
                            <td><?=$data->name?></td>
                                        <!-- unit name ini adalah alias dari name unit di file item_m.php di dalam folder model di baris code ke 11 -->
                            <td><?=$data->unit_name?></td>
                            <td class="text-right"><?=indo_currency($data->price)?></td>
                            <td class="text-right"><?=$data->stock?></td>
                            <td class="text-right">
                                <button class="btn btn-xs btn-info" id="select" 
                                data-id="<?=$data->item_id?>" 
                                data-barcode ="<?=$data->barcode?>" 
                                data-price="<?=$data->price?>"
                                data-stock="<?=$data->stock?>">
                                    <i class="fa fa-check"></i> Pilih
                                </button>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Penutupan Modal tambah produk -->
<div class="modal fade" id="modal-item-edit">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
             <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                  </button>
                  <h4 class="modal-tittle">Edit Barang Produk</h4>
             </div>
             <div class="modal-body">
                        <input type="hidden" id="cartid_item">
                        <div class="form-group">
                            <label for="produck_item">Barang Produk</label>
                            <div class="row">
                                <div class="col-md-5">
                                    <input type="text" id="barcode_item" class="form-control" readonly>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="product_item" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="price_item">Harga</label>
                                <input type="number" id="price_item" min="0" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="qty_item">Jumlah</label>
                                <input type="number" id="qty_item" min="1" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="total_before">Total Sebelum Diskon</label>
                                <input type="number" id="total_before" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="discount_item">Diskon</label>
                                <input type="number" id="discount_item" min="0" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="total_item">Total Setelah Diskon</label>
                                <input type="number" id="total_item" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="pull-right">
                                <button type="button" id="edit_cart" class="btn btn-flat btn-success">
                                <i class="fa fa-paper-plane"></i> Save
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- kalau error coba tambahi div penutup 1 lagi -->
<script>
// proses menambahkan
$(document).on('click', '#select', function(){
    $('#item_id').val($(this).data('id'))
    $('#barcode').val($(this).data('barcode')) // $('#barcode') di ambil dari id di setiap inputannya
    $('#price').val($(this).data('price')) //val($(this).data('price')) artinya value inputan ini dari data-"price" yang isinya mengambil value price di database,
    $('#stock').val($(this).data('stock'))
    $('#modal-item').modal('hide')
})

$(document).on('click', '#add_cart', function(){
    var item_id = $('#item_id').val()
    var price   = $('#price').val() // jika add_cart di klik maka setiap variabel akan di isi dari input inputan hiden ini
    var stock   = $('#stock').val()
    var qty     = parseInt($('#qty').val())
    // ini validasi nya
    if(item_id == ''){
        alert('Barang Belum Dipilih')
        $('#barcode').focus()
    }else if(stock < 1){
        alert('Stock Barang Tidak Cukup')
        $('#item_id').val('')
        $('#barcode').val('')
        $('#barcode').focus()
        }else if(qty > stock){
        alert('Inputan anda melebihi stok yang tersedia')
        $('#item_id').val('')
        $('#barcode').val('')
        $('#barcode').focus()
        }else{
        $.ajax({
            type: 'POST',
            url: '<?=site_url('sale/process')?>',
            data: {'add_cart' : true, 'item_id' : item_id, 'price' : price, 'qty' : qty},
            dataType: 'json',
            success: function(result) {
                if(result.success == true) {
                                                        // ini meload fungsi cart_data di dalam file sale.php yang di mana file ini ada di folder controller
                    $('#cart_table').load('<?=site_url('sale/cart_data')?>', function(){
                        // setelah kita meload cart_data, maka kita akan meload function calculate
                        calculate()
                    })
                    // ini untuk code agar setelah menambahkan item atau barang ke cart akan di setting otomatis ke awal
                    $('#item_id').val('')
                    $('#barcode').val('')
                    $('#qty').val(1)
                    $('#barcode').focus()
                } else {
                    alert('Gagal Menambahkan Barang Ke Keranjang')
                }
            }
        })
    }
})

$(document).on('click', '#del_cart', function(){
    if(confirm('apakah Anda Yakin?')) {
        var cart_id = $(this).data('cartid')
        $.ajax({
            type: 'POST',
                    // seeperti biasa urlnya menuju ke file Sale.php di dalam folder controller dan mengambil fungsi 'cart_del' di dalam file Sale.php
            url: '<?=site_url('sale/cart_del')?>',
            dataType: 'json',
            data: {'cart_id': cart_id},
            success: function(result) {
                if(result.success == true) {
                $('#cart_table').load('<?=site_url('sale/cart_data')?>', function(){
                    calculate()
                    })
                } else {
                    alert('Gagal Menghapus');
                }

            } 
        })
    }
})
// PROSES PENGEDITAN KETIKA DI UBAH QTY , PRICE, DAN DISCOUNTNYA
// proses megedit ketika tombol edit di tombol yang memiliki id "update_cart" yang di mana tombol itu terletak di file cart_data.php baris kode ke 13
$(document).on('click', '#update_cart', function(){

    $('#cartid_item').val($(this).data('cartid'))
    $('#barcode_item').val($(this).data('barcode')) // $('#barcode') di ambil dari id di setiap inputannya
    $('#product_item').val($(this).data('product')) //val($(this).data('price')) artinya value inputan ini dari data-"price" yang isinya mengambil value price di tombol updatenya,
    $('#price_item').val($(this).data('price'))
    $('#qty_item').val($(this).data('qty'))
    $('#total_before').val($(this).data('price') * $(this).data('qty'))
    $('#discount_item').val($(this).data('discount'))
    $('#total_item').val($(this).data('total'))
})

function count_edit_modal()
{
    var price =  $('#price_item').val()
    var qty =  $('#qty_item').val()
    var discount =  $('#discount_item').val()

    // total menyimpan hasi dari price di kali jumlah barangnya
    total_before = price * qty
    $('#total_before').val(total_before)
    // total menyimpan hasi dari price di kurangi discount lalu di kali jumlah barangnya
    total = (price - discount) * qty
    $('#total_item').val(total)
    // ini untuk mensetingmisal awal ada diskon brang, lalu yang kita ingin menghapus diskon barangnya, dan inputan tersebut otomatis terisi angka 0
    if(discount == '')
    {
        $('#discount_item').val(0)

    }
}
// para meter pertama berisi keyup adalah fungsi ketika ngetik , dan mouseup adalah fungsi  pas ngeklik pakai cursor atau mouse
                                // parameter ke 2 adalah inputan inputa yang di panggil beserta data inputannya,  
                                            // para meter ke 2 adalah function yang memanggil function yang telah di buat di atas nama functionyang di panggil adalah count_edit_modal()
$(document).on('keyup mouseup', '#price_item, #qty_item, #discount_item', function() {
    //lalu function count_edit_modal ini di gunakan untuk membuat
    count_edit_modal()
})

// PORSES SAVE EDIT
                    // ini yang di beri function tombol yang memiliki id edit_cart di baris kode ke 340 di dalam file sale_form.php
$(document).on('click', '#edit_cart', function(){
    var cart_id = $('#cartid_item').val()
    var price   = $('#price_item').val() 
    var qty     = $('#qty_item').val()
    var discount   = $('#discount_item').val()
    var total   = $('#total_item').val()
    // ini validasi nya
    if(price == '' || price < 1)
    {
        alert('Harga Tidak Boleh Kosong')
        $('#price_item').focus()

    }
    else if(qty == '' || qty < 1)
    {
        alert('Jumlah minimal 1')
        $('#qty_id').focus('')

    }
    else if(stock < qty || qty > stock)
    {
        alert('Stock Barang Tidak Cukup')
        $('#qty_id').val('')
    }
    else
    {
        $.ajax({
            type: 'POST',
            url: '<?=site_url('sale/process')?>',
                                        // bingung di bagian ini tanyakan ke ferdian atau ke rafi
            data: {'edit_cart' : true, 'cart_id' : cart_id, 'price' : price, 'qty' : qty, 'discount' : discount, 'total' : total},
            dataType: 'json',
            success: function(result) {
                if(result.success == true) {
                                                        // ini meload fungsi cart_data di dalam file sale.php yang di mana file ini ada di folder controller
                    $('#cart_table').load('<?=site_url('sale/cart_data')?>', function(){
                        // setel=lah kita meload cart_data, maka kita akan meload function calculate
                        calculate()
                    })
                    $('#modal-item-edit').modal('hide');
                    alert('Data Cart Berhasil di Edit')
                    // ini untuk code agar setelah menambahkan item atau barang ke cart akan di setting otomatis ke awal

                } else {
                    alert('Data Cart Gagal di Edit')
                }
            }
        })
    }
})

// membuat fungsi perhitungan subtotal grantotal lalu kembaliannya
function calculate()
{
    var subtotal = 0;
    $('#cart_table tr').each(function() {
                            // #total di dapat di dalam file data_cart.php dan di dalam file tersebut mengambil id yang bernama total , yang di dalam valuenya itu terdapat tag php dan di echo nya itu $data->total pada line 11
        subtotal += parseInt($(this).find('#total').text())
    })
    isNaN(subtotal) ? $('#sub_total').val(0) : $('#sub_total').val(subtotal)

    var discount = $('#discount').val()
    var grand_total = subtotal - discount 

    if(isNaN(grand_total))
    {
            // val untuk menapilkan value di inputan atau apapun yang membutuhkan aksi inputan 
        $('#grand_total').val(0)
        // kalau text itu adalah cara untuk menampilkan value tetapi di dalam tag html seperti "span" "h1" dll yang tidak membutuhkan aksi keyboard maupun mouse
        $('#grand_total2').text(0)
    }
    else
    {
        $('#grand_total').val(grand_total)
        $('#grand_total2').text(grand_total)
    }

    var cash = $('#cash').val()
    cash != 0 ? $('#change').val(cash - grand_total) : $('#change').val(0)
    if(discount == '')
    {
        $('#discount').val(0)

    }
}


// para meter pertama berisi keyup adalah fungsi ketika ngetik , dan mouseup adalah fungsi  pas ngeklik pakai cursor atau mouse
                                // parameter ke 2 adalah inputan inputa yang di panggil beserta data inputannya,  
                                            // para meter ke 2 adalah function yang memanggil function yang telah di buat di atas nama functionyang di panggil adalah count_edit_modal()
$(document).on('keyup mouseup', '#discount, #cash', function() {
    //lalu function count_edit_modal ini di gunakan untuk membuat
    calculate()
})
$(document).ready(function() {
    // jika ini di panggil di sini saja maka tidak akan realtime, maka untuk mengatasi masalah ini kita tambahkan lagi function ini ke dalam functionload
    calculate()
})

// fungsi proses pembayaran
$(document).on('click', '#process_payment', function()
{
    var customer_id = $('#customer').val()
    var subtotal    = $('#sub_total').val()
    var discount    = $('#discount').val()
    var grandtotal  = $('#grand_total').val()
    var cash        = $('#cash').val()
    var change      = $('#change').val()
    var note        = $('#note').val()
    var date        = $('#date').val()

    if(subtotal < 1 )
    {
        alert('Belum ada Barang Produk Yang di pilih')
        $('#barcode').focus()
    }
    else if(cash < 1)
    {
        alert('Jumlah Uang cash Belum di masukan')
        $('#cash').focus()
    }
    else
    {
        if(confirm('Yakin memproses Transaksi Ini?'))
        {
            $.ajax({
                type: 'POST',
                url: '<?=site_url('sale/process')?>',
                data: {'process_payment': true, 'customer_id' : customer_id, 'subtotal' : subtotal, 'discount' : discount, 'grandtotal' : grandtotal, 'cash' : cash, 'change' :change, 'note' : note, 'date' : date},
                dataType: 'json',
                success: function(result)
                {
                    if(result.success)
                    {
                        alert('Transaksi Berhasil');
                        window.open('<?=site_url('sale/cetak/')?>'+result.sale_id, '_blank')
                    }
                    else
                    {
                        alert('transaksi Gagal');
                    }
                    location.href='<?=site_url('sale')?>'
                }
            })
        }
    }
})

$(document).on('click', '#cancel_payment', function() {
    if(confirm('Apakah anda yakin ingin membatalkannya?')) {
        $.ajax({
            type: 'POST',
            url: '<?=site_url('sale/cart_del')?>',
            data: {'cancel_payment' : true},
            dataType: 'json',
            success: function(result) {
                if(result.success == true) {
                    $('#cart_table').load('<?=site_url('sale/cart_data')?>', function() {
                        calculate()
                    })
                }
            }
        })
        $('#discount').val(0)
        $('#cash').val(0)
        $('#costumer').val(0).change()
        $('#barcode').val('')
        $('#barcode').focus()
        $('#total').text('')
    }
})
</script>