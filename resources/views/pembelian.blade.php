@extends('layoutAdmin.masterAdmin')
@section('contentAdmin')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Riwayat Pembelian</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Daftar Pesanan Masuk
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        @if ($errors->any())
                        <div class="alert alert-warning">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                        @elseif(session('berhasil'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{{ session('berhasil') }}</li>
                            </ul>
                        </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Nama Pembeli</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah</th>
                                        <th>Subtotal</th>
                                        <th>Kecamatan</th>
                                        <th>Alamat</th>
                                        <th>Foto Bukti</th>
                                        <th>Opsi</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $item)
                                    <tr>
                                        <td>{{$item->nama_depan}}<br>{{$item->nama_belakang}}</td>
                                        <td>{{$item->nama_barang}}</td>
                                        <td>{{$item->Qty}}</td>
                                        <td>{{number_format($item->subtotal)}}</td>
                                        <td>{{$item->kecamatan}}</td>
                                        <td>{{$item->alamat}}</td>

                                        <td><img src="{{asset('storage/'. $item->avatar_bukti)}}" alt="" width="100"  data-toggle="modal" data-target="#showImage" onclick="showImage(this)"></td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" 
                                            onclick="proses({{$item->id}})" data-target="#modalProses">
                                                Proses
                                            </button>
                                            <br>
                                            <br>
                                        <button type="button" class="btn btn-success" data-toggle="modal" 
                                        onclick="selesai({{$item->id}})" data-target="#modalSelesai">
                                                Selesai
                                            </button>
                                            <br>
                                            <br>
                                            <button type="button" class="btn btn-danger"
                                            data-toggle="modal" onclick="tolak({{$item->id}})"
                                            data-target="#modalTolak">
                                                Tolak
                                            </button>
                                        </td>
                                        <td>{{$item->status}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')

<script>
    function editProduk(id){
        var action = "{{url('update-produk')}}/" + id;
        $.ajax({
            type: "GET",
            url: "{{url('get-data-produk')}}/" + id,
            dataType: "JSON",
            success: function(data){
                $('#product_nameEdit').val(data.product_name)
                $('#descriptionEdit').val(data.description)
                $('#priceEdit').val(data.price)
                $('#stockEdit').val(data.stock)
                $('#edit_produk').attr('action', action)
                console.log(data);

            }
        })
    }
    function showImage(img){
        // $('#showImage').attr('src', "");
        var src= $(img).attr('src');
        $('#showImage').find('img').attr('src', src);
    }
    function selesai(id){
        var action = "{{url('/selesai')}}" +id
        $('#btnSelesai').attr('href', action);
    }
    function proses(id){
        var action = "{{url('/proses')}}"  + id
        $('#btnProses').attr('href', action);
    }
    function tolak(id){
        var action = "{{url('/tolak')}}" + id
        $('#btnTolak').attr('href', action);
    }
</script>

@endsection
@section('modal')
<div class="modal fade" id="edit_produk_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit data Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="edit_produk" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nama Produk:</label>
                        <input type="text" name="product_name" class="form-control" id="product_nameEdit">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Deskripsi:</label>
                        <input type="text" name="description" class="form-control" id="descriptionEdit">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Harga:</label>
                        <input type="text" name="price" class="form-control" id="priceEdit">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Stok:</label>
                        <input type="text" name="stock" class="form-control" id="stockEdit">
                    </div>
                    <div class="input-group">
                        <div class="custom-file">
                            <label class="custom-file-label" for="inputGroupFile04">Pilih Foto</label>
                            <input type="file" name="avatar" class="custom-file-input" id="avatarEdit">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="tutup">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>



<div class="modal fade bd-example-modal-lg" tabindex="-1" id="showImage" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <img src="" alt="" width="400">
        </div>
    </div>
</div>

<div class="modal fade" id="modalProses" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Konfirmasi Status</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Apakah anda yakin untuk mengganti status pemesanan ini?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <a id="btnProses" type="button" class="btn btn-primary">Ya, Saya Yakin</a>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modalSelesai" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Konfirmasi Status</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Apakah anda yakin untuk menyelesaikan pemesanan ini?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <a id="btnSelesai" type="button" class="btn btn-primary">Ya, Saya Yakin</a>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modalTolak" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Konfirmasi Penolakan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Apakah anda yakin untuk menolak pemesanan ini?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <a id="btnTolak" type="button" class="btn btn-danger">Ya, Saya Yakin</a>
        </div>
      </div>
    </div>
  </div>
@endsection