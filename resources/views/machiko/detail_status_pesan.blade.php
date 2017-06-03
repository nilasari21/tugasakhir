@extends('machiko.machiko_template')
@section('css')
<link href="{{ asset("/adminlte/plugins/datepicker/datepicker3.css") }}" rel="stylesheet" type="text/css" />
    <style type="text/css">
.krajee-default.file-preview-frame {
    position: relative;
    display: table;
    margin: 8px;
    border: 1px solid #ddd;
    box-shadow: 1px 1px 5px 0 #a2958a;
    padding: 6px;
    float: left;
    text-align: center;
    width: 97%;
}
</style>
@endsection

@section('content')
<p id="demo"></p>
<div class="single-product-area">
        <!-- <div class="zigzag-bottom"></div> -->
        <div class="container ">
             <div class="col-sm-12">       
            <div class="form-group">
            <div class="panel panel-default">
            <div class="panel-heading" align="center" style="font-size:20px;background:#66CC99;font-family:Raleway"><b>Detail pemesanan</b></div>
                <div class="panel-body">
                
                <div class="row" style="margin-top:15px">
                  <div class="col-md-12">
                                <div class="product-content-right">
                                    <div class="woocommerce">
                                        <form method="post" action="#" name="autoSumForm">
                                            <div class="table-responsive" >
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
                                                  
                                                   @foreach ($trans as $b)
                                                     
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
                                                                {{ $b->jumlah_beli }}
                                                                
                                                            </div>
                                                        </td>
                                                    </tr></tr>
                                                                                                       
                                                   @endforeach
                                                   
                                                     
                                                    
                                                </tbody>
                                            </table>
                                            
                                        </div>
                                        </form>

                                      
                                    </div>                        
                                </div>                    
                            </div> 
                            <br/>
                             @foreach($transak as $trans)
                             @if($trans->status_bayar=="Belum lunas")
                             <span>Catatan : Silahkan upload bukti pembayaran maksimal 48 jam setelah chekout. 
                              Jika dalam 48 jam belum ada bukti yang di upload, maka transaksi otomatis dibatalkan</span><br/>
                              @else
                              @endif
                    <div class="form-group">
                        <br/>
                        <label for="inputName" class="col-sm-3 control-label" >Nomor Transaksi</label>
                        <span> {{$data->id_transaksi}}</span>
                      </div>
                      <br/>
                     <div class="form-group">
                        <label for="inputName" class="col-sm-3 control-label" >Jenis Pemesanan</label>
                        <span>{{$trans->jenis_pemesanan}}</span>
                      </div>
                      
                      <?php 
                      if($trans->jenis_pemesanan == "Dropshipper"){?>
                       <div class="form-group">
                        <label for="inputName" class="col-sm-3 control-label" >Nama toko</label>
                        <span> {{$trans->toko}}</span>
                      </div> 
                      <?php
                    }else{?>
                        <div class="form-group">
                        
                      </div>
                      <?php
                  }?>
                    
                      <div class="form-group">
                      <label for="inputName" class="col-sm-3 control-label" >Tujuan Pengiriman</label>
                      <div class="col-sm-12">
                          
                          <textarea id="alamat" rows='5'style="border: 1px;width:100%;" value="" disabled >{{$trans->nama_penerima}}&#13;&#10;{{$trans->no_hp_penerima}},&#13;&#10;{{$trans->alamat_lengkap}},{{$trans->kecamatan}}, {{$trans->kabupaten}}, {{$trans->provinsi}} </textarea>
                          
                        </div>
                        </div>
                        <br/>
                        <br/>
                        <br/><br/>
                       <div class="form-group">
                        <label for="inputName" class="col-sm-3 control-label" >Metode pembayaran</label><br/>
                        <span>{{$trans->metode}}</span>
                        @if($trans->status_bayar=="Belum lunas")
                        @if($trans->jenis =="Bank")
                        (Silahkan transfer ke rekening  {{$trans->nomor}}  atas nama  {{$trans->nama_rekening}})
                        @elseif($trans->jenis=="Pulsa")
                        (Silahkan transfer pulsa ke nomor  {{$trans->nomor}} )
                        @elseif($trans->jenis=="COD")
                        (Silahkan koordinasi lokasi pembayaran dengan admin di nomor 085640235938)
                        @endif
                        @else
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="inputName" class="col-sm-3 control-label" >Ongkos Kirim</label>
                        <span>{{$trans->ongkir}}</span>
                      </div><br/>
                        <div class="form-group">
                        <label for="inputName" class="col-sm-3 control-label" >Kurir</label>
                        <span>JNE  {{$trans->kurir}}</span>
                      </div><br/>
                          <div class="form-group">
                        <label for="inputName" class="col-sm-3 control-label" >Total pembayaran</label>
                        <span>{{$trans->total_bayar}}</span>
                      </div>
                     
                @endforeach
            @endsection

            @section('js')
           
    <script src="{{ asset("adminlte/plugins/datepicker/bootstrap-datepicker.js") }}"  > </script>
  <script src="{{ asset("adminlte/plugins/input-mask/jquery.inputmask.js") }}"  > </script>
  <script src="{{ asset("adminlte/plugins/input-mask/jquery.inputmask.date.extensions.js") }}"  > </script>
  <script src="{{ asset("adminlte/plugins/input-mask/jquery.inputmask.extensions.js") }}"  > </script>

    @endsection