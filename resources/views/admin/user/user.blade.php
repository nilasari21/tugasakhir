@extends('admin.admin_template')



@section('content')
<div class="panel panel-card" >
        <div class="row">
          <section class="content-header" style="text-align:center">
            <h2>
               Daftar User
            </h2>
            <!-- You can dynamically generate breadcrumbs here -->
            </section>
            <br/>
        

    </div>


<br/>
    <div class="panel panel-card">
    <table class="table table-striped" style="align:center">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nama</th>
          <th>Jenis Kelamin</th>
          <th>No Handphone</th>
          <th>Email</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
       
       @foreach ($data as $row)
        <tr>
          <td>{{ $row->id_user }}</td>
          <td>{{ $row->nama_lengkap }}</td>
          <td>{{ $row->jenis_kelamin }}</td>
          <td>{{ $row->no_hp }}</td>
          <td>{{ $row->email }}</td>
          <td>{{ $row->status }}</td>
          <td>
            <a class="btn btn-info" href="{{ url('user/edit/'.$row->id_kategori) }}" id="myBtn">Edit</a>
            
         </td>
        </tr>
       @endforeach
      </tbody>
    </table>
    </div>
   
    @endsection