@extends('admin.admin_template')


@section('content')

  <h2 tyle="align:center"><b >Daftar Testimoni</b><br/></h2>

    <div class="panel panel-card">
    <table class="table table-striped" style="align:center">
      <thead>
        <tr>
          <th>Tanggal</th>
          <th>ID</th>
          <th>Nama User</th>
          <th>Foto</th>
          <th>Keterangan</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
       
       @foreach ($data as $row)
        <tr>
          <td>{{ $row->tanggal_membuat }}</td>
          <td>{{ $row->id_testi }}</td>
          <td>{{ $row->nama_user }}</td>
          <td>{{ $row->foto }}</td>
          <td>{{ $row->keterangan }}</td>
          <td>{{ $row->status }}</td>

          <td>
             <a class="btn btn-info" href="#">Edit</a>
            <a class="btn btn-danger" href="#" onclick="return confirm('Are you sure to delete this data?')">Delete</a>
         </td>
        </tr>
       @endforeach
      </tbody>
    </table>
    </div>
    @endsection