@extends('admin.admin_template')
@section('css')

@endsection

@section('content')
  <div id="myModal" class="modal" style="overflow: scroll !important;">
  <span class="close" style="font-size:50px; opacity: .5;">&times;</span>
  <img class="modal-content" id="img01" style="left:25%;margin-top:5%">
  <div id="caption"></div>
</div>
<div class="panel panel-card" >
  <!-- <h2 tyle="align:center"><b >Daftar Testimoni</b><br/></h2> -->

    <table id="data" class="table table-bordered table-hover dataTable table-striped">
      <thead>
     <div class="box-body table-responsive margin">                   
        <tr>
          <!-- <th>Tanggal bayar</th> -->
          <th>ID transaksi</th>
          <th>Nama User</th>
          <!-- <th>Produk</th> -->
          <!-- <th>Foto</th>
          <th>Total transfer</th> -->
          <th>Total harus bayar</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
       @php
       $i=1;
       @endphp
       @foreach ($data as $row)
       

        <tr>
          <form method="post" action="{{ url('pembayaran_cod/lunas/'.$row->id_transaksi) }}">
          <!-- <td>{{ $row->tgl_transfer }}</td> -->
          {{ csrf_field() }}
          <td>{{ $row->id_transaksi }}</td>
          <td>{{ $row->name }}</td>
          <!-- <td>{{ $row->nama_produk }}</td> -->
          <!-- <td>{{ $row->total_transfer }}</td> -->
          <td>{{ $row->total_bayar }}<input type="hidden" name="lunas" value="Lunas"></td>
          

          <td>
             
            <button type="submit"  class="btn btn-default"><i class="fa  fa-check-square-o"></i>  Lunas</button>
            </form>
         </td>
        </tr>
        @php
        $i++
        @endphp
       @endforeach
      </tbody>
    </table>
    </div>
  </div>

    @endsection
    @section('js')
    <!--<script type="text/javascript">
function b() {
      $.('modal').modal('show');
    }
</script>-->

    @endsection