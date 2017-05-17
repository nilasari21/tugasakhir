@extends('machiko.machiko_template')

@section('css')

@endsection
@section('content')
<div class="single-product-area">
        <!-- <div class="zigzag-bottom"></div> -->
        <div class="container animated infinite slideInUp" style="animation-iteration-count: inherit;">
           
            <div class="col-md-9 padding-right" style="width:100%">
        <div class="product-details"><!--product-details-->
        <div class="col-sm-3" style="padding-top:15%">
           <img class="img-zoom" src="{{asset("/.img/produk/client/". $data->foto )}}" >     
           <!-- <p>keterangan : {{$data->keterangan}}</p>    -->
    </div>
    <div class="category-tab shop-details-tab" ><!--category-tab-->
    <!-- <div class="col-sm-4">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#reviews" data-toggle="tab">Details</a></li>
        </ul>
    </div> -->
    <div class="tab-content">
        <div class="tab-pane fade active in" id="reviews" >
            <div class="col-sm-4" >
                <br />
                <h1 class="item_name" ><p style="font-family:Roboto;color:#66CC99">Keterangan</p></h1>
            <hr>
                <p style="text-align:justify">{{$data->keterangan}}</p>
                
            </div>
        </div>

    </div>
</div>
 
    <div class="col-sm-5 simpleCart_shelfItem anotherCart_shelfItem">
        <div class="product-information">
            <i class="item_thumb" style="display:none"></i>
            <i class="item_productid" style="display:none"></i>
            <i class="item_price" style="display:none"></i>
            <div>
              <h1 class="item_name" style="font-family:Roboto;color:#66CC99">{{ $data->nama_produk }}</h1><br/>
            <form method="POST"  action="{{ url('wishlist/tambah') }}">
                        {{ csrf_field() }}
                            <input type="hidden" size="4" name="produk_id" value="{{ $data->id }}">
                            <button type="submit" value="Submit" class="item_add btn btn-fefault cart" style="background:#66CC99">Tambah Wishlist</button>
                        </form>
            <p>
                <span>  
                    <span>{{ "Rp ".number_format($data->harga,2, ',', '.') }} </span>  
                </span>
           
            </p>
             <p style="font-family:Roboto">Berat : {{ $data->berat }} gram
             
             </p>
             <p style="font-family:Roboto">Minimal beli oleh reseller : {{ $data->minimal_beli }} item
             
             </p>

            <span>
                <form method="POST"  action="{{ url('keranjang/tambah') }}">
                        {{ csrf_field() }}
                        <input type="hidden" size="4" name="produk_id" value="{{ $data->id }}">
                        <input type="hidden"  name="status" value="{{ $data->status }}">
                    
                        
               <div class="alert alert-success" style="font-family:Roboto">
                {{ $data->status }}
                 <?php 
                        if( $data->status =="Ready Stock"){ ?>
                         
                         <div class="col-md-12">
                          <strong>Stok</strong>
                        {{ $data->stock_total }} item
                        </div>   
                        <?php
                        }else{ ?>
                        <div class="col-md-12">
                          
                        {{ $data->tgl_awal_po }} sampai {{ $data->tgl_akhir_po }}
                        </div> 
                    <?php
                        }
                    ?>
                    <br/><br/>
               </div>
                   <?php 
                        if( count($ukuran)==0){ ?>
                        <?php
                        }else{ ?>
                    <div>
                    <div class="col-md-6"style="font-family:Roboto;padding-left:0px">
                        Pilih Ukuran
                    </div>
                        <div class="col-md-4" style="padding-left:0px">

                            <div class="quantity buttons_added">
                                
                                <select class="form-control" name="id_produk_ukuran" style="border: 1px solid #66CC99;font-family:Roboto">
                                    
                                    @foreach($ukuran as $uku)
                                    <option value="{{$uku->id_detail}}" >
                                        {{$uku->nama_ukuran}}
                                        
                                    </option>

                                    @endforeach
                                </select>
                            </div>
                            
                        </div>
                         </div>
                    <?php
                        }
                    ?>
                    
                    
               <label>Jumlah:</label>
               <div class="form-group">
                <?php 
                if($data->status=="Ready Stock"){?>
                <input type="number" name="jumlah" class="item_quantity" min="1" max="{{$data->stock_total}}"  value="1">
                <?php
                }else{?>
                <input type="number" name="jumlah" class="item_quantity" min="1" value="1">
                <?php }
                ?>
                
                
                <button type="submit" value="Submit" class="item_add btn btn-fefault cart" style="background:#66CC99">Masukan Ke Keranjang</button>

          </div>

      </form>
  </span>

            </div>
            
            <!-- <hr>
            {!! $data->desc !!}
             -->
            
  
</div><!--/product-information-->
</div>
</div><!--/product-details-->


    

</div>

            
            @endsection

            @section('js')
           
            @endsection