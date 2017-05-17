@extends('machiko.machiko_template')

    
    <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
    
@section('css')

<style type="text/css">
.pagination>.active>a, .pagination>.active>span, .pagination>.active>a:hover, .pagination>.active>span:hover, .pagination>.active>a:focus, .pagination>.active>span:focus {
    z-index: 2;
    color: #fff;
    cursor: default;
    background-color: #66CC99;
    border-color: #66CC99;
    font-family:"Roboto";
}
</style>
@endsection
@section('content')

<div class="single-product-area">

        <!-- <div class="zigzag-bottom"></div> -->
         <div class="container animated infinite slideInUp" style="animation-iteration-count: inherit;">
            @if(count($data))
             <div class="col-sm-3">
                <!-- <div class="left-sidebar">
                    <h2><p style="font-family:Roboto;color:#66CC99">Kategori</p></h2><br/>
                    <div class="panel-group category-products" id="accordian">
                       <div class="panel panel-default">
                                 @foreach($kategori as $kate)
                                 
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordian" href="{{url('kategori/'. $kate->id)}}">
                                   <li class="treeview">
                                        <a href="#">{{$kate->nama_kategori}}<i class="fa fa-angle-left pull-right"></i></a>
                                        <ul class="treeview-menu">
                                            <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/preorder') }}">Pre-order</a></li>
                                            <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/preorder') }}">Ready Stock</a></li>
                                            <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/preorder') }}">Semua</a></li>
                                           
                                        </ul>
                                    </li>
                                    <span class="label label-success pull-right"></span>
                                </a>
                            </h4>
                        </div>
                                  
                                  
                                  @endforeach
                        </div>
                    </div>
                </div> -->
                <div class="form-group">
            <div class="panel panel-default">
            <div class="panel-heading" align="center" style="font-size:20px"><b>Masuk </b></div>
               <div class="panel-body">
                <!--  -->
                <div class="row" style="margin-top:15px">
                <form class="form-horizontal" action="#" method="post">  
                    
                    
                    <!-- <div class="panel-group category-products" id="accordian">
                       <div class="panel panel-default"> -->
                                 @foreach($kategori as $kate)
                                 
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordian" href="{{url('kategori/'. $kate->id)}}">
                                   <li class="treeview">
                                        <a href="#">{{$kate->nama_kategori}}<i class="fa fa-angle-left pull-right"></i></a>
                                        <ul class="treeview-menu">
                                            <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/preorder') }}">Pre-order</a></li>
                                            <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/preorder') }}">Ready Stock</a></li>
                                            <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/preorder') }}">Semua</a></li>
                                           
                                        </ul>
                                    </li>
                                    <span class="label label-success pull-right"></span>
                                </a>
                            </h4>
                        </div>
                                  
                                  
                                  @endforeach
                        <!-- </div>
                    </div> -->

    </div>

</div>
            </div></div></div>
<div class="col-sm-9 padding-right">
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center"><p style="font-family:Roboto;color:#66CC99">Produk</p></h2>
        <br/> 
       <!-- <div class="row padding-right" > -->
                @foreach ($data as $row)
        <!-- <div class=" col-sm-4">
            <div class="thumbnail">
                <div class="hover01 column"> -->
        
                    
                        <div class="product-upper">
                            <div class=" col-md-4 col-sm-6 ">
            <div class="thumbnail">
                <div class="hover01 column"> 
                    <figure> <img src=".img/produk/client/{{ $row->foto }}" class="animated infinite slideInUp" style="width:200%;animation-iteration-count: inherit;transition-duration: 3s;"></figure>   
{{ $row->id }}
                </div>
                <div class="caption">
                </br>
            <!-- </br>
        </br>
    </br> -->
    <h4><p style="font-family:Roboto">{{ $row->nama_produk }}</p></h4>
    <h5><span>{{ "Rp ".number_format($row->harga,2, ',', '.') }} </span>  </h5>
    <p>
        <hr>
        <center>
            <form method="POST"  action="{{ url('wishlist/tambah') }}">
                        {{ csrf_field() }}
                            <input type="hidden" size="4" name="produk_id" value="{{ $row->id }}">
                            <button type="submit" class="add_to_cart_button " style="background:#F09BA0 !important;text-transform:capitalize !important"  value="Submit"  style="text-transform:capitalize;font-family:Raleway;padding: 11px 20px;"><i class="fa fa-heart" color="#0000" ></i> Tambah Wishlist</button><br/><br/>
                            <a class="add_to_cart_button "  style="background:#F09BA0 !important" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="{{ url('machikokstore/detailProduk/'.$row->id ) }}"><i class="fa fa-link"></i> Lihat Detail</a>
                        </form>
        </center>
        <hr>
    </p>
</div>
</div>
<p style="text-align:center;color:#66CC99;font-family:Roboto">
<a href="{{ url('machikokstore/detailProduk/'.$row->id ) }}"><strong>{{ $row->nama_produk }}</strong></a>
<br/>
<span>{{ "Rp ".number_format($row->harga,2, ',', '.') }} </span> 
</p>
 <br/>
 <br/>
</div>
</div>
@endforeach
<div align="center">
    {!! $data->render() !!}
    
</div>
@else
<div class="alert alert-danger">
  Oops.. Produk yang dicari Tidak Ditemukan
</div>
@endif
</div>
</div>




@endsection

@section('js')

<script>window.jQuery || document.write('<script src="{{ asset('vendor/adminlte') }}/plugins/jQuery/jQuery-2.2.3.min.js"><\/script>')</script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{ asset('vendor/adminlte') }}/bootstrap/js/bootstrap.min.js"></script>
   
@endsection

