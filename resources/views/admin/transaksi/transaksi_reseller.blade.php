@extends('admin.admin_template')


@section('content')
<div class="panel panel-card" >
  <h2 tyle="align:center"><b >Transaksi Reseller</b><br/></h2>

     <div class="box-body table-responsive margin">                   
    <table id="data" class="table table-bordered table-hover dataTable table-striped">
      <thead>
        <tr>
          <th>Id Transaksi</th>
                      <th>Tanggal Pesan</th>
                      <!-- <th>Jenis produk</th> -->
                      <th>Nama Pemesan</th>
                      <!-- <th>Keterangan</th> -->
                      <!-- <th>Nama Produk</th>
                      <th>Ukuran</th>
                      <th>Jumlah</th>
                      <th>Pembayaran</th> -->
                      <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
       
       @foreach ($data as $row)
        <tr>
          <td>{{ $row->id_transaksi }}</td>
                      <td>{{ $row->tgl_transaksi  }}</td>
                      <!-- <td>{{ $row->jenis }}</td> -->
                      <td>{{ $row->name }}</td>
                      <!-- <td>{{ $row->minimal_beli }}</td> -->
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
                      
                      <td>{{ $row->jumlah_beli }}</td>
                      <td>{{ $row->status_bayar }}</td> -->
                      <td>
                         <a class="btn btn-success" href="{{ url('/transaksi_reseller/detail/'.$row->id_transaksi ) }}">Detail</a>
                        <!-- <a class="btn btn-info" href="#">Edit Status pesan</a> -->
                        
                     </td>
        </tr>
       @endforeach
      </tbody>
    </table>
    </div>
  </div>
    @endsection