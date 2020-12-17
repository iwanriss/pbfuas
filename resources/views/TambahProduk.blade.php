@extends('layoutAdmin.masterAdmin')
@section('contentAdmin')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Data Produk</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Daftar Data Produk
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
                                        <th>Nama Produk</th>
                                        <th>Deskripsi</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th>Foto Produk</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $item)
                                    <tr>
                                        <td>{{$item->product_name}}</td>
                                        <td>{{$item->description}}</td>
                                        <td>{{$item->price}}</td>
                                        <td>{{$item->stock}}</td>
                                        <td>
                                            <img src="{{asset('storage/'. $item->avatar)}}" alt="" width="50">
                                        </td>
                                        <td>
                                            <button data-toggle="modal" onclick="editProduk({{$item->id}})" data-target="#edit_produk_modal" class="btn btn-primary">Ubah</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah_data_produk">
                                Tambah Data Penjualan
                            </button>
                            
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
</script>

@endsection
@section('modal')
<div class="modal fade" id="tambah_data_produk" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Buat Data Produk Baru!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action = "{{url('tambah-data-produk')}}/" method = "POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nama Produk:</label>
                        <input type="text" name="product_name" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Deskripsi:</label>
                        <input type="text" name="description" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Harga:</label>
                        <input type="text" name="price" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Stok:</label>
                        <input type="text" name="stock" class="form-control" id="recipient-name">
                    </div>
                    <div class="input-group">
                        <div class="custom-file">
                            <label class="custom-file-label" for="inputGroupFile04">Pilih Foto</label>
                            <input type="file" name="avatar" class="custom-file-input" id="avatar">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>

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

@endsection