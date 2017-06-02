@extends('machiko.machiko_template')

@section('css')
<!-- <link rel="stylesheet" href="{{ asset('/adminlte/') }}/bootstrap/css/bootstrap.min.css"> -->
<link href="{{ asset("/adminlte/plugins/datepicker/datepicker3.css") }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{asset("dropzone/dropzone.css")}}">
    <link  rel="stylesheet" type="text/css" href="{{asset("/machikoo/fileinput/css/fileinput.min.css")}}" />
<link rel="stylesheet" href="{{ asset('machikoo/') }}/profil.css">

<style type="text/css">
hr {
    margin-top: 20px;
    margin-bottom: 20px;
    border: 1px;
    border-top: 1px solid #666;
}
.content {
    min-height: 250px !important;
     padding-top: 15px !important; 
     margin-right: auto !important; 
     margin-left: auto !important; 
     padding-left: 0px !important; 
     padding-right: 0px !important; 
}
</style>
@endsection

@section('content')
<div class="modal fade" id="modal3" role="dialog">
                                <div class="modal-dialog">
                                
                                 
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Edit Data diri</h4>
                                    </div>
                                    <div class="modal-body">
                                     
                                    <form method="POST"   action="{{ url('profil/simpan') }}">
                                      <div class="row">
                                          {{ csrf_field() }}
                                          <div class="col-md-12" >
                                            <input type="hidden" name="iduser" id="iduser" value="">
                                              <div class="form-group">
                                            <label for="inputName" class="col-sm-6 control-label">Nama lengkap</label><br/>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="nama"name="nama" value="" required/>
                                            </div>
                                            </div>
                                            <br/>
                                            <div class="form-group">
                                            <label for="inputName" class="col-sm-6 control-label">No Handphone</label><br/>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="nohp" name="nohp" value="" required/>
                                            </div>
                                            </div>
                                            <br/>
                                            <div class="form-group">
                                            <label for="inputName" class="col-sm-6 control-label">Email</label><br/>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="email" name="email" value="" required/>
                                            </div>
                                            </div>
                                            <br/>
                                           <div class="form-group">
                                            <label for="inputName" class="col-sm-6 control-label">Tanggal lahir</label><br/>
                                            <div class="col-sm-12">
                                                <div class='input-group date' >
                                            <input type='text' name="tgl_lahir" class="form-control" id="datepicker" required >
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                            </div>
                                        </div>
                                            <div class="form-group">
                                            <label for="inputName" class="col-sm-6 control-label">Jenis kelamin</label><br/>
                                            <div class="col-sm-12">
                                                 <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                                <?php if($data['jenis_kelamin']=='Laki-laki'): ?>
                                                                                    <option value="Laki-laki" selected>Laki-laki</option>
                                                                                    <option value="Perempuan">Perempuan</option>
                                                <?php else: ?>
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan" selected>Perempuan</option>
                                                <?php endif; ?>
                                                 </select>
                                        </div>
                                            </div>
                                            </div>
                                            
                                         </div>

                                    </div>
                                  
                                    <div class="modal-footer">
                                      <button type="submit"  class="btn btn-info">Simpan</button>
                                      </form> 
                                       <button    class="btn btn-warning" style="text-transform:capitalize" data-dismiss="modal">Batal</button>
                                      
                                    </div>
                            </div>
                                  
                                </div>
                              </div>
