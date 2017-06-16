@extends('machiko.machiko_template')
@section('css')

<link rel="stylesheet" href="{{asset("/machikoo/bootstrap-3.2.0/dist/css/bootstrap.min.css")}}">
<style type="text/css">

.autocomplete-suggestion {
    background: white!important;
}
</style>
@endsection
@section('content')
<div class="modal fade" id="cod" role="dialog" style="padding-top:100px" aria-hidden="true">
                                <div class="modal-dialog">
                                
                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Pemberitahuan</h4>
                                    </div>
                                    <div class="modal-body">
                                      
                                      <p>Mohon maaf, metode pembayaran melalui COD hanya berlaku untuk wilayah Daerah Istimewa Yogyakarta. Silahkan pilih metode pembayaran lain. Terimakasih</p>
                                      
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-success" data-dismiss="modal">Ya</button>
                                      
                                    </div>
                                  </div>
                                  
                                </div>
                              </div>
                            </div>
<!--  -->
<div class="product-big-title-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="product-bit-title text-center">
                            <h2>Checkout</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if(session()->has('message'))
    <!-- <div class="alert alert-success">
        {{ session()->get('message') }}
    </div> -->
    <div class="alert alert-danger">
        {{ session()->get('message') }}
    </div>
@endif
<div class="single-product-area">
    <!-- <div class="zigzag-bottom">
    </div> -->
    <div class="container animated infinite slideInUp" style="animation-iteration-count: inherit;">
    <div class="col-sm-12">       
            <div class="form-group">
            <div class="panel panel-default">
            <div class="panel-heading" align="center" style="font-size:20px;background:#66CC99;font-family:Raleway"><b>Checkout Keranjang</b></div>
                <div class="panel-body">
                
                <div class="row" style="margin-top:15px">
                  <div class="col-md-12">
                                <div class="product-content-right">
                                    <div class="woocommerce">
                                        <form method="post" action="#" name="autoSumForm">
                                            <div class="table-responsive" style="display:block">
                                            <table cellspacing="0" class="shop_table cart" style="width:100%;align:center" >
                                                <thead >
                                                    <tr >

                                                        <th class="product-name" style="background:#66CC99;font-family:Raleway">Produk</th>
                                                        <th class="product-price" style="background:#66CC99;font-family:Raleway">Ukuran</th>
                                                        <th class="product-quantity" style="background:#66CC99;font-family:Raleway">Harga</th>
                                                        <th class="product-price" style="background:#66CC99;font-family:Raleway">Harga Tambah</th>
                                                        <th class="product-price" style="background:#66CC99;font-family:Raleway">Jumlah</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                   @php
                                                    $i=1
                                                    @endphp
                                                   @foreach ($keranjang as $b)
                                                     
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
                                                            <span class="amount"  >{{ $b->harga_pokok }}</span> 
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
                                                                {{ $b->jumlah }}
                                                                <input type="hidden" id="jumlah{{$i}}" value="{{ $b->jumlah }}" readonly>
                                                                <input type="hidden" id="minimal_beli{{$i}}" value="{{ $b->minimal_beli }}">
                                                                
                                                            </div>
                                                        </td>
                                                    </tr></tr>
                                                    @php
                                                    $i++
                                                    @endphp                                                    
                                                    @endforeach 
                                                   @foreach($beratharga as $b)
                                                     <tr>
                                                        <td colspan="9">
                                                            
                                                              
                                                                <label>Berat total</label>   {{ $b->berat }} gram
                                                            
                                                          
                                                            
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
                <form class="form-horizontal" action="{{ url('checkout/simpan') }}" method="post">
                  {{ csrf_field() }}
                <input type="hidden" class="form-control" id="berat" name="berat" value="{{ $b->berat }} " readonly>  
                    <input type="hidden" class="form-control" id="level" name="level" value="{{$data->level}}">
                    <input type="hidden" class="form-control" id="status" name="status" value="">
                    <input type="hidden" class="form-control" id="user" name="nama_produk" value="{{$data->id}}">
                    <input type="hidden" class="form-control" id="konfirm_admin" name="konfirm_admin" value="{{Auth::user()->konfirm_admin}}">
                    <div class="form-group">
                     <!--  <div class="col-sm-3 control-label"> -->
                      <!-- <label for="inputName" class="col-sm-3 control-label" >Jenis pemesanan</label>   -->
                      <!-- </div> -->
                      <!-- <div class="col-sm-4">
                        
                        <select class="form-control" style="width: 100%;" id="pesan" name="jenis_pesan" onChange="a()" data-toggle="modal" required/>
                            <option>Pilih jenis pemesanan</option>
                              <option value="Customer">Customer biasa</option>
                              <option value="Reseller" >Reseller</option>
                              <option value="Dropshipper">Dropshipper</option>
                        </select>

                       
                              
                            </div> --> 
