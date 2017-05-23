@extends('admin.admin_template')



@section('content')

    <!-- <div class="col-md-6"> -->
        <div class="nav-tabs-custom">
          
                <div class="box box-solid">
                    <div class="box-header with-border">
                    
                    <!-- <h5 class="box-title"><i class="fa fa-user"></i> Detail produk</a></h5> -->
                    
                <div class="row">
                    
              
                    
               
                <form method="post" action="{{ url('preorder/edit/simpan/'.$data->id) }}">
                   
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
    
    <label>Mulai Preorder</label>
        <div class='input-group date' >
                        <input type='text' name="tgl_awal_po" class="form-control" value="{{$data->tgl_awal_po}}" id="tanggal" required >
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
    <label>Akhir Preorder</label>
        <div class='input-group date' >
                        <input type='text' name="tgl_akhir_po"class="form-control" id="tanggal2" value="{{$data->tgl_akhir_po}}"required >
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
    <label>Berat(gram)</label>
        <input type="text" class="form-control" name="berat" placeholder="Berat" value="{{$data->berat}}"required>
    <label>Minimal beli (Reseller)</label>
        <input type="text" class="form-control" value="{{$data->minimal_beli}}" name="minimal_beli" placeholder="minimal beli" required>
    
    <label>Batas Akhir Pembayaran</label>
    <div class='input-group date' >
                        <input type='text' name="batas_bayar" class="form-control" id="tanggal3" value="{{$data->batas_waktu_bayar}}"required >
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
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