<div class="modal fade" id="modal" role="dialog">
                                <div class="modal-dialog">
                                
                                 
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Tambah Alamat</h4>
                                    </div>
                                    <div class="modal-body">
                                     
                                    <form method="POST"   action="{{ url('profil/alamat') }}">
                                      <div class="row">
                                          {{ csrf_field() }}
                                          <div class="col-md-12" >
                                            <input type="hidden" name="iduser" id="iduser" value="">
                                              <div class="form-group">
                                            <label for="inputName" class="col-sm-6 control-label">Nama Alamat</label><br/>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="nama_alamat"name="nama_alamat" Placeholder="Contoh: Alamat rumah" value="" required/>
                                            </div>
                                            </div>
                                            <br/>
                                            <div class="form-group">
                                            <label for="inputName" class="col-sm-6 control-label">Nama Penerima</label><br/>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="nama_penerima" name="nama_penerima" Placeholder="Nama Peenerima" value="" required/>
                                            </div>
                                            </div>
                                            <br/>
                                            <div class="form-group">
                                            <label for="inputName" class="col-sm-6 control-label">No Handphone</label><br/>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="No Handphone" value="" required/>
                                            </div>
                                            </div>
                                            <br/>
                                            <div class="form-group">
                                            <label for="inputName" class="col-sm-6 control-label">Provinsi</label><br/>
                                            <div class="col-sm-12">
                                                <input type="text" placeholder="Provinsi" name="provinsi" id="provinsi" required="" value="" class="form-control"/>
                                                <input type="hidden" id="provinsi_asal" name="provinsi_asal" value="" />
                                            </div>
                                            </div>
                                            <br/>
                                           <div class="form-group">
                                            <label for="inputName" class="col-sm-6 control-label">Kabupaten/ Kota</label><br/>
                                            <div class="col-sm-12">
                                                <input type="text" placeholder="ex : Bandung" name="kota" required="" id="autocomplete" class="form-control"/>
                                                <input type="hidden" id="kota_asal" name="kota_asal" value="" />

                                            </div>
                                            </div>
                                            <div class="form-group">
                                            <label for="inputName" class="col-sm-6 control-label">Alamat lengkap</label><br/>
                                            <div class="col-sm-12">
                                                <textarea placeholder="Alamat lengkap. Contoh: Jalan Mangkubumi no 64, Depok" name="alamat_lengkap" id="alamat" rows='5'style="border: solid 1px;width:100%;" value=""  ></textarea>
                                            </div>
                                            </div>
                                            </div>
                                            
                                         </div>

                                    </div>
                                  
                                    <div class="modal-footer">
                                      <button type="submit"  class="btn btn-info">Simpan</button>
                                      </form> 
                                       <button    class="btn btn-warning" style="text-transform:capitalize" data-dismiss="modal">Batal</button>
                                      
                                    </div>
                            </div>
                                  
                                </div>
                              </div>
<div class="modal fade" id="modal2" role="dialog">
                                <div class="modal-dialog">
                                
                                 
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Edit Alamat</h4>
                                    </div>
                                    <div class="modal-body">
                                     
                                    <form method="POST"   action="{{ url('profil/editAlamat') }}">
                                      <div class="row">
                                          {{ csrf_field() }}
                                          <div class="col-md-12" >
                                            <input type="text" name="idpenerima" id="idpenerima" value="">
                                              <div class="form-group">
                                            <label for="inputName" class="col-sm-6 control-label">Nama Alamat</label><br/>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="nama_alamat" id="namaalamat" value="">
                                            </div>
                                            </div>
                                            <br/>
                                            <div class="form-group">
                                            <label for="inputName" class="col-sm-6 control-label">Nama Penerima</label><br/>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control"  name="nama_penerima" id="namapenerima" value="" required/>
                                            </div>
                                            </div>
                                            <br/>
                                            <div class="form-group">
                                            <label for="inputName" class="col-sm-6 control-label">No Handphone</label><br/>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control"  name="no_hp" id="nohp2" placeholder="No Handphone" value="" required/>
                                            </div>
                                            </div>
                                            <br/>
                                            <div class="form-group">
                                            <label for="inputName" class="col-sm-6 control-label">Provinsi</label><br/>
                                            <div class="col-sm-12">
                                                <input type="text" placeholder="Provinsi" name="provinsi" id="provinsi2" required="" value="" class="form-control"/>
                                                <input type="hidden" id="provinsi_asal" name="provinsi_asal" value="" />
                                            </div>
                                            </div>
                                            <br/>
                                           <div class="form-group">
                                            <label for="inputName" class="col-sm-6 control-label">Kabupaten/ Kota</label><br/>
                                            <div class="col-sm-12">
                                                <input type="text" placeholder="ex : Bandung" name="kota" required="" id="kota" class="form-control"/>
                                                <input type="hidden" id="kota_asal" name="kota_asal" value="" />

                                            </div>
                                            </div>
                                            <div class="form-group">
                                            <label for="inputName" class="col-sm-6 control-label">Alamat lengkap</label><br/>
                                            <div class="col-sm-12">
                                                <textarea placeholder="Alamat lengkap. Contoh: Jalan Mangkubumi no 64, Depok" name="alamat_lengkap" id="alamat2" rows='5'style="border: solid 1px;width:100%;" value=""  ></textarea>
                                            </div>
                                            </div>
                                            </div>
                                            
                                         </div>

                                    </div>
                                  
                                    <div class="modal-footer">
                                      <button type="submit"  class="btn btn-info">Simpan</button>
                                      </form> 
                                       <button    class="btn btn-warning" style="text-transform:capitalize" data-dismiss="modal">Batal</button>
                                      
                                    </div>
                            </div>
                                  
                                </div>
                              </div>
