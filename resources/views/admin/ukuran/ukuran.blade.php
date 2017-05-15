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
         <form method="post" action="{{ url('ukuran/simpan') }}" style="margin-left:10px">
    {{ csrf_field() }}
    <div class="col-lg-10 col-md-10 col-sm-10">
    <input type="text" class="form-control" name="nama_ukuran"placeholder="Nama Ukuran" required>

  </div>

    <button type="submit"  class="btn btn-fw btn-info waves-effect waves-effect">Tambah</button>
    </form>

    </div>
    <br/>
     <div class="box-body table-responsive margin">                   
    <table id="data" class="table table-bordered table-hover dataTable table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Ukuran</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
       
       @foreach ($data as $row)
        <tr>
          <td>{{ $row->id }}</td>
          <td>{{ $row->nama_ukuran }}</td>
         <td>{{ $row->status }}</td>
          <td>
            <a class="btn btn-default" href="{{ url('ukuran/edit/'.$row->id_ukuran) }}">Edit</a>
            
         </td>
        </tr>
       @endforeach
      </tbody>
    </table>
    </div>
    @endsection