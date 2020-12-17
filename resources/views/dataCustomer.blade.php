@extends('layoutAdmin.masterAdmin')
@section('contentAdmin')

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
                        Daftar Data Customer
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
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Nomer HP</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Opsi</th>
                                    </tr>
                                    <tbody>
                                        @foreach ($customer as $item)
                                        <tr>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->email}}</td>
                                            <td>{{$item->nomer_hp}}</td>
                                            <td>{{$item->tanggal_lahir}}</td>
                                            <td>
                                                <button data-toggle="modal" data-target="#edit_customer_modal" onclick="editCustomer({{$item->id}})" class="btn btn-primary">Edit</button>
                                                <button data-toggle="modal" data-target="#hapus_customer_modal" onclick="hapusCustomer({{$item->id}})" class="btn btn-danger">Hapus</button>
                                                
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
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
@section('script')
<script>
    function editCustomer(id) {
        var action = "{{url('update-customer')}}/" + id;
        $.ajax({
            type: "GET",
            url: "{{url('get-data-customer')}}/" +id,
            dataType: "JSON",
            success:function(data){
                $('#nameEdit').val(data.name)
                $('#emailEdit').val(data.email)
                $('#nomer_hpEdit').val(data.nomer_hp)
                $('#tanggal_lahirEdit').val(data.tanggal_lahir)
                $('#edit_customer').attr('action', action)
            }
        })
    }

    function hapusCustomer(id) {
        var action = "{{url('hapus-customer')}}/" + id;
        $('#hapus-customer').attr('action', action);
    }
</script>
@endsection
@section ('modal')
<div class="modal fade" id="edit_customer_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit data Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="edit_customer"  method = "POST">
                    @csrf
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nama:</label>
                        <input type="text" name="name" class="form-control" id="nameEdit">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">email:</label>
                        <input type="text" name="email" class="form-control" id="emailEdit">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nomer HP:</label>
                        <input type="text" name="nomer_hp" class="form-control" id="nomer_hpEdit">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Tanggal Lahir:</label>
                        <input type="text" name="tanggal_lahir" class="form-control" id="tanggal_lahirEdit">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="hapus_customer_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Hapus data Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah anda yakin menghapus data ini ?
                <div class="modal-footer">
                    <form id="hapus-customer" method="POST">
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

