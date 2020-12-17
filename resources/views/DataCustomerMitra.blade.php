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
                        Daftar Data Mitra
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        @if ($errors->any())
                        <div class="alert alert-success">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                                @endforeach
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
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customer as $item)
                                    <tr>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->nomer_hp}}</td>
                                        <td>{{$item->tanggal_lahir}}</td>

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


