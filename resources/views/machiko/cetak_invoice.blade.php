<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Machiko K-Store | Invoice</title>
   <link rel="stylesheet" href="{{asset("/machikoo/bootstrap-3.2.0/dist/css/bootstrap.min.css")}}">
    <!-- <link rel="stylesheet" href="{{asset("/machikoo/bootstrap-3.2.0/dist/css/bootstrap-modal-bs3patch.css")}}">
    <link rel="stylesheet" href="{{asset("/machikoo/bootstrap-3.2.0/dist/css/bootstrap-modal.css")}}"> -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">  -->
    <!-- Font Awesome -->
    <!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"> -->
     <link rel="stylesheet" href="{{asset("/machikoo/css/font-awesome.min.css")}}" rel="stylesheet" type="text/css" >
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset("/machikoo/css/owl.carousel.css")}}">
    <link rel="stylesheet" href="{{asset("/machikoo/style.css")}}">
    
    <link rel="stylesheet" href="{{asset("/machikoo/css/responsive.css")}}">
    <link rel="stylesheet" href="{{asset("/machikoo/css/dropdown.css")}}">

    <!-- <link rel="stylesheet" href="{{asset("imageUpload/dist/css/bootstrap-imageupload.min.css")}}"> -->
    <link rel="stylesheet" href="{{asset("/machikoo/etalage.css")}}">    

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body onload="window.print();">
<div class="single-product-area">
    <div class="zigzag-bottom">
    </div>
    <form method="post" action="#" id="printJS-form">
    <div class="container animated infinite slideInUp" style="animation-iteration-count: inherit;">
    <div class="col-sm-12">       
            <div class="form-group">
            <div class="panel panel-default">
            <div class="panel-heading" align="center" style="font-size:20px;background:#66CC99;font-family:Raleway"><b>Rekapitulasi pembelian</b></div>
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
                    <div class="form-group">
                        <label for="inputName" class="col-sm-3 control-label" >Nomor Transaksi</label>
                        <span> {{$data->id_transaksi}}</span>
                      </div>
                      <br/>
                     <div class="form-group">
                        <label for="inputName" class="col-sm-3 control-label" >Jenis Pemesanan</label>
                        <span>{{$trans->jenis_pemesanan}}</span>
                      </div>
                      <br/>
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
                    <br/>
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
                        @if($trans->jenis =="Bank")
                        (Silahkan transfer ke rekening  {{$trans->nomor}}  atas nama  {{$trans->nama_rekening}})
                        @elseif($trans->jenis=="Pulsa")
                        (Silahkan transfer pulsa ke nomor  {{$trans->nomor}} )
                        @elseif($trans->jenis=="COD")
                        (Silahkan koordinasi lokasi pembayaran dengan admin di nomor 085640235938)
                        @endif
                      </div><br/>
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
  <!-- </div>
<a href="#PATH_TO_PDF.pdf" target="_blank"  onclick="window.print()"> print PDF </a>
</div> -->
<!-- </body> -->
<div class="row no-print">
        <div class="col-xs-12">
          <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
         <!--  <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
          </button>
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button> -->
        </div>
      </div>
<!-- @endsection

@section('js')
<script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>

    @endsection

 -->
 </body>
</html>
