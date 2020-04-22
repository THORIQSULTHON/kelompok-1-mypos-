<section class="content-header">
<h1> Dashboard 
    <small>Control Panel</small>
</h1>
<ol class="breadcrumb">
    <li><a href=""><i class="fa fa-dashboard"></i></a></li>
    <li class="active">Dashboard</li>
</ol>
</section>
<ol class="breadcrumb">
    <li><a href=""><i class="fa fa-dashboard"></i></a></li>
    <li class="active">Dashboard</li>
</ol>
</section>

<!-- Main Content -->
<Section class="content">
<div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-shopping-cart"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Items</span>
                                                        <!-- karna yang di panggil adalah libraries yang berbentuk objek maka memanggil classnya menggunakan $this  -->
                                                        <!-- pertama harus membuat functionnya di dalam file Fungsi.php di dalam folder libraries -->
              <span class="info-box-number"><?=$this->fungsi->count_item()?></span>
<!-- data function untuk angka atau jumlah dinamis di setiap Icon bar ini library Fungsi.php, di dalam folder Library -->
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-truck"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Suppliers</span>
                                                      <!-- silahkan liat penjelasannya di coment line 21 -->
              <span class="info-box-number"><?=$this->fungsi->count_supplier()?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Customers</span>
                                            <!-- silahkan liat penjelasannya di coment line 21 -->
              <span class="info-box-number"><?=$this->fungsi->count_customer()?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-user-plus"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Tambahkan User</span>
                                            <!-- silahkan liat penjelasannya di coment line 21 -->
              <span class="info-box-number"><?=$this->fungsi->count_user()?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
</Section>