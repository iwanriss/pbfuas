@extends('layoutAdmin.masterAdmin')
@section('contentAdmin')

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
                            @foreach($admin as $item )
                            <label>Admin</label>
                            <p class="form-control-static">{{$item->email}}</p>
                            <p class="form-control-static">{{$item->nomer_hp}}</p>
                            <p class="form-control-static">{{$item->tanggal_lahir}}</p>
                        </div>
                    <label class="text-muted">{{$item->name}}</label>
                    </div>                                
                    @endforeach
                    <button data-toggle="modal" onclick="editAdmin({{$item->id}})" data-target="#edit_mitra_modal" class="btn btn-primary">Edit</button>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
            </div>
        </div>
        <!-- /.row -->
    </div>
</div>

@endsection
