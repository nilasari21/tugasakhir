@extends('admin.admin_template')


@section('content')
<div class="panel panel-card" >
  <!-- <h2 tyle="align:center"><b ></b><br/></h2> -->

     <div class="box-body table-responsive margin">                   
    <table id="" class="table table-bordered table-hover dataTable table-striped">
      <thead>
        <tr>
          <!-- <th>Id Transaksi</th> -->
                      <th >Produk</th>
                      <!-- <th >Ukuran</th>
                      <th >Harga</th>
                      <th >Harga Tambah</th> -->
                      <th >Minimal beli produk</th>
                      <th >Jumlah</th>
                      <th >Status</th>
                      <!-- <th >Keterangan status</th> -->
                      
        </tr>
      </thead>
      <tbody>
        @php
        $i=1
        @endphp
       @foreach ($data as $row)
        <tr>
           <td >{{$row->nama_produk}}</td>
           <!-- <td >{{$row->nama_ukuran}}</td>
           <td >{{ "Rp ".number_format($row->harga_pokok,2, ',', '.') }}</td>
           <td >{{ "Rp ".number_format($row->harga_tambah,2, ',', '.') }}</td> -->
           <td >{{$row->minimal_beli}}</td>
           <td >{{$row->jumlah_beli}}</td>
           <td >{{$row->c}}</span></td>
           <!-- <td >{{$row->keterangan_status}}</span></td> -->
        </tr>
         @php
         $i++
         @endphp 
       @endforeach
       <hr/>
       <!-- <br/> -->
        <tr >
          <th  >Ongkos Kirim  </th>
            
            <td>{{ "Rp ".number_format($row->ongkir,2, ',', '.') }} </td>

        </tr>
        <tr >
          <th >Total pembayaran</th>
            <td>  {{ "Rp ".number_format($row->total_bayar,2, ',', '.') }} </td>

        </tr>
        <tr >
           <th >Nama pemesan</th>
          <td  >  {{$detail->name}} </td>

        </tr>
        <tr >
           <th >No Handphone pemesan</th>
          <td  >    {{$detail->no_hp}} </td>

        </tr>
        <tr >
          <th >Tanggal pesan</th>
          <td  >    {{$detail->tgl_transaksi}} </td>

        </tr>
        <tr >
           <th >Kurir </th>
          <td  >  JNE {{$detail->kurir}} </td>

        </tr>
        @if(count($detail->resi)==0)
        <tr >
           <th >Nomor resi </th>
          <td  >   Belum ada nomor resi </td>

        </tr>
       @else
       <tr >
           <th >Nomor resi </th>
          <td  >   {{$detail->resi}} </td>

        </tr>
        @endif
        @if($detail->jenis_pemesanan=="Dropshipper")
        <tr >
           <th >Jenis pemesanan </th>
          <td  >   {{$detail->jenis_pemesanan}} </td>

        </tr>
        <tr >
           <th >Nama Toko </th>
          <td  >   {{$detail->toko}} </td>

        </tr>
        @else
        <tr >
           <th >Jenis pemesanan </th>
          <td  >   {{$detail->jenis_pemesanan}} </td>

        </tr>
        @endif
        <tr >
          <th >Tujuan Pengiriman</th>
          <td  >   {{$penerima->nama_penerima}}<br/>{{$penerima->no_hp_penerima}},<br/> {{$penerima->alamat_lengkap}},{{$penerima->kabupaten}}, {{$penerima->provinsi}} </td>

        </tr>
      </tbody>
    </table>
    <!--  <div class="col-sm-3 control-label"> -->
   

    </div>
  </div>
    @endsection
    @section('js')

    @endsection