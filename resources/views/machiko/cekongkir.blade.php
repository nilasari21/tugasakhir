@extends('machiko.machiko_template')
@section('css')

<link rel="stylesheet" href="{{asset("/machikoo/bootstrap-3.2.0/dist/css/bootstrap.min.css")}}">
@endsection

@section('content')
<div class="single-product-area">
    <div class="zigzag-bottom">
    </div>
    <div class="container animated infinite slideInUp" style="animation-iteration-count: inherit;">
    <div class="col-sm-10" style="padding-left:20%">       
            <div class="form-group">
            <div class="panel panel-default">
            <div class="panel-heading" align="center" style="font-size:20px;background:#66CC99;font-family:Raleway"><b>Cek Ongkos Kirim</b></div>
                <div class="panel-body">
                <!--  -->
                <div class="row" style="margin-top:15px">
                <form class="form-horizontal" action="{{ url('cekongkir/hasil') }}" method="post">  
                     {{ csrf_field() }} 
                    <div class="form-group">
                     
                      <div class="col-sm-8" style="padding-left:25%">

                         <p style="font-size:12px">Kota asal Machiko K-Store : Yogyakarta</p>

                        </div>
                      </div>
                      <div class="form-group">
                      <label for="inputName" class="col-sm-3 control-label" >Kota asal</label>
                      <div class="col-sm-8">

                         <input type="text" autocomplete="off" class="form-control" value="Yogyakarta" readonly="readonly" >
                          

                        </div>
                      </div>
                       <div class="form-group">
                      <label for="inputName" class="col-sm-3 control-label" >Kota tujuan</label>
                      <div class="col-sm-8">
                          <input type="text" placeholder="ex : Bandung" name="kota" required="" id="autocomplete" class="form-control"/>
                          <input type="hidden" id="kota_asal" name="kota_asal" value="" />

                        </div>
                      </div>
                       <div class="form-group">
                      <label for="inputName" class="col-sm-3 control-label" >Berat</label>
                      <div class="col-sm-5">
                          <input type="text" placeholder="ex :1700" name="berat" id="berat" required="" autocomplete="off" class="form-control"/>
                         </div>
                     
                        <p>gram</p>
                     
                      </div>
                      <div class="form-group">
                      
                      <div class="col-sm-8" style="padding-left:25%">
                         <div class="row" style="width: 500px; height: 50px; margin-left: 100px;">
                           <div class="radio-inline">
                          <label>
                           <input type="radio" class="radio" name="optionsRadio" id="optionsRadios1" value="jne" >
                             JNE
                           </label>
                            </div>
                            <div class="radio-inline">
                          <label>
                           <input type="radio" class="radio"name="optionsRadio" id="optionsRadios1" value="pos" >
                            POS
                           </label>
                            </div>

                           </div>
                        </div>
                      </div>
                      <div class="form-group">
                      
                      <div class="col-sm-8" style="padding-left:25%">
                         <button type="submit" class="btn btn-default" onClick="getOngkir()" style="background:#66CC99">Cek Tarif</button>
                        </div>
                      </div>

                       <div class="form-group">
                         <div class="col-sm-2">
                      </div>
                        <div class="col-sm-8">
                        <table cellspacing="0"  class="shop_table cart" style="width:100%;align:center" >
                          <thead >
                            <tr >
                              
                              <th class="product-price" style="background:#66CC99;font-family:Raleway">Jenis</th>
                              <th class="product-quantity" style="background:#66CC99;font-family:Raleway">Deskripsi</th>
                              <th class="product-price" style="background:#66CC99;font-family:Raleway">Estimasi sampai</th>
                              <th class="product-price" style="background:#66CC99;font-family:Raleway">Harga</th>
                              
                            </tr>
                          </thead>
                        <tbody id="ongkos">
                          <tr>
                              <td colspan="9">
                                                            
                                   Belum Cek ongkir                         
                            </td>
                          </tr>
                      </tbody>
                    </table>
                  </div>
                       </div>
                </form>   
                
  </div>

</div>
<!-- </body> -->
@endsection

@section('js')

<script src="{{asset("machikoo/js/jquery.autocomplete.min.js")}}"></script>
<script>
var dataCities = [
     @foreach($data as $datas)
      {"value": "{{ $datas['city_name']}}", "data": "{{ $datas['city_id']}}"}, 
        @endforeach
]
$(document).ready(function () {
$('#autocomplete').autocomplete({
    lookup: dataCities,
    onSelect: function (suggestion) {
        $("input[name=kota_asal]").val(suggestion.data);
    }
});
});
</script>
<script type="text/javascript">
function getOngkir() {
      event.preventDefault();

      //var kota_asal = $('#kota').val();
      var kota_tujuan = $('#kota_asal').val();
      console.log(kota_tujuan);
      var berat =$('#berat').val();
       var radio = $('input[name=optionsRadio]:checked', '.radio-inline').val();
       console.log(radio)
      var service, des, etd, value;
       $.get("cekongkir/hasil/"+kota_tujuan+"/"+radio+"/"+berat,
        function(hasil){
            $('#ongkos').empty();
            $.each(hasil, function(index, hasil){
              console.log(hasil.costs.length);
              if(hasil.costs.length == 0){
                $('#ongkos').append('<p>Pengiriman dari Yogyakarta Tidak Tersedia</p>')
              }else{
                $.each(hasil.costs, function(index, hasil){
                  service = hasil.service;
                  des = hasil.description;
                  $.each(hasil.cost, function(index, hasil){
                    console.log(service);
                    $('#ongkos').append(
                    
                    '<tr><td style="color:#000">'+service+' '+'</td>'+
                    '<td>'+des+'</td>'+
                    '<td>'+hasil.etd+'</td>'+
                    '<td>'+(hasil.value)+'</td></tr>'
                    );
                  }); 
                }); 
              }
            }); 
            
        });
    };
</script>
  
@endsection
