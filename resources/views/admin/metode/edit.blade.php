@extends('admin.admin_template')


@section('content')
<div class="col-lg-8 col-md-8 col-sm-8">
<form method="post" action="{{ url('metode/update/'.$data->id_metode_bayar) }}">
   <div class="panel panel-card" style="padding:10px; ">
{{ csrf_field() }}
    <label> Metode</label><br/>
    <input type="text" class="form-control" name="metode"value="{{ $data->metode }}" required>
    <label> Nama Rekening </label><br/>
    <input type="text" class="form-control" name="nama_rekening"value="{{ $data->nama_rekening }}" required>
    <label> Nomor </label><br/>
    <input type="text" class="form-control" name="nomor"value="{{ $data->nomor }}" required>
    <label> Rate </label><br/>
    <input type="text" class="form-control" name="rate"value="{{ $data->rate }}" required>
    <label> Jenis </label><br/>
    
    <select name="jenis" class="form-control">
                        <?php if($data['jenis']=='Bank'): ?>
                                                            <option value="Bank" selected>Bank</option>
                                                            <option value="Pulsa">Pulsa</option>
                        <?php else: ?>
                        <option value="Bank">Bank</option>
                        <option value="Pulsa" selected>Pulsa</option>
                        <?php endif; ?>
                                                        </select>
   <label> Status</label><br/>
    <select name="status" class="form-control">
                        <?php if($data['status']=='Aktif'): ?>
                                                            <option value="Aktif" selected>Aktif</option>
                                                            <option value="Tidak aktif">Tidak aktif</option>
                        <?php else: ?>
                        <option value="Aktif">Aktif</option>
                        <option value="Tidak aktif" selected>Tidak aktif</option>
                        <?php endif; ?>
                                                        </select>
    <br/>
 <button type="submit"  class="btn btn-fw btn-info waves-effect waves-effect">Simpan</button>
</div>
</form>
</div>     
@endsection