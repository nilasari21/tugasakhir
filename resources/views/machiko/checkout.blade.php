@extends('machiko.machiko_template')
@section('css')

<link rel="stylesheet" href="{{asset("/machikoo/bootstrap-3.2.0/dist/css/bootstrap.min.css")}}">
@endsection
@section('content')
                             <!-- modal -->
                          <div class="modal fade" id="modal" role="dialog" style="padding-top:100px">
                                <div class="modal-dialog">
                                
                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Upgrade user</h4>
                                    </div>
                                    <div class="modal-body">
                                      <input type="text" class="form-control" id="id" name="iduser" value="{{$data->id}}">
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
                              <!-- end of modal -->

                            <!-- modal -->
                          <div class="modal fade" id="modal2" role="dialog" style="padding-top:100px">
                                <div class="modal-dialog">
                                
                                  
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
                          <div class="modal fade" id="modal3" role="dialog" style="padding-top:100px">
                                <div class="modal-dialog">
                                
                                  
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Pemberitahuan</h4>
                                    </div>
                                    <div class="modal-body">
                                      <input type="hidden" class="form-control" id="id" name="iduser" value="{{$data->id}}">
                                      <input type="hidden" class="form-control" id="getlevel" name="iduser" value="">
                                      </p>
                                      <p>Reseller memiliki minimal pembelian tiap  barang. Jumlah barang anda tidak sesuai minimal pembelian. silahkan kembali ke keranjang
                                      <p>Anda menggunakan pemesanan tidak sesuai dengan level user anda.</p>
                                      <p >Jika anda tetap memilih pilihan ini, anda harus menunggu persetujuan admin terlebih dahulu agar dapat melakukan pembayaran setelah anda melakukan <i>checkout</i>.
                                        atau gunakan jenis pemesanan lain.
                                      
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-success" data-dismiss="modal">Ya</button>
                                      
                                    </div>
                                  </div>
                                  
                                </div>
                              </div>
