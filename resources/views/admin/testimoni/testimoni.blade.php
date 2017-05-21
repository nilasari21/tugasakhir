@extends('admin.admin_template')


@section('content')
<div class="panel panel-card" >
  <h2 tyle="align:center"><b >Daftar Testimoni</b><br/></h2>

     <div class="box-body table-responsive margin">                   
    <table id="data" class="table table-bordered table-hover dataTable table-striped">
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
          <td>{{ $row->created_at }}</td>
          <td>{{ $row->id_testi }}</td>
          <td>{{ $row->name }}</td>
          <?php 
          if(count($row->foto_testi)==0){?>
            <td></td>
            <?php
          }else{?>
          <td><img src=".img/produk/client/{{ $row->foto_testi }}" ></td>
          <?php
          }
          ?>
          
          <td>{{ $row->Keterangan }}</td>
          

          <td>
             
            <a class="btn btn-default" href="{{ url('testimoniadmin/delete/'.$row->id_testi) }}" onclick="return confirm('Yakin ingin menghapus testimoni?')"><i class="fa fa-remove"></i>  Delete</a>
         </td>
        </tr>
       @endforeach
      </tbody>
    </table>
    </div>
  </div>
    @endsection