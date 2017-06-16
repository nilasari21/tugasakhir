@extends('machiko.machiko_template')

@section('css')
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
<div class="product-big-title-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="product-bit-title text-center">
                            <h2>Testimoni</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@if(session()->has('message'))
    <div class="alert alert-danger">
        {{ session()->get('message') }}
    </div>
@endif

<div class="single-product-area">
    <!-- <div class="zigzag-bottom">
    </div> -->
    <div class="container ">
      @if (Auth::guest())
      @else
        <div class="row">
            <div class="col-md-12 col-sm-12 animated infinite slideInUp" style="animation-iteration-count: inherit;">
                <a class="add_to_cart_button" onClick="a()" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="#">Buat Testimoni</a>
            </div>
        </div>
      @endif
        <br/>
       <div class="row animated infinite slideInUp" style="animation-iteration-count: inherit;">
                @foreach ($data as $row)
                <div class="col-md-3 col-sm-6 " >
                    <div class="single-shop-product " >
                        
                        <div class="product-upper">
                            <img src="{{asset("/.img/produk/client/". $row->foto )}}" width="20px" height="20px"> 
                            {{ $row->name }}
                        </div>
                        <?php 
                        if(count($row->foto_testi)==0){?>
                        
                        <?php
                        }else{?> 
                        <div class="product-upper">
                            <img src="{{asset("/.img/produk/client/". $row->foto_testi )}}">
                        </div> 
                        <?php
                        }
                        ?>
                         
                        
                        <div>
                            <p>{{ $row->Keterangan }}</p>
                        </div>                   
                    </div>
                </div>
                @endforeach
               
            </div>
            <div class="modal fade" id="modal3" role="dialog">
                                <div class="modal-dialog">
                                
                                 
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Kirim Testimoni</h4>
                                    </div>
                                    <div class="modal-body">
                                     
                                    <form method="POST"  enctype="multipart/form-data" files="true" action="{{ url('testimoni/simpan') }}">
                                      <div class="row">
                                          {{ csrf_field() }}
                                          <div class="col-md-12" >
                                            <div class="form-group">
                                                <label for="exampleInputFile">Upload gambar</label>
                                                <input style="width:97%"id="input-2" type="file" name='image' multiple=true class="file-loading" data-show-upload="false">
                                            </div>
                                              <div class="form-group">
                                                  <label for="exampleInputFile">Testimoni produk</label><br/>
                    
                                             <textarea id="editor1" name="keterangan" rows="10"  style="border: 1px solid #DF5E96;width:100%">
                                            </textarea>
                                        </div>
                                        
                                         </div>

                                    </div>
                                  </div>
                                    <div class="modal-footer">
                                      <button type="submit" class="add_to_wishlist btn-lg" style="text-transform:capitalize;padding: 8px 20px;">Kirim testimoni</button>
                                       <button   class="add_to_wishlist btn" style="text-transform:capitalize" data-dismiss="modal">Batal</button>
                                      </form> 
                                    </div>
                            </div>
                                  
                                </div>
                              </div>


            
   
@endsection
 @section('js')
    <script type="text/javascript">
    function a(){
                
      
        $('#modal3').modal('show');
        
      
    }
             
        
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
              <script>
  @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
        
        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
  @endif
</script>
    @endsection