@extends('machiko.machiko_template')

@section('css')

@endsection
@section('content')
<div class="product-big-title-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="product-bit-title text-center">
                            <h2>Detail Produk</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

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
                    <span>{{ "Rp ".number_format($harga_pokok->harga_pokok,2, ',', '.') }} </span>  
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
                        <input type="hidden"  name="status" value="{{ $data->jenis }}">
                    
                        
               <div class="alert alert-success" style="font-family:Roboto;padding-bottom: 125px;padding-left: 15px;">
                {{ $data->status }}
                 <?php 
                        if( $data->jenis =="Ready Stock" && $b->st !=0){ ?>
                         
                         <div class="col-md-12">
                          <strong>Stok</strong><br/>
                        @foreach($ukuran2 as $row)  
                        
                        @if($row->nama_ukuran=="Tidak ada ukuran")
                        {{$row->stock}} <br/>
                        @else
                        {{$row->nama_ukuran}}  :  {{$row->stock}} <br/>
                        @endif
                        @endforeach
                        </div>   
                        <?php
                        } if( $data->jenis =="Ready Stock" && $b->st ==0){ ?>
                         
                         <div class="col-md-12">
                          <strong>Stok Habis</strong><br/>
                        
                        </div>   
                        <?php
                        }if(  $data->jenis=="PreOrder"&& count($a)!=0 && $riwayat->id_status_po == 1){ ?>
                        <div class="col-md-12">
                          <strong>Pre Order</strong><br/>
                        {{ $data->tgl_awal_po }} sampai {{ $data->tgl_akhir_po }}
                        </div> 
                    <?php
                        }if(  $data->jenis=="PreOrder"&& count($a)==0 && $riwayat->id_status_po != 1){ ?>
                         
                         <div class="col-md-12">
                          <strong>Pre order sudah tidak dibuka oleh admin</strong><br/>
                        
                        </div>   
                        <?php
                        }if(  $data->jenis=="PreOrder"&& count($a)!=0 && $riwayat->id_status_po != 1){ ?>
                         
                         <div class="col-md-12">
                          <strong>Pre order sudah tidak dibuka oleh admin</strong><br/>
                        
                        </div>   
                        <?php
                        }
                    ?>
                    <br/><br/>
               </div>
               
                   <div id="ukuran" style="display:block">
                  @if($b->st != 0 && $data->jenis=="Ready Stock")              
                    <div class="col-md-6"style="font-family:Roboto;padding-left:0px">
                      
                        Pilih Ukuran

                    </div>
                        <div class="col-md-4" style="padding-left:0px">

                            <div class="quantity buttons_added">
                               
                                <select class="form-control" name="id_produk_ukuran" style="border: 1px solid #66CC99;font-family:Roboto">
                                    @foreach($ukuran2 as $row)

                                     
                                    <option value="{{$row->id_produk_ukuran}}" >

                                        {{$row->nama_ukuran}}
                                        
                                    </option>
                                    
                                    
                                    @endforeach    
                                </select>
                            </div>
                            
                        </div>
                         </div>
                          @elseif($b->st == 0 && $data->jenis=="Ready Stock")
                          <!-- kosong               -->
                                    @elseif(  $data->jenis=="PreOrder"&& count($a)==0 && $riwayat->id_status_po !=1)
                                    @elseif(  $data->jenis=="PreOrder"&& count($a)!=0 && $riwayat->id_status_po !=1)
                                    @else
                                    <div class="col-md-6"style="font-family:Roboto;padding-left:0px">
                      
                        Pilih Ukuran

                    </div>
                        <div class="col-md-4" style="padding-left:0px">

                            <div class="quantity buttons_added">
                               
                                <select class="form-control" name="id_produk_ukuran" style="border: 1px solid #66CC99;font-family:Roboto">
                                    @foreach($ukuran as $row)

                                     
                                    <option value="{{$row->id_produk_ukuran}}" >

                                        {{$row->nama_ukuran}}
                                        
                                    </option>
                                   
                                    @endforeach    
                                </select>
                            </div>
                            
                        </div>
                         </div>
                                    @endif
                         @php
                         $i=1;
                         @endphp
                  @foreach($ukuran as $row)
               <input type="hidden" name="ukuuu" id="ukuuu{{$i}}" value="{{$row->nama_ukuran}}">
               @php
               $i++;
               @endphp
               @endforeach
               <!--  -->
               
               <!-- <div class="form-group">
                <?php 
                if($data->status=="Ready Stock"){?>
                <input type="number" name="jumlah" class="item_quantity" min="1" max="{{$data->stock_total}}"  value="1">
                <?php
                }else{?>
                <input type="number" name="jumlah" class="item_quantity" min="1" value="1">
                <?php }
                ?> -->
                
                
                <!-- <button type="submit" value="Submit" class="item_add btn btn-fefault cart" style="background:#66CC99">Masukan Ke Keranjang</button> -->
                     
                                    <?php if($b->st != 0 && $data->jenis=="Ready Stock"){?>
                                    <label>Jumlah:</label>
                                    <input type="number" name="jumlah" class="item_quantity" min="1" max="{{$data->stock_total}}"  value="1">
                                    <button type="submit" value="Submit" class="item_add btn btn-fefault cart" style="background:#66CC99">Masukan Ke Keranjang</button>

                                    
                                    <?php } ?>
                                    <?php if($b->st == 0 && $data->jenis=="Ready Stock"){?>
                                    
                                    <!-- <button type="submit" value="Submit" class="item_add btn btn-fefault cart" style="background:#66CC99">Masukan Ke Keranjang</button> -->
                                    <!-- <span>Stock Habis</span> -->
                                    
                                    <?php } ?>
                                    <?php if( $data->jenis=="PreOrder"&& count($a)!=0 && $riwayat->id_status_po == 1){?>
                                    <label>Jumlah:</label>
                                    <input type="number" name="jumlah" class="item_quantity" min="1"  value="1">
                                   <button type="submit" value="Submit" class="item_add btn btn-fefault cart" style="background:#66CC99">Masukan Ke Keranjang</button>

                                    
                                    <?php } ?>
                                    <?php if( $data->jenis=="PreOrder"&& count($a)==0 && $riwayat->id_status_po != 1){?>
                                    
                                   <!-- <button type="submit" value="Submit" class="item_add btn btn-fefault cart" style="background:#66CC99">Masukan Ke Keranjang</button> -->
                                   <!-- <span>Masa Pre-Order habis</span> -->
                                    
                                    <?php } ?>
                                     
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
           <script>
  @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
        
        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
  @endif
</script>
 <script type="text/javascript">
            $(document).ready(function (){
       
      var pembanding=false;
@php
            $i=1;
            
            @endphp
             
      var ukuuu = $('#ukuuu{{$i}}').val();
      // var status_pesan = $('#status_pesan').val();
      console.log(ukuran);
     if(ukuuu=="Tidak ada ukuran"){

        pembanding = true;
      }
      console.log(pembanding);
      
        
       @php
             $i++;
             
             @endphp
             if(pembanding==true){
              document.getElementById('ukuran').style.display = 'none';
             }if(pembanding==false ){
              document.getElementById('ukuran').style.display = 'block';
             }
             
     

            });
        
    </script>
            @endsection