@extends('admin.admin_template')



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
              <li><a href="#timeline" data-toggle="tab">Produksi</a></li>
              <li><a href="#settings" data-toggle="tab">Packing</a></li>
              <li><a href="#pengiriman" data-toggle="tab">Pengiriman</a></li>
              <li><a href="#selesai" data-toggle="tab">Selesai</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
               <div class="box-body table-responsive margin">                   
                <table id="data" class="table table-bordered table-hover dataTable table-striped">
                  <thead>
                    <tr>
                      <th>Id Transaksi</th>
                      <th>Tanggal Pesan</th>
                      <th>Nama Pemesan</th>
                      <th>Nama Produk</th>
                      <th>Ukuran</th>
                      <th>Jumlah</th>
                      <th>Pembayaran</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                   @foreach ($data as $row)
                    <tr>
                      
                      <td>{{ $row->id_transaksi }}</td>
                      <td>{{ $row->tgl_transaksi  }}</td>
                      <td>{{ $row->name }}</td>
                      <td>{{ $row->nama_produk }}</td>
                      <?php 
                      if(count($row->nama_ukuran)==0){?>
                      <td>-</td>
                      <?php
                      }else{?>
                      <td>{{ $row->nama_ukuran }}</td>
                      <?php
                      }
                      ?>
                      
                      <td>{{ $row->jumlah_beli }}</td>
                      <td>{{ $row->status_bayar }}</td>
                      <td>
                         <a class="btn btn-success" href="#">Detail</a>
                        <a class="btn btn-info" href="#">Edit Status pesan</a>
                        
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
                <div class="box-body table-responsive margin">                   
                <table id="data2" class="table table-bordered table-hover dataTable table-striped">
                  <thead>
                    <tr>
                      <th>Id Transaksi</th>
                      <th>Tanggal Pesan</th>
                      <th>Nama Pemesan</th>
                      <th>Nama Produk</th>
                      <th>Ukuran</th>
                      <th>Jumlah</th>
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
                      <td>{{ $row->nama_produk }}</td>
                      <?php 
                      if(count($row->nama_ukuran)==0){?>
                      <td>-</td>
                      <?php
                      }else{?>
                      <td>{{ $row->nama_ukuran }}</td>
                      <?php
                      }
                      ?>
                      
                      <td>{{ $row->jumlah_beli }}</td>
                      <td>{{ $row->status_bayar }}</td>
                      <td>
                         <a class="btn btn-success" href="#">Detail</a>
                        <a class="btn btn-info" href="#">Edit Status pesan</a>
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
                <div class="box-body table-responsive margin">                   
                <table id="data3" class="table table-bordered table-hover dataTable table-striped">
                  <thead>
                    <tr>
                      <th>Id Transaksi</th>
                      <th>Tanggal Pesan</th>
                      <th>Nama Pemesan</th>
                      <th>Nama Produk</th>
                      <th>Ukuran</th>
                      <th>Jumlah</th>
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
                      <td>{{ $row->nama_produk }}</td>
                      <?php 
                      if(count($row->nama_ukuran)==0){?>
                      <td>-</td>
                      <?php
                      }else{?>
                      <td>{{ $row->nama_ukuran }}</td>
                      <?php
                      }
                      ?>
                      
                      <td>{{ $row->jumlah_beli }}</td>
                      <td>{{ $row->status_bayar }}</td>
                      <td>
                         <a class="btn btn-success" href="#">Detail</a>
                        <a class="btn btn-info" href="#">Edit Status pesan</a>
                     </td>
                    </tr>
                   @endforeach
                   <!--  -->
                  </tbody>
                </table>
              </div>
              </div>

              <div class="tab-pane" id="pengiriman">
                <div class="box-body table-responsive margin">                   
                <table id="data4" class="table table-bordered table-hover dataTable table-striped">
                  <thead>
                    <tr>
                      <th>Id Transaksi</th>
                      <th>Tanggal Pesan</th>
                      <th>Nama Pemesan</th>
                      <th>Nama Produk</th>
                      <th>Ukuran</th>
                      <th>Jumlah</th>
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
                      <td>{{ $row->nama_produk }}</td>
                      <?php 
                      if(count($row->nama_ukuran)==0){?>
                      <td>-</td>
                      <?php
                      }else{?>
                      <td>{{ $row->nama_ukuran }}</td>
                      <?php
                      }
                      ?>
                      
                      <td>{{ $row->jumlah_beli }}</td>
                      <td>{{ $row->status_bayar }}</td>
                      <td>
                         <a class="btn btn-success" href="#">Detail</a>
                        <a class="btn btn-info" href="#">Edit Status pesan</a>
                     </td>
                    </tr>
                   @endforeach
                   <!--  -->
                  </tbody>
                </table>
              </div>
              </div>

              <div class="tab-pane" id="selesai">
                <div class="box-body table-responsive margin">                   
                <table id="data5" class="table table-bordered table-hover dataTable table-striped">
                  <thead>
                    <tr>
                      <th>Id Transaksi</th>
                      <th>Tanggal Pesan</th>
                      <th>Nama Pemesan</th>
                      <th>Nama Produk</th>
                      <th>Ukuran</th>
                      <th>Jumlah</th>
                      <th>Pembayaran</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                   @foreach ($selesai as $row)
                    <tr>
                      
                      <td>{{ $row->id_transaksi }}</td>
                      <td>{{ $row->tgl_transaksi  }}</td>
                      <td>{{ $row->name }}</td>
                      <td>{{ $row->nama_produk }}</td>
                      <?php 
                      if(count($row->nama_ukuran)==0){?>
                      <td>-</td>
                      <?php
                      }else{?>
                      <td>{{ $row->nama_ukuran }}</td>
                      <?php
                      }
                      ?>
                      
                      <td>{{ $row->jumlah_beli }}</td>
                      <td>{{ $row->status_bayar }}</td>
                      <td>
                         <a class="btn btn-default" href="#">Detail</a>
                        <a class="btn btn-default" href="#">Edit Status pesan</a>
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
   

@endsection