@extends('layoutMitra.masterMitra')
@section('contentMitra')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User Profile</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-sm-3">
                <div class="hero-widget well well-sm">
                    <div class="icon">
                        <i class="glyphicon glyphicon-user"></i>
                    </div>
                    <div class="text">
                        <div class="form-group">
                            @foreach($mitra as $item )
                            <label>Mitra</label>
                            <p class="form-control-static">{{$item->email}}</p>
                            <p class="form-control-static">{{$item->nomer_hp}}</p>
                            <p class="form-control-static">{{$item->tanggal_lahir}}</p>
                        </div>
                        
                        
                        <label class="text-muted">{{$item->name}}</label>
                    </div>   
                                                
                    @endforeach
                    {{-- <button data-toggle="modal" onclick="editMitra({{$item->id}})" data-target="#edit_mitra_modal" class="btn btn-primary">Edit</button> --}}
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
            </div>
        </div>
        <!-- /.row -->
    </div>
</div>

@endsection
@section('script')
<script>
    function editMitra(id) {
        // var action = "{{url('update-mitra')}}/" + id;
        $.ajax({
            type: "GET",
            url: "{{url('get-data-mitra')}}/" + id,
            dataType: "JSON",
            success: function(data){
                $('#nameEdit').val(data.name)
                $('#emailEdit').val(data.email)
                $('#nomer_hpEdit').val(data.nomer_hp)
                $('#tanggal_lahirEdit').val(data.tanggal_lahir)
                $('#edit_mitra').attr('action', action)
            }
        })
    }
</script>
@endsection
@section('modal')

{{-- <div class="modal fade" id="edit_mitra_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit data Mitra</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form id="edit_mitra" method = "POST">
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
</div> --}}

@endsection