<div class="single-product-area">
    <div class="zigzag-bottom">
    </div>
    <div class="container animated infinite slideInUp" style="animation-iteration-count: inherit;">
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
                                                        <!-- <th class="product-price" style="background:#66CC99;font-family:Raleway">Berat</th>
                                                        <th class="product-subtotal" style="background:#66CC99;font-family:Raleway">Total</th> -->
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
                                                                {{ $b->jumlah }}
                                                                <input type="hidden" id="jumlah{{$i}}" value="{{ $b->jumlah }}" readonly>
                                                                <input type="text" id="minimal_beli{{$i}}" value="{{ $b->minimal_beli }}">
                                                                
                                                            </div>
                                                        </td><!-- 
                                                        <td class="product-name">
                                                            <span class="amount" >{{ $b->berat_total }} gram</span> 
                                                        </td>
                                                       <td class="product-subtotal" >
                                                            <span class="amount" >{{ $b->Total_harga }}</span> 
                                                        </td> -->
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
                    <input type="text" class="form-control" id="level" name="nama_produk" value="{{$data->level}}">
                    
                    <input type="hidden" class="form-control" id="user" name="nama_produk" value="{{$data->id}}">
                    <div class="form-group">
                     <!--  <div class="col-sm-3 control-label"> -->
                      <label for="inputName" class="col-sm-3 control-label" >Jenis pemesanan</label>  
                      <!-- </div> -->
                      <div class="col-sm-4">
                        <input type="hidden" class="form-control" id="status" name="status" value="">
                        <select class="form-control" style="width: 100%;" id="pesan" name="jenis_pesan" onChange="a()" data-toggle="modal" required/>
                            <option>Pilih jenis pemesanan</option>
                              <option value="Customer">Customer biasa</option>
                              <option value="Reseller" >Reseller</option>
                              <option value="Dropshipper">Dropshipper</option>
                        </select>

                       
                              <!-- end of modal -->
                            </div> 

                        <div class="col-sm-4"  id="toko">
                          <input style="display:none" type="text" class="form-control" id="nama_toko" name="nama_toko" placeholder="Nama Toko" >
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
                          <input type="hidden" placeholder="ex : Bandung" name="idpenerima" id="idpenerima" required="" value="{{$data->id_penerima}}" class="form-control"/>
                          <textarea id="alamat" rows='5'style="border: 1px;width:100%;" value="" disabled >{{$data->nama_penerima}}&#13;&#10;{{$data->no_hp_penerima}},&#13;&#10;{{$data->alamat_lengkap}},{{$data->kecamatan}}, {{$data->kabupaten}}, {{$data->provinsi}} </textarea>
                          <input type="hidden" placeholder="ex : Bandung" name="kota" id="kota" required="" value="{{$data->kabupaten}}" class="form-control"/>
                          <input type="hidden" id="kota_asal"  name="kota_asal" value="" />
                        </div>
                        </div>

                        <div class="form-group">
                      <div class="col-sm-3 control-label">
                      </div>
                      <div class="col-sm-4">
                        <select class="form-control" style="width: 100%;" onChange="getAlamat()" id="alamat_pilih" name="alamat_pilih" />
                            <option>Pilih alamat lain</option>
                              @foreach($penerima as $row)
                                    <option value="{{$row->kabupaten}}" >
                                        {{$row->nama_alamat}}
                                    </option>
                              @endforeach
                        </select>
                      </div>
                      <div class="col-sm-4">
                        <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="#">Tujuan pengiriman baru</a>
                      </div>
                    </div>
                        <?php
                      }
                      ?>
                       <div class="form-group">
                        <label for="inputName" class="col-sm-3 control-label" >Metode pembayaran</label>
                        <input type="hidden" class="form-control" id="metode_pilih" name="metode_pilih" value="">
                        <input type="hidden" class="form-control" id="jenis_metode" name="jenis_metode" value="">
                        <div class="col-sm-4">
                        <select class="form-control" style="width: 100%;" onChange="b()" id="metode" name="metode" required/>
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
                           <div class="radio-inline" onChange="getOngkir()">
                          <label>
                           <input type="radio" class="radio" name="optionsRadio" id="optionsRadios1" value="jne" >
                             JNE
                           </label>
                            </div>
                            <div class="radio-inline" onChange="getOngkir()">
                          <label>
                           <input type="radio" class="radio"name="optionsRadio" id="optionsRadios1" value="pos" >
                            POS
                           </label>
                            </div>

                           </div>
                      </div>
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
                                                            
                                   Belum Cek ongkir                         
                            </td>
                          </tr>
                      </tbody>
                    </table>
                  </div>
                      </div>
                      
                      
                    </div>
                    
                    @foreach($beratharga as $d)
                    <div class="form-group">
                      <label for="inputName" class="col-sm-3 control-label" >Total pembayaran</label>
                      <div class="col-sm-4">
                        <input type="hidden" class="form-control" id="total1" name="total" value="{{$d->total}}" readonly>
                        <input type="hidden" class="form-control" id="total2" name="total" value="{{$d->total}}" readonly>
                        <input type="text" class="form-control" id="total" name="total" value="{{$d->total}}" readonly>
                      </div>
                      
                    </div>
                    @endforeach
                    
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
    function a(){

                                                  
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

                                                          
      
      var option=document.getElementById('pesan').value;
      console.log(option);
      var level=document.getElementById('level').value;
      if(jumlah< minimal_beli){

        pembanding = true;
      }
      console.log(pembanding);
      @php 
      $i++; }
      @endphp
      if(pembanding==true){




      
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
        $('#modal3').modal('hide');
        var status_pesan = document.getElementById('status');
        console.log(status_pesan);
        status_pesan.value="Terima";
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
      }
    }
             
        
    </script>
     <script type="text/javascript">
