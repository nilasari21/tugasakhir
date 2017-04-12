@extends('admin.admin_template')



@section('content')

        <div class="panel panel-card" >
        <div class="row">
          <section class="content-header" style="text-align:center">
            <h2>
               Produk Ready Stock
            </h2>
            <!-- You can dynamically generate breadcrumbs here -->
            </section>
        <section style="margin-right:30px; text-align:right">
         <button type="submit"  class="btn btn-fw btn-info waves-effect waves-effect" >Tambah</button>
        </section >
   </div>
<br/>
    <!-- <div class="panel panel-card"> -->
    <table class="table table-striped" style="align:center">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nama Produk</th>
          <th>Kategori</th>
          <th>Stock Total</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
       
       @foreach ($data as $row)
        <tr>
          <td>{{ $row->id_produk }}</td>
          <td>{{ $row->nama_produk }}</td>
          <td>{{ $row->nama_kategori }}</td>
          <td>{{ $row->tgl_akhir_po }}</td>
          
          <td>
             <a class="btn btn-success" href="#">Detail</a>
            <a class="btn btn-info" href="#">Edit</a>
            <a class="btn btn-danger" href="#" onclick="return confirm('Are you sure to delete this data?')">Hapus</a>
         </td>
        </tr>
       @endforeach
      </tbody>
    </table>
    </div>
    @endsection