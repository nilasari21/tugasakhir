@extends('machiko.machiko_template')


@section('content')
<div class="product-big-title-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="product-bit-title text-center">
                            <h2>Wishlist</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<div class="single-product-area">
        <!-- <div class="zigzag-bottom"></div> -->
        <div class="container animated infinite slideInUp" style="animation-iteration-count: inherit;">
<?php 
    if(count($data)==0){
?>
    Belum ada Wishlist
<?php
}else{ ?>
   
           <div class="col-sm-12 padding-right">
    <div class="features_items"><!--features_items-->
        
        <br/>
       <!-- <div class="row padding-right" > -->
                @foreach ($data as $row)
        <!-- <div class=" col-sm-4">
            <div class="thumbnail">
                <div class="hover01 column"> -->
        
                    
                        <div class="product-upper">
                            <div class=" col-md-3 col-sm-6 ">
            <div class="thumbnail">
                <div class="hover01 column"> 
                    <figure> <img src=".img/produk/client/{{ $row->foto }}" class="img-responsive" style="width:200%"></figure>   

                </div>
                <div class="caption">
                </br>
            <!-- </br>
        </br>
    </br> -->
    <h4><p style="font-family:Roboto">{{ $row->nama_produk }}</p></h4>
    <h5><p>Rp {{ $row->harga_pokok }},00</p></h5>
    <p>
        <hr>
        <center>
            <!-- <form method="POST"  action="{{ url('keranjang/delete/'.$row->id_wishlist) }}"> -->
                        <!-- {{ csrf_field() }} -->
                            <input type="hidden" size="4" name="produk_id" value="{{ $row->id_wishlist }}">
                            <a class="add_to_wishlist "  style="background:#F09BA0 !important" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="{{ url('wishlist/delete/'.$row->id_wishlist) }}"><i class="fa fa-remove"></i> Hapus Wishlist</a><br/><br/>
                            <a class="add_to_cart_button "  style="background:#F09BA0 !important" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="{{ url('machikokstore/detailProduk/'.$row->id ) }}"><i class="fa fa-link"></i> Lihat Detail</a>
                        <!-- </form> -->
        </center>
        <hr>
    </p>
</div>
</div>
<p style="text-align:center;color:#66CC99;font-family:Roboto">
<a href="{{ url('machikokstore/detailProduk/'.$row->id ) }}"><strong>{{ $row->nama_produk }}</strong></a>
<br/>
Rp {{ $row->harga_pokok }},00
</p>
 <br/>
 <br/>
</div>
</div>
@endforeach

        {{ session('id') }} 
</div>
</div>

<?php
}
?>
@endsection