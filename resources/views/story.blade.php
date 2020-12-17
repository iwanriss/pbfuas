@extends('layout.master')
@section('content')

<body>
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>buat ceritamu disini!</h2>
                </div>
            </div>
        </div>
    </div>
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
    <div class="cart-box-main">
        <div class="container">
            <form action="{{url('post-artikel')}}" enctype="multipart/form-data" class="form-contact contact_form" method="post" >
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="">Judul</label>
                            <input class="form-control" name="judul" id="judul" type="text" placeholder="Judul">
                        </div>
                        <div class="form-group">
                            <label for="">Nama Penulis</label>
                            <input class="form-control" name="author" id="author" type="text" placeholder="Nama Penulis">
                        </div>
                        <br>
                        <div class="input-group">
                            <div class="custom-file">
                                <label class="custom-file-label" for="inputGroupFile04">Pilih Foto</label>
                                <input type="file" name="avatar_pengalaman" class="custom-file-input" id="avatar_pengalaman">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="">Konten</label>
                        <textarea class="konten" name="konten" id="konten"></textarea>
                        @section('script')
                        <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
                        <script>
                            tinymce.init({
                                selector:'textarea.konten',
                                width: 1500,
                                height: 600
                            });
                        </script>
                        @endsection
                    </div>  
                </div>
                <br>
                <div class="form-group mt-3">
                    <button type="submit" class="btn hvr-hover">Bagikan</button>
                </div>
            </form>
            
        </div>
    </div>
</body>

@endsection