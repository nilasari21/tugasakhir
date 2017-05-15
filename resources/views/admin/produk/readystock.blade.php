@extends('admin.admin_template')



@section('content')

        <div class="panel panel-card" >
        <div class="row">
          @section('header')
          <section class="content-header">
            <h1>
              {{ ('Ready Stock') }}<small>{{ ('Semua Produk Ready Stock') }}</small>
            </h1>
            <!-- <ol class="breadcrumb">
              <li><a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}">{{ config('backpack.base.project_name') }}</a></li>
              <li class="active">{{ trans('backpack::base.readystock') }}</li>
            </ol> -->
          </section>
      @endsection

        <section style="margin-left:20px; margin-top:20px;">
         <a href="{{ url('readystock/tambahrs') }}" class="btn btn-fw btn-info waves-effect waves-effect"><i class="fa fa-plus"></i>  Tambah Produk Ready Stock</a>
        </section >
   </div>
<br/>
       
    <div class="box-body table-responsive margin">                   
    <table id="data" class="table table-bordered table-hover dataTable table-striped">
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
          <td>{{ $row->id }}</td>
          <td>{{ $row->nama_produk }}</td>
          <td>{{ $row->nama_kategori }}</td>
          <td>{{ $row->stock_total }}</td>
          
          <td>
             <a class="btn btn-default" href="#">Detail</a>
            <a class="btn btn-default" href="#">Edit</a>
            <a class="btn btn-default" href="#" onclick="return confirm('Are you sure to delete this data?')">Hapus</a>
         </td>
        </tr>
       @endforeach
      </tbody>
    </table>
  </div>
    </div>
    @endsection