<!-- {{Auth::user()->level}} -->
                        <div class="col-sm-4"  id="toko">
                          <input style="display:none" type="text" class="form-control" id="nama_toko" name="nama_toko" placeholder="Nama Toko" >

                        </div>                    
                      </div>

                    
                      
                      @if(count($penerima)==0)
                      <div class="form-group">
                      <label for="inputName" class="col-sm-3 control-label" >Tujuan Pengiriman</label>
                      <div class="col-sm-8">
                          <textarea style="border: 1px;width:100%;" disabled >Belum ada alamat </textarea>

                        </div>
                      </div>
                      <div class="col-sm-3 control-label">
                      </div>

                         <div class="col-sm-4">
                        <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="{{ url('checkout/alamatbaru/'.Auth::user()->id) }}">Tujuan pengiriman baru</a>
                      </div>
                      <div class="col-sm-4 control-label">
                      </div>
                      <div class="col-sm-12 control-label">
                      </div>
                      @else
                      <div class="form-group">
                      <label for="inputName" class="col-sm-3 control-label" >Tujuan Pengiriman</label>
                      <div class="col-sm-8">
                          <input type="hidden" placeholder="ex : Bandung" name="idpenerima" id="idpenerima" required="" value="{{$data2->id_penerima}}" class="form-control"/>
                          <textarea id="alamat" rows='3'style="border: 1px;width:100%;" value="" disabled >{{$data2->nama_penerima}}&#13;&#10;{{$data2->no_hp_penerima}},&#13;&#10;{{$data2->alamat_lengkap}}, {{$data2->kabupaten}}, {{$data2->provinsi}} </textarea>
                          <input type="hidden" placeholder="ex : Bandung" name="kota" id="kota" required="" value="{{$data2->kabupaten}}" class="form-control"/>
                          <input type="hidden" id="kota_asal" name="kota_asal" value="" />
                          <input type="hidden" id="kabu"  name="kabu" value="{{$data2->kabupaten}}" />
                        </div>
                        </div>

                        <div class="form-group">
                      <div class="col-sm-3 control-label">
                      </div>
                      <div class="col-sm-4">
                        <select class="form-control" style="width: 100%;" onChange="getAlamat();getOngkir();" id="alamat_pilih" name="alamat_pilih" />
                            <option>Pilih alamat lain</option>
                              @foreach($penerima as $row)
                                    <option value="{{$row->kabupaten}}" >
                                        {{$row->nama_alamat}}
                                    </option>
                              @endforeach
                        </select>
                      </div>
                      <div class="col-sm-4">
                        <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="{{ url('checkout/alamatbaru/'.Auth::user()->id) }}">Tujuan pengiriman baru</a>
                      </div>
                    </div>
                        @endif
                       <div class="form-group">
                        <label for="inputName" class="col-sm-3 control-label" >Metode pembayaran</label>
                        <input type="hidden" class="form-control" id="metode_pilih" name="metode_pilih" value="">
                        <input type="hidden" class="form-control" id="jenis_metode" name="jenis_metode" value="">
                        <div class="col-sm-4">
                        <select class="form-control" style="width: 100%;" onChange="b();span();getTotal();" id="metode" name="metode" required/>
                            <option value="Pilih">Pilih metode pembayaran</option>
                              @foreach($metodebanyak as $row)
                                    <option value="{{$row->id}}" >
                                        {{$row->metode}}
                                    </option>
                              @endforeach
                        </select>
                        
                      </div>
                      <span id="span" style="display:none">Anda memilih metode pembayaran pulsa, maka total pembayaran akan dikalikan rate</span>
                      </div>
                      <div class="form-group" style="display:none" id="ratee">
                        <label for="inputName" class="col-sm-3 control-label" >Rate</label>
                        <div class="col-sm-4">
                        <input type="text" class="form-control" id="rate" name="rate" value="" readonly>
                        </div>
                      </div>
                        <div class="form-group">
                      
                      <div class="col-sm-12">
                        <div class="col-sm-2">
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
                                                            
                                   Mohon tunggu untuk menampilkan kurir                        
                            </td>
                          </tr>
                      </tbody>

                     
                      <!-- <tbody id="ongkos3" colspan="4" style="display:none"> -->
                          <tr><td id="ongkos2"  ><input type="radio" id="ongkir" name="ongkir" colspan="5" onChange="pecah2();getTotal();"value="0,COD" class="ongkir"></td>
                    <!-- <td></td> -->
                    <td style="color:#000" colspan="4" >COD (Hanya berlaku untuk Yogyakarta dan sekitarnya)</td>
                    </tr>
                    
                      </tbody>
                    </table>
                  </div>
                      </div>
                      
                      
                    </div>
                    <input type="hidden" id="kurir" name="kurir"  value="" class="ongkir" style="display:none">
                    @foreach($beratharga as $d)
                    <div class="form-group">
                      <label for="inputName" class="col-sm-3 control-label" >Total pembayaran</label>
                      <div class="col-sm-4">
                        <input type="hidden" class="form-control" id="total1" name="total" value="{{$d->total}}" readonly>
                        <input type="hidden" class="form-control" id="total2" name="total" value="{{$d->total}}" readonly>
                        <input type="text" class="form-control" id="total" name="total" value="{{$d->total}}" readonly>
                        <input type="hidden" class="form-control" id="total3" name="total3" value="{{$d->total}}" readonly>
                      </div>
                      
                    </div>
                    @endforeach
                    <div class="col-sm-2">
                    </div>
                    <div class="col-sm-6">
                    <span>Silahkan cek kembali daftar belanja dan form yang anda isi sebelum memilih tombol Checkout</span>
                  </div>
                    </div>

                      <div class="form-group">
                        <div class="col-sm-offset-5 col-sm-2">

                            <button type="submit" class="btn btn-success btn-block" style="background:#66CC99;font-family:Raleway">Checkout</button>
                        </div>
                    </div>
                </form>   
                
  </div>

