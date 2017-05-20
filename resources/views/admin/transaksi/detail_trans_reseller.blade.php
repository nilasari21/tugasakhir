@extends('admin.admin_template')


@section('content')
<div class="panel panel-card" >
  <h2 tyle="align:center"><b >Transaksi Reseller</b><br/></h2>

     <div class="box-body table-responsive margin">                   
    <table id="" class="table table-bordered table-hover dataTable table-striped">
      <thead>
        <tr>
          <!-- <th>Id Transaksi</th> -->
                      <th >Produk</th>
                      <th >Ukuran</th>
                      <th >Harga</th>
                      <th >Harga Tambah</th>
                      <th >Minimal beli produk</th>
                      <th >Jumlah</th>
                      <th >Keterangan</th>
                      
        </tr>
      </thead>
      <tbody>
        @php
        $i=1
        @endphp
       @foreach ($data as $row)
        <tr>
           <td >{{$row->nama_produk}}</td>
           <td >{{$row->nama_ukuran}}</td>
           <td >{{$row->harga_pokok}}</td>
           <td >{{$row->harga_tambah}}</td>
           <td >{{$row->minimal_beli}}<input type="hidden" id="min_beli{{$i}}" value="{{$row->minimal_beli}}"></td>
           <td >{{$row->jumlah_beli}}<input type="hidden" id="jumlah{{$i}}" value="{{$row->jumlah_beli}}"></td>
           <td ><span id="keterangan{{$i}}" value="Jumlah pembelian kurang dari minimal beli" ></span></td>
        </tr>
        <tr>
          <th colspan="7">Ongkos Kirim  {{$row->ongkir}} </th>

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
    // var pembanding=false;                                          
     @php
            $i=1;
            
            @endphp
             @foreach ($data as $row)
      var minimal_beli = $('#min_beli{{$i}}').val();
      // console.log({{$i}});
      console.log(minimal_beli);
      var jumlah = $('#jumlah{{$i}}').val();
      console.log(jumlah);

     
      if(jumlah < minimal_beli){
        var keterangan = $('#keterangan{{$i}}').text("Jumlah pembelian kurang dari minimal beli");
        
        console.log(keterangan);
      }
      if (jumlah >= minimal_beli) {
        var keterangan = $('#keterangan{{$i}}').text("Jumlah pembelian tidak kurang dari minimal beli");
        
        }
       @php
             $i++;
             
             @endphp
             @endforeach
   });
</script>
    @endsection