<div class="modal fade" id="modal4" role="dialog">
                                <div class="modal-dialog">
                                
                                 
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Upgrade User</h4>
                                    </div>
                                    <div class="modal-body">
                                     
                                    <form method="POST"   action="{{ url('profil/upgrade') }}">
                                      <div class="row">
                                          {{ csrf_field() }}
                                          <div class="col-md-12" >
                                            <input type="hidden" name="user" id="user" value="">
                                              <span style="font-size:15px">Perubahan level user hanya dapat dilakukan satu kali. Apabila anda telah merubah level
                                                    user, anda tidak dapat mengubahnya lagi. Perubahan level user memerlukan persetujuan admin.
                                                    Apabila belum ada persetujuan admin, level user anda tetap Customer.</span>
                                            <div class="form-group">
                                                
                                            <label for="inputName" class="col-sm-6 control-label">Pilih Level user</label><br/>
                                            <div class="col-sm-12">
                                                 <select name="level" id="leveluser" onChange="toko()"class="form-control">
                                                    <option value="">Pilih Level User</option>
                                                <option value="Reseller">Reseller</option>
                                                <option value="Dropshipper">Dropshipper</option>
                                                
                                                 </select>
                                        </div>
                                            </div>
                                             <div class="form-group" id="nama_toko" style="display:none">
                                            <label for="inputName" class="col-sm-6 control-label">Nama Toko</label><br/>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control"  name="nama_toko" id="nama_toko" placeholder="Nama Toko" value="" />
                                            </div>
                                            </div>
                                            </div>
                                            
                                         </div>

                                    </div>
                                  
                                    <div class="modal-footer">
                                      <button type="submit"  class="btn btn-info">Simpan</button>
                                      </form> 
                                       <button    class="btn btn-warning" style="text-transform:capitalize" data-dismiss="modal">Batal</button>
                                      
                                    </div>
                            </div>
                                  
                                </div>
                              </div>
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
 
    <div class="row animated infinite slideInUp" style="animation-iteration-count: inherit;padding: 60px 130px 130px !important;" style="">
        <!-- <div class="col-md-2" >
        </div> -->
            <!-- Profile Image -->
            <!-- <div class="box box-solid">
            <div class="box-header with-border">
                <h5 class="box-title">Photo</h5>
                <div class="box-tools">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            
           
                    
                    
                  
                   
                    
            <br/>
            </div>
            
        </div> -->
        <!-- /.box -->

        <!-- About Me Box -->
        <!-- <div class="box box-solid">
            <div class="box-header with-border">
                <h4 class="box-title">Menu</h4>
                <div class="box-tools">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
          
            <div class="box-body no-padding">
                <ul class="nav nav-pills nav-stacked">
                    <li class="">
                        <a href="">
                        <i class="fa fa-user"></i> Data diri</a>
                    </li>
                    <li class="">
                        <a href="">
                        <i class="fa fa-home"></i> Alamat</a>
                    </li>
                    <li class="">
                        <a href="">
                        <i class="fa fa-user-secret"></i>Upgrade user</a>
                    </li>
                    <li class="">
                        <a href="">
                        <i class="fa fa-key"></i>Ubah Kata sandi</a>
                    </li>
                </ul>
            </div>
            
        </div>
        
        </div> -->
        <!-- /.col -->

