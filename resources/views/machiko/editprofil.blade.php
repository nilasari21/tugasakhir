@extends('machiko.machiko_template')

@section('css')
<!-- <link rel="stylesheet" href="{{ asset('/adminlte/') }}/bootstrap/css/bootstrap.min.css"> -->
<link rel="stylesheet" href="{{ asset('machikoo/') }}/profil.css">
<style type="text/css">
hr {
    margin-top: 20px;
    margin-bottom: 20px;
    border: 1px;
    border-top: 1px solid #666;
}
</style>
@endsection

@section('content')

  <!-- <section class="content" style="padding-top:225px"> -->

  <div class="product-big-title-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="product-bit-title text-center">
                            <h2>Profil</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 
    <div class="row animated infinite slideInUp" style="animation-iteration-count: inherit;padding-top:250px;" >
        

        <div class="col-md-6">
        <div class="nav-tabs-custom">
            
            <!-- <div class="tab-content">
            <div class="active tab-pane" id="activity"> -->
            
                 
                <div class="box box-solid">
                    <div class="box-header with-border">
                    
                    <h5 class="box-title"><i class="fa fa-user"></i> Data diri</a></h5>
                    
                <div class="row">
                <div class="row">
                        <div class="col-sm-offset-1 col-xs-12">
                        
                        <form method="POST" action="#">
                             <div class="row" sty>
                                          {{ csrf_field() }}
                                          <div class="col-md-12">
                                            
                                            <!-- <input type="text" id="idtrans" name="idtrans"> -->
                                            <br/>
                                            <br/>
                                            <div class="form-group">
                                            <label for="inputName" class="col-sm-3 control-label">Nama lengkap</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="nama" value="{{$data->name}}" required/>
                                            </div>
                                            </div>
                                            <br/>
                                            <div class="form-group">
                                            <label for="inputName" class="col-sm-3 control-label">No Handphone</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="nama" value="{{$data->no_hp}}" required/>
                                            </div>
                                            </div>
                                            <br/>
                                            <div class="form-group">
                                            <label for="inputName" class="col-sm-3 control-label">Email</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="nama" value="{{$data->email}}" required/>
                                            </div>
                                            </div>
                                            <br/>
                                           <div class="form-group">
                                            <label for="inputName" class="col-sm-3 control-label">Tanggal lahir</label>
                                            <div class="col-sm-8">
                                                <div class='input-group date' >
                                            <input type='text' name="tanggal_transfer" value="{{$data->tgl_lahir}}" class="form-control" id="datepicker" required >
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                            </div>
                                            </div>
                                            <div class="form-group">
                                            <label for="inputName" class="col-sm-3 control-label">Jenis kelamin</label>
                                            <div class="col-sm-8">
                                                <div class='input-group date' >
                                            <input type='text' name="tanggal_transfer" value="{{$data->tgl_lahir}}" class="form-control" id="datepicker" required >
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                            </div>
                                            </div>
                                            
                                       
                                
                                 </div>

                            </div>
                            
                        </form>
            </div>
            </div>
    </div>
     </div>
    </div>
</div>
</div>
 

  <!-- </section> -->
  


  <!-- </section> -->

  
@endsection

            @section('js')
            <script>window.jQuery || document.write('<script src="{{ asset('/adminlte') }}/plugins/jQuery/jQuery-2.2.3.min.js"><\/script>')</script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{ asset('/adminlte') }}/bootstrap/js/bootstrap.min.js"></script>
<script src="{{ asset('/adminlte') }}/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ asset('/adminlte') }}/plugins/pace/pace.min.js"></script>
    <script src="{{ asset('/adminlte') }}/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="{{ asset('/adminlte') }}/plugins/fastclick/fastclick.js"></script>
    <script src="{{ asset('/adminlte') }}/dist/js/app.min.js"></script>
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