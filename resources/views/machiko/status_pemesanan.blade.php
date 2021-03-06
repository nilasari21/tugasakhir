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
<div class="product-big-title-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="product-bit-title text-center">
                            <h2>Status Pemesanan</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<div class="single-product-area">
        <!-- <div class="zigzag-bottom"></div> -->
        <div class="container ">
             <div class="col-md-12 animated infinite slideInUp" style="animation-iteration-count: inherit;">
                                <div class="product-content-right">
                                    <div class="woocommerce">
                                        
                                            <div class="table-responsive">
                                            <table cellspacing="0" class="shop_table cart" style="width:100%;align:center;font-size:12px" >
                                                <thead >
                                                    <tr >
                                                        
                                                        
                                                        <th class="product-name" style="background:#66CC99">Id Transaksi</th>
                                                        <th class="product-price" style="background:#66CC99">Tanggal transaksi</th>
                                                        <th class="product-price" style="background:#66CC99">Status pemesanan</th>
                                                        <th class="product-price" style="background:#66CC99">No resi</th>
                                                        
                                                        <th class="product-price" style="background:#66CC99" colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                        
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
                                                            {{ $row->id_transaksi}}
                                                        </td>
                                                        <td class="product-name">
                                                            {{ $row->tgl_transaksi}}
                                                        </td>
                                                        @if($row->status_bayar=="Belum lunas")
                                                        <td> <span style="font-size:16px !important">Silahkan upload bukti bayar di halaman konfirmasi bayar</span></td>
                                                        @else
                                                        <td class="product-name">
                                                            {{ $row->status_pemesanan_produk}}
                                                        </td>
                                                        @endif
                                                        <?php 
                                                        if(count($row->resi)==0){?>
                                                        <td class="product-name">
                                                            Belum ada nomor resi 
                                                        </td>
                                                       
                                                        <td class="product-subtotal"colspan="2">
                                                        
                                                            <a class="add_to_cart_button" rel="nofollow" href="{{ url('status_pesan/detail/'.$row->id_transaksi) }}">Lihat Detail</a>
                                                            
                                                        </td>
                                                        <?php
                                                        }else{?>
                                                        <td class="product-name">
                                                            {{$row->resi}}
                                                        </td>
                                                        
                                                        <td class="product-subtotal"colspan="2">
                                                        
                                                            <a class="add_to_cart_button"  data-id="{{$row->id_transaksi}}" data-quantity="1" data-product_sku=""  data-product_id="70" rel="nofollow" href="{{ url('status_pesan/detail/'.$row->id_transaksi) }}">Lihat Detail</a>
                                                            
                                                        </td>
                                                        <?php
                                                      }?>
                                                       

                                                    </tr>
                                                    
                                                    @php
                                                    $i++;
                                                    @endphp
                                                    @endforeach
                                                    
                                                    @endif
                                                       
                                                     
                                                </tbody>
                                            </table>
                                        </div>
                                        <p>Keterangan status</p><br/>
                                        1. Pending, kondisi dimana produk dalam transaksi sedang menunggu diproduksi/dipacking <br/>
                                        2. Produksi, kondisi dimana produk dalam transaksi sedang diproduksi<br/>
                                        3. Packing, kondisi dimana produk dalam transaksi sedang dipacking<br/>
                                        4. Pengiriman, kondisi dimana produk dalam transaksi sudah diambil oleh kurir JNE akan tetapi belum terdapat nomor resi<br/>
                                        5. Selesai, kondisi dimana produk dalam transaksi sudah dikirim oleh kurir dan sudah terdapat nomor resi<br/>
                                    </div>                        
                                </div>                    
                            </div>

           
            @endsection

            @section('js')
           
    <script src="{{ asset("adminlte/plugins/datepicker/bootstrap-datepicker.js") }}"  > </script>
  <script src="{{ asset("adminlte/plugins/input-mask/jquery.inputmask.js") }}"  > </script>
  <script src="{{ asset("adminlte/plugins/input-mask/jquery.inputmask.date.extensions.js") }}"  > </script>
  <script src="{{ asset("adminlte/plugins/input-mask/jquery.inputmask.extensions.js") }}"  > </script>

    <script>
  $(function () {
   $('#datepicker').datepicker({
    format: 'yyyy-mm-dd',
    // startDate: '-3d'
    })
     });
    </script>
    <script>
  $(function () {
   $('#datepicker2').datepicker({
    format: 'yyyy-mm-dd',
    // startDate: '-3d'
    })
     });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
          $("#konfirmbukti").click(function(){
          $('#idtrans').val($(this).data('id'));
        $('#modal3').modal('show');
        });
        });
        
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
          $("#ubahbukti").click(function(){
          $('#idtrans2').val($(this).data('id'));
        $('#modal').modal('show');
        });
        });
        
    </script>
<script type="text/javascript">
              Dropzone.options.myAwesomeDropzone = {
              paramName: "image", // The name that will be used to transfer the file
              maxFilesize: 2, // MB
              accept: function(file, done) {
                if (file.name == "justinbieber.jpg") {
                  done("Naha, you don't.");
                }
                else { done(); }
              }
            };
            // var myDropzone = new Dropzone("div#myId", { url: "/file/post"});
              </script>
              <script type="text/javascript">
              $("#input-2").fileinput({
                uploadUrl: "",
                uploadAsync: true,
                minFileCount: 1,
                maxFileCount: 5,
                allowedFileExtensions: ["jpg", "gif", "png", "jpeg"],
                uploadExtraData: function() {  // callback example
                    var out = {_token: "{{ csrf_token() }}"};
                    return out;
                }
            });
              </script>
               <script type="text/javascript">
              $("#input-3").fileinput({
                uploadUrl: "",
                uploadAsync: true,
                minFileCount: 1,
                maxFileCount: 5,
                allowedFileExtensions: ["jpg", "gif", "png", "jpeg"],
                uploadExtraData: function() {  // callback example
                    var out = {_token: "{{ csrf_token() }}"};
                    return out;
                }
            });
              </script>
    @endsection