@extends('admin.admin_template')
<!--  -->
@section('css')
<style >
.aside.main-sidebar, {
    position: absolute !important;
    top: 0 !important;
    left: 0 !important;
    padding-top: 50px !important;
    min-height: 168% !important;
    width: 230px !important;
    z-index: 810 !important;
    -webkit-transition: -webkit-transform .3s ease-in-out,width .3s ease-in-out;
    -moz-transition: -moz-transform .3s ease-in-out,width .3s ease-in-out;
    -o-transition: -o-transform .3s ease-in-out,width .3s ease-in-out;
    transition: transform .3s ease-in-out,width .3s ease-in-out;
}
</style>
@endsection
@section('content')
@if(session()->has('message'))
    <div class="alert alert-danger">
        {{ session()->get('message') }}
    </div>
@endif
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
         
        <div id="initRow" class="form-group">
        
           
            <select class="form-control" name="id[]" style="padding:5px; width:30%">
                        <option>Pilih jenis ukuran</option>
                        @foreach($ukuran as $ukuran) 
                        <option value="{{$ukuran->id}}" >
                            {{$ukuran->nama_ukuran}} 
                        </option>
                        @endforeach 
        </select>
        
             <input type="text" name="stock_[]"  placeholder="stock" style="padding:5px; width:10%" >
            <input type="text" name="harga_tambah[]" placeholder="harga tambah dari harga pokok produk" style="padding:5px; width:25%" > &nbsp;
            
            </input>
            <button type="button" class="btn btn-fw btn-info waves-effect waves-effect">Tambah</button> 
            <!-- <a class="btn btn-default" name="multifield" style="border:1px solid #999 !important"><i class="fa fa-eye"></i>   Tambah</a> -->
            <!-- <input name="multifield" placeholder="Value"> -->
            
        
    </div>
    </div>
    <!-- <label>Stock Total</label>
        <input type="text" class="form-control" name="stock_total" placeholder="Berat" required> -->
    <label>Berat(gram)</label>
        <input type="text" class="form-control" name="berat" placeholder="Berat" required>
    <label>Minimal beli (Reseller)</label>
        <input type="text" class="form-control" name="minimal_beli" placeholder="minimal beli" required>
    
    <!-- <label>Batas Akhir Pembayaran</label>
    <input type="text" class="form-control" name="batas_jam" placeholder="Batas bayar(nominal jumlah jam)" required>  -->
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
<script type="text/javascript">
function addRow(section, initRow) {
    var newRow = initRow.clone().removeAttr('id').addClass('new').insertBefore(initRow),
        deleteRow = $('<a class="rowDelete"><img src="http://i.imgur.com/ZSoHl.png"></a>');
   
    newRow
        .append(deleteRow)
        .on('click', 'a.rowDelete', function() {
            removeRow(newRow);
        })
        .slideDown(300, function() {
            $(this)
                .find('button').focus();
        })
}
        
function removeRow(newRow) {
    newRow
        .slideUp(200, function() {
            $(this)
                .next('div:not(#initRow)')
                    .find('button').focus()
                    .end()
                .end()
                .remove();
        });
}

$(function () {
    var initRow = $('#initRow'),
        section = initRow.parent('section');
    
    initRow.on('focus', 'button', function() {
        addRow(section, initRow);
    });
});
</script>
@endsection