<!-- <div class="single-product-area"> -->
        <!-- <div class="zigzag-bottom"></div> -->

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
                <form method="POST"  enctype="multipart/form-data" files="true" action="{{ url('profil/ubahgambar') }}">
                        {{ csrf_field() }}
                <div class="col-sm-12">
                    
                <div class="form-group">
                     <label for="exampleInputFile">Ganti foto profil</label>
                     <input id="input-2" type="file" name='image' multiple=true class="file-loading" data-show-upload="false">
                     <button type="submit"  style="background-color:#66CC99"class="btn btn-default6"><i class="fa  fa-check-square-o"></i>  Ganti</button>
                                            </div>
                                             
                
              
          </form>
                                            </div>
               
                <div class="col-md-4" >
                        
                    </div>
                 <div class="col-md-4" dtyle="text-align:center">
                        <a class="add_to_cart_button"  id="buttonEdit" data-hp="{{$data->no_hp}}"data-id="{{$data->id}}" data-email="{{$data->email}}" data-tgl="{{$data->tgl_lahir}}" data-jk="{{$data->jenis_kelamin}}" data-nama="{{$data->name}}" rel="nofollow" href="#">Edit data diri</a>
                    </div>
                    <div class="col-md-4" >
                        
                    </div>
                    <div class="row">
                        <div class="col-sm-offset-1 col-xs-10">
                        
                        <div class="box-body table-responsive"> 
                        
                        <table id="example1" class="table dataTable table-striped"style="width: 70%;margin-left: 15%;" >
                            <tr>
                                <td width=""><h5>Nama Lengkap</h5></td>
                                <td width=""><h5> : </h5></td>
                                <td ><h5>{{$data->name}}</h5></td>
                            </tr>
                            <tr>
                                <td><h5>No Handphone</h5></td>
                                <td><h5> : </h5></td>
                                <td><h5>{{$data->no_hp}}</h5></td>
                            </tr>
                            <tr>
                                <td><h5>Email </h5></td>
                                <td><h5> : </h5></td>
                                <td><h5> {{$data->email}}</h5></td>
                            </tr>
                            <tr>
                                <td><h5>Jenis Kelamin </h5></td>
                                <td><h5> : </h5></td>
                                <td><h5>{{$data->jenis_kelamin}}</h5></td>
                            </tr>
                            
                            <tr>
                                <td><h5>Tanggal Lahir</h5></td>
                                <td><h5> : </h5></td>
                                <td><h5>{{$data->tgl_lahir}} </h5></td>
                            </tr>
                            
                            
                        </table>
                       
                        <hr>
                        </div>
            </div>
            </div>
    </div>
     </div>
    </div>
</div>
</div>
   