function b() {
      event.preventDefault();
      

      var metode = $('#metode').val();
      var metode_pilih = $('#metode_pilih').val();
      console.log(metode);
       $.get("metode/"+metode,
        function(hasil){
          $.each(hasil, function(index, hasil){
            // $.each(hasil, function(index, hasil){
            
                $('#metode_pilih').val(hasil.rate);
                $('#jenis_metode').val(hasil.jenis);
                /*if(hasil.jenis=="Pulsa"){
                $('#total2').val(parseFloat($('#total').val())*parseFloat(hasil.rate)); 
                 
                }*/
                
              console.log(hasil);
              // });
            });
          });
            };
</script>
    <script type="text/javascript">
$(document).ready(function (){
      

      var kota_asal = $('#kota').val();
       $.get("getId/"+kota_asal,
        function(hasil){
          $.each(hasil, function(index, hasil){
            $('#kota_asal').empty();
            
                $('#kota_asal').val(hasil.city_id)
              console.log(hasil.city_id);
              });
          });
            });
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
            
                $('#alamat').val(hasil.nama_penerima+'\n'+hasil.no_hp_penerima+'\n'+hasil.alamat_lengkap+','+hasil.kecamatan+','+hasil.kabupaten+','+hasil.provinsi);
                $('#kota').val(hasil.kabupaten);
                $('#idpenerima').val(hasil.id_penerima);
                $('#kota_asal').val(idalamat())
              console.log(hasil);
              // });
            });
          });
            };
</script>
<script type="text/javascript">
function getOngkir() {
      event.preventDefault();

      //var kota_asal = $('#kota').val();
      var id = $('#user').val();
      console.log(id);
      var kota_tujuan = $('#kota_asal').val();
      console.log(kota_tujuan);
      var berat =$('#berat').val();
       var radio = $('input[name=optionsRadio]:checked', '.radio-inline').val();
       console.log(radio)
      var service, des, etd, value;
       $.get("hasil/"+kota_tujuan+"/"+radio+"/"+berat,
        function(hasil){
            $('#ongkos').empty();
            $.each(hasil, function(index, hasil){
              console.log(hasil.costs.length);
              if(hasil.costs.length == 0){
                $('#ongkos').append('<p>Pengiriman dari Yogyakarta Tidak Tersedia</p>')
              }else{
                $.each(hasil.costs, function(index, hasil){
                  service = hasil.service;
                  des = hasil.description;
                  $.each(hasil.cost, function(index, hasil){
                    console.log(service);
                    $('#ongkos').append(
                      
                     '<tr><td><input type="radio" id="ongkir" name="ongkir" onChange="getTotal()" value="'+hasil.value+'" class="ongkir"></td>'+
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
    };
</script>
<script type="text/javascript">
            function getTotal() {
      event.preventDefault();
            
            
         /* @php
            $i=1;
            
            @endphp
            var  hasil=0;
            
            @foreach ($data as $row)*/
            var total1 = document.getElementById("total1").value; 
            console.log(total1);
            var ongkir = $('input[name=ongkir]:checked', '#ongkos').val(); 
            console.log(ongkir);
            var rate = document.getElementById("metode_pilih").value; 
            var jenis = document.getElementById("jenis_metode").value; 
            
            if(jenis=="Pulsa"){
              
              var hasil = document.getElementById("total").value=( (parseFloat(total1)+ parseFloat(ongkir))*parseFloat(rate)).toFixed(0);
            }
            else{
              var hasil = document.getElementById("total").value=( parseFloat(total1)+ parseFloat(ongkir));
            }
            /*$('#total2').val(parseFloat(parseFloat(total1)+ parseFloat(ongkir))*parseFloat(hasil.rate)); 
             console.log(hasil);*/
              /*@php
             $i++;
             
             @endphp
             @endforeach*/
             

        };
       
             
        
    </script>
    @endsection


