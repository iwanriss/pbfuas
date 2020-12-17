@extends('layout.master')
@section('content')

<body>
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>My Account</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" data-toggle="modal" data-target="#lupa_password_modal">Ganti Password</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="cart-box-main">
        <div class="container">
            <div class="row new-account-login">
                <div class="col-sm-6 col-lg-6 mb-3">
                </div>
            </div>
            @if (session('alert'))
            <div class="alert alert-danger">
                {{session('alert')}}
            </div>
            @endif
            @if (session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
            @endif
            @if ($errors->any())
            <div class="alert alert-success">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="row">
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="checkout-address">
                        <div class="title-left">
                            <h3>Profil Anda</h3>
                        </div>
                        <form class="needs-validation" novalidate>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="firstName">Nama Anda</label>
                                    <input type="text" class="form-control" id="firstName" placeholder="" value="{{$data->name}}" required>
                                    <div class="invalid-feedback"> Valid first name is required. </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="username">Nomer HP *</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="username" value="{{$data->nomer_hp}}" placeholder="" required>
                                    <div class="invalid-feedback" style="width: 100%;"> Your username is required. </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="address">Email</label>
                                <input type="text" class="form-control" id="address"  value="{{$data->email}}"
                                placeholder="" required>
                                <div class="invalid-feedback"> Please enter your shipping address. </div>
                            </div>
                            <div class="mb-3">
                                <label for="address2">Tanggal Lahir</label>
                                <input type="text" class="form-control" id="address2" value="{{$data->tanggal_lahir}}" placeholder=""> </div>
                            </div>
                            <button type="submit" data-toggle="modal" onclick="editCustomer({{$data->id}})"
                             data-target="#edit_customer_modal" class="btn hvr-hover">
                             Edit
                            </button>
                        </form>
                        <button type="button" class="btn hvr-hover" data-toggle="modal" data-target="#exampleModal">
  Logout
</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>
@endsection

@section('script')
    <script>
            function editCustomer(id) {
            var action = "{{url('update-customer-account')}}/" + id;
            $.ajax({
                type: "GET",
                url: "{{url('get-data-customer-account')}}/" + id,
                dataType: "JSON",
                success: function(data){
                    $('#nameEdit').val(data.name)
                    $('#emailEdit').val(data.email)
                    $('#nomer_hpEdit').val(data.nomer_hp)
                    $('#tanggal_lahirEdit').val(data.tanggal_lahir)
                    $('#edit_customerAccount').attr('action', action)
                }
            })
        }
    </script>
@endsection

@section('modal')

<!-- Modal -->
<div class="modal fade" id="lupa_password_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action = "{{url('ganti-password')}}" method = "POST">
                    @csrf
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Password Terakhir:</label>
                        <input type="password" name="password" class="form-control" id="recipient-name"
                        value="{{old('password')}}">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Password Baru:</label>
                        <input type="password" name="password_baru" class="form-control" id="recipient-name"
                        value="{{old('password_baru')}}">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Konfirmasi Password Baru:</label>
                        <input type="password" name="password_konfirmasi" class="form-control" id="recipient-name"
                        value="{{old('password_konfirmasi')}}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary" value="ganti-password">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
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
                <form id="edit_customerAccount"  method = "POST">
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Yakin untuk keluar?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a class="btn hvr-hover" style="text-decoration: none" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                                       {{ __('Logout') }}</a>
                                   <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                       @csrf
                                   </form>
      </div>
    </div>
  </div>
</div>
@endsection
