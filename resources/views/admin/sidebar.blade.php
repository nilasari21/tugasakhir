<!-- Left side column. contains the sidebar -->

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset("/machikoo/img/mauedit.png")}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->name}}</p>
          <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
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
            
            <li class=""><a href="{{ url('beranda') }}"> <i class="fa fa-dashboard"></i><span>Beranda</span></a></li>
            <li><a href="{{ url('kategori') }}">  <i class="fa fa-list"></i><span>Kategori produk</span></a></li>
            <li><a href="{{ url('ukuran') }}">  <i class="fa fa-arrows"></i><span>Ukuran produk</span></a></li>    
            <li class="treeview">
                <a href="#"> <i><i class="fa fa-circle-o"></i> </i> <span>Produk</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('preorder')}}">Pre-order</a></li>
                    <li><a href="{{ url('readystock')}}">Ready Stock</a></li>
                </ul>
            </li>        
            <li class="treeview">
                <a href="#"> <i><i class="fa fa-cc-discover"></i> </i><span>Transaksi</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('transaksi') }}">Kelola transaksi</a></li>
                    <li><a href="{{ url('konfirmasibayar') }}">Kelola pembayaran</a></li>
                    <li><a href="{{ url('transaksi_reseller') }}">Transaksi reseller</a></li>
                    <li><a href="{{ url('pembayaran_cod') }}">Pembayaran COD</a></li>
                </ul>
            </li>
            <li><a href="{{ url('metode') }}"> <i class="fa fa-credit-card" ></i> <span>Metode Bayar</span></a></li>
            <!-- <li><a href="{{ url('customer')}}"> <i class="fa fa-user"></i> <span>User</span></a></li> -->
            <li class="treeview">
                <a href="#"> <i class="fa fa-user"></i><span>User</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('customer') }}">Data User</a></li>
                    <li><a href="{{ url('upgrade_user') }}">Upgrade user</a></li>
                    
                </ul>
            </li>
            <li><a href="{{ url('testimoniadmin')}}"> <i class="fa fa-commenting"></i> <span>Testimoni</span></a></li>
            <li><a href="{{ url('machikokstore')}}">  <i class="fa fa-home"></i><span>Toko</span></a></li>
        </ul> 
</section>
    
    --><!-- /.sidebar-menu
    </section>
    <!-- /.sidebar -->
</aside>