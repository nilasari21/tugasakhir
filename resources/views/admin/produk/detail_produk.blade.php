@extends('admin.admin_template')


@section('css')
<style type="text/css">
.btn {
    border-radius: 3px;
    -webkit-box-shadow: none;
    box-shadow: none;
    border: 1px solid #777 !important;
}
</style>
@section('content')
@if(session()->has('message'))
    <div class="alert alert-danger">
        {{ session()->get('message') }}
    </div>
@endif
    <!-- <div class="col-md-6"> -->
        <div class="nav-tabs-custom">
          
                <div class="box box-solid">
                    <div class="box-header with-border">
                    
                    <!-- <h5 class="box-title"><i class="fa fa-user"></i> Detail produk</a></h5> -->
                    
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
               <form method="POST"  enctype="multipart/form-data" files="true" action="{{ url('preorder/ubahgambar') }}">
   
                <div class="panel panel-card" style="padding:10px; ">
            {{ csrf_field() }}
             <div class="col-md-12">
            <div class="col-sm-4">
                <div class="form-group"  >
                  <input type="hidden" name="idpp" value="{{$data->id}}">
                    <label for="exampleInputFile">Ganti foto produk</label>
                     <input id="input-2" type="file" name='image' multiple=true class="file-loading" data-show-upload="false">
                </div>
                </div>
                <br/>

                <div class="col-sm-4">
                <button type="submit"  class="btn btn-default"><i class="fa  fa-check-square-o"></i>  Ganti</button>
              </div>
            </div>
              </form>
              <div class="col-sm-8">
                <!-- <button type="submit"  class="btn btn-default"><i class="fa  fa-check-square-o"></i>  Ganti</button> -->
              </div>
                 <div class="col-md-4" style="text-align:center">
                        <a class="btn btn-default1" border="1 solid #999"  id="buttoncheckout" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="{{ url('preorder/edit/'.$data->id) }}"><i class="fa fa-edit"></i>   Edit produk</a>
                    </div>
                   
                    <div class="row">
                        <div class="col-sm-offset-1 col-xs-10">
                        
                        <div class="box-body table-responsive"> 
                        
                        <table id="example1" class="table dataTable table-striped"style="width: 80%;margin-left: 15%;" >
                            <tr>
                                <td width=""><h5>Nama Produk</h5></td>
                                <td width=""><h5> : </h5></td>
                                <td ><h5>{{$data->nama_produk}}</h5></td>
                            </tr>
                            <tr>
                                <td><h5>Kategori</h5></td>
                                <td><h5> : </h5></td>
                                <td><h5>{{$data->nama_kategori}}</h5></td>
                            </tr>
                            <tr>
                                <td><h5>Berat</h5></td>
                                <td><h5> : </h5></td>
                                <td><h5>{{$data->berat}}</h5></td>
                            </tr>
                            <tr>
                                <td><h5>Minimal beli reseller </h5></td>
                                <td><h5> : </h5></td>
                                <td><h5> {{$data->minimal_beli}}</h5></td>
                            </tr>
                            
                              @if($data->jenis=="PreOrder")
                              <tr>
                                <td><h5>Mulai Pre Order </h5></td>
                                <td><h5> : </h5></td>
                                <td><h5>{{$data->tgl_awal_po}}</h5></td>
                              </tr>
                              <tr>
                                <td><h5>Akhir Pre Order </h5></td>
                                <td><h5> : </h5></td>
                                <td><h5>{{$data->tgl_akhir_po}}</h5></td>
                              </tr>
                              <tr>
                                <td><h5>Batas waktu bayar </h5></td>
                                <td><h5> : </h5></td>
                                <td><h5>{{$data->batas_waktu_bayar}}</h5></td>
                              </tr>
                              @else
                              <tr>
                                <td><h5>Batas waktu bayar </h5></td>
                                <td><h5> : </h5></td>
                                <td><h5>{{$data->batas_jam}} Jam</h5></td>
                              </tr>
                              @endif
                            
                            
                            <tr>
                                <td><h5>Deskripsi produk</h5></td>
                                <td><h5> : </h5></td>
                                <td><h5>{{$data->keterangan}} </h5></td>
                            </tr>
                            
                            
                        </table>
                        @if($data->jenis=="Ready Stock")
                       <table id="example1" class="table dataTable table-striped"style="width: 80%;margin-left: 15%;" >
                            <thead>
                              <th>Nama Ukuran</th>
                              <th>Stock</th>
                              <th>Harga pokok</th>
                              <th>Harga tambah</th>
                              <th>Aksi</th>
                            </thead>
                            @foreach($ukuran as $row)
                            <tr>
                              <td>{{$row->nama_ukuran}}</td>
                              <td>{{$row->stock}}</td>
                              <td>{{$row->harga_pokok}}</td>
                              <td>{{$row->harga_tambah}}</td>
                              <td><a class="btn btn-default2" border="1 solid #999" data-s="{{$row->stock}}" data-hp="{{$row->harga_pokok}}" data-ht="{{$row->harga_tambah}}" data-id="{{$row->id_produk_ukuran}}" id="buttoncheckout" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="{{url('profil/edit/'.$data->id)}}"><i class="fa fa-edit"></i>   Edit Produk</a></td>
                            </tr>
                            @endforeach
                        </table>
                        @else

                       <table id="example1" class="table dataTable table-striped"style="width: 80%;margin-left: 15%;" >
                            <thead>
                              <th>Nama Ukuran</th>
                              
                              <th>Harga pokok</th>
                              <th>Harga tambah</th>
                              <th>Aksi</th>
                            </thead>
                            @foreach($ukuran as $row)
                            <tr>
                              <td>{{$row->nama_ukuran}} {{$row->id_produk_ukuran}}</td>
                              
                              <td>{{$row->harga_pokok}}</td>
                              <td>{{$row->harga_tambah}}</td>
                              <td><a class="btn btn-default2"   data-idp="{{$data->id}}" data-id="{{$row->id_produk_ukuran}}" data-hp="{{$row->harga_pokok}}" data-ht="{{$row->harga_tambah}}" id="editukuran" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="#"><i class="fa fa-edit"></i>   Edit ukuran</a></td>
                            </tr>
                            @endforeach
                        </table>
                        @endif
                      <!-- <table id="example1" class="table dataTable table-striped"style="width: 80%;margin-left: 15%;" >
                            <thead>
                              <th>Nama Metode</th>
                              
                              <th>Status</th>
                              <th>Aksi</th>
                              
                            </thead>
                            @foreach($metode as $row)
                            <tr>
                              <td>{{$row->metode}}  {{$row->id_metode}}</td>
                              
                              <td>{{$row->status}}</td>
                              <td>
                               @if($row->status=="Aktif")
                              <form method="post" action="{{ url('preorder/status/'.$row->id_metode) }}">
                                {{ csrf_field() }}
                                <input type="text" name="idpp" value="{{$data->id}}">
                                <input type="hidden" name="status" value="Tidak Aktif">
                              <button type="submit"  class="btn btn-default"><i class="fa  fa-check-square-o"></i>  Tidak Aktif</button>
                              </form>
                              @else
                              <form method="post" action="{{ url('preorder/status/'.$row->id_metode) }}">
                                {{ csrf_field() }}
                                <input type="text" name="idpp" value="{{$data->id}}">
                                <input type="hidden" name="status" value="Aktif">
                              <button type="submit"  class="btn btn-default"><i class="fa  fa-check-square-o"></i>  Aktif</button>
                              </form>
                              @endif
                            </td>
                            </tr>
                            @endforeach
                        </table> -->
                        <hr>
                        </div>
            </div>
            </div>
    </div>
     </div>
    </div>