<div class="col-md-6">
        <div class="nav-tabs-custom">
            
            <!-- <div class="tab-content">
            <div class="active tab-pane" id="activity"> -->
            
                 
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h5 class="box-title"><i class="fa fa-home"></i> Alamat</a></h5>
                        <div class="row">
                        <div class="row">

                        <div class="col-sm-offset-1 col-xs-10">
                            <button  class="add_to_cart_button" onClick="a()" name="buttonTambah">  Tambah Alamat</button>
                        @foreach($penerima as $row)
                        <div class="box-body table-responsive"> 
                        
                        <table id="example1" class="table dataTable table-striped" >
                            
                                <tr>
                                    <td width="75%"><b>{{$row->nama_alamat}}</b><br/>
                                        {{$row->nama_penerima}}<br/>
                                        {{$row->no_hp_penerima}}<br/>
                                        {{$row->alamat_lengkap}}<br/>
                                        {{$row->kabupaten}},{{$row->provinsi}}<br/><br/>
                                    </td>
                                    <td colspan="1"> <a class="add_to_wishlist" style="padding: 9px 7px;" data-npenerima="{{$row->nama_penerima}}" data-id="{{$row->id_penerima}}" data-nalamat="{{$row->nama_alamat}}" data-nohp="{{$row->no_hp_penerima}}" data-alengkap="{{$row->alamat_lengkap}}" data-kab="{{$row->kabupaten}}" data-prov="{{$row->provinsi}}"  id="editAlamat"rel="nofollow" href="#">  Edit Alamat</a></td>
                                </tr>

                        </table>

                       
                       <br/>
                        </div>
                        @endforeach
            </div>
            </div>
    </div>
     </div>
    </div>
</div>
</div>
<div class="col-md-6">
        <div class="nav-tabs-custom">
            
            <!-- <div class="tab-content">
            <div class="active tab-pane" id="activity"> -->
            
                 @if($data->level=="Customer")
                <div class="box box-solid">
                    <div class="box-header with-border">
                    
                    <h5 class="box-title"><i class="fa fa-user-secret"></i> Level user</a></h5>
                    
                <div class="row">
               
                    

                    <div class="row">
                        <div class="col-sm-offset-1 col-xs-10">
                        
                        <div class="col-xs-8">
                        <span>{{$data->level}}</span>
                        </div>
                        <div class="col-xs-4">
                        <a class="add_to_cart_button"  style="padding: 6px 10px;" id="upgrade" data-id="{{$data->id}}"  rel="nofollow" href="#">  Upgrade user</a>
                    </div>
                       
            </div>
            </div>
    </div>
     </div>
    </div>
@else
<div class="box box-solid">
                    <div class="box-header with-border">
                    
                    <h5 class="box-title"><i class="fa fa-user-secret"></i> Level user</a></h5>
                    
                <div class="row">
               
                    

                    <div class="row">
                        <div class="col-sm-offset-1 col-xs-10">
                        
                        <div class="col-xs-8">
                        <span>{{$data->level}}</span>
                        </div>
                        <div class="col-xs-4">
                        
                    </div>
                       
            </div>
            </div>
    </div>
     </div>
    </div>
@endif
</div>
</div>

  <!-- </section> -->

  
@endsection

            @section('js')
            <script>window.jQuery || document.write('<script src="{{ asset('/adminlte') }}/plugins/jQuery/jQuery-2.2.3.min.js"><\/script>')</script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{asset("machikoo/js/jquery.autocomplete.min.js")}}"></script>
    <script src="{{ asset('/adminlte') }}/bootstrap/js/bootstrap.min.js"></script>
<script src="{{ asset('/adminlte') }}/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ asset('/adminlte') }}/plugins/pace/pace.min.js"></script>
    <script src="{{ asset('/adminlte') }}/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="{{ asset('/adminlte') }}/plugins/fastclick/fastclick.js"></script>
    <script src="{{ asset('/adminlte') }}/dist/js/app.min.js"></script>
  <script src="{{ asset("adminlte/plugins/datepicker/bootstrap-datepicker.js") }}"  > </script>
  <script src="{{ asset("adminlte/plugins/input-mask/jquery.inputmask.js") }}"  > </script>
  <script src="{{ asset("adminlte/plugins/input-mask/jquery.inputmask.date.extensions.js") }}"  > </script>
  <script src="{{ asset("adminlte/plugins/input-mask/jquery.inputmask.extensions.js") }}"  > </script>

    <script>
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
  $(function () {
   $('#datepicker').datepicker({
    format: 'yyyy-mm-dd',
    // startDate: '-3d'
    })
     });
    </script>