</div>
<!-- </body> -->

@endsection

@section('js')

    <script type="text/javascript">
   $(document).ready(function(){
    var pembanding=false;                                          
       @php
         $i=1;
       foreach($keranjang as $a){
        @endphp
      var minimal_beli = $('#minimal_beli{{$i}}').val();
      console.log({{$i}});
      console.log(minimal_beli);
      var jumlah = $('#jumlah{{$i}}').val();
      console.log(jumlah);

                                                          
      
      
      var level=document.getElementById('level').value;
      if(jumlah< minimal_beli){

        pembanding = true;
      }
      console.log(pembanding);
      @php 
      $i++; }
      @endphp
      if(pembanding==true){
        if(level=="Reseller"){
        var status_pesan = document.getElementById('status');
        console.log(status_pesan);
        status_pesan.value="Tunggu";  
        console.log(status_pesan);
        }
        if(level=="Customer"){
        var status_pesan = document.getElementById('status');
        console.log(status_pesan);
        status_pesan.value="Terima";  
        }
        if(level=="Dropshipper"){
        var status_pesan = document.getElementById('status');
        console.log(status_pesan);
        status_pesan.value="Terima";  
        }
      }
      if (pembanding==false) {
        if(level=="Reseller"){
        var status_pesan = document.getElementById('status');
        console.log(status_pesan);
        status_pesan.value="Terima";  
        }
        if(level=="Customer"){
        var status_pesan = document.getElementById('status');
        console.log(status_pesan);
        status_pesan.value="Terima";  
        }
        if(level=="Dropshipper"){
        var status_pesan = document.getElementById('status');
        console.log(status_pesan);
        status_pesan.value="Terima";  
        }
      }
   })
                                                  
      
      /*if(pembanding==true){




      
      if(level=="Customer" && option=="Reseller" ){
        $('#modal3').modal('show');
        var setlevel=document.getElementById('getlevel');
        setlevel.value=option;
        var status_pesan = document.getElementById('status');
        console.log(status_pesan);
        status_pesan.value="Tunda";
        document.getElementById('nama_toko').style.display = 'none';
      }
      if(level=="Dropshipper" && option=="Reseller" ){
        $('#modal3').modal('show');
        var setlevel=document.getElementById('getlevel');
        setlevel.value=option;
        status.value="Tunda";var status_pesan = document.getElementById('status');
        console.log(status_pesan);
        status_pesan.value="Tunda";
        document.getElementById('nama_toko').style.display = 'none';
      }
if(level=="Reseller" && option=="Reseller"){
        $('#modal4').modal('show');
        var status_pesan = document.getElementById('status');
        
        status_pesan.value="Terima";
        console.log(status_pesan);
        document.getElementById('nama_toko').style.display = 'none';

        
      }
      
       
     }if(pembanding==false){
      
      if(level=="Customer" && option=="Reseller"  ){
        $('#modal').modal('show');
        var setlevel=document.getElementById('getlevel');
        setlevel.value=option;
        var status_pesan = document.getElementById('status');
        console.log(status_pesan);
        status_pesan.value="Tunda";
        document.getElementById('nama_toko').style.display = 'none';
      }
      if(level=="Dropshipper" && option=="Reseller"  ){
        $('#modal2').modal('show');
        var setlevel=document.getElementById('getlevel');
        setlevel.value=option;
        var status_pesan = document.getElementById('status');
        console.log(status_pesan);
        status_pesan.value="Tunda";
        document.getElementById('nama_toko').style.display = 'none';
      }
     }
     if(level=="Customer" && option=="Customer" ){
        $('#modal3').modal('hide');
        var status_pesan = document.getElementById('status');
        console.log(status_pesan);
        status_pesan.value="Terima";
        document.getElementById('nama_toko').style.display = 'none';
      }
      if(level=="Dropshipper" && option=="Dropshipper" ){
        $('#modal3').modal('hide');
        var status_pesan = document.getElementById('status');
        console.log(status_pesan);
        status_pesan.value="Terima";
        document.getElementById('nama_toko').style.display = 'block';

        
      }
      
     if(level=="Dropshipper" && option=="Customer"){
        $('#modal2').modal('show');
        var setlevel=document.getElementById('getlevel');
        setlevel.value=option;
        var status_pesan = document.getElementById('status');
        console.log(status_pesan);
        status_pesan.value="Tunda";
        document.getElementById('nama_toko').style.display = 'none';
      }
      if(level=="Customer" && option=="Dropshipper"){
        $('#modal').modal('show');
        var setlevel=document.getElementById('getlevel');
        setlevel.value=option;
        var status_pesan = document.getElementById('status');
        console.log(status_pesan);
        status_pesan.value="Tunda";
         document.getElementById('nama_toko').style.display = 'block';
      }

      if(level=="Reseller" && option=="Customer" ){
        $('#modal2').modal('show');
        // $('.modal-backdrop').remove();
        var setlevel=document.getElementById('getlevel');
        setlevel.value=option;
        var status_pesan = document.getElementById('status');
        console.log(status_pesan);
        status_pesan.value="Tunda";
        document.getElementById('nama_toko').style.display = 'none';
      }
      if(level=="Reseller" && option=="Dropshipper" ){
        $('#modal2').modal('show');
        var setlevel=document.getElementById('getlevel');
        setlevel.value=option;
        var status_pesan = document.getElementById('status');
        console.log(status_pesan);
        status_pesan.value="Tunda";
        document.getElementById('nama_toko').style.display = 'block';
      }*/
    
             
        
    </script>
    </script>
    <script type="text/javascript">
