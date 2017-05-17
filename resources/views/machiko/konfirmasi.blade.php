@extends('machiko.machiko_template')
@section('css')
<link href="{{ asset("/adminlte/plugins/datepicker/datepicker3.css") }}" rel="stylesheet" type="text/css" />
    
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
                                            <table cellspacing="0" class="shop_table cart" style="width:100%;align:center" >
                                                <thead >
                                                    <tr >
                                                        
                                                        
                                                        <th class="product-name" style="background:#66CC99">Id Transaksi</th>
                                                        <th class="product-price" style="background:#66CC99">Tanggal transaksi</th>
                                                        
                                                        <th class="product-price" style="background:#66CC99">Status</th>
                                                        <th class="product-price" style="background:#66CC99">Keterangan</th>
                                                        <th class="product-price" style="background:#66CC99" colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                   
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
                                                        <?php 
                                                        if(count($row->id_konfirmasi)==0){?>
                                                        <td class="product-name">
                                                            Pending 
                                                        </td>
                                                        <td class="product-name">
                                                            Silahkan upload bukti transfer dengan memilih tombol konfirmasi 
                                                        </td>
                                                        <td class="product-subtotal"colspan="2">
                                                        
                                                            <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-id="{{$row->id_transaksi}}" data-product_id="70" rel="nofollow" href="#">Konfirmasi</a>
                                                            
                                                        </td>
                                                        <?php
                                                        }else{?>
                                                        <td class="product-name">
                                                            {{$row->status}}
                                                        </td>
                                                        <td class="product-name">
                                                            {{ $row->keterangan}} 
                                                        </td>
                                                        <td class="product-subtotal"colspan="2">
                                                        
                                                            <a class="add_to_cart_button"  data-id="{{$row->id_transaksi}}" data-quantity="1" data-product_sku=""  data-product_id="70" rel="nofollow" href="#">Ubah bukti</a>
                                                            
                                                        </td>
                                                        <?php
                                                      }?>
                                                       

                                                    </tr>
                                                    @php
                                                    $i++;
                                                    @endphp
                                                    @endforeach
                                                    
                                                    
                                                       
                                                     
                                                </tbody>
                                            </table>
                                        </div>
                                        

                                      
                                    </div>                        
                                </div>                    
                            </div>

            <div class="modal fade" id="modal3" role="dialog">
                                <div class="modal-dialog">
                                
                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Konfirmasi pembayaran</h4>
                                    </div>
                                    <div class="modal-body">

                                      <!-- <div class="col-md-10 " >
                                      <div class="product-details">
                                      
                               
                                  <div class="col-sm-12 simpleCart_shelfItem anotherCart_shelfItem">
                                      <div class="product-information"  style="width:100%">  -->
                                        
                                    <form method="POST"  enctype="multipart/form-data" files="true" action="{{ url('konfirmasi/simpan') }}">
                                      <div class="row">
                                          {{ csrf_field() }}
                                          <div class="col-md-12">
                                            
                                            <input type="text" id="idtrans" name="idtrans">
                                            <div class="form-group">
                                                <label for="exampleInputFile">Upload bukti</label>
                                                <input id="input-2" type="file" name='image' multiple=true class="file-loading" data-show-upload="false">
                                            </div>
                                             <div class="form-group">
                                            <label for="exampleInputFile">Tanggal transfer</label>
                                            <!-- <div class="col-sm-8"> -->
                                                <div class='input-group date' >
                                            <input type='text' name="tanggal_transfer" class="form-control" id="datepicker" required >
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                            <!-- </div> -->
                                        </div>
                                        <div class="form-group">
                                                <label for="exampleInputFile">Total transfer</label>
                                               <input  type="number" name="total_transfer" class="form-control" placeholder="Total transfer" min=1 required> 
                                            </div>   
                
                 </div>

            </div>
       
       
    
<!-- </div>
</div>
</div>
</div> -->
                                    </div>
                                    <div class="modal-footer">
                                      <button type="submit" class="add_to_wishlist" style="text-transform:capitalize">Kirim bukti</button>
                                       </form>  
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

    <script>
  $(function () {
   $('#datepicker').datepicker({
    format: 'yyyy-mm-dd',
    // startDate: '-3d'
    })
     });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
          $(".add_to_cart_button").click(function(){
          $('#idtrans').val($(this).data('id'));
        $('#modal3').modal('show');
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
    @endsection