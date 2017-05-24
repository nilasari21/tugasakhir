@extends('machiko.machiko_template')
@section('css')
<link href="{{ asset("/adminlte/plugins/datepicker/datepicker3.css") }}" rel="stylesheet" type="text/css" />
    <style type="text/css">
.krajee-default.file-preview-frame {
    position: relative;
    display: table;
    margin: 8px;
    border: 1px solid #ddd;
    box-shadow: 1px 1px 5px 0 #a2958a;
    padding: 6px;
    float: left;
    text-align: center;
    width: 97%;
}
</style>
@endsection

@section('content')
<p id="demo"></p>
<div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container ">
             <div class="col-md-12 animated infinite slideInUp" style="animation-iteration-count: inherit;">
                                <div class="product-content-right">
                                    <div class="woocommerce">
                                        
                                            <div class="table-responsive">
                                            <table cellspacing="0" class="shop_table cart" style="width:100%;align:center;font-size:12px" >
                                                <thead >
                                                    <tr >
                                                        
                                                        
                                                        <th class="product-name" style="background:#66CC99">Nama produk</th>
                                                        <th class="product-name" style="background:#66CC99">Ukuran</th>
                                                        <th class="product-name" style="background:#66CC99">Jumlah</th>
                                                        <th class="product-price" style="background:#66CC99">Status pemesanan</th>
                                                        <th class="product-price" style="background:#66CC99">Keterangan</th>
                                                         
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                    @if(count($data)==0)
                                                    <tr>
                                                      <td colspan="8" style="font-size:15px"> Belum ada transaksi</td>
                                                    </tr>
                                                    @else
                                                    @php
                                                    $i=1;
                                                    @endphp
                                                    @foreach ($data as $row)
                                                   

                                                    <tr class="cart_item">

                                                        <td class="product-name">
                                                            {{ $row->nama_produk}}
                                                            {{ $row->id_detail_transaksi}}
                                                        </td>
                                                        <td class="product-name">
                                                            {{ $row->nama_ukuran}}
                                                        </td>
                                                         <td class="product-name">
                                                            {{ $row->jumlah_beli}}
                                                        </td>
                                                        <td class="product-name">
                                                            {{ $row->status_pesan}}
                                                        </td>
                                                         
                                                        @if($row->status_pesan)
                                                        <td class="product-name">
                                                            Produk menunggu diproses
                                                        </td>
                                                        @else
                                                        <td class="product-name">
                                                            {{ $row->keterangan_status}}
                                                        </td>
                                                       @endif
                                                        
                                                       

                                                    </tr>
                                                    
                                                    @php
                                                    $i++;
                                                    @endphp
                                                    @endforeach
                                                    
                                                    @endif
                                                       
                                                     
                                                </tbody>
                                            </table>
                                        </div>
                                        

                                      
                                    </div>                        
                                </div>                    
                            </div>

           
            @endsection

            @section('js')
           
    <script src="{{ asset("adminlte/plugins/datepicker/bootstrap-datepicker.js") }}"  > </script>
  <script src="{{ asset("adminlte/plugins/input-mask/jquery.inputmask.js") }}"  > </script>
  <script src="{{ asset("adminlte/plugins/input-mask/jquery.inputmask.date.extensions.js") }}"  > </script>
  <script src="{{ asset("adminlte/plugins/input-mask/jquery.inputmask.extensions.js") }}"  > </script>

    @endsection