/*$(document).ready(function (){
 var asal=$('#kota_asal').val();
     
                if(asal==39 || asal==501 ||asal==419 ||asal==210 ||asal==135 ){
     console.log(asal);             
                  document.getElementById('ongkos2').style.display = 'block';
                  // document.getElementById('co').style.display = 'block';
                  document.getElementById('ongkos3').style.display = 'block';
                  
                } else{
                  document.getElementById('ongkos3').style.display = 'none';
                  document.getElementById('ongkos2').style.display = 'none';
                }
     
            });*/
</script>
    <script type="text/javascript">
function cod(){
      // event.preventDefault();
      

     var asal=$('#kabu').val();
     console.log(asal);
                if(asal=="sleman" || asal=="Yogyakarta" ||asal=="kulon progo" ||asal=="gunung kidul" ||asal=="bantul" ){
                  
                  document.getElementById('ongkos3').style.display = 'block';
                  document.getElementById('ongkos2').style.display = 'block';
                  // document.getElementById('co').style.display = 'block';
                  
                  
                } else{
                  document.getElementById('ongkos3').style.display = 'none';
                  document.getElementById('ongkos2').style.display = 'none';
                }
        

            };
</script>
   <script type="text/javascript">
function co() {
      event.preventDefault();
       var asal=$('#kabu').val();
     console.log(asal);
                if(asal=="sleman" || asal=="Yogyakarta" ||asal=="kulon progo" ||asal=="gunung kidul" ||asal=="bantul" ){
                  
                  document.getElementById('ongkos3').style.display = 'block';
                  document.getElementById('ongkos2').style.display = 'block';
                  // document.getElementById('co').style.display = 'block';
                  
                  
                } else{
                  document.getElementById('ongkos3').style.display = 'none';
                  document.getElementById('ongkos2').style.display = 'none';
                }
        

      

            };
