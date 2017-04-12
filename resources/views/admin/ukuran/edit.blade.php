@extends('admin.admin_template')



@section('content')
<div class="panel panel-card" >
        <div class="row">
          <section class="content-header" style="text-align:center">
            <h2>
               Ukuran Produk
            </h2>
            <!-- You can dynamically generate breadcrumbs here -->
            </section>
            <br/>
          </div>
          
         <form method="post" action="{{ url('ukuran/update/'.$data->id_ukuran) }}" style="margin-left:10px">
          <div class="row">
    {{ csrf_field() }}
    <div class="col-lg-4 col-md-4 col-sm-4">
      <label> Nama Ukuran</label>
    <input type="text" class="form-control" name="nama_ukuran"value="{{ $data->nama_ukuran }}" required>
<br/>
  </div>
</div>
<div class="row">
  <div class="col-lg-4 col-md-4 col-sm-4">
    <label> Status</label>
    <select name="status" class="form-control">
                        <?php if($data['status']=='Aktif'): ?>
                                                            <option value="Aktif" selected>Aktif</option>
                                                            <option value="Tidak aktif">Tidak aktif</option>
                        <?php else: ?>
                        <option value="Aktif">Aktif</option>
                        <option value="Tidak aktif" selected>Tidak aktif</option>
                        <?php endif; ?>
                                                        </select>
  </div>
</div>
  <br/>
  <div class="row">
<div class="col-lg-4 col-md-4 col-sm-4">
    <button type="submit"  class="btn btn-fw btn-info waves-effect waves-effect">Simpan</button>
  </div>
  </div>
    </form>

    </div>
  </div>



   
    @endsection