<script type="text/javascript">
        $(document).ready(function(){
          $("#buttonEdit").click(function(){
          $('#iduser').val($(this).data('id'));
          $('#nama').val($(this).data('nama'));
          $('#nohp').val($(this).data('hp'));
          $('#email').val($(this).data('email'));
          $('#datepicker').val($(this).data('tgl'));
          $('#jenis_kelamin').val($(this).data('jk'));
        $('#modal3').modal('show');
        });
        });
           
    </script>
<script type="text/javascript">
        $(document).ready(function(){
          $("#upgrade").click(function(){
          $('#user').val($(this).data('id'));
          
        $('#modal4').modal('show');
        });
        });
           
    </script>
    <script type="text/javascript">
    function toko(){
       var level=$('#leveluser').val();
       console.log(level);
       if(level=="Dropshipper"){
        document.getElementById('nama_toko').style.display = 'block';
       }if(level=="Reseller"){
        document.getElementById('nama_toko').style.display = 'none';
       }
        
      
    }
             
        
    </script>
<script type="text/javascript">
        $(document).ready(function(){
          $(".add_to_wishlist").click(function(){
          $('#idpenerima').val($(this).data('id'));
          $('#namapenerima').val($(this).data('npenerima'));
          $('#nohp2').val($(this).data('nohp'));
          $('#alamat2').val($(this).data('alengkap'));
          $('#namaalamat').val($(this).data('nalamat'));
          $('#kota').val($(this).data('kab'));
          $('#provinsi2').val($(this).data('prov'));
        $('#modal2').modal('show');
        var dataCities = [
            @foreach($kota as $datas)
              {"value": "{{ $datas['city_name']}}", "data": "{{ $datas['city_id']}}"}, 
                @endforeach
        ]
    $(document).ready(function () {
    $('#kota_asal').autocomplete({
        lookup: dataCities,
        // onSelect: function (suggestion) {
            onSelect: function (suggestion) {
                $("input[name=kota_asal]").val(suggestion.data);
                console.log(suggestion.data);
        }
    });
    });
        var dataProv = [
             @foreach($prov as $datas)
              {"value": "{{ $datas['province']}}", "data": "{{ $datas['province_id']}}"}, 
                @endforeach
        ]
        $(document).ready(function () {
        $('#provinsi2').autocomplete({
            lookup: dataProv,
            onSelect: function (suggestion) {
                $("input[name=provinsi_asal]").val(suggestion.data);
                console.log(suggestion.data);
            }
        });
        });
        });
        });
           
    </script>
    <script type="text/javascript">
    function a(){
        $('#modal').modal('show');
         var dataCities = [
            @foreach($kota as $datas)
              {"value": "{{ $datas['city_name']}}", "data": "{{ $datas['city_id']}}"}, 
                @endforeach
        ]
    $(document).ready(function () {
    $('#autocomplete').autocomplete({
        lookup: dataCities,
        // onSelect: function (suggestion) {
            onSelect: function (suggestion) {
                $("input[name=kota_asal]").val(suggestion.data);
                console.log(suggestion.data);
        }
    });
    });
        var dataProv = [
             @foreach($prov as $datas)
              {"value": "{{ $datas['province']}}", "data": "{{ $datas['province_id']}}"}, 
                @endforeach
        ]
        $(document).ready(function () {
        $('#provinsi').autocomplete({
            lookup: dataProv,
            onSelect: function (suggestion) {
                $("input[name=provinsi_asal]").val(suggestion.data);
                console.log(suggestion.data);
            }
        });
        });
        }
          
    </script>
            
@endsection