</script>
     <script type="text/javascript">
function b() {
      event.preventDefault();
      

      var metode = $('#metode').val();
      var metode_pilih = $('#metode_pilih').val();
      console.log(metode);

       $.get("metode/"+metode,
        function(hasil2){
          $.each(hasil2, function(index, hasil2){
            // $.each(hasil, function(index, hasil){
            
                $('#metode_pilih').val(hasil2.rate);
                $('#rate').val(hasil2.rate);
                var jenis=$('#jenis_metode').val(hasil2.jenis);
                /*if(hasil.jenis=="Pulsa"){
                $('#total2').val(parseFloat($('#total').val())*parseFloat(hasil.rate)); 
                
                }*/
                /*console.log(jenis);
                if(jenis == "Pulsa"){
                  document.getElementById('span').style.display = 'block';
                  document.getElementById('rate').style.display = 'block';
                } if(jenis== "Bank"){
                  document.getElementById('span').style.display = 'block';
                  document.getElementById('rate').style.display = 'block';
                } if(jenis == "COD"){
                  document.getElementById('span').style.display = 'block';
                  document.getElementById('rate').style.display = 'block';
                }*/
                span();
        getTotal();         
              console.log(hasil2);
              // });
            });
          });

            };
</script>
<script type="text/javascript">
function span() {
      
      

     var jenis=document.getElementById('jenis_metode').value;
     console.log(jenis);
                var kota_tujuan=$('#kota_asal').val();
                console.log(kota_tujuan);
     console.log(jenis);
                if(jenis == "COD" && (kota_tujuan!=135||kota_tujuan!=419||kota_tujuan!=210||kota_tujuan!=39||kota_tujuan!=501)){
                  document.getElementById('span').style.display = 'none';
                  document.getElementById('ratee').style.display = 'none';
                  $('#cod').modal('show');

                } if(jenis == "COD" && (kota_tujuan==135||kota_tujuan==419||kota_tujuan==210||kota_tujuan==39||kota_tujuan==501)){
                  document.getElementById('span').style.display = 'none';
                  document.getElementById('ratee').style.display = 'none';
                  
                  $('#cod').modal('hide');
                }
                if(jenis == "Pulsa"){
                  document.getElementById('span').style.display = 'block';
                  document.getElementById('ratee').style.display = 'block';
                  $('#cod').modal('hide');
                } if(jenis == "Bank"){
                  document.getElementById('span').style.display = 'none';
                  document.getElementById('ratee').style.display = 'none';
                  $('#cod').modal('hide');
                } 
        
        

            };
