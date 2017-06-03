@extends('admin.admin_template')


@section('content')

<div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$countTrans}}</h3>

              <p>Transaksi Reseller Pending</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{ url('transaksi_reseller') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$tunggu}}</h3>

              <p>Produk menunggu produksi/packing</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ url('transaksi') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$data}}</h3>

              <p>Upgrade user</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ url('upgrade_user') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{$data2}}</h3>

              <p>Pembayaran masuk</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{ url('konfirmasibayar') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{$data3}}</h3>

              <p>Transaksi COD</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{ url('pembayaran_cod') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <br/>
       
      </div>
      <div class="panel panel-card" >
       <div class="box-body table-responsive margin">                   
                <table id="data" class="table table-bordered table-hover dataTable table-striped">
                  <thead>
                     <tr>
          <!-- <th>Id Transaksi</th> -->
                      <th >Produk</th>
           
                      <th >Batas minimal produksi</th>
                      <th >Jumlah beli</th>
                       <!-- <th >Status pre-order</th> -->
                      <th >Aksi</th>
           
                      
        </tr>
      </thead>
      <tbody>
        @php
        $i=1
        @endphp
       @foreach ($produk as $row)
        
        <tr>
           <td >{{$row->nama_produk}} <input type="hidden" id="id_produk_ukuran" value="{{$row->minimal_beli}}"></td>
           
           <td >{{$row->jumlah_minimal_produksi}}<input type="hidden" id="min_beli" value="{{$row->jumlah_minimal_produksi}}"></td>
            @if(empty($row->total))

           <td>0</td>
           @else
           <td >{{$row->total}}<input type="hidden" id="jumlah" value="{{$row->total}}"></td>
           @endif
           <td>
            <a class="btn btn-default2" style="border:1px solid #999 !important" href="#"><i class="fa fa-edit"></i>   edit status </a>
           </td>
        </tr>
         @php
         $i++
         @endphp 
       @endforeach
                   <!--  -->
                  </tbody>
                </table>
              </div>
            </div>
    @endsection
    @section('js')
    
    <!--<script type="text/javascript">
   $(document).ready(function(){
    var pembanding=false;
     @php
         $i=1;
       foreach($produk as $a){
        @endphp
      var minimal_produksi = $('#min_beli{{$i}}').val();
      
      console.log(minimal_produksi);
      var jumlah = $('#jumlah{{$i}}').val();
      console.log(jumlah);
     
       if(minimal_produksi<jumlah){
        pembanding=true;
       }

      console.log(pembanding) ;
      
      if (pembanding==true) {
        console.log(minimal_produksi);
        console.log(jumlah);
        var keterangan = $('#keterangan{{$i}}').text("Jumlah pembelian  kurang dari batas minimal produksi");
        console.log(keterangan);
        
        }if (pembanding==false){
          console.log(minimal_produksi);
        console.log(jumlah);
        var keterangan = $('#keterangan{{$i}}').text("Jumlah pembelian tidak kurang dari batas minimal produksi");
        
        console.log(keterangan);
      }
      @php 
      $i++; }
      @endphp
   });
</script>-->
    @endsection