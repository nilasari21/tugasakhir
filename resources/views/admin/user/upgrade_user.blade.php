@extends('admin.admin_template')


@section('content')
<div class="panel panel-card" >
  <h2 tyle="align:center"><b >Permintaan Upgrade user</b><br/></h2>

     <div class="box-body table-responsive margin">                   
    <table id="data" class="table table-bordered table-hover dataTable table-striped">
      <thead>
        <tr>
          <!-- <th>Id Transaksi</th> -->
                      <th width="15%">ID User</th>
                      <!-- <th>Jenis produk</th> -->
                      <th>Nama</th>
                      <th>Level</th>
                      <th >Aksi</th>
        </tr>
      </thead>
      <tbody>
       
       @foreach ($data as $row)
        <tr>
          <form method="post" action="{{ url('customer/upgrade/') }}">
            {{ csrf_field() }}
                      <td>{{ $row->id }}<input type="hidden" name="iduser" value="{{$row->id}}"></td>
                      <!-- <td>{{ $row->id }}</td> -->
                      <td>{{ $row->name }}</td>
                      <td>{{$row->level}}</td>
                      <td colspan="2">
                        <div class="col-md-4">
                             <input type="hidden" name="konfirm_admin" value="Terima">
                              <button type="submit"  class="btn btn-default"><i class="fa  fa-check-square-o"></i>  Terima</button>
                        </form>
                        </div>
                        
                        <form method="post" action="{{ url('customer/upgrade/') }}">
                          {{ csrf_field() }}
                          <input type="hidden" name="iduser" value="{{$row->id}}">
                          <input type="hidden" name="konfirm_admin" value="Tolak">
                          <button type="submit"  class="btn btn-default"><i class="fa  fa-remove"></i>  Tolak</button>
                        </form>
                        
                     </td>
        </tr>
       @endforeach
      </tbody>
    </table>
    </div>
  </div>
    @endsection