</script>
    <script type="text/javascript">
$(document).ready(function (){
 getOngkir();      
 var asal=$('#kabu').val();
     console.log(asal);
                if(asal=="sleman" || asal=="Yogyakarta" ||asal=="kulon progo" ||asal=="gunung kidul" ||asal=="bantul" ){
                  
                  document.getElementById('ongkos3').style.display = 'block';
                  document.getElementById('ongkos2').style.display = 'block';
                  // document.getElementById('co').style.display = 'block';
                  
                  
                } else{
                  document.getElementById('ongkos3').style.display = 'none';
                  document.getElementById('ongkos2').style.display = 'none';
                }
     
            });
</script>
<script type="text/javascript">
function getOngkir() {
      // event.preventDefault();
      

       var kota_asal = $('#kota').val();
       $.get("getId/"+kota_asal,
        function(hasil){
          $.each(hasil, function(index, hasil){
           
            
                $('#kota_asal').val(hasil.city_id)
              console.log(hasil.city_id);
                var id = $('#user').val();
      console.log(id);
      var kota_tujuan = $('#kota_asal').val();
      console.log(kota_tujuan);
      var berat =$('#berat').val();
       /*var radio = $('input[name=optionsRadio]:checked', '.radio-inline').val();
       console.log(radio)*/
      var service, des, etd, value;
       $.get("hasil/"+kota_tujuan+"/"+berat,
        function(hasil){
            $('#ongkos').empty();
            $.each(hasil, function(index, hasil){
              console.log(hasil.costs.length);
              if(hasil.costs.length == 0 && (kota_tujuan!=135||kota_tujuan!=419||kota_tujuan!=210)){
                $('#ongkos').append('<tr><tdPengiriman dari Yogyakarta Tidak Tersedia</td></tr>')
              }if(hasil.costs.length == 0 && (kota_tujuan==135 ||  kota_tujuan==210)){
                $('#ongkos').append('<tr><td colspan="5">Pengiriman melalui kurir tidak ada</td></tr>')
                
              }
              
              /*if(hasil.costs.length == 0){
                $('#ongkos').append('<p>Pengiriman dari Yogyakarta Tidak Tersedia</p>')
              }*/else{
                $.each(hasil.costs, function(index, hasil){
                  service = hasil.service;
                  des = hasil.description;
                  $.each(hasil.cost, function(index, hasil){
                    console.log(service);
                    $('#ongkos').append(
                      
                     '<tr><td><input type="radio" id="ongkir" name="ongkir" onChange="pecah();getTotal();" value="'+hasil.value+','+service+'" class="ongkir"></td>'+
                    '<td style="color:#000">'+service+' '+'</td>'+
                    '<td>'+des+'</td>'+
                    '<td>'+hasil.etd+'</td>'+
                    '<td>'+(hasil.value)+'</td></tr>'
                     
                    );
                  }); 
                }); 
              }
            }); 
            
        });
              });
          });
     
            };
</script>
<script type="text/javascript">
  function pecah(){
   
    var ongkir = $('input[name=ongkir]:checked', '#ongkos').val(); 
            console.log(ongkir);
            var array=ongkir.split(',');
            var b=array[1];
            console.log(b);
    $('#kurir').val(b);  
 
    
  }
</script>
<script type="text/javascript">
  function pecah2(){
   
    var ongkir = $('input[name=ongkir]:checked', '#ongkos2').val(); 
            console.log(ongkir);
            var array=ongkir.split(',');
            var b=array[1];
            console.log(b);
    $('#kurir').val(b);  
 
    
  }
