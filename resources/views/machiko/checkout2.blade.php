@extends('machiko.machiko_template')
@section('css')

<link rel="stylesheet" href="{{asset("/vendor/machikoo/bootstrap-3.2.0/dist/css/bootstrap.min.css")}}">
@endsection
@section('content')

<div class="single-product-area">
    <div class="zigzag-bottom">
    </div>
    <div class="container">
    <div class="col-sm-12">       
            <div class="form-group">
            <div class="panel panel-default">
            <div class="panel-heading" align="center" style="font-size:20px;background:#66CC99;font-family:Raleway"><b>Checkout Keranjang</b></div>
                <div class="panel-body">
                <!--  -->
                <div class="row" style="margin-top:15px">
                  <div class="col-md-12">
                                <div class="product-content-right">
                                    <div class="woocommerce">
                                        <form method="post" action="#" name="autoSumForm">
                                            <div class="table-responsive">
                                            <table cellspacing="0" class="shop_table cart" style="width:100%;align:center" >
                                                <thead >
                                                    <tr >

                                                        <th class="product-name" style="background:#66CC99;font-family:Raleway">Produk</th>
                                                        <th class="product-price" style="background:#66CC99;font-family:Raleway">Ukuran</th>
                                                        <th class="product-quantity" style="background:#66CC99;font-family:Raleway">Harga</th>
                                                        <th class="product-price" style="background:#66CC99;font-family:Raleway">Harga Tambah</th>
                                                        <th class="product-price" style="background:#66CC99;font-family:Raleway">Jumlah</th>
                                                        <th class="product-price" style="background:#66CC99;font-family:Raleway">Berat</th>
                                                        <th class="product-subtotal" style="background:#66CC99;font-family:Raleway">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                   @foreach ($keranjang as $b)
                                                     @php
                                                    $i=1
                                                    @endphp 
                                                    <tr class="cart_item">
                                                       <td class="product-name">
                                                            <a href="#">{{ $b->nama_produk }}</a> 

                                                        </td>
                                                       <?php 
                                                           if(count($b->nama_ukuran)==0){
                                                            ?>
                                                            <td class="product-price">
                                                                <span class="amount">-</span> 
                                                            </td>
                                                       <?php
                                                       }else{ ?>
                                                       <td class="product-price">
                                                            <span class="amount">{{ $b->nama_ukuran }}</span> 
                                                        </td>
                                                        <?php
                                                       }
                                                       ?>
                                                       <td class="product-price">
                                                            <span class="amount"  >{{ $b->harga }}</span> 
                                                        </td>
                                                        <?php 
                                                           if(count($b->nama_ukuran)==0){
                                                            ?>
                                                            <td class="product-price">
                                                                <span class="amount" >0</span> 
                                                            </td>
                                                       <?php
                                                       }else{ ?>
                                                        <td class="product-price">
                                                            <span class="amount" >{{ $b->harga_tambah }}</span> 
                                                        </td>
                                                        <?php
                                                       }
                                                       ?>
                                                       <td class="product-quantity">
                                                            <div class="quantity buttons_added">
                                                                
                                                                <input type="text" id="jumlah{{$i}}" value="{{ $b->jumlah }}" readonly>
                                                                <input type="hidden" id="minimal_beli{{$i}}" value="{{ $b->minimal_beli }}">
                                                                
                                                            </div>
                                                        </td>
                                                        <td class="product-name">
                                                            <span class="amount" >{{ $b->berat_total }} gram</span> 
                                                        </td>
                                                       <td class="product-subtotal" >
                                                            <span class="amount" >{{ $b->Total_harga }}</span> 
                                                        </td>
                                                    </tr>
                                                    @php
                                                    $i++
                                                    @endphp                                                    
                                                    @endforeach 
                                                   @foreach($beratharga as $b)
                                                     <tr>
                                                        <td colspan="9">
                                                            <label>Berat total</label>
                                                            <input type="text" class="form-control" id="berat" name="berat" value="{{ $b->berat }} " readonly>
                                                            gram
                                                        </td>                                                            
                                                    </tr>
                                                     @endforeach
                                                    
                                                    
                                                </tbody>
                                            </table>
                                            
                                        </div>
                                        </form>

                                      
                                    </div>                        
                                </div>                    
                            </div>
                <form class="form-horizontal" action="#" method="post">  
                    <input type="text" class="form-control" id="level" name="nama_produk" value="{{$data->level}}">
                    
                    <input type="text" class="form-control" id="user" name="nama_produk" value="{{$data->id}}">
                    <div class="form-group">
                     <!--  <div class="col-sm-3 control-label"> -->
                      <label for="inputName" class="col-sm-3 control-label" >Jenis pemesanan</label>  
                      <!-- </div> -->
                      <div class="col-sm-4">
                        <select class="form-control" style="width: 100%;" id="pesan" name="jenis_pesan" onChange="a()" data-toggle="modal" required/>
                            <option>Pilih jenis pemesanan</option>
                              <option value="Customer">Customer biasa</option>
                              <option value="Reseller" >Reseller</option>
                              <option value="Dropshipper">Dropshipper</option>
                        </select>
                        
                        <!-- modal -->
                          <div class="modal fade" id="modal" role="dialog">
                                <div class="modal-dialog">
                                
                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Upgrade user</h4>
                                    </div>
                                    <div class="modal-body">
                                      <input type="hidden" class="form-control" id="id" name="iduser" value="{{$data->id}}">
                                      <input type="hidden" class="form-control" id="getlevel" name="iduser" value="">
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
                              <!-- end of modal -->

                            <!-- modal -->
                          <div class="modal fade" id="modal2" role="dialog">
                                <div class="modal-dialog">
                                
                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Pemberitahuan</h4>
                                    </div>
                                    <div class="modal-body">
                                      <input type="hidden" class="form-control" id="id" name="iduser" value="{{$data->id}}">
                                      <input type="hidden" class="form-control" id="getlevel" name="iduser" value="">
                                      <p>Anda menggunakan pemesanan tidak sesuai dengan level user anda.</p>
                                      <p >Jika anda tetap memilih pilihan ini, anda harus menunggu persetujuan admin terlebih dahulu agar dapat melakukan pembayaran.
                                      </p>
                                      <p style="font-size:12px">Jika anda memilih Reseller, total pembayaran akan dihitung oleh admin (untuk mendapat potongan harga)
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-success" data-dismiss="modal">Ya</button>
                                      
                                    </div>
                                  </div>
                                  
                                </div>
                              </div>
                              <!-- end of modal -->
                               <!-- modal -->
                          <div class="modal fade" id="modal3" role="dialog">
                                <div class="modal-dialog">
                                
                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Pemberitahuan</h4>
                                    </div>
                                    <div class="modal-body">
                                      <input type="hidden" class="form-control" id="id" name="iduser" value="{{$data->id}}">
                                      <input type="hidden" class="form-control" id="getlevel" name="iduser" value="">
                                      <p>Anda menggunakan pemesanan tidak sesuai dengan level user anda.</p>
                                      <p >Jika anda tetap memilih pilihan ini, anda harus menunggu persetujuan admin terlebih dahulu agar dapat melakukan pembayaran setelah anda melakukan <i>checkout</i>.
                                      </p>
                                      <p>Reseller memiliki minimal pembelian tiap  barang. Jumlah barang anda tidak sesuai minimal pembelian. silahkan kembali ke keranjang
                                        atau gunakan jenis pemesanan lain.
                                      
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-success" data-dismiss="modal">Ya</button>
                                      
                                    </div>
                                  </div>
                                  
                                </div>
                              </div>
                              <!-- end of modal -->
                            </div> 
                        <div class="col-sm-4"  id="toko">
                          <input type="text" class="form-control" name="nama_produk" placeholder="Nama Toko" >
                        </div>                    
                      </div>

                    
                      <?php
                      if(count($data)==0){?>
                      <div class="form-group">
                      <label for="inputName" class="col-sm-3 control-label" >Tujuan Pengiriman</label>
                      <div class="col-sm-8">
                          <textarea style="border: 1px;width:100%;" disabled >Belum ada alamat </textarea>

                        </div>
                      </div>
                        <?php
                      }else{?>
                      <div class="form-group">
                      <label for="inputName" class="col-sm-3 control-label" >Tujuan Pengiriman</label>
                      <div class="col-sm-8">
                          <textarea style="border: 1px;width:100%;" disabled >{{$data->nama_penerima}}, {{$data->no_hp_penerima}}, {{$data->provinsi}}, {{$data->kabupaten}}, {{$data->kecamatan}}, {{$data->alamat_lengkap}}</textarea>
                          <input type="text" placeholder="ex : Bandung" name="kota" id="kota" required="" value="{{$data->kabupaten}}" class="form-control"/>
                          <input type="text" id="kota_asal"  name="kota_asal" value="" />
                        </div>
                        </div>

                        <div class="form-group">
                      <div class="col-sm-3 control-label">
                      </div>
                      <div class="col-sm-4">
                        <select class="form-control" style="width: 100%;" name="jenis_kelamin" />
                            <option>Pilih alamat lain</option>
                              @foreach($penerima as $row)
                                    <option value="{{$row->id_penerima}}" >
                                        {{$row->nama_alamat}}({{$row->nama_penerima}}/{{$row->alamat_lengkap}})
                                    </option>
                              @endforeach
                        </select>
                      </div>
                      <div class="col-sm-4">
                        <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="{{ url('testimoni/tambah') }}">Tujuan pengiriman baru</a>
                      </div>
                    </div>
                        <?php
                      }
                      ?>
                       <div class="form-group">
                        <label for="inputName" class="col-sm-3 control-label" >Metode pembayaran</label>
                        <div class="col-sm-4">
                        <select class="form-control" style="width: 100%;" name="metode" required/>
                            <option>Pilih metode pembayaran</option>
                              @foreach($metodebanyak as $row)
                                    <option value="{{$row->id}}" >
                                        {{$row->metode}}
                                    </option>
                              @endforeach
                        </select>
                        
                      </div>
                      </div>
                        <div class="form-group">
                      <div class="col-sm-3 control-label">
                      </div>
                      <div class="col-sm-4">
                        <div class="row" style="width: 500px; height: 50px; margin-left: 100px;">
                           <div class="radio-inline" >
                          <label>
                           <input type="radio" class="radio" name="optionsRadio" id="optionsRadios1" value="jne" >
                             JNE
                           </label>
                            </div>
                            <div class="radio-inline" >
                          <label>
                           <input type="radio" class="radio"name="optionsRadio" id="optionsRadios1" value="pos" >
                            POS
                           </label>
                            </div>

                           </div>
                      </div>
                      
                        <div class="col-sm-8">
                        <table cellspacing="0"  class="shop_table cart" style="width:100%;align:center" >
                          <thead >
                            <tr >
                              <th class="product-price" style="background:#66CC99;font-family:Raleway">&nbsp;</th>
                              <th class="product-price" style="background:#66CC99;font-family:Raleway">Jenis</th>
                              <th class="product-quantity" style="background:#66CC99;font-family:Raleway">Deskripsi</th>
                              <th class="product-price" style="background:#66CC99;font-family:Raleway">Estimasi sampai</th>
                              <th class="product-price" style="background:#66CC99;font-family:Raleway">Harga</th>
                              
                            </tr>
                          </thead>
                        <tbody id="ongkos">
                          <tr>
                              <td colspan="9">
                                                            
                                   Belum Cek ongkir                         
                            </td>
                          </tr>
                      </tbody>
                    </table>
                  </div>
                      
                    </div>
                    
                    @foreach($beratharga as $d)
                    <div class="form-group">
                      <label for="inputName" class="col-sm-3 control-label" >Total pembayaran</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" id="id" name="iduser" value="Rp {{$d->total}},00" readonly>
                      </div>
                      
                    </div>
                    @endforeach
                    
                    </div>
                      <div class="form-group">
                        <div class="col-sm-offset-5 col-sm-2">
                            <button type="submit" class="btn btn-success btn-block">Daftar</button>
                        </div>
                    </div>
                </form>   
                
  </div>

