@extends('admin.admin_template')


@section('css')
<style type="text/css">
.btn {
    border-radius: 3px;
    -webkit-box-shadow: none;
    box-shadow: none;
    border: 1px solid #999 !important;
}
</style>
@endsection

@section('content')

        <div class="row">
          @section('header')
          <section class="content-header">
            <h1>
              {{ ('Laporan Transaksi') }}<small>{{ ('Semua transaksi') }}</small>
            </h1>
            <!-- <ol class="breadcrumb">
              <li><a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}">{{ config('backpack.base.project_name') }}</a></li>
              <li class="active">{{ trans('backpack::base.readystock') }}</li>
            </ol> -->
          </section>
      @endsection

    
    <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Laporan transaksi</a></li>
              <!-- <li><a href="#menunggu" data-toggle="tab">Chart</a></li> -->
              
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <!-- <span>Merupakan daftar transaksi dimana produk belum diproduksi dan belum lunas</span> -->
                <!-- <a class="btn btn-default" href="#"><i class="fa fa-eye"></i>   Detail</a> -->
                <form method="post" action="{{ url('laporan/tanggal') }}">
                  {{ csrf_field() }}
                <div class="col-md-12" >
                <div class="col-md-4" >
                <input type='text' name="tgl_awal" placeholder="Tanggal awal" class="form-control" id="laporan" required >
                       <!--  <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>  -->
                </div>
                <div class="col-md-4" >
                <input type='text' name="tgl_akhir" placeholder="Tanggal akhir" class="form-control" id="laporan2" required >
                        <!-- <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>  -->
                </div>
                <div class="col-md-4" >
              <button type="submit"  class="btn btn-fw btn-success waves-effect waves-effect"  >Filter</button>    
                </div>
              </div>
              </form>
               <div class="box-body table-responsive margin">                   
                <table id="data" class="table table-bordered table-hover dataTable table-striped">
                  <thead>
                    <tr>
                      <th>Id Transaksi</th>
                      <th>Tanggal Pesan</th>
                      <!-- <th>Jenis produk</th> -->
                      <th>Nama Pemesan</th>
                      <!-- <th>Nama Produk</th> -->
                      <!-- <th>Ukuran</th> -->
                      <!-- <th>Jumlah</th> -->
                      <th>Pembayaran</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                   @foreach ($selesai as $row)
                    <tr>
                      
                      <td>{{ $row->id_transaksi }}</td>
                      <td>{{ $row->tgl_transaksi  }}</td>
                      <!-- <td>{{ $row->jenis }}</td> -->
                      <td>{{ $row->name }} </td>
                      <!-- <td>{{ $row->nama_produk }}</td> -->
                      <!--<?php 
                      if(count($row->nama_ukuran)==0){?>
                      <td>-</td>
                      <?php
                      }else{?>
                      <td>{{ $row->nama_ukuran }}</td>
                      <?php
                      }
                      ?>-->
                      
                      <!-- <td>{{ $row->jumlah_beli }}</td> -->
                      <td>{{ $row->status_bayar }}</td>
                      <td>
                         <a class="btn btn-default" style="border:1px solid #999 !important" href="{{ url('/transaksi/detail/'.$row->id_transaksi ) }}"><i class="fa fa-eye"></i>   Detail</a>
                        <!-- <a class="btn btn-default2" data-idt="{{ $row->id_transaksi }}" data-id="{{ $row->id_detail_transaksi  }}"style="border:1px solid #999 !important" href="#"><i class="fa fa-edit"></i>   edit status </a> -->
                        
                     </td>
                    </tr>
                   @endforeach
                   <!--  -->
                  </tbody>
                </table>
              </div>
              </div>
              <div class="tab-pane" id="menunggu">
                <!-- Post -->
                <span>Merupakan daftar transaksi dimana produk belum diproduksi dan sudah lunas. Serta daftar transaksi untuk produk
                  ready stock yang menunggu packing</span>
               <div class="box-body table-responsive margin">                   
                <table id="tu2" class="table table-bordered table-hover dataTable table-striped">
                  <thead>
                    <tr>
                      <th>Id Transaksi</th>
                      <th>Tanggal Pesan</th>
                      <!-- <th>Jenis produk</th> -->
                      <th>Nama Pemesan</th>
                      <!-- <th>Nama Produk</th> -->
                      <!-- <th>Ukuran</th>
                      <th>Jumlah</th> -->
                      <th>Pembayaran</th>
                      <th >Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  
                   <!--  -->
                  </tbody>
                </table>
              </div>
              </div>
              
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
   

    <!-- </div> -->

@endsection
@section('js')


<!--<script type="text/javascript">
    function a(){
       var status=$('#status_pesan').val();
       console.log(status);
       if(status=="Selesai"){
        document.getElementById('resi').style.display = 'block';
       }else{
        document.getElementById('resi').style.display = 'none';
       }
        
      
    }
             
        
    </script>-->
   
    @endsection