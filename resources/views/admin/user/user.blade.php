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
     <div class="box-body table-responsive margin">                   
    <table id="data" class="table table-bordered table-hover dataTable table-striped">
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
          <td>{{ $row->id }}</td>
          <td>{{ $row->name }}</td>
          <td>{{ $row->jenis_kelamin }}</td>
          <td>{{ $row->no_hp }}</td>
          <td>{{ $row->email }}</td>
          <td>{{ $row->status_user }}</td>
          <td>
            <a class="btn btn-info" href="{{ url('user/edit/'.$row->id_kategori) }}" id="myBtn">Edit</a>
            
         </td>
        </tr>
       @endforeach
      </tbody>
    </table>
    </div>
   
    @endsection