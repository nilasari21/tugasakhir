@extends('admin.admin_template')


@section('content')
<div class="panel panel-card" >
  <h2 tyle="align:center"><b >Transaksi Reseller</b><br/></h2>
<!--  <div class="col-sm-3 control-label"> -->
                      <!-- <label for="inputName" class="col-sm-3 control-label" >Jenis pemesanan</label>   -->
                      <!-- </div> -->
                      
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
           <!-- <td >{{$row->nama_ukuran}}</td>
           <td >{{ "Rp ".number_format($row->harga_pokok,2, ',', '.') }}</td>
           <td >{{ "Rp ".number_format($row->harga_tambah,2, ',', '.') }}</td> -->
           <td >{{$row->minimal_beli}}<input type="hidden" id="min_beli{{$i}}" value="{{$row->minimal_beli}}"></td>
           <td >{{$row->jumlah_beli}}<input type="hidden" id="jumlah{{$i}}" value="{{$row->jumlah_beli}}"></td>
           <td ><span id="keterangan{{$i}}"  ></span></td>
        </tr>
         @php
         $i++
         @endphp 
       @endforeach
        <tr style="text-align:center">
          <th colspan="4" style="text-align:center">Ongkos Kirim  {{ "Rp ".number_format($row->ongkir,2, ',', '.') }} </th>

        </tr>
        <tr style="text-align:center">
          <th colspan="4" style="text-align:center">Total pembayaran  {{ "Rp ".number_format($row->total_bayar,2, ',', '.') }} </th>

        </tr>
        
      </tbody>
    </table>
    <!--  <div class="col-sm-3 control-label"> -->
    <form action="{{ url('/transaksi_reseller/detail/update/'.$row->id_transaksi) }}" method="post">
      {{ csrf_field() }}
                       <input type="text" class="form-control" name="idtrans" value="{{$row->id_transaksi}}">
                       <input type="text" class="form-control" name="total" value="{{$row->total_bayar}}">
                      <label for="inputName" class="col-sm-3 control-label" >Pilih persetujuan</label>  
                      <!-- </div> -->
                      <div class="col-sm-3">
                        
                        <select class="form-control" style="width: 100%;" id="status_pesan" name="status_pesan" onChange="b()" data-toggle="modal" required/>
                            <option>Pilih jenis persetujuan</option>
                              <option value="Terima">Terima</option>
                              <option value="Tolak" >Tolak</option>
                              
                        </select>

                       
                              
                            </div> 
                      <div class="col-sm-3" style="display:none" id="diskon">
                        
                       <input type="text" class="form-control" id="diskon" name="diskon"placeholder="Masukkan jumlah diskon">

                       
                              
                            </div> 
                            <div class="col-sm-3">
                        
                       <!-- <a class="btn btn-default" href="#"><i class="fa fa-save"></i>  Simpan</a> -->
                       <button type="submit" class="btn btn-default" href="#"><i class="fa fa-save"></i>  Simpan</button> 
                       
                              
                            </div> 
                            </form>

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
      if (jumlah > minimal_beli) {
        var keterangan = $('#keterangan{{$i}}').text("Jumlah pembelian tidak kurang dari minimal beli");
        
        }
        if (jumlah == minimal_beli) {
        var keterangan = $('#keterangan{{$i}}').text("Jumlah pembelian tidak kurang dari minimal beli");
        
        }
       @php
             $i++;
             
             @endphp
             @endforeach
   });
</script>

<script type="text/javascript">
function b() {
      event.preventDefault();
      var pembanding=false;
@php
            $i=1;
            
            @endphp
             
      var keterangan = $('#keterangan{{$i}}').text();
      var status_pesan = $('#status_pesan').val();
      console.log(status_pesan);
     if(keterangan="Jumlah pembelian tidak kurang dari minimal beli"){

        pembanding = true;
      }
      console.log(pembanding);
      
        
       @php
             $i++;
             
             @endphp
             if(pembanding==true && status_pesan=="Terima"){
              document.getElementById('diskon').style.display = 'block';
             }if(pembanding==false && status_pesan=="Terima"){
              document.getElementById('diskon').style.display = 'none';
             }if(pembanding==true && status_pesan=="Tolak"){
              document.getElementById('diskon').style.display = 'none';
             }if(pembanding==false && status_pesan=="Tolak"){
              document.getElementById('diskon').style.display = 'none';
             }
             
     

            };
</script>
    @endsection