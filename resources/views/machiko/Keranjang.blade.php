@extends('machiko.machiko_template')


@section('content')
<div class="modal fade" id="modal" role="dialog" >
                                <div class="modal-dialog">
                                
                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Upgrade user</h4>
                                    </div>
                                    <div class="modal-body">
                                      
                                      <input type="text" class="form-control" id="getlevel" name="iduser" value="">
                                      <p>Anda menggunakan pemesanan tidak sesuai dengan level user anda. Apakah anda ingin mengupgrade level user?</p>
                                      <p style="font-size:12px">Catatan: Perubahan level user memerlukan persetujuan admin. Mohon tunggu sampai admin menyetujui permintaan perubaha level.
                                        Pembayaran hanya dapat dilakukan apabila permintaan telah disetujui.</p>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-success" data-dismiss="modal">Ya</button>
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                                    </div>
                                  </div>
                                  
                                </div>
                              </div>
<p id="demo"></p>
<div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container animated infinite slideInUp" style="animation-iteration-count: inherit;">
             <div class="col-md-12">
                                <div class="product-content-right">
                                    <div class="woocommerce">
                                        <form method="post" action="{{url('keranjang/edit')}}" >
                                            <div class="table-responsive">
                                            <table cellspacing="0" class="shop_table cart" style="width:100%;align:center" >
                                                <thead >
                                                    <tr >
                                                        <th class="product-remove" style="background:#66CC99">&nbsp;</th>
                                                        <th class="product-thumbnail" style="background:#66CC99">Foto</th>
                                                        <th class="product-name" style="background:#66CC99">Produk</th>
                                                        <th class="product-price" style="background:#66CC99">Ukuran</th>
                                                        <th class="product-quantity" style="background:#66CC99">Harga</th>
                                                        <th class="product-price" style="background:#66CC99">Harga Tambah</th>
                                                        <th class="product-price" style="background:#66CC99">Jumlah</th>
                                                        <th class="product-price" style="background:#66CC99">Berat total(gram)</th>
                                                        <th class="product-subtotal" style="background:#66CC99">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                   <?php 
                                                   if(count($data)==0){?>
                                                    <tr>
                                                        <td colspan="9">
                                                            <strong>Belum ada data</strong>
                                                            
                                                            </td>
                                                    </tr>
                                                   <?php }else{ ?>
                                                    @php
                                                    $i=1
                                                    @endphp
                                                    @foreach ($data as $row)
                                                    <input name="level" type="text" id="level"  value="{{$row->level}}" style="width:100px">
                                                    <tr class="cart_item">
                                                        <td class="product-remove">
                                                            <a title="Remove this item" class="remove" href="{{ url('keranjang/delete/'.$row->id_keranjang) }}" onclick="return confirm('Anda yakin ingin menghapus .$row->nama_produk?')">×</a> 
                                                        </td>

                                                        <td class="product-thumbnail">
                                                            <a href="#"><img src="{{asset("/.img/produk/client/$row->foto" )}}"></a>
                                                        </td>

                                                        <td class="product-name">
                                                            <a href="#">{{ $row->nama_produk }}</a> 
                                                            <input name="status[]" type="hidden" id="status"  value="{{$row->status}}" style="width:100px"readonly>
                                                            <input name="idproduk[{{$i}}]" type="text" id="idproduk"  value="{{$row->id}}" style="width:100px"readonly>
                                                            <input name="min_beli" type="text" id="min_beli{{$i}}"  value="{{$row->minimal_beli}}" style="width:100px"readonly>
                                                            <input name="stock" type="text" id="stock"  value="{{$row->stock_total}}" style="width:100px"readonly>
                                                        </td>
                                                       <?php 
                                                           if(count($row->nama_ukuran)==0){
                                                            ?>
                                                            <td class="product-price">
                                                                <span class="amount">-</span> 
                                                            </td>
                                                       <?php
                                                       }else{ ?>
                                                       <td class="product-price">
                                                            <span class="amount">{{ $row->nama_ukuran }}</span> 
                                                        </td>
                                                        <?php
                                                       }
                                                       ?>
                                                       
                                                       {{ csrf_field() }}

                                                        <input name="idkeranjang[{{$i}}]" type="hidden" id="idkeranjang"  value="{{$row->id_keranjang}}" style="width:100px"readonly>
                                                         <td class="product-price">
                                                            <span class="amount"  ><input type="hidden" name="harga[]" id="nilai2{{$i}}" value="{{ $row->harga }}" onFocus="startCalc();" onBlur="stopCalc();">{{ $row->harga }}</span> 
                                                        </td>
                                                        <?php 
                                                           if(count($row->nama_ukuran)==0){
                                                            ?>
                                                            <td class="product-price">
                                                                <span class="amount" ><input type="hidden" id="nilai3{{$i}}" name="harga_tambah[]" value="0" onFocus="startCalc();" onBlur="stopCalc();">0</span> 
                                                            </td>
                                                       <?php
                                                       }else{ ?>
                                                        <td class="product-price">
                                                            <span class="amount" ><input type="hidden" name="harga_tambah[]" id="nilai3{{$i}}"  onFocus="startCalc();" onBlur="stopCalc();" value="{{ $row->harga_tambah }}" >{{ $row->harga_tambah }}</span> 
                                                        </td>
                                                        <?php
                                                       }
                                                       ?>

                                                       <td class="product-quantity">
                                                            <div class="quantity buttons_added">
                                                                
                                                                <input type="number" id="nilai1{{$i}}" name="jumlah1[]" class="item_quantity" min="1"  max="{{$row->stock_total}}" value="{{ $row->jumlah }}">
                                                                <input name="jumlahawal[]" type="text" id="jumlahawal"  value="{{$row->jumlah}}" style="width:100px"readonly>
                                                                <input name="jumlah2" type="text" id="jumlah2{{$i}}"  value="{{$row->jumlah}}" style="width:100px"readonly>
                                                            </div>
                                                        </td>
                                                        <td class="product-name">
                                                            
                                                            <span class="amount" ><input name="berat[]" type="text" id="berat{{$i}}"  value="{{ $row->berat }} " style="width:70px" readonly></span> 
                                                            <span class="amount" ><input name="berat2[]" type="text" id="beratto{{$i}}"  value="" style="width:70px" readonly></span> 
                                                        </td>
                                                       <td class="product-subtotal" >
                                                            <span class="amount" ><input name="total[]" type="text" id="total{{$i}}"  value="" style="width:100px" readonly></span> 
                                                        </td>
                                                    </tr>
                                                    @php
                                                    $i++
                                                    @endphp
                                                    @endforeach
                                                    <tr>
                                                        <td colspan="9">
                                                            <strong>Total(belum termasuk ongkos kirim)</strong>
                                                            <input name="totalb" type="text" id="jumlah"  value="" style="width:100px"readonly>

                                                    </tr>
                                                     <tr>
                                                        <td colspan="9">
                                                            <strong>Berat total</strong>
                                                            <input name="btotal" type="text" id="total_berat"  value="" style="width:100px" readonly>gram
                                                            </td>
                                                        </tr>
                                                    <tr>
                                                        <td class="actions" colspan="9">
                                                            <!-- <input type="submit" value="Update Cart" name="update_cart" class="button" style="background:#66CC99"> -->
                                                            <button type="submit" class="add_to_cart_button" value="submit" style="background:#66CC99;text-transform: capitalize;height:35px;padding: 5px 5px;font-family:Raleway;font-size:15px; "> Update keranjang</button>
                                                            
                                                       </form>
                                        
                                                        <a class="add_to_cart_button" onClick="b()" id="buttoncheckout" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="#">Checkout</a>
                                                        </td>

                                                    </tr>
                                                    
                                                       
                                                        <?php
                                                    }
                                                   ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        

                                      
                                    </div>                        
                                </div>                    
                            </div>
            
            @endsection

            @section('js')
            <script type="text/javascript">
            $(document).ready(function (){
            @php
            $i=1;
            
            @endphp
            var  total=0;
            var  berat_total=0;
            @foreach ($data as $row)

            var satu = document.getElementById("nilai1{{$i}}").value; 
             console.log(satu);
            var dua = document.getElementById("nilai2{{$i}}").value; 
            console.log(dua);
             var tiga = document.getElementById("nilai3{{$i}}").value; 
             console.log(tiga);
             var berat = document.getElementById("berat{{$i}}").value; 
             console.log(berat);
             var beratto=document.getElementById("beratto{{$i}}").value=(parseInt(satu)* parseInt(berat));
             console.log(beratto);
             var hasil = document.getElementById("total{{$i}}").value=( parseInt(satu)* parseInt(dua))+ (parseInt(tiga)*parseInt(satu));

             console.log(hasil);
             total=total+( parseInt(satu)* parseInt(dua))+ (parseInt(tiga)*parseInt(satu));
             document.getElementById("jumlah").value=total;
             console.log(total);
             berat_total=berat_total+( parseInt(beratto));
             document.getElementById("total_berat").value=berat_total;
             console.log(berat_total);
             @php
             $i++;
             
             @endphp
             @endforeach

        });
             
        
    </script>
 <script type="text/javascript">
        function b(){
        var level=document.getElementById('level').value;
        console.log(level);
        var pembanding=false;                                          
               @php
                 $i=1;
               foreach($data as $a){
                @endphp
              var minimal_beli = $('#min_beli{{$i}}').val();
              console.log({{$i}});
              console.log(minimal_beli);
              var jumlah = $('#jumlah2{{$i}}').val();
              console.log(jumlah);
              if(jumlah< minimal_beli){

                pembanding = true;
              }
              console.log(pembanding);
              @php 
              $i++; }
              @endphp

            if(pembanding==true && ( level=="Dropshipper" || level=="Customer")){
                
                window.location.href = "{{ url('checkout/2') }}";
          
            }
           if(pembanding==false && ( level=="Reseller" || level=="Dropshipper" || level=="Customer")){
               
                window.location.href = "{{ url('checkout/2') }}";
              
              }
              if(pembanding==true && level =="Reseller"){
                $('#modal').modal('show');

              }

          
        };
       </script>
    @endsection