</script>
<script type="text/javascript">
function idalamat() {
      event.preventDefault();
      

      var kota_asal = $('#kota').val();
      // console.log(kota_asal);
       $.get("getId/"+kota_asal,
        function(hasil){
          $.each(hasil, function(index, hasil){
            $('#kota_asal').empty();
            
                $('#kota_asal').val(hasil.city_id)
              console.log(hasil.city_id);
              });
          });
       getOngkir();
            };
</script>
    <script type="text/javascript">
function getAlamat() {
      event.preventDefault();
      

      var alamat = $('#alamat_pilih').val();
      var kota_asal = $('#kota').val();
       $.get("getAlamat/"+alamat,
        function(hasil){
          $.each(hasil, function(index, hasil){
            // $.each(hasil, function(index, hasil){
            $('#alamat').empty();
            
                $('#alamat').val(hasil.nama_penerima+'\n'+hasil.no_hp_penerima+'\n'+hasil.alamat_lengkap+','+hasil.kabupaten+','+hasil.provinsi);
                $('#kota').val(hasil.kabupaten);
                $('#idpenerima').val(hasil.id_penerima);
                $('#kota_asal').val(idalamat())
                $('#kabu').val(hasil.kabupaten);
              console.log(hasil);
              // });
            });
          });
            };
</script>

<script type="text/javascript">
            function getTotal() {
      event.preventDefault();
            
            
        
            var total1 = document.getElementById("total1").value; 
            console.log(total1);
            var okurir=$('#kurir').val();
            console.log(okurir);
            var ongkos=$("#ongkos").val();
            console.log(ongkos);
            var ongkos2=$("#ongkos2").val();
            if((!ongkos2) && (!ongkos) &&  (!okurir)){
             var b=0;
             var ongkir=0;
          }
            if('input[name=ongkir]:checked', '#ongkos2' && okurir=="COD"){
            var ongkir = $('input[name=ongkir]:checked', '#ongkos2').val(); 
            console.log(ongkir);
            var array=ongkir.split(',');
            var b=array[0];
            console.log(b);
          }
            if('input[name=ongkir]:checked', '#ongkos' && okurir!="COD"){
              var ongkir = $('input[name=ongkir]:checked', '#ongkos').val(); 
            console.log(ongkir);
            var array=ongkir.split(',');
            var b=array[0];
            console.log(b);
          }
            
            var rate = document.getElementById("metode_pilih").value; 
            console.log(rate);
            var jenis = $("#jenis_metode").val(); 
            console.log(jenis);
            if(jenis=="Pulsa" ){
              if(ongkir){
              console.log('hai');
              var hasil = document.getElementById("total").value=( (parseFloat(total1)+ parseFloat(b))*parseFloat(rate)).toFixed(0);
              var hasil = document.getElementById("total3").value=( (parseFloat(total1)+ parseFloat(b))*parseFloat(rate)).toFixed(0);  
              }
              
            }if(jenis=="Pulsa" ){
              if(!ongkir){
              console.log('hallo');
              var hasil = document.getElementById("total").value=( (parseFloat(total1)+ 0)*parseFloat(rate)).toFixed(0);
              var hasil = document.getElementById("total3").value=( (parseFloat(total1)+ 0)*parseFloat(rate)).toFixed(0);  
              }
              
            }
            if(jenis=="Bank" ){
              if(ongkir){
              console.log('hallo haa');
              var hasil = document.getElementById("total").value=( parseFloat(total1)+ parseFloat(b));
              var hasil = document.getElementById("total3").value=( parseFloat(total1)+ parseFloat(b));  
              }
              
            }
            
            if(!jenis ){
              if(ongkir){
              console.log('hallo hahaha');
              var hasil = document.getElementById("total").value=( parseFloat(total1)+ parseFloat(ongkir));
              var hasil = document.getElementById("total3").value=( parseFloat(total1)+ parseFloat(ongkir));  
              }
              
            }

           
             

        };
       
             
        
    </script>
    @endsection


