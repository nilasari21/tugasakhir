
<header class="main-header">
 <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">

                        <ul>
                           

                            <li><a href="{{ url('machikokstore') }}"><img src="{{asset("/machikoo/img/mauedit.png")}}" width="60px" height="60px" ><span>  Machiko K-Store</span></a></li>
                           
                            <li><a href="{{ url('wishlist') }}"><i class="fa fa-heart"></i> Wishlist</a></li>
                            <li><a href="{{ url('keranjang') }}"><i class="fa fa-shopping-cart"></i> Keranjang</a></li>
                           
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="header-right" style="padding-top:5%">
                        <div class="user-menu">
                        <ul class="list-unstyled list-inline">
                            
                            @if (Auth::guest())
                            <li><a href="{{ url('masuk') }}"><i class="fa fa-sign-in"></i> Masuk</a></li>
                            <li><a href="{{ url('daftar') }}"><i class="fa  fa-sign-out"></i> Daftar</a></li>
                            @else
                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key"><i class="fa fa-user"></i> Profil </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ url('profil') }}">Lihat profil</a></li>
                                    <li><a href="{{ url('konfirmasi') }}">Konfirmasi pembayaran</a></li>
                                    <li><a href="{{ url('status_pesan') }}">Status pemesanan</a></li>
                                    <li> <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Keluar
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form></li>
                                </ul>
                                @endif
                            </li>
                        </ul>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End header area -->
 
    

    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div> 
                <div class="navbar-collapse collapse" >
                    <ul class="nav navbar-nav">

                        <li><a href="{{ url('machikokstore') }}">Produk</a></li>
                        <li ><a href="{{ url('cekongkir') }}">Ongkos Kirim</a></li>
                        <li><a href="{{ url('testimoni') }}">Testimoni</a></li>
                        <li><a href="{{ url('about') }}">Tentang Kami</a></li>
                        <li><a href="{{ url('faq') }}">Bantuan</a></li>
                        <li>
                            <div class="col-sm-4" style="float:right" >
                                <form action="{{ url('pencarian') }}" method="GET" style="margin-top:8px; width:300px">
                                    <div class="input-group">
                                        <input type="search" name="cari" class="form-control" placeholder="Cari Produk..."/>
                                        <span class="input-group-btn">
                                        <button type='submit'  class="btn btn-flat" style="padding:7px 20px;"><i class="fa fa-search"></i></button>
                                        </span>
                                    </div>
                                </form> 
                            </div>
                        </li>
                        <!-- <li>
                            
                                    <a href="{{ url('wishlist') }}" ><i class="fa fa-heart" color="#0000" ></i></a>
                            
                        </li> -->
<!--                         <li>
                            
                                    <a href="{{ url('keranjang') }}"><i class="fa fa-shopping-cart" color="#0000" ></i></a>

                        </li>
 -->                       <!--  <li>
                            <a href="#"><img src="machikoo/img/user.jpg" width="20px" height="20px"></a>
                        </li> -->
                    <!-- <li class="dropdown user user-menu" >
                        
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        
                            <img src="{{asset("vendor/machikoo/img/user.jpg")}}" width="20px" height="20px">
                        </a>
                        <ul class="dropdown-menu" style="background:#F09BA0">
                        
                            <li ><a href="#">Profil</a></li>
                            <li ><a href="#">Konfirmasi Pembayaran</a></li>
                            <li><a href="#">Status Pemesanan</a></li>
                            <li><a href="#">Keluar</a></li>
                            
                        </ul>
                    </li> -->
                    <!-- <li><a href="{{ url('daftar') }}">Daftar</a></li>
                    <li><a href="{{ url('masuk') }}">Masuk</a></li> -->
                    </ul>
                </div>  
            </div>
        </div>
    </div> <!-- End mainmenu area -->

    <div class="product-big-title-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="product-bit-title text-center">
                            <h2>Shop</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
  </header>  