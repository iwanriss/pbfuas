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
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Daftar Testimoni Customer
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Judul</th>
                                        <th>Penulis</th>
                                        <th>Gambar</th>
                                        <th>Konten</th>
                                        <th>Opsi</th>
                                    </tr>
                                    <tbody>
                                        @foreach($stories as $item)
                                        <tr>
                                            <td>{{$item->judul}}</td>
                                            <td>{{$item->author}}</td>
                                            <td><img src="{{asset('storage/'. $item->avatar_pengalaman)}}" alt="" width="100"></td>
                                            <td>{{$item->konten}}</td>
                                            <td>
                                                <button data-toggle="modal" data-target="#edit_customer_modal"  class="btn btn-primary">Lihat</button>
                                                <button data-toggle="modal" data-target="#hapus_customer_modal" class="btn btn-danger">Hapus</button>
                                                
                                            </td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                </thead>
                                
                            </table>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection