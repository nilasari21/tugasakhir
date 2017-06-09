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
              {{ ('Transaksi') }}<small>{{ ('Semua transaksi') }}</small>
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
              <li class="active"><a href="#activity" data-toggle="tab">Pending</a></li>
              <li><a href="#menunggu" data-toggle="tab">Menunggu</a></li>
              <li><a href="#timeline" data-toggle="tab">Produksi</a></li>
              <li><a href="#settings" data-toggle="tab">Packing</a></li>
              <li><a href="#pengiriman" data-toggle="tab">Pengiriman</a></li>
              <li><a href="#selesai" data-toggle="tab">Selesai</a></li>
              <li><a href="#batal" data-toggle="tab">Batal</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <span>Merupakan daftar transaksi dimana produk belum diproduksi dan belum lunas</span>
                <!-- <a class="btn btn-default" href="#"><i class="fa fa-eye"></i>   Detail</a> -->
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
                   @foreach ($data as $row)
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
                   @foreach ($tunggu as $row)
                    <tr>
                      
                      <td>{{ $row->id_transaksi }}</td>
                      <td>{{ $row->tgl_transaksi  }}</td>
                      <!-- <td>{{ $row->jenis }}</td> -->
                      <td>{{ $row->name }}</td>
                      <!-- <td>{{ $row->nama_produk }}</td> -->
                      <!--<?php 
                      if(count($row->nama_ukuran)==0){?>
                      <td>-</td>
                      <?php
                      }else{?>
                      <td>{{ $row->nama_ukuran }}</td>
                      <?php
                      }
                      ?>
                      
                      <!-- <td>{{ $row->jumlah_beli }}</td> -->
                      <td>{{ $row->status_bayar }}</td>
                      <td>
                         <a class="btn btn-default" style="border:1px solid #999 !important"href="{{ url('/transaksi/detail/'.$row->id_transaksi ) }}"><i class="fa fa-eye"></i>   Detail</a>
                        <!-- <a class="btn btn-default2" data-idt="{{ $row->id_transaksi }}" data-id="{{ $row->id_detail_transaksi  }}" style="border:1px solid #999 !important"href="#"><i class="fa fa-edit"></i>   edit status</a> -->
                        <form method="post" action="{{ url('transaksi/ubah') }}">
                        {{ csrf_field() }}
                        <input class="form-control"type="hidden" name="idtrans" id="idtrans" value="{{ $row->id_transaksi }}">
                        <input class="form-control"type="hidden" name="status_pesan"  value="Produksi" style="display:none">
                        <!-- <a class="btn btn-default3"type="submit" style="border:1px solid #999 !important"href="#"><i class="fa fa-edit"></i>   edit status</a> -->
                        <button type="submit"  class="btn btn-default3" style="border:1px solid #999 !important"><i class="fa fa-edit"></i>  Produksi</button>
                      </form>
                       <form method="post" action="{{ url('transaksi/ubah') }}">
                        {{ csrf_field() }}
                        <input class="form-control"type="hidden" name="idtrans" id="idtrans" value="{{ $row->id_transaksi }}">
                        <input class="form-control"type="hidden" name="status_pesan"  value="Batal" style="display:none">
                        <!-- <a class="btn btn-default3"type="submit" style="border:1px solid #999 !important"href="#"><i class="fa fa-edit"></i>   edit status</a> -->
                        <button type="submit"  class="btn btn-default3" style="border:1px solid #999 !important"><i class="fa fa-edit"></i>  Packing</button>
                      </form>
                     </td>
                    </tr>
                   @endforeach
                   <!--  -->
                  </tbody>
                </table>
              </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                <!-- The timeline -->
                <span>Merupakan daftar transaksi dimana produk sedang dalam proses produksi</span>
                <div class="box-body table-responsive margin">                   
                <table id="data2" class="table table-bordered table-hover dataTable table-striped">
                  <thead>
                    <tr>
                      <th>Id Transaksi</th>
                      <th>Tanggal Pesan</th>
                      <th>Nama Pemesan</th>
                      <!-- <th>Nama Produk</th> -->
                      <!-- <th>Ukuran</th>
                      <th>Jumlah</th> -->
                      <th>Pembayaran</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                   @foreach ($produksi as $row)
                    <tr>
                      
                      <td>{{ $row->id_transaksi }}</td>
                      <td>{{ $row->tgl_transaksi  }}</td>
                      <td>{{ $row->name }}</td>
                      <!-- <td>{{ $row->nama_produk }}</td>
                      <?php 
                      if(count($row->nama_ukuran)==0){?>
                      <td>-</td>
                      <?php
                      }else{?>
                      <td>{{ $row->nama_ukuran }}</td>
                      <?php
                      }
                      ?>
                      
                      <td>{{ $row->jumlah_beli }}</td> -->
                      <td>{{ $row->status_bayar }}</td>
                      <td>
                         <a class="btn btn-default" style="border:1px solid #999 !important"href="{{ url('/transaksi/detail/'.$row->id_transaksi ) }}"><i class="fa fa-eye"></i>   Detail</a>
                        <!-- <a class="btn btn-default2" data-idt="{{ $row->id_transaksi }}" data-id="{{ $row->id_detail_transaksi  }}" style="border:1px solid #999 !important"href="#"><i class="fa fa-edit"></i>   edit status</a> -->
                        <form method="post" action="{{ url('transaksi/ubah') }}">
                        {{ csrf_field() }}
                        <input class="form-control"type="hidden" name="idtrans" id="idtrans" value="{{ $row->id_transaksi }}">
                        <input class="form-control"type="hidden" name="status_pesan"  value="Packing" style="display:none">
                        <!-- <a class="btn btn-default3"type="submit" style="border:1px solid #999 !important"href="#"><i class="fa fa-edit"></i>   edit status</a> -->
                        <button type="submit"  class="btn btn-default3" style="border:1px solid #999 !important"><i class="fa fa-edit"></i>  Packing</button>
                      </form>
                     </td>
                    </tr>
                   @endforeach
                   <!--  -->
                  </tbody>
                </table>
              </div>
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="settings">
                <span>Merupakan daftar transaksi dimana produk sedang dipacking</span>
                <div class="box-body table-responsive margin">                   
                <table id="data3" class="table table-bordered table-hover dataTable table-striped">
                  <thead>
                    <tr>
                      <th>Id Transaksi</th>
                      <th>Tanggal Pesan</th>
                      <th>Nama Pemesan</th>
                      <!-- <th>Nama Produk</th> -->
                      <!-- <th>Ukuran</th>
                      <th>Jumlah</th> -->
                      <th>Pembayaran</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                   @foreach ($packing as $row)
                    <tr>
                      
                      <td>{{ $row->id_transaksi }}</td>
                      <td>{{ $row->tgl_transaksi  }}</td>
                      <td>{{ $row->name }}</td>
                      <!-- <td>{{ $row->nama_produk }}</td>
                      <?php 
                      if(count($row->nama_ukuran)==0){?>
                      <td>-</td>
                      <?php
                      }else{?>
                      <td>{{ $row->nama_ukuran }}</td>
                      <?php
                      }
                      ?>
                      
                      <td>{{ $row->jumlah_beli }}</td> -->
                      <td>{{ $row->status_bayar }}</td>
                      <td>
                         <a class="btn btn-default"style="border:1px solid #999 !important" href="{{ url('/transaksi/detail/'.$row->id_transaksi ) }}"><i class="fa fa-eye"></i>   Detail</a>
                        <!-- <a class="btn btn-default2" data-idt="{{ $row->id_transaksi }}" data-id="{{ $row->id_detail_transaksi  }}" style="border:1px solid #999 !important"href="#"><i class="fa fa-edit"></i>   edit status</a> -->
                     <form method="post" action="{{ url('transaksi/ubah') }}">
                        {{ csrf_field() }}
                        <input class="form-control"type="hidden" name="idtrans" id="idtrans" value="{{ $row->id_transaksi }}">
                        <input class="form-control"type="hidden" name="status_pesan"  value="Pengiriman" style="display:none">
                        <!-- <a class="btn btn-default3"type="submit" style="border:1px solid #999 !important"href="#"><i class="fa fa-edit"></i>   edit status</a> -->
                        <button type="submit"  class="btn btn-default3" style="border:1px solid #999 !important"><i class="fa fa-edit"></i>  Pengiriman</button>
                      </form>
                     </td>
                    </tr>
                   @endforeach
                   <!--  -->
                  </tbody>
                </table>
              </div>
              </div>

              <div class="tab-pane" id="pengiriman">
                <span>Merupakan daftar transaksi dimana produk dimana produk baru diambil oleh kurir JNE tetapi belum ada nomor resi</span>
                <div class="box-body table-responsive margin">                   
                <table id="data4" class="table table-bordered table-hover dataTable table-striped">
                  <thead>
                    <tr>
                      <th>Id Transaksi</th>
                      <th>Tanggal Pesan</th>
                      <th>Nama Pemesan</th>
                      <!-- <th>Nama Produk</th>
                      <th>Ukuran</th>
                      <th>Jumlah</th> -->
                      <th>Pembayaran</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                   @foreach ($pengiriman as $row)
                    <tr>
                      
                      <td>{{ $row->id_transaksi }}</td>
                      <td>{{ $row->tgl_transaksi  }}</td>
                      <td>{{ $row->name }}</td>
                      <!-- <td>{{ $row->nama_produk }}</td>
                      <?php 
                      if(count($row->nama_ukuran)==0){?>
                      <td>-</td>
                      <?php
                      }else{?>
                      <td>{{ $row->nama_ukuran }}</td>
                      <?php
                      }
                      ?>
                      
                      <td>{{ $row->jumlah_beli }}</td> -->
                      <td>{{ $row->status_bayar }}</td>
                      <td>
                         <a class="btn btn-default" style="border:1px solid #999 !important"href="{{ url('/transaksi/detail/'.$row->id_transaksi ) }}"><i class="fa fa-eye"></i>   Detail</a>
                        <a class="btn btn-default2" data-idt="{{ $row->id_transaksi }}" data-id="{{ $row->id_transaksi }}" style="border:1px solid #999 !important"href="#"><i class="fa fa-edit"></i>   Selesai</a>
                     
                     </td>
                    </tr>
                   @endforeach
                   <!--  -->
                  </tbody>
                </table>
              </div>
              </div>

              <div class="tab-pane" id="selesai">
                <span>Merupakan daftar transaksi dimana produk sudah dikirimkan oleh kurir JNE dan sudah memiliki nomor resi</span>
                <div class="box-body table-responsive margin">                   
                <table id="data5" class="table table-bordered table-hover dataTable table-striped">
                  <thead>
                    <tr>
                      <th>Id Transaksi</th>
                      <th>Tanggal Pesan</th>
                      <th>Nama Pemesan</th>
                      <!-- <th>Nama Produk</th>
                      <th>Ukuran</th>
                      <th>Jumlah</th> -->
                      <th>Pembayaran</th>
                      <th>Resi</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                   @foreach ($selesai as $row)
                    <tr>
                      
                      <td>{{ $row->id_transaksi }}</td>
                      <td>{{ $row->tgl_transaksi  }}</td>
                      <td>{{ $row->name }} </td>
                      <!-- <td>{{ $row->nama_produk }}</td>
                      <?php 
                      if(count($row->nama_ukuran)==0){?>
                      <td>-</td>
                      <?php
                      }else{?>
                      <td>{{ $row->nama_ukuran }}</td>
                      <?php
                      }
                      ?>
                      
                      <td>{{ $row->jumlah_beli }}</td> -->
                      <td>{{ $row->status_bayar }}</td>
                      <td>{{ $row->resi }}</td>
                      <td>
                         <a class="btn btn-default" style="border:1px solid #999 !important"href="{{ url('/transaksi/detail/'.$row->id_transaksi ) }}"><i class="fa fa-eye"></i>   Detail</a>
                        <!-- <a class="btn btn-default2" data-id="{{ $row->id_transaksi }}" data-idt="{{ $row->id_transaksi }}" style="border:1px solid #999 !important"href="#"><i class="fa fa-edit"></i>   edit status</a> -->
                     </td>
                    </tr>
                   @endforeach
                   <!--  -->
                  </tbody>
                </table>
              </div>
              </div>
              <div class="tab-pane" id="batal">
                <span>Merupakan daftar transaksi yang dibatalkan</span>
                <div class="box-body table-responsive margin">                   
                <table id="data8" class="table table-bordered table-hover dataTable table-striped">
                  <thead>
                    <tr>
                      <th>Id Transaksi</th>
                      <th>Tanggal Pesan</th>
                      <th>Nama Pemesan</th>
                     <!--  <th>Nama Produk</th>
                      <th>Ukuran</th>
                      <th>Jumlah</th> -->
                      <th>Pembayaran</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                   @foreach ($batal as $row)
                    <tr>
                      
                      <td>{{ $row->id_transaksi }}</td>
                      <td>{{ $row->tgl_transaksi  }}</td>
                      <td>{{ $row->name }} </td>
                     <!--  <td>{{ $row->nama_produk }}</td>
                      <?php 
                      if(count($row->nama_ukuran)==0){?>
                      <td>-</td>
                      <?php
                      }else{?>
                      <td>{{ $row->nama_ukuran }}</td>
                      <?php
                      }
                      ?>
                      
                      <td>{{ $row->jumlah_beli }}</td> -->
                      <td>{{ $row->status_bayar }}</td>

                      <td>
                         <a class="btn btn-default" style="border:1px solid #999 !important"href="{{ url('/transaksi/detail/'.$row->id_transaksi ) }}"><i class="fa fa-eye"></i>   Detail</a>
                        <!-- <a class="btn btn-default2" data-id="{{ $row->id_detail_transaksi  }}" data-idt="{{ $row->id_transaksi }}" style="border:1px solid #999 !important"href="#"><i class="fa fa-edit"></i>   edit status</a> -->
                     </td>
                    </tr>
                   @endforeach
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
   
