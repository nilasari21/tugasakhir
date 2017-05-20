@extends('admin.admin_template')
<!--  -->

@section('content')
<!-- <div class="col-md-9"> -->
<form method="POST"  enctype="multipart/form-data" files="true">
{{ csrf_field() }}   
    <div class="panel panel-card" style="padding:10px; ">


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
            
   <!--  <label> Harga </label><br/>
        <input type="text" class="form-control" name="harga" placeholder="Harga Produk" required> -->
    
    <label> Ukuran Tersedia </label>
    <div class="form-group"  >
        <div class="radio">
            <label>
                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" onClick="displayForm(this)" checked>
                     Tidak tersedia
            </label>
        </div>
        <div class="radio">
            <label>
                <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2" onClick="displayForm(this)">
                      Tersedia
            </label>
        </div>
    </div>
    <div class="harga_pokok1" id="harga_pokok1" style="display:block" >
           
            <input type="text" id="harga_pokok1" name="harga_pokok1" placeholder="harga pokok produk" style="padding:5px; width:25%;display:block" >
            </div><br/>
    <div  class="stock1" id="stock1" > 
            <input type="text" id="stock1" name="stock1"  placeholder="stock" style="padding:5px; width:25%;" >
        </div>
            
    <div class="harga_pokok" id="harga_pokok" style="display:none" >
           
            <input type="text" id="harga_pokok" name="harga_pokok" placeholder="harga pokok produk" style="padding:5px; width:25%;display:block" >
            </div>    
    <br/>
    <div class="formukuran" id="ukuran" style="display:none" >
        @foreach($ukuran as $ukuran)    
            <input type="checkbox" name="id[]" value="{{$ukuran->id}}" > &nbsp;
            {{$ukuran->nama_ukuran}} </input>
            <input type="text" name="stock_[]"  placeholder="stock" style="padding:5px; width:10%" >
            <input type="text" name="harga_tambah[]" placeholder="harga tambah dari harga pokok produk" style="padding:5px; width:25%" >
            <br/><br/>
        @endforeach     
    </div>
    <!-- <label>Stock Total</label>
        <input type="text" class="form-control" name="stock_total" placeholder="Berat" required> -->
    <label>Berat(gram)</label>
        <input type="text" class="form-control" name="berat" placeholder="Berat" required>
    <label>Minimal beli (Reseller)</label>
        <input type="text" class="form-control" name="minimal_beli" placeholder="minimal beli" required>
    
    <label>Batas Akhir Pembayaran</label>
    <input type="text" class="form-control" name="batas_jam" placeholder="Batas bayar(nominal jumlah jam)" required> 
    <label>Metode Pembayaran</label>
    <br/>
    @foreach($metode as $metode)
        <input type="checkbox" name="metode_id[]" value="{{$metode->id}}">
        {{$metode->metode}} 
        <br/>
    @endforeach
  <div class="form-group">
         <label>Deskripsi Produk</label><br/>
         <textarea id="editor1" name="editor1" rows="10" cols="50" >
                                            
                    </textarea>
         
   </div>
       {{ csrf_field() }}
    <button type="submit" id="buttonukuran" class="btn btn-fw btn-success waves-effect waves-effect" style="display:none" >Tambah</button>
    <button type="submit" id="buttonnonukuran" class="btn btn-fw btn-info waves-effect waves-effect">Tambah</button> 
    </div>

</form>  
<!-- </div>   -->
@endsection
