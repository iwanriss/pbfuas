@extends('layoutMitra.masterMitra')
@section('contentMitra')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tables</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
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
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Daftar Video Edukasi
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>judul</th>
                                        <th>konten</th>
                                        <th>Link</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                @foreach ($videos as $item)
                                <tbody>
                                    <td>{{$item->judul}}</td>
                                    <td>{{$item->konten}}</td>
                                    <td>{{$item->link}}</td>
                                    <td>
                                        <button data-toggle="modal" onclick="editVideo({{$item->id}})" data-target="#edit_video_modal" class="btn btn-primary">Ubah</button>
                                        <br>
                                        <br>
                                        <button data-toggle="modal" data-target="#hapus_video_modal" onclick="hapusVideo({{$item->id}})" class="btn btn-danger">
                                            Hapus
                                        </button>
                                    </td>                                    
                                </tbody>
                                @endforeach    
                            </table>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah_data_edukasi">
                                Tambah Data 
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
    function editVideo(id){
        var action = "{{url('update-videos')}}/" + id;
        $.ajax({
            type: "GET",
            url: "{{url('get-data-videos')}}/" + id,
            dataType: "JSON",
            success: function(data){
                $('#judulEdit').val(data.judul)
                $('#kontenEdit').val(data.konten)
                $('#linkEdit').val(data.link)
                $('#edit_video').attr('action', action)
                console.log(data);

            }
        })
    }
    function hapusVideo(id) {
        var action = "{{url('hapus-video')}}/" + id;
        $('#hapus-video').attr('action', action);
    }
</script>

@endsection

@section('modal')
<div class="modal fade" id="tambah_data_edukasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Buat Data Produk Baru!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action = "{{url('tambah-data-edukasi')}}/" method = "POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Judul:</label>
                        <input type="text" name="judul" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Konten:</label>
                        <input type="text" name="konten" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Link:</label>
                        <input type="text" name="link" class="form-control" id="recipient-name">
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
<div class="modal fade" id="edit_video_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit data Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="edit_video" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Judul:</label>
                        <input type="text" name="judul" class="form-control" id="judulEdit">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Konten:</label>
                        <input type="text" name="konten" class="form-control" id="kontenEdit">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Link:</label>
                        <input type="text" name="link" class="form-control" id="linkEdit">
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
<div class="modal fade" id="hapus_video_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Hapus data Video</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah anda yakin menghapus data ini ?
                <div class="modal-footer">
                    <form id="hapus-video" method="POST">
                        @csrf
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Ya, saya yakin</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