<div class="modal fade" id="modal3" role="dialog">
                                <div class="modal-dialog">
                                
                                 
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Tambah nomor resi</h4>
                                    </div>
                                    <div class="modal-body">
                                     
                                    <form method="POST"   action="{{ url('transaksi/ubah') }}">
                                      <div class="row">
                                          {{ csrf_field() }}
                                          <div class="col-md-12" >
                                            <input class="form-control"type="hidden" name="iddetail" id="iddetail" value="">
                                            <input class="form-control"type="hidden" name="idtrans" id="idtrans" value="">
                                            <!-- <input type="hidden" name="idkonfirm" id="idkonfirm" value=""> -->
                                              <div class="form-group">
                                                  <input class="form-control"type="hidden" name="status_pesan"  value="Selesai" style="display:none">
                                            
                                        </div>
                                        <div class="form-group" >
                                          <label for="exampleInputFile">Nomor resi</label><br/>
                                          <input type="text" style="width: 100%;" name="resi" id="resi" value="">
                                        </div>
                                       <!--  <div class="form-group" id="editor1" >
                                          <label for="exampleInputFile">Keterangan</label><br/>
                                        <textarea  name="keterangan" rows="10"  style="border: 1px solid #DF5E96;width:100%;">
                                            </textarea>
                                          </div> -->
                                         </div>

                                    </div>
                                  </div>
                                    <div class="modal-footer">
                                      <button type="submit"  class="btn btn-info">Simpan</button>
                                      </form> 
                                       <button    class="btn btn-warning" style="text-transform:capitalize" data-dismiss="modal">Batal</button>
                                      
                                    </div>
                            </div>
                                  
                                </div>
                              </div>  
    <!-- </div> -->

@endsection
@section('js')
<script type="text/javascript">
        $(document).ready(function(){
          $(".btn-default2").click(function(){
          $('#iddetail').val($(this).data('id'));
          $('#idtrans').val($(this).data('idt'));
          $('#modal3').modal('show');
        });
        });
           
    </script>
<script type="text/javascript">
    function a(){
       var status=$('#status_pesan').val();
       console.log(status);
       if(status=="Selesai"){
        document.getElementById('resi').style.display = 'block';
       }else{
        document.getElementById('resi').style.display = 'none';
       }
        
      
    }
             
        
    </script>
   
    @endsection