</div>
</div>
<div class="modal fade" id="modal3" role="dialog">
                                <div class="modal-dialog">
                                
                                 
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Edit Harga ukuran</h4>
                                    </div>
                                    <div class="modal-body">
                                     
                                    <form method="POST"   action="{{ url('preorder/simpan') }}">
                                      <div class="row">
                                          {{ csrf_field() }}
                                          <div class="col-md-12" >
                                            <input type="text" name="id" id="id" value="">
                                            <input type="text" name="idkonfirm" id="idkonfirm" value="">
                                              <div class="form-group">
                                                  <label for="exampleInputFile">Harga Pokok</label><br/>
                                                  <input type="text" name="hargap" id="hargap" value="" class="form-control">
                                            
                                        </div>
                                        <div class="form-group">
                                                  <label for="exampleInputFile">Harga tambah</label><br/>
                                                  <input type="text" name="hargat" id="hargat" value="" class="form-control">
                                            
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
    <!-- </div> -->

    @endsection
    @section('js')
<script type="text/javascript">
        $(document).ready(function(){
          $(".btn-default2").click(function(){
          $('#idkonfirm').val($(this).data('id'));
          $('#hargap').val($(this).data('hp'));
          $('#hargat').val($(this).data('ht'));
          $('#id').val($(this).data('idp'));
        $('#modal3').modal('show');
        });
        });
           
    </script>

   
    @endsection