@extends('admin.admin_template')



@section('content')

        <div class="panel panel-card" >
        <div class="row">
          
          <section class="content-header">
            <h1>
              {{ ('Pre Order') }}<small>{{ ('Semua Produk Pre Order') }}</small>
            </h1>
            <!-- <ol class="breadcrumb">
              <li><a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}">{{ config('backpack.base.project_name') }}</a></li>
              <li class="active">{{ trans('backpack::base.readystock') }}</li>
            </ol> -->
          </section>
      

        <section style="margin-left:20px; margin-top:20px;">
         <a href="{{ url('preorder/tambahpo') }}" class="btn btn-fw btn-info waves-effect waves-effect"><i class="fa fa-plus"></i>  Tambah Produk Pre Order</a>
        </section >
   </div>
<br/>
       
    <div class="box-body table-responsive margin">                   
    <table id="data" class="table table-bordered table-hover dataTable table-striped">
      <thead>
        <tr>
          
          <th>Nama Produk</th>
          <th>Kategori</th>
          <th>Mulai Preorder</th>
          <th>Akhir Preorder</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
       
       @foreach ($data as $row)
        <tr>
          
          <td>{{ $row->nama_produk }}</td>
          <td>{{ $row->nama_kategori }}</td>
          <td>{{ $row->tgl_awal_po }}</td>
          <td>{{ $row->tgl_akhir_po }}</td>
          
          <td>
             <a class="btn btn-default" href="{{ url('preorder/detail/'.$row->id ) }}"><i class="fa fa-eye"></i> Detail</a>
            <a class="btn btn-default" href="{{ url('preorder/edit/'.$row->id) }}"><i class="fa fa-edit"></i>  Edit</a>
            <!-- <a class="btn btn-default" href="#" onclick="return confirm('Are you sure to delete this data?')"><i class="fa fa-remove"></i>  Hapus</a> -->
         </td>
        </tr>
       @endforeach
      </tbody>
    </table>
  </div>
    </div>
    @endsection