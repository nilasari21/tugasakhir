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
    <div class="panel panel-card">
    <table class="table table-striped" style="align:center">
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
          <td>{{ $row->id_metode_bayar }}</td>
          <td>{{ $row->metode }}</td>
          <td>{{ $row->nama_rekening }}</td>
          <td>{{ $row->nomor }}</td>
          <td>{{ $row->rate }}</td>
           <td>{{ $row->jenis }}</td>
          <td>{{ $row->status }}</td>

          <td>
             <a class="btn btn-warning" href="{{ url('metode/edit/'.$row->id_metode_bayar) }}">Edit</a>
            
         </td>
        </tr>
       @endforeach
      </tbody>
    </table>
    </div>


    
    @endsection