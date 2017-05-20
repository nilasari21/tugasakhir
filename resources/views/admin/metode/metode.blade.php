@extends('admin.admin_template')


@section('content')
  <div class="panel panel-card" >
        <div class="row">
          <section class="content-header" style="text-align:center">
            <h2>
               Metode Bayar
            </h2>
            <!-- You can dynamically generate breadcrumbs here -->
            </section>
            <br/>
            <section style="text-align:right; margin-right:30px">
  <a href="{{ url('metode/tambah') }}" class="btn btn-fw btn-info waves-effect waves-effect">Tambah</a>
</section>
</div>
     <div class="box-body table-responsive margin">                   
    <table id="data" class="table table-bordered table-hover dataTable table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Metode</th>
          <th>Nama</th>
          <th>Nomor</th>
          <th>Rate</th>
          <th>Jenis</th>
          <th>status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
       
       @foreach ($data as $row)
        <tr>
          <td>{{ $row->id }}</td>
          <td>{{ $row->metode }}</td>
          <td>{{ $row->nama_rekening }}</td>
          <td>{{ $row->nomor }}</td>
          <td>{{ $row->rate }}</td>
           <td>{{ $row->jenis }}</td>
          <td>{{ $row->status }}</td>

          <td>
             <a class="btn btn-warning" href="{{ url('metode/edit/'.$row->id) }}">Edit</a>
            
         </td>
        </tr>
       @endforeach
      </tbody>
    </table>
    </div>


    
    @endsection