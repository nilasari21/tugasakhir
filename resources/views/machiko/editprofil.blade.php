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

  
 
    <div class="row animated infinite slideInUp" style="animation-iteration-count: inherit;padding-top:250px;" >
        

        <div class="col-md-6">
        <div class="nav-tabs-custom">
            
            <!-- <div class="tab-content">
            <div class="active tab-pane" id="activity"> -->
            
                 
                <div class="box box-solid">
                    <div class="box-header with-border">
                    
                    <h5 class="box-title"><i class="fa fa-user"></i> Data diri</a></h5>
                    
                <div class="row">
                    
              
                    <div class="col-sm-12">

                        <div class="col-md-12">
                            <div class="box-body box-profile">
                                <?php     
                                if(count($data->foto)==0){?>
                                <img class="profile-user-img img-responsive img-circle" 
                                            src="{{asset("/machikoo/img/mauedit.png")}}" 
                                            style="height:200px; width:200px" alt="User profile picture">      
                                            <?php
                            }else{?>
                            <img class="profile-user-img img-responsive img-circle" 
                                            src="{{asset("/.img/produk/client/". $data->foto )}}" 
                                            style="height:200px; width:200px" alt="User profile picture">      
                            <?php } ?>
                            <br/>
                        </div>
                    
                    
                    <br/>
                    </div>
                </div>
                <div class="col-md-4" >
                        
                    </div>
                 <div class="col-md-4" dtyle="text-align:center">
                        <button  id="edit_data_diri" class="btn btn-fw btn-info waves-effect waves-effect"><i class="fa fa-edit"></i>  Edit Data diri</button>
                    </div>
                    <div class="col-md-4" >
                        
                    </div>
                    <div class="row">
                        <div class="col-sm-offset-1 col-xs-10">
                        
                        <form method="POST"  enctype="multipart/form-data" files="true" action="#">
                             <div class="row">
                                          {{ csrf_field() }}
                                          <div class="col-md-12">
                                            
                                            <!-- <input type="text" id="idtrans" name="idtrans"> -->
                                            <div class="form-group">
                                                <label for="exampleInputFile">Foto Profil</label>
                                                <input id="input-2" type="file" name='image' multiple=true class="file-loading" data-show-upload="false">
                                            </div>
                                            <div class="form-group">
                                                <label >Nama lengkap</label>
                                                <input  name='nama' type="text" value="{{$data->name}}">
                                            </div>
                                            <div class="form-group">
                                                <label >No Handphone</label>
                                                <input  name='no_hp' type="text" value="{{$data->no_hp}}">
                                            </div>
                                            <div class="form-group">
                                                <label >Email</label>
                                                <input  name='no_hp' type="text" value="{{$data->email}}">
                                            </div>
                                           
                                             <div class="form-group">
                                            <label >Tanggal lahir</label>
                                            <!-- <div class="col-sm-8"> -->
                                                <div class='input-group date' >
                                            <input type='text' name="tanggal_transfer" value="{{$data->tgl_lahir}}" class="form-control" id="datepicker" required >
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                            <!-- </div> -->
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