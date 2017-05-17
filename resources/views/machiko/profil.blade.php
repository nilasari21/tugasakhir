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

  @foreach($data as $row)  
 
    <div class="row animated infinite slideInUp" style="animation-iteration-count: inherit;padding-top:250px;" >
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
            
            <div class="box-body box-profile">
            <?php     
            if(count($row->foto)==0){?>
            <img class="profile-user-img img-responsive img-circle" 
                        src="{{asset("/machikoo/img/mauedit.png")}}" 
                        style="height:100px; width:100px" alt="User profile picture">      
                        <?php
        }else{?>
        <img class="profile-user-img img-responsive img-circle" 
                        src="{{asset("/.img/produk/client/". $row->foto )}}" 
                        style="height:100px; width:100px" alt="User profile picture">      
        <?php } ?>
                    
                    
                  
                   
                    
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
                                if(count($row->foto)==0){?>
                                <img class="profile-user-img img-responsive img-circle" 
                                            src="{{asset("/machikoo/img/mauedit.png")}}" 
                                            style="height:200px; width:200px" alt="User profile picture">      
                                            <?php
                            }else{?>
                            <img class="profile-user-img img-responsive img-circle" 
                                            src="{{asset("/.img/produk/client/". $row->foto )}}" 
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
                        <a class="add_to_cart_button"  id="buttoncheckout" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="{{url('profil/edit/'.$row->id)}}">Edit data diri</a>
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
                                <td ><h5>{{$row->name}}</h5></td>
                            </tr>
                            <tr>
                                <td><h5>No Handphone</h5></td>
                                <td><h5> : </h5></td>
                                <td><h5>{{$row->no_hp}}</h5></td>
                            </tr>
                            <tr>
                                <td><h5>Email </h5></td>
                                <td><h5> : </h5></td>
                                <td><h5> {{$row->email}}</h5></td>
                            </tr>
                            <tr>
                                <td><h5>Jenis Kelamin </h5></td>
                                <td><h5> : </h5></td>
                                <td><h5>{{$row->jenis_kelamin}}</h5></td>
                            </tr>
                            
                            <tr>
                                <td><h5>Tanggal Lahir</h5></td>
                                <td><h5> : </h5></td>
                                <td><h5>{{$row->tgl_lahir}} </h5></td>
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
   @endforeach
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
                            <button  class="btn btn-fw btn-success waves-effect waves-effect"><i class="fa fa-plus"></i>  Tambah Alamat</button>
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
                                    <td colspan="1"> <button  class="btn btn-fw btn-info waves-effect waves-effect"><i class="fa fa-edit"></i>  Edit Alamat</button></td>
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
            
                 
                <div class="box box-solid">
                    <div class="box-header with-border">
                    
                    <h5 class="box-title"><i class="fa fa-user-secret"></i> Level user</a></h5>
                    
                <div class="row">
               
                    

                    <div class="row">
                        <div class="col-sm-offset-1 col-xs-10">
                        @foreach($data as $row)
                        <div class="col-xs-8">
                        <span>{{$row->level}}</span>
                        </div>
                        <div class="col-xs-4">
                        <button  class="btn btn-fw btn-info waves-effect waves-effect"><i class="fa fa-edit"></i>  Upgrade user</button>
                    </div>
                        @endforeach
            </div>
            </div>
    </div>
     </div>
    </div>
</div>
</div>
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
     
            @endsection