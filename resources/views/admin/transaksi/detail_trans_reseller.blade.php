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
                      <th >Jumlah pembelian</th>
                      <th >Keterangan</th>
                      
        </tr>
      </thead>
      <tbody>
        @php
        $i=1
        @endphp
       @foreach ($data as $row)
        
        <tr>
           <td >{{$row->nama_produk}} <input type="hidden" id="id_produk_ukuran{{$i}}" value="{{$row->minimal_beli}}"></td>
           
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
   <form action="{{ url('/transaksi_reseller/detail/update/') }}" method="post">
      {{ csrf_field() }}
                      
                       <input type="hidden" class="form-control" name="idtrans" value="{{$row->id_transaksi}}">
                       <input type="hidden" class="form-control" name="total1" value="{{$row->total_bayar}}">
                      <label for="inputName" class="col-sm-3 control-label" >Pilih persetujuan</label>  
                      <!-- </div> -->
        <table style="display:none">
          
          <tr>
          <th>Id produk ukuran</td>
          <th>Jumlah</td>
          </tr>
           @php
                                                    $i=1
                                                    @endphp
          @foreach($data2 as $row)
          <tr>
            <td><input type="text" class="form-control" name="iduser[]" value="{{$row->id_user}}"></td>
            <td><input type="text" class="form-control" name="idproUku[]" value="{{$row->id_produk_ukuran}}"></td>
            <td><input type="text" class="form-control" id="nilai1{{$i}}" name="jum_beli[]" value="{{$row->jumlah_beli}}"></td>
            <!-- <td><input type="text" class="form-control" name="jum_beli{{$i}}" value="{{$row->jumlah_beli}}"></td> -->
            <td class="product-name">
              <span class="amount" ><input name="berat[]" type="text" id="berat{{$i}}"  value="{{ $row->berat }} " style="width:70px" readonly></span> 
              <span class="amount" ><input name="berat2[]" type="text" id="beratto{{$i}}"  value="" style="width:70px" readonly></span> 
            </td>
             <td class="product-price">
                                                            <span class="amount"  ><input type="text" name="harga[]" id="nilai2{{$i}}" value="{{ $row->harga_pokok }}" onFocus="startCalc();" onBlur="stopCalc();"></span> 
                                                        </td>
            <td class="product-price">
              <span class="amount" ><input type="text" name="harga_tambah[]" id="nilai3{{$i}}"  onFocus="startCalc();" onBlur="stopCalc();" value="{{ $row->harga_tambah }}" ></span> 
            </td>
            <td class="product-subtotal" >
                                                            <span class="amount" ><input name="total[]" type="text" id="total{{$i}}"  value="" style="width:100px" readonly></span> 
                                                        </td>
            <tr>
              @php
                                                    $i++
                                                    @endphp
              @endforeach
        </table>

                      <div class="col-sm-3">
                        
                        <select class="form-control" style="width: 100%;" id="status_pesan" name="status_pesan" onChange="b()" data-toggle="modal" required/>
                            <option>Pilih jenis persetujuan</option>
                              <option value="Terima">Terima</option>
                              <option value="Tolak" >Tolak</option>
                              
                        </select>

                       
                              
                            </div> 
                      <div class="col-sm-3" style="display:none" id="diskon">
                        
                       Rp <input type="text" class="form-control" id="diskon" name="diskon"placeholder="Masukkan jumlah diskon angka saja">

                       
                              
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
<script type="text/javascript">
            $(document).ready(function (){
            @php
            $i=1;
            
            @endphp
            var  total=0;
            var  berat_total=0;
            @foreach ($data as $row)

            var satu = document.getElementById("nilai1{{$i}}").value; 
             console.log(satu);
            var dua = document.getElementById("nilai2{{$i}}").value; 
            console.log(dua);
             var tiga = document.getElementById("nilai3{{$i}}").value; 
             console.log(tiga);
             var berat = document.getElementById("berat{{$i}}").value; 
             console.log(berat);
             var beratto=document.getElementById("beratto{{$i}}").value=(parseInt(satu)* parseInt(berat));
             console.log(beratto);
             var hasil = document.getElementById("total{{$i}}").value=( parseInt(satu)* parseInt(dua))+ (parseInt(tiga)*parseInt(satu));

             
             @php
             $i++;
             
             @endphp
             @endforeach

        });
             
        
    </script>
    @endsection