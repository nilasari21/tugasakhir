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
            <a href="{{ url('transaksi_reseller') }}" class="small-box-footer">Lihat detail <i class="fa fa-arrow-circle-right"></i></a>
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
            <a href="{{ url('transaksi') }}" class="small-box-footer">Lihat detail <i class="fa fa-arrow-circle-right"></i></a>
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
            <a href="{{ url('upgrade_user') }}" class="small-box-footer">Lihat detail <i class="fa fa-arrow-circle-right"></i></a>
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
            <a href="{{ url('konfirmasibayar') }}" class="small-box-footer">Lihat detail <i class="fa fa-arrow-circle-right"></i></a>
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
            <a href="{{ url('pembayaran_cod') }}" class="small-box-footer">Lihat detail <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <br/>
       
      </div>
     <div class="panel panel-card" >
        <span>Produk pre-order beserta total pembelian yang telah lunas</span><br/>
        
       <div class="box-body table-responsive margin">                   
                <table id="data" class="table table-bordered table-hover dataTable table-striped">
                  <thead>
                     <tr>
         
                      <th >Produk</th>
           
                      <th >Batas minimal produksi</th>
                      <th >Jumlah beli</th>
                       <th >Status pre-order</th>
                      <th >Aksi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
           
                      
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
            
           <td >{{$row->total}}<input type="hidden" id="jumlah" value="{{$row->total}}"></td>
           <input type="hidden" {!! $status=App\RiwayatPo::join('status_po','status_po.id_status_po','riwayat_po.id_status_po')->where('id_produk','=',$row->id)->orderby('id_riwayat_po','desc')->select('nama_status','riwayat_po.*')->first();!!}/>
           <td>
            {{$status->nama_status}} 
           </td>
           <td>
            @if($status->nama_status=="Open")
            <form method="post" action="{{ url('admin/status/'.$row->id) }}">
              {{ csrf_field() }}
              <input class="form-control"type="hidden" name="status"  value="Produksi">
              <button type="submit"  class="btn btn-default" style="border:1px solid #999 !important">  Produksi</button>
            </form>
            &nbsp;
            <form method="post" action="{{ url('admin/status/'.$row->id) }}">
              {{ csrf_field() }}
              <input class="form-control"type="hidden" name="status"  value="Batal">
              <button type="submit"  class="btn btn-default" style="border:1px solid #999 !important"> Batal</button>
            </form>
            @elseif($status->nama_status=="Produksi")
            <form method="post" action="{{ url('admin/status/'.$row->id) }}">
              {{ csrf_field() }}
              <input class="form-control"type="hidden" name="status"  value="Selesai produksi">
              <button type="submit"  class="btn btn-default" style="border:1px solid #999 !important">  Selesai produksi</button>
            </form>
           
            
            @endif
           </td>
        </tr>
         @php
         $i++
         @endphp 
       @endforeach
                   
                  </tbody>
                </table>
              </div>
            </div>
    @endsection
    @section('js')
    
    
<script type="text/javascript">
        $(document).ready(function(){
          $(".btn-default2").click(function(){
          $('#idpro').val($(this).data('proid'));
          $('#status').val($(this).data('status'));
          $('#modal3').modal('show');
        });
        });
           
    </script>
    @endsection