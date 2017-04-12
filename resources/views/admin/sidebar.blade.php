<!-- Left side column. contains the sidebar -->

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="adminlte/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
                   
        <!-- search form (Optional) -->
        <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
<span class="input-group-btn">
  <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
</span>
            </div>
        </form> -->
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            
            <li class=""><a href="{{ url('beranda') }}"> <span>Beranda</span></a></li>
            <li><a href="{{ url('kategori') }}">  <span>Kategori produk</span></a></li>
            <li><a href="{{ url('ukuran') }}">  <span>Ukuran produk</span></a></li>    
            <li class="treeview">
                <a href="#">  <span>Produk</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="preorder">Pre-order</a></li>
                    <li><a href="readystock">Ready Stock</a></li>
                </ul>
            </li>        
            <li class="treeview">
                <a href="#">  <span>Transaksi</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#">Kelola transaksi</a></li>
                    <li><a href="#">Kelola pembayaran</a></li>
                    <li><a href="#">Transaksi reseller</a></li>
                </ul>
            </li>
            <li><a href="{{ url('metode') }}">  <span>Metode Bayar</span></a></li>
            <li><a href="customer">  <span>User</span></a></li>
            <li><a href="testimoni">  <span>Testimoni</span></a></li>
            <li><a href="toko">  <span>Toko</span></a></li>
        </ul> 

    
    --><!-- /.sidebar-menu
    </section>
    <!-- /.sidebar -->
</aside>