</div>
<!-- </body> -->
@endsection

@section('js')
<script src="{{asset("https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js")}}"></script>
    <script type="text/javascript">
    function a(){
                                                          @php
                                                    $i=1
                                                    @endphp 
      
      var option=document.getElementById('pesan').value;
      console.log(option);
      var level=document.getElementById('level').value;
      var jumlah = $('#jumlah{{$i}}').val();
      console.log(jumlah);
      var minimal_beli = $('#minimal_beli{{$i}}').val();
      console.log(minimal_beli);
      if(level=="Dropshipper" && option=="Customer"){
        $('#modal2').modal('show');
        var setlevel=document.getElementById('getlevel');
        setlevel.value=option;
      }
      if(level=="Customer" && option=="Dropshipper"){
        $('#modal').modal('show');
        var setlevel=document.getElementById('getlevel');
        setlevel.value=option;
      }
      if(level=="Reseller" && option!="Reseller" ){
        $('#modal2').modal('show');
        var setlevel=document.getElementById('getlevel');
        setlevel.value=option;
      }
      if(level=="Customer" && option=="Reseller" && jumlah != minimal_beli ){
        $('#modal3').modal('show');
        var setlevel=document.getElementById('getlevel');
        setlevel.value=option;
      }
      if(level=="Dropshipper" && option=="Reseller" && jumlah != minimal_beli ){
        $('#modal3').modal('show');
        var setlevel=document.getElementById('getlevel');
        setlevel.value=option;
      }
      if(level=="Customer" && option=="Reseller" && jumlah == minimal_beli ){
        $('#modal').modal('show');
        var setlevel=document.getElementById('getlevel');
        setlevel.value=option;
      }
      if(level=="Dropshipper" && option=="Reseller" && jumlah == minimal_beli ){
        $('#modal2').modal('show');
        var setlevel=document.getElementById('getlevel');
        setlevel.value=option;
      }
       if(level=="Customer" && option=="Customer" ){
        $('#modal3').modal('hide');
        
      }
      if(level=="Dropshipper" && option=="Dropshipper" ){
        $('#modal3').modal('hide');
        
      }
                                                          @php
                                                    $i++
                                                    @endphp 
     
    }
             
        
    </script>
   
    @endsection


