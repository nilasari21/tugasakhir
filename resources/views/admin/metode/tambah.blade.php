@extends('admin.admin_template')


@section('content')
<div class="col-lg-8 col-md-8 col-sm-8">
<form method="post" action="{{ url('metode/simpan') }}">
   <div class="panel panel-card" style="padding:10px; ">
{{ csrf_field() }}
    <label> Metode</label><br/>
    <input type="text" class="form-control" name="metode"placeholder="Nama Metode" required>
    <label> Nama Rekening </label><br/>
    <input type="text" class="form-control" name="nama_rekening"placeholder="Isi (-) bila tidak ada" required>
    <label> Nomor </label><br/>
    <input type="text" class="form-control" name="nomor"placeholder="Nomor rekening atau Handphone" required>
    <label> Rate </label><br/>
    <input type="text" class="form-control" name="rate"placeholder="Isi (0) bila tidak memiliki rate" required>
    <label> Jenis </label><br/>
    <select class="form-control" name="jenis">
                    <option>Pilih jenis metode</option>
                    <option>Bank</option>
                    <option>Pulsa</option>
                    </select>
    <br/>
 <button type="submit"  class="btn btn-fw btn-info waves-effect waves-effect">Tambah</button>
</div>
</form>
</div>     
@endsection