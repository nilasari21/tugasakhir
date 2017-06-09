@extends('admin.admin_template')



@section('content')

    <!-- <div class="col-md-6"> -->
        <div class="nav-tabs-custom">
          
                <div class="box box-solid">
                    <div class="box-header with-border">
                    
                    <!-- <h5 class="box-title"><i class="fa fa-user"></i> Detail produk</a></h5> -->
                    
                <div class="row">
                    
              
                    
               
                <form method="post" action="{{ url('readystock/edit/simpan/'.$data->id) }}">
                   
                    <div class="row">
                        <div class="col-sm-offset-1 col-xs-10">
                        
                        <div class="box-body table-responsive"> 
                    <label> Nama Produk</label><br/>
        <input type="text" class="form-control" name="nama_produk" value="{{$data->nama_produk}}" placeholder="Nama Produk" required>
    <label> Kategori Produk </label><br/>
        <select class="form-control" name="id_kategori">
                        <option value="{{$data->id_kategori}}">{{$data->nama_kategori}}</option>
                        @foreach($kategori as $kate)
                        <option value="{{$kate->id_kategori}}" >
                            {{$kate->nama_kategori}}
                        </option>
                        @endforeach
        </select>
    <!-- <label> Harga </label><br/>
        <input type="text" class="form-control" name="harga" placeholder="Harga Produk" required>
     -->
    
   
    <label>Berat(gram)</label>
        <input type="text" class="form-control" name="berat" placeholder="Berat" value="{{$data->berat}}"required>
    <label>Minimal beli (Reseller)</label>
        <input type="text" class="form-control" value="{{$data->minimal_beli}}" name="minimal_beli" placeholder="minimal beli" required>
    
    <label>Harga pokok</label>
    
                        <input type='text' name="harga" class="form-control"  value="{{$harga->harga_pokok}}"required >
                       
                    </div>
    
  <div class="form-group">
         <label>Deskripsi Produk</label><br/>
         <textarea id="editor1" name="editor1" rows="10" cols="80" >
                       {{$data->keterangan}}                     
                    </textarea>
         
   </div>
       {{ csrf_field() }}
    <button type="submit"  class="btn btn-fw btn-success waves-effect waves-effect"  >Simpan</button>    
                        <hr>
                        </div>
            </div>
            </div>
            </form>
    </div>
     </div>
    </div>
</div>
</div>
  
    <!-- </div> -->

    @endsection