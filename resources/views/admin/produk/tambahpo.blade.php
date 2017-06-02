@extends('admin.admin_template')
<!--  -->

@section('content')
@if(session()->has('message'))
    <div class="alert alert-danger">
        {{ session()->get('message') }}
    </div>
@endif
<form method="POST"  enctype="multipart/form-data" files="true">
   
    <div class="panel panel-card" style="padding:10px; ">
{{ csrf_field() }}
    <div class="form-group"  >
        <label for="exampleInputFile">Gambar Produk</label>
         <input id="input-2" type="file" name='image' multiple=true class="file-loading" data-show-upload="false">
    </div>
   
    <label> Nama Produk</label><br/>
        <input type="text" class="form-control" name="nama_produk" placeholder="Nama Produk" required>
    <label> Kategori Produk </label><br/>
        <select class="form-control" name="id_kategori">
                        <option>Pilih jenis produk</option>
                        @foreach($kategori as $kate)
                        <option value="{{$kate->id_kategori}}" >
                            {{$kate->nama_kategori}}
                        </option>
                        @endforeach
        </select>
    <!-- <label> Harga </label><br/>
        <input type="text" class="form-control" name="harga" placeholder="Harga Produk" required>
     -->
    <label> Ukuran Tersedia </label>
    <div class="form-group"  >
        <div class="radio">
            <label>
                <input type="radio" name="optionsRadios" id="optionsRadios1" value="radio1" onClick="display(this)" checked>
                     Tidak tersedia
            </label>
        </div>
        <div class="radio">
            <label>
                <input type="radio" name="optionsRadios" id="optionsRadios2" value="radio2" onClick="display(this)">
                      Tersedia
            </label>
        </div>
    </div>
    <div class="harga_pokok" id="harga_pokok"  >
           
            <input type="text" id="harga_pokok" name="harga_pokok" placeholder="harga pokok produk" style="padding:5px; width:25%;" >
            </div>
    <div class="formukuran" id="ukuran1" style="display:none" >
        @foreach($ukuran as $ukuran)    
            <input type="checkbox" name="id[]" value="{{$ukuran->id}}" > &nbsp;
            {{$ukuran->nama_ukuran}} </input>
            
            <input type="text" name="harga_tambah[]" placeholder="harga tambah dari harga pokok produk" style="padding:5px; width:25%" >
            <br/><br/>
        @endforeach     
    </div>
    <label>Mulai Preorder</label>
        <div class='input-group date' >
                        <input type='text' name="tgl_awal_po" class="form-control" id="tanggal" required >
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
    <label>Akhir Preorder</label>
        <div class='input-group date' >
                        <input type='text' name="tgl_akhir_po"class="form-control" id="tanggal2" required >
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
    <label>Berat(gram)</label>
        <input type="text" class="form-control" name="berat" placeholder="Berat" required>
    <label>Minimal beli (Reseller)</label>
        <input type="text" class="form-control" name="minimal_beli" placeholder="minimal beli" required>
    
   <!--  <label>Batas Akhir Pembayaran</label>
    <div class='input-group date' >
                        <input type='text' name="batas_bayar" class="form-control" id="tanggal3" required >
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div> -->
    <label>Metode Pembayaran</label>
    <br/>
    @foreach($metode as $metode)
        <input type="checkbox" name="metode_id[]" value="{{$metode->id}}">
        {{$metode->metode}} 
        <br/>
    @endforeach
  <div class="form-group">
         <label>Deskripsi Produk</label>
         <textarea id="editor1" name="editor1" rows="10" cols="80" >
                                            
                    </textarea>
         
   </div>
       {{ csrf_field() }}
    <button type="submit" id="buttonukuran1" class="btn btn-fw btn-success waves-effect waves-effect" style="display:none" >Tambah</button>
    <button type="submit" id="buttonnonukuran1" class="btn btn-fw btn-info waves-effect waves-effect">Tambah</button> 
    </div>

</form>  
</div>  
@endsection
@section('js')
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